<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Tuku
 */

get_header();
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

<div class="catalogo">
    <div class="container">
        <div class="catalogo-result">
             <?php
             /* translators: %s: search query. */
             printf( esc_html__( 'Resultados de búsqueda para: %s', 'tuku' ), '<span>' . get_search_query() . '</span>' );
             ?>
        </div>
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

    <?php if ( have_posts() ) : ?>
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
                <div class="catalogo-content__right">
                    <div class="catalogo-content__right-content">

            <?php
            /* Start the Loop */
            while ( have_posts() ) :
                the_post();

                /**
                 * Run the loop for the search to output the results.
                 * If you want to overload this in a child theme then include a file
                 * called content-search.php and that will be used instead.
                 */
                get_template_part( 'template-parts/content', 'search' );

            endwhile;

            the_posts_navigation();

        else :

            get_template_part( 'template-parts/content', 'none' );

        endif;
        ?>

                    </div>


                </div>
            </div>

            <div class="pagination">
                <div class="pagination__content">
                    <?php echo do_shortcode( '[facetwp pager="true"]' ); ?>
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