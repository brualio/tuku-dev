<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Staff_Digital
 */
?>
 
    <footer class="footer">
        <div class="container">
            <div class="footer-top">
                <div class="footer-top__logo">
                    <img src="<?php the_field( 'logo_footer', 'options' ); ?>" alt="">
                </div>
                <div class="footer-top__links">
                    <?php wp_nav_menu( array( 
                        'theme_location' => 'menu-2',
                        'container'      => 'ul',
                        'menu_class'     => 'footer-top__list',
                    ) );?>
                </div>
                <?php if ( have_rows( 'redes_sociales', 'options' ) ) : ?>
                    <div class="footer-top__social">
                        <ul class="footer-top__social__list">
                            <?php while ( have_rows( 'redes_sociales', 'options' ) ) : the_row(); ?>
                                <li class="footer-top__social__link">
                                    <a href="<?php the_sub_field( 'url_red_social', 'options' ); ?>" target="_blank">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/<?php the_sub_field( 'red_social', 'options' ); ?>.svg" alt="">
                                    </a>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
            <div class="divider"></div>
            <div class="footer-end">
                <div class="footer-end__copy">
                    <span>©<?php _e('Copyright © 2020 Tuku Travel, All rights reserved - Based in Lima Peru','tuku') ?></span>
                </div>
                <div class="footer-end__otherlinks">
                    <?php wp_nav_menu( array( 
                        'theme_location' => 'menu-3',
                        'container'      => 'ul',
                        'menu_class'     => 'footer-end__otherlinks__list',
                    ) );?>
                    <div class="footer-end__otherlinks__devs">
                        <?php _e('Design & Dev','tuku') ?>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>


<div class="modal modal__bg modal-cotizador" role="dialog" aria-hidden="true">
    <div class="modal__dialog">
        <div class="modal__content">
            <div class="modal__close"><span class="icon-close-11"></span></div>
            <div class="modal__header">
                <?php 
                if ( is_singular( 'tours' ) ) {
                     echo '<div class="modal__title">';
                     echo ''. the_title().'';
                     echo '</div>';
                } else {
                     echo '<div class="modal__title">' ;
                     echo ''. _e('Nos gustaría escuchar de ti','tuku') .'';
                     echo '</div>';
                }
                ?>
            </div>
            <?php
            $currentlang = get_bloginfo('language');
            if($currentlang=="es"):
            ?>
                <?php echo do_shortcode( '[contact-form-7 id="259" title="Formulario de contacto ES"]' ); ?>
                                <div class="modal__logo">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/logo-footer.png" alt="">
                </div>
            </div>
            <?php elseif($currentlang=="en-US"): ?>
                <?php echo do_shortcode( '[contact-form-7 id="6" title="Formulario de contacto EN"]' ); ?>
                                <div class="modal__logo">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/logo-footer.png" alt="">
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>


