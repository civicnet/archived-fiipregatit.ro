<?php
/**
 * Plugin Name: Fiipregatit Content Setup
 * Description: Content setip
 * Plugin URI:
 * Version:     2018.02.02
 * Author:      CivicTech Romania
 * License:     GPL
 * Text Domain: plugin_unique_name
 * Domain Path: /languages
 */

add_action(
    'init',
    array ( Fiipregatit_Content::get_instance(), 'plugin_setup' )
);

class Fiipregatit_Content
{
    /**
     * Plugin instance.
     *
     * @see get_instance()
     * @type object
     */
    protected static $instance = NULL;

    /**
     * URL to this plugin's directory.
     *
     * @type string
     */
    public $plugin_url = '';

    /**
     * Path to this plugin's directory.
     *
     * @type string
     */
    public $plugin_path = '';

    /**
     * Access this plugin’s working instance
     *
     * @wp-hook plugins_loaded
     * @since   2012.09.13
     * @return  object of this class
     */
    public static function get_instance()
    {
        NULL === self::$instance and self::$instance = new self;

        return self::$instance;
    }

    /**
     * Used for regular plugin work.
     *
     * @wp-hook plugins_loaded
     * @since   2012.09.10
     * @return  void
     */
    public function plugin_setup()
    {

        $this->plugin_url    = plugins_url( '/', __FILE__ );
        $this->plugin_path   = plugin_dir_path( __FILE__ );
        $this->_registerCustomPostTypes();
    }

    /**
     * Constructor. Intentionally left empty and public.
     *
     */
    public function __construct() {}

    /**
     * Register custom post types
     */
    private function _registerCustomPostTypes()
    {
        register_post_type( App::POST_TYPE_CAMPAIGN,
            array (
                'labels' => array (
                    'name' => __( 'Campanii' ),
                    'singular_name' => __( 'Campanie' )
                ),
                'supports' => array( 'title', 'editor', 'thumbnail' ),
                'public' => true,
                'has_archive' => false,
                'menu_icon' => 'dashicons-megaphone'
            )
        );

        register_post_type( App::POST_TYPE_GUIDE,
            array (
                'labels' => array (
                    'name' => __( 'Ghiduri' ),
                    'singular_name' => __( 'Ghid' )
                ),
                'supports' => array( 'title', 'editor', 'thumbnail' ),
                'public' => true,
                'has_archive' => false,
                'menu_icon' => 'dashicons-clipboard'
            )
        );

        register_post_type( App::POST_TYPE_LINK,
            array (
                'labels' => array (
                    'name' => __( 'Linkuri utile' ),
                    'singular_name' => __( 'Link' )
                ),
                'public' => true,
                'has_archive' => false,
                'menu_icon' => 'dashicons-external'
            )
        );

        add_theme_support( 'post-thumbnails' );
    }
}
