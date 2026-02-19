<?php
/**
 * One-time migration script: Tours to WooCommerce Products
 *
 * INSTRUCTIONS:
 * 1. Upload this file to your theme directory
 * 2. Access it once via browser: http://yoursite.com/wp-content/themes/tuku/migrate-tours-to-products.php
 * 3. Delete this file after successful migration
 *
 * WARNING: Backup your database before running this script!
 */

// Load WordPress
require_once('../../../wp-load.php');

// Security check - only allow admins (skip check if running from CLI)
if (php_sapi_name() !== 'cli' && !current_user_can('manage_options')) {
    wp_die('Unauthorized access');
}

// Prevent timeout
set_time_limit(0);

echo '<h1>Migrating Tours to WooCommerce Products</h1>';
echo '<pre>';

// Disable language filters for multilingual sites (WPML/Polylang)
if (function_exists('icl_object_id')) {
    // WPML
    global $sitepress;
    remove_filter('get_pages', array($sitepress, 'get_pages'), 10, 2);
    remove_filter('get_terms_args', array($sitepress, 'get_terms_args_filter'), 10, 2);
}

// Get all posts of type 'tours' - suppressing filters to get ALL languages
$args = array(
    'post_type' => 'tours',
    'posts_per_page' => -1,
    'post_status' => 'any',
    'suppress_filters' => true,  // This bypasses language filters
    'lang' => ''  // For Polylang - get all languages
);

$tours = get_posts($args);
$count = count($tours);

echo "Found {$count} tours to migrate...\n\n";

// Also check database directly for confirmation
global $wpdb;
$db_count = $wpdb->get_var("SELECT COUNT(*) FROM {$wpdb->posts} WHERE post_type = 'tours'");
echo "Database shows {$db_count} total 'tours' posts in database\n\n";

if ($count < $db_count) {
    echo "WARNING: Query returned fewer posts than database count. Running direct database query instead...\n\n";

    // Get IDs directly from database
    $tour_ids = $wpdb->get_col("SELECT ID FROM {$wpdb->posts} WHERE post_type = 'tours'");
    $tours = array();
    foreach ($tour_ids as $tour_id) {
        $tours[] = get_post($tour_id);
    }
    $count = count($tours);
    echo "Now processing all {$count} tours...\n\n";
}

$success_count = 0;
$error_count = 0;

foreach ($tours as $tour) {
    echo "Processing: {$tour->post_title} (ID: {$tour->ID})...\n";

    try {
        // PART 1: Change post type from 'tours' to 'product'
        $updated = wp_update_post(array(
            'ID' => $tour->ID,
            'post_type' => 'product'
        ));

        if (is_wp_error($updated)) {
            throw new Exception($updated->get_error_message());
        }

        // PART 3: Migrate precio_tour to WooCommerce price
        $precio_tour = get_post_meta($tour->ID, 'precio_tour', true);

        if (!empty($precio_tour)) {
            // Set as regular price
            update_post_meta($tour->ID, '_regular_price', $precio_tour);
            update_post_meta($tour->ID, '_price', $precio_tour);
            echo "  ✓ Migrated price: {$precio_tour}\n";
        } else {
            echo "  ⚠ No precio_tour found\n";
        }

        // Set product as simple product
        wp_set_object_terms($tour->ID, 'simple', 'product_type');

        // Make sure the product is visible
        update_post_meta($tour->ID, '_visibility', 'visible');
        update_post_meta($tour->ID, '_stock_status', 'instock');

        echo "  ✓ Successfully migrated to product\n\n";
        $success_count++;

    } catch (Exception $e) {
        echo "  ✗ Error: " . $e->getMessage() . "\n\n";
        $error_count++;
    }
}

echo "\n" . str_repeat('=', 50) . "\n";
echo "MIGRATION COMPLETE!\n";
echo "Successful: {$success_count}\n";
echo "Errors: {$error_count}\n";
echo str_repeat('=', 50) . "\n";

echo "\nNEXT STEPS:\n";
echo "1. Verify the products in WooCommerce > Products\n";
echo "2. Check that taxonomies are properly assigned\n";
echo "3. DELETE THIS SCRIPT FILE for security\n";

echo '</pre>';
