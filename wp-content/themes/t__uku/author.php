<?php get_header(); ?>


<div class="news__detail__banner" style="background-image: url('<?php the_field('header_image_blog','options'); ?>');">
	<div class="news__detail__banner__container">
	<div class="news__detail__banner__title">
		<h3><?php _e( 'Autor', 'tuku' ); ?></h3>
		<h1> <?php the_author(); ?></h1>
	</div>
	</div>
	</div>
</div>

<div class="block__news">
	<div class="block__news__container">
		<div class="block__news__items__wrap">
			<div class="block__news__items">
				<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
				<?php get_template_part( 'templates/content', 'post'); ?>
				<?php endwhile;
				wp_reset_query(); ?>
			</div>
			<div class="pagination__block--wp">
				<?php wp_pagenavi(); ?>
			</div>
		</div>
		
		<div class="block__news__trending">
			<div class="block__news__trending__item__block">
				<div class="block__news__trending__item__block__title">
					<h4><?php _e( 'Post recientes', 'tuku' ); ?></h4>
				</div>
				<?php
				$args = array( 
				'post_type' => 'post', 
				'post_status' => 'publish',
				'posts_per_page' => 5,
				);
				$wp_query = new WP_Query($args); ?>
				<?php if($wp_query->have_posts()) : ?>
				<div class="block__news__trending__items">
				<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
				<a href="<?php the_permalink(); ?>" class="block__news__trending__item" >
					<div class="block__news__trending__img" style="background-image: url(<?php the_post_thumbnail_url(); ?>);"></div>
					<div class="block__news__trending__text">
						<h3><?php the_title(); ?></h3>
						<?php $date_day = ''.get_the_date('j').'';  ?>
						<?php $date_month = ''.get_the_date('F').'';  ?>
						<?php $date_year = ''.get_the_date('Y').'';  ?>
						<span><?php echo $date_month; ?> <?php echo $date_day; ?>, <?php echo $date_year; ?></span>
					</div>
					
				</a>
				<?php endwhile; ?>
			<?php wp_reset_query(); ?>
			</div>
			<?php endif; ?>
			</div>
			<div class="block__news__tags__block">
				<div class="block__news__tags__block__title">
					<h4><?php _e( 'Tags', 'tuku' ); ?></h4>
				</div>
				<div class="block__news__tags__block__items">
					<?php

					$tags = get_tags();
					$html = '<div class="block__news__tags__item">';
					foreach ( $tags as $tag ) {
						$tag_link = get_tag_link( $tag->term_id );
								
						$html .= "<a href='{$tag_link}' title='{$tag->name} Tag' class='{$tag->slug}'>";
						$html .= "{$tag->name}</a>";
					}
					$html .= '</div>';
					echo $html;

					 ?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>

<script>
	jQuery(document).ready(function($){
		
	});
</script>