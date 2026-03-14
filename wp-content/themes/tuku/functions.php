<?php
/**
 * Staff Digital functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Staff_Digital
 */

if ( ! function_exists( 'staff_digital_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function staff_digital_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Staff Digital, use a find and replace
		 * to change 'staff-digital' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'tunay', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.


		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'staff_digital_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		// Add WooCommerce support
		add_theme_support( 'woocommerce' );
	}
endif;
add_action( 'after_setup_theme', 'staff_digital_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function staff_digital_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'staff_digital_content_width', 640 );
}
add_action( 'after_setup_theme', 'staff_digital_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function staff_digital_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'tuku' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'tuku' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'staff_digital_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function staff_digital_scripts() {
	wp_enqueue_style( 'staff-digital-style', get_stylesheet_uri() );

	wp_enqueue_script( 'staff-digital-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'staff-digital-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'staff_digital_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * ACF P��gina de opciones
 */
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title'    => 'Configuraci��n General',
		'menu_title'    => 'Configuraciones',
		'menu_slug'     => 'theme-general-settings',
		'capability'    => 'edit_posts',
		'redirect'      => false,
		'position'      => '2.1',
		'icon_url'      => 'dashicons-admin-settings',
	));
}

// Remove action
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'start_post_rel_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'adjacent_posts_rel_link');

// Remove Emojis
function disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' ); 
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' ); 
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
	add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
}
add_action( 'init', 'disable_emojis' );
function disable_emojis_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
}
function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
	if ( 'dns-prefetch' == $relation_type ) {
		$emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );
		$urls = array_diff( $urls, array( $emoji_svg_url ) );
	}
	return $urls;
}

// Remove action
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'start_post_rel_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'adjacent_posts_rel_link');


// Remove embeds
function disable_embeds_code_init() {
	remove_action( 'rest_api_init', 'wp_oembed_register_route' );
	add_filter( 'embed_oembed_discover', '__return_false' );
	remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10 );
	remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
	remove_action( 'wp_head', 'wp_oembed_add_host_js' );
	add_filter( 'tiny_mce_plugins', 'disable_embeds_tiny_mce_plugin' );
	add_filter( 'rewrite_rules_array', 'disable_embeds_rewrites' );
	remove_filter( 'pre_oembed_result', 'wp_filter_pre_oembed_result', 10 );
}
add_action( 'init', 'disable_embeds_code_init', 9999 );

function disable_embeds_tiny_mce_plugin($plugins) {
	return array_diff($plugins, array('wpembed'));
}

function disable_embeds_rewrites($rules) {
	foreach($rules as $rule => $rewrite) {
	if(false !== strpos($rewrite, 'embed=true')) {
		unset($rules[$rule]);
	}
	}
	return $rules;
}
// Add filter
add_filter('show_admin_bar', '__return_false');

// Language
load_theme_textdomain('tunay', get_template_directory() . '/languages');

// Support Shortcode
add_filter('widget_text', 'do_shortcode');

// Support Thumbnails
add_theme_support( 'post-thumbnails' );

// Add Image Sizes
add_image_size( 'thumbnail-preview', '100', '100', array( "1", "") );
add_image_size( 'thumbnail-fullsize', '830', '750', array( "1", "") );
add_image_size( 'thumbnail-video', '303', '189', array( "1", "") );


// Custom format date post created
function the_date_custom_post() {
	$dateMonth  = ''.get_the_date('F').'';
	$dateDay    = ''.get_the_date('j').'';
	$dateYear   = ''.get_the_date('Y').'';
	?>
	 <?php echo $dateMonth; ?> <?php echo $dateDay; ?>, <?php echo $dateYear; ?> 
	<?php
}

//Page Slug Body Class
function add_slug_body_class( $classes ) {
	global $post;
	if ( isset( $post ) ) {
	$classes[] = $post->post_type . '-' . $post->post_name;
	}
	return $classes;
}
add_filter( 'body_class', 'add_slug_body_class' );

// Support SVG
add_filter('upload_mimes', 'suppot_upload_svg');
 
function suppot_upload_svg($mimes = array()) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}

