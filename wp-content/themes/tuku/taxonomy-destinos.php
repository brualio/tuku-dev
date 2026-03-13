<?php get_header(); 
$term = get_queried_object();
// vars
$tours = get_field('tours_conteo', $term);
$viajeros = get_field('viajeros_conteo', $term);
$comentarios = get_field('comentarios_conteo', $term);
$image = get_field('imagen_banner', $term);
?>
<style>
    .body__filter .filter-item__title{
        font-size: 16px;
        font-weight: 600;
        font-stretch: normal;
        font-style: normal;
        line-height: 1.63;
        letter-spacing: normal;
        text-align: left;
        color: #d81159;
        margin-bottom: 20px;
    }
    #tags{
        background-color: rgba(213, 213, 213, 0.25);
        width: 100%;
        border: 0px;
        padding: 9px 16px 9px 42px;
        background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/pin.png');
        background-repeat: no-repeat;
        background-size: auto;
        background-position: left;
    }
    .facetwp-facet.facetwp-facet-itinerario {
        margin-bottom: 0;
    }
    .facetwp-facet-itinerario .facetwp-radio.checked {
        background: none;
    }
    .facetwp-facet.facetwp-facet-itinerario.facetwp-type-radio{
        max-width: 1024px;
        display: flex;
        grid-gap: 30px;
        padding-top: 35px;
        margin: 0 auto;
        overflow: auto;
        width: 100%;
    }
    .facetwp-facet-itinerario .facetwp-radio{
        font-family: Poppins-Regular!important;
        font-size: 16px;
        font-weight: 400;
        font-stretch: normal;
        font-style: normal;
        letter-spacing: normal;
        text-align: left;
        color: #7b7b7b;
        margin-left: 10px;
        border: solid 1px transparent;
        flex-direction: row;
        box-shadow: none;
        background: 0 0;
        padding: 20px 18px;
        border-radius: 12px;
        position: relative;
    }
    .facetwp-facet-itinerario .facetwp-radio:hover{
        background-color: rgba(213,213,213,.1);
    }
    .facetwp-facet-itinerario .facetwp-counter {
        width: 22px;
        height: 22px;
        background-color: #d81159;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #fff;
        font-family: Poppins-Medium;
        font-size: 12px;
        font-weight: 500;
        position: absolute;
        top: -10px;
        right: -10px;
    }
    .card-product__right__action-hover{
        display: none !important;
    }
    .social-float{
        display: none;
    }
    
</style>


