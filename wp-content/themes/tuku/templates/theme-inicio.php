<?php get_header(); ?>
<?php /* Template Name: Theme - Inicio */ ?>

<?php
$args = array( 
	'post_type' => 'slider', 
	'post_status' => 'publish',
	'posts_per_page' => 1,);
$wp_query = new WP_Query($args);
?>
<?php if($wp_query->have_posts()) : ?>
	<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
		<?php if ( have_rows( 'sliders' ) ) : ?>
			<div class="banner-home">
				<div class="banner-text__action-mouse-home movedownScroll">
				<span>Swipe up</span>
					<div class="mouse-animated-home">
						<span></span>
					</div>
				</div>
				<div class="swiper-container swiper-container-banner-home">
					<div class="swiper-wrapper">
						<?php while ( have_rows( 'sliders' ) ) : the_row(); ?>
							<div class="swiper-slide">
								<img src="<?php the_sub_field( 'video_background' ); ?>" alt="banner">
								<div class="banner-home__content">
									<div class="banner-home__title">
										<?php the_sub_field( 'titulo_slider' ); ?>
									</div>
									<div class="banner-home__desc">
										<?php the_sub_field( 'texto_slider' ); ?>
									</div>
									<?php if( get_sub_field('label_boton_slider') ): ?>
										<a href="<?php the_sub_field( 'url_boton_slider' ); ?>" class="banner-home__action">
											<?php the_sub_field( 'label_boton_slider' ); ?> <span class="icon-next"></span>
										</a>
									<?php endif; ?>
								</div>
							</div>
						<?php endwhile; ?>

					</div>
					<!-- Add Pagination -->
					<div class="swiper-pagination"></div>
					<!-- Add Arrows -->
					<div class="swiper-button-next"></div>
					<div class="swiper-button-prev"></div>
				</div>
			</div>
		<?php endif; ?>
	<?php endwhile; ?>
	<?php wp_reset_query(); ?>
<?php endif; ?>

