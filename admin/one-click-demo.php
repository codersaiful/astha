<?php
/**
 * Astha Adminsitration Functions Managing 
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Astha
 */


if( ! function_exists( 'astha_oneclickdemo_import_files' ) ){
    
    /**
     * Array of List Files of Demo Content,
     * Demo Customizer Setting,
     * Demo Widget List and Setting
     * 
     * To Create Backup File for This Plugin, We have to use
     * 1. Widget Importer & Exporter | Link: https://wordpress.org/plugins/widget-importer-exporter/
     * 2. Customizer Export/Import | Link: https://wordpress.org/plugins/customizer-export-import/
     * 
     * As Root plugin for Demo Import, We have Used 
     * One Click Demo Importer Plugin.
     * Plugin Link: https://wordpress.org/plugins/one-click-demo-import/
     * 
     * @link https://wordpress.org/plugins/one-click-demo-import/ One Click Demo Importer Plugin Link
     * @link http://awesomemotive.github.io/one-click-demo-import/ Tutorial of Using One Click Demo Plugin
     * 
     * @return Array list of links of files. Basically a Array of Details
     */
    function astha_oneclickdemo_import_files() {
        
        /**
         * ****************************
         * IMPORTANT NOTES
         * *****************************
         * We will store data in server.
         * now xml file name will be 
         * xml - content.xml
         * wie - widgets.wie
         * dat - settings.dat
         * 
         * **************************
         * SERVER LOCATION
         * **************************
         * https://astha.codeastrology.com/
         * 
         * 
         * @since 1.0.0.61
         */
        
        $parent_url = trailingslashit( get_template_directory_uri() ) . 'demo-content/demo-1/';
        
        /**
         * Finally we decided to keep our file to
         * subdomain of https://astha.codeastrology.com/
         * 
         * @since 1.0.0.61
         */
        $server_url = 'http://demo-content.medilac.codeastrology.com/';
        
        $whitelist = array(
            '127.0.0.1',
            '::1'
        );
        
        if( isset( $_SERVER['REMOTE_ADDR'] ) && in_array($_SERVER['REMOTE_ADDR'], $whitelist)){
            $server_url = trailingslashit( $parent_url );
        }else{
            $server_url = trailingslashit( $server_url );
        }
        
        /**
         * For First release, we will provide demo
         * only from Theme internal file. at this moment
         * Disabled from remote server
         * 
         * ***********************
         * IN FUTURE
         * 
         * we will remove this bellow following line, because, we want to handle demo from server
         * ************************
         * 
         * @Since 1.0.0.69
         */
        $server_url = trailingslashit( $parent_url );
        
        //Preview Images
        $full_demo_preview = $parent_url . 'images/preview.png';
        $xml_demo_preview = $parent_url . 'images/XML.png';
        $Wie_demo_preview = $parent_url . 'images/Wie.png';
        $Dat_demo_preview = $parent_url . 'images/Dat.png';
        
        //Data Files Location
        $content_xml = $server_url . 'content.xml';
        $content_widgets = $server_url . 'widgets.wie';
        $content_settings = $server_url . 'settings.dat';
        
        $demo_url = trailingslashit( 'https://medilac.codeastrology.com/' );
        
        $import_files = array(
//            array(
//                'import_file_name'           => 'Astha Classic(Full Demo)',
//                'categories'                 => array( 'Classic', 'WooCommerce', 'Portfolio' ),
//                'local_import_file'            => $parent_url . 'demo-1/content.xml',
//                'local_import_widget_file'     => $parent_url . 'demo-1/widgets.wie',
//                'local_import_customizer_file' => $parent_url . 'demo-1/settings.dat',
//                'import_preview_image_url'   => $parent_url . 'demo-1/preview.png',
//                'import_notice'              => __( 'Here All Element and All Page will be upload. Make sure, all recommeded plugin is installed.', 'astha' ),
//                'preview_url'                => $demo_url,
//                
//                /**
//                 * New Added index of Array
//                 * use for: 'pt-ocdi/after_import'
//                 * add_action( 'pt-ocdi/after_import', 'astha_oneclickdemo_after_import' );
//                 * 
//                 * ei ongsho to ami add korechi. eta diye Demo site er Home Page er Title nebo 
//                 * ebong menu'r name nebo.
//                 * jate kore, je site a import hobe, sekhane sei menu set korte pari ebong 
//                 * kangkhito home page set kore dite pari. demo import er sathe sathe.
//                 * 
//                 * @since 1.0.0.59
//                 */
//                'preset_args'               => array(
//                    'menu_name'     => esc_html__( 'Primary Menu - Astha', 'astha' ),
//                    'home_title'    => esc_html__( 'HomePage', 'astha' ),
//                    'blog_title'    => esc_html__( 'Blogs', 'astha' ),
//                ),                 
//            ),
            
            
            array(
                'import_file_name'           => 'Astha Classic(Full Demo)',
                'categories'                 => array( 'Classic', 'WooCommerce', 'Full Demo' ),
                'import_file_url'            => $content_xml,
                'import_widget_file_url'     => $content_widgets,
                'import_customizer_file_url' => $content_settings,
                'import_preview_image_url'   => $full_demo_preview,
                'import_notice'              => __( 'Here All Element and All Page will be upload. Make sure, all recommeded plugin is installed.', 'astha' ),
                'preview_url'                => $demo_url,
                'preset_args'               => array(
                    'menu_name'     => esc_html__( 'Astha Main Menu', 'astha' ),
                    'home_title'    => esc_html__( 'Home 1', 'astha' ),
                    'blog_title'    => esc_html__( 'Blog', 'astha' ),
                ),
                
            ),
            
           
            array(
                'import_file_name'           => 'Only POST Content XML',
                'categories'                 => array( 'Only Content', "XML", "POST Content" ),
                'import_file_url'            => $content_xml,
//                'import_widget_file_url'     => $content_widgets,
//                'import_customizer_file_url' => $content_settings,
                'import_preview_image_url'   => $xml_demo_preview,
                'import_notice'              => __( 'This file will import Only Content. using content xml file of our full demo.', 'astha' ),
                'preview_url'                => 'https://medilac.codeastrology.com/',
            ),
            
            array(
                'import_file_name'           => 'Only Widgets Setting.wie',
                'categories'                 => array( 'Only Setting', 'Only Content', 'Widgets' ),
//                'import_file_url'            => $content_xml,
                'import_widget_file_url'     => $content_widgets,
//                'import_customizer_file_url' => $content_settings,
                'import_preview_image_url'   => $Wie_demo_preview,
                'import_notice'              => __( 'This file will import Only Widgets. Make sure, astha-core is already installed.', 'astha' ),
                'preview_url'                => 'https://medilac.codeastrology.com/',
            ),
            
            
            array(
                'import_file_name'           => 'Only Customizer settings.dat',
                'categories'                 => array( 'Only Setting', 'Only Content', 'Widgets' ),
//                'import_file_url'            => $content_xml,
//                'import_widget_file_url'     => $content_widgets,
                'import_customizer_file_url' => $content_settings,
                'import_preview_image_url'   => $Dat_demo_preview,
                'import_notice'              => __( 'Only import Customizer setting. Customizer will load Astha Demo\'s Customizer setting.', 'astha' ),
                'preview_url'                => 'https://medilac.codeastrology.com/',
            ),
            
            
            
            /**
             * This is for Local File Import. We kept it as Backup.
            array(
                'import_file_name'             => 'Demo Import 1',
                'categories'                   => array( 'Category 1', 'Category 2' ),
                'local_import_file'            => trailingslashit( get_template_directory() ) . 'ocdi/demo-content.xml',
                'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'ocdi/widgets.json',
                'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'ocdi/customizer.dat',
                'import_preview_image_url'     => 'http://www.your_domain.com/ocdi/preview_import_image1.jpg',
                'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately.', 'your-textdomain' ),
                'preview_url'                  => 'http://www.your_domain.com/my-demo-1',
              ),
            */
            
        );
        
        /**
         * To change/Handle Import File
         * 
         * In future, I will arrange this that
         * The array will generate from Remote
         * 
         * @todo This array will able to handle from plugin and that plugin will generate from a remote json file
         * 
         * @since 1.0.0.46
         */
        return apply_filters( 'astha_import_files' , $import_files );
    }
}
add_filter( 'pt-ocdi/import_files', 'astha_oneclickdemo_import_files' );

