<?php

namespace Entity;

use Field\File;

final class Ghid extends Entity {
  private $title;
  private $nume;
  private $inainteaEvenimentului;
  private $inTimpulEvenimentului;
  private $dupaEveniment;
  private $informatiiAditionale;
  private $ghiduriSimilare;
  private $permalink;
  private $ghidPDF;
  private $galerieFoto;
  private $pictograma;

  public function getTitle(): string {
    return $this->title;
  }

  public function setTitle(string $title): Ghid {
    $this->title = $title;
    return $this;
  }

  public function getNume(): string {
    return $this->nume;
  }

  public function setNume(string $nume): Ghid {
    $this->nume = $nume;
    return $this;
  }

  public function getInainteaEvenimentului(): string {
    return $this->inainteaEvenimentului;
  }

  public function setInainteaEvenimentului(
    string $inainteaEvenimentului
  ): Ghid {
    $this->inainteaEvenimentului = $inainteaEvenimentului;
    return $this;
  }

  public function getInTimpulEvenimentului(): string {
    return $this->inTimpulEvenimentului;
  }

  public function setInTimpulEvenimentului(
    string $inTimpulEvenimentului
  ): Ghid {
    $this->inTimpulEvenimentului = $inTimpulEvenimentului;
    return $this;
  }

  public function getDupaEveniment(): string {
    return $this->dupaEveniment;
  }

  public function setDupaEveniment(string $dupaEveniment): Ghid {
    $this->_dupaEveniment = $dupaEveniment;
    return $this;
  }

  public function getInformatiiAditionale(): ?string{
    return $this->informatiiAditionale;
  }

  public function setInformatiiAditionale(
    ?string $informatiiAditionale
  ): Ghid {
    $this->informatiiAditionale = $informatiiAditionale;
    return $this;
  }

  public function getVideoAjutator(): ?string{
    return $this->videoAjutator;
  }

  public function setVideoAjutator(?string $videoAjutator): Ghid {
    $this->videoAjutator = $videoAjutator;
    return $this;
  }

  public function getGhidPDF(): ?array {
    return $this->ghidPDF;
  }

  public function setGhidPDF(?array $ghidPDF): Ghid {
    if ($ghidPDF === null) {
      return $this;
    }

    $this->ghidPDF = new File($ghidPDF);
    return $this;
  }

  public function getGalerieFoto(): ?array {
    return $this->galerieFoto;
  }

  public function setGalerieFoto(?array $galerieFoto): Ghid {
    if ($galerieFoto === null) {
      return $this;
    }

    $this->galerieFoto = new File($galerieFoto);
    return $this;
  }

  public function getPictograma(): \Field\File {
    return $this->pictograma;
  }

  public function setPictograma(array $pictograma): Ghid {
    $this->pictograma = new File($pictograma);
    return $this;
  }

  public function getGhiduriSimilare(): ?array {
    return $this->setGhiduriSimilare;
  }

  public function setGhiduriSimilare(?array $ghiduriSimilare): Ghid {
    $this->setGhiduriSimilare = $ghiduriSimilare;
    return $this;
  }

  public function getPermalink(): string {
    return $this->permalink;
  }

  public function setPermalink(string $permalink): Ghid {
    $this->permalink = $permalink;
    return $this;
  }
}
