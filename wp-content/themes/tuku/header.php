<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *	
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Tunay
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="UTF-8"/>
	<meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no"/>
	<meta http-equiv="X-UA-Compatible" content="ie=edge"/>
	<meta name="theme-color" content="#00204A"/>
	<?php the_field( 'script_header', 'options' ); ?>
	<?php wp_head(); ?>
	<!-- Global site tag (gtag.js) - Google Ads: 10891496690 -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-10891496690"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-10891496690');
</script>
<!-- Event snippet for Website lead conversion page -->
<script>
  gtag('event', 'conversion', {'send_to': 'AW-10891496690/OqiuCIL1nbcDEPKZvMko'});
</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-X2K5ESB3L5"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-X2K5ESB3L5');
</script>

</head>

<body <?php body_class(); ?>>
  <div class="overlay"></div>
  <div class="wrapper">
    <header class="header">
      <div class="header__content">
        <div class="header__left">
          <div class="header__left__menu">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/menu.png" alt="menu">
          </div>
          <div class="header__left__logo-mobile">
              <a href="<?php echo get_home_url(); ?>">
                <img src="<?php the_field( 'logo_header', 'options' ); ?>" alt="">
              </a>
          </div>

          <div class="header__left__list">
            <div class="header__left__close">
              <span class="icon-close-11"></span>
            </div>
            <div class="header__left__logo">
              <a href="<?php echo get_home_url(); ?>">
                <img src="<?php the_field( 'logo_header', 'options' ); ?>" alt="">
              </a>
            </div>
            <div class="header__left__item no-show-desktop">
              <a href="<?php echo get_home_url(); ?>">
                <span>
                  <svg xmlns="http://www.w3.org/2000/svg" width="20.226" height="18.96" viewBox="0 0 20.226 18.96">
                    <g id="home" transform="translate(0 -16.017)">
                      <path id="Trazado_359" d="M55.248 203.973H41.817A1.819 1.819 0 0 1 40 202.156V192.6a.632.632 0 0 1 1.264 0v9.561a.554.554 0 0 0 .553.553h13.431a.554.554 0 0 0 .553-.553V192.6a.632.632 0 0 1 1.264 0v9.561a1.819 1.819 0 0 1-1.817 1.812z" class="cls-1" transform="translate(-38.42 -168.995)"/>
                      <path id="Trazado_360" d="M19.594 25.812a.63.63 0 0 1-.447-.185l-7.861-7.861a1.661 1.661 0 0 0-2.346 0l-7.861 7.86a.632.632 0 0 1-.894-.894l7.861-7.861a2.927 2.927 0 0 1 4.134 0l7.861 7.861a.632.632 0 0 1-.447 1.079z" class="cls-1"/>
                      <path id="Trazado_361" d="M181.689 296.2h-5.056a.632.632 0 0 1-.632-.632v-5.609a1.977 1.977 0 0 1 1.975-1.975h2.37a1.977 1.977 0 0 1 1.975 1.975v5.609a.632.632 0 0 1-.632.632zm-4.424-1.264h3.792v-4.977a.712.712 0 0 0-.711-.711h-2.37a.712.712 0 0 0-.711.711z" class="cls-1" transform="translate(-169.047 -261.222)"/>
                    </g>
                  </svg>
                </span>
                <?php _e('Inicio','tuku') ?>
              </a>
            </div>
            <?php
            $currentlang = get_bloginfo('language');
            if($currentlang=="es"):
              ?>
              <?php 
              $link = get_field('link_1','options');
              if( $link ): 
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
                <div class="header__left__item">
                  <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                    <span>
                      <img src="<?php the_field( 'icono_1', 'options' ); ?>" alt="">     
                    </span>
                    <?php echo esc_html( $link_title ); ?>
                  </a>
                </div>
              <?php endif; ?>
              <?php elseif($currentlang=="en-US"): ?>
                <?php 
                $link = get_field('link_en_1','options');
                if( $link ): 
                  $link_url = $link['url'];
                  $link_title = $link['title'];
                  $link_target = $link['target'] ? $link['target'] : '_self';
                  ?>
                  <div class="header__left__item">
                    <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                      <span>
                        <img src="<?php the_field( 'icono_en_1', 'options' ); ?>" alt="">     
                      </span>
                      <?php echo esc_html( $link_title ); ?>
                    </a>
                  </div>
                <?php endif; ?>
              <?php endif; ?>
              <?php
              $currentlang = get_bloginfo('language');
              if($currentlang=="es"):
                ?>
                <?php 
                $link = get_field('link_2','options');
                if( $link ): 
                  $link_url = $link['url'];
                  $link_title = $link['title'];
                  $link_target = $link['target'] ? $link['target'] : '_self';
                  ?>
                  <div class="header__left__item">
                    <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                      <span>
                        <img src="<?php the_field( 'icono_2', 'options' ); ?>" alt="">           
                      </span>
                      <?php echo esc_html( $link_title ); ?>
                    </a>
                  </div>
                <?php endif; ?>      
                <?php elseif($currentlang=="en-US"): ?>
                  <?php 
                  $link = get_field('link_en_2','options');
                  if( $link ): 
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                    <div class="header__left__item">
                      <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                        <span>
                          <img src="<?php the_field( 'icono_en_2', 'options' ); ?>" alt="">           
                        </span>
                        <?php echo esc_html( $link_title ); ?>
                      </a>
                    </div>
                  <?php endif; ?>
                <?php endif; ?>
                <div class="header__left__item submenu">
                  <a href="#">
                    <span>
                      <svg xmlns="http://www.w3.org/2000/svg" width="20.484" height="20.484" viewBox="0 0 20.484 20.484">
                        <path fill="#fff" d="M9.331 1.064a2.207 2.207 0 0 0-3.118 0L5.055 2.222a.512.512 0 0 0-.048.669 1.812 1.812 0 0 1-2.536 2.537.512.512 0 0 0-.669.047L.643 6.634a2.207 2.207 0 0 0 0 3.118L11.15 20.258a2.208 2.208 0 0 0 3.118 0l5.57-5.57a2.207 2.207 0 0 0 0-3.118zM1.022 8.193a1.172 1.172 0 0 1 .346-.835l.87-.87a2.836 2.836 0 0 0 3.83-3.83l.87-.87a1.182 1.182 0 0 1 1.669 0l8.87 8.87-7.259 7.22-8.85-8.85a1.173 1.173 0 0 1-.346-.835zm18.092 5.771l-5.57 5.57a1.181 1.181 0 0 1-1.669 0l-.932-.932 7.259-7.22.913.913a1.18 1.18 0 0 1 0 1.669zm0 0" transform="translate(.001 -.419)"/>
                      </svg>
                    </span>
                    <?php _e('Itinerarios','tuku') ?>
                  </a>
                  <div class="header__left__item__sub">
                    <div class="header__left__item__sub__content">
                      <div class="header__left__item__sub__title">
                        <?php _e('Itinerarios hechos para ti, experiencias que debes vivir','tuku') ?>
                      </div>
                      <div class="header__left__item__sub__list">
                        <?php
                        $tax = 'itinerarios';
                        $terms = get_terms( $tax, $args = array(
                    'hide_empty' => false, // do not hide empty terms
                  ));
                        foreach( $terms as $term ) {
                          $image = get_field('icono_iti', 'itinerarios_' . $term->term_id );
                          $term_link = get_term_link( $term );
                          if( $term->count > 0 ) {
                            echo '<a href="' . $term_link . '" class="header__left__item__sub__link">';
                            echo '<div class="header__left__item__sub__link__icon">';
                            echo '<img src="' . $image['url'] . '" alt="' . $image['alt'] .'">'; 
                            echo '</div>';
                            echo '<div class="header__left__item__sub__link__title">';
                            echo ''.$term->name.'';
                            echo '</div>';
                            echo '</a>';
                          } 
                        }              
                        ?>
                      </div>
                      <div class="header__left__item__sub__action">