register_nav_menus( array( 
	//'menu-1' => esc_html__( 'Primary Left', 'tuku' ),
	//'menu-5' => esc_html__( 'Primary Right', 'tuku' ),
	'menu-2' => esc_html__( 'Footer', 'tuku' ),
	'menu-3' => esc_html__( 'Sub-Footer', 'tuku' ),
	'menu-5' => esc_html__( 'Sub-Footer-nums', 'tuku' ),
	'menu-6' => esc_html__( 'Sub-Footer-emails', 'tuku' ),
	//'menu-4' => esc_html__( 'Mobile', 'tuku' ),
) );
		
function scripts_staffdigital(){
//CSS

    wp_enqueue_style('app-css', get_template_directory_uri() . '/assets/css/app.css');
	wp_enqueue_style('style-css', get_template_directory_uri() . '/css/style.css');
    wp_enqueue_style('swiper-css', get_template_directory_uri() . '/assets/css/swiper-bundle.css');
    wp_enqueue_style('lg-css', get_template_directory_uri() . '/assets/css/lightgallery.min.css');
    wp_enqueue_style('ui-css', get_template_directory_uri() . '/assets/css/jquery-ui.css');

//JS

    wp_register_script('lg-js', get_template_directory_uri() . '/assets/js/lightgallery.min.js', array( 'jquery' ), '', true);
    wp_register_script('app-js', get_template_directory_uri() . '/assets/js/app.js', array( 'jquery' ), '', true);
    wp_register_script('header-js', get_template_directory_uri() . '/assets/js/header.js', array( 'jquery' ), '1.2', true);
    wp_register_script('swiper-js', get_template_directory_uri() . '/assets/js/swiper-bundle.js', array( 'jquery' ), '', true);
    wp_register_script('swiper-min-js', get_template_directory_uri() . '/assets/js/swiper-bundle.min.js', array( 'jquery' ), '', true);
    wp_register_script('jquery-js', get_template_directory_uri() . 'https://code.jquery.com/jquery-1.12.4.js', array( 'jquery' ), '', true);
		wp_register_script('jquery-ui-js', get_template_directory_uri() . '/assets/js/jquery-ui.js', array( 'jquery' ), '', true);
		
		wp_register_script( 'wishlist', get_theme_file_uri( '/assets/js/wishlist.js'), array('jquery') );
		wp_enqueue_script( 'wishlist');


		wp_localize_script('wishlist','dcms_vars',['ajaxurl'=>admin_url('admin-ajax.php')]);

    // wp_localize_script( 'wishlist', 'ajax_var', array(
    //     'ajaxurl' => admin_url( 'admin-ajax.php' ),
    //     'nonce'  => wp_create_nonce( 'my-ajax-nonce' ),
    //     // 'action' => 'event-list'
    // ) );

	//wp_enqueue_script( 'jquery-js' );
	wp_enqueue_script( 'jquery-ui-js' );
	wp_enqueue_script( 'app-js' );
	wp_enqueue_script( 'lg-js' );
	wp_enqueue_script( 'header-js' );
	wp_enqueue_script( 'swiper-js' );
	wp_enqueue_script( 'swiper-min-js' );


//JS jQuery

  	wp_deregister_script('jquery');
   	wp_register_script('jquery', "//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js", false, null);
   	wp_enqueue_script('jquery');

}
add_action( 'wp_enqueue_scripts', 'scripts_staffdigital' );

//Devolver datos a archivo js
add_action('wp_ajax_nopriv_dcms_ajax_readmore','dcms_enviar_contenido');
add_action('wp_ajax_dcms_ajax_readmore','dcms_enviar_contenido');

