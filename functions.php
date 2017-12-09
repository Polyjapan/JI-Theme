<?php

// Load CSS and JS
function jitheme_enqueue_styles() {
  wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
  wp_enqueue_style( 'ji-style', get_stylesheet_uri());
}

function jitheme_enqueue_scripts() {
  wp_enqueue_script( 'jquery', get_template_directory_uri() . '/assets/js/jquery-3.2.1.min.js');
  wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js');
  wp_enqueue_script( 'ji-countdown', get_template_directory_uri() . '/assets/js/countdown.js');
}
add_action( 'wp_enqueue_scripts', 'jitheme_enqueue_styles' );
add_action( 'wp_enqueue_scripts', 'jitheme_enqueue_scripts' );

// Register the nav
function register_my_menu() {
  register_nav_menu('header-menu',__( 'Nav Menu' ));
  register_nav_menu('footer-menu',__( 'Footer Menu' ));
}
add_action( 'init', 'register_my_menu' );

// Customization
$args_header = array(
  'width'         => 700,
  'height'        => 900,
  'default-image' => get_template_directory_uri() . 'assets/images/default-header.jpg',
);
add_theme_support( 'custom-header', $args_header );

$args_logo = array(
  'width'         => 300,
  'height'        => 50,
);
add_theme_support( 'custom-logo', $args_logo );

// Misc
function get_logo_url() {
  $custom_logo_id = get_theme_mod( 'custom_logo' );
  $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
  echo $image[0];
}

// Theme panel
function theme_settings_page()
{
  ?>
  <div class="wrap">
    <h1>Theme Panel</h1>
    <form method="post" action="options.php">
    <?php
      settings_fields("section");
      do_settings_sections("theme-options");      
      submit_button(); 
    ?>
    </form>
  </div>
  <?php
}

function add_theme_menu_item()
{
  add_menu_page("Theme Panel", "Theme Panel", "manage_options", "theme-panel", "theme_settings_page", null, 99);
}

function display_twitter_element()
{
    ?>
      <input type="text" name="twitter_url" id="twitter_url" value="<?php echo get_option('twitter_url'); ?>" />
    <?php
}

function display_facebook_element()
{
    ?>
      <input type="text" name="facebook_url" id="facebook_url" value="<?php echo get_option('facebook_url'); ?>" />
    <?php
}

function display_youtube_element()
{
    ?>
      <input type="text" name="youtube_url" id="youtube_url" value="<?php echo get_option('youtube_url'); ?>" />
    <?php
}

function display_polyjapan_element()
{
    ?>
      <input type="text" name="polyjapan_url" id="polyjapan_url" value="<?php echo get_option('polyjapan_url'); ?>" />
    <?php
}

/**
 * Organise le menu demandé dans un array comme cela :
 * Array ( [145] => Array ( [name] => Éditions Précédentes
 * [url] => http://127.0.0.1/wordpress/?page_id=42 )
 * [141] => Array ( [name] => horaire
 * [url] => http://127.0.0.1/wordpress/?page_id=131 )
 * [143] => Array ( [name] => Comité
 * [url] => http://127.0.0.1/wordpress/?page_id=44
 * [0] => Comité 2010
 * [1] => Comité 2009 )
 * )
 *
 * @param $menu_name string le nom du menu
 * @return array le menu trié comme indiqué dans la description de la méthode, ou un tableau vide si le
 * menu n'existe pas
 */
function get_menu($menu_name) {
    if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {

        $menu_array = array();
        $menu = wp_get_nav_menu_object($locations[$menu_name]);

        $menu_items = wp_get_nav_menu_items($menu->term_id);

        foreach ((array)$menu_items as $key => $menu_item) {
            $title = $menu_item->title;
            $url = $menu_item->url;
            $id = $menu_item->ID;
            $id_parent = $menu_item->menu_item_parent;
            // $post_par = $menu_item->post_parent;
            if ($id_parent == 0) // si c'est un parent
            {
                $menu_array[$id] = array();
                $menu_array[$id]['name'] = $title;
                $menu_array[$id]['url'] = $url;
            } else // c'est un enfant
            {
                $item = '<a href="' . $url . '">' . $title . '</a>';
                array_push($menu_array[$id_parent], $item);
            }
        }

        return $menu_array;
    } else {
        return array();
    }
}


function display_theme_panel_fields()
{
  add_settings_section("section", "All Settings", null, "theme-options");

  add_settings_field("twitter_url", "Social : Twitter URL", "display_twitter_element", "theme-options", "section");
  add_settings_field("facebook_url", "Social : Facebook URL", "display_facebook_element", "theme-options", "section");
  add_settings_field("youtube_url", "Social : Youtube URL", "display_youtube_element", "theme-options", "section");
  add_settings_field("polyjapan_url", "Social : PolyJapan URL", "display_polyjapan_element", "theme-options", "section");

  register_setting("section", "twitter_url");
  register_setting("section", "facebook_url");
  register_setting("section", "youtube_url");
  register_setting("section", "polyjapan_url");
}

add_action("admin_init", "display_theme_panel_fields");

add_action("admin_menu", "add_theme_menu_item");

?>
