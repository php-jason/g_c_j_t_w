<?php 
/* Template Name: Contact Us */
?>

<?php get_header(); ?>

<!--<tm_page>-->
<div class="tm_page">

<!--<page widget sidebar left>-->
<?php get_template_part( 'page_sidebar_left' ); ?>
<!--</page widget sidebar left>-->

<!--<tm_page contactus>-->
<div id="tm_page_contactus">

<!--<div if else tm middle page>-->
<?php if ( is_active_sidebar( 'page-sidebar-widget-left' ) && is_active_sidebar( 'page-sidebar-widget-right' ) ) { ?>
<div class="tm_middle_page_2">

<?php } elseif ( is_active_sidebar( 'page-sidebar-widget-left' ) ) { ?>
<div class="tm_middle_page_1">

<?php } elseif ( is_active_sidebar( 'page-sidebar-widget-right' ) ) { ?>
<div class="tm_middle_page_1_right">

<?php } else { ?>
<div class="tm_middle_page_0">

<?php } ?>
<!--</div if else tm middle page>-->

	<!--<tm breadcrumbs>-->
	<?php while (have_posts()) : the_post(); ?>
		<?php if (function_exists('tm_breadcrumbs')) tm_breadcrumbs(); ?>
	<?php endwhile; ?>
	<!--</tm breadcrumbs>-->

	<!--<tm middle page content>-->
	<div class="tm_middle_page_content">
	
		<!--<loop>-->
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<h1 id="tm_h1_contactus"><?php the_title(); ?></h1>

			<!--<post content>-->
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php the_content(); ?>
				<?php wp_link_pages(); ?>
		
			<?php endwhile; else: ?>
			<p><?php _e('Sorry, no posts matched your criteria.', 'tm_myid_text'); ?></p>
		
			</div>
			<!--</post content>-->

		<?php endif; ?>
		<!--</loop>-->	
			
	</div>
	<!--</tm middle page content>-->

</div>
</div>

</div>
<!--<tm_page contactus>-->
	
	
<!--<page widget sidebar right>-->
<?php get_template_part( 'page_sidebar_right' ); ?>
<!--</page widget sidebar right>-->

</div>
<!--</tm_page>-->

<?php get_footer(); ?>