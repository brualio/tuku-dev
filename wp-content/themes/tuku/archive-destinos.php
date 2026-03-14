<?php get_header(); 
//$prev_url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
//$page = get_page_by_path('prueba-2-xd');
// vars
$tours = get_field('tours_conteo', 'term_30');
$viajeros = get_field('viajeros_conteo', 'term_30');
$comentarios = get_field('comentarios_conteo', 'term_30');
$image = get_field('imagen_banner', 'term_30');
?>

<div class="breacrumbs">
    <div class="breacrumbs__links">
        <a href="#"><?php _e('Viaja a Peru') ?></a>
        <a href=""><?php single_cat_title(); ?> </a>
    </div>
</div>

<div class="banner-catalogo">
    <img src="<?php echo $image['url']; ?>" alt="banner">
    <div class="banner-catalogo__bg"></div>
    <div class="banner-catalogo__content">
        <div class="banner-catalogo__title"><?php single_cat_title(); ?></div>
        <ul class="banner-catalogo__list">
            <li class="banner-catalogo__item">
                <div class="banner-catalogo__icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/flag.png" alt="icon">
                </div>
                <div class="banner-catalogo__item__content">
                    <div class="banner-catalogo__content__num"><?php echo $tours; ?></div>
                    <div class="banner-catalogo__content__desc"><?php _e('tours y actividades','tuku') ?></div>
                </div>
            </li>

            <li class="banner-catalogo__item">
                <div class="banner-catalogo__icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/pin.png" alt="icon">
                </div>
                <div class="banner-catalogo__item__content">
                    <div class="banner-catalogo__content__num"><?php echo $viajeros; ?></div>
                    <div class="banner-catalogo__content__desc"><?php _e('viajeros ya lo visitaron','tuku') ?></div>
                </div>
            </li>

            <li class="banner-catalogo__item">
                <div class="banner-catalogo__icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/conversation.png" alt="icon">
                </div>
                <div class="banner-catalogo__item__content">
                    <div class="banner-catalogo__content__num"><?php echo $comentarios; ?></div>
                    <div class="banner-catalogo__content__desc"><?php _e('comentarios de nuestros clientes','tuku') ?></div>
                </div>
            </li>
        </ul>
    </div>
    
    <img class="banner-catalogo__mouse movedownScroll" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/mouse.png" alt="icon">
</div>
<div class="catalogo">
    <div class="container">
        <div class="catalogo-category">
            
                <a href="" class="icon-category">
    <span class="icon-bird icon-category__icon"></span>
    <span class="icon-category__title">Explorator</span>
    <span class="icon-category__badge">1</span>
</a>
            
                <a href="" class="icon-category">
    <span class="icon-bird icon-category__icon"></span>
    <span class="icon-category__title">Explorator</span>
    <span class="icon-category__badge">1</span>
</a>
            
                <a href="" class="icon-category">
    <span class="icon-bird icon-category__icon"></span>
    <span class="icon-category__title">Explorator</span>
    <span class="icon-category__badge">1</span>
</a>
            
                <a href="" class="icon-category">
    <span class="icon-bird icon-category__icon"></span>
    <span class="icon-category__title">Explorator</span>
    <span class="icon-category__badge">1</span>
</a>
            
                <a href="" class="icon-category">
    <span class="icon-bird icon-category__icon"></span>
    <span class="icon-category__title">Explorator</span>
    <span class="icon-category__badge">1</span>
</a>
            
                <a href="" class="icon-category">
    <span class="icon-bird icon-category__icon"></span>
    <span class="icon-category__title">Explorator</span>
    <span class="icon-category__badge">1</span>
</a>
            
        </div>
    </div>

    <div class="catalogo-notify">
        <div class="catalogo-notify__content">
            <?php _e('Todos los elementos de estos itinerarios pueden adaptarse a sus intereses y estilo de viaje.','tuku') ?>
        </div>
    </div>
    
    <div class="container">
        <div class="catalogo-content">
            <div class="catalogo-content__left">
                <div class="filter">
                    <?php echo do_shortcode( '[facetwp facet="new_facet"]' ); ?>

  
                </div>
            </div>
            <div class="catalogo-content__right" id="results">
                <div class="catalogo-content__right-content">

                    <?php while ( have_posts() ) : the_post(); ?>
                        <?php $current_id = get_the_ID(); ?>


                        <a href="<?php the_permalink(  ); ?>" class="card-product whislist" data-product="<?php echo $current_id ?>">
                            <div class="card-product__left">
                                <?php the_post_thumbnail( 'thumbnail-tour' ); ?>

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
                                        <div class="card-product__right__content__top__term">
                                            <?php   // Get terms for post
                                                $terms = get_the_terms($post->ID, 'itinerarios');
                                                if ($terms && !is_wp_error($terms)) {
                                                    $names = wp_list_pluck($terms, 'name');
                                                    foreach ($names as $i => $name) {
                                                        echo '<span>'.$name.'</span>';
                                                        if ($i < count($names) - 1) echo ', ';
                                                    }

                                                }
                                            ?>
                                        </div>
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
                                            <?php the_excerpt(); ?>
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
                                            <div class="card-product__right__content__bottom__item">
                                                <span class="icon-tap-1"></span>
                                                <span class="card-product__right__content__bottom__item__name">1250</span>
                                            </div>
                                            <?php if ( have_rows( 'comentarios' ) ) : ?>
                                                <div class="card-product__right__content__bottom__item">
                                                    <span class="icon-conversation"></span>
                                                    <span class="card-product__right__content__bottom__item__name"></span><?php echo count( get_field('comentarios') ); ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="card-product__right__action">
                                            <?php _e('$','tuku') ?>
                                            <span>
                                                <?php
                                                // Get WooCommerce price
                                                $product = wc_get_product(get_the_ID());
                                                if ($product) {
                                                    echo esc_html($product->get_price());
                                                }
                                                ?>
                                            </span>
                                        </div>
                                        <div class="card-product__right__action-hover">
                                            <?php _e('Ver tour','tuku') ?> <span class="icon-next"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    <?php endwhile;?>
                </div>
                
            </div>
        </div>

        <div class="pagination">
  <div class="pagination__content">
    <div class="pagination__list">
      <div class="pagination__item">
        <
      </div>

      <div class="pagination__item">
        1
      </div>
      <div class="pagination__item">
        2
      </div>
      <div class="pagination__item">
        3
      </div>
      <div class="pagination__item">
        4
      </div>
      <div class="pagination__item">
        5
      </div>
      <div class="pagination__item">
        6
      </div>

      <div class="pagination__item">
        >
      </div>
    </div>
  </div>
</div>
    
    </div>
</div>



<?php get_footer(); ?>
<script type="text/javascript"> 
    jQuery(document).ready(function() { 

    }); 
</script>