<?php 

/* Enqueues scripts and styles for front-end */
function smart_magazine_scripts_styles() {
	global $wp_styles;

	// Adds JavaScript to comment form
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
		wp_enqueue_script( 'jquery' );

	// all style
	wp_enqueue_style( 'tmmyid-styleawesome', get_template_directory_uri() . '/style_awesome.css' );
	wp_enqueue_style( 'tmmyid-bxslider', get_template_directory_uri() . '/lib/jquery.bxslider.css', false, '4.1', 'all' );
	wp_enqueue_style( 'tmmyid-swipebox', get_template_directory_uri() . '/lib/swipebox.css', false, '1.0', 'all' );
	wp_enqueue_style( 'tmmyid-style-forum', get_template_directory_uri() . '/style_forum.css' );
	wp_enqueue_style( 'tmmyid-style', get_stylesheet_uri() );
	wp_enqueue_style( 'tmmyid-style-tab', get_template_directory_uri() . '/style_tab.css' );
	wp_enqueue_style( 'tmmyid-style-480', get_template_directory_uri() . '/style480_mobile.css' );
	wp_enqueue_style( 'tmmyid-style-320', get_template_directory_uri() . '/style320_mobile.css' );
	wp_enqueue_style( 'tmmyid-customcss', get_template_directory_uri() . '/custom_css.css' );

	// loads the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'tmmyid-ie8', get_template_directory_uri() . '/style_ie8.css' );
	$wp_styles->add_data( 'tmmyid-ie8', 'conditional', 'lte IE 8' );

	// all js
	wp_enqueue_script('bxslidermin', get_template_directory_uri() . '/js/jquery.bxslider.js', false, '4.1.1', true);
	wp_enqueue_script('menunavigation', get_template_directory_uri() . '/js/menu.navigation.js', false, '1.0', true);
	wp_enqueue_script('newsticker', get_template_directory_uri() . '/js/jquery.ticker.js', false, '0.1', true);
	wp_enqueue_script('galleryswipeboxmin', get_template_directory_uri() . '/js/jquery.swipebox.js', false, '1.0', true);
	wp_enqueue_script('galleryswipeboxfixios', get_template_directory_uri() . '/js/swipebox-ios-orientationchange-fix.js', false, '1.0', true);
	wp_enqueue_script('menuscroolfix', get_template_directory_uri() . '/js/jquery.menuscrolltofixed.js', false, '1.0', true);
	wp_enqueue_script('tmcustomscript', get_template_directory_uri() . '/js/customs.js', false, '1.0', true);
}
add_action( 'wp_enqueue_scripts', 'smart_magazine_scripts_styles' );

/* google font */
function smart_magazine_fonts() 
{
	$protocol = is_ssl() ? 'https' : 'http';
	wp_enqueue_style( 'tmmyid-opensans', "$protocol://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic&subset=latin,latin-ext,greek,greek-ext,vietnamese,cyrillic,cyrillic-ext" ); 
	wp_enqueue_style( 'tmmyid-opensans-condensed', "$protocol://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic,700&subset=latin,cyrillic-ext,latin-ext,cyrillic,greek-ext,greek,vietnamese" ); 
	wp_enqueue_style( 'tmmyid-roboto-slab', "$protocol://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700&subset=latin,cyrillic-ext,latin-ext,cyrillic,greek-ext,greek,vietnamese" ); 
}
add_action( 'wp_enqueue_scripts', 'smart_magazine_fonts' );

?>