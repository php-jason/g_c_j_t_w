<!--<home footer>-->
<?php if ( is_active_sidebar( 'footer-widget' ) ) : ?>
<div class="tm_footer_index">

	<!--<footer widget>-->
	<div class="tm_footer_index_widget">
		<ul>
		<?php dynamic_sidebar( 'footer-widget' ); ?>
		</ul>
	</div>
	<!--</footer widget>-->

</div>
<?php endif; ?>
<!--</home footer>-->

</div>
<!--</tm_content div closed>-->

<div class="clear"></div>

<!--<footer>-->
<div class="tm_footer">

	<!--<bottom 3 brick>-->
	<?php get_template_part( 'bottom_tm' ); ?>
	<!--</bottom 3 brick>-->

	<div class="footerin">
		<div class="footerin_1">
			<?php if ( of_get_option('tm_footer_desc_text', true ) ) { ?>
				<?php echo of_get_option('tm_footer_desc_text'); ?>
			<?php } ?>
		</div>
		
		<div class="footerin_2">		
			Created by <a href="http://template.my.id/">Template</a>.My.Id
		</div>
	</div>
	
</div>
<!--</footer>-->

</div>
<!--</tm_container div closed>-->

<?php get_template_part( 'share_icon' ); ?>

<?php if ( of_get_option('enable_floatingmenu_checkbox', true ) ) { ?>
	<script>jQuery(document).ready(function($) { $('#nav').scrollToFixed(); });</script>
<?php } ?>

<?php wp_footer(); ?>
</body>
</html>
