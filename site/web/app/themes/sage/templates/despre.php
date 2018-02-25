<?php
/* Template Name: despre */

use Roots\Sage\Assets;

TemplateEngine::get()->render(
  'jumbotron',
  array(
    'show_header' => false,
    'extra_class' => 'small-jumbotron',
    'algolia_search' => get_search_form($echo = false)
  )
);

$about = CustomPageManager::getAboutPage()->getPage();

TemplateEngine::get()->render(
  'despre',
  array(
    'sections' => array(
      array(
        'name' => 'Despre',
        'slug' => 'custom-menu-despre',
        'is_active' => 'active',
        'content' => $about->getDespre(),
      ),
      array(
        'name' => 'Context',
        'slug' => 'custom-menu-context',
        'content' => $about->getContext(),
      ),
      array(
        'name' => 'Parteneri',
        'slug' => 'custom-menu-parteneri',
        'content' => $about->getParteneri(),
      ),
      array(
        'name' => 'Echipa',
        'slug' => 'custom-menu-echipa',
        'content' => $about->getEchipa(),
      )
    ),
  )
);

TemplateEngine::get()->render(
  'app_promo',
  array(
    'mobile_app_dsu' => Assets\asset_path('images/app_mobil_dsu.jpg'),
    'ios_badge' => Assets\asset_path('images/ios-badge.svg'),
    'playstore_badge' => Assets\asset_path('images/playstore-badge.svg'),
  )
);
