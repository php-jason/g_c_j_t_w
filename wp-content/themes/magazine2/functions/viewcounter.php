<?php
// function to display number of posts in category.
function tm_viewcounter_display($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}

// function to count views in post.
function tm_viewcounter_post($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
		return $count . ' View';
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
		if($count == '1'){
        return $count . ' View';
        }
        else {
        return $count . ' Views';
        }
    }
}


// Add it to a column in WP-Admin
add_filter('manage_posts_columns', 'posts_column_views');
add_action('manage_posts_custom_column', 'posts_custom_column_views',5,2);
function posts_column_views($defaults){
    $defaults['post_views'] = _e('Views', 'tm_myid_text');
    return $defaults;
}
function posts_custom_column_views($column_name, $id){
	if($column_name === 'post_views'){
        echo tm_viewcounter_display(get_the_ID());
    }
}
?>