function dcms_enviar_contenido()
{

	$id_posts = $_POST['id_posts'];

	$arrIds = explode(',', str_replace(']', '', str_replace('[', '', str_replace('"', '', stripslashes($id_posts)))));

	$args = array(
		'post_type' => 'product',
		'post_status' => 'publish',
		'post__in' => $arrIds,
		'posts_per_page' => -1,
	);

	$wp_query = new WP_Query($args);

	$dataPrint = '';
	if($wp_query->have_posts()) {
		while ($wp_query->have_posts()) : $wp_query->the_post();
		$current_id = get_the_ID();
    $currentlang = get_bloginfo('language');

		$tax = 'itinerarios';
		$terms = get_terms( $tax, $args = array(
				'hide_empty' => false,
		));
		$dataPrint .= '<div class="whislist-item">
				<a href="';
				$dataPrint .= get_permalink();
				$dataPrint .='" class="card-product whislist" data-product="' . $current_id . '">
				<div class="card-product__left"> <img src="
				' . get_the_post_thumbnail_url(null,  'thumbnail-tour' ) . ' " alt="img" />
				<div class="card-product__left__top"> ';
					foreach( $terms as $term ) {
							$image = get_field('icono_iti', 'itinerarios_' . $term->term_id );
							if( $term->count > 0 ) {
								$dataPrint .= '<div class="card-product__left__top__item">';
									$dataPrint .= '<img src="' . $image['url'] . '" alt="' . $image['alt'] .'">';       
									$dataPrint .= '</div>';
							};
					};
				$dataPrint .='</div>

				<div class="card-product__left__bottom">
						<span class="card-product__heart active">
								<span class="icon-heart-11"></span>
								<span class="icon-heart3"></span>
						</span>
				</div>
			</div>

			<div class="card-product__right">
				<div class="card-product__right__content">
						<div class="card-product__right__content__top">
								<div class="card-product__right__title">' . 
								get_the_title() . '
								</div>
								<div class="card-product__right__direction">
									<div class="icon"><span class="icon-pin"></span></div> ';
										$terms = get_the_terms( $post->ID , 'destinos' );
										if ( $terms != null ){
										foreach( $terms as $term ) {
											$image = get_field('icono_iti', 'itinerarios_' . $term->term_id );
											$dataPrint .= '' . $term->name .'';       
										unset($term);
									} };
									$dataPrint .= '</div>
										<div class="card-product__right__desc"> ' .
										the_excerpt() . '
										</div>
											</div>
											<div class="card-product__right__content__bottom">
													<div class="card-product__right__content__bottom__list"> ';
													if( get_field('numero_de_dias') ) {
														$dataPrint .= '<div class="card-product__right__content__bottom__item">
														<span class="icon-clock"></span>
														<span class="card-product__right__content__bottom__item__name"> ' .
														get_field( 'numero_de_dias' ) . 'd
														</span>
													</div>';
													};

													$dataPrint .= '<div class="card-product__right__content__bottom__item">
                                                <span class="icon-tap-1"></span>
                                                <span class="card-product__right__content__bottom__item__name">1250</span>
																						</div>';
																						if ( have_rows( 'comentarios' ) ){
																							$dataPrint .= '<div class="card-product__right__content__bottom__item">
																							<span class="icon-conversation"></span>
																							<span class="card-product__right__content__bottom__item__name"></span>' . count( get_field('comentarios') ) . '
																							</div>';
																						};
																							$dataPrint .= '</div>
																				<div class="card-product__right__action"> ';
																				// Get WooCommerce price
																				$product = wc_get_product($current_id);
																				if ($product) {
																					$dataPrint .= esc_html($product->get_price());
																				}
																				$dataPrint .= ' US$';
																				$dataPrint .= '</div>
																				<div class="card-product__right__action-hover"> ';
																				if($currentlang=="es") {
																					$dataPrint .= 'Ver tour';
																				} else {
																					$dataPrint .= 'Check it';
																				};
																				// $dataPrint .=  _e('Ver tour','tuku');
																				$dataPrint .= '<span class="icon-next"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
												</a>
												<div class="whislist-remove" data-product="' . $current_id . '">
              Quitar ítem de mi lista de deseos
            </div>
			</div>';

			
			
		endwhile;
		echo $dataPrint;
		wp_reset_query();
	} else {
		echo null;
	}

	wp_die();
}

/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function wpdocs_custom_excerpt_length( $length ) {
    return 15;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );



function get_cat_slug($cat_id) {
	$cat_id = (int)$cat_id;
	$category = &get_category($cat_id);
	return $category->slug;
}

// function to display number of posts.

function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 Vistas";
    }
    return $count.' Vistas';
}

// function to count views.
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

// Add it to a column in WP-Admin
add_filter('manage_posts_columns', 'posts_column_views');
add_action('manage_posts_custom_column', 'posts_custom_column_views',5,2);
function posts_column_views($defaults){
    $defaults['post_views'] = __('Vistas');
    return $defaults;
}
function posts_custom_column_views($column_name, $id){
  if($column_name === 'post_views'){
        echo getPostViews(get_the_ID());
    }
}

function my_myme_types($mime_types){
    $mime_types['svg'] = 'image/svg+xml'; //Adding svg extension
    return $mime_types;
}
add_filter('upload_mimes', 'my_myme_types', 1, 1);


