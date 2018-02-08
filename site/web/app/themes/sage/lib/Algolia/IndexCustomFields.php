<?php
/**
 *   IndexCustomFields::get($attr, $post)->index();
 */
  abstract class IndexCustomFields {
    private static $instance;

    protected $attributes;
    protected $entity;

    final protected function __construct(
      array $attributes,
      /*AbstractRepository*/ $entity
    ) {
      $this->attributes = $attributes;
      $this->entity = $entity;
    }

    final public static function get(
      array $attributes,
      WP_Post $post
    ): IndexCustomFields {
      if (self::$instance) {
        return self::$instance;
      }

      switch ($post->post_type) {
        case App::POST_TYPE_GUIDE:
          self::$instance = new GuideIndexCustomFields(
            $attributes,
             \RepoManager::getGuideRepository()::getByPost($post)
          );
          break;
        case App::POST_TYPE_CAMPAIGN:
          self::$instance = new CampaignIndexCustomFields(
            $attributes,
             \RepoManager::getCampaignRepository()::getByPost($post)
          );
          break;
        default:
          return null;
      }

      return self::$instance;
    }

    abstract public function index(): array;
  }
