<?php
/**
 * Custom Checkout Template - Tuku Travel (Stacked Accordion Steps)
 *
 * @package Tuku
 */

defined( 'ABSPATH' ) || exit;

if ( WC()->cart->is_empty() ) {
    wp_redirect( wc_get_cart_url() );
    exit;
}

do_action( 'woocommerce_before_checkout_form', $checkout );

if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
    echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
    return;
}

get_header();
?>

<section class="tuku-checkout-page">
    <div class="container">
        <a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="tuku-checkout-back">
            &larr; <?php _e( 'Regresar al carrito', 'tuku' ); ?>
        </a>
        <h1 class="tuku-checkout-title"><?php _e( '¡Falta poco! Completa tus datos y finaliza tu compra', 'tuku' ); ?></h1>

        <form name="checkout" method="post" class="checkout woocommerce-checkout tuku-checkout-form" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

            <div class="tuku-checkout-layout">
                <!-- LEFT: Stacked Steps -->
                <div class="tuku-checkout-steps">

                    <!-- ============ STEP 1: Traveler ============ -->
                    <div class="tuku-step-card active" data-step="1">
                        <div class="tuku-step-header">
                            <span class="tuku-step-num">1</span>
                            <h2 class="tuku-step-heading"><?php _e( '¿Quiénes viajan?', 'tuku' ); ?></h2>
                            <button type="button" class="tuku-step-edit" style="display:none;">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                                <?php _e( 'Editar', 'tuku' ); ?>
                            </button>
                        </div>

                        <!-- Summary (shown when completed) -->
                        <div class="tuku-step-summary" style="display:none;">
                            <div class="tuku-step-summary-text" id="summary-1"></div>
                        </div>

                        <!-- Form (shown when active) -->
                        <div class="tuku-step-body">
                            <div class="tuku-form-row tuku-form-row--2col">
                                <div class="tuku-form-field">
                                    <label for="tuku_first_name"><?php _e( 'Nombres', 'tuku' ); ?> <abbr class="required">*</abbr></label>
                                    <input type="text" id="tuku_first_name" name="billing_first_name" placeholder="<?php esc_attr_e( 'Ej: Juan Carlos', 'tuku' ); ?>" required value="<?php echo esc_attr( $checkout->get_value( 'billing_first_name' ) ); ?>">
                                </div>
                                <div class="tuku-form-field">
                                    <label for="tuku_last_name"><?php _e( 'Apellidos', 'tuku' ); ?> <abbr class="required">*</abbr></label>
                                    <input type="text" id="tuku_last_name" name="billing_last_name" placeholder="<?php esc_attr_e( 'Ej: Pérez López', 'tuku' ); ?>" required value="<?php echo esc_attr( $checkout->get_value( 'billing_last_name' ) ); ?>">
                                </div>
                            </div>

                            <div class="tuku-form-row tuku-form-row--2col">
                                <div class="tuku-form-field">
                                    <label for="tuku_doc_type"><?php _e( 'Documento de identidad', 'tuku' ); ?> <abbr class="required">*</abbr></label>
                                    <div class="tuku-input-group">
                                        <select id="tuku_doc_type" name="tuku_doc_type" class="tuku-select-inline">
                                            <option value="DNI">DNI</option>
                                            <option value="Pasaporte"><?php _e( 'Pasaporte', 'tuku' ); ?></option>
                                            <option value="CE"><?php _e( 'CE', 'tuku' ); ?></option>
                                        </select>
                                        <input type="text" id="tuku_doc_number" name="tuku_doc_number" placeholder="<?php esc_attr_e( 'N° de documento', 'tuku' ); ?>" required>
                                    </div>
                                </div>
                                <div class="tuku-form-field">
                                    <label for="billing_country"><?php _e( 'País de residencia', 'tuku' ); ?> <abbr class="required">*</abbr></label>
                                    <select id="billing_country" name="billing_country" class="tuku-select" required>
                                        <option value=""><?php _e( 'Seleccionar país', 'tuku' ); ?></option>
                                        <?php
                                        $countries = WC()->countries->get_countries();
                                        $current_country = $checkout->get_value( 'billing_country' );
                                        if ( ! $current_country ) $current_country = 'PE';
                                        foreach ( $countries as $code => $name ) :
                                        ?>
                                            <option value="<?php echo esc_attr( $code ); ?>" <?php selected( $current_country, $code ); ?>><?php echo esc_html( $name ); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="tuku-form-row tuku-form-row--2col">
                                <div class="tuku-form-field">
                                    <label for="tuku_birthdate"><?php _e( 'Fecha de nacimiento', 'tuku' ); ?> <abbr class="required">*</abbr></label>
                                    <input type="date" id="tuku_birthdate" name="tuku_birthdate" required>
                                </div>
                                <div class="tuku-form-field">
                                    <label for="tuku_gender"><?php _e( 'Género', 'tuku' ); ?> <abbr class="required">*</abbr></label>
                                    <select id="tuku_gender" name="tuku_gender" class="tuku-select" required>
                                        <option value=""><?php _e( 'Seleccionar', 'tuku' ); ?></option>
                                        <option value="Masculino"><?php _e( 'Masculino', 'tuku' ); ?></option>
                                        <option value="Femenino"><?php _e( 'Femenino', 'tuku' ); ?></option>
                                        <option value="Otro"><?php _e( 'Otro', 'tuku' ); ?></option>
                                        <option value="Prefiero no decir"><?php _e( 'Prefiero no decir', 'tuku' ); ?></option>
                                    </select>
                                </div>
                            </div>

                            <div class="tuku-step-actions">
                                <button type="button" class="tuku-btn-next" data-next="2"><?php _e( 'Siguiente', 'tuku' ); ?></button>
                            </div>
                        </div>
                    </div>

                    <!-- ============ STEP 2: Email ============ -->
                    <div class="tuku-step-card" data-step="2">
                        <div class="tuku-step-header">
                            <span class="tuku-step-num">2</span>
                            <h2 class="tuku-step-heading"><?php _e( '¿A dónde enviamos tus vouchers?', 'tuku' ); ?></h2>
                            <button type="button" class="tuku-step-edit" style="display:none;">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                                <?php _e( 'Editar', 'tuku' ); ?>
                            </button>
                        </div>

                        <div class="tuku-step-summary" style="display:none;">
                            <div class="tuku-step-summary-text" id="summary-2"></div>
                        </div>

                        <div class="tuku-step-body">
                            <div class="tuku-form-row">
                                <div class="tuku-form-field">
                                    <label for="billing_email"><?php _e( 'Correo electrónico', 'tuku' ); ?> <abbr class="required">*</abbr></label>
                                    <input type="email" id="billing_email" name="billing_email" placeholder="<?php esc_attr_e( 'correo@ejemplo.com', 'tuku' ); ?>" required value="<?php echo esc_attr( $checkout->get_value( 'billing_email' ) ); ?>">
                                </div>
                            </div>
                            <div class="tuku-form-row">
                                <div class="tuku-form-field">
                                    <label for="billing_email_confirm"><?php _e( 'Confirmar correo electrónico', 'tuku' ); ?> <abbr class="required">*</abbr></label>
                                    <input type="email" id="billing_email_confirm" name="billing_email_confirm" placeholder="<?php esc_attr_e( 'Repite tu correo', 'tuku' ); ?>" required>
                                </div>
                            </div>
                            <div class="tuku-step-actions">
                                <button type="button" class="tuku-btn-next" data-next="3"><?php _e( 'Siguiente', 'tuku' ); ?></button>
                            </div>
                        </div>
                    </div>

                    <!-- ============ STEP 3: Phone ============ -->
                    <div class="tuku-step-card" data-step="3">
                        <div class="tuku-step-header">
                            <span class="tuku-step-num">3</span>
                            <h2 class="tuku-step-heading"><?php _e( '¿A qué número vamos a contactarte?', 'tuku' ); ?></h2>
                            <button type="button" class="tuku-step-edit" style="display:none;">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                                <?php _e( 'Editar', 'tuku' ); ?>
                            </button>
                        </div>

                        <div class="tuku-step-summary" style="display:none;">
                            <div class="tuku-step-summary-text" id="summary-3"></div>
                        </div>

                        <div class="tuku-step-body">
                            <div class="tuku-form-row">
                                <div class="tuku-form-field">
                                    <label for="billing_phone"><?php _e( 'Teléfono', 'tuku' ); ?> <abbr class="required">*</abbr></label>
                                    <div class="tuku-input-group">
                                        <select id="tuku_phone_code" name="tuku_phone_code" class="tuku-select-inline tuku-phone-code">
                                            <option value="+51">+51</option>
                                            <option value="+1">+1</option>
                                            <option value="+54">+54</option>
                                            <option value="+55">+55</option>
                                            <option value="+56">+56</option>
                                            <option value="+57">+57</option>
                                            <option value="+52">+52</option>
                                            <option value="+34">+34</option>
                                            <option value="+593">+593</option>
                                            <option value="+591">+591</option>
                                            <option value="+44">+44</option>
                                            <option value="+33">+33</option>
                                            <option value="+49">+49</option>
                                        </select>
                                        <input type="tel" id="billing_phone" name="billing_phone" placeholder="<?php esc_attr_e( '999 999 999', 'tuku' ); ?>" required value="<?php echo esc_attr( $checkout->get_value( 'billing_phone' ) ); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="tuku-step-actions">
                                <button type="button" class="tuku-btn-next" data-next="4"><?php _e( 'Siguiente', 'tuku' ); ?></button>
                            </div>
                        </div>
                    </div>

                    <!-- ============ STEP 4: Payment ============ -->
                    <div class="tuku-step-card" data-step="4">
                        <div class="tuku-step-header">
                            <span class="tuku-step-num">4</span>
                            <h2 class="tuku-step-heading"><?php _e( '¿Cómo deseas pagar?', 'tuku' ); ?></h2>
                        </div>

                        <div class="tuku-step-body">
                            <div id="tuku-payment-methods">
                                <?php if ( WC()->payment_gateways() ) : ?>
                                    <div id="payment" class="woocommerce-checkout-payment">
                                        <?php woocommerce_checkout_payment(); ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <!-- Bank transfer info card -->
                            <div class="tuku-bank-info" id="tuku-bank-info" style="display:none;">
                                <div class="tuku-bank-card">
                                    <div class="tuku-bank-logo">
                                        <strong>BCP</strong>
                                    </div>
                                    <div class="tuku-bank-row">
                                        <span class="tuku-bank-label"><?php _e( 'Cuenta corriente:', 'tuku' ); ?></span>
                                        <span class="tuku-bank-value">
                                            193-2414529-0-80
                                            <button type="button" class="tuku-copy-btn" data-copy="193-2414529-0-80" title="Copiar">
                                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"/><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/></svg>
                                            </button>
                                        </span>
                                    </div>
                                    <div class="tuku-bank-row">
                                        <span class="tuku-bank-label"><?php _e( 'Titular:', 'tuku' ); ?></span>
                                        <span class="tuku-bank-value">Peruana en Rusia SAC - RUC 206000000000</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Place order button inside step 4 -->
                            <div class="tuku-place-order">
                                <?php echo apply_filters( 'woocommerce_order_button_html', '<button type="submit" class="tuku-btn-pay" name="woocommerce_checkout_place_order" id="place_order" value="' . esc_attr__( 'Ir a pagar', 'tuku' ) . '">' . esc_html__( 'Ir a pagar', 'tuku' ) . '</button>' ); ?>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- RIGHT: Order Summary Sidebar -->
                <div class="tuku-checkout-sidebar">
                    <div class="tuku-order-summary">
                        <h2 class="tuku-order-summary__title"><?php _e( 'Resumen del pedido', 'tuku' ); ?></h2>

                        <div class="tuku-order-items">
                            <?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) :
                                $_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                                $product_id = $cart_item['product_id'];

                                if ( ! $_product || ! $_product->exists() || $cart_item['quantity'] <= 0 ) continue;

                                $thumbnail = $_product->get_image( 'thumbnail' );
                                $product_name = $_product->get_name();
                                $sale_price = $_product->get_price();

                                $start_date = ! empty( $cart_item['tuku_start_date'] ) ? $cart_item['tuku_start_date'] : '';
                                $end_date   = ! empty( $cart_item['tuku_end_date'] )   ? $cart_item['tuku_end_date']   : '';
                                $guests     = ! empty( $cart_item['tuku_guests'] )      ? (int) $cart_item['tuku_guests'] : $cart_item['quantity'];

                                $date_display = '';
                                if ( $start_date ) {
                                    $date_display = date_i18n( 'j M', strtotime( $start_date ) );
                                    if ( $end_date ) {
                                        $date_display .= ' - ' . date_i18n( 'j M Y', strtotime( $end_date ) );
                                    } else {
                                        $date_display .= ' ' . date_i18n( 'Y', strtotime( $start_date ) );
                                    }
                                }
                            ?>
                            <div class="tuku-order-item">
                                <div class="tuku-order-item__thumb">
                                    <?php echo $thumbnail; ?>
                                </div>
                                <div class="tuku-order-item__info">
                                    <h4 class="tuku-order-item__name"><?php echo esc_html( $product_name ); ?></h4>
                                    <?php if ( $date_display ) : ?>
                                        <span class="tuku-order-item__meta">
                                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                                            <?php echo esc_html( $date_display ); ?>
                                        </span>
                                    <?php endif; ?>
                                    <?php if ( $guests ) : ?>
                                        <span class="tuku-order-item__meta">
                                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                                            <?php echo esc_html( $guests ); ?> <?php echo $guests === 1 ? __('adulto','tuku') : __('adultos','tuku'); ?>
                                        </span>
                                    <?php endif; ?>
                                    <span class="tuku-order-item__price">US$ <?php echo number_format( (float) $sale_price * $cart_item['quantity'], 0 ); ?></span>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>

                        <div class="tuku-order-totals">
                            <div class="tuku-order-row">
                                <span><?php printf( __( 'Subtotal (%d)', 'tuku' ), WC()->cart->get_cart_contents_count() ); ?></span>
                                <span>US$ <?php echo number_format( (float) WC()->cart->get_subtotal(), 0, ',', '.' ); ?></span>
                            </div>
                            <?php
                            $tax_total = (float) WC()->cart->get_taxes_total();
                            if ( $tax_total > 0 ) : ?>
                            <div class="tuku-order-row">
                                <span><?php _e( 'Impuestos', 'tuku' ); ?></span>
                                <span>US$ <?php echo number_format( $tax_total, 0, ',', '.' ); ?></span>
                            </div>
                            <?php endif; ?>
                            <?php
                            $discount = (float) WC()->cart->get_discount_total();
                            if ( $discount > 0 ) : ?>
                            <div class="tuku-order-row tuku-order-discount">
                                <span><?php _e( 'Descuento', 'tuku' ); ?></span>
                                <span>-US$ <?php echo number_format( $discount, 0, ',', '.' ); ?></span>
                            </div>
                            <?php endif; ?>
                            <div class="tuku-order-total">
                                <span><?php _e( 'Total', 'tuku' ); ?></span>
                                <span>US$ <?php echo number_format( (float) WC()->cart->get_total( 'edit' ), 0, ',', '.' ); ?></span>
                            </div>
                        </div>

                        <div class="tuku-checkout-terms">
                            <label class="tuku-checkbox">
                                <input type="checkbox" name="terms" id="terms" required>
                                <span class="tuku-checkbox-text">
                                    <?php printf( __( 'He leído y acepto los %stérminos y condiciones%s', 'tuku' ), '<a href="' . esc_url( get_privacy_policy_url() ) . '" target="_blank">', '</a>' ); ?>
                                </span>
                            </label>
                        </div>

                        <div class="tuku-checkout-policies">
                            <div class="tuku-policy">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#999" stroke-width="1.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                                <div>
                                    <strong><?php _e( 'Pago seguro', 'tuku' ); ?></strong>
                                    <p><?php _e( 'Tus datos están protegidos con encriptación SSL.', 'tuku' ); ?></p>
                                </div>
                            </div>
                            <div class="tuku-policy">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#999" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                <div>
                                    <strong><?php _e( 'Política de cancelación', 'tuku' ); ?></strong>
                                    <p><?php _e( 'Cancelación gratuita hasta 48 horas antes del inicio.', 'tuku' ); ?></p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <?php wp_nonce_field( 'woocommerce-process_checkout', 'woocommerce-process-checkout-nonce' ); ?>

        </form>
    </div>
