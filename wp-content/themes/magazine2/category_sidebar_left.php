<?php if ( is_active_sidebar( 'category-sidebar-widget-left' ) ) : ?>
<div class="tm_left">

	<!--<category sidebar left widget>-->
	<div class="tm_sidebarwidget_left">
		<ul>
		<?php dynamic_sidebar( 'category-sidebar-widget-left' ); ?>
		</ul>
	</div>
	<!--<category sidebar left widget>-->

</div>
<?php endif; ?>