//Do something after Install Import
if( ! function_exists( 'astha_oneclickdemo_after_import' ) ){
    
    /**
     * Do something, Such:
     * Home Page Setting
     * Menu ID set
     * 
     * We have to use pt-ocdi/after_import @Action_Hook
     * 
     * @since 1.0.0.45
     * 
     * @param Array $selected_index
     */
    function astha_oneclickdemo_after_import( $selected_index ){
        
        //Checking $selected_import['import_file_name']
        //if ( 'Three' === $selected_import['import_file_name'] ) {
        
        
        /**
         * I will set Menu name as Template Name, So that I can get Demo Meno Dynamically
         */
        $demo_name = isset( $selected_index['import_file_name'] ) ? $selected_index['import_file_name'] : false;
        
        if( empty( $demo_name ) ){
            return;
        }
        
        $preset_args = isset( $selected_index['preset_args'] ) ? $selected_index['preset_args'] : false;
//        $preset_args = array(
//                    'menu_name'     => esc_html__( 'Main Menu', 'astha' ),
//                    'home_title'    => esc_html__( 'Home 1', 'astha' ),
//                    'blog_title'    => esc_html__( 'Blog', 'astha' ),
//                );
        
        /**
         * We will handle this Filter from 
         * Buldozer file of our theme
         * 
         * @since 1.0.0.46
         * 
         * To handle Many Demo
         * By following Filter
         * 
         * @param   string  $demo_name Demo name
         * @param   Array   $selected_index  Array of Full data, which is provided by one click demo installer plugin
         * 
         */
//        $name_args = apply_filters( 'astha_demo_import_names_arg', array(
//            'menu_name'     =>  $demo_name,
//            'home_title'    =>  'Home - ' . $demo_name,
//            'blog_title'    =>  'Blog',
//        ), $demo_name, $selected_index );
//        
//        
//        
//        $name_args = array(
//            'menu_name'     =>  'Primary Menu',
//            'home_title'    =>  'Front Page',
//            'blog_title'    =>  'Blog',
//        );
        
        $name_args = array(
                    'menu_name'     => ! empty( $preset_args['menu_name'] ) ? $preset_args['menu_name'] : esc_html__( 'Primary Menu - Astha', 'astha' ),
                    'home_title'    => ! empty( $preset_args['home_title'] ) ? $preset_args['home_title'] : esc_html__( 'Home Page - Astha', 'astha' ),
                    'blog_title'    => ! empty( $preset_args['blog_title'] ) ? $preset_args['blog_title'] : esc_html__( 'Blog', 'astha' ),
                );
        
     
        /**
         * Setting Primary Menu
         * 
         */
        //$primary_menu = get_term_by( 'name', 'Menu 1', 'nav_menu' ); //Getting 
        $primary_menu = get_term_by( 'name', $name_args['menu_name'], 'nav_menu' ); //Array index check and parsed by wp_parse_args
        set_theme_mod( 'nav_menu_locations' , array( 
              'primary-menu' => $primary_menu->term_id,
             ) 
        );
        
        
        $front_page = false;
        
        //Set Front page
        $page = get_page_by_title( $name_args['home_title'] ); //array index parsed by wp_parse_args
        if ( ! empty( $page->ID ) ) {
            update_option( 'page_on_front', $page->ID );
            update_option( 'show_on_front', 'page' );
            $front_page = true;
        }
        
        //Set Blog Page
       $blog = get_page_by_title( $name_args['blog_title'] ); //array index parsed by wp_parse_args
       if ( $front_page && ! empty( $blog->ID ) ) {
        update_option( 'page_for_posts', $blog->ID );
       }
        
       /**
        * If want to do something from Child theme or any plugin
        * 
        * Use following Action Hook
        * 
        * @since 1.0.0.46
        */
       do_action( 'astha_after_import', $selected_index );
    }
}
add_action( 'pt-ocdi/after_import', 'astha_oneclickdemo_after_import' );



