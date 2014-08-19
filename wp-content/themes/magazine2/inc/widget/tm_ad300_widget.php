<?php
 /*
Plugin Name: TM Ad 300 Widget (Sidebar)
Description: Using this widget for embed Ad in sidebar (Right area). Width 300px and height automatically adjust.
Author: Template.my.id
Version: 1.0
Author URI: Template.my.id
License: GPL2 
*/

// Start class name widget //

class TM_Ad300px_Widget extends WP_Widget {

// Constructor //

	function TM_Ad300px_Widget() {
		$widget_ops = array('classname' => 'tm_ad300_widget', 'description' => 'Using this widget for embed Ad in sidebar (Right area). Width 300px and height automatically adjust.');
		$control_ops = array('width' => 410, 'height' => 360);
		$this->WP_Widget('tmmyid_ad300_widget' , 'TM Ad 300 Widget (Sidebar)', $widget_ops );
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
		if( !isset( $title ) ) {	
		echo $before_title . $title . $after_title;	
		}
		
		/* Display the widget */
		if( isset( $template ) ) { 
		echo '<div class="tm_widget_ad300px"> '.$template.' </div>';
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
		$instance['title'] = strip_tags( $new_instance['title'] );
		
		// htmlspecialchars to save html markup in database, at frontend we use htmlspecialchars_decode
		$instance['template'] = htmlspecialchars($new_instance['template']);
	
		return $instance;
	}
	
	/**
	 * Displays the widget settings controls on the widget panel.
	 *
	 * Backend widget options form
	 */
	function form( $instance ) {
		$defaults = array( 
			'title' => 'Ads', 
			'template' => '<a href="#"><img src="http://i.imgur.com/e1QaSxk.png" alt="ads"></a>',
						);
						
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>	
		<p>
			<label for="<?php echo $this->get_field_id('template'); ?>"><?php _e('Insert your ad code (300 x 250 pixel):', 'tm_myid_text'); ?></label>
			<textarea id="<?php echo $this->get_field_id('template'); ?>" name="<?php echo $this->get_field_name('template'); ?>"  style="width:100%;height:100px;"><?php echo $instance['template']; ?></textarea>
		</p>
		
	<?php
	}
} 

// Add function to widgets_init //
add_action('widgets_init', create_function('', 'return register_widget("TM_Ad300px_Widget");'));

// Portfolio link //
add_filter('plugin_row_meta', 'tmmyid_ad300px_link', 10, 2);
function tmmyid_ad300px_link($links, $file) {
	if ($file == plugin_basename(__FILE__)) {
		$portfolio_link = '<a href="http://themeforest.net/user/vickystudio/portfolio">View Portfolio</a>';
		$links[] = $portfolio_link;
	}
	return $links;
}