add_filter('wp_nav_menu_objects', 'my_wp_nav_menu_objects', 10, 2);

function my_wp_nav_menu_objects( $items, $args ) {
	
	// loop
	foreach( $items as &$item ) {
		
		// vars
		$icon = get_field('icon', $item);
		
		
		// append icon
		if( $icon ) {
			
			$item->title .= ' <i class="fa fa-'.$icon.'"></i>';
			
		}
		
	}
	
	
	// return
	return $items;
	
}

//Exclude pages from WordPress Search
if (!is_admin()) {
function wpb_search_filter($query) {
if ($query->is_search) {
$query->set('post_type', 'product');
}
return $query;
}
add_filter('pre_get_posts','wpb_search_filter');
}


add_filter( 'facetwp_pager_html', function( $output, $params ) {
    $output = '';
    $page = $params['page'];
    $total_pages = $params['total_pages'];

    if ( 1 < $total_pages ) {

        // Previous page (NEW)
        if ( $page > 1 ) {
            $output .= '<a class="facetwp-page" data-page="' . ($page - 1) . '"><</a>';
        }
        
        if ( 3 < $page ) {
            $output .= '<a class="facetwp-page first-page" data-page="1"><<</a>';
        }
        if ( 1 < ( $page - 10 ) ) {
            $output .= '<a class="facetwp-page" data-page="' . ($page - 10) . '">' . ($page - 10) . '</a>';
        }
        for ( $i = 2; $i > 0; $i-- ) {
            if ( 0 < ( $page - $i ) ) {
                $output .= '<a class="facetwp-page" data-page="' . ($page - $i) . '">' . ($page - $i) . '</a>';
            }
        }

        // Current page
        $output .= '<a class="facetwp-page active" data-page="' . $page . '">' . $page . '</a>';

        for ( $i = 1; $i <= 2; $i++ ) {
            if ( $total_pages >= ( $page + $i ) ) {
                $output .= '<a class="facetwp-page" data-page="' . ($page + $i) . '">' . ($page + $i) . '</a>';
            }
        }
        if ( $total_pages > ( $page + 10 ) ) {
            $output .= '<a class="facetwp-page" data-page="' . ($page + 10) . '">' . ($page + 10) . '</a>';
        }
        if ( $total_pages > ( $page + 2 ) ) {
            $output .= '<a class="facetwp-page last-page" data-page="' . $total_pages . '">>></a>';
        }

        // Next page (NEW)
        if ( $page < $total_pages ) {
            $output .= '<a class="facetwp-page" data-page="' . ($page + 1) . '">></a>';
        }
    }

    return $output;
}, 10, 2 );

/**
 * ACF Load More Repeater
*/

// add action for logged in users
add_action('wp_ajax_my_repeater_show_more', 'my_repeater_show_more');
// add action for non logged in users
add_action('wp_ajax_nopriv_my_repeater_show_more', 'my_repeater_show_more');

