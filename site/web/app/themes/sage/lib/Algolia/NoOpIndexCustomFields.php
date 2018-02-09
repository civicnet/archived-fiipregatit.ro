<?php

  final class NoOpIndexCustomFields extends IndexCustomFields {
    protected function getCustomAttributes(): array {
      return array();
    }
  }
