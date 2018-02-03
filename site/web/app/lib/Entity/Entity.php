<?php

namespace Entity;

abstract class Entity {
  protected $id;

  public function __construct(int $id) {
    $this->_id = $id;
  }

  public function getId(): int {
    return $this->_id;
  }
}
