<?php
/**
 * The Template for displaying single products (migrated from tours)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * @package WooCommerce
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * woocommerce_before_main_content hook.
 */
do_action( 'woocommerce_before_main_content' );

while ( have_posts() ) :
    the_post();

    $title = get_the_title();

    // Get WooCommerce product data
    $product = wc_get_product( get_the_ID() );
    $product_price = '';
    $product_regular_price = '';
    $product_discount = 0;
    if ( $product ) {
        $product_price = $product->get_price();
        $product_regular_price = $product->get_regular_price();
        if ( $product->is_on_sale() && $product_regular_price > 0 ) {
            $product_discount = round( ( ( $product_regular_price - $product_price ) / $product_regular_price ) * 100 );
        }
    }
?>

<style>
    .star__coment img{
        display: none;
    }
    .star__coment img.checked{
        display: initial;
    }

    .social-float{
        display: none;
    }

	.tour-detail-heart p{
		cursor: pointer;
		display: flex;
		align-items: center;
	}

	.tour-detail-heart p span {
		margin-left: 5px;
	}

	.tour-detail-heart > p:first-child{
		display: none;
	}

	.tour-detail-heart > p:last-child{
		display: block;
	}

	.tour-detail-heart.active > p{
		display: block;
	}

	.tour-detail-heart.active > p:last-child{
		display: none;
	}
</style>



<?php if ( have_rows( 'galeria' ) ) : ?>
	<div class="slide-about block__entry">
	    <div class="images-swiper detail-tour">
	        <button class="btn__gallery" href="#" id="dynamic">
	            <img src="<?php echo get_template_directory_uri(); ?>/assets/img//gallery.svg">
	            <?php _e('ver galería','tuku') ?>
	        </button>
	        <div class="swiper-wrapper">
	            <?php while ( have_rows( 'galeria' ) ) : the_row(); ?>
		            <div class="swiper-slide">
		                <img src="<?php the_sub_field( 'imagen_galeria' ); ?>">
		            </div>
		        <?php endwhile; ?>
	        </div>
	    </div>
	</div>
<?php endif; ?>

<?php if ( have_rows( 'galeria' ) ) : ?>

<script>
    $('#dynamic').on('click', function() {

    $(this).lightGallery({
        download: false,
        share: false,
        rotate: false,
        sizes: false,
        dynamic: true,
        dynamicEl: [
            <?php while ( have_rows( 'galeria' ) ) : the_row(); ?>

                {
                    "src": '<?php the_sub_field( 'imagen_galeria' ); ?>',
                    'thumb': '<?php the_sub_field( 'imagen_galeria' ); ?>'
                },
            <?php endwhile; ?>
        ]
    })

});
</script>



<?php endif; ?>

