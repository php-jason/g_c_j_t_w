<?php
/*
Plugin Name: TM Related Posts
Plugin URI:
Description: This widget display related post below post content.
Author: Template.my.id
Version: 1.0
Author URI: Template.my.id
License: GPL2 
*/

// Start class name widget //
class TM_Related_Post_Widget extends WP_Widget {

	/**
	 * Register the widget.
	 */
	public function __construct() {
		parent::__construct(
	 		'tm_related_post', // Base ID
			'TM Related Posts', // Name
			array( 'description' => __( 'This widget display related post below post content.', 'text_domain' ), ) // Args
		);
	}

	/**
	 * The frontend function
	 */
	public function widget( $args, $instance ) {
	 extract( $args );
	 $title = apply_filters( 'widget_title', $instance['title'] );
	 if ( empty( $instance['number'] ) || ! $number = absint( $instance['number'] ) )
 	 $number = 5;
	 $show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;
	 $hide_no_post = isset( $instance['hide_no_post'] ) ? $instance['hide_no_post']:false;
	 $catArray=array();
	 $arg = array( 'posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true);
	 if(is_single())
		 {
		  $postid = get_the_ID(); 
		  $post_cat = get_the_category($postid); 
		  $arg['post__not_in'] = (array) $postid;
		  foreach($post_cat as $category)
		  {
		   array_push($catArray,$category->cat_ID);
		  }
		 }
	 else
		 {
		  return ;
		 }
	 $post_category=implode(',',$catArray);
     $arg['cat'] = $post_category;

     $r = new WP_Query( apply_filters( 'widget_posts_args', $arg) );
	 if($r->post_count==0 && !$hide_no_post):
   	 $arg['cat'] = '';
     $r = new WP_Query( apply_filters( 'widget_posts_args', $arg) );
     endif;
	 //echo "<pre>";print_r($arg);echo "</pre>";die();
	 if ($r->have_posts()) :
     ?>
	 <?php echo $before_widget; ?>
	 <?php if ( $title ) echo $before_title . $title . $after_title; ?>
	 <div class="tm_relatedpost_list">
		 <ul>
		 <?php while ( $r->have_posts() ) : $r->the_post(); ?>
			<li>
			<a href="<?php the_permalink() ?>" title="<?php echo esc_attr( get_the_title() ? get_the_title() : get_the_ID() ); ?>"><?php if ( get_the_title() ) the_title(); else the_ID(); ?></a>
			<?php if ( $show_date ) : ?>
			<span class="post-date"><?php echo get_the_date(); ?></span>
			<?php endif; ?>
			</li>
		 <?php endwhile; ?>
		 </ul>
	 </div>
	 <?php echo $after_widget; ?>
     <?php
	 // Reset the global $the_post as this query will have stomped on it
	 endif;
	}
	
	/**
	 * Sanitize widget form values as they are saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['number'] = (int) $new_instance['number'];
		$instance['show_date'] = (bool) $new_instance['show_date'];
		$instance['hide_no_post'] = (bool)$new_instance['hide_no_post'];
		return $instance;
	}

	/**
	 * Back-end widget form.
	 */
	public function form( $instance ) {
	 if ( isset( $instance[ 'title' ] ) ) {
	  $title = $instance[ 'title' ];
	 }
	 else {
	  $title = __( 'Related Posts', 'text_domain' );
 	 }
	 $number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
	 $show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
	 $hide_no_post    = isset( $instance['hide_no_post'] ) ? (bool)$instance['hide_no_post'] : true;
	?>
	<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'tm_myid_text'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
	</p>
	<p>
	  <label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e('Number of posts:', 'tm_myid_text'); ?></label>
	  <input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $number; ?>" size="3" />
	</p>
	<p>
	  <input class="checkbox" type="checkbox" <?php checked( $hide_no_post ); ?> id="<?php echo $this->get_field_id( 'hide_no_post' ); ?>" name="<?php echo $this->get_field_name( 'hide_no_post' ); ?>" />
	  <label for="<?php echo $this->get_field_id( 'hide_no_post' ); ?>"><?php _e('Hide if no posts to show:', 'tm_myid_text'); ?></label>
	</p>
	<p style="display:none;">
	  <input class="checkbox" type="checkbox" <?php checked( $show_date ); ?> id="<?php echo $this->get_field_id( 'show_date' ); ?>" name="<?php echo $this->get_field_name( 'show_date' ); ?>" />
	  <label for="<?php echo $this->get_field_id( 'show_date' ); ?>"><?php 'Display post date?'; ?></label>
	</p>
	 <?php 
	}
} // class tm_related_post

// register TM_Related_Post_Widget widget
add_action( 'widgets_init', create_function( '', 'register_widget( "TM_Related_Post_Widget" );' ) );
register_deactivation_hook(__FILE__, 'tm_related_post_plugin_deactivate');

function tm_related_post_plugin_deactivate ()
{
 unregister_widget('TM_Related_Post_Widget');
}
?>