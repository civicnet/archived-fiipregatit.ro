<?php
  final class CampaignIndexCustomFields extends IndexCustomFields {
    protected function getCustomAttributes(): array {
      return array(
        'custom_content' => strip_tags(
          $this->entity->getContent()
        ),
        'extras' => $this->entity->getExtras(),
        'image' => $this->entity->getImage()['url'],
        'preview_text' => strip_tags(
          $this->entity->getContent()
        ),
      );
    }
  }