<section class="block__entry">
    <div class="container">
        <div class="entry__content">
            <div class="entry__top">
                <div class="title__entry">
                    <h1 dataTitle="<?php echo $title; ?>"><?php the_title(); ?></h1>
                    <div class="cat__entry">



        <?php   // Get terms for post
        $terms = get_the_terms( $post->ID , 'itinerarios' );
                                             // Loop over each item since it's an array

        if ( $terms != null ){
            foreach( $terms as $term ) {
                $image = get_field('icono_iti', 'itinerarios_' . $term->term_id );
                                             // Print the name method from $term which is an OBJECT
                echo '<div class="cat__item">';
                                    echo '<img src="' . $image['url'] . '" alt="' . $image['alt'] .'">';
                                    echo '</div>';
                                             // Get rid of the other data stored in the object, since it's not needed
                unset($term);
        } } ?>

                    </div>
                </div>
				<!-- heart wish -->
				<span class="tour-detail-heart" data-product="<?php echo get_the_ID(); ?>">
					<p>
						<?php _e('Eliminar de favoritos','tuku') ?> <span class="icon-heart-11"></span>
					</p>
					<p>
						 <?php _e('Agregar a favoritos','tuku') ?> <span class="icon-heart3"></span>
					</p>
				</span>

                <?php the_content(); ?>
            </div>
            <div class="entry__text">
                <div class="wrap__price">
                    <span class="price-label"><?php _e('Precio por adulto desde','tuku') ?></span>
                    <div class="price-row">
                        <span class="price-current">$<?php echo esc_html( number_format( (float) $product_price, 0, ',', '.' ) ); ?></span>
                        <?php if ( $product->is_on_sale() && $product_regular_price ) : ?>
                            <span class="price-regular">US$ <?php echo esc_html( number_format( (float) $product_regular_price, 0, ',', '.' ) ); ?></span>
                            <span class="price-discount">-<?php echo esc_html( $product_discount ); ?>%</span>
                        <?php endif; ?>
                    </div>
                </div>

                <?php
                // Display compact date selector if calendar plugin is active
                if ( class_exists('PAC_Frontend_Display') && get_post_meta( get_the_ID(), '_pac_enable_calendar', true ) !== '0' ) :
                    $pac_display = new PAC_Frontend_Display();
                    $pac_config  = $pac_display->get_availability_config( get_the_ID() );
                    $current_lang = function_exists('pll_current_language') ? pll_current_language() : substr(get_locale(), 0, 2);
                    $is_spanish   = ($current_lang === 'es');
                ?>
                <div class="entry-date-picker" id="entry-date-picker-<?php echo get_the_ID(); ?>">
                    <div class="date-picker-row">
                        <div class="date-picker-col date-picker-trigger">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                <line x1="3" y1="10" x2="21" y2="10"></line>
                            </svg>
                            <input type="text" id="pac-entry-date-input" name="pac_date" class="pac-entry-date-field" readonly placeholder="<?php echo $is_spanish ? 'Inicio - Fin' : 'Start - End'; ?>">
                        </div>
                        <div class="date-picker-separator"></div>
                        <div class="date-picker-col pac-guests-col">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                            <button type="button" class="guest-btn guest-minus" aria-label="Menos">−</button>
                            <span class="guest-count">1</span>
                            <button type="button" class="guest-btn guest-plus" aria-label="Más">+</button>
                            <span class="guest-label"><?php _e('adulto','tuku') ?></span>
                            <input type="hidden" id="pac-entry-guests" name="pac_guests" value="1">
                        </div>
                    </div>
                </div>

                <script>
                (function() {
                    var pacConfig = <?php echo wp_json_encode($pac_config); ?>;
                    var isSpanish = <?php echo $is_spanish ? 'true' : 'false'; ?>;

                    function fmtShort(date) {
                        var opts = { weekday: 'short', day: 'numeric', month: 'short' };
                        var s = date.toLocaleDateString(isSpanish ? 'es-ES' : 'en-US', opts);
                        return s.charAt(0).toUpperCase() + s.slice(1);
                    }

                    function initEntryDatePicker() {
                        if (typeof flatpickr === 'undefined') {
                            setTimeout(initEntryDatePicker, 100);
                            return;
                        }

                        var dateInput = document.getElementById('pac-entry-date-input');
                        if (!dateInput) return;

                        var fpOptions = {
                            mode: 'range',
                            dateFormat: 'Y-m-d',
                            locale: isSpanish && flatpickr.l10ns && flatpickr.l10ns.es ? 'es' : 'default',
                            showMonths: window.innerWidth > 576 ? 2 : 1,
                            minDate: 'today',
                            disableMobile: true,
                            closeOnSelect: false,
                            onChange: function(selectedDates, dateStr, instance) {
                                // Update bottom bar text
                                var bar = instance.calendarContainer.querySelector('.pac-range-bar-text');
                                if (bar) {
                                    if (selectedDates.length === 1) {
                                        bar.textContent = fmtShort(selectedDates[0]) + ' – ';
                                    } else if (selectedDates.length === 2) {
                                        bar.textContent = fmtShort(selectedDates[0]) + ' – ' + fmtShort(selectedDates[1]);
                                    }
                                }
                                // Update input display
                                if (selectedDates.length === 2) {
                                    dateInput.value = fmtShort(selectedDates[0]) + ' – ' + fmtShort(selectedDates[1]);
                                } else if (selectedDates.length === 1) {
                                    dateInput.value = fmtShort(selectedDates[0]) + ' – ';
                                }
                            },
                            onReady: function(selectedDates, dateStr, instance) {
                                instance.calendarContainer.classList.add('pac-entry-flatpickr');

                                // Build bottom bar
                                var bar = document.createElement('div');
                                bar.className = 'pac-range-bar';
                                bar.innerHTML =
                                    '<span class="pac-range-bar-text">' + (isSpanish ? 'Seleccionar fechas' : 'Select dates') + '</span>' +
                                    '<div class="pac-range-bar-actions">' +
                                        '<button type="button" class="pac-range-clear">' + (isSpanish ? 'Borrar' : 'Clear') + '</button>' +
                                        '<button type="button" class="pac-range-apply">' + (isSpanish ? 'Aplicar' : 'Apply') + '</button>' +
                                    '</div>';
                                instance.calendarContainer.appendChild(bar);

                                bar.querySelector('.pac-range-clear').addEventListener('click', function() {
                                    instance.clear();
                                    dateInput.value = '';
                                    bar.querySelector('.pac-range-bar-text').textContent = isSpanish ? 'Seleccionar fechas' : 'Select dates';
                                    window.pac_selected_date = null;
                                    window.pac_selected_date_end = null;
                                });

                                bar.querySelector('.pac-range-apply').addEventListener('click', function() {
                                    var sel = instance.selectedDates;
                                    if (sel.length === 2) {
                                        window.pac_selected_date = instance.formatDate(sel[0], 'Y-m-d');
                                        window.pac_selected_date_end = instance.formatDate(sel[1], 'Y-m-d');
                                        window.pac_selected_date_display = fmtShort(sel[0]) + ' – ' + fmtShort(sel[1]);
                                    }
                                    instance.close();
                                });
                            }
                        };

                        // Date restrictions
                        var disabledDates = pacConfig.disabled_dates || [];
                        var enabledDates = pacConfig.enabled_dates || [];
                        var dayRestrictions = (pacConfig.day_restrictions || []).map(Number);
                        var hasAllDays = dayRestrictions.length === 0 || dayRestrictions.length === 7;

                        if (disabledDates.length > 0 || enabledDates.length > 0 || !hasAllDays) {
                            fpOptions.disable = [function(date) {
                                var y = date.getFullYear(), m = String(date.getMonth()+1).padStart(2,'0'), d = String(date.getDate()).padStart(2,'0');
                                var ds = y+'-'+m+'-'+d;
                                if (enabledDates.indexOf(ds) !== -1) return false;
                                if (disabledDates.indexOf(ds) !== -1) return true;
                                if (!hasAllDays && dayRestrictions.indexOf(date.getDay()) === -1) return true;
                                return false;
                            }];
                        }
                        if (pacConfig.max_date) fpOptions.maxDate = pacConfig.max_date;

                        flatpickr(dateInput, fpOptions);
                    }

                    // Guest counter
                    function initGuestCounter() {
                        var col = document.querySelector('.pac-guests-col');
                        if (!col) return;
                        var countEl = col.querySelector('.guest-count');
                        var labelEl = col.querySelector('.guest-label');
                        var hiddenInput = document.getElementById('pac-entry-guests');
                        var minusBtn = col.querySelector('.guest-minus');
                        var plusBtn = col.querySelector('.guest-plus');
                        var count = 1;

                        function update() {
                            countEl.textContent = count;
                            hiddenInput.value = count;
                            labelEl.textContent = count === 1 ? (isSpanish ? 'adulto' : 'adult') : (isSpanish ? 'adultos' : 'adults');
                            minusBtn.disabled = count <= 1;
                        }

                        minusBtn.addEventListener('click', function(e) { e.stopPropagation(); if (count > 1) { count--; update(); } });
                        plusBtn.addEventListener('click', function(e) { e.stopPropagation(); if (count < 20) { count++; update(); } });
                        update();
                    }

                    function syncForm() {
                        var form = document.querySelector('.tuku-add-to-cart');
                        if (!form) return;
                        form.querySelector('.tuku-start-date').value = window.pac_selected_date || '';
                        form.querySelector('.tuku-end-date').value = window.pac_selected_date_end || '';
                        form.querySelector('.tuku-guests-input').value = document.getElementById('pac-entry-guests').value;
                        form.querySelector('.tuku-qty-input').value = document.getElementById('pac-entry-guests').value;
                    }

                    // Sync before form submit
                    document.addEventListener('DOMContentLoaded', function() {
                        var form = document.querySelector('.tuku-add-to-cart');
                        if (form) {
                            form.addEventListener('submit', syncForm);
                        }
                    });

                    if (document.readyState === 'loading') {
                        document.addEventListener('DOMContentLoaded', function() { initEntryDatePicker(); initGuestCounter(); });
                    } else {
                        initEntryDatePicker();
                        initGuestCounter();
                    }
                })();
                </script>
                <?php endif; ?>

                <form class="tuku-add-to-cart" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="add-to-cart" value="<?php echo get_the_ID(); ?>">
                    <input type="hidden" name="quantity" value="1" class="tuku-qty-input">
                    <input type="hidden" name="tuku_start_date" value="" class="tuku-start-date">
                    <input type="hidden" name="tuku_end_date" value="" class="tuku-end-date">
                    <input type="hidden" name="tuku_guests" value="1" class="tuku-guests-input">
                    <button type="submit" class="btn-add-to-cart"><?php _e('Agregar al carrito','tuku') ?></button>
                </form>
            </div>
        </div>
    </div>
