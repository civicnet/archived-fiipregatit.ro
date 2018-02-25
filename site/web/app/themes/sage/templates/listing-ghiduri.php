<?php
/* Template Name: listing-ghiduri */

use Roots\Sage\Assets;

TemplateEngine::get()->render(
  'jumbotron',
  array(
    'show_header' => false,
    'extra_class' => 'small-jumbotron',
    'algolia_search' => get_search_form($echo = false)
  )
);

$guides = \RepoManager::getGuideRepository()->getList();

$guideProps = array();
foreach ($guides as $guide) {
  $guideProps[] = array(
    'icon' => $guide->getPictograma()->getUrl(),
    'title' => $guide->getTitle(),
    'permalink' => $guide->getPermalink(),
    'see_more' => false,
    'color' => $guide->getCuloareGhid(),
    'id' => 'icon-' . preg_replace("/[^a-zA-Z0-9]+/", '', $guide->getTitle()),
    'is_svg' => $guide->getPictograma()->getMimeType() === 'image/svg+xml',
  );
}

$first_aid = CustomPageManager::getFirstAidPage()->getPage();
TemplateEngine::get()->render(
  'guide_listing',
  array(
    'guides' => $guideProps,
    'extra_box' => array(
      'title' => 'Prim Ajutor',
      'icon' => $first_aid->getPictograma()->getUrl(),
      'permalink' => $first_aid->getPermalink(),
      'button_label' => 'Vezi Ghid',
      'class' => 'prim-ajutor',
      'id' => 'icon-prim-ajutor',
      'is_svg' => $first_aid->getPictograma()->getMimeType() === 'image/svg+xml',
      'color' => $first_aid->getCuloarePictograma(),
    )
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
