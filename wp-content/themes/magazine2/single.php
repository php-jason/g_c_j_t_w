<?php get_header(); ?>

	<!--<floating>-->
	<div class="floatinglike tm_hide">
	
		<!--<twitter>-->
		<div class="floating_twitter">
		<a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink() ?>" data-via="your_screen_name" data-lang="en" data-related="anywhereTheJavascriptAPI" data-count="vertical">Tweet</a>
		</div>
		<!--</twitter>-->
	
		<!-- facebook -->
		<div class="floating_fb">
			<div class="fb-like" data-href="<?php the_permalink() ?>" data-send="false" data-layout="box_count" data-width="0" data-show-faces="true" data-font="verdana"></div>
		</div>
		<!-- facebook -->
		
		<!-- G+ -->
		<div class="floating_gp">
			<g:plusone size="tall"></g:plusone>
			<!-- Place this render call where appropriate -->
			<script type="text/javascript">
			  (function() {
				var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
				po.src = 'https://apis.google.com/js/plusone.js';
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
			  })();
			</script>
		</div>
		<!-- G+ -->
		
	</div>
	<!--</floating>-->

<!--<tm_post>-->
<div class="tm_post">

<!--<single widget sidebar left>-->
<?php get_template_part( 'single_sidebar_left' ); ?>
<!--</single widget sidebar left>-->

<!--<tm middle post>-->

<!--<div if else tm middle post>-->
<?php if ( is_active_sidebar( 'post-sidebar-widget-left' ) && is_active_sidebar( 'post-sidebar-widget-right' ) ) { ?>
<div class="tm_middle_post_2">

<?php } elseif ( is_active_sidebar( 'post-sidebar-widget-left' ) ) { ?>
<div class="tm_middle_post_1">

<?php } elseif ( is_active_sidebar( 'post-sidebar-widget-right' ) ) { ?>
<div class="tm_middle_post_1_right">

<?php } else { ?>
<div class="tm_middle_post_0">

<?php } ?>
<!--</div if else tm middle post>-->

	<!--<tm breadcrumbs>-->
	<?php while (have_posts()) : the_post(); ?>
		<?php if (function_exists('tm_breadcrumbs')) tm_breadcrumbs(); ?>
	<?php endwhile; ?>
	<!--</tm breadcrumbs>-->

	<!--<tm middle post content>-->
	<div class="tm_middle_post_content">
	
		<!--<loop>-->
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<h1><?php the_title(); ?></h1>
			
			<div class="tm_item_post">
			<div class="tm_item_post_list">

				<div class="tm_item_post_list_1">
				<i class="fa fa-user"></i> 
				<?php _e('By', 'tm_myid_text'); ?> <?php the_author(); ?>
				</div>

				<div class="tm_item_post_list_2">
				<i class="fa fa-tag"></i> 
				<?php _e('In', 'tm_myid_text'); ?> <strong><?php $category = get_the_category(); if($category[0]){ echo '<a href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'</a>'; } ?></strong> 
				</div>

				<div class="tm_item_post_list_3">
				<i class="fa fa-calendar"></i> 
				<?php the_time('F j, Y') ?> 
				</div>

				<div class="tm_item_post_list_4">
				<i class="fa fa-comments"></i> 
				<strong><?php comments_number(__('0 Comments', 'tm_myid_text'), __('1 Comment', 'tm_myid_text'), __( '% Comments', 'tm_myid_text') );?></strong> 
				</div>

				<div class="tm_item_post_list_5">
				<i class="fa fa-eye"></i> 
				<?php if(function_exists('tm_viewcounter_post')) { echo tm_viewcounter_post(get_the_ID()); } ?>
				</div>

			</div>
			</div>

			<!--<post content>-->
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php the_content(); ?>
				
					<!--<Thumbs Rating widget shortcode https://wordpress.org/plugins/thumbs-rating/installation >-->
					<?=function_exists('thumbs_rating_getlink') ? thumbs_rating_getlink() : ''?>
					<!--end Thumbs Rating -->
				
				<?php wp_link_pages(); ?>
		
		<?php endwhile; else: ?>
		<p>Sorry, no posts matched your criteria.</p>
		
			</div>
			<!--</post content>-->

		<?php endif; ?>
		<!--</loop>-->	
		
		<!--<edit post>-->
		<?php edit_post_link('Edit This Post', '<p><i class="icon-pencil"></i> ', '</p>'); ?>
		<!--</edit post>-->
		
	</div>
	<!--<tm middle post content>-->
	
	<!--<tags>-->
	<?php if( get_the_tags() ) { ?>
		<div class="post_tags">
			<?php the_tags('<span>Tagged :</span><ul><li>', '</li><li>', '</li></ul>'); ?> 
		</div>
	<?php } ?>
	<!--</tags>-->
		
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
	
	<?php if( get_the_author_meta('description') ) { ?>
	<!--<author>-->
	<div class="author_post">
		<div class="author_post_item">
				<div class="author_post_name">
				<h4><?php _e('About', 'tm_myid_text'); ?> <?php the_author_posts_link(); ?> <?php _e('Has', 'tm_myid_text'); ?> <?php the_author_posts(); ?> <?php _e('Posts', 'tm_myid_text'); ?></h4>
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
	<?php } ?>
	
	<!--<related post>-->
	<?php if ( is_active_sidebar( 'related-post-widdet-position' ) ) : ?>
	<div class="tm_related_post_widpos">

		<!--<post sidebar left widget>-->
		<div class="tm_related_post_widpos_list">
			<ul>
			<?php dynamic_sidebar( 'related-post-widdet-position' ); ?>
			</ul>
		</div>
		<!--</post sidebar left widget>-->
	
	</div>
	<?php endif; ?>
	<!--</related post>-->

	<!--<default comments>-->
	<?php comments_template( '', true ); ?>
	<!--</default comments>-->	
	
</div>
</div>
<!--</tm middle post>-->
		
<!--<single widget sidebar right>-->
<?php get_template_part( 'single_sidebar_right' ); ?>
<!--</single widget sidebar right>-->

</div>
<!--</tm_post>-->

<?php get_footer(); ?>