<?php
    $currentlang = get_bloginfo('language');
    if($currentlang=="es"):
?>
<a href="https://tukutravel.com/?s=" class="btn"><?php _e('ver todos','tuku') ?></a>
<?php elseif($currentlang=="en-US"): ?>
<a href="https://tukutravel.com/en?s=" class="btn"><?php _e('ver todos','tuku') ?></a>
<?php endif; ?>

                        
                      </div>
                    </div>
                  </div>
                </div>
             <?php
              $currentlang = get_bloginfo('language');
              if($currentlang=="es"):
                ?>
                <?php 
                $link = get_field('link_3','options');
                if( $link ): 
                  $link_url = $link['url'];
                  $link_title = $link['title'];
                  $link_target = $link['target'] ? $link['target'] : '_self';
                  ?>
                  <div class="header__left__item">
                    <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                      <span>
                        <img src="<?php the_field( 'icono_3', 'options' ); ?>" alt="">
                      </span>
                      <?php echo esc_html( $link_title ); ?>
                    </a>
                  </div>
                <?php endif; ?>
                <?php elseif($currentlang=="en-US"): ?>
                <?php 
                $link = get_field('link_en_3','options');
                if( $link ): 
                  $link_url = $link['url'];
                  $link_title = $link['title'];
                  $link_target = $link['target'] ? $link['target'] : '_self';
                  ?>
                  <div class="header__left__item">
                    <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                      <span>
                        <img src="<?php the_field( 'icono_en_3', 'options' ); ?>" alt="">
                      </span>
                      <?php echo esc_html( $link_title ); ?>
                    </a>
                  </div>
                <?php endif; ?>
                <?php endif; ?>

                <div class="header__left__item">
                  <a href="#" class="openCotizador">
                    <span>
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/phone-contact.svg" alt="">
                    </span>
                    <?php _e('Contáctanos','tuku') ?>
                  </a>
                </div>
			  
			  <div class="header__left__item no-show-desktop">
				  <div class="header__mobile__lenguajes">
                      <?php pll_the_languages(array('show_flags'=>1,'show_names'=>1)); ?>
                </div>
			  </div>

              </div>
            </div>
            <div class="header__right">
              <div class="header__right__search">
                <span class="icon-magnifying-glass"></span>
              </div>
              
				<div class="header__right__mail">
					<div class="header__dropdown__icon">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M20 10.999H22C22 5.869 18.127 2 12.99 2V4C17.052 4 20 6.943 20 10.999Z" fill="white"/>
