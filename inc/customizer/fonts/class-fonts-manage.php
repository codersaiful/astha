<?php
/**
 * Helper class for font Manage.
 * Final Class
 * Unable to Extend from ThirdParty
 *
 * @package     Astha
 * @author      Saiful<codersaiful@gmail.com>
 * @copyright   Copyright (c) 2020, Saiful Islam
 */


if( ! class_exists( 'Astha_Fonts_Manage' ) ){
    
    /**
     * Google Fonts Manager Object
     * Normally I have used it for only Customizer.
     * 
     * But If any one want to use Universally
     * 
     * Have to include before Use.
     * 
     * @package Astha
     * @since   1.0.0.37 (It's was planned from beginning of using this class)
     */
    class Astha_Fonts_Manage{
        
        public static $choices;
        public static $fonts;

        /**
         * Google Fonts
         * Manage an Array from the list of Google Fonts Array
         * 
         * Array from Fonts file Theme->inc->customizer->fonts->google-fonts.php
         * 
         * @return type $google_fonts Array List of All Supported Google Fonts
         */
        public static function fonts(){
            $google_fonts_file = apply_filters( 'astha_google_fonts_php_file', ASTHA_THEME_DIR . 'inc/customizer/fonts/google-fonts.php' );

            if ( ! file_exists( $google_fonts_file ) ) {
                    return array();
            }

            $google_fonts_arr = include $google_fonts_file;// phpcs:ignore: WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
            
            $google_fonts = array();
            foreach ( $google_fonts_arr as $key => $font ) {
                    $name = key( $font );
                    $google_fonts[ $name ] = $font[ $name ];
                    self::$fonts[ $name ] = $font[ $name ];
                    //self::$choices[$name] = $name;
            }

            return apply_filters( 'astha_google_fonts', $google_fonts );
        }
        
        /**
         * Array for Fonts List Choices. Actually we have arrange
         * a filter for Google font
         * 
         * @package Astha
         * @return  Array A array of All Google Fonts
         */
        public static function fonts_choices() {
            if( is_array( self::fonts() ) ){
                self::$choices[''] = __( 'Default', 'astha' );
                foreach( self::fonts() as $name => $font ){

                    //$extra = !empty( $font['category'] ) ? ',' . $font['category'] : '';
                    self::$choices[$name] = $name;
                }
            }
            $choices = apply_filters( 'astha_fonts_choices', self::$choices );
            return $choices;
        }
        
        /**
         * Array for Fonts text Transform
         * 
         * @return Array
         */
        public static function fonts_weight_choices() {
            $choices = array(
                ''                  => __( 'No Value', 'astha' ),
                'inherit'           => __( 'Default', 'astha' ),
                '100'               => __( 'Thin 100', 'astha' ),
                '200'               => __( 'Thin 200', 'astha' ),
                '300'               => __( 'Light 300', 'astha' ),
                '400'               => __( 'Normal 400', 'astha' ),
                '500'               => __( 'Medium 500', 'astha' ),
                '600'               => __( 'Medium 600', 'astha' ),
                '700'               => __( 'Bold 700', 'astha' ),
                '800'               => __( 'Extra-Bold 800', 'astha' ),
                '900'               => __( 'Ultra-Bold 900', 'astha' ),
            );
            $choise = apply_filters( 'astha_weight_choices', $choices );
            return $choise;
        }
        
        /**
         * Array for Fonts text Transform
         * 
         * @return type
         */
        public static function fonts_transform_choices() {
            $choices = array(
                ''                  => __( 'No Value', 'astha' ),
                'inherit'           => __( 'Default', 'astha' ),
                'none'              => __( 'None', 'astha' ),
                'capitalize'        => __( 'Capitalize', 'astha' ),
                'uppercase'         => __( 'Uppercase', 'astha' ),
                'lowercase'         => __( 'Lowercase', 'astha' ),
            );
            $choise = apply_filters( 'astha_text_transform_choices', $choices );
            return $choise;
        }
        
        /**
         * Array for Fonts text Transform
         * 
         * @return type
         */
        public static function fonts_style_choices() {
            $choices = array(
                ''                  => __( 'No Value', 'astha' ),
                'inherit'           => __( 'Default', 'astha' ),
                'italic'            => __( 'Italic', 'astha' ),
                'normal'            => __( 'Normal', 'astha' ),
                'oblique'           => __( 'Oblique', 'astha' ),
            );
            $choise = apply_filters( 'astha_font_style_choices', $choices );
            return $choise;
        }
        
        
        /**
         * Google Font URL
         * Combine multiple google font in one URL
         *
         * @link    https://shellcreeper.com/?p=1476
         * @param   array   $fonts      Google Fonts array.
         * @param   array   $subsets    Font's Subsets array.
         *
         * @return string
         */
        public static function google_fonts_url( $subsets = array() ) {

                /* URL */
                $base_url  = '//fonts.googleapis.com/css';
                $font_args = array();
                $family    = array();

                // This is deprecated filter hook.
                $fonts = apply_filters( 'astha_google_fonts', astha_google_fonts() );

                /* Format Each Font Family in Array */
                foreach ( $fonts as $font_name => $font_weight ) {
                        $font_name = str_replace( ' ', '+', $font_name );
                        if ( ! empty( $font_weight ) ) {
                                if ( is_array( $font_weight ) ) {
                                        $font_weight = implode( ',', $font_weight );
                                }
                                $font_family = explode( ',', $font_name );
                                //$font_family = str_replace( "'", '', astra_get_prop( $font_family, 0 ) );
                                $family[]    = trim( $font_family . ':' . rawurlencode( trim( $font_weight ) ) );
                        } else {
                                $family[] = trim( $font_name );
                        }
                }

                /* Only return URL if font family defined. */
                if ( ! empty( $family ) ) {

                        /* Make Font Family a String */
                        $family = implode( '|', $family );

                        /* Add font family in args */
                        $font_args['family'] = $family;

                        /* Add font subsets in args */
                        if ( ! empty( $subsets ) ) {

                                /* format subsets to string */
                                if ( is_array( $subsets ) ) {
                                        $subsets = implode( ',', $subsets );
                                }

                                $font_args['subset'] = rawurlencode( trim( $subsets ) );
                        }

                        $font_args['display'] = astra_get_fonts_display_property();

                        return add_query_arg( $font_args, $base_url );
                }

                return '';
        }
    }
}
