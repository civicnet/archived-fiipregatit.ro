<?php

  final class NoOpIndexCustomFields extends IndexCustomFields {
    protected function getCustomAttributes(): array {
      return array(
        'type' => 'noop',
        'weight' => -1,
      );
    }

    public function getContent(): string {
      return '';
    }
  }
