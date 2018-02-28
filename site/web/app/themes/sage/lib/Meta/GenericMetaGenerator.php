<?php

  use Roots\Sage\Assets;

  final class GenericMetaGenerator extends MetaGenerator {
    protected function getCustomTags(): array {
      return array(
        MetaCategories::OPEN_GRAPH => array(
          OpenGraphMetaCategory::TYPE => array(
            OpenGraphWebsiteAttributes::TYPE => OpenGraphWebsiteAttributes::TYPE_NAME,
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
     return $this->post ?
       the_title($before = '', $after = '', $echo = false)
       : 'fiipregatit.ro - Platforma Națională de Pregătire pentru Situații de Urgență';
   }

    public function getCommonDescription(): ?string {
      return 'Platforma națională online de pregătire pentru situații de urgență fiipregatit.ro, locul de referință pentru educarea și informarea populației despre situații de urgență sau dezastru.';
    }

    public function getOGPImage(): array {
      $image = null;

      if ($this->post) {
        switch($this->post->post_name) {
          case App::PAGE_CAMPANII:
            $image = Assets\asset_path('images/share_fb_campanii.jpg');
            break;
          case App::PAGE_GHIDURI:
            $image = Assets\asset_path('images/share_fb_ghiduri.jpg');
            break;
        }
      }

      if (!$image) {
        $image = $this->getFeaturedImage();
      }

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
