<?php
/**
 *   MetaGenerator::get($post)->getAll();
 */
  abstract class MetaGenerator {
    protected $entity;
    protected $post;

    final protected function __construct(
      WP_Post $post,
      /*?Entity*/ $entity = null
    ) {
      $this->entity = $entity;
      $this->post = $post;
    }

    final public static function get(
      WP_Post $post
    ): MetaGenerator {
      switch ($post->post_type) {
        case App::POST_TYPE_GUIDE:
          return new GuideMetaGenerator(
            $post,
             \RepoManager::getGuideRepository()::getByPost($post)
          );
        case App::POST_TYPE_CAMPAIGN:
          return new CampaignMetaGenerator(
            $post,
             \RepoManager::getCampaignRepository()::getByPost($post)
          );
      }

      switch ($post->post_name) {
        case App::PAGE_FIRST_AID:
          return new FirstAidMetaGenerator(
            $post,
            \CustomPageManager::getFirstAidPage()->getPage()
          );
        case App::PAGE_PERSONAL_PLAN:
          return new PersonalPlanMetaGenerator(
            $post,
            \CustomPageManager::getPersonalPlanPage()->getPage()
          );
        case App::PAGE_ABOUT:
          return new AboutMetaGenerator(
            $post,
            \CustomPageManager::getAboutPage()->getPage()
          );
      }

      return new GenericMetaGenerator($post);
    }

    final public function getAll(): array {
      $all_tags = array();

      $custom_tags = $this->copyAllCommonTags($this->getCustomTags());
      $default_tags = $this->getDefaultTags();

      foreach ($default_tags as $key => $tag) {
        if (!isset($custom_tags[$key])) {
          $all_tags[$key] = $default_tags[$key];
          continue;
        }

        foreach ($custom_tags[$key] as $custom_key => $custom_tag) {
            $all_tags[$key][$custom_key] = $custom_tag;
        }

        foreach ($default_tags[$key] as $default_key => $default_tag) {
          if (!isset($all_tags[$key][$default_key])) {
            $all_tags[$key][$default_key] = $default_tag;
          }
        }
      }

      return $all_tags;
    }

    private function getDefaultTags(): array {
      return array(
        MetaCategories::OPEN_GRAPH => array(
          OpenGraphMetaCategory::LOCALE => 'ro_RO',
          OpenGraphMetaCategory::SITE_NAME => 'fiipregatit.ro',
        ),
        MetaCategories::META => array(
          MetaMetaCategory::RATING => 'safe for kids',
          MetaMetaCategory::WEB_AUTHOR => 'CivicTech România',
        ),
        MetaCategories::COMMON => array(
          CommonMetaCategory::GOOGLE_VERIFICATION => 'Bwb42-YPTWpG3JEUmjkIb_2D1B2yCbdgjbAHRaRs6Pg',
          CommonMetaCategory::COPYRIGHT => 'Copyright © 2018-' . date('Y') . '. Departamentul pentru Situații de Urgență. Toate drepturile rezervate.',
          CommonMetaCategory::AUTHOR => 'Departamentul pentru Situații de Urgență',
          CommonMetaCategory::TITLE => 'fiipregatit.ro',
          CommonMetaCategory::DESCRIPTION => 'Platforma Națională de Pregătire pentru Situații de Urgență',
        )
      );
    }

    final protected function getFeaturedImage(): ?string {
      if (has_post_thumbnail($this->post)) {
        return wp_get_attachment_image_src(get_post_thumbnail_id($post->ID));
      }

      return null;
    }

    /**
     *  return array(
     *    OpenGraphMetaCategory::TITLE => CommonMetaCategory::TITLE,
     *  )
     */
    abstract function importCommonTagsToOpenGraph(): array;
    abstract function importCommonTagsToMeta(): array;

    private function copyAllCommonTags(): array {
      $tags = $this->getCustomTags();

      foreach ($this->importCommonTagsToOpenGraph() as $og_key => $common_key) {
        $tags[MetaCategories::OPEN_GRAPH][$og_key]
          = $this->getCommonTag($common_key);
      }

      foreach ($this->importCommonTagsToMeta() as $meta_key => $common_key) {
        $tags[MetaCategories::META][$meta_key] = $this->getCommonTag($common_key);
      }

      return $tags;
    }

    final protected function getCommonTag(/* CommonMetaCategory */ $tag): string {
      if (isset($this->getCustomTags()[MetaCategories::COMMON][$tag])) {
        return $this->getCustomTags()[MetaCategories::COMMON][$tag];
      }
      return $this->getDefaultTags()[MetaCategories::COMMON][$tag];
    }
  }
