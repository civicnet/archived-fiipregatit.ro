<?php
namespace Repository;

use Entity\Entity;

/**
 * Class AbstractRepository
 * Common functionality of a repository
 * @package Repository
 */
abstract class AbstractRepository
{
    /**
     * @var string The customer post type that the repo should opperate with
     */
    protected $customPostType;

    /**
     * @param int $count
     * @param array $extraArgs
     * @return Entity[]
     */
    public function getList($count = -1, $extraArgs = [])
    {
        $args = array(
            'post_type' => $this->customPostType,
            'post_status' => 'publish',
            'posts_per_page' => $count,
            'ignore_sticky_posts' => 1
        );

        if (!empty($extraArgs)) {
            $args = array_merge($args, $extraArgs);
        }

        $my_query = new \WP_Query($args);
        if (!$my_query->have_posts()) {
            return [];
        }

        $entities = [];
        while ($my_query->have_posts()) {
            $my_query->the_post();
            $post = get_post(get_the_ID());
            $entities[get_the_ID()] = $this->getEntity($post, true);
        }
        wp_reset_query();  // Restore global post data stomped by the_post().

        return $entities;
    }

    /**
     * @param \WP_Post $post
     * @return Entity
     */
    public function getByPost(\WP_Post $post)
    {
        if ($post->post_type !== $this->customPostType) {
            throw new \RuntimeException(
                sprintf(
                    'You are trying to load an entity from the wrong repo. "%s" type in "%s" repo',
                    $post->post_type,
                    $this->customPostType
                )
            );
        }

        return $this->getEntity($post);
    }

    /**
     * @param \WP_Post $post
     * @param bool $includeRelated
     * @return mixed
     */
    abstract protected function getEntity(\WP_Post $post, bool $includeRelated = false);
}
