<?php

namespace Entity;


final class Link extends Entity {
  private $title;
  private $target;

  public function getTitle(): string {
    return $this->title;
  }

  public function setTitle(string $title): Link {
    $this->title = $title;
    return $this;
  }

  public function getTarget(): string {
    return $this->target;
  }

  public function setTarget(string $target): Link {
    $this->target = $target;
    return $this;
  }
}