<div class="breacrumbs">
    <div class="breacrumbs__links">
        <a href="#"><?php _e('Viaja a Peru', 'tuku') ?></a>
        <a href=""><?php single_cat_title(); ?></a>
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
        <script>
        //(function($) {
        //    $(document).on('facetwp-loaded', function() {
        //        var $parent = $('.facetwp-facet-itinerario');
        //        $parent.find('.facetwp-radio:not(.modded)').each(function() {
        //            var $this = $(this);
        //            var type = $this.attr('data-value');
        //            var counter = $this.find('.facetwp-counter').text().replace('(', '').replace(')', '');
        //            $this.html('<img src="https://facetwp.com/wp-content/themes/fwp2/assets/img/icons/cars/' + type + '.svg" alt="' + type + '" /> ' + counter);
        //            $this.addClass('modded');
        //        });
        //    });
        //})(jQuery);
        </script>
        <div class="catalogo-category">

            <?php   // Get terms for post
                $terms = get_terms(
                            array(
                                'taxonomy'   => 'itinerarios',
                                'hide_empty' => false,
                            )
                        );
                // Loop over each item since it's an array
                if ( $terms != null ){
                    foreach( $terms as $term ) {
                        $image = get_field('icono_iti', 'itinerarios_' . $term->term_id );
                        $term_link = get_term_link( $term, 'itinerarios' );
                        // Print the name method from $term which is an OBJECT
                        echo '<a class="icon-category" href="'.$term_link.'">';
                        echo '<img src="' . $image['url'] . '" alt="' . $image['alt'] .'">';
                        echo '<span class="icon-category__title">'. $term->name .'</span>';
                        echo '<span class="icon-category__badge"> '.$term->count.' </span>';
                        echo '</a>';


                        // Get rid of the other data stored in the object, since it's not needed
                        unset($term);
                    }
                }
            ?>
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
                    <div class="filter-item">
                        <div class="filter-item__title"><?php _e('Ciudad','tuku') ?></div>
                        <div class="filter-item__content">

                            <input id="tags" placeholder="<?php single_cat_title(); ?>">

                        </div>
                    </div>
                </div>
                
                    <div class="filter">
                        <div class="filter-item">
                            <div class="filter-item__title"><?php _e('Duración','tuku') ?></div>
                            <div class="filter-item__content">
                                <?php echo do_shortcode( '[facetwp facet="duracion"]' ); ?>
                            </div>
                        </div>
                    </div>
                
                <div class="filter">
                    <div class="filter-item">
                        <div class="filter-item__title"><?php _e('Precio','tuku') ?></div>
                        <div class="filter-item__content">
                            <?php echo do_shortcode( '[facetwp facet="range"]' ); ?>
                        </div>
                    </div>
                </div>

                <div class="filter">
                    <div class="filter-item">
                        <div class="filter-item__title"><?php _e('Categorías','tuku') ?></div>
                        <div class="filter-item__content">
                            <?php echo do_shortcode( '[facetwp facet="categorias"]' ); ?>
                        </div>
                    </div>
                </div>

                <div class="filter">
                    <div class="filter-item">
                        <div class="filter-item__title"><?php _e('Seguridad','tuku') ?></div>
                        <div class="filter-item__content">
                            <?php echo do_shortcode( '[facetwp facet="seguridad"]' ); ?>
                        </div>
                    </div>
                </div>

            </div>
            <div class="catalogo-content__right" id="results" role="reults">
                <div class="catalogo-content__right-content">

                	<?php while ( have_posts() ) : the_post(); ?>
                        <?php $current_id = get_the_ID(); ?>


                		<a href="<?php the_permalink(  ); ?>" class="card-product" data-product="<?php echo $current_id ?>">
                			<div class="card-product__left">
                				<?php the_post_thumbnail( 'thumbnail-tour' ); ?>
                				<div class="card-product__left__top">

                                    <?php   // Get terms for post
                                     $terms = get_the_terms( $post->ID , 'itinerarios' );
                                     // Loop over each item since it's an array

                                     if ( $terms != null ){
                                     foreach( $terms as $term ) {
                                        $image = get_field('icono_iti', 'itinerarios_' . $term->term_id );
                                     // Print the name method from $term which is an OBJECT
                                        echo '<div class="card-product__left__top__item">';
                                        echo '<img src="' . $image['url'] . '" alt="' . $image['alt'] .'">';       
                                        echo '</div>';
                                     // Get rid of the other data stored in the object, since it's not needed
                                     unset($term);
                                    } } ?>

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
                                                                            } } 
                                                                        ?>
                                                                </div>
                						<div class="card-product__right__desc">
                                            <?php if ( have_rows( 'highlights' ) ) : ?>

                                                <?php while ( have_rows( 'highlights' ) ) : the_row(); ?>
                                                     <?php the_sub_field( 'highlight_item' ); ?>
                                                <?php endwhile; ?>

                                            <?php endif; ?>
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
    <?php echo do_shortcode( '[facetwp pager="true"]' ); ?>
    <!--<?php wp_pagenavi(); ?>-->
  </div>
</div>
    
    </div>
</div>


<a href="#" class="btn filter-btn">
  <svg xmlns="http://www.w3.org/2000/svg" width="15.747" height="15.891" viewBox="0 0 15.747 15.891">
      <g>
          <path fill="#fff" d="M10.39 7.509a.981.981 0 0 1 .258.664V15.4a.491.491 0 0 0 .835.35l2.016-2.31c.27-.324.419-.484.419-.8V8.174a.989.989 0 0 1 .258-.664l5.784-6.276A.736.736 0 0 0 19.42 0H5.147a.736.736 0 0 0-.541 1.234z" transform="translate(572.757 -681.221) translate(-577.167 681.221)"/>
      </g>
  </svg>
  <?php _e('FILTROS','tuku') ?>
