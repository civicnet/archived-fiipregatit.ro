<?php
/* Template Name: despre */

use Roots\Sage\Assets;

TemplateEngine::get()->render(
  'jumbotron',
  array(
    'show_header' => false,
    'extra_class' => 'small-jumbotron'
  )
);

TemplateEngine::get()->render(
  'despre',
  array(
    'sections' => array(
      array(
        'name' => 'Fii Pregătit',
        'slug' => 'custom-menu-fii-pregatit',
        'is_active' => 'active',
        'content' => TemplateEngine::get()->getPartial('despre_fii_pregatit'),
      ),
      array(
        'name' => 'Întrebări Frecvente',
        'slug' => 'custom-menu-faq',
        'content' => TemplateEngine::get()->getPartial('faq'),
      ),
      array(
        'name' => 'Social Media',
        'slug' => 'custom-menu-media',
        'content' => TemplateEngine::get()->getPartial('social_media'),
      ),
      array(
        'name' => 'Presă',
        'slug' => 'custom-menu-press',
        'content' => TemplateEngine::get()->getPartial('press'),
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
