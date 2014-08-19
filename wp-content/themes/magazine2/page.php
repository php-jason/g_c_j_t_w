<?php get_header(); ?>

<!--<tm_page>-->
<div class="tm_page">

<!--<page widget sidebar left>-->
<?php get_template_part( 'page_sidebar_left' ); ?>
<!--</page widget sidebar left>-->

<!--<tm middle page>-->

<!--<div if else tm middle page>-->
<?php if ( is_active_sidebar( 'page-sidebar-widget-left' ) && is_active_sidebar( 'page-sidebar-widget-right' ) ) { ?>
<div class="tm_middle_page_2">

<?php } elseif ( is_active_sidebar( 'page-sidebar-widget-left' ) ) { ?>
<div class="tm_middle_page_1">

<?php } elseif ( is_active_sidebar( 'page-sidebar-widget-right' ) ) { ?>
<div class="tm_middle_page_1_right">

<?php } else { ?>
<div class="tm_middle_page_0">

<?php } ?>
<!--</div if else tm middle page>-->

	<!--<tm breadcrumbs>-->
	<?php while (have_posts()) : the_post(); ?>
		<?php if (function_exists('tm_breadcrumbs')) tm_breadcrumbs(); ?>
	<?php endwhile; ?>
	<!--</tm breadcrumbs>-->

	<!--<tm middle page content>-->
	<div class="tm_middle_page_content">
	
		<!--<loop>-->
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<h1><?php the_title(); ?></h1>
			
			<div class="tm_item_page">
			<div class="tm_item_page_list">

				<div class="tm_item_page_list_1">
				<i class="fa fa-user"></i> 
				<?php _e('By', 'tm_myid_text'); ?> <?php the_author(); ?> 
				</div>

				<div class="tm_item_page_list_3">
				<i class="fa fa-calendar"></i>
				<?php the_time('M jS, Y') ?> 
				</div>

				<div class="tm_item_page_list_4">
				<i class="fa fa-comments"></i> 
				<?php comments_number(__('0 Comments', 'tm_myid_text'), __('1 Comment', 'tm_myid_text'), __( '% Comments', 'tm_myid_text') );?> 
				</div>

				<div class="tm_item_page_list_5">
				<i class="fa fa-eye"></i> 
				<?php if(function_exists('tm_viewcounter_post')) { echo tm_viewcounter_post(get_the_ID()); } ?>
				</div>

			</div>
			</div>

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
		
		<!--<edit post>-->
		<?php edit_post_link('Edit This Page', '<p><i class="icon-pencil"></i> ', '</p>'); ?>
		<!--</edit post>-->
		
		<!--<share page>-->
		<div class="share_page">
		<div class="share_page_pad">

			<!--facebook share-->
			<div class="share_page_facebook">
			<div class="fb-like" data-href="<?php the_permalink() ?>" data-send="false" data-layout="button_count" data-show-faces="false"></div>
			</div>
			<!--// facebook share-->

			<!--G+-->
			<div class="share_page_gplus">
			<div class="g-plus" data-action="share" data-annotation="bubble"></div>
			</div>
			<!--/G+-->

			<!--linkedIn-->
			<div class="share_page_linkedin">
			<script type="IN/Share" data-url="<?php the_permalink() ?>"></script>
			</div>
			<!--linkedIN-->

			<!--twitter share-->
			<div class="share_page_twitter">
			<a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink() ?>">Tweet</a>
			</div>
			<!--/twitter share-->

		</div>
		</div>
		<!--</share page>-->
		
	</div>
	<!--<tm middle page content>-->
	
	<?php if( get_the_author_meta('description') ) { ?>
	<!--<author>-->
	<div class="author_page">
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

	<!--<default comments>-->
	<?php comments_template( '', true ); ?>
	<!--</default comments>-->	
	
</div>
</div>
<!--</tm middle page>-->
	
	
<!--<page widget sidebar right>-->
<?php get_template_part( 'page_sidebar_right' ); ?>
<!--</page widget sidebar right>-->

</div>
<!--</tm_page>-->

<?php get_footer(); ?>