</section>

<script>
(function() {
    var currentStep = 1;

    // Build summary text for each step
    function buildSummary(step) {
        var html = '';
        if (step === 1) {
            var first = document.getElementById('tuku_first_name').value;
            var last = document.getElementById('tuku_last_name').value;
            var docType = document.getElementById('tuku_doc_type').value;
            var docNum = document.getElementById('tuku_doc_number').value;
            var countrySelect = document.getElementById('billing_country');
            var country = countrySelect.options[countrySelect.selectedIndex].text;
            var birth = document.getElementById('tuku_birthdate').value;
            var genderSelect = document.getElementById('tuku_gender');
            var gender = genderSelect.options[genderSelect.selectedIndex].text;

            html += '<strong>Adulto 1</strong><br>';
            html += first + ' ' + last + '<br>';
            html += docType + ' ' + docNum + '<br>';
            html += country + '<br>';
            if (birth) html += birth + '<br>';
            if (gender && genderSelect.value) html += gender;
        }
        else if (step === 2) {
            var email = document.getElementById('billing_email').value;
            html = email;
        }
        else if (step === 3) {
            var code = document.getElementById('tuku_phone_code').value;
            var phone = document.getElementById('billing_phone').value;
            html = code + ' ' + phone;
        }
        return html;
    }

    function setStepState(step, state) {
        var card = document.querySelector('.tuku-step-card[data-step="' + step + '"]');
        if (!card) return;

        var body = card.querySelector('.tuku-step-body');
        var summary = card.querySelector('.tuku-step-summary');
        var editBtn = card.querySelector('.tuku-step-edit');

        card.classList.remove('active', 'completed', 'pending');
        card.classList.add(state);

        if (state === 'active') {
            body.style.display = '';
            if (summary) summary.style.display = 'none';
            if (editBtn) editBtn.style.display = 'none';
        }
        else if (state === 'completed') {
            body.style.display = 'none';
            if (summary) {
                summary.style.display = '';
                var summaryText = summary.querySelector('.tuku-step-summary-text');
                if (summaryText) summaryText.innerHTML = buildSummary(step);
            }
            if (editBtn) editBtn.style.display = '';
        }
        else {
            body.style.display = 'none';
            if (summary) summary.style.display = 'none';
            if (editBtn) editBtn.style.display = 'none';
        }
    }

    function goToStep(step) {
        // Mark all steps before as completed, target as active, rest as pending
        for (var i = 1; i <= 4; i++) {
            if (i < step) {
                setStepState(i, 'completed');
            } else if (i === step) {
                setStepState(i, 'active');
            } else {
                setStepState(i, 'pending');
            }
        }
        currentStep = step;

        // Scroll to active card
        var activeCard = document.querySelector('.tuku-step-card[data-step="' + step + '"]');
        if (activeCard) {
            activeCard.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    }

    function validateStep(step) {
        var card = document.querySelector('.tuku-step-card[data-step="' + step + '"]');
        if (!card) return true;

        var body = card.querySelector('.tuku-step-body');
        var inputs = body.querySelectorAll('input[required], select[required]');
        var valid = true;

        inputs.forEach(function(input) {
            input.classList.remove('tuku-input-error');
            if (!input.value.trim()) {
                valid = false;
                input.classList.add('tuku-input-error');
            }
        });

        if (step === 2) {
            var email = document.getElementById('billing_email');
            var emailConfirm = document.getElementById('billing_email_confirm');
            if (email && emailConfirm && email.value !== emailConfirm.value) {
                valid = false;
                emailConfirm.classList.add('tuku-input-error');
            }
        }

        return valid;
    }

    // Next buttons
    document.querySelectorAll('.tuku-btn-next').forEach(function(btn) {
        btn.addEventListener('click', function() {
            var nextStep = parseInt(this.getAttribute('data-next'));
            if (validateStep(currentStep)) {
                goToStep(nextStep);
            }
        });
    });

    // Edit buttons
    document.querySelectorAll('.tuku-step-edit').forEach(function(btn) {
        btn.addEventListener('click', function() {
            var card = this.closest('.tuku-step-card');
            var step = parseInt(card.getAttribute('data-step'));
            goToStep(step);
        });
    });

    // Copy bank account number
    document.querySelectorAll('.tuku-copy-btn').forEach(function(btn) {
        btn.addEventListener('click', function() {
            var text = this.getAttribute('data-copy');
            if (navigator.clipboard) {
                navigator.clipboard.writeText(text);
            }
        });
    });

    // Show/hide bank info based on payment method
    var bankInfo = document.getElementById('tuku-bank-info');
    if (bankInfo) {
        document.body.addEventListener('change', function(e) {
            if (e.target.name === 'payment_method') {
                bankInfo.style.display = (e.target.value === 'bacs') ? 'block' : 'none';
            }
        });
        var checked = document.querySelector('input[name="payment_method"]:checked');
        if (checked && checked.value === 'bacs') {
            bankInfo.style.display = 'block';
        }
    }

    // Init: step 1 active
    goToStep(1);
})();
</script>

<?php
do_action( 'woocommerce_after_checkout_form', $checkout );
get_footer();
