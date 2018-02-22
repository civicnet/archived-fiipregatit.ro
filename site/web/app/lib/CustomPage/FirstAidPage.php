<?php

  namespace CustomPage;
  use Entity\FirstAid;

  final class FirstAidPage extends BaseCustomPage {
    const PAGE_NAME = \App::PAGE_FIRST_AID;

    public function getPage(): FirstAid {
      return (new FirstAid($this->wpObject->ID))
        ->setArsuraCopii(get_field('arsura_la_copii', $this->wpObject->ID))
        ->setIntoxicatiaAlcoolica(
          get_field('intoxicatia_alcoolica', $this->wpObject->ID)
        )
        ->setMuscaturiAnimal(
          get_field('muscaturile_de_animal', $this->wpObject->ID)
        )
        ->setObstructieCaiAeriene(
          get_field('obstructia_cailor_aeriene_la_copii', $this->wpObject->ID)
        )
        ->setPierdereCunostinta(
          get_field('pierderea_cunostintei', $this->wpObject->ID)
        )
        ->setReactieAlergica(
          get_field('reactia_alergica', $this->wpObject->ID)
        )
        ->setStopCardioRespirator(
          get_field('stopul_cardio_respirator', $this->wpObject->ID)
        )
        ->setTraumatismAdulti(get_field(
          'traumatismul_cranio_cerebral_la_adulti',
          $this->wpObject->ID
        ))
        ->setTraumatismCopii(get_field(
          'traumatismul_cranio_cerebral_la_copii',
          $this->wpObject->ID
        ))
        ->setGhidPDF(get_field('ghid_pdf', $this->wpObject->ID))
        ->setPictograma(get_field('pictograma', $this->wpObject->ID))
        ->setPermalink(get_page_link($this->wpObject->ID));
    }
  }
