<?php get_header(); ?>

<!--<tm_page>-->
<div class="tm_page tm_forumid">

<!--<tm middle page>-->
<div class="tm_middle_page_0">

	<!--<tm middle page content>-->
	<div class="tm_middle_page_content">
	
		<!--<loop>-->
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<h1 class="tm_forum_h1"><?php the_title(); ?></h1>

			<!--<post content>-->
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php the_content(); ?>
				<?php wp_link_pages(); ?>
		
			<?php endwhile; else: ?>
			<p><?php _e('Sorry, no posts matched your criteria.', 'tm_myid_text'); ?></p>
		
			</div>
			<!--</post content>-->

		<?php endif; ?>
		<!--</loop>-->
				
	</div>
	<!--<tm middle page content>-->
	
</div>
<!--</tm middle page>-->

</div>
<!--</tm_page>-->

</div>

<?php get_footer(); ?>