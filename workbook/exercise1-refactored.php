<?php
namespace hellofromTonya\Posts;

/**
 * Checks if the current (or specified) post is of the
 * specified (or wanted) post type.
 *
 * @since 1.0.0
 *
 * @param string $post_type Wanted post type.
 * @param int|WP_Post|null $post_or_post_id Post ID or post object. When `null`,
 *                          WordPress uses global $post.
 *
 * @return bool
 */
function is_post_of_post_type( $post_type, $post_or_post_id = null ) {
	return get_post_type( $post_or_post_id ) == $post_type;
}