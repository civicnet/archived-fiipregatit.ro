<?php

  use Roots\Sage\Assets;

  final class CampaignMetaGenerator extends MetaGenerator {
    protected function getCustomTags(): array {
      return array(
        MetaCategories::OPEN_GRAPH => array(
          OpenGraphMetaCategory::TYPE => array(
            OpenGraphArticleAttributes::TYPE => OpenGraphArticleAttributes::TYPE_NAME,
            OpenGraphArticleAttributes::PUBLISHED_TIME => $this->post->post_date,
            OpenGraphArticleAttributes::MODIFIED_TIME => $this->post->modified
          ),
          OpenGraphMetaCategory::IMAGE => $this->getOGPImage(),
        ),
        MetaCategories::COMMON => array(
          CommonMetaCategory::DESCRIPTION => $this->getCommonDescription(),
          CommonMetaCategory::TITLE => $this->getCommonTitle(),
        )
      );
    }

    /**
     *  return array(
     *    OpenGraphMetaCategory::TITLE => CommonMetaCategory::TITLE,
     *  )
     */
    function importCommonTagsToOpenGraph(): array {
      return array(
        OpenGraphMetaCategory::TITLE => CommonMetaCategory::TITLE,
        OpenGraphMetaCategory::DESCRIPTION => CommonMetaCategory::DESCRIPTION,
      );
    }

   function importCommonTagsToMeta(): array {
     return array(
       MetaMetaCategory::TITLE => CommonMetaCategory::TITLE,
       MetaMetaCategory::DESCRIPTION => CommonMetaCategory::DESCRIPTION,
       MetaMetaCategory::GOOGLE_VERIFICATION => CommonMetaCategory::GOOGLE_VERIFICATION,
       MetaMetaCategory::COPYRIGHT => CommonMetaCategory::COPYRIGHT,
       MetaMetaCategory::AUTHOR => CommonMetaCategory::AUTHOR,
     );
   }

   public function getCommonTitle(): ?string {
     return $this->entity->getTitle();
   }

    public function getCommonDescription(): ?string {
      return substr(
        strip_tags($this->entity->getExtras()),
        0,
        300
      );
    }

    public function getOGPImage(): array {
      $image = $this->getFeaturedImage();

      if (!$image) {
        $image = Assets\asset_path('images/share_fb_campanii.jpg');
      }

      return array(
        OpenGraphImageAttributes::TYPE => $image,
        OpenGraphImageAttributes::SECURE_URL => $image,
        OpenGraphImageAttributes::IMAGE_ALT => $this->getCommonTitle(),
      );
    }
  }
