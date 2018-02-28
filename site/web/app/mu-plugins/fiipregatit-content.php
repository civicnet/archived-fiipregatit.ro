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

class Fiipregatit_Content {
    protected static $instance = NULL;
    public $plugin_url = '';
    public $plugin_path = '';

    public static function get_instance() {
        NULL === self::$instance and self::$instance = new self;
        return self::$instance;
    }

    public function plugin_setup() {
        $this->plugin_url    = plugins_url( '/', __FILE__ );
        $this->plugin_path   = plugin_dir_path( __FILE__ );
        $this->_registerCustomPostTypes();
        $this->_registerCustomMetaBox();
    }

    public function __construct() {}

    private function _registerCustomPostTypes() {
      register_post_type(App::POST_TYPE_CAMPAIGN,
        array(
          'labels' => array(
            'name' => __('Campanii'),
            'singular_name' => __('Campanie')
          ),
          'supports' => array('title', 'editor', 'thumbnail'),
          'public' => true,
          'has_archive' => false,
          'menu_icon' => 'dashicons-megaphone'
        )
      );

      register_post_type(App::POST_TYPE_GUIDE,
        array(
          'labels' => array(
            'name' => __('Ghiduri'),
            'singular_name' => __('Ghid')
          ),
          'supports' => array('title', 'editor', 'thumbnail'),
          'public' => true,
          'has_archive' => false,
          'menu_icon' => 'dashicons-clipboard'
        )
      );

      register_post_type(App::POST_TYPE_LINK,
        array(
          'labels' => array(
            'name' => __('Linkuri utile'),
            'singular_name' => __('Link')
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
        	'title'         => __('Galerie Foto', 'cmb2'),
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
        	'title'         => __('Materiale de Informare', 'cmb2'),
        	'object_types'  => array(App::POST_TYPE_CAMPAIGN),
        	//'context'       => 'side',
        	'show_names'    => true
        ));

        $cmb_campaign->add_field(array(
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

        $campaign_video_group_id = $cmb_campaign->add_field( array(
        	'id' => App::CAMPAIGN_METABOX_VIDEO_GROUP,
        	'type' => 'group',
        	'description' => __('Listă materiale video (YouTube/Vimeo/etc.)', 'cmb2' ),
        	'options'     => array(
        		'group_title'   => __('Video {#}', 'cmb2'), // since version 1.1.4, {#} gets replaced by row number
        		'add_button'    => __('Adaugă video', 'cmb2'),
        		'remove_button' => __('Șterge video', 'cmb2'),
        		'sortable'      => false, // beta
        		//'closed'     => true, // true to have the groups closed by default
        	),
        ));

        $cmb_campaign->add_group_field(
          $campaign_video_group_id,
          array(
          	'name' => 'Titlu video',
          	'id'   => 'title',
          	'type' => 'text',
          	// 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
          )
        );

        $cmb_campaign->add_group_field(
          $campaign_video_group_id,
          array(
          	'name' => 'URL video',
          	'id'   => 'video_oembed',
          	'type' => 'oembed',
          	// 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
          )
        );


        // Custom Despre meta box
        $cmb_parteneri = new_cmb2_box(array(
        	'id' => 'parteneri_despre',
        	'title' => __('Parteneri', 'cmb2'),
        	'object_types' => array('page'),
          'show_on' => array(
            'key' => 'slug',
            'value' => 'despre',
          ),
        	'context'       => 'advanced',
        ));

        $cmb_parteneri->add_field(array(
          'name' => 'Descriere toți partenerii',
          'id'   => App::ABOUT_PAGE_METABOX_PARTNER_DESC,
          'type' => 'wysiwyg',
          'options' => array(
            'wpautop' => true,
            'media_buttons' => false,
            'teeny' => true,
          )
        ));

        $parteneri_group_id = $cmb_parteneri->add_field(array(
        	'id' => App::ABOUT_PAGE_METABOX_PARTNERS,
        	'type' => 'group',
        	'description' => __('Secțiune parteneri', 'cmb2' ),
        	'options'     => array(
        		'group_title'   => __('Partener {#}', 'cmb2'),
        		'add_button'    => __('Adaugă partener', 'cmb2'),
        		'remove_button' => __('Șterge partener', 'cmb2'),
        		'sortable'      => false,
        	),
        ));

        $cmb_parteneri->add_group_field(
          $parteneri_group_id,
          array(
          	'name' => 'Logo partener',
          	'id'   => 'logo_partener',
          	'type' => 'file',
            'options' => array(
              'url' => false,
            ),
            'text' => array(
              'add_upload_file_text' => 'Adaugă logo',
            ),
            'query_args' => array(
              'type' => array(
                'image/gif',
                'image/jpeg',
                'image/png',
              ),
            ),
            'preview_size' => 'medium'
          )
        );

        $cmb_parteneri->add_group_field(
          $parteneri_group_id,
          array(
          	'name' => 'Descriere partener',
          	'id'   => 'descriere_partener',
          	'type' => 'wysiwyg',
            'options' => array(
              'wpautop' => true,
              'media_buttons' => false,
              'teeny' => true,
            )
          )
        );
      };

      add_action( 'cmb2_admin_init', $custom_boxes_init);
    }
}
