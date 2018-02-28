<?php

  use Roots\Sage\Assets;

  final class GenericMetaGenerator extends MetaGenerator {
    protected function getCustomTags(): array {
      return array(
        MetaCategories::OPEN_GRAPH => array(
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
     );
   }

   public function getCommonTitle(): ?string {
     return the_title($before = '', $after = '', $echo = false);
   }

    public function getCommonDescription(): ?string {
      return 'Platforma Națională de Pregătire pentru Situații de Urgență';
    }

    public function getOGPImage(): array {
      $image = $this->getFeaturedImage();

      if (!$image) {
        $image = Assets\asset_path('images/share_fb_default.jpg');
      }

      return array(
        OpenGraphImageAttributes::TYPE => $image,
        OpenGraphImageAttributes::SECURE_URL => $image,
        OpenGraphImageAttributes::IMAGE_ALT => $this->getCommonTitle(),
      );
    }
  }