<?php get_header(); ?>

    <div class="error-404">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/error.png" />

        <div class="error-404__content">
            <div class="container">
                <div class="error-404__title">404</div>
                <div class="error-404__subtitle"><?php _e('Página no encontrada','tuku') ?></div>
                <div class="error-404__paragraph">
                    <?php _e('¡Ups! La página que busca no existe. Puede que se haya movido o eliminado.','tuku') ?>
                </div>
                <a href="<?php echo get_home_url(); ?>" class="btn btn-white-line">
                    <?php _e('Volver al inicio','tuku') ?>
                </a>
            </div>
        </div>
    </div>
	
<?php get_footer(); ?>