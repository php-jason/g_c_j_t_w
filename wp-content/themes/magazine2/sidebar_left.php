<?php if ( is_active_sidebar( 'sidebar-widget-left' ) ) : ?>
<div class="tm_left">

	<!--<home sidebar left widget>-->
	<div class="tm_sidebarwidget_left">
		<ul>
		<?php dynamic_sidebar( 'sidebar-widget-left' ); ?>
		</ul>
	</div>
	<!--</home sidebar left widget>-->
	
</div>
<?php endif; ?>