function my_repeater_show_more() {
	// validate the nonce
	if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'my_repeater_field_nonce')) {
		exit;
	}
	// make sure we have the other values
	if (!isset($_POST['post_id']) || !isset($_POST['offset'])) {
		return;
	}
	$show = 5; // how many more to show
	$start = $_POST['offset'];
	$end = $start+$show;
	$post_id = $_POST['post_id'];
	// use an object buffer to capture the html output
	// alternately you could create a varaible like $html
	// and add the content to this string, but I find
	// object buffers make the code easier to work with
	ob_start();
	if (have_rows('comentarios', $post_id)) {
		$total = count(get_field('comentarios', $post_id));
		$count = 0;
		while (have_rows('comentarios', $post_id)) {
			the_row();
			if ($count < $start) {
				// we have not gotten to where
				// we need to start showing
				// increment count and continue
				$count++;
				continue;
			}
			?>
                    <div class="comentario__item">
                        <div class="top__coment">
                            <div class="titulo__coment">
                                <h3><?php the_sub_field( 'titulo_user' ); ?></h3>
                                <h6><?php the_sub_field( 'subtitulo_user' ); ?></h6>  
                            </div>
                            <div class="fecha__coment">
                                <h6><?php the_sub_field( 'fecha_user' ); ?></h6>
                            </div>
                        </div>
                        <?php the_sub_field( 'comentario_user' ); ?>
                        <div class="bottom__comment">
                            <div class="user__coment">
                                <div class="img_coment" style="background-image: url('<?php the_sub_field( 'perfil_user' ); ?>');"></div>
                                <h6><?php the_sub_field( 'nombre_user' ); ?></h6>
                            </div>
                            <?php 
                                $ratingstar = get_sub_field('estrellas_user');
                            ?>
                            <div class="star__coment">
                                <img class="<?php if ($ratingstar >= 1) { echo 'checked';}?>" src="<?php echo get_template_directory_uri(); ?>/assets/img/star.svg">
                                <img class="<?php if ($ratingstar >= 2) { echo 'checked';}?>" src="<?php echo get_template_directory_uri(); ?>/assets/img/star.svg">
                                <img class="<?php if ($ratingstar >= 3) { echo 'checked';}?>" src="<?php echo get_template_directory_uri(); ?>/assets/img/star.svg">
                                <img class="<?php if ($ratingstar >= 4) { echo 'checked';}?>" src="<?php echo get_template_directory_uri(); ?>/assets/img/star.svg">
                                <img class="<?php if ($ratingstar >= 5) { echo 'checked';}?>" src="<?php echo get_template_directory_uri(); ?>/assets/img/star.svg">
                            </div>
                        </div>
                    </div>
			<?php 
			$count++;
			if ($count == $end) {
				// we've shown the number, break out of loop
				break;
			}
		} // end while have rows
	} // end if have rows
	$content = ob_get_clean();
	// check to see if we've shown the last item
	$more = false;
	if ($total > $count) {
		$more = true;
	}
	// output our 3 values as a json encoded array
	echo json_encode(array('content' => $content, 'more' => $more, 'offset' => $end));
	exit;
} // end function my_repeater_show_more

add_filter('wpcf7_form_elements', function($content) {
    $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);

    return $content;
});



function cf7_footer_script(){ ?>
  
<script>
document.addEventListener( 'wpcf7submit', function( event ) {
  if ( '264' == event.detail.contactFormId ) {
    $( ".modal-nesletter" ).addClass( "active" );
    $( ".overlay" ).addClass( "active" );
	setTimeout(function() {
	    $('.modal-nesletter').removeClass('active');
	    $( ".overlay" ).removeClass( "active" );
	},5000);
    // do something productive
  }
}, false );
</script>

<script>
document.addEventListener( 'wpcf7submit', function( event ) {
  if ( '263' == event.detail.contactFormId ) {
    $( ".modal-nesletter" ).addClass( "active" );
    $( ".overlay" ).addClass( "active" );
	setTimeout(function() {
	    $('.modal-nesletter').removeClass('active');
	    $( ".overlay" ).removeClass( "active" );
	},5000);
    // do something productive
  }
}, false );
</script>

<script>
document.addEventListener( 'wpcf7submit', function( event ) {
  if ( '6' == event.detail.contactFormId ) {
    $( ".modal-thx" ).addClass( "active" );
    $( ".modal-cotizador" ).removeClass( "active" );
	setTimeout(function() {
	    $('.modal-thx').removeClass('active');
	    $( ".overlay" ).removeClass( "active" );
	},5000);
    // do something productive
  }
}, false );
</script>

<script>
document.addEventListener( 'wpcf7submit', function( event ) {
  if ( '259' == event.detail.contactFormId ) {
    $( ".modal-thx" ).addClass( "active" );
    $( ".modal-cotizador" ).removeClass( "active" );
	setTimeout(function() {
	    $('.modal-thx').removeClass('active');
	    $( ".overlay" ).removeClass( "active" );
	},5000);
    // do something productive
  }
}, false );
</script>
  
<?php } 
  
add_action('wp_footer', 'cf7_footer_script');

/*
|--------------------------------------------------------------------------
| Custom Post Types
|--------------------------------------------------------------------------
*/

register_post_type('slider', [
	'labels' => [
		'name'          => 'Sliders',
		'singular_name' => 'Slider',
	],
	'public'       => true,
	'has_archive'  => true,
	'menu_icon'    => 'dashicons-format-gallery',
	'supports'     => ['title'],
	'rewrite'      => ['slug' => 'slider'],
	'show_in_rest' => true,
]);

/*
|--------------------------------------------------------------------------
| Custom Taxonomies (ONLY custom ones)
|--------------------------------------------------------------------------
*/