<div class="home">
	<div class="container">
		<div class="feature-home">
			<div class="feature-home__title"><?php the_field( 'titulo_b1' ); ?></div>
			<div class="feature-home__desc">
				<?php the_field( 'texto_b1' ); ?>
			</div>
			<div class="feature-home__content">
				<div class="swiper-container swiper-container-feature-home">
					<div class="swiper-wrapper">           
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
							foreach ( $terms as $term ) { 
								$image = get_field('imagen_dest', $term);
								?>
								<div class="swiper-slide">
									<a href="<?php echo esc_url( get_term_link( $term ) ) ?>" class="card-destino">
										<img src="<?php echo $image['url']; ?>" alt="<?php echo $term->name; ?>" />
										<span class="card-destino__overlay"></span>
										<div class="card-destino__content">
											<p class="card-destino__content__title"><?php echo $term->name; ?></p>
											<p class="card-destino__content__subtitle"><?php _e('ver itinerarios','tuku') ?></p>
										</div>
									</a>
								</div>
							<?php }
						} 
						?>
					</div>
					<div class="swiper-button-next">
						<span class="icon-next"></span>
					</div>
					<div class="swiper-button-prev">
						<span class="icon-prev"></span>
					</div>
				</div>
			</div>
		</div>

		<div class="about-home">
			<div class="about-home__content">
				<div class="about-home__left">
					<div class="about-home__title">
						<?php the_field( 'titulo_b2' ); ?>
					</div>
					<div class="about-home__desc">
						<?php the_field( 'subtitulo_b2' ); ?>
					</div>
					<div class="about-home__paragraph">
						<?php the_field( 'texto_b2' ); ?>
					</div>
					<div class="about-home__play-mobile">
						<?php 
						$attachment_id2 = get_field('thumbnail_video_b2');
						$size2 = "home-bloque-2-2"; // (thumbnail, medium, large, full or custom size)
						$image2 = wp_get_attachment_image_src( $attachment_id2, $size2 );
						// url = $image[0];
						// width = $image[1];
						// height = $image[2];
						?>
						<!-- img alt="" src="" /-->
						<div class="about-home__play2">
						<div class="about-home__play2-action">
							<span class="icon-play"></span>
						</div>
						<?php 
						$attachment_id2 = get_field('thumbnail_video_b2');
						$size2 = "home-bloque-2-2"; // (thumbnail, medium, large, full or custom size)
						$image2 = wp_get_attachment_image_src( $attachment_id2, $size2 );
						// url = $image[0];
						// width = $image[1];
						// height = $image[2];
						?>
						<img alt="" src="<?php echo $image2[0]; ?>" />
						<div id="video-gallery2">
							<a href="<?php the_field( 'link_video_b2' ); ?>" >
								
							</a>
						</div>
					</div>
					</div>
					<?php if( get_field('url_boton_b2') ): ?>
						<div class="about-home__action">
							<a href="<?php the_field( 'url_boton_b2' ); ?>" class="btn">
								<?php the_field( 'label_boton_b2' ); ?>
								<span class="icon-next"></span>
							</a>
						</div>
					<?php endif; ?>
				</div>
				<div class="about-home__right">
					<?php 
					$attachment_id = get_field('imagen_b2');
					$size = "home-bloque2"; // (thumbnail, medium, large, full or custom size)
					$image = wp_get_attachment_image_src( $attachment_id, $size );
					// url = $image[0];
					// width = $image[1];
					// height = $image[2];
					?>
					<img alt="" src="<?php echo $image[0]; ?>" />
					<div class="about-home__play">
						<div class="about-home__play-action">
							<span class="icon-play"></span>
						</div>
						<?php 
						$attachment_id2 = get_field('thumbnail_video_b2');
						$size2 = "home-bloque-2-2"; // (thumbnail, medium, large, full or custom size)
						$image2 = wp_get_attachment_image_src( $attachment_id2, $size2 );
						// url = $image[0];
						// width = $image[1];
						// height = $image[2];
						?>
						<img alt="" src="<?php echo $image2[0]; ?>" />
						<div id="video-gallery">
							<a href="<?php the_field( 'link_video_b2' ); ?>" >
								<img src="<?php echo get_template_directory_uri(); ?>/assets/img/thumb1.jpg" />
							</a>
						</div>
					</div>
					<div class="square-full">
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
					</div>
				</div>
			</div>
		</div>

		<?php 
		// Get the taxonomy's terms
		$terms = get_terms(
			array(
				'taxonomy'   => 'itinerarios',
				'hide_empty' => false,
			)
		);
		// Check if any term exists
		if ( ! empty( $terms ) && is_array( $terms ) ) {
    	// Run a loop and print them all
			?>
			<div class="popular-home">
				<div class="popular-home__title"><?php the_field( 'titulo_b3' ); ?></div>
				<div class="swiper-container popular-home__links">
					<div class="swiper-wrapper">
						<?php
						foreach ( $terms as $term ) { ?>
							<div class="swiper-slide">
								<div class="popular-home__link">
									<?php echo $term->name; ?>
								</div>
							</div>
						<?php  } ?>
					</div>
				</div>
				<div class="popular-home__contents">
					<?php foreach ( $terms as $term ) { ?>
						<div class="popular-home__content">
							<div class="swiper-container swiper-container-popular-home">
								<?php
								$args = array(
									'tax_query' => array(
										array(
											'taxonomy' => 'itinerarios',
											'field' => 'term_id',
											'terms' =>  $term->term_id
										)
									)
								);
								$wp_query = new WP_Query($args); ?>
								<?php if($wp_query->have_posts()) : ?>
									<div class="swiper-wrapper">
										<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
											<?php $current_id = get_the_ID(); ?>
											<div class="swiper-slide">
												<a href="<?php the_permalink( ); ?>" class="card-product whislist" data-product="<?php echo $current_id ?>">
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
																			</span>
																		</div>
																	<?php endif; ?>
																	</div>
																	<div class="card-product__right__action">
																		<?php the_field( 'precio_tour' ); ?> <?php _e('US$','tuku') ?>
																	</div>
																	<div href="<?php the_permalink( ); ?>" class="card-product__right__action-hover">
																		<?php _e('Ver tour','tuku') ?> <span class="icon-next"></span>
																	</div>
																</div>
															</div>
														</div>
													</a>                    
												</div>
											<?php endwhile; ?>
											<?php wp_reset_query(); ?>
										</div>
									<?php endif; ?>
									<div class="swiper-button-next">
										<span class="icon-next"></span>
									</div>
									<div class="swiper-button-prev">
										<span class="icon-prev"></span>
									</div>
								</div>
							</div>
						<?php  }  ?>
					</div>
				</div>
			<?php  } ?>
			<?php if ( have_rows( 'destinos_b4' ) ) : ?>
				<div class="best-home">
					<div class="best-home__title"><?php the_field( 'titulo_b4' ); ?></div>
					<div class="best-home__contents">
						<div class="swiper-container swiper-container-best-home">
							<div class="swiper-wrapper">
								<?php while ( have_rows( 'destinos_b4' ) ) : the_row(); ?>
									<div class="swiper-slide">
										<div class="best-home__content">
											<div class="best-home__left">
												<div class="best-home__left__title"><?php the_sub_field( 'titulo_dest' ); ?></div>
												<div class="best-home__left__desc">
													<?php the_sub_field( 'texto_dest' ); ?>
												</div>
												<div class="best-home__left__action">
													<a href="<?php the_sub_field( 'url_boton_dest' ); ?>" class="btn"><?php the_sub_field( 'label_boton_dest' ); ?></a>
												</div>
											</div>
											<div class="best-home__right">
												<div class="best-home__right__image">
													<div class="square-full">
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														<span></span>
													</div>
													<?php 
													$attachment_id_3 = get_sub_field('imagen_dest');
												$size_3 = "best-in-peru"; // (thumbnail, medium, large, full or custom size)
												$image_3 = wp_get_attachment_image_src( $attachment_id_3, $size_3);
												// url = $image[0];
												// width = $image[1];
												// height = $image[2];
												?>
												<img src="<?php echo $image_3[0]; ?>" alt="">
											</div>
										</div>
									</div>
								</div>
							<?php endwhile; ?>
						</div>
						<!-- Add Arrows -->
						<div class="swiper-button-next">
							<span class="icon-next"></span>
						</div>
						<div class="swiper-button-prev">
							<span class="icon-prev"></span>
						</div>
					</div>
				</div>
			</div>
		<?php endif; ?>
	</div>

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

	<div class="container">
		<div class="catalogo-home">
			<div class="catalogo-home__contents">
				<a href="<?php the_field( 'url_card_left' ); ?>" class="catalogo-home__item">
					<?php 
					$attachment_id_left = get_field('imagen_card_left');
					$size_left = "tax-home"; // (thumbnail, medium, large, full or custom size)
					$image_left = wp_get_attachment_image_src( $attachment_id_left, $size_left );
					// url = $image[0];
					// width = $image[1];
					// height = $image[2];
					?>
					<img class="image-class" alt="" src="<?php echo $image_left[0]; ?>" />
					<div class="catalogo-home__logo">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/catalogo-home-logo.png" alt="">
					</div>
					<div class="catalogo-home__circle"></div>
					<div class="catalogo-home__content">
						<div class="catalogo-home__title">
							<?php the_field( 'subtitulo_card_left' ); ?>
						</div>
						<div class="catalogo-home__desc">
							<?php the_field( 'titulo_card_left' ); ?>
						</div>
					</div>
				</a>

				<a href="<?php the_field( 'url_card_right' ); ?>" class="catalogo-home__item">
					<?php 
					$attachment_id_right = get_field('imagen_card_right');
					$size_right = "tax-home"; // (thumbnail, medium, large, full or custom size)
					$image_right = wp_get_attachment_image_src( $attachment_id_right, $size_right );
					// url = $image[0];
					// width = $image[1];
					// height = $image[2];
					?>
					<img class="image-class" alt="" src="<?php echo $image_right[0]; ?>" />
					<div class="catalogo-home__logo">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/catalogo-home-logo.png" alt="">
					</div>
					<div class="catalogo-home__circle"></div>
					<div class="catalogo-home__content">
						<div class="catalogo-home__title">
							<?php the_field( 'subtitulo_card_right' ); ?>
						</div>
						<div class="catalogo-home__desc">
							<?php the_field( 'titulo_card_right' ); ?>
						</div>
					</div>
				</a>
			</div>
		</div>

		<div class="catalogo-top">
			<div class="catalogo-top__title">
				<?php the_field( 'titulo_b6' ); ?>
			</div>
			<div class="catalogo-top__content">
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
					foreach ( $terms as $term ) { ?>
						<a href="<?php echo esc_url( get_term_link( $term ) ) ?>" class="catalogo-top__item"><?php echo $term->name; ?></a>
					<?php }
				} 
				?>
			</div>
		</div>
	</div>

	<div class="reviews-home">
		<?php if ( have_rows( 'reviews_b7' ) ) : ?>
			<section class="about-block_5">
				<div class="container">
					<h1><?php the_field( 'titulo_b7' ); ?></h1>
					<div class="txt-block">
						<?php the_field( 'texto_b7' ); ?>
					</div>
					<div class="wrap__review">
						<div class="wrap__quote swiper-wrapper">
							<?php while ( have_rows( 'reviews_b7' ) ) : the_row(); ?>
								<div class="swiper-slide item__quote">
									<div class="img_quote" style="background-image: url('<?php the_sub_field( 'perfil_rev' ); ?>');"></div>
									<div class="icon-quote">
										<img src="<?php echo get_template_directory_uri(); ?>/assets/img/left-quotes-sign.svg">
									</div>
									<?php the_sub_field( 'texto_rev' ); ?>
									<h6><?php the_sub_field( 'nombre_rev' ); ?></h6>
								</div>
							<?php endwhile; ?>
						</div>
					</div>
				</div>
			</section>
		<?php endif; ?>
	</div>
	
	<?php $titleLogotipos = get_field('titulo_b8'); ?>
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
		
