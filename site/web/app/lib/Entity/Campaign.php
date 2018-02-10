<?php
namespace Entity;

use Field\File;

class Campaign extends Entity {
  private $title;
  private $content;
  private $image;
  private $date;
  private $permalink;
  private $extras;
  private $attachments;
  private $similarGuides;

  public function getTitle(): string {
    return $this->title;
  }

  public function setTitle(string $title): Campaign {
    $this->title = $title;
    return $this;
  }

  public function getExtras(): string {
    return $this->extras;
  }

  public function setExtras(string $extras): Campaign {
    $this->extras = $extras;
    return $this;
  }

  public function getContent(): string {
    return $this->content;
  }

  public function setContent(string $content): Campaign {
    $this->content = $content;
    return $this;
  }

  public function getAttachments(): ?array{
    return $this->attachments;
  }

  public function setAttachments(?array $attachments): Campaign {
    $this->attachments = $attachments;
    return $this;
  }

  public function getImage(): ?array {
    return $this->image;
  }

  public function setImage(?array $image): Campaign {
    $this->image = $image;
    return $this;
  }

  public function getDate(): \DateTime {
    return $this->date;
  }

  public function setDate(\DateTime $date): Campaign {
    $this->date = $date;
    return $this;
  }

  public function getPermalink(): string {
    return $this->permalink;
  }

  public function setPermalink(string $permalink): Campaign {
    $this->permalink = $permalink;
    return $this;
  }

  public function getSimilarGuides(): ?array {
    return $this->similarGuides;
  }

  public function setSimilarGuides(array $similar_guides): Campaign {
    $this->similarGuides = $similar_guides;
    return $this;
  }

}
