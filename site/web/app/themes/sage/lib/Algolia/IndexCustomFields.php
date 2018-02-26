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
      WP_Post $post,
      array $attributes = array()
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

      switch ($post->post_name) {
        case App::PAGE_FIRST_AID:
          //print_r('First Aid ' . $post->post_name . ' ' . $post->ID);
          return new FirstAidIndexCustomFields(
            $attributes,
            \CustomPageManager::getFirstAidPage()->getPage()
          );
        case App::PAGE_PERSONAL_PLAN:
          //print_r('Personal plan ' . $post->post_name . ' ' . $post->ID);
          return new PersonalPlanIndexCustomFields(
            $attributes,
            \CustomPageManager::getPersonalPlanPage()->getPage()
          );
        case App::PAGE_ABOUT:
          //print_r('About ' . $post->post_name . ' ' . $post->ID);
          return new AboutIndexCustomFields(
            $attributes,
            \CustomPageManager::getAboutPage()->getPage()
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
    abstract public function getContent(): string;
  }
