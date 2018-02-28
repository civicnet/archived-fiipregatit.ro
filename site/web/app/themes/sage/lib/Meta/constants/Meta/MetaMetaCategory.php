<?php

  final class MetaMetaCategory {
    private function __construct() {}

    const TITLE = 'title';
    const DESCRIPTION = 'description';
    const RATING = 'rating';
    const WEB_AUTHOR = 'web_author';
    const GOOGLE_VERIFICATION = 'google-site-verification';
    const COPYRIGHT = 'copyright';
    const AUTHOR = 'author';

    public static function getList(): array {
      return array(
        self::TITLE,
        self::DESCRIPTION,
        self::RATING,
        self::WEB_AUTHOR,
        self::GOOGLE_VERIFICATION,
        self::COPYRIGHT,
        self::AUTHOR,
      );
    }
  }
