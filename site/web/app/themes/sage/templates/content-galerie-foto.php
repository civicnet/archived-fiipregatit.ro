<?php
  /* Template Name: galerie-foto */

  use Roots\Sage\Assets;

  TemplateEngine::get()->render(
    'jumbotron',
    array(
      'show_header' => false,
      'extra_class' => 'small-jumbotron',
      'algolia_search' => get_search_form($echo = false)
    )
  );

  $allGuides = \RepoManager::getGuideRepository()->getList();
  $photos = array();
  foreach ($allGuides as $guide) {
    if (!$guide->getGalerieFoto()) {
      continue;
    }

    $gallery = [];
    $is_first = true;
    $count = 0;
    foreach ($guide->getGalerieFoto() as $photo) {
      $gallery[] = array(
        'photo' => $photo,
        'idx' => $count,
        'first' => $is_first,
      );

      if ($is_first) {
        $is_first = false;
      }
      $count++;
    }

    $photos[] = array(
      'gallery' => $gallery,
      'photo_gallery_is_single' => count($gallery) === 1,
      'id' => 'id-'.preg_replace("/[^a-zA-Z0-9]+/", '', $guide->getTitle()),
      'title' => $guide->getNume(),
      'permalink' => $guide->getPermalink(),
    );
  }

  TemplateEngine::get()->render(
    'photo_gallery',
    array(
      'photos' => $photos,
      'bg' => '#fff'
    )
  );

  $campaigns = \RepoManager::getCampaignRepository()->getList(
    App::HOMEPAGE_CAMPAIGNS_COUNT
  );

  $campaignProps = array();
  $index = 1;
  $is_hidden = false;
  foreach ($campaigns as $campaign) {
    if ($index === App::HOMEPAGE_CAMPAIGNS_COUNT) {
      $is_hidden = true;
    }

    $campaignProps[] = array(
      'image' => $campaign->getImage(),
      'title' => $campaign->getTitle(),
      'permalink' => $campaign->getPermalink(),
      'extras' => $campaign->getExtras(),
      'date' => $campaign->getDate()->format('d.m.Y'),
      'is_hidden' => $is_hidden,
    );

    $index++;
  }

  TemplateEngine::get()->render(
    'campaign_listing',
    array(
      'campaigns' => $campaignProps,
      'see_more' => true
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
