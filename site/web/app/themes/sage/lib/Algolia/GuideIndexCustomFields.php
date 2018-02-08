<?php

  final class GuideIndexCustomFields extends IndexCustomFields {
    public function index(): array {
      $newAttributes = array(
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
      );

      return array_merge($this->attributes, $newAttributes);
    }
  }
