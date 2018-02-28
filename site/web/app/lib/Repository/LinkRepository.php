<?php
namespace Repository;

use Entity\Link;

final class LinkRepository extends AbstractRepository {
  protected static $customPostType = \App::POST_TYPE_LINK;

  protected static function getEntity(
    \WP_Post $post,
    bool $includeRelated = false
  ): Link {
    $post_content = $post->post_content;
    $post_content = apply_filters('the_content', $post_content);
    return (new Link($post->ID))
      ->setTitle($post->post_title)
      ->setTarget(strip_tags($post_content));
  }
}
