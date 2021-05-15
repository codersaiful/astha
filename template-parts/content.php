<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package astha
 */

?>
<div id="post-<?php the_ID(); ?>" <?php post_class('thumbnail'); ?>>
    <div class="caption">
        <header class="entry-header">
            <?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title mb-3">', '</h1>' );
			else :
				the_title( '<h1 class="entry-title mb-3"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
			endif;?>
            <div class="blog_post_meta mb-3">
                <?php 
					astha_posted_on();
					astha_posted_by(); 
					astha_get_category();
				?>
            </div>
			
            <?php if ( 'post' === get_post_type() ) :?>
            <?php astha_post_thumbnail(); ?>
            <?php endif; ?>

        </header><!-- .entry-header -->
        <div class="entry-content mb-4 mt-4">
            <?php
			the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'astha' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );
			?>
        </div><!-- .entry-content -->
    </div>
</div>