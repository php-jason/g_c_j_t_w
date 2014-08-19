<?php get_header(); ?>

<!--<div tm_category 0>-->
<div class="tm_category_0">
<!--</div tm_middle 0>-->

	<!--<category name>-->
	<div class="tm_cat_metatitle">
		<h1>
			<i class="fa fa-bars"></i> 
			 Recent Posts 			
		</h1> 
		<div class="tm_cat_arrow"></div>
	</div>
	<!--</category name>-->

	<!--<tm_category_file>-->
	<div class="tm_category_file">
		<div class="tm_category_box_home5">
		
		<?php if ( have_posts() ) : ?>
			
			<!--<the loop>-->
			<?php $wp_query = new WP_Query( array( 
												"cat" => "", 
												"posts_per_page" => "", 
												"post_type" => "post",
												"paged" => get_query_var('paged') ? get_query_var('paged') : 1
												)												
										);
			while( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
			
			<div <?php post_class(); ?>>
			
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
						<i class="fa fa-user"></i> 
						<?php _e('By', 'tm_myid_text'); ?> <?php the_author(); ?>
						</div>

						<div class="tm_catpost_item_2">
						<i class="fa fa-tag"></i> 
						In <?php $category = get_the_category(); echo $category[0]->cat_name; ?>
						</div>
						
						<div class="tm_catpost_item_3">
						<i class="fa fa-calendar"></i>
						<?php the_time('M jS, Y') ?>
						</div>
						
						<div class="tm_catpost_item_4">
						<i class="fa fa-comments"></i> 
						<?php comments_number(__('0 Comments', 'tm_myid_text'), __('1 Comment', 'tm_myid_text'), __( '% Comments', 'tm_myid_text') );?>
						</div>
						
						<div class="tm_catpost_item_5">
						<i class="fa fa-eye"></i> 
						<?php echo tm_viewcounter_display(get_the_ID()); ?>
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
				
				<div class="tm_cat_desc_home5">
					<div class="tmpost-desc">
					<?php echo excerpt(300); ?> 
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

<?php get_footer(); ?>