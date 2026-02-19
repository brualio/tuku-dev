<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package 
 */
?>
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
					<?php
					// Get WooCommerce price
					$product = wc_get_product(get_the_ID());
					if ($product) {
						echo esc_html($product->get_price());
					}
					?> <?php _e('US$','tuku') ?>
				</div>
				<div class="card-product__right__action-hover">
					<?php _e('Ver tour','tuku') ?> <span class="icon-next"></span>
				</div>
			</div>
		</div>
	</div>
</a>