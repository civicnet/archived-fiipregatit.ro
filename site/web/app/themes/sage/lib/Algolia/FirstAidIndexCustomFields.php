<?php

  final class FirstAidIndexCustomFields extends IndexCustomFields {
    protected function getCustomAttributes(): array {
      return array(
        'title' => 'Ghid Prim Ajutor',
        'image' => $this->entity->getPictograma()->getUrl(),
        'permalink' => $this->entity->getPermalink(),
        'type' => 'Ghid',
        'weight' => 3,
      );
    }

    public function getContent(): string {
      return $this->entity->getArsuraCopii() . ' '
      . $this->entity->getApel112() . ' '
      . $this->entity->getIntoxicatieAlcoolica() . ' '
      . $this->entity->getMuscaturiAnimal() . ' '
      . $this->entity->getObstructieCaiAeriene() . ' '
      . $this->entity->getPierdereCunostinta() . ' '
      . $this->entity->getReactieAlergica() . ' '
      . $this->entity->getStopCardioRespirator() . ' '
      . $this->entity->getTraumatismCopii() . ' '
      . $this->entity->getTraumatismAdulti();
    }
  }
