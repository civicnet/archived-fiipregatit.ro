<?php

namespace Entity;

use Field\File;

final class PersonalPlan extends Entity {
  private $apa;
  private $alimente;
  private $imbracaminteSiIncaltaminte;
  private $sacDeDormit;
  private $trusaPrimAjutor;
  private $aparateUtile;
  private $articoleDeIgiena;
  private $actePersonale;
  private $descriereRucsac;
  private $descriereTabel;
  private $tabelPDF;

  public function getApa(): string {
    return $this->apa;
  }

  public function setApa(string $apa): PersonalPlan {
    $this->apa = $apa;
    return $this;
  }

  public function getAlimente(): string {
    return $this->alimente;
  }

  public function setAlimente(string $alimente): PersonalPlan {
    $this->alimente = $alimente;
    return $this;
  }

  public function getImbracaminteSiIncaltaminte(): string {
    return $this->imbracaminteSiIncaltaminte;
  }

  public function setImbracaminteSiIncaltaminte(
    string $imbracaminteSiIncaltaminte
  ): PersonalPlan {
    $this->imbracaminteSiIncaltaminte = $imbracaminteSiIncaltaminte;
    return $this;
  }

  public function getSacDeDormit(): string {
    return $this->sacDeDormit;
  }

  public function setSacDeDormit(string $sacDeDormit): PersonalPlan {
    $this->sacDeDormit = $sacDeDormit;
    return $this;
  }

  public function getTrusaPrimAjutor(): string {
    return $this->trusaPrimAjutor;
  }

  public function setTrusaPrimAjutor(string $trusaPrimAjutor): PersonalPlan {
    $this->trusaPrimAjutor = $trusaPrimAjutor;
    return $this;
  }

  public function getAparateUtile(): string{
    return $this->aparateUtile;
  }

  public function setAparateUtile(string $aparateUtile): PersonalPlan {
    $this->aparateUtile = $aparateUtile;
    return $this;
  }

  public function getArticoleDeIgiena(): string{
    return $this->articoleDeIgiena;
  }

  public function setArticoleDeIgiena(string $articoleDeIgiena): PersonalPlan {
    $this->articoleDeIgiena = $articoleDeIgiena;
    return $this;
  }

  public function getActePersonale(): string{
    return $this->actePersonale;
  }

  public function setActePersonale(string $actePersonale): PersonalPlan {
    $this->actePersonale = $actePersonale;
    return $this;
  }

  public function getDescriereRucsac(): string{
    return $this->descriereRucsac;
  }

  public function setDescriereRucsac(string $descriereRucsac): PersonalPlan {
    $this->descriereRucsac = $descriereRucsac;
    return $this;
  }

  public function getDescriereTabel(): string{
    return $this->descriereTabel;
  }

  public function setDescriereTabel(string $descriereTabel): PersonalPlan {
    $this->descriereTabel = $descriereTabel;
    return $this;
  }

  public function getTabelPDF(): File {
    return $this->tabelPDF;
  }

  public function setTabelPDF(array $tabelPDF): PersonalPlan {
    if ($tabelPDF === null) {
      return $this;
    }

    $this->tabelPDF = /*$tabelPDF;*/ new File($tabelPDF);
    return $this;
  }
}
