<?php
/*
	==========================================
	 Include scripts
	==========================================
*/
function awesome_script_enqueue() {
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
//add_action('widgets_init','awesome_widget_setup');

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






//This is Thgeme 15's Function.php
if ( version_compare( $GLOBALS['wp_version'], '4.4-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'twentysixteen_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * Create your own twentysixteen_setup() function to override in a child theme.
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/twentysixteen
	 * If you're building a theme based on Twenty Sixteen, use a find and replace
	 * to change 'twentysixteen' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'twentysixteen' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for custom logo.
	 *
	 *  @since Twenty Sixteen 1.2
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'post-description' );
	set_post_thumbnail_size( 150, 150 );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'twentysixteen' ),
		'social'  => __( 'Social Links Menu', 'twentysixteen' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'status',
		'audio',
		'chat',
	) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', twentysixteen_fonts_url() ) );

	// Indicate widget sidebars can use selective refresh in the Customizer.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif; // twentysixteen_setup
add_action( 'after_setup_theme', 'twentysixteen_setup' );

/**
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'twentysixteen_content_width', 840 );
}
add_action( 'after_setup_theme', 'twentysixteen_content_width', 0 );

/**
 * Registers a widget area.
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'twentysixteen' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'twentysixteen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Content Bottom 1', 'twentysixteen' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'twentysixteen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Content Bottom 2', 'twentysixteen' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'twentysixteen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'twentysixteen_widgets_init' );

if ( ! function_exists( 'twentysixteen_fonts_url' ) ) :
/**
 * Register Google fonts for Twenty Sixteen.
 *
 * Create your own twentysixteen_fonts_url() function to override in a child theme.
 *
 * @since Twenty Sixteen 1.0
 *
 * @return string Google fonts URL for the theme.
 */
function twentysixteen_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Merriweather font: on or off', 'twentysixteen' ) ) {
		$fonts[] = 'Merriweather:400,700,900,400italic,700italic,900italic';
	}

	/* translators: If there are characters in your language that are not supported by Montserrat, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'twentysixteen' ) ) {
		$fonts[] = 'Montserrat:400,700';
	}

	/* translators: If there are characters in your language that are not supported by Inconsolata, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Inconsolata font: on or off', 'twentysixteen' ) ) {
		$fonts[] = 'Inconsolata:400';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'twentysixteen_javascript_detection', 0 );

/**
 * Enqueues scripts and styles.
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'twentysixteen-fonts', twentysixteen_fonts_url(), array(), null );

	// Add Genericons, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.4.1' );

	// Theme stylesheet.
	wp_enqueue_style( 'twentysixteen-style', get_stylesheet_uri() );

	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'twentysixteen-ie', get_template_directory_uri() . '/css/ie.css', array( 'twentysixteen-style' ), '20160816' );
	wp_style_add_data( 'twentysixteen-ie', 'conditional', 'lt IE 10' );

	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'twentysixteen-ie8', get_template_directory_uri() . '/css/ie8.css', array( 'twentysixteen-style' ), '20160816' );
	wp_style_add_data( 'twentysixteen-ie8', 'conditional', 'lt IE 9' );

	// Load the Internet Explorer 7 specific stylesheet.
	wp_enqueue_style( 'twentysixteen-ie7', get_template_directory_uri() . '/css/ie7.css', array( 'twentysixteen-style' ), '20160816' );
	wp_style_add_data( 'twentysixteen-ie7', 'conditional', 'lt IE 8' );

	// Load the html5 shiv.
	wp_enqueue_script( 'twentysixteen-html5', get_template_directory_uri() . '/js/html5.js', array(), '3.7.3' );
	wp_script_add_data( 'twentysixteen-html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'twentysixteen-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20160816', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'twentysixteen-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20160816' );
	}

	wp_enqueue_script( 'twentysixteen-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20160816', true );

	wp_localize_script( 'twentysixteen-script', 'screenReaderText', array(
		'expand'   => __( 'expand child menu', 'twentysixteen' ),
		'collapse' => __( 'collapse child menu', 'twentysixteen' ),
	) );
}
add_action( 'wp_enqueue_scripts', 'twentysixteen_scripts' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @since Twenty Sixteen 1.0
 *
 * @param array $classes Classes for the body element.
 * @return array (Maybe) filtered body classes.
 */
