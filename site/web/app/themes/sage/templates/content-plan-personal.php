<?php
/* Template Name: plan-personal */

use Roots\Sage\Assets;

TemplateEngine::get()->render(
  'jumbotron',
  array(
    'show_header' => false,
    'extra_class' => 'small-jumbotron',
    'algolia_search' => get_search_form($echo = false)
  )
);

$plan = CustomPageManager::getPersonalPlanPage()->getPage();
TemplateEngine::get()->render(
  'plan_personal',
  array(
    'rucsac_image' => Assets\asset_path('images/plan_personal_homepage.jpg'),
    'tabel_image' => Assets\asset_path('images/plan_pers_ghid.png'),
    'descriere_rucsac' => $plan->getDescriereRucsac(),
    'descriere_tabel' => $plan->getDescriereTabel(),
    'tabel_pdf' => array(
      'url' => $plan->getTabelPDF()->getUrl(),
    ),
    'rucsac_items' => array(
      array(
        'index' => 1,
        'title' => 'Apă',
        'content' => $plan->getApa(),
      ),
      array(
        'index' => 2,
        'title' => 'Alimente',
        'content' => $plan->getAlimente(),
        'collapsed' => true,
      ),
      array(
        'index' => 3,
        'title' => 'Îmbrăcăminte și încălțăminte',
        'content' => $plan->getImbracaminteSiIncaltaminte(),
        'collapsed' => true,
      ),
      array(
        'index' => 4,
        'title' => 'Un sac de dormit',
        'content' => $plan->getSacDeDormit(),
        'collapsed' => true,
      ),
      array(
        'index' => 5,
        'title' => 'O trusă de prim ajutor',
        'content' => $plan->getTrusaPrimAjutor(),
        'collapsed' => true,
      ),
      array(
        'index' => 6,
        'title' => 'Aparate utile',
        'content' => $plan->getAparateUtile(),
        'collapsed' => true,
      ),
      array(
        'index' => 7,
        'title' => 'Articole de igienă',
        'content' => $plan->getArticoleDeIgiena(),
        'collapsed' => true,
      ),
      array(
        'index' => 8,
        'title' => 'Acte personale',
        'content' => $plan->getActePersonale(),
        'collapsed' => true,
      ),
    )
  )
);

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
