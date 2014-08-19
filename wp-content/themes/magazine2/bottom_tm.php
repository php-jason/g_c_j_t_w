	<div class="footer_brick">
		<div class="footer_brick_box">

			<!--<footer brick left>-->
			<?php if ( is_active_sidebar( 'footer-widget-left' ) ) : ?>
			<div class="footer_brick_1">
				<div class="footerwidget">
					<ul>
					<?php dynamic_sidebar( 'footer-widget-left' ); ?>
					</ul>
				</div>
			</div>
			<?php endif; ?>
			<!--</footer brick left>-->

			<!--<footer brick center>-->
			<?php if ( is_active_sidebar( 'footer-widget-center' ) ) : ?>
			<div class="footer_brick_2">
					<div class="footerwidget">
					<ul>
						<?php dynamic_sidebar( 'footer-widget-center' ); ?>
					</ul>
				</div>
			</div>
			<?php endif; ?>
			<!--</footer brick center>-->

			<!--<footer brick right>-->
			<?php if ( is_active_sidebar( 'footer-widget-right' ) ) : ?>
			<div class="footer_brick_3">
				<div class="footerwidget">
					<ul>
					<?php dynamic_sidebar( 'footer-widget-right' ); ?>
					</ul>
				</div>
			</div>
			<?php endif; ?>
			<!--</footer brick right>-->

		</div>
	</div>