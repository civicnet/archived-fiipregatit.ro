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
              <a href="<?=get_permalink($page->ID);?>" class="mobile-block-link">
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
            <a href="<?=$link->getTarget();?>" class="mobile-block-link">
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
        <div class="footer-address">
          Adresă:
          <a href="https://maps.google.com?q=Piața+Revoluției+nr.1+A+sector+1+București">
            Piața Revoluției, nr.1 A, sector 1, București
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
        <ul class="social-media-mobile-block">
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
    <div class="row align-middle logos-row justify-content-center">
      <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 logo-box">
        <a href="http://www.dsu.mai.gov.ro/" target="_blank">
          <ul>
            <li class="sq-logo">
              <img src="<?=Assets\asset_path('images/Logo_DSU.svg');?>" />
            </li>
            <li>
              <div class="copyright">
                <h4>Departamentul pentru Situații de Urgență</h4>
                <div class="sub">
                  Toate drepturile rezervate &copy; 2018
                </div>
              </div>
            </li>
          </ul>
        </a>
      </div>
      <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 logo-box">
        <a href="https://www.igsu.ro/" target="_blank">
          <ul>
            <li class="sq-logo">
              <img src="<?=Assets\asset_path('images/Stema_IGSU_color.png');?>" />
            </li>
            <li>
              <div class="copyright">
                <h4>Inspectoratul General pentru Situații de Urgență</h4>
              </div>
            </li>
          </ul>
        </a>
      </div>
      <div class="col-xl-2 col-lg-3 col-md-6 col-sm-12 logo-box">
        <a href="https://civictech.ro/" class="civictech" target="_blank">
          <img src="<?=Assets\asset_path('images/civictech_logo.svg');?>" />
        </a>
        <a class="contribute" href="https://github.com/civictechro/fiipregatit.ro" target="_blank">
          <i class="fab fa-github"></i> Contribuie și tu!
        </a>
      </div>
  </div>
</footer>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>
<script>
  jQuery(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      jQuery(this).ekkoLightbox({
        alwaysShowClose: true,
        strings: {
          close: 'Închide',
          fail: 'Momentan nu putem afișa conținutul, vă rugăm încercați mai târziu',
          type: 'Nu am putut detecta tipul conținutului'
        }
      });
  });
</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-114659863-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-114659863-2');
</script>
