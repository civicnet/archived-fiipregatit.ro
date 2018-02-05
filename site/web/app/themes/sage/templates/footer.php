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
          <li>
            <a href="/" class="header">
              Acasă
            </a>
          </li>
        <?php
          $pages = get_pages();
          foreach ($pages as $page) {
        ?>
          <li>
            <a href="<?=$page->guid;?>">
              <?=$page->post_title;?>
            </a>
          </li>
        <?php
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
          Adresă:
          <a href="https://maps.google.com?q=Piața+Revoluției+nr.1+A+sector+1+București">
            Piața Revoluției, nr.1 A, sector 1,<br/>
            București
          </a><br/>
          Telefon <strong><a href="tel:021.312.25.47">021.312.25.47</a></strong><br/>
          Centrala <a href="tel:021.303.70.80">021.303.70.80</a><br/><br/>

          Fax: 021.313.71.55/021.264.86.46<br/>
          E-mail: <strong><a href="mailto:dsu@mai.gov.ro">dsu@mai.gov.ro</a></strong><br/>
        </div>
      </div>

      <div class="col social-media col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <div class="header">
          Social Media
        </div>
        <ul>
          <li>
            <a href="https://www.facebook.com/departamenturgente">
              <i class="fab fa-facebook-square" data-fa-transform="grow-10"></i>
              Facebook
            </a>
          </li>
          <li>
            <a href="https://twitter.com/dsuromania">
              <i class="fab fa-twitter-square" data-fa-transform="grow-10"></i>
              Twitter
            </a>
          </li>
          <li>
            <a href="https://www.youtube.com/channel/UC5qTBf9rEFj2UdxNEQOzlxA">
              <i class="fab fa-youtube-square" data-fa-transform="grow-10"></i>
              YouTube
            </a>
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
            <a href="http://www.guv.ro/">
              <img src="<?=Assets\asset_path('images/logo_guvern.png');?>" />
            </a>
          </li>
          <li class="dsu">
            <a href="http://www.dsu.mai.gov.ro/">
              <img src="<?=Assets\asset_path('images/logo.png');?>" />
            </a>
          </li>
        </ul>
      </div>
      <div class="col col-lg-3 col-md-5 col-sm-12 col-xs-12">
        <div class="copyright">
          <h4>Departamentul pentru Situații de Urgență</h4>
          <div class="sub">
            Realizat cu sprijinul <a href="https://civictech.ro">CivicTech România</a>. Toate drepturile rezervate.<br/>
            Copyright @  2017. Toate drepturile rezervate.
          </div>
        </div>
      </div>
      <div class="col col-lg-2 col-md-2 d-none d-sm-block "></div>
  </div>
</footer>
