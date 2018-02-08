<?php
  final class CampaignIndexCustomFields extends IndexCustomFields {
    public function index(): array {
      $newAttributes = array(
        'title' => $this->entity->getTitle(),
        'content' => strip_tags(
          $this->entity->getContent()
        ),
        'extras' => $this->entity->getExtras(),
        //images' => $this->entity->getImage()['url'],
      );

      return array_merge($this->attributes, $newAttributes);
    }
  }
