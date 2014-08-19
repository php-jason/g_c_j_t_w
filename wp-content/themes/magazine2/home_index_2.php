<?php 
/* Template Name: Home 2 */
?>

<?php get_header(); ?>

<!--<news ticker>-->
<?php if ( is_active_sidebar( 'header-widget-below-menu' ) ) : ?>
	<div class="tm_content_header">
		<ul>
			<?php dynamic_sidebar( 'header-widget-below-menu' ); ?>
		</ul>
	</div>
<?php endif; ?>
<!--</news ticker>-->

<!--<home 2>-->
<div class="tm_home_index_2">

<!--<home left>-->
<?php if ( is_active_sidebar( 'center-widget' ) ) : ?>
<div class="tm_center">

	<!--<center blog widget>-->
	<div class="tm_center_widget">
		<ul>
		<?php dynamic_sidebar( 'center-widget' ); ?>
		</ul>
	</div>
	<!--</center blog widget>-->

</div>
<?php endif; ?>
<!--</home left>-->

<!--</home center>-->
<?php get_template_part( 'sidebar_left' ); ?>
<!--</home center>-->

<!--<home right>-->
<?php get_template_part( 'sidebar_right' ); ?>
<!--</home right>-->

<div class="clear"></div>

</div>
<!--</home 2>-->

<?php get_footer(); ?>