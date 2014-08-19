<?php if ( is_active_sidebar( 'post-sidebar-widget-right' ) ) : ?>
<div class="tm_right">

	<!--<post sidebar right widget>-->
	<div class="tm_sidebar_right">
		<ul>
		<?php dynamic_sidebar( 'post-sidebar-widget-right' ); ?>
		</ul>
	</div>
	<!--<post sidebar right widget>-->

</div>
<?php endif; ?>