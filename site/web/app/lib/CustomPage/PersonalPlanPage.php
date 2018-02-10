<?php

  namespace CustomPage;
  use Entity\PersonalPlan;

  final class PersonalPlanPage extends BaseCustomPage {
    const PAGE_NAME = \App::PAGE_PERSONAL_PLAN;

    public function getPage(): PersonalPlan {
      return (new PersonalPlan($this->wpObject->ID))
        ->setApa(get_field('apa'), $this->wpObject->ID)
        ->setAlimente(get_field('alimente', $this->wpObject->ID))
        ->setImbracaminteSiIncaltaminte(
          get_field('imbracaminte_si_incaltaminte', $this->wpObject->ID)
        )
        ->setSacDeDormit(
          get_field('sac_de_dormit', $this->wpObject->ID)
        )
        ->setTrusaPrimAjutor(
          get_field('trusa_prim_ajutor', $this->wpObject->ID)
        )
        ->setAparateUtile(
          get_field('aparate_utile', $this->wpObject->ID)
        )
        ->setArticoleDeIgiena(
          get_field('articole_de_igiena', $this->wpObject->ID)
        )
        ->setActePersonale(
          get_field('acte_personale', $this->wpObject->ID)
        )
        ->setDescriereRucsac(
          get_field('descriere_rucsac_supravietuire', $this->wpObject->ID)
        )
        ->setDescriereTabel(
          get_field('descriere_tabel_informatii_utile', $this->wpObject->ID)
        )
        ->setTabelPDF(
          get_field('tabel_pdf', $this->wpObject->ID)
        );
    }
  }
