<?php get_header(); ?>
<?php /* Template Name: Theme - Libro de Reclamaciones */ ?>


<div class="libro">
	<div class="libro__title">
		<?php the_title(); ?>
	</div>
	<div class="libro__content">
		<div class="container">
            <?php
            $currentlang = get_bloginfo('language');
            if($currentlang=="es"):
            ?>
                <?php echo do_shortcode( '[contact-form-7 id="688" title="Libro de reclamaciones ES"]' ); ?>
            <?php elseif($currentlang=="en-US"): ?>
                <?php echo do_shortcode( '[contact-form-7 id="689" title="Libro de reclamaciones EN"]' ); ?>
                        
            <?php endif; ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>
<script type="text/javascript"> 
	jQuery(document).ready(function() { 

	}); 
</script>