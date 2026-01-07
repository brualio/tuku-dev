<?php get_header(); ?>
<?php /* Template Name: Theme - Preguntas Frecuentes */ ?>

<?php if ( have_rows( 'faqs_b1' ) ) : ?>
	<ul>
		
		
	</ul>

    <div class="faq">
        <div class="container">
            <div class="title"><?php the_title(); ?></div>
        </div>

        <div class="faq-content">
            <div class="container">

				<?php while ( have_rows( 'faqs_b1' ) ) : the_row(); ?>
	                <div class="faq-section">
	                    <div class="faq-section__title">
	                        <?php the_sub_field( 'titulo_faq' ); ?>
	                    </div>
	                    <div class="faq-section__paragraph">
	                        <?php the_sub_field( 'texto_faq' ); ?>
	                    </div>
	                </div>
	            <?php endwhile; ?>

            </div>
        </div>
    </div>
<?php endif; ?>

<?php get_footer(); ?>
<script type="text/javascript"> 
	jQuery(document).ready(function() { 

	}); 
</script>