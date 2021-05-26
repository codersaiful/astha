<?php
/**
 * Astha Theme Customizer For for Custom Controll of Customizer
 * 
 * @Credit maddisondesigns
 * @link https://github.com/maddisondesigns/customizer-custom-controls/blob/master/inc/custom-controls.php Getting Help from the Github Repo
 *
 * 
 * //Image URL Sample
 * MEDILAC_CUSTOMIZER_URI . 'assets/images/sidebar-left.png'
 * 
 * @package Astha
 */

$astha_cst_css = MEDILAC_CUSTOMIZER_URI . 'assets/images/sidebar-left.png';
if ( ! defined( 'MEDILAC_CUSTOMIZER_CSS' ) ) {
    define( 'MEDILAC_CUSTOMIZER_CSS', esc_url( MEDILAC_CUSTOMIZER_URI . 'assets/css/customizer.css' ) );
}

if ( ! defined( 'MEDILAC_CUSTOMIZER_JS' ) ) {
    define( 'MEDILAC_CUSTOMIZER_JS', esc_url( MEDILAC_CUSTOMIZER_URI . 'assets/js/customizer.js' ) );
}
if ( ! defined( 'MEDILAC_CUSTOMIZER_JS_PREVIEW' ) ) {
    define( 'MEDILAC_CUSTOMIZER_JS_PREVIEW', esc_url( MEDILAC_CUSTOMIZER_URI . 'assets/js/customizer-preview.js' ) );
}


if ( ! class_exists( 'Astha_Image_Radio_Control' ) &&  class_exists( 'WP_Customize_Control' ) ) {
    /**
     * Toggle Switch Custom Control
     *
     * @author Anthony Hortin <http://maddisondesigns.com>
     * @license http://www.gnu.org/licenses/gpl-2.0.html
     * @link https://github.com/maddisondesigns
     */
    class Astha_Toggle_Switch_Custom_control extends WP_Customize_Control {
            /**
             * The type of control being rendered
             */
            public $type = 'toggle_switch';
            /**
             * Enqueue our scripts and styles
             */
            public function enqueue(){
                wp_enqueue_style( 'astha-customizer-css', MEDILAC_CUSTOMIZER_CSS, array(), '1.0', 'all' );
            }
            /**
             * Render the control in the customizer
             */
            public function render_content(){
                $attr = array();
               foreach( $this->choices as $each_val ){
                   $attr[] = $each_val;
               } 
               //echo($this->value());
            ?>
                    <div class="toggle-switch-control">
                            <div class="toggle-switch">
                                    <input type="checkbox" id="<?php echo esc_attr($this->id); ?>" name="<?php echo esc_attr($this->id); ?>" class="toggle-switch-checkbox" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); checked( $this->value() ); ?>>
                                    <label class="toggle-switch-label" for="<?php echo esc_attr( $this->id ); ?>">
                                            <span class="toggle-switch-inner" data-toggle-on="<?php echo $attr[0]; ?>"  data-toggle-off="<?php echo $attr[0]; ?>"></span>
                                            <span class="toggle-switch-switch"></span>
                                    </label>
                            </div>
                            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                            <?php if( !empty( $this->description ) ) { ?>
                                    <span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
                            <?php } ?>
                    </div>
            <?php
            }
    }
}
if ( ! class_exists( 'Astha_Image_Radio_Control' ) &&  class_exists( 'WP_Customize_Control' ) ) {
    class Astha_Image_Radio_Control extends WP_Customize_Control {
		/**
		 * The type of control being rendered
		 */
		public $type = 'image_radio_button';
		/**
		 * Enqueue our scripts and styles
		 */
		public function enqueue() {
			wp_enqueue_style( 'astha-customizer-css', MEDILAC_CUSTOMIZER_CSS, array(), '1.0', 'all' );
		}
		/**
		 * Render the control in the customizer
		 */
		public function render_content() {
		?>
			<div class="image_radio_button_control">
				<?php if( !empty( $this->label ) ) { ?>
					<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<?php } ?>
				<?php if( !empty( $this->description ) ) { ?>
					<span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<?php } ?>

				<?php foreach ( $this->choices as $key => $value ) { ?>
					<label class="radio-button-label">
						<input type="radio" name="<?php echo esc_attr( $this->id ); ?>" value="<?php echo esc_attr( $key ); ?>" <?php $this->link(); ?> <?php checked( esc_attr( $key ), $this->value() ); ?>/>
                                                <?php
                                                $urlImg = isset( $value['image'] ) ? $value['image'] : false;
                                                if( ! empty( $urlImg ) && is_string( $urlImg ) && is_array(getimagesize($urlImg)) ){
                                                    $urlImg = true;
                                                }
                                                if( $urlImg ){ ?>
                                                <img src="<?php echo esc_attr( $value['image'] ); ?>" alt="<?php echo esc_attr( $value['name'] ); ?>" title="<?php echo esc_attr( $value['name'] ); ?>" />
                                                <?php }else{ ?>
                                                <h4 class="radion-button-no-image-label"><?php echo esc_html( $value['name'] ); ?></h4>    
                                                <?php } ?>
                                        </label>
				<?php	} ?>
			</div>
		<?php
		}
	}
}

