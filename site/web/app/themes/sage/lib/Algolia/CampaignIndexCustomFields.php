<?php
  final class CampaignIndexCustomFields extends IndexCustomFields {
    protected function getCustomAttributes(): array {
      return array(
        'title' => $this->entity->getTitle(),
        'image' => $this->entity->getImage()['url'],
        'permalink' => $this->entity->getPermalink(),
        'type' => 'Campanie',
        'weight' => 1,
      );
    }

    public function getContent(): string {
      return $this->entity->getContent();
    }
  }