<path d="M13 7.99999C15.103 7.99999 16 8.89699 16 11H18C18 7.77499 16.225 5.99999 13 5.99999V7.99999ZM16.422 13.443C16.2299 13.2683 15.9774 13.1752 15.7178 13.1832C15.4583 13.1912 15.212 13.2998 15.031 13.486L12.638 15.947C12.062 15.837 10.904 15.476 9.71201 14.287C8.52001 13.094 8.15901 11.933 8.05201 11.361L10.511 8.96699C10.6974 8.78612 10.8061 8.53982 10.8142 8.2802C10.8222 8.02059 10.7289 7.76804 10.554 7.57599L6.85901 3.51299C6.68405 3.32035 6.44089 3.2035 6.18116 3.18725C5.92143 3.17101 5.66561 3.25665 5.46801 3.42599L3.29801 5.28699C3.12512 5.46051 3.02193 5.69145 3.00801 5.93599C2.99301 6.18599 2.70701 12.108 7.29901 16.702C11.305 20.707 16.323 21 17.705 21C17.907 21 18.031 20.994 18.064 20.992C18.3085 20.9783 18.5393 20.8747 18.712 20.701L20.572 18.53C20.7415 18.3325 20.8273 18.0768 20.8112 17.817C20.7952 17.5573 20.6785 17.3141 20.486 17.139L16.422 13.443Z" fill="white"/>
</svg>

					</div>
					
					<div class="dropdown__content">
						<label><?php _e('Llámanos:', 'tuku') ?></label>
						<?php wp_nav_menu( array( 
                        'theme_location' => 'menu-5',
                        'container'      => false,
	'container_class' => '',
                    ) );?>
						<label><?php _e('Escríbenos al correo:','tuku') ?></label>
						<?php wp_nav_menu( array( 
                        'theme_location' => 'menu-6',
                        'container'      => false,
	'container_class' => '',
                    ) );?>
					</div>
				</div>
				<div class="header__right__what">
					<a href="https://wa.me/+51940748076?text=<?php _e('Hola Tuku! Me gustaría recibir información sobre...','tuku') ?>" target="__blank">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M17.415 14.382C17.117 14.233 15.656 13.515 15.384 13.415C15.112 13.316 14.914 13.267 14.715 13.565C14.517 13.861 13.948 14.531 13.775 14.729C13.601 14.928 13.428 14.952 13.131 14.804C12.834 14.654 11.876 14.341 10.741 13.329C9.858 12.541 9.261 11.568 9.088 11.27C8.915 10.973 9.069 10.812 9.218 10.664C9.352 10.531 9.515 10.317 9.664 10.144C9.813 9.96998 9.862 9.84598 9.961 9.64698C10.061 9.44898 10.011 9.27598 9.936 9.12698C9.862 8.97798 9.268 7.51498 9.02 6.91998C8.779 6.34098 8.534 6.41998 8.352 6.40998C8.178 6.40198 7.98 6.39998 7.782 6.39998C7.584 6.39998 7.262 6.47398 6.99 6.77198C6.717 7.06898 5.95 7.78798 5.95 9.25098C5.95 10.713 7.014 12.126 7.163 12.325C7.312 12.523 9.258 15.525 12.239 16.812C12.949 17.118 13.502 17.301 13.933 17.437C14.645 17.664 15.293 17.632 15.805 17.555C16.375 17.47 17.563 16.836 17.811 16.142C18.058 15.448 18.058 14.853 17.984 14.729C17.91 14.605 17.712 14.531 17.414 14.382H17.415ZM11.993 21.785H11.989C10.2184 21.7853 8.48037 21.3093 6.957 20.407L6.597 20.193L2.855 21.175L3.854 17.527L3.619 17.153C2.62914 15.5773 2.10529 13.7538 2.108 11.893C2.11 6.44298 6.544 2.00898 11.997 2.00898C14.637 2.00898 17.119 3.03898 18.985 4.90698C19.9054 5.82356 20.6349 6.91355 21.1313 8.11388C21.6277 9.31421 21.8811 10.6011 21.877 11.9C21.875 17.35 17.441 21.785 11.993 21.785ZM20.405 3.48798C19.3032 2.3789 17.9922 1.49952 16.5481 0.90078C15.1039 0.302044 13.5553 -0.00413728 11.992 -2.00576e-05C5.438 -2.00576e-05 0.102 5.33498 0.1 11.892C0.096963 13.9787 0.644374 16.0294 1.687 17.837L0 24L6.304 22.346C8.04787 23.2961 10.0021 23.7939 11.988 23.794H11.993C18.547 23.794 23.883 18.459 23.885 11.901C23.8898 10.3383 23.5848 8.79008 22.9874 7.34601C22.3901 5.90195 21.5124 4.59065 20.405 3.48798Z" fill="white"/>
