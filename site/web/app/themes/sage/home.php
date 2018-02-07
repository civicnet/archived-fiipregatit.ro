<?php
  /***
   * Template Name: Custom Homepage
   **/

  use Roots\Sage\Assets;
  get_template_part('templates/page', 'header');

  TemplateEngine::get()->render(
    'jumbotron',
    array(
      'show_header' => true
    )
  );

  $guides = \RepoManager::getGuideRepository()
    ->getList(App::HOMEPAGE_GUIDE_COUNT);

  $guideProps = array();
  foreach ($guides as $guide) {
    $guideProps[] = array(
      'icon' => $guide->getPictograma()->getUrl(),
      'title' => $guide->getTitle(),
      'permalink' => $guide->getPermalink()
    );
  }

  TemplateEngine::get()->render(
    'guide_listing',
    array(
      'guides' => $guideProps,
      'see_more' => true
    )
  );

  $allGuides = \RepoManager::getGuideRepository()->getList();

  $imageCount = 0;
  $videoCount = 0;
  foreach ($allGuides as $guide) {
    if ($guide->getVideoAjutator()) {
      $videoCount++;
    }

    if ($guide->getGalerieFoto()) {
      $imageCount++;
    }
  }

  TemplateEngine::get()->render(
    'homepage_counter',
    array(
      'guide_count' => count($allGuides),
      'image_count' => $imageCount,
      'video_count' => $videoCount,
    )
  );
?>

  <div class="container-fluid" id="plan-personal-section">
    <div class="container">
      <h2>Plan personal</h2>
      <div class="row">
        <div class="col d-none d-sm-block img-container">
          <img
            src="<?=Assets\asset_path('images/plan_personal_homepage.jpg');?>"
            class="img-fluid">
        </div>
        <div class="col">
          <div class="headline">
            Într-o situație de urgență reacționezi corect dacă ești
            <span class="big-red">informat, pregătit, solidar</span>.
          </div>
          <div>
            Planul personal pentru situații de urgență este compus în principal
            din 3 elemente de bază:
          </div>
          <div class="element">
            Să fii informat și pregătit înainte de situație
          </div>
          <div class="element">
            Să știi ce trebuie să faci în timpul unei situații
          </div>
          <div class="element">
            Să ai pregătit rucsacul cu cele necesare supraviețuirii
          </div>
        </div>
      </div>

      <div class="text-center">
        <button type="button" class="btn btn-secondary all-button">
          Vezi detaliile planului
          <i class="fa fa-chevron-right" aria-hidden="true"></i>
        </button>
      </div>
    </div>
  </div>

<?php
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
?>
