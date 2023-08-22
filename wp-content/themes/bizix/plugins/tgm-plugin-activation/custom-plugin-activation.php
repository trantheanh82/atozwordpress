<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once( SWM_PLUGINS . 'tgm-plugin-activation/class-tgm-plugin-activation.php' );

add_action( 'tgmpa_register', 'swm_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function swm_register_required_plugins() {
    /*
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */

    $swm_ocdi_in_tgmpa = array();

    if ( get_option('swm_enable_demo_templates',true) ) {
        $swm_ocdi_in_tgmpa = array(
                        'name'      => 'One Click Demo Import',
                        'slug'      => 'one-click-demo-import',
                        'required'  => false,
                        );
    }

    $plugins = array(

            $swm_ocdi_in_tgmpa,
            array(
                'name'      => 'Meta Box',
                'slug'      => 'meta-box',
                'required'  => false,
            ),
            array(
                'name'      => 'Elementor',
                'slug'      => 'elementor',
                'required'  => false,
            ),
            array(
                'name'      => 'Contact Form 7',
                'slug'      => 'contact-form-7',
                'required'  => false,
            ),
            array(
                'name'                  => 'Gyan Elements',
                'slug'                  => 'gyan-elements',
                'source'                => get_template_directory() . '/plugins/tgm-plugin-activation/zip/gyan-elements.zip',
                'required'              => true,
                'version'               => '2.1.0',
                'force_activation'      => false,
                'force_deactivation'    => false,
                'external_url'          => '',
            ),
            array(
                'name'                  => 'Slider Revolution',
                'slug'                  => 'revslider',
                'source'                => get_template_directory() . '/plugins/tgm-plugin-activation/zip/revslider.zip',
                'required'              => false,
                'version'               => '6.6.5',
                'force_activation'      => false,
                'force_deactivation'    => false,
                'external_url'          => '',
            ),
            array(
                'name'                  => 'Envato Market',
                'slug'                  => 'envato-market',
                'source'                => get_template_directory() . '/plugins/tgm-plugin-activation/zip/envato-market.zip',
                'required'              => false,
                'version'               => '2.0.7',
                'force_activation'      => false,
                'force_deactivation'    => false,
                'external_url'          => '',
            ),
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
        'id'           => 'bizix',             // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to bundled plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'parent_slug'  => 'themes.php',            // Parent menu slug.
        'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.

    );

    tgmpa( $plugins, $config );
}