function twentysixteen_body_classes( $classes ) {
	// Adds a class of custom-background-image to sites with a custom background image.
	if ( get_background_image() ) {
		$classes[] = 'custom-background-image';
	}

	// Adds a class of group-blog to sites with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of no-sidebar to sites without active sidebar.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'twentysixteen_body_classes' );

/**
 * Converts a HEX value to RGB.
 *
 * @since Twenty Sixteen 1.0
 *
 * @param string $color The original color, in 3- or 6-digit hexadecimal form.
 * @return array Array containing RGB (red, green, and blue) values for the given
 *               HEX code, empty array otherwise.
 */
function twentysixteen_hex2rgb( $color ) {
	$color = trim( $color, '#' );

	if ( strlen( $color ) === 3 ) {
		$r = hexdec( substr( $color, 0, 1 ).substr( $color, 0, 1 ) );
		$g = hexdec( substr( $color, 1, 1 ).substr( $color, 1, 1 ) );
		$b = hexdec( substr( $color, 2, 1 ).substr( $color, 2, 1 ) );
	} else if ( strlen( $color ) === 6 ) {
		$r = hexdec( substr( $color, 0, 2 ) );
		$g = hexdec( substr( $color, 2, 2 ) );
		$b = hexdec( substr( $color, 4, 2 ) );
	} else {
		return array();
	}

	return array( 'red' => $r, 'green' => $g, 'blue' => $b );
}

/**
 * Custom template tags for this theme.
 */
//require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
//require get_template_directory() . '/inc/customizer.php';

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images
 *
 * @since Twenty Sixteen 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function twentysixteen_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];

	if ( 840 <= $width ) {
		$sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 62vw, 840px';
	}

	if ( 'page' === get_post_type() ) {
		if ( 840 > $width ) {
			$sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
		}
	} else {
		if ( 840 > $width && 600 <= $width ) {
			$sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 61vw, (max-width: 1362px) 45vw, 600px';
		} elseif ( 600 > $width ) {
			$sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
		}
	}

	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'twentysixteen_content_image_sizes_attr', 10 , 2 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails
 *
 * @since Twenty Sixteen 1.0
 *
 * @param array $attr Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size Registered image size or flat array of height and width dimensions.
 * @return array The filtered attributes for the image markup.
 */
function twentysixteen_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( 'post-thumbnail' === $size ) {
		if ( is_active_sidebar( 'sidebar-1' ) ) {
			$attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 60vw, (max-width: 1362px) 62vw, 840px';
		} else {
			$attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 88vw, 1200px';
		}
	}
	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'twentysixteen_post_thumbnail_sizes_attr', 10 , 3 );

/**
 * Modifies tag cloud widget arguments to display all tags in the same font size
 * and use list format for better accessibility.
 *
 * @since Twenty Sixteen 1.1
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array The filtered arguments for tag cloud widget.
 */
function twentysixteen_widget_tag_cloud_args( $args ) {
	$args['largest']  = 1;
	$args['smallest'] = 1;
	$args['unit']     = 'em';
	$args['format']   = 'list';

	return $args;
}
add_filter( 'widget_tag_cloud_args', 'twentysixteen_widget_tag_cloud_args' );


/*
 ==========================================
Category Get Function
 ==========================================
*/

add_action('admin_head', 'wpds_admin_head');
add_action('edit_term', 'wpds_save_tax_pic');
add_action('create_term', 'wpds_save_tax_pic');
function wpds_admin_head() {
$taxonomies = get_taxonomies();
//$taxonomies = array('category'); // uncomment and specify particular taxonomies you want to add image feature.
if (is_array($taxonomies)) {
    foreach ($taxonomies as $z_taxonomy) {
        add_action($z_taxonomy . '_add_form_fields', 'wpds_tax_field');
        add_action($z_taxonomy . '_edit_form_fields', 'wpds_tax_field');
    }
}
}

