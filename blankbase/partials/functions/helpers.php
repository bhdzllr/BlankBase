<?php

/**
 * Get page id by title
 * 
 * @param  string $title Page title
 * @return int           Page id
 */
function blankbase_get_page_id_by_title( $title ) {
	$page = get_page_by_title( $title );
	
	return $page->ID;
}

/**
 * Get metadata from attachment by id
 *
 * @param  int   $attachmentId Id of attachment
 * @return array Information about the attachment
 */
function blankbase_get_attachment_meta( $attachmentId ) {
	$attachment = get_post( $attachmentId );

	return array(
		'alt'         => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
		'caption'     => $attachment->post_excerpt,
		'description' => $attachment->post_content,
		'href'        => get_permalink( $attachment->ID ),
		'src'         => $attachment->guid,
		'title'       => $attachment->post_title,
	);
}
