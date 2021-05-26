<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Medilac
 */

$case_name   = medilac_option( 'case_name' );
$case_details   = medilac_option( 'case_details' );
$patient_name   = medilac_option( 'patient_name' );
$raw_entry_date = medilac_option( 'admission_date' );
$str_time       = strtotime( $raw_entry_date );
$admission_date = date(
                    apply_filters( 'medilac_case_entry_date_format', "j F, Y", $str_time ),
                    $str_time
                );
$patient_address = medilac_option( 'patient_address' );
$case_bottom_template     = medilac_option( 'case_bottom_template' );


?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php medilac_post_thumbnail(); ?>
        <?php if( is_single() ): ?>
    <div class="medilac-case-info">
        <div class="medilac-case-info-wrapper">
            <?php if( $case_name && !empty( $case_name ) ) : ?>
            <div class="medilac-case medilac-case-name">
                <p class="label"><?php echo esc_html( __( 'Case Name:', 'medilac' ) ); ?></p>
                <p class="info"><?php echo esc_html( $case_name ); ?></p>
            </div>
            <?php endif; ?>

            <?php if( $patient_name && !empty( $patient_name ) ) : ?>
            <div class="medilac-case medilac-case-patient-name">
                <p class="label"><?php echo esc_html( __( 'Patient\'s Name:', 'medilac' ) ); ?></p>
                <p class="info"><?php echo esc_html( $patient_name ); ?></p>
            </div>
            <?php endif; ?>

            <?php if( $admission_date && !empty( $admission_date ) ) : ?>
            <div class="medilac-case medilac-case-date">
                <p class="label"><?php echo esc_html( __( 'Date:', 'medilac' ) ); ?></p>
                <p class="info"><?php echo esc_html( $admission_date ); ?></p>
            </div>
            <?php endif; ?>

            <?php if( $patient_address && !empty( $patient_address ) ) : ?>
            <div class="medilac-case medilac-case-address">
                <p class="label"><?php echo esc_html( __( 'Address:', 'medilac' ) ); ?></p>
                <p class="info"><?php echo esc_html( $patient_address ); ?></p>
            </div>
            <?php endif; ?>
        </div>
    </div>
    
    <div class="content-wrapper">
        <?php endif; ?>
        
	<header class="entry-header">
		<?php
                
		if ( is_singular() ) :
                    ##$breadcrumb_switch              = medilac_option( 'medilac_breadcrumb_switch' );
                    ##$breadcrumb_type                = medilac_option( 'medilac_breadcrumb_type' );
                    
                    ##if( $breadcrumb_switch === 'off' || ( $breadcrumb_switch === 'on' && $breadcrumb_type === 'static' ) ):
                        the_title( '<h1 class="entry-title">', '</h1>' );
                    ##endif;
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		 ?>
	</header><!-- .entry-header -->

	

	<div class="entry-content">
		<?php
                if( is_single() ){ ?>
            <div class="entry-content-wrapper">
                <?php if( $case_details && !empty( $case_details ) ) : ?>
                <div class="medilac-case-details">
                    <?php echo $case_details; ?>
                </div>
                <?php endif; ?>
                
            </div>
                
	</div><!-- .entry-content -->
        <?php 
        //Footer Entry at footer, Only for Single Page
        if( is_single() ){ ?>
	
    </div><!-- .article-wrapper -->
    <div class="content-wrapper-full">
        <div class="entry-content">
            <div class="entry-content-wrapper">
            <?php
                
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
            
            /**
             * Template for Case
             * 
             * @Since 1.0.0.61
             */
            if ( did_action( 'elementor/loaded' ) ) {
                (int) $select_post_id = $case_bottom_template;
                if ( \Elementor\Plugin::instance()->db->is_built_with_elementor( $select_post_id ) ) {
                    echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $select_post_id );
                }
            }
            ?>
            </div>
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
        
        <footer class="entry-footer">
		<?php
                    medilac_entry_footer();
                ?>
	</footer><!-- .entry-footer -->
    </div><!-- .content-wrapper-full -->
    <?php } ?>
</article><!-- #post-<?php the_ID(); ?> -->
