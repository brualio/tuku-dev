<?php get_header(); ?>
<?php /* Template Name: Theme - Términos y Condiciones */ ?>

<?php if ( have_rows( 'terms_b1' ) ) : ?>
	<div class="faq">
	    <div class="container">
	        <div class="title"><?php the_title(); ?></div>
	    </div>

	    <div class="faq-content">
	        <div class="container">
	        	<?php while ( have_rows( 'terms_b1' ) ) : the_row(); ?>
		            <div class="faq-section">
		                <div class="faq-section__title">
		                    <?php the_sub_field( 'titulo_term' ); ?>
		                </div>
		                <div class="faq-section__paragraph">
		                    <?php the_sub_field( 'texto_term' ); ?>
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