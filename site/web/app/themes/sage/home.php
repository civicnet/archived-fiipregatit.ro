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
          <h1 class="display-3">Fii pregatit</h1>
          <p class="lead">pentru situatii de urgenta</p>
          <div class="col-lg-6">
            <div class="input-group">
              <input
                type="text"
                class="form-control"
                placeholder="Search for..."
                aria-label="Search for...">
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

  <div class="container-fluid ghiduri-section">
    <div class="container">
      <h2>Ghiduri educative</h2>

<?php
  $ghiduri = \RepoManager::getGhidurEducativeRepository()
    ->getList(App::HOMEPAGE_GHID_COUNT);
?>
      <div class="row">
<?php
  $count_guides = 0;
  foreach ($ghiduri as $ghid) {
    $count_guides++;
?>
    <div class="col ghid-box">
      <div class="ghid-content">
        <h3>
          <?=$ghid->getTitle();?>
        </h3>
        <button type="button" class="btn btn-outline-secondary rounded-0">
          Vezi Ghid
          <i class="fa fa-chevron-right" aria-hidden="true"></i>
        </button>
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
        <button type="button" class="btn btn-secondary all-button">
          Vezi toate ghidurile
          <i class="fa fa-chevron-right" aria-hidden="true"></i>
        </button>
      </div>
    </div>
  </div>

  <div class="container-fluid summary-section">
    <div class="container">
      <div class="row">
        <div class="col">
          <i class="fa fa-file-text-o" aria-hidden="true"></i>
          <div class="count">
            <span>76</span> ghiduri educative
          </div>
        </div>
        <div class="col">
          <i class="fa fa-camera" aria-hidden="true"></i>
          <div class="count">
            <span>384</span> imagini si ilustratii
          </div>
        </div>
        <div class="col">
          <i class="fa fa-film" aria-hidden="true"></i>
          <div class="count">
            <span>25</span> video instructiuni
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid plan-personal-section">
    <div class="container">
      <h2>Plan personal</h2>
      <div class="row">
        <div class="col">
          <img
            src="<?=Assets\asset_path('images/plan_personal_homepage.jpg');?>"
            class="img-fluid">
        </div>
        <div class="col">
          <div class="headline">
            Intr-o situatie de urgenta reactionezi corect daca esti
            <span class="big-red">informat, pregatit, solidar</span>.
          </div>
          <div>
            Planul personal pentru situatii de urgenta este compus in principal
            din 3 elemente de baza:
          </div>
          <div class="element">
            Sa fii informat si pregatit inainte de situatie
          </div>
          <div class="element">
            Sa stii ce trebuie sa faci in timpul unei situatii
          </div>
          <div class="element">
            Sa ai pregatit rucsacul cu cele necesare supravietuirii
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

  <div class="container-fluid campanii-section">
    <div class="container">
      <h2>Campanii</h2>
<?php
  $campanii = \RepoManager::getCampaniiRepository()
    ->getList(App::HOMEPAGE_CAMPANII_COUNT);
?>
      <div class="row">
<?php
  $count_campanii = 0;
  foreach ($campanii as $campanie) {
    $count_campanii++;
?>
    <div class="col campanie-box">
      <div class="campanie-content">
        <h3>
          <?=$campanie->getTitle();?>
        </h3>
        <button type="button" class="btn btn-outline-secondary rounded-0">
          Citeste
          <i class="fa fa-chevron-right" aria-hidden="true"></i>
        </button>
      </div>
    </div>
<?php
    if ($count_campanii === 4) {
      $count_campanii = 0;
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

  <div class="container-fluid app-section">
    <div class="container">
      <div class="row">
        <div class="col">
          <img
            src="<?=Assets\asset_path('images/app_mobil_dsu.jpg');?>"
            class="img-fluid">
        </div>
        <div class="col">
          <h2>
            Afla primul despre alerte din trafic, avertizari meteo
            sau calamitati naturale
          </h2>
        </div>
      </div>
    </div>
  </div>

<?php
  the_posts_navigation();
?>
