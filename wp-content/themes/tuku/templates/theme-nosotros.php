<?php get_header(); ?>
<?php /* Template Name: Theme - Nosotros */ ?>
        
<div class="banner-text">
  <img src="<?php the_post_thumbnail_url( 'full' ); ?>" alt="<?php the_title(); ?>">
  <div class="banner-text__title">
  	<?php the_title(); ?>
  </div>

  <div class="banner-text__action-mouse movedownScroll">
    <div class="mouse-animated">
      <span></span>
    </div>
  </div>
</div>
<div class="bg-color-fw">
    <div class="container">
        <div class="about-block_1">
            <div class="subtitle-about">
                <h1><?php the_field( 'titulo_b1' ); ?></h1>
            </div>
            <div class="content-about">
                <?php the_field( 'texto_b1' ); ?>
            </div>
        </div>
    </div>
</div>

<?php if ( have_rows( 'galeria_b1' ) ) : ?>
    <div class="slide-about">
        <div class="images-swiper">
            <div class="swiper-wrapper">
                <?php while ( have_rows( 'galeria_b1' ) ) : the_row(); ?>
                    <div class="swiper-slide">
                        <img src="<?php the_sub_field( 'imagen_galeria' ); ?>">
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
<?php endif; ?>



<section class="wrap_mv">
    <div class="container">
        <div class="about-block_2">
            <div class="mision-vision">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="wrap_item_mv">
                            <h3><?php _e('Misión','tuku') ?></h3>
                            <?php the_field( 'mision' ); ?>    
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="wrap_item_mv">
                            <h3><?php _e('Visión','tuku') ?></h3>
                            <?php the_field( 'vision' ); ?>     
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination-mv"></div>
            </div>
        </div>
    </div>
</section>

<section class="about-block_3">
    <div class="container">
        <h1><?php the_field( 'titulo_b4' ); ?></h1>
    </div>
    <div class="wrap_slide_tax">
        <div class="tax-slider">
            <div class="swiper-wrapper">
                <?php
                    $tax = 'itinerarios';
                    $terms = get_terms( $tax, $args = array(
                      'hide_empty' => false, // do not hide empty terms
                    ));
                    foreach( $terms as $term ) {
                        $icono = get_field('icono_iti', 'itinerarios_' . $term->term_id );
                        $image = get_field('imagen_iti', 'itinerarios_' . $term->term_id );
                        $term_link = get_term_link( $term );
                        if( $term->count > 0 ) {
                            echo '<div class="swiper-slide">';
                            echo '<a href="' . esc_url( $term_link ) . '">';
                            echo '<div class="wrap_item_tax" style="background-image: url(' . $image['url']. ');">';
                            echo '<div class="into_tax">';
                            echo '<img src="' . $icono['url'] . '" alt="' . $icono['alt'] .'">';
                            echo '<h3> '.$term->name.' </h3>';
                            echo '</div>';
                            echo '</div>';
                            echo '</a>';
                            echo '</div>';
                        }
                    }              
                ?> 
            </div>
        </div>
    </div>
</section>

<section class="about-block_4">
    <div class="container">
        <h1><?php the_field( 'titulo_b5' ); ?></h1>
        <div class="wrap_contacts">
            <div class="item_contact">
                <div class="img__contact">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/at.svg">
                </div>
                <?php if ( have_rows( 'correos', 'options' ) ) : ?>
                    <div class="cntn__contact">
                        <?php while ( have_rows( 'correos', 'options' ) ) : the_row(); ?>
                            <a href="mailto:<?php the_sub_field( 'correo', 'options' ); ?>">
                                <?php the_sub_field( 'correo', 'options' ); ?> 
                            </a>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="item_contact">
                <div class="img__contact">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/phone.svg">
                </div>
                <?php if ( have_rows( 'telefonos', 'options' ) ) : ?>
                    <div class="cntn__contact">
                        <?php while ( have_rows( 'telefonos', 'options' ) ) : the_row(); ?>
                            <a href="tel:<?php the_sub_field( 'telefono', 'options' ); ?>">
                                <?php the_sub_field( 'telefono', 'options' ); ?> 
                            </a>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="item_contact">
                <div class="img__contact">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/calendar.svg">
                </div>
                <div class="cntn__contact">
                    <?php the_field( 'horarios', 'options' ); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
    $currentlang = get_bloginfo('language');
    if($currentlang=="es"):
