<?php

  // Use composer autoloader
  require_once(__DIR__ . '/vendor/autoload.php');

 /**
  * Sage includes
  *
  * The $sage_includes array determines the code library included in your theme.
  * Add or remove files to the array as needed. Supports child theme overrides.
  *
  * Please note that missing files will produce a fatal error.
  *
  * @link https://github.com/roots/sage/pull/1042
  */

$sage_includes = [
  'lib/assets.php',    // Scripts and stylesheets
  'lib/extras.php',    // Custom functions
  'lib/setup.php',     // Theme setup
  'lib/titles.php',    // Page titles
  'lib/wrapper.php',   // Theme wrapper class
  'lib/customizer.php', // Theme customizer
  'lib/TemplateEngine.php', // Template Engine (Mustache)
  'lib/DashboardGuides.php', // Dashboard Manual

  /* Algolia */
  'lib/Algolia/IndexCustomFields.php',
  'lib/Algolia/GuideIndexCustomFields.php',
  'lib/Algolia/CampaignIndexCustomFields.php',
  'lib/Algolia/AboutIndexCustomFields.php',
  'lib/Algolia/FirstAidIndexCustomFields.php',
  'lib/Algolia/PersonalPlanIndexCustomFields.php',
  'lib/Algolia/NoOpIndexCustomFields.php',

  /* Meta generator */
  'lib/Meta/MetaGenerator.php',
  'lib/Meta/GuideMetaGenerator.php',
  'lib/Meta/CampaignMetaGenerator.php',
  'lib/Meta/FirstAidMetaGenerator.php',
  'lib/Meta/PersonalPlanMetaGenerator.php',
  '/lib/Meta/AboutMetaGenerator.php',
  '/lib/Meta/GenericMetaGenerator.php',

  'lib/Meta/Decorators/BaseDecorator.php',
  'lib/Meta/Decorators/OpenGraphMetaDecorator.php',

  'lib/Meta/constants/MetaCategories.php',

  'lib/Meta/constants/OpenGraph/OpenGraphArticleAttributes.php',
  'lib/Meta/constants/OpenGraph/OpenGraphImageAttributes.php',
  'lib/Meta/constants/OpenGraph/OpenGraphMetaCategory.php',

  'lib/Meta/constants/Meta/MetaMetaCategory.php',

  'lib/Meta/constants/Common/CommonMetaCategory.php',
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);

/**
 * Schimbă mesajul default "Howdy, Joe" din dreapta-sus
 */
function change_howdy($translated, $text, $domain) {

    if (!is_admin() || 'default' != $domain)
        return $translated;

    if (false !== strpos($translated, 'Howdy'))
        return str_replace('Howdy', 'Welcome', $translated);

    return $translated;
}
add_filter('gettext', 'change_howdy', 10, 3);

/**
 * Scoate widget-urile din dashboard pentru toată lumea în afară de admini
 */
function remove_dashboard_widgets() {
  global $wp_meta_boxes;

  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_drafts']);
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);
}

add_action('wp_dashboard_setup', 'remove_dashboard_widgets' );

$dashboardCallback = function() {
  return DashboardGuides::get()->render();
};

add_action('wp_dashboard_setup', $dashboardCallback);

/**
 * Scoate meniurile din sidebar pentru toată lumea în afară de admini
 */
function remove_menus() {
  if (!is_admin()) {
    remove_menu_page('tools.php'); // Tools
    remove_menu_page('edit.php'); // Posts
    remove_menu_page('edit_comments.php'); // Comments
    remove_menu_page('edit.php?post_type=page'); // Pages
    remove_menu_page('themes.php'); // Themes
  }
}
add_action( 'admin_menu', 'remove_menus');

/**
 * Scoate opțiunile din bara de sus (admin panel)
 */
add_action('admin_bar_menu', 'remove_wp_nodes', 999);
function remove_wp_nodes() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_node( 'new-post' );
    $wp_admin_bar->remove_node( 'new-link' );
    $wp_admin_bar->remove_node( 'new-page' );
}