$custom_taxonomies = [
	'itinerarios' => 'Itinerario',
	'destinos'    => 'Destino',
	'duracion'    => 'Duración',
	'seguridad'   => 'Seguridad',
];

foreach ($custom_taxonomies as $slug => $label) {

	register_taxonomy($slug, ['product'], [
		'labels'       => [
			'name'          => $label,
			'singular_name' => $label,
		],
		'public'       => true,
		'hierarchical' => true,
		'rewrite'      => [
			'slug'         => $slug,
			'hierarchical' => true,
		],
		'show_in_rest' => true,
	]);
}

/*
|--------------------------------------------------------------------------
| Attach EXISTING core taxonomies
|--------------------------------------------------------------------------
*/

register_taxonomy_for_object_type('category', 'product');
register_taxonomy_for_object_type('post_tag', 'product');

/**
 * WooCommerce content wrappers
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

function tuku_woocommerce_wrapper_before() {
    echo '<main id="primary" class="site-main">';
}
add_action( 'woocommerce_before_main_content', 'tuku_woocommerce_wrapper_before' );

function tuku_woocommerce_wrapper_after() {
    echo '</main>';
}
add_action( 'woocommerce_after_main_content', 'tuku_woocommerce_wrapper_after' );

/**
 * Register Tours taxonomies for WooCommerce Products
 * This allows the taxonomies that were previously used with 'tours' post type
 * to also work with 'product' post type (WooCommerce)
 */
function register_tours_taxonomies_for_products() {
    // Register 'itinerarios' taxonomy for products
    register_taxonomy_for_object_type('itinerarios', 'product');

    // Register 'destinos' taxonomy for products
    register_taxonomy_for_object_type('destinos', 'product');

    // Register 'duracion' taxonomy for products
    register_taxonomy_for_object_type('duracion', 'product');

    // Register 'seguridad' taxonomy for products
    register_taxonomy_for_object_type('seguridad', 'product');
}
add_action('init', 'register_tours_taxonomies_for_products', 999);

/**
 * Auto-create WooCommerce pages if they don't exist
 */
function tuku_ensure_wc_pages() {
    if ( ! class_exists( 'WooCommerce' ) ) return;

    $pages = [
        'cart'     => [ 'title' => 'Carrito',  'content' => '[woocommerce_cart]',     'option' => 'woocommerce_cart_page_id' ],
        'checkout' => [ 'title' => 'Checkout', 'content' => '[woocommerce_checkout]', 'option' => 'woocommerce_checkout_page_id' ],
        'myaccount'=> [ 'title' => 'Mi cuenta','content' => '[woocommerce_my_account]','option' => 'woocommerce_myaccount_page_id' ],
    ];

    foreach ( $pages as $slug => $page ) {
        $page_id = get_option( $page['option'] );
        if ( $page_id && get_post_status( $page_id ) === 'publish' ) continue;

        $existing = get_page_by_path( $slug );
        if ( $existing && $existing->post_status === 'publish' ) {
            update_option( $page['option'], $existing->ID );
            continue;
        }

        $new_id = wp_insert_post([
            'post_title'   => $page['title'],
            'post_name'    => $slug,
            'post_content' => $page['content'],
            'post_status'  => 'publish',
            'post_type'    => 'page',
        ]);
        if ( $new_id && ! is_wp_error( $new_id ) ) {
            update_option( $page['option'], $new_id );
        }
    }
}
add_action( 'after_setup_theme', 'tuku_ensure_wc_pages' );

/**
 * WooCommerce: Update header cart count via AJAX fragments
 */
function tuku_cart_count_fragment( $fragments ) {
    $count = WC()->cart->get_cart_contents_count();
    $fragments['.cart-count'] = '<span class="cart-count ' . ( $count ? '' : 'hidden' ) . '">' . $count . '</span>';
    return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'tuku_cart_count_fragment' );

/**
 * WooCommerce: Save tour dates and guests to cart item
 */
