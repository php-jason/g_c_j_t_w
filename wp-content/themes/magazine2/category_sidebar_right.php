<?php if ( is_active_sidebar( 'category-sidebar-widget-right' ) ) : ?>
<div class="tm_right">

	<!--<category sidebar right widget>-->
	<div class="tm_sidebar_right">
		<ul>
		<?php dynamic_sidebar( 'category-sidebar-widget-right' ); ?>
		</ul>
	</div>
	<!--</category sidebar right widget>-->
	
</div>
<?php endif; ?>