if( !function_exists( 'astha_demo_page_title' ) ){
    
    /**
     * Page Title Change for Demo Import
     * 
     * @param type $title
     * @return void
     */
    function astha_demo_page_title( $title ){
        $title = esc_html__( 'Demo Import', 'astha' );
        return wp_kses_post( '<h1 class="astha_demo_import_title ocdi__title dashicons-before dashicons-cloud-upload">' . $title . '</h1>' );
    }
}
add_filter( 'pt-ocdi/plugin_page_title', 'astha_demo_page_title' );


if( !function_exists( 'astha_demo_page_intro_text' ) ){
    
    /**
     * Intro Text, Currently Empty
     * We can set some Instruction for this part.
     * 
     * @return void
     */
    function astha_demo_page_intro_text(){
        ob_start();
        ?>

        <?php
        $introtext = ob_get_clean();
        return wp_kses_post( $introtext );
    }
}
add_filter( 'pt-ocdi/plugin_intro_text', 'astha_demo_page_intro_text' );



if( !function_exists( 'astha_demo_sub_menu' ) ){
    
    /**
     * To change Menu Slug, We have created this function
     * and changed by using [One Click Demo] installer 's hook
     * 
     * @param type $args
     * @return Array
     */
    function astha_demo_sub_menu( $args ){
        $capability = MEDILAC_CAPABILITY;
        return array(
			'parent_slug' => 'themes.php',
			'page_title'  => esc_html__( 'Astha Demo Import' , 'astha' ),
			'menu_title'  => esc_html__( 'Demo Import' , 'astha' ),
			'capability'  => $capability,
			'menu_slug'   => 'astha-demo-import', //Menu Slug for Demo Installer Link
		);
    }
}
add_filter( 'pt-ocdi/plugin_page_setup', 'astha_demo_sub_menu' );