function tuku_add_cart_item_data( $cart_item_data, $product_id ) {
    if ( ! empty( $_POST['tuku_start_date'] ) ) {
        $cart_item_data['tuku_start_date'] = sanitize_text_field( $_POST['tuku_start_date'] );
    }
    if ( ! empty( $_POST['tuku_end_date'] ) ) {
        $cart_item_data['tuku_end_date'] = sanitize_text_field( $_POST['tuku_end_date'] );
    }
    if ( ! empty( $_POST['tuku_guests'] ) ) {
        $cart_item_data['tuku_guests'] = absint( $_POST['tuku_guests'] );
    }
    if ( isset( $_POST['tuku_children'] ) ) {
        $cart_item_data['tuku_children'] = absint( $_POST['tuku_children'] );
    }
    return $cart_item_data;
}
add_filter( 'woocommerce_add_cart_item_data', 'tuku_add_cart_item_data', 10, 2 );

/**
 * WooCommerce: Display tour dates and guests in cart
 */
function tuku_get_item_data( $item_data, $cart_item ) {
    if ( ! empty( $cart_item['tuku_start_date'] ) ) {
        $label = __( 'Fecha inicio', 'tuku' );
        $value = date_i18n( 'D, j M Y', strtotime( $cart_item['tuku_start_date'] ) );
        if ( ! empty( $cart_item['tuku_end_date'] ) ) {
            $label = __( 'Fechas', 'tuku' );
            $value .= ' – ' . date_i18n( 'D, j M Y', strtotime( $cart_item['tuku_end_date'] ) );
        }
        $item_data[] = [
            'key'   => $label,
            'value' => $value,
        ];
    }
    if ( ! empty( $cart_item['tuku_guests'] ) && $cart_item['tuku_guests'] > 0 ) {
        $item_data[] = [
            'key'   => __( 'Adultos', 'tuku' ),
            'value' => $cart_item['tuku_guests'],
        ];
    }
    if ( isset( $cart_item['tuku_children'] ) && $cart_item['tuku_children'] >= 0 ) {
        $item_data[] = [
            'key'   => __( 'Niños', 'tuku' ),
            'value' => $cart_item['tuku_children'],
        ];
    }
    return $item_data;
}
add_filter( 'woocommerce_get_item_data', 'tuku_get_item_data', 10, 2 );

/**
 * WooCommerce: Save tour data to order item meta
 */
function tuku_checkout_create_order_line_item( $item, $cart_item_key, $values, $order ) {
    if ( ! empty( $values['tuku_start_date'] ) ) {
        $item->add_meta_data( __( 'Fecha inicio', 'tuku' ), $values['tuku_start_date'] );
    }
    if ( ! empty( $values['tuku_end_date'] ) ) {
        $item->add_meta_data( __( 'Fecha fin', 'tuku' ), $values['tuku_end_date'] );
    }
    if ( ! empty( $values['tuku_guests'] ) ) {
        $item->add_meta_data( __( 'Adultos', 'tuku' ), $values['tuku_guests'] );
    }
    if ( isset( $values['tuku_children'] ) ) {
        $item->add_meta_data( __( 'Niños', 'tuku' ), $values['tuku_children'] );
    }
}
add_action( 'woocommerce_checkout_create_order_line_item', 'tuku_checkout_create_order_line_item', 10, 4 );

/**
 * WooCommerce Checkout: Override default fields
 */
function tuku_override_checkout_fields( $fields ) {
    // Remove fields we handle manually in our template
    unset( $fields['billing']['billing_company'] );
    unset( $fields['billing']['billing_address_1'] );
    unset( $fields['billing']['billing_address_2'] );
    unset( $fields['billing']['billing_city'] );
    unset( $fields['billing']['billing_postcode'] );
    unset( $fields['billing']['billing_state'] );
    unset( $fields['order']['order_comments'] );

    // Make sure required fields are set
    $fields['billing']['billing_first_name']['required'] = true;
    $fields['billing']['billing_last_name']['required'] = true;
    $fields['billing']['billing_email']['required'] = true;
    $fields['billing']['billing_phone']['required'] = true;
    $fields['billing']['billing_country']['required'] = true;

    return $fields;
}
add_filter( 'woocommerce_checkout_fields', 'tuku_override_checkout_fields' );

/**
 * WooCommerce Checkout: Validate custom fields
 */
