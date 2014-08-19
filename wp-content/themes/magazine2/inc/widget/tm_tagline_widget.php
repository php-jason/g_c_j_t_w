<?php
/*
Plugin Name: TM Tagline Widget (Footer)
Plugin URI:
Description: This widget for display tagline with description in footer wide widget or header widget.
Author: Template.my.id
Version: 1.0
Author URI: Template.my.id
License: GPL2 
*/

// Start class name widget //

class TM_Tagline_Widget extends WP_Widget {

// Constructor //

	function TM_Tagline_Widget() {
		$widget_ops = array('classname' => 'TM_Tagline_Widget', 'description' => 'This widget for display tagline with description in footer wide widget or header widget.');
		$control_ops = array('width' => 410, 'height' => 360);
		$this->WP_Widget('tmmyid_tagline_widget', 'TM Tagline Widget (Footer)', $widget_ops );
	}

	/**
	 * The frontend function
	 */
	function widget( $args, $instance ) {
		extract( $args );
		
		/* Our variables from the widget settings. */
		if(isset($instance))
		{		
			if( isset( $instance[ 'tm_bigtagline' ] ) ) {
				$tm_bigtagline = htmlspecialchars_decode( $instance[ 'tm_bigtagline' ] );
			}
			
			if( isset( $instance[ 'tm_tagline_desctext' ] ) ) {
				$tm_tagline_desctext = apply_filters( 'widget_title', $instance[ 'tm_tagline_desctext' ] );
			}
		}
			
		/* Before widget (defined by themes). */
		if( isset( $before_widget ) ) {
		echo $before_widget;
		}
		
			/* Display the widget */
			if( isset( $tm_bigtagline ) ) { 
			echo '<div class="tmtagline_about_us"><div class="tmtagline_about_us_title"> '.$tm_bigtagline.' </div>';
			}
			
			if( isset( $tm_tagline_desctext ) ) { 
			echo '<div class="tmtagline_about_us_desc"> '.$tm_tagline_desctext.' </div></div>';
			}
		
		/* After widget (defined by themes). */
		echo $after_widget;
		
	}
	
	
	/**
	 * Backend widget settings
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
			
			// htmlspecialchars to save html markup in database, at frontend we use htmlspecialchars_decode
			$instance['tm_bigtagline'] = htmlspecialchars($new_instance['tm_bigtagline']);
			$instance['tm_tagline_desctext'] = htmlspecialchars($new_instance['tm_tagline_desctext']);
	
		return $instance;
	}
	
	/**
	 * Displays the widget settings controls on the widget panel.
	 * Backend widget options form
	 */
	function form( $instance ) {
		$defaults = array( 
			'tm_bigtagline' => 'You only <b><a href="#">live</a></b> once, but if you <b><a href="#">do it</a></b> right, once is enough.',
			'tm_tagline_desctext' => 'Lorem ipsum dolor sit amet. Vivamus quis mattis gravida, sed vehicula metus quam a mi. Praesent dolor felis, consectetur nec convallis vitae, dignissim in est. Integer id lacus sodales neque dapibus pharetra. Suspendisse eu dictum lorem. Nunc id lorem libero.', 
						);
						
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>			
		<p><label for="<?php echo $this->get_field_id('tm_bigtagline'); ?>"><?php _e('Big tagline:', 'tm_myid_text'); ?></label>
		<textarea id="<?php echo $this->get_field_id('tm_bigtagline'); ?>" name="<?php echo $this->get_field_name('tm_bigtagline'); ?>"  style="width:100%;height:100px;"><?php echo $instance['tm_bigtagline']; ?></textarea></p>
		
		<p><label for="<?php echo $this->get_field_id('tm_tagline_desctext'); ?>"><?php _e('Big tagline description:', 'tm_myid_text'); ?></label>
		<textarea id="<?php echo $this->get_field_id('tm_tagline_desctext'); ?>" name="<?php echo $this->get_field_name('tm_tagline_desctext'); ?>"  style="width:100%;height:100px;"><?php echo $instance['tm_tagline_desctext']; ?></textarea></p>
		
	<?php
	}
} 

// Add function to widgets_init //
add_action('widgets_init', create_function('', 'return register_widget("TM_Tagline_Widget");'));

// Portfolio link //
add_filter('plugin_row_meta', 'tmmyid_tagline_link', 10, 2);
function tmmyid_tagline_link($links, $file) {
	if ($file == plugin_basename(__FILE__)) {
		$portfolio_link = '<a href="http://themeforest.net/user/vickystudio/portfolio">View Portfolio</a>';
		$links[] = $portfolio_link;
	}
	return $links;
}