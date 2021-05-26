<?php
/**
 * Template part for displaying departments
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Medilac
 */

$sub_heading = medilac_option( 'sub_heading' );
$faq_data = medilac_option( 'department_faq_group' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php medilac_post_thumbnail(); ?>
	<header class="entry-header">
		<?php
                
                if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				
				medilac_taxonomy_by();
				medilac_posted_by();
                                medilac_posted_on();
				?>
			</div><!-- .entry-meta -->
		<?php endif;
                
		if ( is_singular() ) :
                    ##$breadcrumb_switch              = medilac_option( 'medilac_breadcrumb_switch' );
                    ##$breadcrumb_type                = medilac_option( 'medilac_breadcrumb_type' );
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
                                            __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'medilac' ),
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
                    <a class="medilac-blog continute-reading" href="<?php echo esc_url(get_the_permalink() ); ?>">
                    <?php
                    echo sprintf(
                                            wp_kses(
                                                    /* translators: %s: Name of current post. Only visible to screen readers */
                                                    __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'medilac' ),
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
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'medilac' ),
				'after'  => '</div>',
			)
		);
                
		?>
	</div><!-- .entry-content -->
        
        <div class="department-faq">
            <h3><?php echo esc_html__( 'Frequently Asked Questions', 'medilac' );?></h3>
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
                
                    medilac_entry_footer();
                ?>
	</footer><!-- .entry-footer -->
        <?php } ?>
</article><!-- #post-<?php the_ID(); ?> -->
