<?php
/*
Plugin Name: TM Video Widget (Sidebar)
Plugin URI:
Description: Using this widget for embed any video in sidebar (Right area).
Author: Template.my.id
Version: 1.0
Author URI: Template.my.id
License: GPL2 
*/

// Start class name widget //

class TM_Today_Video_Widget extends WP_Widget {

// Constructor //

	function TM_Today_Video_Widget() {
		$widget_ops = array( 'classname' => 'tm_widget_today_video', 'description' => __('Using this widget for embed any video in sidebar (Right area).', 'today_video') );
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'today_video' );
		$this->WP_Widget('tmmyid_today_video', __( 'TM Video Widget (Sidebar)' , 'today_video' ), $widget_ops );
	}

	/**
	 * The frontend function
	 */
	function widget( $args, $instance ) {
		extract( $args );
		
		/* Our variables from the widget settings. */
		if(isset($instance))
		{
			if( isset( $instance[ 'title' ] ) ) {
				$title = apply_filters( 'widget_title', $instance[ 'title' ] );
			}
						
			if( isset( $instance[ 'template' ] ) ) {
				$template = htmlspecialchars_decode( $instance[ 'template' ] );
			}
		}
			
		/* Before widget (defined by themes). */
		if( isset( $before_widget ) ) {
		echo $before_widget;
		}
		
		/* Display the widget title if one was input (before and after defined by themes). */
		if( isset( $title ) ) {	
		echo $before_title . $title . $after_title;	
		}
		
		/* Display the widget video */
		if( isset( $template ) ) { 
		echo '<div class="tm_today_video"> '.$template.' </div>';
		}
		
		/* After widget (defined by themes). */
		echo $after_widget;
		
	}
	
	
	/**
	 * Backend widget settings
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['title'] = 			strip_tags( $new_instance['title'] );
		
		// htmlspecialchars to save html markup in database, at frontend we use htmlspecialchars_decode
		$instance['template'] = 		htmlspecialchars($new_instance['template']);
	
		return $instance;
	}
	
	/**
	 * Displays the widget settings controls on the widget panel.
	 *
	 * Backend widget options form
	 */
	function form( $instance ) {
		$defaults = array( 
			'title' => 'Today Video', 
			'template' => __('<iframe width="300" height="180" src="http://www.youtube.com/embed/Xrt1V_XhvSk?showinfo=0" allowfullscreen></iframe>', 'today_video'),
						);
						
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'hybrid'); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="widefat" type="text" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'template' ); ?>"><?php _e('Embed video code:', 'hybrid'); ?></label>
			<textarea id="<?php echo $this->get_field_id( 'template' ); ?>" name="<?php echo $this->get_field_name( 'template' ); ?>"  style="width:100%;height:100px;"><?php echo $instance['template']; ?></textarea>
		</p>
		
<?php
	}
} 

// Add function to widgets_init //
add_action( 'widgets_init', create_function( '', 'return register_widget("TM_Today_Video_Widget");'));

// Portfolio link //
add_filter('plugin_row_meta', 'tmmyid_todayvideo_link', 10, 2);
function tmmyid_todayvideo_link($links, $file) {
	if ($file == plugin_basename(__FILE__)) {
		$portfolio_link = '<a href="http://themeforest.net/user/vickystudio/portfolio">View Portfolio</a>';
		$links[] = $portfolio_link;
	}
	return $links;
}