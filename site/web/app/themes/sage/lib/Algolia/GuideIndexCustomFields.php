<?php

  final class GuideIndexCustomFields extends IndexCustomFields {
    protected function getCustomAttributes(): array {
      return array(
        'title' => 'Ghid ' . $this->entity->getNume(),
        'image' => $this->entity->getPictograma()->getUrl(),
        'permalink' => $this->entity->getPermalink(),
        'type' => 'Ghid',
        'weight' => 3,
      );
    }

    public function getContent(): string {
      return $this->entity->getInainteaEvenimentului() . ' '
      . $this->entity->getInTimpulEvenimentului() . ' '
      . $this->entity->getDupaEveniment() . ' '
      . $this->entity->getInformatiiAditionale();
    }
  }
