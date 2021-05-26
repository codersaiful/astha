<?php
/**
 * TGM Plugin Activation Plugins Manipulation Here.
 * Version of Used TGMPA is: 2.6.1
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme Astha for publication on ThemeForest
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

require_once get_template_directory() . '/required-plugins/TGM-Plugin-Activation/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'astha_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * We have Included our required plugin here
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function astha_register_required_plugins() {
        $plugins_dir = 'https://github.com/codersaiful/astha-core/archive/master.zip';
    
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		// This is an example of how to include a plugin bundled with a theme.
		array(
			'name'               => esc_html( 'Astha Core', 'astha' ), // The plugin name.
			'slug'               => 'astha-core', // The plugin slug (typically the folder name).
			'source'             => $plugins_dir, // The plugin source.
			'required'           => false, 
			'version'            => '1.0.0',
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		),
                array(
			'name'         => esc_html( 'CMB2 - (Important for Page Options)', 'astha' ), // The plugin name.
			'slug'         => 'cmb2', // The plugin slug (typically the folder name).
			'required'     => false, // If false, the plugin is only 'recommended' instead of required.
		),
            
                //WooCommerce
                array(
			'name'         => esc_html( 'WooCommerce', 'astha' ), // The plugin name.
			'slug'         => 'woocommerce', // The plugin slug (typically the folder name).
			'required'     => false, // If false, the plugin is only 'recommended' instead of required.
		),
            
		
            
		array(
			'name'         => esc_html( 'UltraAddons Elementor Lite (Our Page Builder for home like Demo)', 'astha' ), 
			'slug'         => 'ultraaddons-elementor-lite',
			'required'     => false,
		),
            
            
		array(
			'name'         => esc_html( 'Elementor (Page Builder for home like Demo)', 'astha' ), 
			'slug'         => 'elementor',
			'required'     => false,
		),
            
		array(
			'name'         => esc_html( 'One Click Demo Import (for Demo Import)', 'astha' ), 
			'slug'         => 'one-click-demo-import',
			'required'     => false,
		),
            
                //For Plus Minus Button in Woocommerce Single Product Page
                array(
			'name'         => esc_html( 'Quantity Plus/Minus Button for WooCommerce (for WooCommerce)', 'astha' ), // The plugin name.
			'slug'         => 'wc-quantity-plus-minus-button', // The plugin slug (typically the folder name).
			'required'     => false, // If false, the plugin is only 'recommended' instead of required.
		),
            
                array(
			'name'         => esc_html( 'Contact Form 7', 'astha' ), 
			'slug'         => 'contact-form-7',
			'required'     => false,
		),
            
		array(
			'name'         => esc_html( 'MailChimp For WP (for Newsleter)', 'astha' ), 
			'slug'         => 'mailchimp-for-wp',
			'required'     => false,
		),
            
            
                //wishlist, quick view plugin added in list
		array(
			'name'         => esc_html( 'YITH WooCommerce Quick View (for WooCommerce)', 'astha' ), 
			'slug'         => 'yith-woocommerce-quick-view',
			'required'     => false,
		),
            
            
		array(
			'name'         => esc_html( 'YITH WooCommerce Wishlist (for WooCommerce)', 'astha' ), 
			'slug'         => 'yith-woocommerce-wishlist',
			'required'     => false,
		),
            
                array(
			'name'         => esc_html( 'Quantity Plus/Minus Button for WooCommerce (for WooCommerce)', 'astha' ), // The plugin name.
			'slug'         => 'wc-quantity-plus-minus-button', // The plugin slug (typically the folder name).
			'required'     => false, // If false, the plugin is only 'recommended' instead of required.
		),
            
                /**
                 * To get Update Theme from Envato,
                 * Need Envato WordPress Plugin.
                 * 
                 * @link https://envato.com/market-plugin/ Envato Tutorial
                 * @link https://envato.github.io/wp-envato-market/ Github Page
                 * @link https://github.com/envato/wp-envato-market Plugin Github Repo Link
                 * @link https://envato.github.io/wp-envato-market/dist/envato-market.zip Plugin's zip file
                 */
