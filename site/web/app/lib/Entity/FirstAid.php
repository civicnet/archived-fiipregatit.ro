<?php

namespace Entity;

use Field\File;

final class FirstAid extends Entity {
  private $arsuraCopii;
  private $intoxicatieAlcoolica;
  private $muscaturiAnimal;
  private $obstructieCaiAeriene;
  private $pierdereCunostinta;
  private $reactieAlergica;
  private $stopCardioRespirator;
  private $traumatismAdulti;
  private $traumatismCopii;
  private $ghidPDF;
  private $pictograma;
  private $permalink;

  public function getArsuraCopii(): string {
    return $this->arsuraCopii;
  }

  public function setArsuraCopii(string $arsuraCopii): FirstAid {
    $this->arsuraCopii = $arsuraCopii;
    return $this;
  }

  public function getIntoxicatieAlcoolica(): string {
    return $this->intoxicatieAlcoolica;
  }

  public function setIntoxicatiaAlcoolica(
    string $intoxicatieAlcoolica
  ): FirstAid {
    $this->intoxicatieAlcoolica = $intoxicatieAlcoolica;
    return $this;
  }

  public function getMuscaturiAnimal(): string {
    return $this->muscaturiAnimal;
  }

  public function setMuscaturiAnimal(
    string $muscaturiAnimal
  ): FirstAid {
    $this->muscaturiAnimal = $muscaturiAnimal;
    return $this;
  }

  public function getObstructieCaiAeriene(): string {
    return $this->obstructieCaiAeriene;
  }

  public function setObstructieCaiAeriene(
    string $obstructieCaiAeriene
  ): FirstAid {
    $this->obstructieCaiAeriene = $obstructieCaiAeriene;
    return $this;
  }

  public function getPierdereCunostinta(): string {
    return $this->pierdereCunostinta;
  }

  public function setPierdereCunostinta(
    string $pierdereCunostinta
  ): FirstAid {
    $this->pierdereCunostinta = $pierdereCunostinta;
    return $this;
  }

  public function getReactieAlergica(): string{
    return $this->reactieAlergica;
  }

  public function setReactieAlergica(
    string $reactieAlergica
  ): FirstAid {
    $this->reactieAlergica = $reactieAlergica;
    return $this;
  }

  public function getStopCardioRespirator(): string{
    return $this->stopCardioRespirator;
  }

  public function setStopCardioRespirator(
    string $stopCardioRespirator
  ): FirstAid {
    $this->stopCardioRespirator = $stopCardioRespirator;
    return $this;
  }

  public function getTraumatismCopii(): string{
    return $this->traumatismCopii;
  }

  public function setTraumatismCopii(
    string $traumatismCopii
  ): FirstAid {
    $this->traumatismCopii = $traumatismCopii;
    return $this;
  }

  public function getTraumatismAdulti(): string{
    return $this->traumatismAdulti;
  }

  public function setTraumatismAdulti(
    string $traumatismAdulti
  ): FirstAid {
    $this->traumatismAdulti = $traumatismAdulti;
    return $this;
  }

  public function getGhidPDF(): File {
    return $this->ghidPDF;
  }

  public function setGhidPDF(array $ghidPDF): FirstAid {
    if ($ghidPDF === null) {
      return $this;
    }

    $this->ghidPDF = new File($ghidPDF);
    return $this;
  }

  public function getPictograma(): File {
    return $this->pictograma;
  }

  public function setPictograma(array $pictograma): FirstAid {
    if ($pictograma === null) {
      return $this;
    }

    $this->pictograma = new File($pictograma);
    return $this;
  }

  public function getPermalink(): string{
    return $this->permalink;
  }

  public function setPermalink(string $permalink): FirstAid {
    $this->permalink = $permalink;
    return $this;
  }

  public function getCuloarePictograma(): ?string{
    return $this->culoarePictograma;
  }

  public function setCuloarePictograma(?string $culoarePictograma): FirstAid {
    $this->culoarePictograma = $culoarePictograma;
    return $this;
  }
}
