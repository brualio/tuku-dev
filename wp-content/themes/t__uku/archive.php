<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Tuku
 */

get_header();
?>


        <?php if ( have_posts() ) : ?>

<!-- Breadcrumb Start -->
<div class="breadcrumb-area ptb-60 ptb-sm-30">
    <div class="container">
        <div class="breadcrumb">
            <ul>
                <li><a href="<?php echo get_home_url(); ?>"><?php _e('Inicio','staff_digital'); ?></a></li>
                <li class="active"><a href="<?php echo get_home_url(); ?>/blog"><?php _e('Blog','staff_digital'); ?></a></li>
            </ul>
        </div>
    </div>
    <!-- Container End -->
</div>
<!-- Breadcrumb End -->
<div class="blog-page pb-60">
    <div class="container">
        <!-- Row End -->
        <div class="row">
            <?php
            /* Start the Loop */
            while ( have_posts() ) :
                the_post();

?>

                <!-- Single Blog Start -->                    
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-blog">
                        <div class="blog-img">
                            <a href="<?php the_permalink( ); ?>"><img src="<?php the_post_thumbnail_url( $size = 'post-preview' ) ?>" alt="blog-image"></a>
                        </div>
                        <div class="blog-content">
                            <h4 class="blog-title"><a href="<?php the_permalink(  ); ?>"><?php the_title( ); ?></a></h4>
                            <div class="blog-meta">
                                <ul>
                                
                                    <li><span><?php _e('Fecha:','staff_digital') ?> </span> <?php echo get_the_date(); ?></li>
                                </ul>
                            </div>
                            <div class="readmore">
                                <a href="<?php the_permalink( ); ?>"><?php _e('Leer más', 'staff_digital') ?></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single Blog End -->

<?php
            endwhile;

            the_posts_navigation();

        else :

            get_template_part( 'template-parts/content', 'none' );

        endif;
        ?>

</div>
</div>
</div>

<?php
get_footer();
