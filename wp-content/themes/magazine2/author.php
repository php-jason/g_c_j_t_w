<?php get_header(); ?>

<!--<widget category left>-->
<?php get_template_part( 'category_sidebar_left' ); ?>
<!--</widget category left>-->

<!--<div if else tm_category>-->
<?php if ( is_active_sidebar( 'category-sidebar-widget-left' ) && is_active_sidebar( 'category-sidebar-widget-right' ) ) { ?>
<div class="tm_category_2">

<?php } elseif ( is_active_sidebar( 'category-sidebar-widget-left' ) ) { ?>
<div class="tm_category_1">

<?php } elseif ( is_active_sidebar( 'category-sidebar-widget-right' ) ) { ?>
<div class="tm_category_1_right">

<?php } else { ?>
<div class="tm_category_0">

<?php } ?>
<!--</div if else tm middle post>-->

	<!--<category name>-->
	<div class="tm_cat_metatitle">
		<h1>
			<i class="icon-user"></i>
			<?php if ( have_posts() ) : ?>
			<?php _e('Author', 'tm_myid_text'); ?> "<?php $author = get_userdata( get_query_var('author') ); ?><?php echo $author->display_name; ?>"
			<?php endif; ?>
		</h1> 
		<div class="tm_cat_arrow"></div>
	</div>
	<!--</category name>-->
	
	<!--<tm_category_file>-->
	<div class="tm_category_file">
		<div class="tm_category_box">

		<?php if ( have_posts() ) : ?>

			<!--<the loop>-->
			<?php while ( have_posts() ) : the_post(); ?>
			<div class="tm_cat_post">
			
				<!--<cat title>-->
				<div class="tm_catpost_titles">
						<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
							<h1 class="tmpost-<?php the_ID(); ?>">
							<?php $tit = the_title('','',FALSE); echo substr($tit, 0, 150); if (strlen($tit) > 150) echo " ..."; ?>
							</h1>
						</a>
				</div>
				<!--</cat title>-->		
				
				<!--<cat item>-->
				<div class="tm_cat_item">
					<div class="tmpost-<?php the_ID(); ?>-item">
							
						<div class="tm_catpost_item_1">
						<i class="icon-user"></i> 
						<?php _e('By', 'tm_myid_text'); ?> <?php the_author(); ?>
						</div>

						<div class="tm_catpost_item_2">
						<i class="icon-tag"></i> 
						In <?php $category = get_the_category(); echo $category[0]->cat_name; ?>
						</div>
						
						<div class="tm_catpost_item_3">
						<i class="icon-calendar"></i>
						<?php the_time('M jS, Y') ?>
						</div>
						
						<div class="tm_catpost_item_4">
						<i class="icon-comments"></i> 
						<?php comments_number(__('0 Comments', 'tm_myid_text'), __('1 Comment', 'tm_myid_text'), __( '% Comments', 'tm_myid_text') );?>
						</div>

					</div>
				</div>
				<!--</cat item>-->
				
				<!--<cat image>-->
				<div class="tm_cat_image">
				<?php if (has_post_thumbnail()) { ?>
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
					<?php the_post_thumbnail( 'full' ); ?>
					</a>
				<?php } else { ?>
				<?php } ?>
				</div>
				<!--</cat image>-->
				
				<div class="tm_cat_desc">
					<div class="tmpost-desc">
					<?php echo excerpt(251); ?> 
					</div>

					<div class="tm_cat_readmore">
						<div class="tmpost-readmore">
							<a href="<?php the_permalink() ?>">
								<i class="icon-file-text"></i> 
								<?php _e('Read More', 'tm_myid_text'); ?>
							</a>
							<div class="tmpost-readmore_list"></div>
						</div>
					</div>
					
				</div>

			</div>
			<?php endwhile; ?>
			<!--</the loop>-->

		</div>
	</div>
	<!--</tm_category_file>-->
	
	<!--<tm pagination>-->
	<div id="Nav">
		<div class="tm_navigation">
		<?php echo tm_pagination_nav(); ?>
		</div>
	</div>
	<!--</tm pagination>-->

		<?php else : ?>
		<?php endif; ?>
	
</div>

<!--<widget category right>-->
<?php get_template_part( 'category_sidebar_right' ); ?>
<!--</widget category right>-->

<?php get_footer(); ?>