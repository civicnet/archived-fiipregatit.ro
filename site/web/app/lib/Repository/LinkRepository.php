<?php
namespace Repository;

use Entity\Link;

final class LinkRepository extends AbstractRepository {
  protected static $customPostType = \App::POST_TYPE_LINK;

  protected static function getEntity(
    \WP_Post $post,
    bool $includeRelated = false
  ): Link {
    $linkUtil = new Link($post->ID);

    $linkUtil
        ->setTitle($post->post_title)
        ->setTarget(get_field('link_util_target'))
    ;

    return $linkUtil;
  }
}