?>
    <?php if ( have_rows( 'reviews_b7','63' ) ) : ?>
        <section class="about-block_5">
            <div class="container">
                <h1><?php the_field( 'titulo_b7','63' ); ?></h1>
                <div class="txt-block">
                    <?php the_field( 'texto_b7','63' ); ?>
                </div>
                <div class="wrap__review">
                    <div class="wrap__quote swiper-wrapper">
                        <?php while ( have_rows( 'reviews_b7','63' ) ) : the_row(); ?>
                            <div class="swiper-slide item__quote">
                                <div class="img_quote" style="background-image: url('<?php the_sub_field( 'perfil_rev','63' ); ?>');"></div>
                                <div class="icon-quote">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/left-quotes-sign.svg">
                                </div>
                                <?php the_sub_field( 'texto_rev','63' ); ?>
                                <h6><?php the_sub_field( 'nombre_rev','63' ); ?></h6>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

<?php elseif($currentlang=="en-US"): ?>
    <?php if ( have_rows( 'reviews_b7','83' ) ) : ?>
        <section class="about-block_5">
            <div class="container">
                <h1><?php the_field( 'titulo_b7','83' ); ?></h1>
                <div class="txt-block">
                    <?php the_field( 'texto_b7','83' ); ?>
                </div>
                <div class="wrap__review">
                    <div class="wrap__quote swiper-wrapper">
                        <?php while ( have_rows( 'reviews_b7','83' ) ) : the_row(); ?>
                            <div class="swiper-slide item__quote">
                                <div class="img_quote" style="background-image: url('<?php the_sub_field( 'perfil_rev','83' ); ?>');"></div>
                                <div class="icon-quote">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/left-quotes-sign.svg">
                                </div>
                                <?php the_sub_field( 'texto_rev','83' ); ?>
                                <h6><?php the_sub_field( 'nombre_rev','83' ); ?></h6>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
<?php endif; ?>

	<?php $titleLogotipos = get_field('titulo_b6'); ?>
	<?php if(get_field('logotipos_foot','options')): ?>
		<div class="home-logotipos">
		    <div class="home-logotipos__container">
    		    <?php if($titleLogotipos): ?>
    		    <div class="home-logotiposTitle">
    		        <h2><?php echo $titleLogotipos ?></h2>
    		    </div>
    		    <?php endif ?>
        		<div class="foot-sponsors__slider foot-sponsors--slider list--none">
        			<ul class="swiper-wrapper">
        				<?php while(has_sub_field('logotipos_foot','options')): ?>
        				<li class="swiper-slide">
        					<?php if (get_sub_field('url_logotipos_foot')): ?>
        						<a href="<?php the_sub_field('url_logotipos_foot') ?>" target="_blank" class="foot-sponsors__item">
        							<img src="<?php the_sub_field('logo_logotipos_foot') ?>" alt="">
        						</a>
        					<?php else: ?>
        						<figure href="<?php the_sub_field('url_logotipos_foot') ?>" class="foot-sponsors__item">
        							<img src="<?php the_sub_field('logo_logotipos_foot') ?>" alt="">
        						</figure>	
        					<?php endif ?>
        				</li>
        				<?php endwhile; ?>
        			</ul>
        		</div>
    		</div>
		</div>
		<?php endif ?>

<?php get_footer(); ?>

<script type="text/javascript"> 
	jQuery(document).ready(function() { 
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

	    var swiper = new Swiper('.mision-vision', {
	        centeredSlides: true,
	        autoplay: {
	            delay: 9000,
	            disableOnInteraction: false,
	        },
	        loop: true,
	        pagination: {
	            el: '.swiper-pagination-mv',
	            clickable: true,
	        },
	    });

	    var swiper = new Swiper('.tax-slider', {
	        slidesPerView: 1.3,
	        draggable: true,
	        spaceBetween: 16,
	        centeredSlides: true,
	        loop: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
	        pagination: {
	            el: '.swiper-pagination',
	            clickable: true,
	        },
	        breakpoints: {
	            768: {
	                slidesPerView: 2.5,
	            },
	            990: {
	                slidesPerView: 3.5,
	            },
	        }
	    });

    new Swiper('.wrap__review', {
        autoplay: {
            delay: 9000,
            disableOnInteraction: false,
        },
        draggable: true,
        spaceBetween: 45,
        slidesPerView: 1,
        breakpoints: {
            640: {
                slidesPerView: 1
            },
            768: {
                slidesPerView: 2
            },
            769: {
                slidesPerView: 3
            },

        }
    });

	}); 
</script>