<?php
/**
 * Empty cart page - Tuku Travel
 *
 * @package Tuku
 */

defined( 'ABSPATH' ) || exit;
?>

<section class="tuku-cart-page">
    <div class="container">
        <a href="javascript:history.back()" class="tuku-cart-back">
            &larr; <?php _e( 'Regresar', 'tuku' ); ?>
        </a>
        <h1 class="tuku-cart-title"><?php _e( 'Mi Carrito de compras', 'tuku' ); ?></h1>

        <?php if ( wc_notice_count( 'notice' ) > 0 || wc_notice_count( 'success' ) > 0 || wc_notice_count( 'error' ) > 0 ) : ?>
            <?php wc_print_notices(); ?>
        <?php endif; ?>

        <div class="tuku-cart-empty-inline">
            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#999" stroke-width="1.5">
                <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                <line x1="3" y1="6" x2="21" y2="6"></line>
                <path d="M16 10a4 4 0 0 1-8 0"></path>
            </svg>
            <h2><?php _e( 'Tu carrito est&aacute; vac&iacute;o', 'tuku' ); ?></h2>
            <p><?php _e( 'Explora nuestros tours y agrega actividades a tu carrito.', 'tuku' ); ?></p>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="tuku-cart-btn-outline">
                <?php _e( 'Agregar productos', 'tuku' ); ?>
            </a>
        </div>
    </div>
</section>
