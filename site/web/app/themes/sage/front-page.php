<?php
  use Roots\Sage\Assets;
  get_template_part('templates/page', 'header');

  TemplateEngine::get()->render(
    'jumbotron',
    array(
      'show_header' => true,
      'algolia_search' => get_search_form($echo = false)
    )
  );

  $guides = \RepoManager::getGuideRepository()
    ->getList(App::HOMEPAGE_GUIDE_COUNT);

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

  $first_aid = CustomPageManager::getFirstAidPage()->getPage();
  TemplateEngine::get()->render(
    'guide_listing',
    array(
      'guides' => $guideProps,
      'see_more' => true,
      'extra_box' => array(
        'title' => 'Prim Ajutor',
        'icon' => $first_aid->getPictograma()->getUrl(),
        'permalink' => $first_aid->getPermalink(),
        'button_label' => 'Vezi Ghid',
        'class' => 'prim-ajutor',
        'id' => 'icon-prim-ajutor',
        'is_svg' => $first_aid->getPictograma()->getMimeType() === 'image/svg+xml',
        'color' => $first_aid->getCuloarePictograma(),
        'count_videos' => 0,
        'count_photo' => 0,
      )
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
      $imageCount += count($guide->getGalerieFoto());
    }
  }

  TemplateEngine::get()->render(
    'homepage_counter',
    array(
      'guide_count' => count($allGuides) + 1, // include first aid
      'image_count' => $imageCount,
      'video_count' => $videoCount,
    )
  );
?>

  <div class="container-fluid" id="plan-personal-section">
    <div class="container">
      <h2>Trusă supraviețuire</h2>
      <div class="row align-items-center trusa-row">
        <div class="col d-none d-sm-block img-container">
          <a href="/plan-personal">
            <img
              src="<?=Assets\asset_path('images/fiipregatit_planpersonal_colaj_v1.png');?>"
              class="img-fluid"
              alt="Trsuă de supraviețuire"/>
          </a>
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
        <a rel="button" class="btn btn-secondary all-button" href="/plan-personal">
          Vezi detaliile trusei
          <i class="fa fa-chevron-right" aria-hidden="true"></i>
        </a>
      </div>

    </div>
  </div>

<?php
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
?>
