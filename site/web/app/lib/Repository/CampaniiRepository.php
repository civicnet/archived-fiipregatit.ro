<?php
namespace Repository;

use Entity\Campanie;

class CampaniiRepository extends AbstractRepository
{
    /**
     * @var string
     */
    protected $_customPostType = \App::POST_TYPE_CAMPANIE;

    /**
     * @param \WP_Post $post
     * @param bool $includeRelated
     * @return Campanie
     */
    protected function _getEntity(\WP_Post $post, $includeRelated = false)
    {
        $campanie = new Campanie($post->ID);

        $campanie
            ->setTitle($post->post_title)
            ->setContent($post->post_content)
            ->setDate(new \DateTime($post->post_date))
            ->setPermalink(get_the_permalink())
            ->setImage(
                wp_get_attachment_url(
                    get_post_thumbnail_id(get_the_ID(), 'single-post-thumbnail')
            ));
        ;

        return $campanie;
    }
}
