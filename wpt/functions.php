<?php
/*
	==========================================
	 Include scripts
	==========================================
*/
function awesome_script_enqueue() {
	//css
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.4', 'all');
	wp_enqueue_style('customstyle', get_template_directory_uri() . '/css/awesome.css', array(), '1.0.0', 'all');
	//js
	wp_enqueue_script('jquery');
	wp_enqueue_script('bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.3.4', true);
	wp_enqueue_script('customjs', get_template_directory_uri() . '/js/awesome.js', array(), '1.0.0', true);

}

add_action( 'wp_enqueue_scripts', 'awesome_script_enqueue');

/*
	==========================================
	 Activate menus
	==========================================
*/
function awesome_theme_setup() {

	add_theme_support('menus');

	register_nav_menu('primary', 'Primary Header Navigation');
	register_nav_menu('secondary', 'Footer Navigation');

}

add_action('init', 'awesome_theme_setup');

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

/*
	==========================================
	 Sidebar function
	==========================================
*/
function awesome_widget_setup() {

	register_sidebar(
		array(
			'name'	=> 'Sidebar',
			'id'	=> 'sidebar-1',
			'class'	=> 'custom',
			'description' => 'Standard Sidebar',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h1 class="widget-title">',
			'after_title'   => '</h1>',
		)
	);

}
add_action('widgets_init','awesome_widget_setup');

/*
	==========================================
  Error: //You are currently editing the page that shows your latest posts.
	==========================================
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
 	Remove WordPress Version From Our Site.
  ==========================================
 */
 function awesome_remove_version() {
	 return '';
 }
 add_filter('the_generator', 'awesome_remove_version');

 /*
 	==========================================
   Include Walker File.
 	==========================================
 */
 //require get_template_directory(). '/inc/walker.php';

 /*
 	==========================================
 	 Custom Post Type
 	==========================================
 */
 function awesome_custom_post_type() {
	 $labels = array(
		 'name' => 'Property',
		 'singular_name' => 'Property',
		 'add_new' => 'Add Property',
		 'all_items' => 'All Property',
		 'add_new_item' => 'Add Proprety',
		 'edit_item' => 'Edit Property',
		 'new_item' => 'New Property',
		 'view_item' => 'View Property',
		 'search_item' => 'Search Property',
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
		register_post_type('property', $args);
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
		 'name' => 'Area',
		 'singular_name' => 'Area',
		 'search_items' => 'Search Area',
		 'all_types' => 'All Area',
		 'parent_item' => 'Parent Area',
		 'parent_item_colon' => 'Parent Area',
		 'edit_item' => 'Edit Area',
		 'update_item' => 'Update Area',
		 'add_new_item' => 'Add New Area',
		 'new_item_name' => 'New Area Name',
		 'manu_name' => 'Area'
	 );
$args = array(
	'hierarchical' => true,
	'labels' => $labels,
	'show_ui' => true,
	'show_admin_column' => true,
	'query_var' => true,
	'rewrite' => array('slug' => 'area' )
 );
 register_taxonomy('area', array('property'), $args);

	 //add new taxonomu NOT hierarchical
	 register_taxonomy('macs', 'property', array(
	 'label' => 'MACs',
	 'rewrite' => array('slug' => 'macs'),
	 'hierarchical' => false
 ) );
}
add_action('init', 'awesome_custom_taxonomy');

/*
 ==========================================
	Custom Term Function
 ==========================================
*/
function awesome_get_terms($postID, $term){
	$terms_list = wp_get_post_terms($postID, $term);
	$output = '';
	$i=0;
	foreach($terms_list as $term) { $i++;
		if($i>1){ $output .= '--';}
		//$output .= $term->name;
		//$output .= get_term_link($term);
		$output .= '<a href="' . get_term_link($term) . '">'.$term->name .'</a>';
	}
	return $output;
}
