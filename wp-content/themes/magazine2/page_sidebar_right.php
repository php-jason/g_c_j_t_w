<?php if ( is_active_sidebar( 'page-sidebar-widget-right' ) ) : ?>
<div class="tm_right">

	<!--<page sidebar right widget>-->
	<div class="tm_sidebar_right">
		<ul>
		<?php dynamic_sidebar( 'page-sidebar-widget-right' ); ?>
		</ul>
	</div>
	<!--</page sidebar right widget>-->
	
</div>
<?php endif; ?>