if( ! function_exists( 'astha_demo_page_footer_content' ) ){
    
    /**
     * Adding Customize Content at the bottom of Demo Installer Page
     * 
     * @since 1.0.0.45
     * 
     * @return void Adding content at here
     */
    function astha_demo_page_footer_content(){
        ob_start();
        ?>
<h2>Thanks for Using Astha Theme</h2>
        <?php
        $content = ob_get_clean();
        echo wp_kses_post( $content );
    }
}
add_filter( 'pt-ocdi/plugin_page_footer', 'astha_demo_page_footer_content' );
























/**
 * Backup for One Click Demo
function ocdi_import_files() {
  return array(
    array(
      'import_file_name'             => 'Demo Import 1',
      'categories'                   => array( 'Category 1', 'Category 2' ),
      'local_import_file'            => trailingslashit( get_template_directory() ) . 'ocdi/demo-content.xml',
      'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'ocdi/widgets.json',
      'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'ocdi/customizer.dat',
      'local_import_redux'           => array(
        array(
          'file_path'   => trailingslashit( get_template_directory() ) . 'ocdi/redux.json',
          'option_name' => 'redux_option_name',
        ),
      ),
      'import_preview_image_url'     => 'http://www.your_domain.com/ocdi/preview_import_image1.jpg',
      'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately.', 'astha' ),
      'preview_url'                  => 'http://www.your_domain.com/my-demo-1',
    ),
    array(
      'import_file_name'             => 'Demo Import 2',
      'categories'                   => array( 'New category', 'Old category' ),
      'local_import_file'            => trailingslashit( get_template_directory() ) . 'ocdi/demo-content2.xml',
      'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'ocdi/widgets2.json',
      'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'ocdi/customizer2.dat',
      'local_import_redux'           => array(
        array(
          'file_path'   => trailingslashit( get_template_directory() ) . 'ocdi/redux.json',
          'option_name' => 'redux_option_name',
        ),
        array(
          'file_path'   => trailingslashit( get_template_directory() ) . 'ocdi/redux2.json',
          'option_name' => 'redux_option_name_2',
        ),
      ),
      'import_preview_image_url'     => 'http://www.your_domain.com/ocdi/preview_import_image2.jpg',
      'import_notice'                => __( 'A special note for this import.', 'astha' ),
      'preview_url'                  => 'http://www.your_domain.com/my-demo-2',
    ),
  );
}
add_filter( 'pt-ocdi/import_files', 'ocdi_import_files' );
 */
