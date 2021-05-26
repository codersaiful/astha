<?php
/**
 * Medilac Administration Functions Managing 
 * Specially for Choosing Custom Header and footer
 * Which is Come from Elementor Template
 * 
 * 
 * 
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Medilac
 */

//Getting Theme's Information
$medilactheme = wp_get_theme();

$datas = filter_input_array( INPUT_POST );

/**
 * Datas Saving is Handle from function.php file of admin.
 * location admin/functions.php
 * 
 * @Hooked medilac_elementor_header_footer_saving 10 admin/functions.php
 */
do_action( 'medilac_elementor_header_footer_save', $datas );

?>
<div class="wrap about-wrap medilac-wrap">
    
    <div class="medilac-system-stats">
        <div class="header-footer-form">
            <form action="" method="POST">
                <?php
                $args = array(
                   'post_type'     =>  'elementor_library',
                   'post_status'   =>  'publish',
                   'posts_per_page' => -1,
                );
                $query = get_posts( $args );
                
                $new_datas = get_option( 'medilac_custom_header_footer' );
                $new_datas = apply_filters( 'medilac_custom_header_footer', $new_datas );
                
                $custom_header_id = isset( $new_datas['custom-header-id'] ) ? $new_datas['custom-header-id'] : false;
                $custom_footer_id = isset( $new_datas['custom-footer-id'] ) ? $new_datas['custom-footer-id'] : false;
               ?>
            
                <table class="system-status-table">
                    <tbody>
                        <tr>
                            <td><?php echo esc_html__( 'Choose Template as Header:', 'medilac' ); ?></td>
                            <td>
                                <?php if( ! empty( $query ) ){  ?>
                                <select 
                                    class="custom-header-choose custom-header-footer-choose" 
                                    name="custom-header-id">
                                    <option value=""><?php echo esc_html__( 'No Header' ); ?></option>
                                    <?php
                                    foreach( $query as $p ){
                                    ?>
                                    <option 
                                        value="<?php echo esc_attr( $p->ID ); ?>"
                                        <?php echo !empty( $custom_header_id ) && $p->ID == $custom_header_id ? 'selected' : ''; ?>
                                        ><?php echo esc_html( $p->post_title ); ?></option>    
                                    <?php  
                                    }
                                    ?>
                                </select>    
                                <p><?php echo esc_html__( 'Choose Header from Elementor Template', 'medilac' ); ?></p>
                                
                                <?php }else{ ?>
                                <p><?php echo esc_html__( 'Not found any template. Clear Elementor Template', 'medilac' ); ?></p>
                                <?php } ?>
                            </td>

                        </tr>
                        
                        
                        
                        <tr>
                            <td><?php echo esc_html__( 'Choose Template as Footer:', 'medilac' ); ?></td>
                            <td>
                                <?php if( ! empty( $query ) ){  ?>
                                <select 
                                    class="custom-header-choose custom-header-footer-choose" 
                                    name="custom-footer-id">
                                    <option value=""><?php echo esc_html__( 'No Footer' ); ?></option>
                                    <?php
                                    foreach( $query as $p ){
                                    ?>
                                    <option 
                                        value="<?php echo esc_attr( $p->ID ); ?>"
                                        <?php echo !empty( $custom_footer_id ) && $p->ID == $custom_footer_id ? 'selected' : ''; ?>
                                        ><?php echo esc_html( $p->post_title ); ?></option>    
                                    <?php  
                                    }
                                    ?>
                                </select>    
                                <p><?php echo esc_html__( 'Choose Footer from Elementor Template', 'medilac' ); ?></p>
                                
                                <?php }else{ ?>
                                <p><?php echo esc_html__( 'Not found any template. Clear Elementor Template', 'medilac' ); ?></p>
                                <?php } ?>
                            </td>

                        </tr>
                        
                        
                        
                    </tbody>
                </table>
                <input 
                    class="button button-primary medilac-header-footer-submit" 
                    name="submit_header_footer"
                    type="submit" 
                    value="<?php echo esc_html__( 'Save Changes', 'medilac' ); ?>">
            </form>
        </div>
        
        <h3 class="medilac-instruction"><?php echo esc_html__( 'Instruction:', 'medilac' ); ?></h3>
        <p><?php echo esc_html__( 'Custom Header and Footer will be active after Choose Custom Header of Custom Footer fromm Customizer.', 'medilac' ); ?></p>
    </div>
</div>