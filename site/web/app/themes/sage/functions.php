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
  'lib/TemplateEngine.php'
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
}
if (!current_user_can('manage_options')) {
  add_action('wp_dashboard_setup', 'remove_dashboard_widgets' );
}

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
function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
          background-image:
            url(<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png);
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
