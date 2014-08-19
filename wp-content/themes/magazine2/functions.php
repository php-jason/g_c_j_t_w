<?php

/* Sets up defaults fashion magazine theme features */
function tm_fashion_magazine_setup() 
{
	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// This theme uses a custom image size for featured images
	add_theme_support('post-thumbnails');
	add_image_size('img68', 68, 68, true);
	add_image_size('img100', 100, 90, true);
	add_image_size('img235', 235, 134, true);
	add_image_size('img371', 371, 270, true);
	add_image_size('img297', 300, 172, true);
	add_image_size('img515', 515, 300, true);

	// custom background
	add_theme_support('custom-background');
	
	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Primary Menu', 'fashion_magazine_menu' ) );

	//Widget - List all widget
	register_sidebar(array(
					'name'			=> 'Top Ad 728x90 Widget (Top)',
					'id'			=> 'top-ad-728x90-widget',
					'description'   => 'This widget only show "TM AD 728x90" in top area beside logo.',
					));
	
	register_sidebar(array(
					'name'			=> 'Header Widget (Header)',
					'id'			=> 'header-widget-below-menu',
					'description'   => 'This widget will appears in header area below menu navigation for display "TM BIG SLIDER" and "TM NEWS TICKER" and "TM 4 GRID BOX".',
					));
					
	register_sidebar(array(
					'name'			=> 'Home Left Widget',
					'id'			=> 'center-widget',
					'description'   => 'This widget will appears in Homepage left area.',
					));
	
	register_sidebar(array(
					'name'			=> 'Home Center Widget (sidebar)',
					'id'			=> 'sidebar-widget-left',
					'description'   => 'This widget will appears in Homepage center or middle area.',
					));
					
	register_sidebar(array(
					'name'			=> 'Home Right Widget (sidebar)',
					'id'			=> 'sidebar-widget-right',
					'description'   => 'This widget will appears in Homepage right area.',
					));
	
	register_sidebar(array(
					'name'			=> 'Post Widget Left (Sidebar)',
					'id'			=> 'post-sidebar-widget-left',
					'description'   => 'This widget will appears in Post sidebar left.',
					));
	
	register_sidebar(array(
					'name'			=> 'Post Widget Right (Sidebar)',
					'id'			=> 'post-sidebar-widget-right',
					'description'   => 'This widget will appears in Post sidebar right.',
					));					
					
	register_sidebar(array(
					'name'			=> 'Related Post Widget',
					'id'			=> 'related-post-widdet-position',
					'description'   => 'This widget position only for display "TM RELATED POST" widget.',
					));
					
	register_sidebar(array(
					'name'			=> 'Category Widget Left (Sidebar)',
					'id'			=> 'category-sidebar-widget-left',
					'description'   => 'This widget will appears in Category sidebar left.',
					));
	
	register_sidebar(array(
					'name'			=> 'Category Widget Right (Sidebar)',
					'id'			=> 'category-sidebar-widget-right',
					'description'   => 'This widget will appears in Category sidebar right.',
					));
					
	register_sidebar(array(
					'name'			=> 'Page Widget Left (Sidebar)',
					'id'			=> 'page-sidebar-widget-left',
					'description'   => 'This widget will appears in Page sidebar left.',
					));
	
	register_sidebar(array(
					'name'			=> 'Page Widget Right (Sidebar)',
					'id'			=> 'page-sidebar-widget-right',
					'description'   => 'This widget will appears in Page sidebar right.',
					));

	register_sidebar(array(
					'name'			=> 'Footer Wide Widget (Footer)',
					'id'			=> 'footer-widget',
					'description'   => 'This widget will appears in footer area, for display "TM TAGLINE WIDGET" and "TM 4 GRID BOX".',
					));

	register_sidebar(array(
					'name'			=> 'Footer Widget Left',
					'id'			=> 'footer-widget-left',
					'description'   => 'Display widget in footer left area.',
					));
					
	register_sidebar(array(
					'name'			=> 'Footer Widget Center',
					'id'			=> 'footer-widget-center',
					'description'   => 'Display widget in footer center area.',
					));
					
	register_sidebar(array(
					'name'			=> 'Footer Widget Right',
					'id'			=> 'footer-widget-right',
					'description'   => 'Display widget in footer right area.',
					));		
}
add_action( 'after_setup_theme', 'tm_fashion_magazine_setup' );

/* limit tag cloud */
add_filter('widget_tag_cloud_args', 'tag_widget_limit'); 
	function tag_widget_limit($args){ 
	if(isset($args['taxonomy']) && $args['taxonomy'] == 'post_tag'){ 
	$args['number'] = 30; //Limit number of tags 
	} 
	return $args; 
} 

/* Content Width */
if ( ! isset( $content_width ) ) $content_width = 485;

/* Enqueues scripts and styles for front-end */
require( get_template_directory() . '/functions/enqueuesscripts.php' );

/* meta title */
require( get_template_directory() . '/functions/metatitle.php' );

/* translate */
load_theme_textdomain( 'tm_myid_text', get_template_directory() . '/languages' );

/* view counter */
require( get_template_directory() . '/functions/viewcounter.php' );

/* pagination */
require( get_template_directory() . '/functions/pagination.php' );

/* THEME OPTION */
require( get_template_directory() . '/functions/themeoptions.php' );

/* TMmyid Panel */
require( get_template_directory() . '/inc/options-framework/options-framework.php' );

/* all widget */
require( get_template_directory() . '/functions/allwidget.php' );

/* breadcrumbs */
require( get_template_directory() . '/functions/breadcrumbs.php' );
 
/* gallery swipebox class */
require( get_template_directory() . '/functions/gallery-class.php' );

/* Custom Widget Admin */
add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');
function my_custom_dashboard_widgets() {
	global $wp_meta_boxes;
	wp_add_dashboard_widget('custom_help_widget', 'Theme Support', 'custom_dashboard_help');
}
function custom_dashboard_help() {
	echo '<p><b>Welcome to "Magazine II" Theme!</b></p> 
	<p>To install the theme, please read the documentation file in download folder. If you need help? Ask the developer in <a href="http://forum.template.my.id/">here</a>.
	For more information, back to <a href="http://www.template.my.id/">Template</a>.</p>';
}

/* Shortcode in Widget */
add_filter('widget_text', 'do_shortcode');

/* limit description */
function excerpt($num) {
    echo mb_substr(get_the_excerpt(), 0, $num+1) . "...";
}

/* remove auto inline */
add_action('widgets_init', 'my_remove_recent_comments_style');
function my_remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
}

/* Enable font size & font family selects in the editor */
if ( ! function_exists( 'wpex_mce_buttons' ) ) {
	function wpex_mce_buttons( $buttons ) {
		array_unshift( $buttons, 'fontselect' ); // Add Font Select
		array_unshift( $buttons, 'fontsizeselect' ); // Add Font Size Select
		return $buttons;
	}
}
add_filter( 'mce_buttons_2', 'wpex_mce_buttons' );

/* add menu */
if (function_exists('add_theme_support')) { add_theme_support('menus'); }

?>