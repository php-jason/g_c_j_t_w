<?php
/*
Plugin Name: TM Blog Dark (Home Left)
Plugin URI:
Description: This widget for display vertical blog (dark or black) with small thumbnail in left area.
Author: Template.my.id
Version: 1.1
Author URI: Template.my.id
License: GPL2 
*/

class TM_Dark_Blog_Widget extends WP_Widget {

	// constructor widget class and description	
	function __construct() {
    	$widget_ops = array(
			'classname'   => 'widget_tm_category_blog_dark_thumbs', 
			'description' => 'This widget for display vertical blog (dark or black) with small thumbnail in Homepage left area.'
		);
    	parent::__construct('tmmyid_dark_blog_thumbs', 'TM Blog Dark (Home Left)', $widget_ops);
	}
	
	// widget form creation for admin
	function form( $instance ) {
	
			$defaults = array(
					'cats' => ''
					);		
			$instance = wp_parse_args( (array) $instance, $defaults, array( 'cats' => '' ) );
		
		$title = isset($instance['title']) ? esc_attr($instance['title']) : 'Recent Blogs';
		$number = isset($instance['number']) ? absint($instance['number']) : 5;
		
?>
        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'tm_myid_text'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
        
        <p>
            <label for="<?php echo $this->get_field_id('cats'); ?>"><?php _e('Select categories to include:', 'tm_myid_text');?> 
            
                <?php
                   $categories=  get_categories('hide_empty=0');
                     echo "<br/>";
                     foreach ($categories as $cat) {
                         $option='<input type="checkbox" id="'. $this->get_field_id( 'cats' ) .'[]" name="'. $this->get_field_name( 'cats' ) .'[]"';
                            if (is_array($instance['cats'])) 
							{
                                foreach ($instance['cats'] as $cats) 
								{
                                    if($cats==$cat->term_id) {
                                         $option=$option.' checked="checked"';
                                    }
                                }
                            }
							
                            $option .= ' value="'.$cat->term_id.'" />';
			    $option .= '&nbsp;';
                            $option .= $cat->cat_name;
                            $option .= '<br />';
                            echo $option;
                         }
                    
                    ?>
            </label>
        </p>
		
		<p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of posts:', 'tm_myid_text'); ?></label>
        <input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>

        
	<?php
	}
	
	// widget field update api
	function update( $new_instance, $old_instance ) {
	$instance = $old_instance;
	$instance['title'] = strip_tags($new_instance['title']);
	$instance['cats'] = $new_instance['cats'];
	$instance['number'] = absint($new_instance['number']);
	     
        return $instance;
	}
	
	// widget output content on website
	function widget($args, $instance) {
			extract( $args );
		
			$title = apply_filters( 'widget_title', empty($instance['title']) ? 'Recent Posts' : $instance['title'], $instance, $this->id_base);	
			if ( ! $number = absint( $instance['number'] ) ) $number = 5;
			if( ! $cats = $instance["cats"] )  $cats='';
					
			// array to call recent posts.
			
			$crpw_args=array(
						   
				'showposts' => $number,
				'category__in'=> $cats,
				);
			
			$crp_widget = null;
			$crp_widget = new WP_Query($crpw_args);
			
			echo $before_widget;
			
			// Widget title
			
			echo $before_title;
			echo $instance["title"];
			echo $after_title;
			
			// Post list in widget
			
			echo "<div class='tm_fullblog_dark'>";
			
		while ( $crp_widget->have_posts() )
		{
			$crp_widget->the_post();
		?>
		
			<!--<edit>-->
			<div class="tm_blogallpost_dark">
			<div <?php post_class(); ?>>
			<div class="blogin_item_dark tm-post-<?php the_ID(); ?>">
			
				<div class="blogin_images_dark">
				<?php if (has_post_thumbnail()) { ?>
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
					<img class="tm_hide" src="<?php $image_id = get_post_thumbnail_id(); $image_url = wp_get_attachment_image_src($image_id,'img100', true); echo $image_url[0]; ?>">
					</a>
					<?php } else { ?>
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/nophoto100.png" /></a>
					<?php } ?>
				</div>
				
				<div class="blogin_title_img_dark">
					<div class="blogin_titles_dark">
						<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
						<?php echo get_the_title(); ?> 
						</a>
					</div>
					
					<div class="blogindesc_dark">
					<?php echo excerpt(170); ?> 
					</div>
				</div>
			</div>
			</div>
			</div>
			<!--</edit>-->
			
		<?php

		}

		 wp_reset_query();

		echo "</div>";
		echo $after_widget;

	}

}

function tm_dbw_register_widgets() {
	register_widget( 'TM_Dark_Blog_Widget' );
}

add_action( 'widgets_init', 'tm_dbw_register_widgets' );
?>