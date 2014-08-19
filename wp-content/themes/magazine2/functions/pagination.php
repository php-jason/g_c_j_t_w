<?php

/* pagination */
function tm_pagination_nav() {
	global $wp_query;  
		$big = 999999999; // need an unlikely integer
		echo paginate_links( array(
			'base'			=> str_replace( $big, '%#%', get_pagenum_link( $big ) ),
			'format'		=> '?paged=%#%',
			'show_all'		=> False,
			'prev_next'		=> True,
			'prev_text'		=> '&laquo ',
			'next_text'		=> ' &raquo',
			'current'		=> max( 1, get_query_var('paged') ),
			'total'			=> $wp_query->max_num_pages
		) );
}

?>