//                array(
//			'name'               => esc_html( 'Envato Market WordPress Plugin', 'astha' ), // The plugin name.
//			'slug'               => 'envato-market', // The plugin slug (typically the folder name).
//			'source'             => 'https://envato.github.io/wp-envato-market/dist/envato-market.zip', // The plugin source.
//			'required'           => false, // If false, the plugin is only 'recommended' instead of required.
//		),

		// Our Default Plugins
		
		array(
			'name'         => esc_html( 'Woo Product Table (for WooCommerce)', 'astha' ), // The plugin name.
			'slug'         => 'woo-product-table', // The plugin slug (typically the folder name).
			'required'     => false, // If false, the plugin is only 'recommended' instead of required.
		),
		
            
		

		
//		// This is an example of the use of 'is_callable' functionality. A user could - for instance -
//		// have WPSEO installed *or* WPSEO Premium. The slug would in that last case be different, i.e.
//		// 'wordpress-seo-premium'.
//		// By setting 'is_callable' to either a function from that plugin or a class method
//		// `array( 'class', 'method' )` similar to how you hook in to actions and filters, TGMPA can still
//		// recognize the plugin as being installed.
//		array(
//			'name'        => 'WordPress SEO by Yoast',
//			'slug'        => 'wordpress-seo',
//			'is_callable' => 'wpseo_init',
//		),

	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'astha',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'astha-required-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

		/*
		'strings'      => array(
			'page_title'                      => __( 'Install Required Plugins', 'astha' ),
			'menu_title'                      => __( 'Install Plugins', 'astha' ),
			/* translators: %s: plugin name. * /
			'installing'                      => __( 'Installing Plugin: %s', 'astha' ),
			/* translators: %s: plugin name. * /
			'updating'                        => __( 'Updating Plugin: %s', 'astha' ),
			'oops'                            => __( 'Something went wrong with the plugin API.', 'astha' ),
			'notice_can_install_required'     => _n_noop(
				/* translators: 1: plugin name(s). * /
				'This theme requires the following plugin: %1$s.',
				'This theme requires the following plugins: %1$s.',
				'astha'
			),
			'notice_can_install_recommended'  => _n_noop(
				/* translators: 1: plugin name(s). * /
				'This theme recommends the following plugin: %1$s.',
				'This theme recommends the following plugins: %1$s.',
				'astha'
			),
			'notice_ask_to_update'            => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
				'astha'
			),
			'notice_ask_to_update_maybe'      => _n_noop(
				/* translators: 1: plugin name(s). * /
				'There is an update available for: %1$s.',
				'There are updates available for the following plugins: %1$s.',
				'astha'
			),
			'notice_can_activate_required'    => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following required plugin is currently inactive: %1$s.',
				'The following required plugins are currently inactive: %1$s.',
				'astha'
			),
			'notice_can_activate_recommended' => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following recommended plugin is currently inactive: %1$s.',
				'The following recommended plugins are currently inactive: %1$s.',
				'astha'
			),
			'install_link'                    => _n_noop(
				'Begin installing plugin',
				'Begin installing plugins',
				'astha'
			),
			'update_link' 					  => _n_noop(
				'Begin updating plugin',
				'Begin updating plugins',
				'astha'
			),
			'activate_link'                   => _n_noop(
				'Begin activating plugin',
				'Begin activating plugins',
				'astha'
			),
			'return'                          => __( 'Return to Required Plugins Installer', 'astha' ),
			'plugin_activated'                => __( 'Plugin activated successfully.', 'astha' ),
			'activated_successfully'          => __( 'The following plugin was activated successfully:', 'astha' ),
			/* translators: 1: plugin name. * /
			'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'astha' ),
			/* translators: 1: plugin name. * /
			'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'astha' ),
			/* translators: 1: dashboard link. * /
			'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'astha' ),
			'dismiss'                         => __( 'Dismiss this notice', 'astha' ),
			'notice_cannot_install_activate'  => __( 'There are one or more required or recommended plugins to install, update or activate.', 'astha' ),
			'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'astha' ),

			'nag_type'                        => '', // Determines admin notice type - can only be one of the typical WP notice classes, such as 'updated', 'update-nag', 'notice-warning', 'notice-info' or 'error'. Some of which may not work as expected in older WP versions.
		),
		*/
	);
        $config['strings']['page_title'] = __( 'Install Required Plugins - Astha', 'astha' );
	tgmpa( $plugins, $config );
}
