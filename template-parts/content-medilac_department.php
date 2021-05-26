<?php
/**
 * Template part for displaying departments
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Astha
 */

$sub_heading = astha_option( 'sub_heading' );
$faq_data = astha_option( 'department_faq_group' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php astha_post_thumbnail(); ?>
	<header class="entry-header">
		<?php
                
                if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				
				astha_taxonomy_by();
				astha_posted_by();
                                astha_posted_on();
				?>
			</div><!-- .entry-meta -->
		<?php endif;
                
		if ( is_singular() ) :
                    ##$breadcrumb_switch              = astha_option( 'astha_breadcrumb_switch' );
                    ##$breadcrumb_type                = astha_option( 'astha_breadcrumb_type' );
                    ?>
                  <div class="section-content-title v1">
                        <?php        
                        echo '<h2 class="sub-heading">' . esc_html( $sub_heading ) . '</h2>';
                        ##if( $breadcrumb_switch === 'off' || ( $breadcrumb_switch === 'on' && $breadcrumb_type === 'static' ) ):
                            the_title( '<h1 class="entry-title">', '</h1>' );
                        ##endif; 
                    ?>
                   </div>
		<?php 
                else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		 ?>
	</header><!-- .entry-header -->

	

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
                    <a class="astha-blog continute-reading" href="<?php echo esc_url(get_the_permalink() ); ?>">
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
        
        <div class="department-faq">
            <h3><?php echo esc_html__( 'Frequently Asked Questions', 'astha' );?></h3>
            <ul class="department-faq-list">
            <?php 
            if(is_array( $faq_data ) ){
                foreach ( $faq_data as $key => $item ){
                    ?>
                <li class="department-faq-item department-faq-list-<?php echo esc_attr( $key ); ?>">
                    <div class="faq-title"><span><?php echo esc_html( $item['title'] ); ?></span> <i class="fas fa-plus"></i></div>
                    <div class="faq-details"><p><?php echo esc_html( $item['description'] ); ?></p></div>
                </li>
                    <?php
                }
            }
            ?>
            </ul>
        </div><!-- .department-faq -->
        <?php 
        //Footer Entry at footer, Only for Single Page
        if( is_single() ){ ?>
	<footer class="entry-footer">
		<?php
                
                    astha_entry_footer();
                ?>
	</footer><!-- .entry-footer -->
        <?php } ?>
</article><!-- #post-<?php the_ID(); ?> -->
