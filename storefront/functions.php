<?php
/**
 * Storefront engine room
 *
 * @package storefront
 */


 function tarz_script_enqueue() {
	//css
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.4', 'all');
	//wp_enqueue_style('customstyle', get_template_directory_uri() . '/css/bootstrap.css', array(), '1.0.0', 'all');
	wp_enqueue_style('customstyle', get_template_directory_uri() . '/css/bootstrap-extended.css', array(), '1.0.0', 'all');
	//wp_enqueue_style('customstyle', get_template_directory_uri() . '/css/awesome.css', array(), '1.0.0', 'all');
	//js
	wp_enqueue_script('jquery.min.js');
	wp_enqueue_script('bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.3.4', true);
	wp_enqueue_script('bootstrapjs', get_template_directory_uri() . '/js/jquery.main.js', array(), '', true);
	wp_enqueue_script('bootstrapjs', get_template_directory_uri() . '/js/jquery-1.12.4.min.js', array(), '1.12.4', true);
	wp_enqueue_script('customjs', get_template_directory_uri() . '/js/awesome.js', array(), '1.0.0', true);
}
add_action( 'wp_enqueue_scripts', 'tarz_script_enqueue');


function h5bs_enqueue_styles() {
 //js
 wp_register_style('flexslider', get_template_directory_uri() . '/css/flexslider.css', array(''), '2.6.4');

 wp_enqueue_style('flexslider');
}
add_action( 'wp_enqueue_scripts', 'h5bs_enqueue_styles');


function h5bs_enqueue_scripts() {
 //js
 wp_register_script('flexslider', get_template_directory_uri() . '/js/jquery.flexslider.min.js', array('jquery'), '2.6.4', true);

 wp_enqueue_script('flexslider');
}
add_action( 'wp_enqueue_scripts', 'h5bs_enqueue_scripts');




 /*
	==========================================
	 Activate menus
	==========================================
*/
function tarz_theme_setup() {
	add_theme_support('menus');
	register_nav_menu('primary', 'Primary Header Navigation');
	register_nav_menu('secondary', 'Footer Navigation');
  register_nav_menus(array('main_menu' => 'Main Menu'));

}
add_action('init', 'tarz_theme_setup');


/**
 * Allow Error: ||You are currently editing the page that shows your latest posts.||
 */
 function fix_no_editor_on_posts_page($post) {

   if( $post->ID != get_option( 'page_for_posts' ) ) { return; }

   remove_action( 'edit_form_after_title', '_wp_posts_page_notice' );
   add_post_type_support( 'page', 'editor' );

 }

 // This is applied in a namespaced file - so amend this if you're not namespacing
 add_action( 'edit_form_after_title', __NAMESPACE__ . '\\fix_no_editor_on_posts_page', 0 );





 /*
	==========================================
	 Theme support function
	==========================================
*/
add_theme_support('custom-background');
add_theme_support('custom-header');
add_theme_support('post-thumbnails');

add_theme_support('post-formats',array('aside','image','video'));
add_theme_support('html5',array('search-form'));





/**
 * Assign the Storefront version to a var
 */
$theme              = wp_get_theme( 'storefront' );
$storefront_version = $theme['Version'];

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 980; /* pixels */
}

$storefront = (object) array(
	'version' => $storefront_version,

	/**
	 * Initialize all the things.
	 */
	'main'       => require 'inc/class-storefront.php',
	'customizer' => require 'inc/customizer/class-storefront-customizer.php',
);

require 'inc/storefront-functions.php';
require 'inc/storefront-template-hooks.php';
require 'inc/storefront-template-functions.php';

if ( class_exists( 'Jetpack' ) ) {
	$storefront->jetpack = require 'inc/jetpack/class-storefront-jetpack.php';
}

if ( storefront_is_woocommerce_activated() ) {
	$storefront->woocommerce = require 'inc/woocommerce/class-storefront-woocommerce.php';

	require 'inc/woocommerce/storefront-woocommerce-template-hooks.php';
	require 'inc/woocommerce/storefront-woocommerce-template-functions.php';
}

