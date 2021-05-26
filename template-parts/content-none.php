<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Astha
 */

?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title">
                <?php 
                /**
                 * To change Nothing Found Text from child theme or from Plugin
                 */
                $nothing_found = apply_filters( 'astha_nothing_found_none_page', esc_html__( 'Nothing Found', 'astha' ) );
                echo wp_kses_data( $nothing_found );
                ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
            
		<?php
                
                /**
                 * Adding content or to replace None page Content, User able to do it easily
                 * 
                 * Currently current content set by Action Hook
                 * 
                 * @Hooked: astha_none_page_content - 20 at inc/template-functions.php
                 */
		do_action( 'astha_none_page' );
		?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
