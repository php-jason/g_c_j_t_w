<?php if ( is_active_sidebar( 'sidebar-widget-right' ) ) : ?>
<div class="tm_right">

	<!--<home sidebar right widget>-->
	<div class="tm_sidebar_right">
		<ul>
		<?php dynamic_sidebar( 'sidebar-widget-right' ); ?>
		</ul>
	</div>
	<!--</home sidebar right widget>-->

</div>
<?php endif; ?>