</section>

<section class="tab__info">
    <div class="container">
        <div class="menu__tab">
            <div class="ul__wrap">
                <div class="lista__item">
                    <a href="#overview"><?php _e('Resumen','tuku') ?></a>
                </div>
                <div class="lista__item">
                    <a href="#itinerary"><?php _e('Itinerario','tuku') ?></a>
                </div>
                <div class="lista__item">
                    <a href="#servicios"><?php _e('Servicios incluidos','tuku') ?></a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="tab__content">
    <div class="container tabs__content">
        <?php if ( have_rows( 'highlights' ) ) : ?>
        <div id="overview" class="overview__content">
            <h1><?php the_title(); ?></h1>
            <h3><?php _e('Destacados','tuku') ?></h3>
            <ul>
                <?php while ( have_rows( 'highlights' ) ) : the_row(); ?>
                    <li><img src="<?php echo get_template_directory_uri(); ?>/assets/img/star-o.svg" alt=""> <?php the_sub_field( 'highlight_item' ); ?></li>
                <?php endwhile; ?>
            </ul>
        </div>
        <?php endif; ?>
        <?php if ( have_rows( 'summary' ) ) : $s;?>
            <div id="itinerary" class="itinerario__wrap">
                <h1><?php _e('Resumen de itinerario','tuku') ?></h3>
                <div class="accordeon__itineratio">
                    <?php while ( have_rows( 'summary' ) ) : the_row(); $s++;?>
                        <div class="accordeon-title">
                            <div class="wrap__number"><?php echo $s; ?></div>
                            <div class="wrap__title__iti">
                                <h6><?php _e('Día','tuku') ?> <?php echo $s; ?></h6>
                                <h3><?php the_sub_field( 'titulo_summary' ); ?></h3>
                            </div>
                        </div>
                        <div class="accordeon-content">
                            <?php the_sub_field( 'contenido_summary' ); ?>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        <?php endif; ?>

        <style>
            .mtours-block{
                padding: 40px 0;
            }

            .mtours-block-title{
                margin-bottom: 20px;
            }

            .mtours-block-title h3{
                font-family: Poppins-SemiBold;
                font-weight: 600;
                font-size: 18px;
                font-stretch: normal;
                font-style: normal;
                line-height: 1.61;
                letter-spacing: normal;
                text-align: left;
                color: #d81159;
            }

            .mtours-block__items{
                display: flex;
                flex-wrap: wrap;
            }

            .mtours-block__item{
                padding: 10px 18px 13px 11px;
                box-sizing: border-box;
                display: flex;
                position: relative;
                width: 45%;
                margin-right: 10%;
                margin-bottom: 7px;
            }

            .mtours-block__item:nth-child(2n+2){
                margin-right: 0;
            }

            .mtours-block__item:before{
                content: "";
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: #d5d5d5;
                opacity: 0;
                transition: all .25s ease;
                z-index: 1;
            }

            .mtours-block__item:hover:before{
                opacity: 0.25;
            }

            .mtours-block__itemBg{
                width: 132px;
                height: 80px;
                background-repeat: no-repeat;
                background-position: 0 0;
                background-size: 100%;
                margin: 0;
                position: relative;
                z-index: 3;
            }

            .mtours-block__itemInfo{
                width: calc(100% - 132px);
                padding-left: 30px;
                box-sizing: border-box;
                position: relative
                z-index: 3;
            }

            .mtours-block__itemInfoTitle h3{
                color: #3e3e3e;
                font-family: Poppins-SemiBold;
                font-size: 16px;
                line-height: 1.2;
            }

            .mtours-block__itemInfoPriceUrl{
                display: flex;
                align-items: center;
                justify-content: space-between;
                margin-top: 10px;
            }


            .mtours-block__itemInfoPrice > i{
                font-size: 13px;
                line-height: 1.2;
                color: #d81159;
                font-style: normal;
                font-family: Poppins-SemiBold;
            }

            .mtours-block__itemInfoPrice{
                font-size: 15px;
                line-height: 1.2;
                color: #d81159;
                font-family: Poppins-SemiBold;
            }

            .mtours-block__itemInfoUrl{
                font-size: 14px;
                line-height: 1.2;
                color: #d81159;
                font-family: Poppins-Regular;
            }

            @media screen and (max-width: 991px){
                .mtours-block__item{
                    width: 48%;
                    margin-right: 4%;
                }

                .mtours-block__itemBg{
                    width: 110px;
                }

                .mtours-block__itemInfo{
                    width: calc(100% - 110px);
                    padding-left: 24px;
                }
            }

            @media screen and (max-width: 767px){
                .mtours-block{
                    padding: 30px 0;
                }

                .mtours-block-title h3{
                    font-size: 14px;
                }

                .mtours-block__item{
                    width: 100%;
                    margin-right: 0;
                }

                .mtours-block__itemBg{
                    width: 110px;
                }

                .mtours-block__itemInfo{
                    width: calc(100% - 110px);
                    padding-left: 24px;
                }

                .mtours-block__itemInfoTitle h3{
                    font-size: 13px;
                }

                .mtours-block__itemInfoUrl{
                    display: none;
                }

                .mtours-block__itemInfoPrice > i{
                    font-size: 10px;
                }

                .mtours-block__itemInfoPrice{
                    font-size: 12px;
                }
            }

        </style>

        <?php
        $featured_posts = get_field('mtours_tours');
        if( $featured_posts ): ?>
        <div class="mtours-block">
            <div class="mtours-block-title">
                <h3><?php _e('Tours que podrian gustarte','tuku') ?></h3>
            </div>
            <div class="mtours-block__items">
            <?php foreach( $featured_posts as $featured_post ):
                $thumbnail = get_the_post_thumbnail_url( $featured_post->ID );
                $permalink = get_permalink( $featured_post->ID );
                $title = get_the_title( $featured_post->ID );

                // Get WooCommerce price
                $price_tour = '';
                $featured_product = wc_get_product($featured_post->ID);
                if ($featured_product) {
                    $price_tour = $featured_product->get_price();
                }
                ?>
                <article class="mtours-block__item linkParent--js">
                    <figure class="mtours-block__itemBg" style="background-image: url(<?php echo esc_html( $thumbnail ); ?>)"></figure>
                    <div class="mtours-block__itemInfo">
                        <div class="mtours-block__itemInfoTitle">
                            <h3><?php echo esc_html( $title ); ?></h3>
                        </div>
                        <div class="mtours-block__itemInfoPriceUrl">
                           <div class="mtours-block__itemInfoPrice"><i><?php _e('Desde','tuku') ?></i> $<?php echo esc_html( $price_tour ); ?></div>
                           <a class="mtours-block__itemInfoUrl" target="_blank" href="<?php echo esc_url( $permalink ); ?>"><?php _e('ver actividad') ?></a>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>


        <div id="servicios" class="servicios__includes">

            <?php if ( have_rows( 'servicios_incluidos' ) ) : ?>
                <div class="servicios__item">
                    <div class="accordeon-title-serv">
                        <h3><?php _e('Servicios incluidos','tuku') ?></h3>
                    </div>
                    <div class="accordeon-content-serv">
                        <ul>
                            <?php while ( have_rows( 'servicios_incluidos' ) ) : the_row(); ?>
                                <li><img src="<?php echo get_template_directory_uri(); ?>/assets/img/check.svg" alt=""> <?php the_sub_field( 'servicios_incluidos_item' ); ?></li>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                </div>
            <?php endif; ?>
            <?php if ( have_rows( 'servicios_no_incluidos' ) ) : ?>
                <div class="servicios__item">
                    <div class="accordeon-title-serv">
                        <h3><?php _e('Servicios no incluidos','tuku') ?></h3>
                    </div>
                    <div class="accordeon-content-serv">
                        <ul>
                            <?php while ( have_rows( 'servicios_no_incluidos' ) ) : the_row(); ?>
                                <li><img src="<?php echo get_template_directory_uri(); ?>/assets/img/wrong.svg" alt=""> <?php the_sub_field( 'servicios_no_incluidos_item' ); ?></li>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                </div>
            <?php endif; ?>
            <div class="servicios__item">
                <div class="accordeon-title-serv">
                    <h3><?php _e('Lo que necesitas saber','tuku') ?></h3>
                </div>
                <div class="accordeon-content-serv you__know">
                    <?php the_field( 'lo_que_necesitas_saber' ); ?>
                </div>
            </div>
            <div class="servicios__item">
                <div class="accordeon-title-serv">
                    <h3><?php _e('Política de cancelación','tuku') ?></h3>
                </div>
                <div class="accordeon-content-serv you__know">
                    <?php the_field( 'politica_de_cancelacion' ); ?>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- post relacionados -->
