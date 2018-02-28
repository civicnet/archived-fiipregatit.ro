<?php

namespace Entity;

final class About extends Entity {
  private $despre;
  private $context;
  private $parteneri;
  private $echipa;
  private $permalink;
  private $descriereParteneri;

  public function getDespre(): string {
    return $this->despre;
  }

  public function setDespre(string $despre): About {
    $this->despre = $despre;
    return $this;
  }

  public function getContext(): string {
    return $this->context;
  }

  public function setContext(string $context): About {
    $this->context = $context;
    return $this;
  }

  public function getDescriereParteneri(): ?string {
    return $this->descriereParteneri;
  }

  public function setDescriereParteneri(
    ?string $descriereParteneri
  ): About {
    $this->descriereParteneri = $descriereParteneri;
    return $this;
  }

  public function getParteneri(): array {
    return $this->parteneri;
  }

  public function setParteneri(array $parteneri): About {
    $this->parteneri = $parteneri;
    return $this;
  }

  public function getEchipa(): string {
    return $this->echipa;
  }

  public function setEchipa(string $echipa): About {
    $this->echipa = $echipa;
    return $this;
  }

  public function getPermalink(): string {
    return $this->permalink;
  }

  public function setPermalink(string $permalink): About {
    $this->permalink = $permalink;
    return $this;
  }
}
