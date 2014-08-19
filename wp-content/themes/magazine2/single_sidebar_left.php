<?php if ( is_active_sidebar( 'post-sidebar-widget-left' ) ) : ?>
<div class="tm_left">

	<!--<post sidebar left widget>-->
	<div class="tm_sidebarwidget_left">
		<ul>
		<?php dynamic_sidebar( 'post-sidebar-widget-left' ); ?>
		</ul>
	</div>
	<!--</post sidebar left widget>-->
	
</div>
<?php endif; ?>