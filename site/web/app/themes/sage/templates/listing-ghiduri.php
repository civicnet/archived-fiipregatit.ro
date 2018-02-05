<?php
/* Template Name: listing-ghiduri */

use Roots\Sage\Assets;

$guides = \RepoManager::getGuideRepository()->getList();

$guideProps = array();
foreach ($guides as $guide) {
  $guideProps[] = array(
    'icon' => $guide->getPictograma()->getUrl(),
    'title' => $guide->getTitle(),
    'permalink' => $guide->getPermalink(),
    'see_more' => false
  );
}

TemplateEngine::get()->render(
  'guide_listing',
  array(
    'guides' => $guideProps
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
