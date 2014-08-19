<?php if ( is_active_sidebar( 'page-sidebar-widget-left' ) ) : ?>
<div class="tm_left">

	<!--<page sidebar left widget>-->
	<div class="tm_sidebarwidget_left">
		<ul>
		<?php dynamic_sidebar( 'page-sidebar-widget-left' ); ?>
		</ul>
	</div>
	<!--<page sidebar left widget>-->

</div>
<?php endif; ?>