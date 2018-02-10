<?php
namespace Repository;

use Entity\Entity;

abstract class AbstractRepository {
    protected static $customPostType;
    private function __construct() {}

    public static function get(): AbstractRepository {
      /**
       * FIXME: Implement proper caching
       */
      return new static();
    }

    public static function getList(
      int $count = -1,
      $extraArgs = []
    ): array {
      $args = array(
        'post_type' => static::$customPostType,
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
          $entities[get_the_ID()] = static::getEntity($post, true);
      }
      wp_reset_query();  // Restore global post data stomped by the_post().

      return $entities;
    }

    public static function getByPost(
      \WP_Post $post,
      bool $includeRelated = false
    ): Entity {
      if ($post->post_type !== static::$customPostType) {
        throw new \RuntimeException(
          sprintf(
            'You are trying to load an entity from the wrong repo. "%s" type in "%s" repo',
            $post->post_type,
            static::$customPostType
          )
        );
      }

      return static::getEntity($post, $includeRelated);
    }

    protected static function falseyToNull($value) {
      if ($value === false) {
        return null;
      }

      return $value;
    }

    abstract protected static function getEntity(
      \WP_Post $post,
      bool $includeRelated = false
    )/*: Entity*/;
}
