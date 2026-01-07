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
                        <a href="" class="btn"><?php _e('ver todos') ?></a>
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

              </div>
            </div>
            <div class="header__right">
              <div class="header__right__search">
                <span class="icon-magnifying-glass"></span>
              </div>
              <?php
              $currentlang = get_bloginfo('language');
              if($currentlang=="es"):
                ?>
                <a href="<?php echo get_home_url(); ?>/mi-lista-de-deseos" class="header__right__whist">
                  My wish list <span class="icon-heart1"></span>
                </a>
                <?php elseif($currentlang=="en-US"): ?>
                  <a href="<?php echo get_home_url(); ?>/my-wishlist" class="header__right__whist">
                    My wish list <span class="icon-heart1"></span>
                  </a>
                <?php endif; ?>
                <div class="header__right__lenguajes">
                  <div class="dropdown">
                    <?php pll_the_languages( array( 'show_flags'=>1,'dropdown' => 1 ) ); ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="header-search">
              <div class="header-search__content">
                <div class="header-search__input">
                  <form role="search" action="<?php echo site_url('/'); ?>" method="get" id="searchform">
                    <input type="text" name="s" placeholder="<?php _e('Buscar ciudad') ?>"/>
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