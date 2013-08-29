<?php
/*
Plugin Name: FindX Google Maps Direction
Description: Easily embed, customize, and use Google maps on your WordPress site - in posts, pages or as an easy to use widget, display local images and let your site visitors get directions in seconds.
Version: 1.0
Author: V.V.T | Örestad-Linux
Author URI: http://www.vvt-mediadesign.se
*/

define ('FINDX_PLUGIN_SELF_DIRNAME', basename(dirname(__FILE__)), true);

if (is_multisite() && defined('WPMU_PLUGIN_URL') && defined('WPMU_PLUGIN_DIR') && file_exists(WPMU_PLUGIN_DIR . '/' . basename(__FILE__)))
{
	define ('AGM_PLUGIN_LOCATION', 'mu-plugins', true);
	define ('AGM_PLUGIN_BASE_DIR', WPMU_PLUGIN_DIR, true);
	define ('AGM_PLUGIN_URL', str_replace('http://', (@$_SERVER["HTTPS"] == 'on' ? 'https://' : 'http://'), WPMU_PLUGIN_URL), true);
	$textdomain_handler = 'load_muplugin_textdomain';
}
else if (defined('WP_PLUGIN_URL') && defined('WP_PLUGIN_DIR') && file_exists(WP_PLUGIN_DIR . '/' . FINDX_PLUGIN_SELF_DIRNAME . '/' . basename(__FILE__)))
{
	define ('AGM_PLUGIN_LOCATION', 'subfolder-plugins', true);
	define ('AGM_PLUGIN_BASE_DIR', WP_PLUGIN_DIR . '/' . FINDX_PLUGIN_SELF_DIRNAME, true);
	define ('AGM_PLUGIN_URL', str_replace('http://', (@$_SERVER["HTTPS"] == 'on' ? 'https://' : 'http://'), WP_PLUGIN_URL) . '/' . FINDX_PLUGIN_SELF_DIRNAME, true);
	$textdomain_handler = 'load_plugin_textdomain';
}
else if (defined('WP_PLUGIN_URL') && defined('WP_PLUGIN_DIR') && file_exists(WP_PLUGIN_DIR . '/' . basename(__FILE__)))
{
	define ('AGM_PLUGIN_LOCATION', 'plugins', true);
	define ('AGM_PLUGIN_BASE_DIR', WP_PLUGIN_DIR, true);
	define ('AGM_PLUGIN_URL', str_replace('http://', (@$_SERVER["HTTPS"] == 'on' ? 'https://' : 'http://'), WP_PLUGIN_URL), true);
	$textdomain_handler = 'load_plugin_textdomain';
}
else
{
	wp_die(__('There was an issue determining where Google Maps plugin is installed. Please reinstall.'));
}

require_once AGM_PLUGIN_BASE_DIR . '/class_agm_map_model.php';
require_once AGM_PLUGIN_BASE_DIR . '/class_agm_maps_widget.php';

require_once AGM_PLUGIN_BASE_DIR . '/class_agm_plugin_installer.php';
register_activation_hook(__FILE__, array(AgmPluginInstaller, 'install'));
AgmPluginInstaller::check();

add_action('widgets_init', create_function('', "register_widget('AgmMapsWidget');"));

if (is_admin())
{
	require_once AGM_PLUGIN_BASE_DIR . '/class_agm_admin_maps.php';
	AgmAdminMaps::serve();
}
else
{
	require_once AGM_PLUGIN_BASE_DIR . '/class_agm_marker_replacer.php';
	require_once AGM_PLUGIN_BASE_DIR . '/class_findx_user_maps.php';
	AgmUserMaps::serve();
}
