<?php get_header(); ?>
<?php /* Template Name: Theme - Travel */ ?>



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


<div class="travelto">
    <div class="container">
        <div class="travelto-living">
            <div class="travelto-living__title">
                <?php the_field( 'titulo_b1' ); ?>
            </div>
            <div class="travelto-living__desc">
                <?php the_field( 'subtitulos_b1' ); ?>
            </div>
            <div class="travelto-living__list">
                
                    <a href="#informacion" class="travelto-living__item">
                        <div class="travelto-living__item__image">
                            <svg xmlns="http://www.w3.org/2000/svg" width="50.984" height="59.327" viewBox="0 0 50.984 59.327">
							    <defs>
							        <style>
							            .cls-1{fill:#d81159}
							        </style>
							    </defs>
							    <g id="information_2_" data-name="information (2)" transform="translate(-36)">
							        <g id="Grupo_295" data-name="Grupo 295" transform="translate(36)">
							            <g id="Grupo_294" data-name="Grupo 294">
							                <path id="Trazado_242" d="M236.762 182.774c-1.474 0-2.521.622-2.521 1.539v12.476c0 .786 1.048 1.572 2.521 1.572 1.408 0 2.554-.786 2.554-1.572v-12.476c.001-.913-1.145-1.539-2.554-1.539z" class="cls-1" data-name="Trazado 242" transform="translate(-211.27 -161.595)"/>
							                <path id="Trazado_243" d="M235.513 116.361a2.36 2.36 0 1 0 2.653 2.325 2.537 2.537 0 0 0-2.653-2.325z" class="cls-1" data-name="Trazado 243" transform="translate(-210.021 -102.878)"/>
							                <path id="Trazado_244" d="M61.492 0a25.479 25.479 0 0 0-7.715 49.765l5.8 8.545a2.318 2.318 0 0 0 3.836 0l5.8-8.545A25.479 25.479 0 0 0 61.492 0zm5.637 45.549a2.318 2.318 0 0 0-1.294.931l-4.343 6.4-4.343-6.4a2.318 2.318 0 0 0-1.294-.931 20.857 20.857 0 1 1 11.273 0z" class="cls-1" data-name="Trazado 244" transform="translate(-36)"/>
							            </g>
							        </g>
							    </g>
							</svg>
                        </div>
                        <div class="travelto-living__item__content"><?php _e('Información General','tuku') ?></div>
                    </a>
                
                    <a href="#historia" class="travelto-living__item">
                        <div class="travelto-living__item__image">
							<svg xmlns="http://www.w3.org/2000/svg" width="63.855" height="50.75" viewBox="0 0 63.855 50.75">
							    <defs>
							        <style>
							            .cls-1{fill:#d81159}
							        </style>
							    </defs>
							    <g id="mayan-pyramid">
							        <path id="Trazado_135" d="M136.415 67.9a1.873 1.873 0 0 0-1.873-1.873h-2.067v-9.8h.174a1.873 1.873 0 0 0 0-3.745h-32.241a1.873 1.873 0 0 0 0 3.745h.239v9.8H98.58a1.873 1.873 0 0 0-1.873 1.873v3.522h39.708V67.9zm-25.5-1.873h-3.745v-3.359a1.873 1.873 0 1 1 3.745 0zm7.491 0h-3.745v-3.359a1.873 1.873 0 1 1 3.745 0zm7.491 0h-3.745v-3.359a1.873 1.873 0 1 1 3.745 0z" class="cls-1" data-name="Trazado 135" transform="translate(-84.634 -52.485)"/>
							        <g id="Grupo_160" data-name="Grupo 160" transform="translate(0 22.685)">
							            <g id="Grupo_157" data-name="Grupo 157" transform="translate(0 19.003)">
							                <path id="Trazado_136" d="M370.094 386.407h-18.03l1.522 9.062h18.38v-7.189a1.873 1.873 0 0 0-1.872-1.873z" class="cls-1" data-name="Trazado 136" transform="translate(-308.111 -386.407)"/>
							                <path id="Trazado_137" d="M19.842 386.407H1.873A1.873 1.873 0 0 0 0 388.28v7.189h18.323z" class="cls-1" data-name="Trazado 137" transform="translate(0 -386.407)"/>
							            </g>
							            <g id="Grupo_158" data-name="Grupo 158" transform="translate(3.741 9.14)">
							                <path id="Trazado_138" d="M47.718 307.4H31.835a1.873 1.873 0 0 0-1.873 1.873v4.246h16.73z" class="cls-1" data-name="Trazado 138" transform="translate(-29.962 -307.398)"/>
							                <path id="Trazado_139" d="M354.741 307.4H338.8l1.028 6.119h16.79v-4.246a1.873 1.873 0 0 0-1.877-1.873z" class="cls-1" data-name="Trazado 139" transform="translate(-300.24 -307.398)"/>
							            </g>
							            <g id="Grupo_159" data-name="Grupo 159" transform="translate(7.968)">
							                <path id="Trazado_140" d="M192.027 234.19H181.89l-4.707 28.065h19.557z" class="cls-1" data-name="Trazado 140" transform="translate(-163.031 -234.19)"/>
							                <path id="Trazado_141" d="M339.756 234.19H326.5l.906 5.394h14.22v-3.522a1.873 1.873 0 0 0-1.87-1.872z" class="cls-1" data-name="Trazado 141" transform="translate(-293.709 -234.19)"/>
							                <path id="Trazado_142" d="M78.884 234.19H65.695a1.873 1.873 0 0 0-1.873 1.873v3.522h14.157z" class="cls-1" data-name="Trazado 142" transform="translate(-63.822 -234.19)"/>
							            </g>
							        </g>
							    </g>
							</svg>

                        </div>
                        <div class="travelto-living__item__content"><?php _e('Historia y Cultura','tuku') ?></div>
                    </a>
                
                    <a href="#destinos" class="travelto-living__item">
                        <div class="travelto-living__item__image">
                            <svg xmlns="http://www.w3.org/2000/svg" id="compass_3_" width="54.303" height="54.303" data-name="compass (3)" viewBox="0 0 54.303 54.303">
                                <path id="Trazado_283" d="M248.308 187.538l3.3-8.25a.742.742 0 0 0-.965-.965l-8.25 3.3a.742.742 0 0 0-.249 1.214l4.95 4.95a.742.742 0 0 0 1.214-.249z" class="cls-1" data-name="Trazado 283" transform="translate(-216.267 -159.361)"/>
                                <path id="Trazado_284" d="M179.288 251.607l8.25-3.3a.742.742 0 0 0 .249-1.214l-4.95-4.95a.742.742 0 0 0-1.214.249l-3.3 8.25a.743.743 0 0 0 .965.965z" class="cls-1" data-name="Trazado 284" transform="translate(-159.36 -216.266)"/>
                                <path id="Trazado_285" d="M46.35 7.952a27.151 27.151 0 0 0-38.4 38.4 27.151 27.151 0 0 0 38.4-38.4zM40.606 15.9l-6.788 16.97a1.7 1.7 0 0 1-.945.945L15.9 40.606a1.7 1.7 0 0 1-2.2-2.206l6.788-16.97a1.7 1.7 0 0 1 .945-.945L38.4 13.7a1.7 1.7 0 0 1 2.206 2.2z" class="cls-1" data-name="Trazado 285"/>
                            </svg>
                        </div>
                        <div class="travelto-living__item__content"><?php _e('Todas los destinos','tuku') ?></div>
                    </a>
                
                    <a href="#turistica" class="travelto-living__item">
                        <div class="travelto-living__item__image">
							<svg xmlns="http://www.w3.org/2000/svg" id="book_4_" width="62.818" height="51.504" data-name="book (4)" viewBox="0 0 62.818 51.504">
							    <defs>
							        <style>
							            .cls-1{fill:#d81159}
							        </style>
							    </defs>
							    <path id="Trazado_262" d="M256.678 44.86V0l-1.712.144a65.83 65.83 0 0 0-19.954 4.864L232 6.258v44.683l2.194-.912a68.481 68.481 0 0 1 20.64-5.019zm0 0" class="cls-1" data-name="Trazado 262" transform="translate(-199.469)"/>
							    <path id="Trazado_263" d="M290.351 47.3h-3.365v39.258a1.122 1.122 0 0 1-1.03 1.122l-2.873.236q-1.244.1-2.48.255c-.267.032-.533.075-.8.112-.555.074-1.11.149-1.662.237-.322.051-.642.112-.963.168-.495.087-.99.173-1.484.27-.337.067-.673.143-1.017.216-.47.1-.94.2-1.407.313-.35.083-.7.171-1.047.26-.454.112-.906.233-1.357.359l-1.052.3c-.449.133-.891.267-1.334.409l-1.04.336q-.665.224-1.325.463c-.336.122-.673.245-1.017.374-.154.059-.307.121-.46.181h25.711zm0 0" class="cls-1" data-name="Trazado 263" transform="translate(-227.533 -40.665)"/>
							    <path id="Trazado_264" d="M41.712.144L40 0v44.864l1.991.169a68.02 68.02 0 0 1 20.619 5.048l2.069.86V6.258l-3.01-1.25A65.827 65.827 0 0 0 41.712.143zm0 0" class="cls-1" data-name="Trazado 264" transform="translate(-34.391)"/>
							    <path id="Trazado_265" d="M0 47.3v44.87h25.729c-.138-.054-.276-.112-.415-.164-.321-.122-.645-.239-.968-.357-.456-.165-.911-.326-1.37-.48q-.5-.168-1-.328-.683-.224-1.369-.422c-.337-.1-.673-.2-1.009-.292-.461-.128-.923-.249-1.387-.368-.336-.087-.673-.173-1.017-.254-.47-.112-.943-.215-1.415-.317-.336-.073-.673-.147-1.009-.214-.489-.1-.98-.183-1.472-.269l-.967-.17c-.542-.086-1.086-.159-1.63-.232-.275-.037-.548-.081-.822-.112q-1.234-.15-2.468-.255l-3.02-.256a1.122 1.122 0 0 1-1.026-1.122V47.3zm0 0" class="cls-1" data-name="Trazado 265" transform="translate(0 -40.665)"/>
							</svg>
                        </div>
                        <div class="travelto-living__item__content"><?php _e('Información turística','tuku') ?></div>
                    </a>
                
                    <a href="#gastronomia" class="travelto-living__item">
                        <div class="travelto-living__item__image">
							<svg xmlns="http://www.w3.org/2000/svg" width="43.891" height="55.854" viewBox="0 0 43.891 55.854">
							    <defs>
							        <style>
							            .cls-1{fill:#d81159}
							        </style>
							    </defs>
							    <g id="cutlery">
							        <g id="Grupo_46" data-name="Grupo 46">
							            <g id="Grupo_45" data-name="Grupo 45">
							                <path id="Trazado_81" d="M72.008 5.345C69.9 1.948 67.332 0 64.96 0 62.674 0 60.137 1.945 58 5.335a19.778 19.778 0 0 0-3.167 9.981c0 3.341 1.032 5.909 3.067 7.631a9.807 9.807 0 0 0 5.425 2.147v29.123a1.636 1.636 0 1 0 3.273 0V25.095a9.805 9.805 0 0 0 5.425-2.147c2.035-1.722 3.067-4.289 3.067-7.631a19.936 19.936 0 0 0-3.082-9.972z" class="cls-1" data-name="Trazado 81" transform="translate(-54.832)"/>
							            </g>
							        </g>
							        <g id="Grupo_48" data-name="Grupo 48" transform="translate(25.233)">
							            <g id="Grupo_47" data-name="Grupo 47">
							                <path id="Trazado_82" d="M303.164 0a1.637 1.637 0 0 0-1.636 1.636v9.357h-4.419V1.636a1.636 1.636 0 0 0-3.273 0v9.357h-4.419V1.636a1.636 1.636 0 1 0-3.273 0V15.85a9.342 9.342 0 0 0 7.692 9.182v29.185a1.636 1.636 0 0 0 3.273 0V25.032a9.342 9.342 0 0 0 7.691-9.182V1.636A1.637 1.637 0 0 0 303.164 0z" class="cls-1" data-name="Trazado 82" transform="translate(-286.143)"/>
							            </g>
							        </g>
							    </g>
							</svg>
                        </div>
                        <div class="travelto-living__item__content"><?php _e('Gastronomía','tuku') ?></div>
                    </a>
                
            </div>
        </div>

        <div class="travelto-info" id="informacion">
            <div class="travelto-info__icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="50.984" height="59.327" viewBox="0 0 50.984 59.327">
                    <g id="information_2_" data-name="information (2)" transform="translate(-36)">
                        <g id="Grupo_295" data-name="Grupo 295" transform="translate(36)">
                            <g id="Grupo_294" data-name="Grupo 294">
                                <path id="Trazado_242" d="M236.762 182.774c-1.474 0-2.521.622-2.521 1.539v12.476c0 .786 1.048 1.572 2.521 1.572 1.408 0 2.554-.786 2.554-1.572v-12.476c.001-.913-1.145-1.539-2.554-1.539z" class="cls-1" data-name="Trazado 242" transform="translate(-211.27 -161.595)"/>
                                <path id="Trazado_243" d="M235.513 116.361a2.36 2.36 0 1 0 2.653 2.325 2.537 2.537 0 0 0-2.653-2.325z" class="cls-1" data-name="Trazado 243" transform="translate(-210.021 -102.878)"/>
                                <path id="Trazado_244" d="M61.492 0a25.479 25.479 0 0 0-7.715 49.765l5.8 8.545a2.318 2.318 0 0 0 3.836 0l5.8-8.545A25.479 25.479 0 0 0 61.492 0zm5.637 45.549a2.318 2.318 0 0 0-1.294.931l-4.343 6.4-4.343-6.4a2.318 2.318 0 0 0-1.294-.931 20.857 20.857 0 1 1 11.273 0z" class="cls-1" data-name="Trazado 244" transform="translate(-36)"/>
                            </g>
                        </g>
                    </g>
                </svg>
            </div>

            <div class="travelto-info__title">
                <?php the_field( 'titulo_b2' ); ?>
            </div>

            <div class="travelto-info__content">
                <div class="travelto-info__content__left">
                	<?php the_field( 'texto_b2' ); ?>
                </div>
                <div class="travelto-info__content__right">
                	<?php
					$attachment_id = get_field('imagen_mapa_b2');
					$size = "home-bloque2"; // (thumbnail, medium, large, full or custom size)
					$image = wp_get_attachment_image_src( $attachment_id, $size );
					// url = $image[0];
					// width = $image[1];
					// height = $image[2];
					?>
                    <img src="<?php echo $image[0]; ?>" alt="" class="svg-convert">
                    <div class="travelto-info__content__right__list">
                        <div class="travelto-info__content__right__item">
                            <p><?php _e('Idiomas','tuku') ?></p>
                            <?php the_field( 'idiomas_b2' ); ?>
                        </div>
                        <div class="travelto-info__content__right__item">
                            <p><?php _e('Moneda','tuku') ?></p>
                            <?php the_field( 'moneda_b2' ); ?>
                        </div>
                        <div class="travelto-info__content__right__item">
                            <p><?php _e('Hora','tuku') ?></p>
                            <?php the_field( 'hora_b2' ); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="travelto-historia" id="historia">
            <div class="travelto-historia__icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="59.057" height="46.937" viewBox="0 0 59.057 46.937">
                    <g id="mayan-pyramid">
                        <path id="Trazado_135" d="M133.432 66.744a1.732 1.732 0 0 0-1.732-1.732h-1.912v-9.063h.161a1.732 1.732 0 1 0 0-3.464H100.13a1.732 1.732 0 0 0 0 3.464h.221v9.063h-1.912a1.732 1.732 0 0 0-1.732 1.732V70h36.725v-3.256zm-23.588-1.732h-3.464V61.9a1.732 1.732 0 1 1 3.464 0zm6.928 0h-3.464V61.9a1.732 1.732 0 1 1 3.464 0zm6.928 0h-3.464V61.9a1.732 1.732 0 1 1 3.464 0z" class="cls-1" data-name="Trazado 135" transform="translate(-85.541 -52.485)"/>
                        <g id="Grupo_160" data-name="Grupo 160" transform="translate(0 20.98)">
                            <g id="Grupo_157" data-name="Grupo 157" transform="translate(0 17.575)">
                                <path id="Trazado_136" d="M368.739 386.407h-16.675l1.407 8.381h17v-6.649a1.732 1.732 0 0 0-1.732-1.732z" class="cls-1" data-name="Trazado 136" transform="translate(-311.414 -386.407)"/>
                                <path id="Trazado_137" d="M18.352 386.407H1.732A1.732 1.732 0 0 0 0 388.139v6.649h16.946z" class="cls-1" data-name="Trazado 137" transform="translate(0 -386.407)"/>
                            </g>
                            <g id="Grupo_158" data-name="Grupo 158" transform="translate(3.459 8.453)">
                                <path id="Trazado_138" d="M46.384 307.4h-14.69a1.732 1.732 0 0 0-1.732 1.732v3.927h15.473z" class="cls-1" data-name="Trazado 138" transform="translate(-29.962 -307.398)"/>
                                <path id="Trazado_139" d="M353.543 307.4H338.8l.95 5.659h15.529v-3.929a1.732 1.732 0 0 0-1.736-1.73z" class="cls-1" data-name="Trazado 139" transform="translate(-303.137 -307.398)"/>
                            </g>
                            <g id="Grupo_159" data-name="Grupo 159" transform="translate(7.369)">
                                <path id="Trazado_140" d="M190.911 234.19h-9.375l-4.354 25.957h18.088z" class="cls-1" data-name="Trazado 140" transform="translate(-164.094 -234.19)"/>
                                <path id="Trazado_141" d="M338.76 234.19H326.5l.838 4.989h13.151v-3.257a1.732 1.732 0 0 0-1.729-1.732z" class="cls-1" data-name="Trazado 141" transform="translate(-296.173 -234.19)"/>
                                <path id="Trazado_142" d="M77.752 234.19h-12.2a1.732 1.732 0 0 0-1.732 1.732v3.257h13.096z" class="cls-1" data-name="Trazado 142" transform="translate(-63.822 -234.19)"/>
                            </g>
                        </g>
                    </g>
                </svg>                
            </div>

            <div class="travelto-historia__title">
                <?php the_field( 'titulo_b3' ); ?>
            </div>

            <div class="travelto-historia__content">
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
                <div class="travelto-historia__left">
                    <?php the_field( 'texto_b3' ); ?>          
                </div>

                <?php if ( have_rows( 'galeria_b3' ) ) : ?>
                	<div class="travelto-historia__right">
                		<div class="swiper-container swiper-container-banner-travelto-1">
                			<div class="swiper-wrapper">
                				<?php while ( have_rows( 'galeria_b3' ) ) : the_row(); ?>
                					<div class="swiper-slide">
                						<div class="travelto-historia__item-card">
                							<?php
												$attachment_id = get_sub_field('imagen_b3');
												$size = "thumbnail-tour"; // (thumbnail, medium, large, full or custom size)
												$image = wp_get_attachment_image_src( $attachment_id, $size );
												// url = $image[0];
												// width = $image[1];
												// height = $image[2];
                							?>
                							<img src="<?php echo $image[0]; ?>" alt="">
                							<div class="travelto-historia__item-card__circle"></div>
                							<div class="travelto-historia__item-card__content">
                								<?php the_sub_field( 'caption_b3' ); ?>
                							</div>
                						</div>
                					</div>
                				<?php endwhile; ?>
                			</div>
                			<div class="swiper-button-next">
                				<span class="icon-next"></span>
                			</div>
                			<div class="swiper-button-prev">
                				<span class="icon-prev"></span>
                			</div>
                		</div>
                	</div>
                <?php endif; ?>

            </div>

        </div>

        <div class="travelto-destinos" id="destinos">
            <div class="travelto-destinos__icon">
                <svg xmlns="http://www.w3.org/2000/svg" id="compass_3_" width="46.283" height="46.283" data-name="compass (3)" viewBox="0 0 46.283 46.283">
                    <path id="Trazado_283" d="M247.365 186.169l2.813-7.032a.633.633 0 0 0-.823-.823l-7.032 2.813a.633.633 0 0 0-.212 1.035l4.219 4.219a.633.633 0 0 0 1.035-.212z" class="cls-1" data-name="Trazado 283" transform="translate(-220.056 -162.153)"/>
                    <path id="Trazado_284" d="M179.137 250.177l7.032-2.813a.633.633 0 0 0 .212-1.035l-4.219-4.219a.633.633 0 0 0-1.035.212l-2.813 7.032a.633.633 0 0 0 .823.823z" class="cls-1" data-name="Trazado 284" transform="translate(-162.153 -220.056)"/>
                    <path id="Trazado_285" d="M39.505 6.778A23.142 23.142 0 0 0 6.778 39.505 23.142 23.142 0 0 0 39.505 6.778zm-4.9 6.776l-5.782 14.464a1.446 1.446 0 0 1-.806.806l-14.463 5.785a1.446 1.446 0 0 1-1.88-1.88l5.786-14.464a1.446 1.446 0 0 1 .806-.806l14.464-5.785a1.446 1.446 0 0 1 1.88 1.88z" class="cls-1" data-name="Trazado 285"/>
                </svg>                
            </div>

            <div class="travelto-destinos__title">
                <?php _e( 'Todos los destinos','tuku' ); ?>
            </div>

            <div class="travelto-destinos__content">
                <div class="grid-cards-destinos">
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
								
									<a href="<?php echo esc_url( get_term_link( $term ) ) ?>" class="card-destino">
										<img src="<?php echo $image['url']; ?>" alt="<?php echo $term->name; ?>" />
										<span class="card-destino__overlay"></span>
										<div class="card-destino__content">
											<p class="card-destino__content__title"><?php echo $term->name; ?></p>
											<p class="card-destino__content__subtitle"><?php _e('ver itinerarios','tuku') ?></p>
										</div>
									</a>
								
							<?php }
						} 
						?>    
                </div>
            
            </div>
        </div>


        <div class="travelto-turis" id="turistica">
            <div class="travelto-turis__icon">
                <svg xmlns="http://www.w3.org/2000/svg" id="book_4_" width="58.175" height="47.697" data-name="book (4)" viewBox="0 0 58.175 47.697">
                    <path id="Trazado_262" d="M254.854 41.544V0l-1.585.133a60.963 60.963 0 0 0-18.479 4.5L232 5.8v41.38l2.032-.845a63.419 63.419 0 0 1 19.114-4.648zm0 0" class="cls-1" data-name="Trazado 262" transform="translate(-201.874)"/>
                    <path id="Trazado_263" d="M288.451 47.3h-3.116v36.356a1.039 1.039 0 0 1-.954 1.039l-2.66.218q-1.152.1-2.3.236c-.248.03-.494.069-.74.1-.514.068-1.028.138-1.54.219-.3.048-.594.1-.892.156-.458.08-.917.16-1.374.25-.312.062-.623.132-.941.2-.435.092-.87.187-1.3.29-.324.077-.647.159-.969.241-.421.1-.839.216-1.257.333-.325.089-.65.184-.974.279-.415.123-.825.248-1.235.378l-.963.311q-.616.208-1.227.429c-.311.113-.623.227-.942.346-.143.054-.284.112-.426.167h23.81zm0 0" class="cls-1" data-name="Trazado 263" transform="translate(-230.276 -41.155)"/>
                    <path id="Trazado_264" d="M41.585.133L40 0v41.547l1.844.157a62.992 62.992 0 0 1 19.095 4.675l1.916.8V5.8l-2.788-1.162A60.961 60.961 0 0 0 41.585.133zm0 0" class="cls-1" data-name="Trazado 264" transform="translate(-34.806)"/>
                    <path id="Trazado_265" d="M0 47.3v41.55h23.827c-.128-.05-.256-.1-.384-.152-.3-.113-.6-.221-.9-.33-.422-.153-.844-.3-1.269-.445q-.461-.156-.925-.3-.632-.208-1.268-.391c-.312-.091-.623-.183-.935-.27-.427-.118-.855-.23-1.284-.34-.311-.08-.623-.16-.942-.235-.435-.1-.873-.2-1.31-.293-.311-.067-.623-.136-.935-.2-.453-.089-.908-.169-1.363-.249l-.9-.157c-.5-.08-1.006-.147-1.51-.215-.255-.034-.507-.075-.761-.1q-1.143-.138-2.286-.236l-2.8-.237a1.039 1.039 0 0 1-.951-1.039V47.3zm0 0" class="cls-1" data-name="Trazado 265" transform="translate(0 -41.155)"/>
                </svg>             
            </div>

            <div class="travelto-turis__title">
                <?php the_field( 'titulo_b5' ); ?>
            </div>

            <div class="travelto-turis__content">
            	<?php the_field( 'texto_b5' ); ?>
            </div>

        </div>


        <div class="travelto-historia" style="margin-bottom:  50px;" id="gastronomia">
            <div class="travelto-historia__icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="44.691" height="56.873" viewBox="0 0 44.691 56.873">
                    <g id="cutlery">
                        <g id="Grupo_46" data-name="Grupo 46">
                            <g id="Grupo_45" data-name="Grupo 45">
                                <path id="Trazado_81" d="M72.321 5.443C70.175 1.984 67.56 0 65.145 0c-2.328 0-4.911 1.98-7.088 5.433A20.139 20.139 0 0 0 54.832 15.6c0 3.4 1.051 6.017 3.123 7.77a9.986 9.986 0 0 0 5.524 2.186v29.65a1.666 1.666 0 1 0 3.333 0V25.552a9.984 9.984 0 0 0 5.524-2.186c2.072-1.753 3.123-4.367 3.123-7.77a20.3 20.3 0 0 0-3.138-10.153z" class="cls-1" data-name="Trazado 81" transform="translate(-54.832)"/>
                            </g>
                        </g>
                        <g id="Grupo_48" data-name="Grupo 48" transform="translate(25.694)">
                            <g id="Grupo_47" data-name="Grupo 47">
                                <path id="Trazado_82" d="M303.474 0a1.666 1.666 0 0 0-1.666 1.666v9.527h-4.5V1.666a1.666 1.666 0 0 0-3.333 0v9.527h-4.5V1.666a1.666 1.666 0 1 0-3.333 0V16.14a9.512 9.512 0 0 0 7.832 9.349v29.717a1.666 1.666 0 0 0 3.333 0V25.489a9.512 9.512 0 0 0 7.832-9.349V1.666A1.666 1.666 0 0 0 303.474 0z" class="cls-1" data-name="Trazado 82" transform="translate(-286.143)"/>
                            </g>
                        </g>
                    </g>
                </svg>                           
            </div>

            <div class="travelto-historia__title">
                <?php the_field( 'titulo_b6' ); ?>
            </div>

            <div class="travelto-historia__content">
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
                <div class="travelto-historia__left">
                    <?php the_field( 'texto_b6' ); ?>          
                </div>

				<?php if ( have_rows( 'galeria_b6' ) ) : ?>
				    <div class="travelto-historia__right">
				        <div class="swiper-container swiper-container-banner-travelto-2">
				            <div class="swiper-wrapper">
				            	<?php while ( have_rows( 'galeria_b6' ) ) : the_row(); ?>
				                  <div class="swiper-slide">
				                        <div class="travelto-historia__item-card">
                							<?php
												$attachment_id_2 = get_sub_field('imagen_b6');
												$size_2 = "thumbnail-tour"; // (thumbnail, medium, large, full or custom size)
												$image_2 = wp_get_attachment_image_src( $attachment_id_2, $size_2 );
												// url = $image[0];
												// width = $image[1];
												// height = $image[2];
                							?>
				                            <img src="<?php echo $image_2[0]; ?>" alt="">
				                            <div class="travelto-historia__item-card__circle"></div>
				                            <div class="travelto-historia__item-card__content">
				                                <?php the_sub_field( 'caption_b6' ); ?>
				                            </div>
				                        </div>
				                    </div>
				            	<?php endwhile; ?>
				            </div>
				            <div class="swiper-button-next">
				                <span class="icon-next"></span>
				            </div>
				            <div class="swiper-button-prev">
				                <span class="icon-prev"></span>
				            </div>
				        </div>
				    </div>
				<?php endif; ?>
            </div>

        </div>
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
	    
	    var swiper = new Swiper('.swiper-container-banner-travelto-1', {
	        navigation: {
	            nextEl: '.swiper-button-next',
	            prevEl: '.swiper-button-prev',
	        }
	    });

	    var swiper = new Swiper('.swiper-container-banner-travelto-2', {
	        navigation: {
	            nextEl: '.swiper-button-next',
	            prevEl: '.swiper-button-prev',
	        }
	    });
	}); 
</script>