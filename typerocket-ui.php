<?php
/*
Plugin Name: TypeRocket UI
Plugin URI: https://typerocket.com/ui/
Description: This plugin provides a powerful user interface for creating post types, taxonomies, and meta boxes.
Version: 5.0.0
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

    public function __construct()
    {
        if(defined('TR_PLUGIN_INSTALL') || defined('TR_PATH')) {
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
        define('TR_AUTO_LOADER', '__return_false');
        add_filter('plugin_action_links', [$this, 'links'], 10, 2 );
    }

    public function links($actions, $plugin_file) {
        if( $found = strpos(__FILE__, $plugin_file) ) {
            $url = menu_page_url($this->id, false);
            $actions['settings'] = '<a href="'.$url.'" aria-label="TypeRocket UI">Settings</a>';
        }

        return $actions;
    }

    public function loadConfig()
    {
        define('TR_PLUGIN_INSTALL', __DIR__);
        define('TR_CORE_CONFIG_PATH', __DIR__ . '/typerocket/config' );
        define('TR_APP_NAMESPACE', 'TR_UI');
        define('TR_ROOT_WP', ABSPATH);

        define('TR_AUTOLOAD_APP', [
            'prefix' => TR_APP_NAMESPACE . '\\',
            'folder' => __DIR__ . '/typerocket/app/',
        ]);
    }
}

new TypeRocketUIPlugin();