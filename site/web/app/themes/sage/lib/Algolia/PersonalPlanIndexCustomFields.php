<?php
  use Roots\Sage\Assets;

  final class PersonalPlanIndexCustomFields extends IndexCustomFields {
    protected function getCustomAttributes(): array {
      return array(
        'title' => 'Trusă de supraviețuire',
        'image' => Assets\asset_path('images/fiipregatit_planpersonal_colaj_v1.svg'),
        'permalink' => '/plan-personal/',
        'type' => 'Trusă de supraviețuire',
        'weight' => 2,
      );
    }

    public function getContent(): string {
      return $this->entity->getApa() . ' '
        . $this->entity->getAlimente() . ' '
        . $this->entity->getImbracaminteSiIncaltaminte() . ' '
        . $this->entity->getSacDeDormit() . ' '
        . $this->entity->getTrusaPrimAjutor() . ' '
        . $this->entity->getAparateUtile() . ' '
        . $this->entity->getArticoleDeIgiena() . ' '
        . $this->entity->getArticoleCopii() . ' '
        . $this->entity->getActePersonale() . ' '
        . $this->entity->getDescriereRucsac() . ' '
        . $this->entity->getDescriereTabel();
    }
  }
