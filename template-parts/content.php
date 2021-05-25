<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package astha
 */

?>

<article id="post-<?php the_ID();?>" <?php post_class('mb-5 home-blog'); ?>>
	<div class="caption">
		<header class="entry-header list">
			<?php if ( 'post' === get_post_type() ) :?>
			<?php if(has_post_thumbnail()):?>
			<?php 
			astha_post_thumbnail('astha-blog-thumbnail');
			else:?>
				<img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/img/no-thumb.png'); ?>">
			<?php 
			endif;
			?>
			<?php endif; ?>
		</header><!-- .entry-header -->
	</div>
	<div class="content-wrap">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title mb-3 mt-4">', '</h1>' );
		else :
			the_title( '<h1 class="entry-title mb-3 mt-4"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
		endif;?>
		<div class="blog_post_meta mb-2 mt-2">
			<?php
			astha_posted_on();
			astha_posted_by();
			astha_get_category();
			?>
		</div>
		<div class="entry-content">
			<?php echo astha_get_excerpt(75);?>
		</div><!-- .entry-content -->
	</div>
</article>


