<?php
namespace Repository;

use Entity\LinkUtil;

class LinkuriUtileRepository extends AbstractRepository
{
    /**
     * @var string
     */
    protected $_customPostType = \App::POST_TYPE_LINK_UTIL;

    /**
     * @param \WP_Post $post
     * @param bool $includeRelated
     * @return LinkUtil
     */
    protected function getEntity(
      \WP_Post $post,
      bool $includeRelated = false
    ) {
        $linkUtil = new LinkUtil($post->ID);

        $linkUtil
            ->setTitle($post->post_title)
            ->setTarget( get_field('link_util_target') )
        ;

        return $linkUtil;
    }

}
