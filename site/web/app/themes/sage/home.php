<?php
  /***
   * Template Name: Custom Homepage
   **/

  use Roots\Sage\Assets;
  get_template_part('templates/page', 'header');
?>

  <div class="container-fluid">
    <div class="row">
      <div class="jumbotron jumbotron-fluid">
        <div class="container">
          <h1>Fii pregătit</h1>
          <h3>pentru</h3>
          <h1 class="subtitle">situații de urgență</h1>
          <div class="align-self-center">
            <div class="input-group">
              <input
                type="text"
                class="form-control"
                placeholder="Scrie aici, de ex: furtună"
                aria-label="Scrie aici, de ex: furtună">
              <span class="input-group-btn">
                <button class="btn btn-secondary" type="button">
                  <i class="fa fa-search" aria-hidden="true"></i>
                </button>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php
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
?>

  <div class="container-fluid" id="summary-section">
    <div class="container">
      <div class="row">
        <div class="col">
          <i class="far fa-file-alt" data-fa-transform="grow-25"></i>
          <div class="count">
            <span>76</span> ghiduri educative
          </div>
        </div>
        <div class="col">
          <i class="fa fa-camera" data-fa-transform="grow-25"></i>
          <div class="count">
            <span>384</span> imagini si ilustrații
          </div>
        </div>
        <div class="col">
          <i class="fa fa-film" data-fa-transform="grow-25"></i>
          <div class="count">
            <span>25</span> video instrucțiuni
          </div>
        </div>
      </div>
    </div>
  </div>

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
      'image' => $campaign->getImage()->getUrl(),
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
