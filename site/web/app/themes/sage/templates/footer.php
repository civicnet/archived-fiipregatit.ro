<?php
  /***
   * Template Name: Custom Homepage
   **/

  use Roots\Sage\Assets;
?>

<footer>
  <div class="container content-info">
    <div class="row">
      <div class="col page-list col-lg-2 col-md-2 col-sm-12 col-xs-12">
        <ul>
        <?php
          $pages = get_pages();
          $is_first = true;
          foreach ($pages as $page) {
        ?>
          <li>
            <a href="<?=$post->guid;?>" <?=$is_first ? 'class="header"' : ''?>>
              <?=$page->post_title;?>
            </a>
          </li>
        <?php
            if ($is_first) {
              $is_first = false;
            }
          }
        ?>
        </ul>
      </div>

      <div class="col link-list col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <div class="header">
          Legături utile
        </div>
        <ul>
        <?php
          $links = \RepoManager::getLinkRepository()
            ->getList(App::LINK_COUNT);
          foreach($links as $link) {
        ?>
          <li>
            <a href="<?=$link->getTarget();?>">
              <?=$link->getTitle();?>
            </a>
          </li>
        <?php
          }
        ?>
        </ul>
      </div>

      <div class="col contact col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <div class="header">
          Contact
        </div>
        <div>
          Adresă: Piața Revoluției, nr.1 A, sector 1,<br/>
          București<br/>
          Telefon <strong>021.312.25.47</strong><br/>
          Centrala 021.303.70.80<br/><br/>

          Fax: 021.313.71.55/021.264.86.46<br/>
          E-mail: <strong>dsu@mai.gov.ro</strong><br/>
        </div>
      </div>

      <div class="col social-media col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <div class="header">
          Social Media
        </div>
        <ul>
          <li>
            <i class="fab fa-facebook-square" data-fa-transform="grow-10"></i>
            Facebook
          </li>
          <li>
            <i class="fab fa-twitter-square" data-fa-transform="grow-10"></i>
            Twitter
          </li>
          <li>
            <i class="fab fa-youtube-square" data-fa-transform="grow-10"></i>
            YouTube
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="bottom container-fluid">
    <div class="row">
      <div class="col col-lg-2 col-md-2 d-none d-sm-block "></div>
      <div class="col col-md-3 col-sm-12 col-xs-12">
        <ul>
          <li class="gov">
            <img src="<?=Assets\asset_path('images/logo_guvern.png');?>" />
          </li>
          <li class="dsu">
            <img src="<?=Assets\asset_path('images/logo.png');?>" />
          </li>
        </ul>
      </div>
      <div class="col col-lg-3 col-md-5 col-sm-12 col-xs-12">
        <div class="copyright">
          <h4>Departamentul pentru Situații de Urgență</h4>
          <div class="sub">
            Realizat cu sprijinul <a href="https://civictech.ro">CivicTech</a>. Toate drepturile rezervate.<br/>
            Copyright @  2017. Toate drepturile rezervate.
          </div>
        </div>
      </div>
      <div class="col col-lg-2 col-md-2 d-none d-sm-block "></div>
  </div>
</footer>