// add image field in add form
function wpds_tax_field($taxonomy) {
wp_enqueue_style('thickbox');
wp_enqueue_script('thickbox');
if(empty($taxonomy)) {
    echo '<div class="form-field">
            <label for="wpds_tax_pic">Picture</label>
            <input type="text" name="wpds_tax_pic" id="wpds_tax_pic" value="" />
        </div>';
}
else{
    $wpds_tax_pic_url = get_option('wpds_tax_pic' . $taxonomy->term_id);
    echo '<tr class="form-field">
    <th scope="row" valign="top"><label for="wpds_tax_pic">Picture</label></th>
    <td><input type="text" name="wpds_tax_pic" id="wpds_tax_pic" value="' . $wpds_tax_pic_url . '" /><br />';
    if(!empty($wpds_tax_pic_url))
        echo '<img src="'.$wpds_tax_pic_url.'" style="max-width:200px;border: 1px solid #ccc;padding: 5px;box-shadow: 5px 5px 10px #ccc;margin-top: 10px;" >';
    echo '</td></tr>';
}
echo '<script type="text/javascript">
    jQuery(document).ready(function() {
            jQuery("#wpds_tax_pic").click(function() {
                tb_show("", "media-upload.php?type=image&amp;TB_iframe=true");
                return false;
            });
            window.send_to_editor = function(html) {
                jQuery("#wpds_tax_pic").val( jQuery("img",html).attr("src") );
                tb_remove();
            }
    });
</script>';
}

// save our taxonomy image while edit or save term
function wpds_save_tax_pic($term_id) {
if (isset($_POST['wpds_tax_pic']))
    update_option('wpds_tax_pic' . $term_id, $_POST['wpds_tax_pic']);
}

// output taxonomy image url for the given term_id (NULL by default)
function wpds_tax_pic_url($term_id = NULL) {
if ($term_id)
    return get_option('wpds_tax_pic' . $term_id);
elseif (is_category())
    return get_option('wpds_tax_pic' . get_query_var('cat')) ;
elseif (is_tax()) {
    $current_term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
    return get_option('wpds_tax_pic' . $current_term->term_id);
}
}



/*
 ==========================================
Category Get Function
 ==========================================
*/

function wpse135208_cat_thumb_from_random_child( $c_cat = '', $size = 'post-thumbnail', $attr = null ) {
    // do nothing if $c_cat is empty
    if( empty($c_cat) ) return;
    // get_terms is used because we only need ids
    $taxonomies = array(
        'category'
        );
    $args = array(
        'child_of' => $c_cat,
        'fields' => 'ids'
        );
    // returns an array of ids
    $child_cats = get_terms( $taxonomies, $args );
    // use this for debugging
    //echo '<pre>'; print_r($child_cats); echo '</pre>';

    $args = array(
        // we use numberposts instead of post_per_page,
        // because if the pre_get_posts filter is used,
        // it can make a difference in this case
        // we only want one post
        'numberposts' => 1,
        // but we randomize this
        'orderby' => 'rand',
        'category__in' => $child_cats,
        'fields' => 'ids',
        // make sure only posts with featured image are considered
        'meta_query' => array(
            array(
                'key' => '_thumbnail_id',
                'compare' => 'EXISTS'
            )
        )
        );
    // returns an array containing one post id
    $ct_p_id = get_posts( $args );
    // use this for debugging
    //echo '<pre>'; print_r($ct_p_id); echo '</pre>';

    // use this for debugging
    //echo '<pre>'; print_r( ( 1 /*change to 0 to show src info*/ ) ? get_the_post_thumbnail( $ct_p_id[0], $size, $attr ) : wp_get_attachment_image_src( get_post_thumbnail_id( $ct_p_id[0] ) ) ); echo '</pre>';
    // now we can use this to return our thumbnail
    return get_the_post_thumbnail( $ct_p_id[0], $size, $attr );
}




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
