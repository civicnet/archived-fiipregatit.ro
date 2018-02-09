<?php

  final class GuideIndexCustomFields extends IndexCustomFields {
    protected function getCustomAttributes(): array {
      return array(
        'nume' => $this->entity->getNume(),
        'inaintea_evenimentului' => strip_tags(
          $this->entity->getInainteaEvenimentului()
        ),
        'dupa_eveniment' => strip_tags(
          $this->entity->getDupaEveniment()
        ),
        'in_timpul_evenimentului' => strip_tags(
          $this->entity->getInTimpulEvenimentului()
        ),
        'informatii_aditionale' => strip_tags(
          $this->entity->getInformatiiAditionale()
        ),
        'image' => $this->entity->getPictograma()->getUrl(),
        'preview_text' => strip_tags(
          $this->entity->getInainteaEvenimentului()
        ),
      );
    }
  }
