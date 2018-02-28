<?php

  final class OpenGraphMetaCategory {
    private function __construct() {}

    // artificial
    const IMAGE = 'image';
    const TYPE = 'type';

    // opg tags
    const LOCALE = 'og:locale';
    const SITE_NAME = 'og:site_name';
    const DESCRIPTION = 'og:description';
    const TITLE = 'og:title';
    const URL = 'og:url';

    public static function getList(): array {
      return array(
        self::IMAGE,
        self::TYPE,
        self::LOCALE,
        self::SITE_NAME,
        self::DESCRIPTION,
        self::TITLE,
        self::URL
      );
    }
  }
