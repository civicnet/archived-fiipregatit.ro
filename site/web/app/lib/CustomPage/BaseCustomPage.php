<?php

  namespace CustomPage;

  abstract class BaseCustomPage {
    const PAGE_NAME = null;

    protected static $instance = array();
    protected $wpObject;

    final protected function __construct(
      \WP_Post $wp_object
    ) {
      $this->wpObject = $wp_object;
    }

    final public static function get(
    ): BaseCustomPage {
      if (isset(static::$instance[static::PAGE_NAME])) {
        return static::$instance[static::PAGE_NAME];
      }

      $args = array(
        'pagename' => static::PAGE_NAME,
      );

      $query = new \WP_Query($args);
      $page = $query->get_queried_object();
      if (!$page) {
        throw new \Exception(sprintf(
          'Couldn\'t query page `%s`',
          static::PAGE_NAME
        ));
      }

      static::$instance[static::PAGE_NAME] = new static($page);
      return static::$instance[static::PAGE_NAME];
    }

    abstract public function getPage()/*: Entity*/;
  }