</a>

<div class="filter-responsive">
  <div id="filter-modal" class="responsive_filter">
      <div class="body__filter">


        <div class="filter-item__title"><?php _e('Ciudad','tuku') ?></div>
        <div class="filter-item__content">

            <input id="tags"  placeholder="<?php single_cat_title(); ?>">

        </div>
            <div class="filter-item__title"><?php _e('Duración','tuku') ?></div>
            <div class="filter-item__content">
                <?php echo do_shortcode( '[facetwp facet="duracin_mobile"]' ); ?>
            </div>
        <div class="filter-item__title"><?php _e('Precio','tuku') ?></div>
        <div class="filter-item__content">
            <?php echo do_shortcode( '[facetwp facet="precio_mobile"]' ); ?>
        </div>
   


        <div class="filter-item__title"><?php _e('Categorías','tuku') ?></div>
        <div class="filter-item__content">
            <?php echo do_shortcode( '[facetwp facet="categories_mobiles"]' ); ?>
        </div>
   


        <div class="filter-item__title"><?php _e('Seguridad','tulu') ?></div>
        <div class="filter-item__content">
            <?php echo do_shortcode( '[facetwp facet="seguridad_mobile"]' ); ?>
        </div>
  


      </div>
      <div class="footer__filter">
        <button class="reset__btn" onclick="FWP.reset()"><?php _e('Borrar filtros','tuku') ?></button>
        <span class="cancel-filter">
           <?php _e('Finalizar','tuku') ?>
          <svg xmlns="http://www.w3.org/2000/svg" width="19.485" height="16.21" viewBox="0 0 19.485 16.21">
              <g>
                  <g>
                      <path fill="#fff" d="M19.174 48.694l-7.037-7.037a1.07 1.07 0 0 0-1.508 0l-.639.643a1.059 1.059 0 0 0-.311.754 1.079 1.079 0 0 0 .311.763l4.105 4.114H1.053A1.041 1.041 0 0 0 0 48.976v.9a1.081 1.081 0 0 0 1.053 1.095h13.089l-4.152 4.14a1.056 1.056 0 0 0 0 1.5l.639.637a1.07 1.07 0 0 0 1.508 0l7.037-7.037a1.075 1.075 0 0 0 0-1.514z" transform="translate(0 -41.346) translate(0 41.346) translate(0 -41.346)"/>
                  </g>
              </g>
          </svg>

       </span>
      </div>
  </div>
</div>


<?php get_footer(); ?>
<script type="text/javascript"> 
    $( function() {
      $( ".filter-btn" ).on( "click", function() {
        $( "#filter-modal" ).addClass( "active", 10, callback );
      });
      function callback() {
        $( ".cancel-filter" ).on( "click", function() {
          $( "#filter-modal" ).removeClass( "active" );
         });
      }
    } );

    <?php 
    // Get the taxonomy's terms
    $terms = get_terms(
        array(
            'taxonomy'   => 'destinos',
            'hide_empty' => false,
        )
    );
    // Check if any term exists
    if ( ! empty( $terms ) && is_array( $terms ) ) {
    // Run a loop and print them all
        ?>
        $(function() {
         var availableTags = [
         <?php
         foreach ( $terms as $term ) {                                 
            ?>{label:"<?php echo $term->name; ?>", the_link:"<?php echo esc_url( get_term_link( $term ) ) ?>"},<?php } ?>];
            $( "#tags" ).autocomplete({
              source: availableTags,
              select:function(e,ui) { 
                  location.href = ui.item.the_link;
            //  console.log(ui.item.the_link);
        }
    });
        });
    <?php    
    } 
    ?>

    $(document).on('facetwp-loaded', function() {
        $('.facetwp-counter').text(function(_, text) {
               return text.replace(/\(|\)/g, '');
        });
    });
</script>