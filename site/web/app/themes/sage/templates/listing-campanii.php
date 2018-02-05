<?php
/* Template Name: listing-campanii */

use Roots\Sage\Assets;

$campaigns = \RepoManager::getCampaignRepository()->getList();

$campaignProps = array();
foreach ($campaigns as $campaign) {
  $campaignProps[] = array(
    'image' => $campaign->getImage(),
    'title' => $campaign->getTitle(),
    'permalink' => $campaign->getPermalink(),
    'extras' => $campaign->getExtras(),
    'date' => $campaign->getDate()->format('d.m.Y'),
    'see_more' => false
  );
}

TemplateEngine::get()->render(
  'campaign_listing',
  array(
    'campaigns' => $campaignProps
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
