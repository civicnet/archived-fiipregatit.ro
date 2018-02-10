<?php

  namespace CustomPage;

  abstract class BaseCustomPage {
    const PAGE_NAME = null;

    protected static $instance = null;
    protected $wpObject;

    final protected function __construct(
      \WP_Post $wp_object
    ) {
      $this->wpObject = $wp_object;
    }

    final public static function get(
    ): BaseCustomPage {
      if (static::$instance) {
        return static::$instance;
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

      static::$instance = new static($query->get_queried_object());
      return static::$instance;
    }

    abstract public function getPage()/*: Entity*/;
  }
