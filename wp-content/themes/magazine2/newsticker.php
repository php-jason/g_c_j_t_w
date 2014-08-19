<div class="tm_news_ticker">
	<ul id="js-news" class="js-hidden">
	<?php $recent = new WP_Query( array( 'posts_per_page' => 10, 'post_type' => 'post', 'post__not_in' => get_option( 'sticky_posts' ) ) ); while($recent->have_posts()) : $recent->the_post(); ?>
		<li>
			<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
			[<?php $category = get_the_category(); echo $category[0]->cat_name; ?>] <?php $tit = the_title('','',FALSE); echo substr($tit, 0, 100); if (strlen($tit) > 100) echo " [...]"; ?>
			</a>			
		</li>		
	<?php endwhile; ?>
	</ul>
</div>