</svg>
					</a>
					
				</div>
				
                <?php if ( class_exists( 'WooCommerce' ) ) : ?>
                <div class="header__right__cart">
                    <a href="<?php echo wc_get_cart_url(); ?>" class="header__cart-link" id="header-cart-toggle">
                        <span class="icons icons-cart"></span>
                        <?php $cart_count = WC()->cart ? WC()->cart->get_cart_contents_count() : 0; ?>
                        <span class="cart-count <?php echo $cart_count ? '' : 'hidden'; ?>"><?php echo $cart_count; ?></span>
                    </a>
                </div>
                <?php endif; ?>

                <div class="header__right__lenguajes">
                  <div class="dropdown">

                    <div class="drop-dl">
                      <a class="drop-lang" href="#">
                        <?php echo pll_current_language(); ?>
                      </a>
                    </div>
                    <div class="lang-select" style="display: none;">
                      <?php pll_the_languages(array('show_flags'=>1,'show_names'=>1)); ?>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
            <div class="header-search">
              <div class="header-search__content">
                <div class="header-search__input">
                  <form role="search" action="<?php echo site_url('/');  if(pll_current_language() === 'en') {echo pll_current_language();}; ?>" method="get" id="searchform">
                    <input type="text" name="s" placeholder="<?php _e('Buscar ciudad', 'tuku') ?>"/>
                    <input id="buscador" type="submit" value="">
                  </form>
                  <div class="header-search__actions">
                    <span class="icon-magnifying-glass enviar-bus"></span>
                    <span class="icon-close-11 btn-search-close"></span>
                  </div>
                </div>
              </div>
            </div>
          </header>