</div>

<?php get_footer(); ?>

<script type="text/javascript"> 
	jQuery(document).ready(function() { 
	    var swiper = new Swiper('.swiper-container-banner-home', {
	        pagination: {
	            el: '.swiper-pagination',
	            type: 'progressbar',
	            progressbarOpposite: true,
	            renderProgressbar: function (progressbarFillClass) {
	                return '<div class="' + progressbarFillClass + '"></div>';
	            }
	        },
	        navigation: {
	            nextEl: '.swiper-button-next',
	            prevEl: '.swiper-button-prev',
	        }
	    });

	    new Swiper('.swiper-container-feature-home', {
	        slidesPerView: 1,
	        spaceBetween: 30,
	        pagination: {
	            el: '.swiper-pagination-feature',
	            clickable: true,
	        },
	        navigation: {
	            nextEl: '.swiper-button-next',
	            prevEl: '.swiper-button-prev',
	        },
	        breakpoints: {
	            640: {
	                slidesPerView: 2
	            },
	            768: {
	                slidesPerView: 3
	            },
	            1024: {
	                slidesPerView: 4
	            },
	        }
	    });

	    new Swiper('.swiper-container-popular-home', {
	        slidesPerView: 1,
	        spaceBetween: 10,
	        navigation: {
	            nextEl: '.swiper-button-next',
	            prevEl: '.swiper-button-prev',
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
	            1200: {
	                slidesPerView: 4
	            },
	        }
	    });

	    const removeClassAll = (elements, className) => Array.from(elements).map(item => item.classList.contains(className) && item.classList.remove(className))

	    const linksTips = document.querySelectorAll('.popular-home__link')
	    const contentTips = document.querySelectorAll('.popular-home__content')

	    linksTips[0].classList.add('active')
	    contentTips[0].classList.add('active')

	    Array.from(linksTips).map((item, index) => {
	        item.addEventListener('click', () => {
	            if (!item.classList.contains('active')) {
	                removeClassAll(linksTips, 'active')
	                removeClassAll(contentTips, 'active')
	                item.classList.add('active')
	                contentTips[index].classList.add('active')
	            }
	        })
	    })

	    new Swiper('.swiper-container-best-home', {
	        slidesPerView: 1,
	        spaceBetween: 20,
	        navigation: {
	            nextEl: '.swiper-button-next',
	            prevEl: '.swiper-button-prev',
	        }
	    });

	    new Swiper('.popular-home__links', {
	        slidesPerView: 3,
	        spaceBetween: 10,
	        breakpoints: {
	            640: {
	                slidesPerView: 5
	            },
	            768: {
	                slidesPerView: 6
	            },
	            1024: {
	                slidesPerView: 10
	            },
	        }
	    })


	    // testimonios

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



	    // lightgallery -->
	    $(document).ready(function() {
	        $('#video-gallery').lightGallery(); 
	        $('#video-gallery2').lightGallery(); 
	    });


	    document.querySelector('.about-home__play').addEventListener('click', function() {
	        document.querySelector('#video-gallery a').click()
	    })
		
		document.querySelector('.about-home__play2').addEventListener('click', function() {
	        document.querySelector('#video-gallery2 a').click()
	    })

	}); 
</script>