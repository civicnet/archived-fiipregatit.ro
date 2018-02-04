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

  <div class="container-fluid" id="ghiduri-section">
    <div class="container">
      <h2>Ghiduri educative</h2>
      <div class="row ghid-row">
<?php
  $ghiduri = \RepoManager::getGhiduriRepository()
    ->getList(App::HOMEPAGE_GHID_COUNT);

  $count_guides = 0;
  foreach ($ghiduri as $ghid) {
    $count_guides++;
?>
    <div class="col ghid-box col-lg-3 col-md-3 col-sm-3 col-xs-6">
      <div class="ghid-content">
        <div
          style="background-image: url(<?=$ghid->getPictograma()->getUrl(); ?>)"
          class="guide-icon">
        </div>
        <h3>
          <?=$ghid->getTitle();?>
        </h3>
        <a
          class="outline-button btn btn-outline-secondary rounded-0"
          role="button"
          href="<?=$ghid->getPermalink(); ?>">
          Vezi Ghid
          <i class="fa fa-chevron-right" aria-hidden="true"></i>
        </a>
      </div>
    </div>
<?php
    if ($count_guides === 4) {
      $count_guides = 0;
?>
      </div><div class="row">
<?php
     }
  }
?>
      </div>
      <div class="text-center">
        <a href="#" rel="button" class="btn btn-secondary all-button">
          Vezi toate ghidurile
          <i class="fa fa-chevron-right" aria-hidden="true"></i>
        </a>
      </div>
    </div>
  </div>

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

  <div class="container-fluid" id="campaign-section">
    <div class="container">
      <h2>Campanii</h2>
      <div class="row">
<?php
  $campaigns = \RepoManager::getCampaignRepository()
    ->getList(App::HOMEPAGE_CAMPAIGNS_COUNT);
  $count_campaigns = 0;
  foreach ($campaigns as $campaign) {
    $count_campaigns++;
?>
    <div class="col campaign-box col-lg-4 col-md-6 col-sm-12 col-xs-12">
      <div class="campaign-content">
        <h3>
          <?=$campaign->getTitle();?>
        </h3>
        <div class="campaign-date">
          <i class="far fa-calendar"></i>
          <?=$campaign->getDate()->format('d.m.Y');?>
        </div>
        <div
          class="d-block mx-auto mt-3 mb-3 border campaign-photo"
          style="background-image: url(<?=$campaign->getImage()->getUrl(); ?>)">
        </div>
        <div class="campaign-extras">
            <?=$campaign->getExtras();?>
        </div>
        <a
          href="<?=$campaign->getPermalink();?>"
          role="button"
          class="outline-button btn btn-outline-secondary rounded-0">
          Citește
          <i class="fa fa-chevron-right" aria-hidden="true"></i>
        </a>
      </div>
    </div>
<?php
    if ($count_campaigns === 4) {
      $count_campaign = 0;
?>
      </div><div class="row">
<?php
     }
  }
?>
      </div>

      <div class="text-center">
        <button type="button" class="btn btn-secondary all-button">
          Vezi toate campaniile
          <i class="fa fa-chevron-right" aria-hidden="true"></i>
        </button>
      </div>
    </div>
  </div>

  <div class="container-fluid" id="app-section">
    <div class="container">
      <div class="row">
        <div class="col d-none d-sm-block ">
          <img
            src="<?=Assets\asset_path('images/app_mobil_dsu.jpg');?>"
            class="img-fluid">
        </div>
        <div class="col">
          <h2>
            Află primul despre alerte din trafic, avertizări meteo
            sau calamități naturale
          </h2>
          <div class="app-intro">
            <div class="subtitle">
              Descarcă <strong>gratuit</strong> aplicația DSU!
            </div>
            <div class="row">
              <div class="col">
                <img src="<?=Assets\asset_path('images/ios-badge.svg');?>" />
              </div>
              <div class="col">
                <img
                  class="play-store"
                  src="<?=Assets\asset_path('images/playstore-badge.svg');?>" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php
  the_posts_navigation();
?>
