<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Astha
 */

/**
 * If any user want to hide Entry Footer for post,
 * Just use 
 * add_filter( 'astha_post_entry_footer_loop', '__return_false' );
 * 
 * ****************************************
 * New Value has come from Theme Options
 * Entry footer on off now control from
 * Customizer
 * This part has added at
 * @since 1.0.0.61
 */
$entry_footer = apply_filters( 'astha_post_entry_footer', ! empty( astha_option( 'astha_blog_sigle_footer', 'on' ) ) );

/**
 * Entry Footer in Loop page is not visible by default.
 * If any user want to show in Loop for Blog Grid/list
 * have to use
 * add_filter( 'astha_post_entry_footer_loop', '__return_true' );
 */
$entry_footer_loop = apply_filters( 'astha_post_entry_footer_loop', false );
$entry_footer_class = 'available-entry-footer'; 
if( !$entry_footer ){
   $entry_footer_class = 'no-entry-footer'; 
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $entry_footer_class ); ?>>
	<?php astha_post_thumbnail(); ?>
	
	<?php
        /**
         * Adding Entry Header Content
         * 
         * @Hooked astha_entry_header_content -20 at inc/template-functions.php
         */
        do_action( 'astha_entry_header' );
        
        /**
         * Adding content based on Post Type
         */
        do_action( 'astha_entry_header_' . get_post_type() );
        ?>

	<div class="entry-content">
		<?php
                if( is_single() ){
                    the_content(
                            sprintf(
                                    wp_kses(
                                            /* translators: %s: Name of current post. Only visible to screen readers */
                                            __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'astha' ),
                                            array(
                                                    'span' => array(
                                                            'class' => array(),
                                                    ),
                                            )
                                    ),
                                    wp_kses_post( get_the_title() )
                            )
                    );
                }else{
                    the_excerpt();
                    ?>
                    <a class="astha-blog continute-reading" href="<?php echo esc_url( get_the_permalink() ); ?>">
                    <?php
                    echo sprintf(
                                            wp_kses(
                                                    /* translators: %s: Name of current post. Only visible to screen readers */
                                                    __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'astha' ),
                                                    array(
                                                            'span' => array(
                                                                    'class' => array(),
                                                            ),
                                                    )
                                            ),
                                            wp_kses_post( get_the_title() )
                                    );

                    ?>
                    </a>    
                        
                    <?php
                }

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'astha' ),
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
        do_action( 'astha_entry_footer' );
        
        //Footer Entry at footer, Only for Single Page
        //And when $entry_footer is true
        //User able to change by Filter Hook
        if( ( is_single() || $entry_footer_loop ) && $entry_footer ){ ?>
	<footer class="entry-footer">
		<?php
                
                    astha_entry_footer();
                ?>
	</footer><!-- .entry-footer -->
        <?php } ?>
</article><!-- #post-<?php the_ID(); ?> -->
