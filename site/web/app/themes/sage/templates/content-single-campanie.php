<?php
  global $wp_query;

  use Roots\Sage\Assets;

  TemplateEngine::get()->render(
    'jumbotron',
    array(
      'show_header' => false,
      'extra_class' => 'small-jumbotron',
      'algolia_search' => get_search_form($echo = false)
    )
  );

  $campaign = \RepoManager::getCampaignRepository()
    ->getByPost($wp_query->post, true);


  $attachments = array();
  foreach ($campaign->getAttachments() as $attachment) {
    $extension = pathinfo($attachment, PATHINFO_EXTENSION);

    $icon_class = 'fa-file';
    $has_lightbox = false;

    if (in_array($extension, array('png', 'jpg', 'jpeg', 'gif', 'svg'))) {
      $icon_class = 'fa-image';
      $has_lightbox = true;
    } else if ($extension === 'pdf') {
      $icon_class = 'fa-file-pdf';
    }

    $attachments[] = array(
      'url' => $attachment,
      'name' => basename($attachment),
      'icon_class' => $icon_class,
      'has_lightbox' => $has_lightbox,
    );
  }

  $videos = array();
  foreach ($campaign->getVideos() as $video) {
      $videos[] = array(
        'url' => $video['video_oembed'],
        'title' => $video['title'],
        'embed_code' => wp_oembed_get($video['title']),
      );
  }

  TemplateEngine::get()->render(
    'campaign',
    array(
      'title' => $campaign->getTitle(),
      'image' => $campaign->getImage(),
      'content' => $campaign->getContent(),
      'has_attachments' => (bool) $campaign->getAttachments() || (bool) $campaign->getVideos(),
      'attachments' => $attachments,
      'videos' => $videos,
    )
  );

  $guides = $campaign->getSimilarGuides();

  if (!$guides) {
    $guides = \RepoManager::getGuideRepository()
      ->getList(4);
  }

  $guideProps = array();
  foreach ($guides as $guide) {
    $guideProps[] = array(
      'icon' => $guide->getPictograma()->getUrl(),
      'title' => $guide->getTitle(),
      'permalink' => $guide->getPermalink(),
      'color' => $guide->getCuloareGhid(),
      'id' => 'icon-' . preg_replace("/[^a-zA-Z0-9]+/", '', $guide->getTitle()),
      'is_svg' => $guide->getPictograma()->getMimeType() === 'image/svg+xml',
      'count_videos' => $guide->getVideoAjutator() ? 1 : 0,
      'count_photo' => count($guide->getGalerieFoto()),
    );
  }

  TemplateEngine::get()->render(
    'guide_listing',
    array(
      'guides' => $guideProps,
      'see_more' => true,
      'center' => true,
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
?>
