<?php

namespace Entity;

use Field\File;

final class Guide extends Entity {
  private $title;
  private $nume;
  private $inainteaEvenimentului;
  private $inTimpulEvenimentului;
  private $dupaEveniment;
  private $informatiiAditionale;
  private $similarGuides;
  private $permalink;
  private $guidePDF;
  private $galerieFoto;
  private $pictograma;

  public function getTitle(): string {
    return $this->title;
  }

  public function setTitle(string $title): Guide {
    $this->title = $title;
    return $this;
  }

  public function getNume(): string {
    return $this->nume;
  }

  public function setNume(string $nume): Guide {
    $this->nume = $nume;
    return $this;
  }

  public function getInainteaEvenimentului(): string {
    return $this->inainteaEvenimentului;
  }

  public function setInainteaEvenimentului(
    string $inainteaEvenimentului
  ): Guide {
    $this->inainteaEvenimentului = $inainteaEvenimentului;
    return $this;
  }

  public function getInTimpulEvenimentului(): string {
    return $this->inTimpulEvenimentului;
  }

  public function setInTimpulEvenimentului(
    string $inTimpulEvenimentului
  ): Guide {
    $this->inTimpulEvenimentului = $inTimpulEvenimentului;
    return $this;
  }

  public function getDupaEveniment(): string {
    return $this->dupaEveniment;
  }

  public function setDupaEveniment(string $dupaEveniment): Guide {
    $this->dupaEveniment = $dupaEveniment;
    return $this;
  }

  public function getInformatiiAditionale(): ?string{
    return $this->informatiiAditionale;
  }

  public function setInformatiiAditionale(
    ?string $informatiiAditionale
  ): Guide {
    $this->informatiiAditionale = $informatiiAditionale;
    return $this;
  }

  public function getVideoAjutator(): ?string{
    return $this->videoAjutator;
  }

  public function setVideoAjutator(?string $videoAjutator): Guide {
    $this->videoAjutator = $videoAjutator;
    return $this;
  }

  public function getGuidePDF(): ?array {
    return $this->guidePDF;
  }

  public function setGuidePDF(?array $guidePDF): Guide {
    if ($guidePDF === null) {
      return $this;
    }

    $this->guidePDF = $guidePDF;//new File($guidePDF);
    return $this;
  }

  public function getPDFGuideSize(): ?string {
    if (!$this->guidePDF || !$this->guidePDF['url']) {
      return null;
    }

    $arrContextOptions = array();

    /**
      * No valid SSL cert during development, skip verification.
      */
    if (WP_DEBUG) {
      $sslContextOptions = array(
        'verify_peer' => false,
        'verify_peer_name' => false,
      );
    }

    $pdftext = file_get_contents(
      $this->guidePDF['url'],
      $use_include_path = false,
      stream_context_create(array('ssl' => $sslContextOptions))
    );

    preg_match_all("/\/Count\s+(\d+)/", $pdftext, $matches);
    if (!$matches) {
      return null;
    }

    $count = intval($matches[1][0]);
    if ($count) {
      return $count . ' pagini';
    }

    stream_context_set_default(
      array_merge(
        array(
          'http' => array(
            'method' => 'HEAD'
          ),
          'ssl' => $sslContextOptions
        )
      )
    );

    $headers = get_headers($this->guidePDF['url'], $format = 1);
    if (isset($headers['Content-Length'])) {
      return $this->formatBytes(
        $headers['Content-Length']
      );
    }

    return null;
  }

  private function formatBytes(int $bytes, int $precision = 2): string {
    $units = array('B', 'KB', 'MB', 'GB', 'TB');

    $bytes = max($bytes, 0);
    $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
    $pow = min($pow, count($units) - 1);

    $bytes /= (1 << (10 * $pow));

    return round($bytes, $precision) . ' ' . $units[$pow];
  }

  public function getGalerieFoto(): array {
    return $this->galerieFoto;
  }

  public function setGalerieFoto(array $galerieFoto): Guide {
    $this->galerieFoto = $galerieFoto;
    return $this;
  }

  public function getPictograma(): File {
    return $this->pictograma;
  }

  public function setPictograma(array $pictograma): Guide {
    $this->pictograma = new File($pictograma);
    return $this;
  }

  public function getSimilarGuides(): ?array {
    return $this->similarGuides;
  }

  public function setSimilarGuides(array $similar_guides): Guide {
    $this->similarGuides = $similar_guides;
    return $this;
  }

  public function getPermalink(): string {
    return $this->permalink;
  }

  public function setPermalink(string $permalink): Guide {
    $this->permalink = $permalink;
    return $this;
  }
}