<?php
$category = wp_get_object_terms( $post->ID, 'destinos', array('fields' => 'ids') );
$args = array(
    'post_type' => 'product',
    'post_status' => 'publish',
    'posts_per_page' => 8,
    'orderby' => 'rand',
    'tax_query' => array(
        array(
            'taxonomy' => 'destinos',
            'field' => 'id',
            'terms' => $category
        )
    ),
    'post__not_in' => array ($post->ID),
);
$related_items_by_category = new WP_Query( $args );
if ($related_items_by_category->have_posts()) : ?>
    <section class="related__tours">
      <div class="container">
        <h1><?php _e('También podría interesarte estos tours relacionados','tuku') ?></h1>
        <div class="popular-home__content">
          <div class="swiper-container swiper-container-popular-home">
            <div class="swiper-wrapper">

                <?php while ( $related_items_by_category->have_posts() ) : $related_items_by_category->the_post(); ?>
                    <?php
                    $current_id = get_the_ID();

                    // Get WooCommerce price
                    $related_price = '';
                    $related_product = wc_get_product($current_id);
                    if ($related_product) {
                        $related_price = $related_product->get_price();
                    }
                    ?>
                  <div class="swiper-slide">
                    <a href="<?php the_permalink( ); ?>" class="card-product whislist" data-product="<?php echo $current_id ?>">
                      <div class="card-product__left">
                        <?php the_post_thumbnail( 'thumbnail-tour' ); ?>

                        <div class="card-product__left__top">
                            <?php
                                $tax = 'itinerarios';
                                $terms = get_terms( $tax, $args = array(
                                  'hide_empty' => false, // do not hide empty terms
                                ));
                                foreach( $terms as $term ) {
                                    $image = get_field('icono_iti', 'itinerarios_' . $term->term_id );
                                    if( $term->count > 0 ) {
                                       echo '<div class="card-product__left__top__item">';
                                        echo '<img src="' . $image['url'] . '" alt="' . $image['alt'] .'">';
                                        echo '</div>';
                                    }
                                }
                            ?>
                        </div>

                        <div class="card-product__left__bottom">
                          <span class="card-product__heart">
                            <span class="icon-heart-11"></span>
                            <span class="icon-heart3"></span>
                          </span>
                        </div>
                      </div>

                      <div class="card-product__right">
                        <div class="card-product__right__content">
                          <div class="card-product__right__content__top">
                            <div class="card-product__right__title">
                              <?php the_title(); ?>
                            </div>
                                                                <div class="card-product__right__direction">
                                                                    <div class="icon"><span class="icon-pin"></span></div>
                                                                        <?php   // Get terms for post
                                                                         $terms = get_the_terms( $post->ID , 'destinos' );
                                                                         // Loop over each item since it's an array

                                                                         if ( $terms != null ){
                                                                         foreach( $terms as $term ) {
                                                                            $image = get_field('icono_iti', 'itinerarios_' . $term->term_id );
                                                                         // Print the name method from $term which is an OBJECT
                                                                            echo '' . $term->name .'';
                                                                         // Get rid of the other data stored in the object, since it's not needed
                                                                         unset($term);
                                                                        } } ?>
                                                                </div>
                            <div class="card-product__right__desc">
                              Authoritatively customize collaborative testing procedures and timely leadership skills. Appropriately aggregate pandemic internal or "organic".
                            </div>
                          </div>
                          <div class="card-product__right__content__bottom">
                            <div class="card-product__right__content__bottom__list">
                                <?php if( get_field('numero_de_dias') ): ?>
                                    <div class="card-product__right__content__bottom__item">
                                        <span class="icon-clock"></span>
                                        <span class="card-product__right__content__bottom__item__name">
                                            <?php the_field( 'numero_de_dias' ); ?>d
                                        </span>
                                    </div>
                                <?php endif; ?>
                                <!--
                              <div class="card-product__right__content__bottom__item">
                                <span class="icon-tap-1"></span>
                                <span class="card-product__right__content__bottom__item__name">1250</span>
                              </div>
                          -->
                              <?php if ( have_rows( 'comentarios' ) ) : ?>
                                  <div class="card-product__right__content__bottom__item">
                                    <span class="icon-conversation"></span>
                                    <span class="card-product__right__content__bottom__item__name">
                                        <?php echo count( get_field('comentarios') ); ?>
                                    </div>
                                <?php endif; ?>
                              </div>
                              <div class="card-product__right__action">
                                <?php echo esc_html($related_price); ?> <?php _e('US$','tuku') ?>
                              </div>
                              <div href="<?php the_permalink( ); ?>" class="card-product__right__action-hover">
                                <?php _e('Ver tour','tuku') ?> <span class="icon-next"></span>
                              </div>
                            </div>
                          </div>
                      </div>
                    </a>
                  </div>
                <?php endwhile;?>

            </div>
          </div>
        </div>
        <div class="next-slide-car">
          <span class="icon-next"></span>
        </div>
        <div class="prev-slide-car">
          <span class="icon-prev"></span>
        </div>
      </div>
    </section>
