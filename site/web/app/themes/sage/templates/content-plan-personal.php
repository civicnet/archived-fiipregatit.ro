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
    'rucsac_image' => Assets\asset_path('images/fiipregatit_planpersonal_colaj_v1.png'),
    'tabel_image' => Assets\asset_path('images/fiipregatit_tabel_trusasupravietuire.jpg'),
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
        'collapsed' => true,
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
        'title' => 'Articole pentru copii',
        'content' => $plan->getArticoleCopii(),
        'collapsed' => true,
      ),
      array(
        'index' => 8,
        'title' => 'Articole de igienă',
        'content' => $plan->getArticoleDeIgiena(),
        'collapsed' => true,
      ),
      array(
        'index' => 9,
        'title' => 'Acte personale',
        'content' => $plan->getActePersonale(),
        'collapsed' => true,
      ),
    )
  )
);

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
