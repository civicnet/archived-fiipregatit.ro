<?php

namespace Entity;

final class About extends Entity {
  private $despre;
  private $context;
  private $parteneri;
  private $echipa;
  private $permalink;

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

  public function getParteneri(): string {
    return $this->parteneri;
  }

  public function setParteneri(string $parteneri): About {
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
