<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<link href="<?php echo of_get_option('tm_upload_favicon'); ?>" rel="icon" type="image/x-icon" />
	<?php get_template_part( 'style_custom' ); ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<!--<back to top>-->
<div id="backtotop">
	<div class="img_backtotop"></div>
</div>
<!--</back to top>-->

<!--<tm_container div open>-->
<div id="tm_container">

	<!--<tm top menu>-->
	<?php if ( of_get_option('tm_top_menu_checkbox', true ) ) { ?>
		<div class="tm_top_menu">
			<div class="tm_top_menu_title">
				<?php echo of_get_option('tm_top_menu_url'); ?>
			</div>
			
			<div class="tm_top_menu_social">
				<?php echo of_get_option('tm_top_menu_social_sharing'); ?>
			</div>
		</div>
	<?php } ?>	
	<!--</tm top menu>-->

<!--<header>-->
<div class="tm_header">

	<!--<tm headerin>-->
	<div class="tm_header_file">
		<div class="tm_header_logo_ads">

		<?php if ( of_get_option('tm_logo_images_checkbox', true ) ) { ?>
		<!--<logo>-->
		<div class="tm_logo">
			<div class="tm_logo_img">
			<a href="<?php echo home_url(); ?>"><img class="tm_logoup" src="<?php echo of_get_option('tm_logo_images'); ?>" alt="<?php bloginfo(); ?>"></a>
			</div>
		</div>
		<!--</logo>-->
		<?php } ?>
		
		<!--<ad728>-->
		<div class="tm_topads_728">
		<ul>
			<?php if ( is_active_sidebar( 'top-ad-728x90-widget' ) ) : ?>
			<?php dynamic_sidebar( 'top-ad-728x90-widget' ); ?>
			<?php endif; ?>
		</ul>
		</div>
		<!--</ad728>-->
		
		</div>
	</div>
	<!--</tm headerin>-->
	
</div>
<!--<header>-->

<!--<nav>-->
	<!--<nav desktop>-->
	<div class="tm_menu_desktop">
	<?php get_template_part('menu'); ?>
	</div>
	<!--</nav desktop>-->
	
	<!--<nav mobile>-->
	<div class="tm_menu_mobile">
	<?php get_template_part('menu_mobile'); ?>
	</div>
	<!--</nav mobile>-->
<!--</nav>-->

<!--<tm_content div open>-->
<div class="tm_content"> 