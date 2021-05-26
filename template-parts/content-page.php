<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Astha
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <?php
        $breadcrumb_switch              = medilac_option( 'medilac_breadcrumb_switch' );
        $breadcrumb_type                = medilac_option( 'medilac_breadcrumb_type' );
        if( ! is_front_page() && ( $breadcrumb_switch === 'off' || ( $breadcrumb_switch === 'on' && $breadcrumb_type === 'static' ) ) ):
        ?>
    
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

        <?php endif; ?>
        
	<?php medilac_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'medilac' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<?php
        
        /**
         * Content Area for Footer on Single Post Page and Loop Also
         * User able to Add anything Here
         */
        do_action( 'medilac_entry_footer' );
        
        if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'medilac' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
