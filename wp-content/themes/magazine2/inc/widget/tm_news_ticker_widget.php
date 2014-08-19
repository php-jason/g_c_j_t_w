<?php
/*
Plugin Name: TM News Ticker (Header)
Plugin URI:
Description: This widget for display news ticker post in header or footer area.
Author: Template.my.id
Version: 1.0
Author URI: Template.my.id
License: GPL2 
*/

class TM_News_Ticker_Widget extends WP_Widget {

	// constructor widget class and description	
	function __construct() {
    	$widget_ops = array(
			'classname'   => 'widget_tm_news_ticker_desc', 
			'description' => 'This widget for display news ticker post in header or footer area.'
		);
    	parent::__construct('tmmyid_news_ticker', 'TM News Ticker (Header)', $widget_ops);
	}
	
	// widget form creation for admin
	function form( $instance ) {
	
			$defaults = array(
					'cats' => ''
					);		
			$instance = wp_parse_args( (array) $instance, $defaults, array( 'cats' => '' ) );
		
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$number = isset($instance['number']) ? absint($instance['number']) : 10;
		
?>
        <p style="display:none;"><label for="<?php echo $this->get_field_id('title'); ?>"><?php 'Title:'; ?></label>
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
			
			// Post list in widget
			
			echo "<div class='tm_news_ticker'>";
			
		while ( $crp_widget->have_posts() )
		{
			$crp_widget->the_post();
		?>
		
			<!--<edit>-->
			<ul id="js-news" class="js-hidden">
				<li>
					<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
					<b>[<?php $category = get_the_category(); echo $category[0]->cat_name; ?>]</b> <?php $tit = get_the_title(); echo substr($tit, 0, 100); if (strlen($tit) > 100) echo " [...]"; ?>
					</a>			
				</li>
			</ul>
			<!--</edit>-->
			
		<?php

		}

		 wp_reset_query();

		echo "</div>";
		echo $after_widget;

	}

}

function tm_ntw_register_widgets() {
	register_widget( 'TM_News_Ticker_Widget' );
}

add_action( 'widgets_init', 'tm_ntw_register_widgets' );
?>