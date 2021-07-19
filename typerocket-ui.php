<?php
/*
Plugin Name: TypeRocket UI
Plugin URI: https://typerocket.com/ui/
Description: This plugin provides a powerful user interface for creating post types, taxonomies, and meta boxes.
Version: 5.0.7
Requires at least: 5.5
Requires PHP: 7.2
Author: TypeRocket
Author URI: https://typerocket.com
License: GPLv3 or later
*/

defined( 'ABSPATH' ) or die( 'Nothing here to see!' );

class TypeRocketUIPlugin
{
    public $path = null;
    public $message = '';
    public $activating = false;
    public $id = 'typerocket_ui_register';

    const OPTION = 'tr_registered';

    public function __construct()
    {
        add_action('plugins_loaded', function() {
            if(defined('TYPEROCKET_PLUGIN_INSTALL') || defined('TYPEROCKET_PATH')) {
                add_filter('plugin_action_links',function ($actions, $plugin_file) {
                    if( $found = strpos(__FILE__, $plugin_file) ) {
                        $actions['settings'] = '<span style="color: red">Inactive Install</span>';
                    }

                    return $actions;
                }, 10, 2 );

                return;
            }

            $this->loadConfig();
            require 'typerocket/init.php';

            $this->path = plugin_dir_path(__FILE__);
            define('TYPEROCKET_AUTO_LOADER', '__return_false');
            add_filter('plugin_action_links', [$this, 'links'], 10, 2 );
            add_filter('typerocket_auth_policy_check', '__return_false', 10, 2 );
        }, 20);
    }

    public function links($actions, $plugin_file)
    {
        if( $found = strpos(__FILE__, $plugin_file) ) {
            $url = menu_page_url($this->id, false);
            $actions['settings'] = '<a href="'.$url.'" aria-label="TypeRocket UI">Settings</a>';
        }

        return $actions;
    }

    public function loadConfig()
    {
        define('TYPEROCKET_PLUGIN_INSTALL', __DIR__);
        define('TYPEROCKET_CORE_CONFIG_PATH', __DIR__ . '/typerocket/config' );
        define('TYPEROCKET_ROOT_WP', ABSPATH);

        define('TYPEROCKET_APP_NAMESPACE', 'TypeRocketUIPlugin');
        define('TYPEROCKET_AUTOLOAD_APP', [
            'prefix' => TYPEROCKET_APP_NAMESPACE . '\\',
            'folder' => __DIR__ . '/typerocket/app/',
        ]);
    }
}

new TypeRocketUIPlugin();