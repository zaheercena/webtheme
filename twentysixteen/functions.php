<?php

 //Integrating options
 add_filter('ot_theme_mode', '__return_true');

//Activating Option tree
require_once(get_template_directory().'/inc/theme-options/option-tree/ot-loader.php');
/**
 * Loads Theme Options
*/
require( trailingslashit( get_template_directory() ) . 'inc/theme-options.php' );

 //Custom Comtrols Theme Options
//require get_template_directory() . '/inc/function-admin.php';

 function tarz_script_enqueue() {
	//css
	//wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.7', 'all');
	//wp_enqueue_style('customstyle', get_template_directory_uri() . '/css/bootstrap.css', array(), '1.0.0', 'all');
	wp_enqueue_style('customstyle', get_template_directory_uri() . '/css/bootstrap-extended.css', array(), '1.0.0', 'all');
	//wp_enqueue_style('customstyle', get_template_directory_uri() . '/css/awesome.css', array(), '1.0.0', 'all');
	//js
	///////wp_enqueue_script('jquery.min.js');
	wp_enqueue_script('bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.3.4', true);
	wp_enqueue_script('jqueryjs', get_template_directory_uri() . '/js/jquery.main.js', array(), '', true);
	//wp_enqueue_script('jqueryminjs', get_template_directory_uri() . '/js/jquery-1.12.4.min.js', array(), '1.12.4', true);

	//wp_enqueue_script('customjs', get_template_directory_uri() . '/js/awesome.js', array(), '1.0.0', true);
}
add_action( 'wp_enqueue_scripts', 'tarz_script_enqueue');

 /*
	==========================================
	 Activate menus
	==========================================
*/
function tarz_theme_setup() {

  /* Galary Slider*/
  add_theme_support( 'wc-product-gallery-slider' );
  /* This is Gallery Show */
  add_theme_support( 'wc-product-gallery-lightbox' );
  /* Custom Logo*/
  add_theme_support( 'custom-logo' );

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
 		 'name' => 'SlideCust',
 		 'singular_name' => 'SlideCust',
 		 'add_new' => 'Add Slide',
 		 'all_items' => 'All Slide',
 		 'add_new_item' => 'Add New',
 		 'edit_item' => 'Edit Slide',
 		 'new_item' => 'New Slide',
 		 'view_item' => 'View Slide',
 		 'search_item' => 'Search Slide',
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
     //'rewrite' => array('slug' => 'slide', 'with_front' => FALSE)
 	  );
 		register_post_type('slidecust', $args);
  }
  add_action('init', 'awesome_custom_post_type');


/*
This is Slider Support functions
*/
function blm_init_method() {
    wp_enqueue_script('jquery');
    wp_enqueue_script( 'slides', get_template_directory_uri().'/js/slides.min.jquery.js', array( 'jquery' ) );

}
add_action('wp_enqueue_scripts', 'blm_init_method');

/*  End Slider Support Functions */

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
  register_taxonomy('genre', array('slide'), $args);

 	 //add new taxonomu NOT hierarchical
 	 register_taxonomy('macs', 'slidecust', array(
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



 /**
  * Add Cart icon and count to header if WC is active
  */
 function my_wc_cart_count() {

     if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

         $count = WC()->cart->cart_contents_count;
         ?><a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><?php
         if ( $count > 0 ) {
             ?>
             <span class="cart-contents-count"><?php echo esc_html( $count ); ?></span>
             <?php
         }
                 ?></a><?php
     }

 }
 add_action( 'your_theme_header_top', 'my_wc_cart_count' );

 /**
 * Ensure cart contents update when products are added to the cart via AJAX
 */
function my_header_add_to_cart_fragment( $fragments ) {

    ob_start();
    $count = WC()->cart->cart_contents_count;
    ?><a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><?php
    if ( $count > 0 ) {
        ?>
        <span class="cart-contents-count"><?php echo esc_html( $count ); ?></span>
        <?php
    }
        ?></a><?php

    $fragments['a.cart-contents'] = ob_get_clean();

    return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'my_header_add_to_cart_fragment' );



/**
*This is Section Related to Sindle product File Interface.
*/

// define the woocommerce_single_product_summary callback function
// These are actions you can unhook/remove!

/*add_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
add_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );

add_action( 'woocommerce_product_thumbnails', 'woocommerce_show_product_thumbnails', 20 );

add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );

add_action( 'woocommerce_simple_add_to_cart', 'woocommerce_simple_add_to_cart', 30 );
add_action( 'woocommerce_grouped_add_to_cart', 'woocommerce_grouped_add_to_cart', 30 );
add_action( 'woocommerce_variable_add_to_cart', 'woocommerce_variable_add_to_cart', 30 );
add_action( 'woocommerce_external_add_to_cart', 'woocommerce_external_add_to_cart', 30 );
add_action( 'woocommerce_single_variation', 'woocommerce_single_variation', 10 );
add_action( 'woocommerce_single_variation', 'woocommerce_single_variation_add_to_cart_button', 20 );

add_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
add_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
add_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

add_action( 'woocommerce_review_before', 'woocommerce_review_display_gravatar', 10 );
add_action( 'woocommerce_review_before_comment_meta', 'woocommerce_review_display_rating', 10 );
add_action( 'woocommerce_review_meta', 'woocommerce_review_display_meta', 10 );
add_action( 'woocommerce_review_comment_text', 'woocommerce_review_display_comment_text', 10 );*/

/** to change the position of excerpt **/




remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
add_action( 'woocommerce_after_single_product', 'woocommerce_output_related_products', 10 );

/*function remove_gallery_and_product_images() {
if ( is_product() ) {
    remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );
    }
}
add_action('template_redirect', 'remove_gallery_and_product_images');
*/

/*
reorder Cart Tab to Bottom of the Description
*/
//remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
//add_action('woocommerce_before_single_product_summary', 'woocommerce_template_single_add_to_cart', 35);


/* To Navigate, Show Original Before single Product Summary */
remove_action( 'woocommerce_product_thumbnails', 'woocommerce_show_product_thumbnails', 20 );
//remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );
