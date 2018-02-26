<?php
  use Roots\Sage\Assets;

  final class AboutIndexCustomFields extends IndexCustomFields {
    protected function getCustomAttributes(): array {
      return array(
        'title' => 'Despre fiipregatit.ro',
        'image' => Assets\asset_path('images/Logo_DSU.svg'),
        'permalink' => $this->entity->getPermalink(),
        'type' => 'Pagină',
        'weight' => 0,
      );
    }

    public function getContent(): string {
      return $this->entity->getDespre() . ' '
      . $this->entity->getContext() . ' '
      . $this->entity->getParteneri() . ' '
      . $this->entity->getEchipa();
    }
  }