<?php
    endif;
    wp_reset_postdata();
?>


<?php if ( have_rows( 'comentarios' ) ) :
    $total = count(get_field('comentarios'));
    $count = 0;
    $number = 4;
?>
    <section class="comentarios__wrap">
        <div class="container">
            <h1><?php _e('Comentarios','tuku') ?> (<?php echo count( get_field('comentarios') ); ?>)</h1>
            <div class="wrap__comentarios">
                <?php while ( have_rows( 'comentarios' ) ) : the_row(); ?>
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
                if ($count == $number) {
                    // we've shown the number, break out of loop
                    break;
                } ?>
                <?php $count++; endwhile; ?>
                <div class="wrap__show">
                    <a class="btn" id="gallery-load-more" href="javascript: my_repeater_show_more();" <?php if ($total < $count) { ?> style="display: none;"<?php } ?>><?php _e('Ver más','tuku') ?></a>

                </div>
            </div>
        </div>
    </section>
<?php endif; ?>


<div class="newsletter-home">
    <div class="newsletter">
        <div class="container">
            <div class="newsletter-content">
                <div class="newsletter-content__left">
                    <div class="newsletter-content__left__title">
                        <?php _e('Ofertas exclusivas en tu correo electrónico','tuku') ?>
                    </div>
                    <div class="newsletter-content__left__desc">
                        <?php _e('Suscríbase a nuestro boletín y reciba notificaciones de ofertas y novedades favorables. Sin spam, solo información útil.','tuku') ?>
                    </div>
                </div>
                <div class="newsletter-content__right">
                    <?php
                    $currentlang = get_bloginfo('language');
                    if($currentlang=="es"):
                        ?>
                        <?php echo do_shortcode( '[contact-form-7 id="264" title="Suscripciones ES" html_class="newsletter-content__right__form"]' ); ?>
                    <?php elseif($currentlang=="en-US"): ?>
                        <?php echo do_shortcode( '[contact-form-7 id="263" title="Suscripciones EN" html_class="newsletter-content__right__form"]' ); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="btn__fixed">
    <div class="price">
        <h3><?php echo esc_html($product_price); ?> US$</h3>
    </div>
    <a class="openCotizador reserva" href="#">
        <h3><?php _e('Reserva ahora','tuku') ?></h3>
    </a>