/**
 * Schimbă mesajul din footer cu unul customizat
 */
function remove_footer_admin() {
    echo '<span id="footer-thankyou">Realizat cu sprijinul <a href="http://www.civictech.ro" target="_blank">CivicTech România</a></span>';
}
add_filter('admin_footer_text', 'remove_footer_admin');

/**
 * Modifică pagina de login cu link și logo-ul DSU
 */
use Roots\Sage\Assets;
function my_login_logo() {
  $asset_path = Assets\asset_path('images/Logo_DSU.svg');
  ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
          background-image:
            url(<?=$asset_path?>);
          height:80px;
          width:100%;
          background-size: contain;
          background-repeat: no-repeat;
        	padding-bottom: 30px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
  return 'fiipregătit.ro';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );

/**
 *  Algolia index
 */
$algoliaAttributesCallback = function(array $attributes, WP_Post $post) {
  return IndexCustomFields::get($post, $attributes)->index();
};

// https://www.algolia.com/doc/api-reference/settings-api-parameters/
$algoliaSettingsCallback = function(array $settings) {
  return array(
    'searchableAttributes' => array(
      'unordered(title)',
      'unordered(content)',
    ),
    'attributesToRetrieve' => array(
      'type',
      'title',
      'content',
      'image',
      'permalink',
      'weight',
    ),
    'customRanking' => array(
        'desc(weight)',
        'desc(post_date)',
    ),
    'attributeForDistinct'  => 'post_id',
    'distinct'              => true,
    'attributesForFaceting' => array(),
    'attributesToSnippet' => array(
        'title:30',
        'content:30',
    ),
    'snippetEllipsisText' => '…',
  );
};

add_filter('algolia_post_shared_attributes', $algoliaAttributesCallback, 10, 2);
add_filter('algolia_searchable_post_shared_attributes', $algoliaAttributesCallback, 10, 2);
add_filter( 'algolia_posts_index_settings', $algoliaSettingsCallback);

$algoliaContentCallback = function(string $post_content, WP_Post $post) {
  return IndexCustomFields::get($post)->getContent();
};

add_filter('algolia_searchable_post_content', $algoliaContentCallback, 10, 2);
add_filter('algolia_post_content', $algoliaContentCallback, 10, 2);

function enable_extended_upload ($mime_types =array() ) {
  $mime_types['svg']  = 'image/svg+xml';
  return $mime_types;

}
add_filter('upload_mimes', 'enable_extended_upload');

function homepage_link_custom_menu_filter($items, $args) {
    if ($args->theme_location === 'main_navigation') {
        $home = '<li class="menu-item homepage_item">
          <a href="' . esc_url(get_home_url('/')) . '" title="'.esc_attr(get_bloginfo('name', 'display')).'">
            <i class="fas fa-home"></i>
          </a></li>';
        $items = $home . $items;
    }

    return $items;
}
add_filter('wp_nav_menu_items', 'homepage_link_custom_menu_filter', 10, 2);

function be_metabox_show_on_slug( $display, $meta_box ) {
	if ( ! isset( $meta_box['show_on']['key'], $meta_box['show_on']['value'] ) ) {
		return $display;
	}

	if ( 'slug' !== $meta_box['show_on']['key'] ) {
		return $display;
	}

	$post_id = 0;

	// If we're showing it based on ID, get the current ID
	if ( isset( $_GET['post'] ) ) {
		$post_id = $_GET['post'];
	} elseif ( isset( $_POST['post_ID'] ) ) {
		$post_id = $_POST['post_ID'];
	}

	if ( ! $post_id ) {
		return $display;
	}

	$slug = get_post( $post_id )->post_name;

	// See if there's a match
	return in_array( $slug, (array) $meta_box['show_on']['value']);
}
add_filter( 'cmb2_show_on', 'be_metabox_show_on_slug', 10, 2 );
