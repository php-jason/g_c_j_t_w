<?php get_header(); ?>

<!--<tm_post>-->
<div class="tm_post">
<div class="tm_middle_post_0">

	<!--<tm middle post content>-->
	<div class="tm_middle_post_content">
	
		<!--<loop>-->
		<?php while (have_posts()) : the_post(); ?>

			<h1><?php the_title(); ?></h1>
			
			<div class="tm_item_post">
			<div class="tm_item_post_list">

				<div class="tm_item_post_list_1">
				<i class="icon-user"></i> 
				<?php _e('By', 'tm_myid_text'); ?> <?php the_author(); ?> 
				</div>

				<div class="tm_item_post_list_3">
				<i class="icon-calendar"></i>
				<?php the_time('M jS, Y') ?> 
				</div>

				<div class="tm_item_post_list_4">
				<i class="icon-comments"></i> 
				<?php comments_number(__('0 Comments', 'tm_myid_text'), __('1 Comment', 'tm_myid_text'), __( '% Comments', 'tm_myid_text') );?>
				</div>

				<div class="tm_item_post_list_5">
				<i class="icon-eye-open"></i> 
				<?php if(function_exists('tm_viewcounter_post')) { echo tm_viewcounter_post(get_the_ID()); } ?>
				</div>

			</div>
			</div>

			<!--<post content>-->
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
				<div class="tm_attachment_img">
				<img src="<?php $image_id = get_post_thumbnail_id(); $image_url = wp_get_attachment_image_src($image_id,'full', true); echo $image_url[0]; ?>">
				</div>
				
				<div class="tm_attachment_desc">
				<?php the_content(); ?>
				</div>				
				
				<div class="previous-next-image">					
					<?php previous_image_link( false, 'Previous' ); ?>
					<?php next_image_link( false, 'Next' ); ?>
				</div>
				
			</div>
			<!--</post content>-->
		
		<?php endwhile; ?>
		<!--</loop>-->	
		
		<!--<edit post>-->
		<?php edit_post_link('Edit This Post', '<p><i class="icon-pencil"></i> ', '</p>'); ?>
		<!--</edit post>-->
		
		<!--<share post>-->
		<div class="share_post">
		<div class="share_post_pad">

			<!--facebook share-->
			<div class="share_post_facebook">
			<div class="fb-like" data-href="<?php the_permalink() ?>" data-send="false" data-layout="button_count" data-show-faces="false"></div>
			</div>
			<!--// facebook share-->

			<!--G+-->
			<div class="share_post_gplus">
			<div class="g-plus" data-action="share" data-annotation="bubble"></div>
			</div>
			<!--/G+-->

			<!--linkedIn-->
			<div class="share_post_linkedin">
			<script type="IN/Share" data-url="<?php the_permalink() ?>"></script>
			</div>
			<!--linkedIN-->

			<!--twitter share-->
			<div class="share_post_twitter">
			<a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink() ?>">Tweet</a>
			</div>
			<!--/twitter share-->

		</div>
		</div>
		<!--</share post>-->
			
	<!--<author>-->
	<div class="author_post">
		<div class="author_post_item">
				<div class="author_post_name">
				<h4><?php _e('About', 'tm_myid_text'); ?> "<?php the_author_posts_link(); ?>" <?php _e('Has', 'tm_myid_text'); ?> <?php the_author_posts(); ?> <?php _e('Posts', 'tm_myid_text'); ?></h4>
				</div>

				<div class="author_post_pic">
				<?php echo get_avatar( get_the_author_meta('ID'), 45 ); ?>
				</div>

				<div class="author_post_desc">
				<?php the_author_meta('description'); ?>
				</div>
		</div>
	</div>
	<!--</author>-->

	<!--<default comments>-->
	<?php comments_template( '', true ); ?>
	<!--</default comments>-->	
	
	</div>
	<!--<tm middle post content>-->
	
</div>
</div>
<!--</tm_post>-->

<?php get_footer(); ?>