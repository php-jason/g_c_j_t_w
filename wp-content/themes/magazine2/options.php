<?php

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);

	// echo $themename;
}

function optionsframework_options() {

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}
	
	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}

	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';

	$options = array();

	// Logo
	$options[] = array(
		'name' => __('Upload Logo', 'options_check'),
		'type' => 'heading');
		
	$options[] = array(
		'name' => __('Enable / Disable Logo', 'options_check'),
		'desc' => __('Check the box if you want to enable logo.', 'options_check'),
		'id' => 'tm_logo_images_checkbox',
		'std' => '0',
		'class' => 'tm_panel_item',
		'type' => 'checkbox');
		
	$options[] = array(
		'name' => __('Logo Image', 'options_check'),
		'desc' => __('Upload your logo.', 'options_check'),
		'id' => 'tm_logo_images',
		'type' => 'upload');
		
	// Favicon
	$options[] = array(
		'name' => __('Favicon', 'options_check'),
		'type' => 'heading');
		
	$options[] = array(
		'name' => __('Enable / Disable Favicon', 'options_check'),
		'desc' => __('Check the box if you want to enable favicon image.', 'options_check'),
		'id' => 'tm_enable_favicon_checkbox',
		'std' => '0',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Upload Favicon', 'options_check'),
		'desc' => __('Upload your favicon.', 'options_check'),
		'id' => 'tm_upload_favicon',
		'type' => 'upload');
		
	// Floating Menu
	$options[] = array(
		'name' => __('Floating Menu', 'options_check'),
		'type' => 'heading');
		
	$options[] = array(
		'name' => __('Enable / Disable floating menu', 'options_check'),
		'desc' => __('Check the box if you want to enable floating menu.', 'options_check'),
		'id' => 'enable_floatingmenu_checkbox',
		'std' => '1',
		'type' => 'checkbox');
		
	// Top Menu
	$options[] = array(
		'name' => __('Top Menu', 'options_check'),
		'type' => 'heading');
		
	$options[] = array(
		'name' => __('Enable / Disable Top Menu', 'options_check'),
		'desc' => __('Check the box if you want to enable top menu.', 'options_check'),
		'id' => 'tm_top_menu_checkbox',
		'std' => '1',
		'class' => 'tm_panel_item',
		'type' => 'checkbox');	
		
	$options[] = array(
		'name' => __('Top Menu URL', 'options_check'),
		'desc' => __('Insert your top menu Url in here.', 'options_check'),
		'id' => 'tm_top_menu_url',
		'std' => '
<a href="#">Login</a> 
<a href="#">Registration</a> 
<a href="#">About Us</a> 
<a href="#">Contact Us</a>',
		'type' => 'textarea');
		
	$options[] = array(
		'name' => __('Top Menu Social Sharing Icons', 'options_check'),
		'desc' => __('Insert your social sharing icon code in here.', 'options_check'),
		'id' => 'tm_top_menu_social_sharing',
		'std' => '
<a href="#"><i class="fa fa-twitter"></i></a> 
<a href="#"><i class="fa fa-pinterest"></i></a> 
<a href="#"><i class="fa fa-facebook"></i></a> 
<a href="#"><i class="fa fa-linkedin"></i></a> 
<a href="#"><i class="fa fa-youtube"></i></a> 
<a href="#"><i class="fa fa-google-plus"></i></a> 
<a href="#"><i class="fa fa-vimeo-square"></i></a>',
		'type' => 'textarea');
		
	$options[] = array(
		'name' => __('Note: You can found all icon in here: http://fontawesome.io/icons/', 'options_check'),
		'id' => 'tm_panel_note_id', // wajib ditambahkan id jika tidak error pada saat debug.
		'class' => 'tm_panel_note',
		'type' => 'none');	

	// Style	
	$options[] = array(
		'name' => __('Style Color', 'options_check'),
		'type' => 'heading');
		
	$options[] = array(
		'name' => __('Header Background', 'options_check'),
		'desc' => __('Change the header background color.', 'options_check'),
		'id' => 'tm_header_background_color',
		'std' => '#5a7ea0',
		'type' => 'color' );
		
	$options[] = array(
		'name' => __('Footer Background', 'options_check'),
		'desc' => __('Change the footer background color.', 'options_check'),
		'id' => 'tm_footer_background_color',
		'std' => '#5a7ea0',
		'type' => 'color' );
		
	$options[] = array(
		'name' => __('Top Menu Background Color', 'options_check'),
		'desc' => __('Change the top menu background color.', 'options_check'),
		'id' => 'tm_topmenu_background_color',
		'std' => '#e5e5e5',
		'type' => 'color' );
		
	$options[] = array(
		'name' => __('Top Menu Text Color', 'options_check'),
		'desc' => __('Change the top menu text color.', 'options_check'),
		'id' => 'tm_topmenu_text_color',
		'std' => '#363F48',
		'type' => 'color' );

	$options[] = array(
		'name' => __('Widget Title Color', 'options_check'),
		'desc' => __('Change the widget title color.', 'options_check'),
		'id' => 'tm_widget_title_color',
		'std' => '#3d3d3d',
		'type' => 'color' );
		
	$options[] = array(
		'name' => __('Hover Color', 'options_check'),
		'desc' => __('Change hover color.', 'options_check'),
		'id' => 'tm_hover_color',
		'std' => '#FF8100',
		'type' => 'color' );

	// Footer
	$options[] = array(
		'name' => __('Footer Menu', 'options_check'),
		'type' => 'heading');
		
	$options[] = array(
		'name' => __('Footer Menu URL', 'options_check'),
		'desc' => __('Insert your footer menu Url in here.', 'options_check'),
		'id' => 'tm_footer_desc_text',
		'std' => '
<a href="#changeURL">World</a> | 
<a href="#changeURL">Businnes</a> | 
<a href="#changeURL">Technology</a> | 
<a href="#changeURL">Autos</a> | 
<a href="#changeURL">Radio</a> | 
<a href="#changeURL">Travel</a> | 
<a href="#changeURL">Entertainment</a>',
		'type' => 'textarea');
		
	// Help
	$options[] = array(
		'name' => __('Need Help', 'options_check'),
		'type' => 'heading');	
	
	$options[] = array(
		'name' => __('If you have a trouble with Template.my.id Panel, click "Reset All Settings" button to revert the original setting. If you need some help, please join and open your topic in here: http://forum.template.my.id', 'options_check'),
		'id' => 'tm_need_help_id', // wajib ditambahkan id jika tidak error pada saat debug.
		'type' => 'none');	
								
	return $options;
}