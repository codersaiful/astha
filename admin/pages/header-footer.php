<?php
/**
 * Astha Administration Functions Managing 
 * Specially for Choosing Custom Header and footer
 * Which is Come from Elementor Template
 * 
 * 
 * 
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Astha
 */

//Getting Theme's Information
$asthatheme = wp_get_theme();

$datas = filter_input_array( INPUT_POST );

/**
 * Datas Saving is Handle from function.php file of admin.
 * location admin/functions.php
 * 
 * @Hooked astha_elementor_header_footer_saving 10 admin/functions.php
 */
do_action( 'astha_elementor_header_footer_save', $datas );

?>
<div class="wrap about-wrap astha-wrap">
    
    <div class="astha-system-stats">
        <div class="header-footer-form">
            <form action="" method="POST">
                <?php
                $args = array(
                   'post_type'     =>  'elementor_library',
                   'post_status'   =>  'publish',
                   'posts_per_page' => -1,
                );
                $query = get_posts( $args );
                
                $new_datas = get_option( 'astha_custom_header_footer' );
                $new_datas = apply_filters( 'astha_custom_header_footer', $new_datas );
                
                $custom_header_id = isset( $new_datas['custom-header-id'] ) ? $new_datas['custom-header-id'] : false;
                $custom_footer_id = isset( $new_datas['custom-footer-id'] ) ? $new_datas['custom-footer-id'] : false;
               ?>
            
                <table class="system-status-table">
                    <tbody>
                        <tr>
                            <td><?php echo esc_html__( 'Choose Template as Header:', 'astha' ); ?></td>
                            <td>
                                <?php if( ! empty( $query ) ){  ?>
                                <select 
                                    class="custom-header-choose custom-header-footer-choose" 
                                    name="custom-header-id">
                                    <option value=""><?php echo esc_html__( 'No Header', 'astha' ); ?></option>
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
                                <p><?php echo esc_html__( 'Choose Header from Elementor Template', 'astha' ); ?></p>
                                
                                <?php }else{ ?>
                                <p><?php echo esc_html__( 'Not found any template. Clear Elementor Template', 'astha' ); ?></p>
                                <?php } ?>
                            </td>

                        </tr>
                        
                        
                        
                        <tr>
                            <td><?php echo esc_html__( 'Choose Template as Footer:', 'astha' ); ?></td>
                            <td>
                                <?php if( ! empty( $query ) ){  ?>
                                <select 
                                    class="custom-header-choose custom-header-footer-choose" 
                                    name="custom-footer-id">
                                    <option value=""><?php echo esc_html__( 'No Footer', 'astha' ); ?></option>
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
                                <p><?php echo esc_html__( 'Choose Footer from Elementor Template', 'astha' ); ?></p>
                                
                                <?php }else{ ?>
                                <p><?php echo esc_html__( 'Not found any template. Clear Elementor Template', 'astha' ); ?></p>
                                <?php } ?>
                            </td>

                        </tr>
                        
                        
                        
                    </tbody>
                </table>
                <input 
                    class="button button-primary astha-header-footer-submit" 
                    name="submit_header_footer"
                    type="submit" 
                    value="<?php echo esc_attr__( 'Save Changes', 'astha' ); ?>">
            </form>
        </div>
        
        <h3 class="astha-instruction"><?php echo esc_html__( 'Instruction:', 'astha' ); ?></h3>
        <p><?php echo esc_html__( 'Custom Header and Footer will be active after Choose Custom Header of Custom Footer fromm Customizer.', 'astha' ); ?></p>
    </div>
</div>