if ( is_admin() ) {
	$storefront->admin = require 'inc/admin/class-storefront-admin.php';

	require 'inc/admin/class-storefront-plugin-install.php';
}

/**
 * NUX
 * Only load if wp version is 4.7.3 or above because of this issue;
 * https://core.trac.wordpress.org/ticket/39610?cversion=1&cnum_hist=2
 */
if ( version_compare( get_bloginfo( 'version' ), '4.7.3', '>=' ) && ( is_admin() || is_customize_preview() ) ) {
	require 'inc/nux/class-storefront-nux-admin.php';
	require 'inc/nux/class-storefront-nux-guided-tour.php';

	if ( defined( 'WC_VERSION' ) && version_compare( WC_VERSION, '3.0.0', '>=' ) ) {
		require 'inc/nux/class-storefront-nux-starter-content.php';
	}
}

/**
 * Note: Do not add any custom code here. Please use a custom plugin so that your customizations aren't lost during updates.
 * https://github.com/woocommerce/theme-customisations
 */





  /*
  	==========================================
  	 Custom Post Type
  	==========================================
  */
  function awesome_custom_post_type() {
 	 $labels = array(
 		 'name' => 'Slider',
 		 'singular_name' => 'Slider',
 		 'add_new' => 'Add Slide',
 		 'all_items' => 'All Slider',
 		 'add_new_item' => 'Add Slider',
 		 'edit_item' => 'Edit Slider',
 		 'new_item' => 'New Slider',
 		 'view_item' => 'View Slider',
 		 'search_item' => 'Search Slider',
 		 'not_found' => 'Not Found',
 		 'not_found_in_trash' => 'Not Found in Trash',
 		 'parent_item_colon' => 'Parent Item'
 	 );
 	 $args = array(
 		 'labels' => $labels,
 		 'public' => true,
 		 'has_archive' => true,
 		 'publicaly_queryable' => true,
 		 'query_var' => true,
 		 'rewrite' => true,
 		 'capability_type' => 'post',
 		 'hierarchical' => false,
 		 'supports' => array(
 			 'title',
 			 'editor',
 			 'excerpt',
 			 'thumbnail',
 			 'revisions',
 		 ),
 		 //'taxonomies' => array('category', 'post_tag'),
 		 'menu_position' => 5,
 		 'exclude_from_search' => false
 	  );
 		register_post_type('slider', $args);
  }
  add_action('init', 'awesome_custom_post_type');


  /*
  	==========================================
  	 Custom Taxonomy for Custom Post
  	==========================================
  */
  function awesome_custom_taxonomy() {
 	 //add new taxonomy hierarchical
 	 $labels = array(
 		 'name' => 'Genre',
 		 'singular_name' => 'Genre',
 		 'search_items' => 'Search Genre',
 		 'all_types' => 'All Genre',
 		 'parent_item' => 'Parent Genre',
 		 'parent_item_colon' => 'Parent Genre',
 		 'edit_item' => 'Edit Genre',
 		 'update_item' => 'Update Genre',
 		 'add_new_item' => 'Add New Genre',
 		 'new_item_name' => 'New Genre Name',
 		 'manu_name' => 'Genre'
 	 );
 $args = array(
 	'hierarchical' => true,
 	'labels' => $labels,
 	'show_ui' => true,
 	'show_admin_column' => true,
 	'query_var' => true,
 	'rewrite' => array('slug' => 'genre' )
  );
  register_taxonomy('genre', array('slider'), $args);

 	 //add new taxonomu NOT hierarchical
 	 register_taxonomy('macs', 'slider', array(
 	 'label' => 'MACs',
 	 'rewrite' => array('slug' => 'macs'),
 	 'hierarchical' => false
  ) );
 }
 add_action('init', 'awesome_custom_taxonomy');


 /*
 *Multiple menus
 */

 function register_my_menus() {
   register_nav_menus(
     array(
       'new-menu' => __( 'New Menu' ),
       'another-menu' => __( 'Another Menu' ),
       'an-extra-menu' => __( 'An Extra Menu' )
     )
   );
 }
 add_action( 'init', 'register_my_menus' );
