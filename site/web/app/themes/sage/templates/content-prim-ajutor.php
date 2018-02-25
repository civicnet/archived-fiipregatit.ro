<?php
/* Template Name: prim-ajutor */

use Roots\Sage\Assets;

TemplateEngine::get()->render(
  'jumbotron',
  array(
    'show_header' => false,
    'extra_class' => 'small-jumbotron',
    'algolia_search' => get_search_form($echo = false)
  )
);

$first_aid = CustomPageManager::getFirstAidPage()->getPage();

$allGuides = \RepoManager::getGuideRepository()->getList();
$sidebarLinks = array();
foreach ($allGuides as $g) {
  $sidebarLinks[] =  array(
    'text' => $g->getNume(),
    'href' => $g->getPermalink()
  );
}

$pdf_first_aid_guide = array(
  'url' => $first_aid->getGhidPDF()->getUrl(),
);

TemplateEngine::get()->render(
  'first_aid',
  array(
    'sidebar_links' => $sidebarLinks,
    'pdf_guide' => $pdf_first_aid_guide,
    'pdf_size' => '',
    'first_aid_items' => array(
      array(
        'index' => 1,
        'title' => 'Arsura la copii',
        'content' => $first_aid->getArsuraCopii(),
      ),
      array(
        'index' => 2,
        'title' => 'Intoxicație alcoolică',
        'content' => $first_aid->getIntoxicatieAlcoolica(),
        'collapsed' => true,
      ),
      array(
        'index' => 3,
        'title' => 'Mușcăturile de animale',
        'content' => $first_aid->getMuscaturiAnimal(),
        'collapsed' => true,
      ),
      array(
        'index' => 4,
        'title' => 'Obstrucția căilor aeriene la copii',
        'content' => $first_aid->getObstructieCaiAeriene(),
        'collapsed' => true,
      ),
      array(
        'index' => 5,
        'title' => 'Pierderea cunoștinței',
        'content' => $first_aid->getPierdereCunostinta(),
        'collapsed' => true,
      ),
      array(
        'index' => 6,
        'title' => 'Reacția alergică',
        'content' => $first_aid->getReactieAlergica(),
        'collapsed' => true,
      ),
      array(
        'index' => 7,
        'title' => 'Stopul cardio-respirator',
        'content' => $first_aid->getStopCardioRespirator(),
        'collapsed' => true,
      ),
      array(
        'index' => 8,
        'title' => 'Traumatismul cranio-cerebral la adulți',
        'content' => $first_aid->getTraumatismAdulti(),
        'collapsed' => true,
      ),
      array(
        'index' => 9,
        'title' => 'Traumatismul cranio-cerebral la copii',
        'content' => $first_aid->getTraumatismCopii(),
        'collapsed' => true,
      ),
    )
  )
);

$guides = \RepoManager::getGuideRepository()->getList(4);

$guideProps = array();
foreach ($guides as $guide) {
  $guideProps[] = array(
    'icon' => $guide->getPictograma()->getUrl(),
    'title' => $guide->getTitle(),
    'permalink' => $guide->getPermalink(),
    'color' => $guide->getCuloareGhid(),
    'id' => 'icon-' . preg_replace("/[^a-zA-Z0-9]+/", '', $guide->getTitle()),
    'is_svg' => $guide->getPictograma()->getMimeType() === 'image/svg+xml',
  );
}

TemplateEngine::get()->render(
  'guide_listing',
  array(
    'guides' => $guideProps,
    'see_more' => true,
    'center' => true,
    'bg' => '#fff',
  )
);