if ( ! class_exists( 'Astha_Sample_Control' ) &&  class_exists( 'WP_Customize_Control' ) ) {
    class Astha_Sample_Control extends WP_Customize_Control{
        
        public $type = 'astha';
        
        public function render_content() {
            //echo($this->value());
            ?>
            <div class="astha-sample-theme-mode">
                <input type="text" value="<?php echo $this->value(); ?>">
                <?php if( !empty( $this->label ) ): ?>
                <h1><?php echo esc_html( $this->label ); ?></h1>
                <?php endif; ?>

                <?php if( !empty( $this->logo ) ): ?>
                    <img src="<?php esc_attr(get_template_directory_uri() ); ?>/assets/images/logo.png">
                <?php endif; ?>

                <?php if( !empty( $this->description ) ): ?>
                    <p><?php echo wp_kses_post( $this->description ); ?></p>
                <?php endif; ?>

                <?php if( !empty( $this->link ) ): ?>
                    <a href="<?php echo esc_url( $this->link() ); ?>">Get Help</a>
                <?php endif; ?>

            </div>

            <?php
        }
    }

}

if( ! class_exists( 'Astha_Select2_Custom_Control' ) && class_exists( 'WP_Customize_Control' ) ){
    
    /**
     * Dropdown Select2 Custom Control
     *
     * @author Anthony Hortin <http://maddisondesigns.com>
     * @license http://www.gnu.org/licenses/gpl-2.0.html
     * @link https://github.com/maddisondesigns
     */
    class Astha_Select2_Custom_Control extends WP_Customize_Control {
            /**
             * The type of control being rendered
             */
            public $type = 'dropdown_select2';
            /**
             * The type of Select2 Dropwdown to display. Can be either a single select dropdown or a multi-select dropdown. Either false for true. Default = false
             */
            private $multiselect = false;
            /**
             * The Placeholder value to display. Select2 requires a Placeholder value to be set when using the clearall option. Default = 'Please select...'
             */
            private $placeholder = 'Please select...';
            /**
             * Constructor
             */
            public function __construct( $manager, $id, $args = array(), $options = array() ) {
                    parent::__construct( $manager, $id, $args );
                    // Check if this is a multi-select field
                    if ( isset( $this->input_attrs['multiselect'] ) && $this->input_attrs['multiselect'] ) {
                            $this->multiselect = true;
                    }
                    // Check if a placeholder string has been specified
                    if ( isset( $this->input_attrs['placeholder'] ) && $this->input_attrs['placeholder'] ) {
                            $this->placeholder = $this->input_attrs['placeholder'];
                    }
            }
            /**
             * Enqueue our scripts and styles
             */
            public function enqueue() {
                    wp_enqueue_script( 'astha-select2-js', MEDILAC_CUSTOMIZER_URI . 'assets/js/select2.full.min.js', array( 'jquery' ), '4.0.13', true );
                    wp_enqueue_script( 'astha-custom-controls-js', MEDILAC_CUSTOMIZER_URI . 'assets/js/customizer.js', array( 'astha-select2-js' ), '1.0', true );
                    wp_enqueue_style( 'astha-custom-controls-css', MEDILAC_CUSTOMIZER_URI . 'assets/css/customizer.css', array(), '1.1', 'all' );
                    wp_enqueue_style( 'astha-select2-css', MEDILAC_CUSTOMIZER_URI . 'assets/css/select2.min.css', array(), '4.0.13', 'all' );
            }
            /**
             * Render the control in the customizer
             */
            public function render_content() {
                    $defaultValue = $this->value();
                    if ( $this->multiselect ) {
                            $defaultValue = explode( ',', $this->value() );
                    }
            ?>
                    <div class="dropdown_select2_control">
                            <?php if( !empty( $this->label ) ) { ?>
                                    <label for="<?php echo esc_attr( $this->id ); ?>" class="customize-control-title">
                                            <?php echo esc_html( $this->label ); ?>
                                    </label>
                            <?php } ?>
                            <?php if( !empty( $this->description ) ) { ?>
                                    <span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
                            <?php } ?>
                            <input type="hidden" id="<?php echo esc_attr( $this->id ); ?>" class="customize-control-dropdown-select2" value="<?php echo esc_attr( $this->value() ); ?>" name="<?php echo esc_attr( $this->id ); ?>" <?php $this->link(); ?> />
                            <select name="select2-list-<?php echo ( $this->multiselect ? 'multi[]' : 'single' ); ?>" class="customize-control-select2" data-placeholder="<?php echo $this->placeholder; ?>" <?php echo ( $this->multiselect ? 'multiple="multiple" ' : '' ); ?>>
                                    <?php
                                            if ( !$this->multiselect ) {
                                                    // When using Select2 for single selection, the Placeholder needs an empty <option> at the top of the list for it to work (multi-selects dont need this)
                                                    echo '<option></option>';
                                            }
                                            foreach ( $this->choices as $key => $value ) {
                                                    if ( is_array( $value ) ) {
                                                            echo '<optgroup label="' . esc_attr( $key ) . '">';
                                                            foreach ( $value as $optgroupkey => $optgroupvalue ) {
                                                                    if( $this->multiselect ){
                                                                            echo '<option value="' . esc_attr( $optgroupkey ) . '" ' . ( in_array( esc_attr( $optgroupkey ), $defaultValue ) ? 'selected="selected"' : '' ) . '>' . esc_attr( $optgroupvalue ) . '</option>';
                                                                    }
                                                                    else{
                                                                            echo '<option value="' . esc_attr( $optgroupkey ) . '" ' . selected( esc_attr( $optgroupkey ), $defaultValue, false )  . '>' . esc_attr( $optgroupvalue ) . '</option>';
                                                                    }
                                                            }
                                                            echo '</optgroup>';
                                                    }
                                                    else {
                                                            if( $this->multiselect ){
                                                                    echo '<option value="' . esc_attr( $key ) . '" ' . ( in_array( esc_attr( $key ), $defaultValue ) ? 'selected="selected"' : '' ) . '>' . esc_attr( $value ) . '</option>';
                                                            }
                                                            else{
                                                                    echo '<option value="' . esc_attr( $key ) . '" ' . selected( esc_attr( $key ), $defaultValue, false )  . '>' . esc_attr( $value ) . '</option>';
                                                            }
                                                    }
                                            }
                                    ?>
                            </select>
                    </div>
            <?php
            }
    }

}