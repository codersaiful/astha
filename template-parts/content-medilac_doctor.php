<?php
/**
 * Template part for displaying doctor posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Medilac
 */
$sub_heading        = medilac_option( 'sub_heading' );
$doctor_details     = medilac_option( 'doctor_details' );
$doctor_appoint_link     = medilac_option( 'doctor_appoint_link' );
$doctor_appoint_text     = medilac_option( 'doctor_appoint_text' );
$doctor_phone     = medilac_option( 'doctor_phone' );
$doctor_email     = medilac_option( 'doctor_email' );
$doctor_address     = medilac_option( 'doctor_address' );
$doctor_social_profile     = medilac_option( 'doctor_social_profile' );
$skill_sub_heading     = medilac_option( 'skill_sub_heading' );
$skill_heading     = medilac_option( 'skill_heading' );
$doctor_skills     = medilac_option( 'doctor_skills' );
$doc_bottom_template     = medilac_option( 'doctor_bottom_template' );

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if(is_single() ) : ?>
    <div class="medilac-home-container section-padding pt-40">
        <div class="doctor-header">
    <?php endif; ?>
        <?php medilac_post_thumbnail(); ?>
        <?php if(is_single() ) : ?>
            <div class="doctor-summary">
        <?php endif; ?>
                <header class="entry-header">
                        <?php
                        if ( is_singular() ) :
                            ##$breadcrumb_switch              = medilac_option( 'medilac_breadcrumb_switch' );
                            ##$breadcrumb_type                = medilac_option( 'medilac_breadcrumb_type' );
                             ?>
                    <div class="section-content-title v1">
                              <?php   
                              echo '<h3 class="sub-heading">' . esc_html( $sub_heading ) . '</h3>';
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

            <?php if( is_single() ) : ?>
                <div class="doctor-details">

                    <p><?php echo esc_html( $doctor_details ); ?></p>

                    <?php if( $doctor_appoint_link){ ?>
                    <a class="button get-appointment" href="<?php echo esc_url( $doctor_appoint_link ); ?>"><?php echo esc_html( $doctor_appoint_text ); ?></a>
                    <?php } ?>

                    <div class="doctor-contact-details">
                        <ul class="contact-info">
                            <?php if( $doctor_phone ) { ?>
                            <li class="phone"><a href="tel:<?php echo esc_attr( $doctor_phone ); ?>"><i class="fas fa-phone"></i> <?php echo esc_html( $doctor_phone ); ?></a></li>
                            <?php } ?>

                            <?php if( $doctor_email ) { ?>
                            <li class="email"><a href="mailto:<?php echo esc_attr( $doctor_email ); ?>"><i class="fas fa-envelope"></i> <?php echo esc_html( $doctor_email ); ?></a></li>
                            <?php } ?>

                            <?php if( $doctor_address ) { ?>
                            <li class="address"><i class="fas fa-home"></i> <?php echo esc_html( $doctor_address ); ?></li>
                            <?php } ?>
                        </ul>
                    </div><!-- .doctor-contact-details -->
                    <?php if( is_array($doctor_social_profile) && count( $doctor_social_profile ) > 0 && isset( $doctor_social_profile[0]['profile_link'] ) ){ ?>
                    <div class="doctor-follow-links">
                        <ul class="link-list">
                            <li class="label"><?php echo __( 'Follow us on', 'medilac' );?></li>
                        <?php
                        foreach ( $doctor_social_profile as $profile ){
                            $icon = isset( $profile['social_icon'] ) ? $profile['social_icon'] : false;
                            $link = isset( $profile['profile_link'] ) ? $profile['profile_link'] : false;
                            if($icon && $link) {
                            ?>
                            <li class="item item-<?php echo esc_attr( $icon ); ?>"><a href="<?php echo esc_url( $link ); ?>"><i class="fab <?php echo esc_attr( $icon ); ?>"></i></a></li>
                            <?php
                            }
                        }
                        ?>
                        </ul>
                    </div><!-- .doctor-follow-links -->
                    <div class="social-share-doctor">
                        <?php medilac_social_share(); ?>
                    </div>
                    <?php } ?>
                </div><!-- .doctor-details -->
            <?php endif; ?>

        <?php if(is_single() ) : ?>
            </div>
        </div>
        <?php endif; ?>
</div>
    <div class="doctor-skill-wrapper section-padding">
        <div class="medilac-home-container">
            <div class="entry-content">
		<?php
                if( is_single() ){ ?>
            
                <?php if( is_array( $doctor_skills ) && count( $doctor_skills ) > 0 && isset( $doctor_skills[0]['skill_level'] ) && isset( $doctor_skills[0]['skill_name'] ) ) : ?>
               
                <div class="doctor-skills-section">
                    <div class="medilac-container container">
                        <div class="section-content-title v2">
                            <h3 class="sub-heading"><?php echo esc_html( $skill_sub_heading ); ?></h3>
                            <h2 class="heading"><?php echo esc_html( $skill_heading ); ?></h2>
                        </div>

                        <div class="doctor-skills-wrapper">
                            <ul class="doctor-skills-list">
                                <?php foreach ( $doctor_skills as $key => $skill ){ 
                                    $level = isset( $skill['skill_level'] ) ? $skill['skill_level'] : false;
                                    $name = isset( $skill['skill_name'] ) ? $skill['skill_name'] : false;
                                    $color = isset( $skill['skill_color'] ) ? $skill['skill_color'] : false;
                                        if( $level && $name && $color ) {
                                        ?>
                                    <li class="skill-item skill-item-<?php echo esc_attr( $key ); ?>">
                                        <p><?php echo esc_html( $skill['skill_name'] ); ?></p>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50"
                                                 aria-valuemin="0" aria-valuemax="100" style="width:<?php echo esc_attr( $skill['skill_level'] );?>%; background-color: <?php echo esc_attr( $skill['skill_color'] );?>;">
                                            </div>
                                            <div class="progress-level"><?php echo esc_html( $skill['skill_level'] ) . '%';?></div>
                                        </div>
                                    </li>
                                    <?php 

                                        }
                                
                                    }?>
                            </ul>
                        </div><!-- .doctor-skill-wrapper -->
                    </div>
                </div><!-- .doctor-skill-section -->
                <?php endif; ?>
            
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
                     * Template for Docotor
                     * 
                     * @Since 1.0.0.61
                     */
                    if ( did_action( 'elementor/loaded' ) ) {
                        (int) $select_post_id = $doc_bottom_template;
                        if ( \Elementor\Plugin::instance()->db->is_built_with_elementor( $select_post_id ) ) {
                            echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $select_post_id );
                        }
                    }
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
            </div>
        </div>
        
</article><!-- #post-<?php the_ID(); ?> -->
