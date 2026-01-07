<?php get_header(); ?>

<section class="b1servicios taxonomy__page">
	<div class="layout">
		<div class="b1_casos__titulo wow fadeInUp" data-wow-delay=".4s">
<?php
$taxonomy = get_queried_object();

?>
			<h3><?php _e('Servicios','tunay') ?></h3>
			<h1><?php _e('Tratamientos de','tunay') ?> <?php echo  $taxonomy->name; ?></h1>
		</div>
		<div class="animate__text wow fadeInUp" data-wow-delay=".4s">
			<p><?php echo $taxonomy->description; ?></p>
		</div>
	</div>
</section>


	<section class="b2servicios bg__rotate">
		<div class="layout">
			<div class="wrap__servicios">
				<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
					<a href="<?php the_permalink(); ?>" class="link__servicio wow fadeInUp" data-wow-delay=".4s">
						<div class="item__servicios">
							<div class="img__servicios">
								<img src="<?php the_post_thumbnail_url( $size = 'thumbnail-servicio' ) ?>" alt="">
							</div>
						</div>
						<div class="content__servicio">
							<div class="title__servicio">
								<h2><?php the_title( ); ?></h2>
							</div>
							<div class="btn__servicio">
								<span><i class="icon-right"></i></span>
							</div>
						</div>
					</a>
				<?php endwhile; wp_reset_postdata(); ?>
			</div>
			<div class="paginador wow fadeInUp" data-wow-delay=".4s">
				<?php if(function_exists('wp_pagenavi')) { wp_pagenavi( array( 'query' => $wp_query ) ); } ?>
			</div>
		</div>
	</section>

<?php get_footer(); ?>
<script type="text/javascript"> 
	jQuery(document).ready(function() { 
		$(".header__wrap").addClass("wrap__dark ");
	}); 
</script>