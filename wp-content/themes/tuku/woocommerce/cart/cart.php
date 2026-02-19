<?php
/**
 * Custom Cart Template - Tuku Travel
 *
 * @package Tuku
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_cart' );

get_header();
?>

<section class="tuku-cart-page">
    <div class="container">
        <a href="javascript:history.back()" class="tuku-cart-back">
            ← <?php _e( 'Regresar', 'tuku' ); ?>
        </a>
        <h1 class="tuku-cart-title"><?php _e( 'Mi Carrito de compras', 'tuku' ); ?></h1>

        <?php if ( WC()->cart->is_empty() ) : ?>

            <div class="tuku-cart-empty-inline">
                <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#999" stroke-width="1.5">
                    <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <path d="M16 10a4 4 0 0 1-8 0"></path>
                </svg>
                <h2><?php _e( 'Tu carrito está vacío', 'tuku' ); ?></h2>
                <p><?php _e( 'Quieres quitar esta actividad de tu carrito?', 'tuku' ); ?></p>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="tuku-cart-btn-outline">
                    <?php _e( 'Agregar productos', 'tuku' ); ?>
                </a>
            </div>

        <?php else : ?>

            <div class="tuku-cart-layout">
                <div class="tuku-cart-items">
                    <form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
                        <?php do_action( 'woocommerce_before_cart_table' ); ?>

                        <?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) :
                            $_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                            $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

                            if ( ! $_product || ! $_product->exists() || $cart_item['quantity'] <= 0 ) continue;
                            if ( ! apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) continue;

                            $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
                            $thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image( 'thumbnail' ), $cart_item, $cart_item_key );
                            $product_name = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );

                            // Get destination
                            $destinos = wp_get_object_terms( $product_id, 'destinos' );
                            $destino_name = ! empty( $destinos ) && ! is_wp_error( $destinos ) ? $destinos[0]->name : '';

                            // Get dates and guests from cart item
                            $start_date = ! empty( $cart_item['tuku_start_date'] ) ? $cart_item['tuku_start_date'] : '';
                            $end_date   = ! empty( $cart_item['tuku_end_date'] )   ? $cart_item['tuku_end_date']   : '';
                            $guests     = ! empty( $cart_item['tuku_guests'] )      ? (int) $cart_item['tuku_guests'] : $cart_item['quantity'];

                            // Format dates
                            $date_display = '';
                            if ( $start_date ) {
                                $date_display = date_i18n( 'D, j M Y', strtotime( $start_date ) );
                                if ( $end_date ) {
                                    $date_display .= ' – ' . date_i18n( 'D, j M Y', strtotime( $end_date ) );
                                }
                            }

                            // Prices
                            $line_total = apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
                            $regular_price = $_product->get_regular_price();
                            $sale_price = $_product->get_price();
                            $is_on_sale = $_product->is_on_sale();
                        ?>

                        <div class="tuku-cart-item" data-key="<?php echo esc_attr( $cart_item_key ); ?>">
                            <div class="tuku-cart-item__thumb">
                                <?php if ( $product_permalink ) : ?>
                                    <a href="<?php echo esc_url( $product_permalink ); ?>"><?php echo $thumbnail; ?></a>
                                <?php else : ?>
                                    <?php echo $thumbnail; ?>
                                <?php endif; ?>
                            </div>
                            <div class="tuku-cart-item__info">
                                <div class="tuku-cart-item__header">
                                    <div>
                                        <h3 class="tuku-cart-item__name">
                                            <?php if ( $product_permalink ) : ?>
                                                <a href="<?php echo esc_url( $product_permalink ); ?>"><?php echo $product_name; ?></a>
                                            <?php else : ?>
                                                <?php echo $product_name; ?>
                                            <?php endif; ?>
                                        </h3>
                                        <?php if ( $destino_name ) : ?>
                                            <span class="tuku-cart-item__location"><?php _e( 'En', 'tuku' ); ?> <?php echo esc_html( $destino_name ); ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <button type="button" class="tuku-cart-item__remove" data-key="<?php echo esc_attr( $cart_item_key ); ?>" data-name="<?php echo esc_attr( $product_name ); ?>" aria-label="<?php esc_attr_e( 'Quitar', 'tuku' ); ?>">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                            <polyline points="3 6 5 6 21 6"></polyline>
                                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                        </svg>
                                    </button>
                                </div>
                                <div class="tuku-cart-item__meta">
                                    <?php if ( $date_display ) : ?>
                                    <span class="tuku-cart-item__date">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                                        <?php echo esc_html( $date_display ); ?>
                                    </span>
                                    <?php endif; ?>
                                    <?php if ( $guests ) : ?>
                                    <span class="tuku-cart-item__guests">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                                        <?php echo esc_html( $guests ); ?> <?php echo $guests === 1 ? __('adulto','tuku') : __('adultos','tuku'); ?>
                                    </span>
                                    <?php endif; ?>
                                </div>
                                <div class="tuku-cart-item__price">
                                    <?php if ( $is_on_sale && $regular_price ) : ?>
                                        <span class="tuku-cart-item__price-regular">US$ <?php echo number_format( (float) $regular_price * $cart_item['quantity'], 0 ); ?></span>
                                    <?php endif; ?>
                                    <span class="tuku-cart-item__price-current">US$ <?php echo number_format( (float) $sale_price * $cart_item['quantity'], 0 ); ?></span>
                                </div>
                            </div>
                        </div>

                        <?php endforeach; ?>

                        <?php do_action( 'woocommerce_after_cart_table' ); ?>
                    </form>
                </div>

                <div class="tuku-cart-summary">
                    <h2 class="tuku-cart-summary__title"><?php _e( 'Detalles del precio', 'tuku' ); ?></h2>
                    <div class="tuku-cart-summary__card">
                        <div class="tuku-cart-summary__row">
                            <span><?php printf( __( 'Productos (%d)', 'tuku' ), WC()->cart->get_cart_contents_count() ); ?></span>
                            <span>$ <?php echo number_format( (float) WC()->cart->get_subtotal(), 0, ',', '.' ); ?></span>
                        </div>
                        <?php
                        $tax_total = (float) WC()->cart->get_taxes_total();
                        if ( $tax_total > 0 ) : ?>
                        <div class="tuku-cart-summary__row">
                            <span><?php _e( 'Impuestos y tasas', 'tuku' ); ?></span>
                            <span>$ <?php echo number_format( $tax_total, 0, ',', '.' ); ?></span>
                        </div>
                        <?php endif; ?>
                        <?php
                        $discount = (float) WC()->cart->get_discount_total();
                        if ( $discount > 0 ) : ?>
                        <div class="tuku-cart-summary__row tuku-cart-summary__discount">
                            <span><?php _e( 'Descuento', 'tuku' ); ?></span>
                            <span>$ -<?php echo number_format( $discount, 0, ',', '.' ); ?></span>
                        </div>
                        <?php endif; ?>

                        <div class="tuku-cart-summary__total">
                            <span><?php _e( 'Total', 'tuku' ); ?></span>
                            <span>$ <?php echo number_format( (float) WC()->cart->get_total( 'edit' ), 0, ',', '.' ); ?></span>
                        </div>

                        <a href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="tuku-cart-btn-primary">
                            <?php _e( 'Ir a pagar', 'tuku' ); ?>
                        </a>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="tuku-cart-btn-outline">
                            <?php _e( 'Seguir comprando', 'tuku' ); ?>
                        </a>
                    </div>
                </div>
            </div>

        <?php endif; ?>
    </div>
</section>

<!-- Remove item modal -->
<div class="tuku-modal" id="tuku-remove-modal" style="display:none;">
    <div class="tuku-modal__overlay"></div>
    <div class="tuku-modal__content">
        <button type="button" class="tuku-modal__close">×</button>
        <h3><?php _e( 'Quitar producto', 'tuku' ); ?></h3>
        <p><?php _e( 'Quieres quitar esta actividad de tu carrito?', 'tuku' ); ?></p>
        <div class="tuku-modal__actions">
            <button type="button" class="tuku-modal__cancel"><?php _e( 'No, quiero mantenerlo', 'tuku' ); ?></button>
            <a href="#" class="tuku-modal__confirm" id="tuku-remove-confirm"><?php _e( 'Quitar', 'tuku' ); ?></a>
        </div>
    </div>
</div>

<script>
(function() {
    var modal = document.getElementById('tuku-remove-modal');
    var confirmBtn = document.getElementById('tuku-remove-confirm');
    if (!modal) return;

    // Open modal
    document.querySelectorAll('.tuku-cart-item__remove').forEach(function(btn) {
        btn.addEventListener('click', function() {
            var key = this.getAttribute('data-key');
            var nonce = '<?php echo wp_create_nonce( 'woocommerce-cart' ); ?>';
            confirmBtn.href = '<?php echo esc_url( wc_get_cart_url() ); ?>?remove_item=' + key + '&_wpnonce=' + nonce;
            modal.style.display = 'flex';
        });
    });

    // Close modal
    modal.querySelector('.tuku-modal__overlay').addEventListener('click', function() { modal.style.display = 'none'; });
    modal.querySelector('.tuku-modal__close').addEventListener('click', function() { modal.style.display = 'none'; });
    modal.querySelector('.tuku-modal__cancel').addEventListener('click', function() { modal.style.display = 'none'; });
})();
</script>

<?php
do_action( 'woocommerce_after_cart' );
get_footer();
