<?php
/* Template Name: plan-personal */

use Roots\Sage\Assets;

TemplateEngine::get()->render(
  'jumbotron',
  array(
    'show_header' => false,
    'extra_class' => 'small-jumbotron',
    'algolia_search' => get_search_form($echo = false)
  )
);
