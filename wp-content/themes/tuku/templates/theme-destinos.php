<?php get_header(); ?>
<?php /* Template Name: Theme - Destinos */ ?>

<div class="banner-text">
	<img src="<?php the_post_thumbnail_url( 'full' ); ?>" alt="<?php the_title(); ?>">
	<div class="banner-text__title">
		<?php the_title(); ?>
	</div>
	<div class="banner-text__action-mouse movedownScroll">
		<div class="mouse-animated">
			<span></span>
		</div>
	</div>
</div>
<div class="container">
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

	<?php  $currentlang = get_bloginfo('language'); ?>
	<div class="grid-cards-destinos__action">
		<?php if ($currentlang === "es"): ?>
		<a href="https://tukutravel.com/?s=">
			<?php _e('ver más','tuku') ?>
		</a>
		
		<?php elseif($currentlang=="en-US"): ?>
		<a href="https://tukutravel.com/en?s=">
			<?php _e('ver más','tuku') ?>
		</a>
		
		<?php endif; ?>
	</div>
</div>

<?php get_footer(); ?>
<script type="text/javascript"> 
	jQuery(document).ready(function() { 

	}); 
</script>