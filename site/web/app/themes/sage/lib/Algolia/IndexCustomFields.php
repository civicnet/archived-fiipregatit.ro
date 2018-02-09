<?php
/**
 *   IndexCustomFields::get($attr, $post)->index();
 */
  abstract class IndexCustomFields {
    private $attributes;
    protected $entity;

    final protected function __construct(
      array $attributes,
      /*?Entity*/ $entity = null
    ) {
      $this->attributes = $attributes;
      $this->entity = $entity;
    }

    final public static function get(
      array $attributes,
      WP_Post $post
    ): IndexCustomFields {
      switch ($post->post_type) {
        case App::POST_TYPE_GUIDE:
          return new GuideIndexCustomFields(
            $attributes,
             \RepoManager::getGuideRepository()::getByPost($post)
          );
        case App::POST_TYPE_CAMPAIGN:
          return new CampaignIndexCustomFields(
            $attributes,
             \RepoManager::getCampaignRepository()::getByPost($post)
          );
      }

      // No changes for all other post types
      return new NoOpIndexCustomFields($attributes);
    }

    final public function index(): array {
      return array_merge(
        $this->getDefaultAttributes(),
        $this->getCustomAttributes()
      );
    }

    final protected function getDefaultAttributes(): array {
      return $this->attributes;
    }

    abstract protected function getCustomAttributes(): array;
  }
