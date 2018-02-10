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
        $this->_registerCustomMetaBox();
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

    private function _registerCustomMetaBox() {
      $custom_boxes_init = function() {
        // Custom Guides meta box
        $cmb_guide = new_cmb2_box(array(
        	'id'            => 'galerie_foto_ghiduri',
        	'title'         => __( 'Galerie Foto', 'cmb2' ),
        	'object_types'  => array(App::POST_TYPE_GUIDE),
        	'context'       => 'side',
        	'show_names'    => true
        ));

        $cmb_guide->add_field( array(
        	'name' => '',
        	'desc' => 'Alege imaginile pe care dorești să le afișezi pentru ghidul acesta',
        	'id'   => App::GUIDE_METABOX_GALLERY,
        	'type' => 'file_list',
        	'query_args' => array('type' => 'image'),
        	'text' => array(
        		'add_upload_files_text' => 'Adaugă imagini',
        		'remove_image_text' => 'Șterge imagine',
        		'file_text' => 'Imagine:',
        		'file_download_text' => 'Downloadează',
        		'remove_text' => 'Șterge',
        	),
        ));

        // Custom Campaign meta box
        $cmb_campaign = new_cmb2_box(array(
        	'id'            => 'attachments_campaign',
        	'title'         => __( 'Materiale de Informare', 'cmb2' ),
        	'object_types'  => array(App::POST_TYPE_CAMPAIGN),
        	'context'       => 'side',
        	'show_names'    => true
        ));

        $cmb_campaign->add_field( array(
        	'name' => '',
        	'desc' => 'Alege materialele de informare / promo, pentru campania aceasta',
        	'id'   => App::CAMPAIGN_METABOX_ATTACHMENTS,
        	'type' => 'file_list',
        	'text' => array(
        		'add_upload_files_text' => 'Adaugă materiale',
        		'remove_image_text' => 'Șterge material',
        		'file_text' => 'Material:',
        		'file_download_text' => 'Downloadează',
        		'remove_text' => 'Șterge',
        	),
        ));
      };
      add_action( 'cmb2_admin_init', $custom_boxes_init);
    }
}