</div>

<?php
endwhile; // end of the loop.

/**
 * woocommerce_after_main_content hook.
 */
do_action( 'woocommerce_after_main_content' );

get_footer( 'shop' );
?>
<script type="text/javascript">
//LINK PARENT

	jQuery(document).ready(function() {
	    let linkParent = Array.from(document.querySelectorAll('.linkParent--js'))
        if(linkParent){
        	linkParent.forEach((el,index)=>{
        		let linkParentURL = el.querySelector('a').href
        		let linkParentTarget = el.querySelector('a').target
        		el.style.cursor= 'pointer'
        		el.addEventListener('click', e =>{
        			linkParentTarget != ""
        			? window.open(linkParentURL, '_blank')
        			: window.location.assign(linkParentURL)
        		})
        	})
        }

        $(document).ready(function(){
            var title = $('h1').attr('dataTitle');
            $("input#title_service").val(title);
        });

		$('.tour-detail-heart').click( function (e) {
			const localDataStorage = localStorage.getItem('whislist')
			const heartDetail = $('.tour-detail-heart').data('product')
			if(localDataStorage) {
				const formatDataStorage = JSON.parse(localDataStorage)
				if(formatDataStorage.includes(heartDetail)){
					$('.tour-detail-heart').removeClass('active')
					localStorage.setItem('whislist', JSON.stringify(formatDataStorage.filter(item => item !== heartDetail)))
				} else {
					formatDataStorage.push(heartDetail)
					localStorage.setItem('whislist', JSON.stringify(formatDataStorage))
					$('.tour-detail-heart').addClass('active')
				}
			} else {

				localStorage.setItem('whislist', JSON.stringify([heartDetail]))
				$('.tour-detail-heart').addClass('active')
			}
		})

		const LoadWhislist = () => {
			const localDataStorage = localStorage.getItem('whislist')
			const heartDetail = $('.tour-detail-heart').data('product').toString()
			if(localDataStorage) {
				const formatDataStorage = JSON.parse(localDataStorage)

				if(formatDataStorage.includes(heartDetail)) {
					$('.tour-detail-heart').addClass('active')
				}
			}

			// add event
			//

		}


		LoadWhislist()

	    new Swiper('.swiper-container-popular-home', {
	        slidesPerView: 1,
	        spaceBetween: 40,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
	        breakpoints: {
	            640: {
	                slidesPerView: 2
	            },
	            768: {
	                slidesPerView: 2
	            },
	            1024: {
	                slidesPerView: 3
	            },
			1120: {
	                slidesPerView: 4
	            }
	        }
	    });

	    var swiper = new Swiper('.images-swiper', {
	        slidesPerView: 'auto',
	        autoHeight: true, //enable auto height
	        centeredSlides: false,
	        spaceBetween: 15,
	        grabCursor: false,
	        loop: true,
	        navigation: {
	            nextEl: '.next-slide-images',
	            prevEl: '.prev-slide-images',
	        },
	        breakpoints: {
	            640: {

	            },
	            768: {

	            },
	            1024: {

	            },
	        }
	    });

	    //acordion
	    $(function($){
	        var contents = $('.accordeon-content');
	      var titles = $('.accordeon-title');
	      titles.on('click',function(){
	        var title = $(this);
	        contents.filter(':visible').slideUp(function(){
	            $(this).prev('.accordeon-title').removeClass('is-opened');
	        });

	        var content = title.next('.accordeon-content');

	        if (!content.is(':visible')) {
	          content.slideDown(function(){title.addClass('is-opened')});
	        }
	      });
	    });

	    //acordion
	    $(function($){
	        var contents = $('.accordeon-content-serv');
	      var titles = $('.accordeon-title-serv');
	      titles.on('click',function(){
	        var title = $(this);
	        contents.filter(':visible').slideUp(function(){
	            $(this).prev('.accordeon-title-serv').removeClass('is-opened');
	        });

	        var content = title.next('.accordeon-content-serv');

	        if (!content.is(':visible')) {
	          content.slideDown(function(){title.addClass('is-opened')});
	        }
	      });
	    });

	    //clase menu
	    $('.lista__item a').click(function(){
	        $('.lista__item a').removeClass('selected')
	        $(this).addClass('selected');
	    });

	    //scroll menu
	    $(window).scroll(function (event) {
	        var scroll = $(window).scrollTop();
	        $('.tab__info').toggleClass('ok',
	         //add 'ok' class when div position match or exceeds else remove the 'ok' class.
	          scroll >= $('.tab__content').offset().top
	        );
	    });

	});
</script>
<script type="text/javascript">
    var my_repeater_field_post_id = <?php echo $post->ID; ?>;
    var my_repeater_field_offset = <?php echo $number + 1; ?>;
    var my_repeater_field_nonce = '<?php echo wp_create_nonce('my_repeater_field_nonce'); ?>';
    var my_repeater_ajax_url = '<?php echo admin_url('admin-ajax.php'); ?>';
    var my_repeater_more = true;

    function my_repeater_show_more() {

        // make ajax request
        jQuery.post(
            my_repeater_ajax_url, {
                // this is the AJAX action we set up in PHP
                'action': 'my_repeater_show_more',
                'post_id': my_repeater_field_post_id,
                'offset': my_repeater_field_offset,
                'nonce': my_repeater_field_nonce
            },
            function (json) {
                // add content to container
                // this ID must match the containter
                // you want to append content to
                jQuery('.wrap__comentarios').append(json['content']);
                // update offset
                my_repeater_field_offset = json['offset'];
                // see if there is more, if not then hide the more link
                if (!json['more']) {
                    // this ID must match the id of the show more link
                    jQuery('#gallery-load-more').css('display', 'none');
                }
            },
            'json'
        );
    }


</script>
