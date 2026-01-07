<?php get_header(); ?>
<?php /* Template Name: Theme - Políticas */ ?>


<?php if ( have_rows( 'politicas_b1' ) ) : ?>
	<div class="faq">
	    <div class="container">
	        <div class="title"><?php the_title(); ?></div>
	    </div>

	    <div class="faq-content">
	        <div class="container">
	            <div class="pol-section">
	                <ol class="ol-pol" type="1">
	                	<?php while ( have_rows( 'politicas_b1' ) ) : the_row(); ?>
		                    <li>
		                        <div class="faq-section__title">
		                            <?php the_sub_field( 'titulo_pol' ); ?>
		                        </div>
		                        <div class="faq-section__paragraph">
		                            <?php the_sub_field( 'texto_pol' ); ?>
		                        </div>
		                    </li>
		                <?php endwhile; ?>
	                </ol>
	            </div>

	        </div>
	    </div>
	</div>
<?php endif; ?>


<?php get_footer(); ?>
<script type="text/javascript"> 
	jQuery(document).ready(function() { 

	}); 
</script>