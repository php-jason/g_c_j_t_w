<?php
// add a custom class to wp attachment link
function modify_attachment_link( $markup, $id, $size, $permalink ) {
    global $post;
    if ( ! $permalink ) {
        $markup = str_replace( '<a href', '<a class="swipebox" rel="galleryid-'. $post->ID .'" href', $markup );
    }
    return $markup;
}
add_filter( 'wp_get_attachment_link', 'modify_attachment_link', 10, 4 );
?>