function tuku_checkout_validate_fields() {
    if ( empty( $_POST['tuku_doc_number'] ) ) {
        wc_add_notice( __( 'Por favor ingresa tu número de documento.', 'tuku' ), 'error' );
    }
    if ( empty( $_POST['tuku_birthdate'] ) ) {
        wc_add_notice( __( 'Por favor ingresa tu fecha de nacimiento.', 'tuku' ), 'error' );
    }
    if ( empty( $_POST['tuku_gender'] ) ) {
        wc_add_notice( __( 'Por favor selecciona tu género.', 'tuku' ), 'error' );
    }
    if ( ! empty( $_POST['billing_email'] ) && ! empty( $_POST['billing_email_confirm'] ) ) {
        if ( $_POST['billing_email'] !== $_POST['billing_email_confirm'] ) {
            wc_add_notice( __( 'Los correos electrónicos no coinciden.', 'tuku' ), 'error' );
        }
    }
}
add_action( 'woocommerce_checkout_process', 'tuku_checkout_validate_fields' );

/**
 * WooCommerce Checkout: Save custom fields to order meta
 */
function tuku_checkout_save_order_meta( $order_id ) {
    if ( ! empty( $_POST['tuku_doc_type'] ) ) {
        update_post_meta( $order_id, '_tuku_doc_type', sanitize_text_field( $_POST['tuku_doc_type'] ) );
    }
    if ( ! empty( $_POST['tuku_doc_number'] ) ) {
        update_post_meta( $order_id, '_tuku_doc_number', sanitize_text_field( $_POST['tuku_doc_number'] ) );
    }
    if ( ! empty( $_POST['tuku_birthdate'] ) ) {
        update_post_meta( $order_id, '_tuku_birthdate', sanitize_text_field( $_POST['tuku_birthdate'] ) );
    }
    if ( ! empty( $_POST['tuku_gender'] ) ) {
        update_post_meta( $order_id, '_tuku_gender', sanitize_text_field( $_POST['tuku_gender'] ) );
    }
    if ( ! empty( $_POST['tuku_phone_code'] ) ) {
        update_post_meta( $order_id, '_tuku_phone_code', sanitize_text_field( $_POST['tuku_phone_code'] ) );
    }
}
add_action( 'woocommerce_checkout_update_order_meta', 'tuku_checkout_save_order_meta' );

/**
 * WooCommerce Admin: Display custom fields on order page
 */
function tuku_admin_order_data( $order ) {
    $order_id = $order->get_id();
    $doc_type   = get_post_meta( $order_id, '_tuku_doc_type', true );
    $doc_number = get_post_meta( $order_id, '_tuku_doc_number', true );
    $birthdate  = get_post_meta( $order_id, '_tuku_birthdate', true );
    $gender     = get_post_meta( $order_id, '_tuku_gender', true );
    $phone_code = get_post_meta( $order_id, '_tuku_phone_code', true );

    if ( $doc_type || $doc_number ) {
        echo '<p><strong>' . __( 'Documento', 'tuku' ) . ':</strong> ' . esc_html( $doc_type . ' ' . $doc_number ) . '</p>';
    }
    if ( $birthdate ) {
        echo '<p><strong>' . __( 'Fecha de nacimiento', 'tuku' ) . ':</strong> ' . esc_html( $birthdate ) . '</p>';
    }
    if ( $gender ) {
        echo '<p><strong>' . __( 'Género', 'tuku' ) . ':</strong> ' . esc_html( ucfirst( $gender ) ) . '</p>';
    }
    if ( $phone_code ) {
        echo '<p><strong>' . __( 'Código telefónico', 'tuku' ) . ':</strong> ' . esc_html( $phone_code ) . '</p>';
    }
}
add_action( 'woocommerce_admin_order_data_after_billing_address', 'tuku_admin_order_data' );

/**
 * ACF: Related products for itinerary (registered programmatically)
 */
add_action( 'acf/init', 'tuku_register_acf_related_products' );
function tuku_register_acf_related_products() {
    if ( ! function_exists( 'acf_add_local_field_group' ) ) return;

    acf_add_local_field_group( array(
        'key'    => 'group_productos_itinerario',
        'title'  => 'Productos relacionados – Itinerario',
        'fields' => array(
            array(
                'key'           => 'field_productos_itinerario',
                'label'         => 'Productos del itinerario',
                'name'          => 'productos_itinerario',
                'type'          => 'post_object',
                'post_type'     => array( 'product' ),
                'allow_null'    => 1,
                'multiple'      => 1,
                'return_format' => 'object',
                'ui'            => 1,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param'    => 'post_type',
                    'operator' => '==',
                    'value'    => 'product',
                ),
            ),
        ),
    ) );
}