<div class="modal modal-nesletter" id="modalnewsletter">
    <div class="modal__dialog">
        <div class="modal__content">
            <div class="newsletter-thx__icon">
                <svg xmlns="http://www.w3.org/2000/svg" id="email" width="60.766" height="31.758" viewBox="0 0 60.766 31.758">
                    <defs>
                        <style>
                            .cls-1{fill:#d81159}
                        </style>
                    </defs>
                    <g id="Grupo_463" transform="translate(13.53)">
                        <g id="Grupo_462">
                            <path id="Trazado_358" d="M114 122.21v31.758h47.236V122.21zm40.609 3.561l-16.991 13.95-16.991-13.95zm-37.049 2.09l13.34 10.952-13.34 9.848zm3.629 22.546l12.548-9.265 3.88 3.185 3.88-3.185 12.548 9.265zm36.486-1.746l-13.34-9.848 13.34-10.952z" class="cls-1" transform="translate(-114 -122.21)"/>
                        </g>
                    </g>
                    <g id="Grupo_465" transform="translate(0 21.177)">
                        <g id="Grupo_464">
                            <path id="Rectángulo_766" d="M0 0H10.168V3.561H0z" class="cls-1"/>
                        </g>
                    </g>
                    <g id="Grupo_467" transform="translate(2.374 14.099)">
                        <g id="Grupo_466">
                            <path id="Rectángulo_767" d="M0 0H7.794V3.561H0z" class="cls-1"/>
                        </g>
                    </g>
                    <g id="Grupo_469" transform="translate(4.747 7.02)">
                        <g id="Grupo_468">
                            <path id="Rectángulo_768" d="M0 0H5.42V3.561H0z" class="cls-1"/>
                        </g>
                    </g>
                </svg>
            </div>
            <div class="newsletter-thx__title">
                <?php _e('Suscripcion exitosa','tuku') ?>
            </div>
            <div class="newsletter-thx__desc">
                <?php _e('Ahora podrás ver todas nuestras ofertas y novedades en tu email','tuku') ?>
            </div>
        </div>
    </div>
</div>

<div class="modal modal-thx">
    <div class="modal__dialog">
        <div class="modal__content">
            <div class="thx-top">
                <svg xmlns="http://www.w3.org/2000/svg" width="20.902" height="20.902" viewBox="0 0 20.902 20.902">
                    <defs>
                        <style>
                            .cls-2{fill:#d81159}
                        </style>
                    </defs>
                    <g id="compass_2_" opacity="0.75">
                        <g id="Grupo_221">
                            <g id="Grupo_220">
                                <path id="Trazado_218" d="M10.451 0A10.451 10.451 0 1 0 20.9 10.451 10.451 10.451 0 0 0 10.451 0zm0 19.409a8.958 8.958 0 1 1 8.958-8.958 8.958 8.958 0 0 1-8.958 8.958z" class="cls-2"/>
                            </g>
                        </g>
                        <g id="Grupo_223" transform="translate(4.954 4.955)">
                            <g id="Grupo_222">
                                <path id="Trazado_219" d="M123.848 113.35a.747.747 0 0 0-.666 0l-6.334 3.167a.747.747 0 0 0-.334.334l-3.167 6.334a.746.746 0 0 0 1 1l6.334-3.167a.747.747 0 0 0 .334-.334l3.167-6.334a.747.747 0 0 0-.334-1zm-8.164 8.5l1.7-3.4 1.7 1.7zm4.46-2.758l-1.7-1.7 3.4-1.7z" class="cls-2" transform="translate(-113.269 -113.272)"/>
                            </g>
                        </g>
                    </g>
                </svg>
                <span></span>
                <span></span>
                <span></span>
                <svg xmlns="http://www.w3.org/2000/svg" width="23.026" height="17.539" viewBox="0 0 23.026 17.539">
                    <g opacity="0.75">
                        <g>
                            <path fill="#d81159" d="M21 61H2.024A2.027 2.027 0 0 0 0 63.024v13.492a2.027 2.027 0 0 0 2.024 2.024H21a2.027 2.027 0 0 0 2.024-2.024V63.024A2.027 2.027 0 0 0 21 61zm-.279 1.349l-9.167 9.167-9.244-9.167zM1.349 76.236V63.3l6.5 6.442zm.954.954l6.5-6.5 2.278 2.259a.675.675 0 0 0 .952 0l2.221-2.221 6.467 6.467zm19.374-.954L15.21 69.77l6.467-6.47z" transform="translate(-.001) translate(.001) translate(0 -61)"/>
                        </g>
                    </g>
                </svg>
                <span></span>
                <span></span>
                <span></span>
                <svg xmlns="http://www.w3.org/2000/svg" width="20.893" height="20.893" viewBox="0 0 20.893 20.893">
                    <path fill="#d81159" d="M15.064 7.132a.816.816 0 0 1 0 1.154l-5.475 5.476a.816.816 0 0 1-1.154 0l-2.606-2.607A.816.816 0 0 1 6.983 10l2.029 2.03 4.9-4.9a.816.816 0 0 1 1.154 0zm5.829 3.315A10.447 10.447 0 1 1 10.447 0a10.441 10.441 0 0 1 10.446 10.447zm-1.632 0a8.814 8.814 0 1 0-8.814 8.814 8.809 8.809 0 0 0 8.814-8.814zm0 0" opacity="0.75"/>
                </svg>
            </div>
            <div class="thx-image">
                <svg xmlns="http://www.w3.org/2000/svg" width="137.089" height="137.089" viewBox="0 0 137.089 137.089">
                    <defs>
                        <style>
                            .cls-1{fill:#d81159}
                        </style>
                    </defs>
                    <g id="outline">
                        <path id="Trazado_238" d="M16.021 441.769a9.139 9.139 0 0 0 9.1 8.507c.214 0 .43-.007.646-.022a9.139 9.139 0 1 0-9.75-8.485zm5.67-3.631a4.541 4.541 0 0 1 3.131-1.559c.108-.008.216-.011.323-.011a4.57 4.57 0 1 1-3.454 1.571z" class="cls-1" transform="translate(-15.999 -313.188)"/>
                        <circle id="Elipse_830" cx="2.285" cy="2.285" r="2.285" class="cls-1" transform="translate(18.272 114.247)"/>
                        <circle id="Elipse_831" cx="2.285" cy="2.285" r="2.285" class="cls-1" transform="translate(24.735 107.785)"/>
                        <path id="Trazado_239" d="M125.9 371.438a2.285 2.285 0 1 0 3.231 0 2.285 2.285 0 0 0-3.231 0z" class="cls-1" transform="translate(-94.035 -269.447)"/>
                        <path id="Trazado_240" d="M148.526 348.81a2.285 2.285 0 1 0 3.231 0 2.285 2.285 0 0 0-3.231 0z" class="cls-1" transform="translate(-110.198 -253.281)"/>
                        <path id="Trazado_241" d="M198.282 16.824a2.285 2.285 0 0 0-2.492-.7L81.549 54.963a2.285 2.285 0 0 0-.873 3.787l17.18 17.016 11.944 39.148a2.282 2.282 0 0 0 4.014.7c.01-.013.021-.024.031-.038l10.028-14.037 16.208 16.054a2.285 2.285 0 0 0 1.608.661 2.241 2.241 0 0 0 .317-.022 2.285 2.285 0 0 0 1.675-1.144L198.517 19.4a2.285 2.285 0 0 0-.235-2.58zM175.639 27.8l-75.4 43.893L86.516 58.1zm.6 4.937l-63.295 54.5a2.285 2.285 0 0 0-.783 1.511L110.82 102.6l-8.233-26.982zm-61.157 73.245l1.163-12 4.339 4.3zm26.082 6.251L117.8 89.09l70.375-60.6z" class="cls-1" transform="translate(-61.721 -16)"/>
                    </g>
                </svg>
            </div>
            <div class="thx-title">
                <?php _e('Congrats"','tuku') ?>
            </div>
            <div class="thx-desc">
                <?php _e('Hemos recibido tu formulario de solicitud, te contactaremos a la brevedad','tuku') ?>
            </div>
            <div class="thx-action">
                <a href="<?php the_permalink( ); ?>" class="btn">
                    <?php _e('Continuar reservando','tuku') ?>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="social-float">
        <div class="social-float__list">
            
            <a href="https://api.whatsapp.com/send?phone=+51940748076" class="social-float__item" target="_blank">
                <div class="social-float__text">Whatsapp</div>
                <div class="social-float__circle">
                    <svg xmlns="http://www.w3.org/2000/svg" width="21.172" height="21.274" viewBox="0 0 21.172 21.274">
                        <path id="whatsapp" fill="#d81159" fill-rule="evenodd" d="M18.337 3.092A10.544 10.544 0 0 0 1.745 15.811L.25 21.274l5.588-1.466a10.531 10.531 0 0 0 5.038 1.283 10.546 10.546 0 0 0 7.457-18zM10.88 19.311a8.751 8.751 0 0 1-4.46-1.221l-.32-.19-3.316.87.885-3.233-.211-.337a8.762 8.762 0 1 1 7.422 4.106zm4.806-6.562c-.263-.132-1.558-.769-1.8-.857s-.417-.132-.592.132-.68.857-.834 1.033-.307.2-.571.066a7.194 7.194 0 0 1-2.118-1.307A7.945 7.945 0 0 1 8.305 9.99c-.153-.264 0-.393.116-.538a7.451 7.451 0 0 0 .658-.9.484.484 0 0 0-.022-.461c-.066-.132-.592-1.428-.812-1.956s-.431-.444-.593-.452-.329-.009-.5-.009a.967.967 0 0 0-.7.33 2.954 2.954 0 0 0-.922 2.2 5.124 5.124 0 0 0 1.07 2.721 11.741 11.741 0 0 0 4.5 3.975 15.077 15.077 0 0 0 1.5.555 3.611 3.611 0 0 0 1.659.1 2.714 2.714 0 0 0 1.778-1.252 2.2 2.2 0 0 0 .153-1.253c-.066-.11-.241-.176-.5-.308zm0 0" transform="translate(-.25)"/>
                    </svg>                    
                </div>
            </a>
            
            <a href="https://www.linkedin.com/company/69374715/admin/" class="social-float__item" target="_blank">
                <div class="social-float__text">Linkedin</div>
                <div class="social-float__circle">
                    <svg xmlns="http://www.w3.org/2000/svg" width="17.995" height="18.001" viewBox="0 0 17.995 18.001">
                        <defs>
                            <style>
                                .cls-1{fill:#d81159}
                            </style>
                        </defs>
                        <g id="linkedin_1_" data-name="linkedin (1)" transform="translate(-.03)">
                            <path id="Trazado_296" d="M15.92 19.776h3.5a.563.563 0 0 0 .563-.563C19.715 13.32 21.36 7.1 15.224 7.1a4.463 4.463 0 0 0-2.8.935c0-1.1-1.184-.49-3.918-.653a.563.563 0 0 0-.563.563c.227 10.625-.506 11.829.563 11.829H12c1.015 0 .369-1.431.563-6.141 0-1.946.563-2.327 1.535-2.327 1.076 0 1.256.747 1.256 2.421.197 4.627-.445 6.049.566 6.049zm-1.82-9.594c-3.368 0-2.66 3.7-2.66 8.468H9.072V8.509H11.3v.974a.6.6 0 0 0 1.109.263 3.126 3.126 0 0 1 2.813-1.519c2.645 0 3.629 1.3 3.629 4.8v5.628h-2.37c0-5.358.567-8.469-2.381-8.469z" class="cls-1" data-name="Trazado 296" transform="translate(-1.969 -1.775)"/>
                            <path id="Trazado_297" d="M.923 7.472C-.143 7.472.587 8.661.36 19.3a.563.563 0 0 0 .563.563h3.5c1.065 0 .336-1.189.563-11.829 0-.971-1.411-.4-4.061-.563zm2.936 11.266H1.485V8.6h2.374z" class="cls-1" data-name="Trazado 297" transform="translate(-.073 -1.862)"/>
                            <path id="Trazado_298" d="M2.6 0c-3.435 0-3.414 5.2 0 5.2S6.033 0 2.6 0zm0 4.072a1.474 1.474 0 0 1 0-2.947 1.474 1.474 0 0 1 0 2.947z" class="cls-1" data-name="Trazado 298"/>
                        </g>
                    </svg>
                </div>
            </a>
             
             <a href="https://www.instagram.com/tukutravelperu/" class="social-float__item" target="_blank">
                <div class="social-float__text">Instagram</div>
                <div class="social-float__circle">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18.285" height="18.285" viewBox="0 0 18.285 18.285">
                        <defs>
                            <style>
                                .cls-1{fill:#d81159}
                            </style>
                        </defs>
                        <g id="instagram">
                            <path id="Trazado_230" d="M10.538 5.838a4.692 4.692 0 1 0 4.692 4.692 4.692 4.692 0 0 0-4.692-4.692zm0 7.736a3.045 3.045 0 1 1 3.043-3.044 3.045 3.045 0 0 1-3.043 3.044z" class="cls-1" data-name="Trazado 230" transform="translate(-1.392 -1.391)"/>
                            <path id="Trazado_231" d="M12.911.058c-1.681-.078-5.846-.074-7.532 0a5.464 5.464 0 0 0-3.836 1.478C-.216 3.3.009 5.664.009 9.139c0 3.556-.2 5.87 1.536 7.6 1.765 1.764 4.169 1.536 7.6 1.536 3.522 0 4.739 0 5.984-.48 1.694-.657 2.969-2.171 3.1-4.89.079-1.683.075-5.849 0-7.532-.152-3.208-1.875-5.155-5.316-5.314zm2.662 15.52c-1.153 1.153-2.751 1.05-6.451 1.05-3.809 0-5.337.056-6.451-1.061-1.284-1.278-1.051-3.329-1.051-6.439 0-4.209-.432-7.24 3.789-7.456.975-.033 1.26-.047 3.7-.047l.034.023c4.06 0 7.244-.425 7.436 3.8.043.964.053 1.253.053 3.692 0 3.764.071 5.3-1.062 6.441z" class="cls-1" data-name="Trazado 231" transform="translate(0 -.001)"/>
                            <circle id="Elipse_798" cx="1.097" cy="1.097" r="1.097" class="cls-1" data-name="Elipse 798" transform="translate(12.926 3.166)"/>
                        </g>
                    </svg>
                </div>
            </a>
             
             <a href="https://www.facebook.com/TukuTravel" class="social-float__item" target="_blank">
                <div class="social-float__text">Facebook</div>
                <div class="social-float__circle">
                    <svg xmlns="http://www.w3.org/2000/svg" width="12.112" height="21.339" viewBox="0 0 12.112 21.339">
                        <path id="facebook_1_" fill="#d81159" d="M7.981 21.339H4.564A1.036 1.036 0 0 1 3.529 20.3v-7.7H1.535A1.036 1.036 0 0 1 .5 11.561v-3.3a1.036 1.036 0 0 1 1.035-1.038h1.994V5.569a5.631 5.631 0 0 1 1.489-4.035A5.363 5.363 0 0 1 8.972 0h2.606a1.037 1.037 0 0 1 1.033 1.035v3.07a1.036 1.036 0 0 1-1.035 1.035H9.822c-.535 0-.671.107-.7.14-.048.055-.105.209-.105.634v1.309h2.429a1.052 1.052 0 0 1 .512.13 1.039 1.039 0 0 1 .533.905v3.3a1.036 1.036 0 0 1-1.038 1.042H9.017v7.7a1.036 1.036 0 0 1-1.035 1.035zm-3.2-1.251h2.984v-8.052a.692.692 0 0 1 .691-.691h2.781V8.474H8.456a.692.692 0 0 1-.691-.691V5.916a2.13 2.13 0 0 1 .419-1.462 2.12 2.12 0 0 1 1.638-.564h1.539V1.254H8.972A3.949 3.949 0 0 0 4.78 5.569v2.214a.692.692 0 0 1-.691.691H1.751v2.871h2.338a.692.692 0 0 1 .691.691zm6.8-18.833zm0 0" data-name="facebook (1)" transform="translate(-.5)"/>
                    </svg>
                </div>
            </a>
            
            <a href="https://www.youtube.com/channel/UCOredwHdPNjQbv66UijdgGg" class="social-float__item" target="_blank">
                <div class="social-float__text">Youtube</div>
                <div class="social-float__circle">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20.925" height="15.848" viewBox="0 0 20.925 15.848">
                        <defs>
                            <style>
                                .cls-1{fill:#d81159}
                            </style>
                        </defs>
                        <g id="youtube" transform="translate(.001)">
                            <path id="Trazado_278" d="M196.825 109.158l-4.623-2.529a.849.849 0 0 0-1.257.745v5.015a.848.848 0 0 0 1.251.748l4.623-2.486a.849.849 0 0 0 .005-1.493zm-4.653 2.6v-3.748l3.455 1.89zm0 0" class="cls-1" data-name="Trazado 278" transform="translate(-183.143 -102.17)"/>
                            <path id="Trazado_279" d="M20.77 3.74v-.01a4.785 4.785 0 0 0-.924-2.43A3.4 3.4 0 0 0 17.591.245l-.1-.012h-.037C14.684.028 10.507 0 10.465 0h-.007c-.042 0-4.219.028-7.011.229H3.41l-.1.012a3.319 3.319 0 0 0-2.24 1.094 5.015 5.015 0 0 0-.915 2.384v.021C.147 3.811 0 5.479 0 7.154V8.72c0 1.675.148 3.343.154 3.414v.011a4.738 4.738 0 0 0 .919 2.4 3.475 3.475 0 0 0 2.327 1.04c.085.01.158.018.208.027l.048.007c1.6.152 6.6.227 6.817.23h.013c.042 0 4.219-.028 6.986-.229h.037l.117-.013a3.242 3.242 0 0 0 2.223-1.063 5.014 5.014 0 0 0 .915-2.385v-.021c.006-.07.154-1.738.154-3.413V7.154c0-1.675-.148-3.343-.154-3.413zM19.7 8.72c0 1.55-.135 3.147-.148 3.293a3.893 3.893 0 0 1-.6 1.7 2.017 2.017 0 0 1-1.447.671l-.131.015c-2.676.193-6.7.223-6.881.224-.208 0-5.142-.079-6.691-.222-.079-.013-.165-.023-.255-.033a2.293 2.293 0 0 1-1.568-.655l-.015-.013a3.532 3.532 0 0 1-.59-1.682c-.01-.111-.149-1.726-.149-3.3V7.154c0-1.549.135-3.143.148-3.293a3.814 3.814 0 0 1 .6-1.7 2.116 2.116 0 0 1 1.478-.7l.1-.012c2.715-.194 6.763-.223 6.909-.224s4.193.03 6.883.224l.108.013a2.2 2.2 0 0 1 1.5.68v.005a3.589 3.589 0 0 1 .59 1.706c.009.1.149 1.723.149 3.3zm0 0" class="cls-1" data-name="Trazado 279"/>
                        </g>
                    </svg>
                </div>
            </a>
            
            <a href="tel:+51 940748076" class="social-float__item" target="_blank">
                <div class="social-float__text">Phone</div>
                <div class="social-float__circle">
                    <svg xmlns="http://www.w3.org/2000/svg" id="phone" width="21.42" height="21.42" viewBox="0 0 21.42 21.42">
                        <path id="Trazado_228" fill="#d81159" d="M15.395 21.42a5.968 5.968 0 0 1-2.047-.366A21.832 21.832 0 0 1 5.42 16 21.831 21.831 0 0 1 .366 8.073a5.925 5.925 0 0 1-.3-2.912A6.075 6.075 0 0 1 3.186.713 5.964 5.964 0 0 1 6.042 0 .669.669 0 0 1 6.7.529l1.051 4.9a.67.67 0 0 1-.181.614l-1.8 1.8a17.619 17.619 0 0 0 7.809 7.809l1.8-1.8a.67.67 0 0 1 .614-.181l4.9 1.051a.669.669 0 0 1 .529.654 5.964 5.964 0 0 1-.713 2.856 6.075 6.075 0 0 1-4.447 3.122 5.954 5.954 0 0 1-.865.064zM5.507 1.368a4.69 4.69 0 0 0-3.883 6.248A20.3 20.3 0 0 0 13.8 19.8a4.69 4.69 0 0 0 6.248-3.883l-3.989-.855-1.875 1.875a.669.669 0 0 1-.758.133 18.953 18.953 0 0 1-9.071-9.081.669.669 0 0 1 .133-.758l1.874-1.875z" data-name="Trazado 228"/>
                    </svg>
                </div>
            </a>
        </div>
        <div class="social-float__principal">
            <svg xmlns="http://www.w3.org/2000/svg" width="20.695" height="21.953" viewBox="0 0 20.695 21.953">
                <g id="share_1_" data-name="share (1)" transform="translate(-13.8)">
                    <path id="Trazado_276" fill="#fff" d="M30.565 14.1a3.928 3.928 0 0 0-3.109 1.532l-6.031-3.369a3.938 3.938 0 0 0 .219-1.295 3.852 3.852 0 0 0-.223-1.3l6.026-3.364a3.92 3.92 0 1 0-.811-2.384 3.832 3.832 0 0 0 .223 1.3l-6.021 3.368a3.921 3.921 0 1 0 .009 4.763l6.026 3.369a3.923 3.923 0 1 0 3.692-2.62zm0-12.868a2.694 2.694 0 1 1-2.694 2.694 2.7 2.7 0 0 1 2.694-2.691zM17.729 13.666a2.694 2.694 0 1 1 2.694-2.694 2.7 2.7 0 0 1-2.694 2.694zm12.836 7.052a2.694 2.694 0 1 1 2.694-2.694 2.7 2.7 0 0 1-2.694 2.693z" data-name="Trazado 276"/>
                </g>
            </svg>
        </div>
    </div>

<?php wp_footer(); ?>

<script>
    document.addEventListener('contextmenu', event => event.preventDefault());

    $(function(){
        $('#room-2 input[name=adultos]').on('change',function(){
            var title = $('#room-2 input[name=adultos]').val();
            $("input#adultos2").val(title);
        });
 
        $('.enviar-bus').click(function(){
            $( "#buscador" ).trigger( "click" );
        })
    });

</script>

</div>
</body>
</html>