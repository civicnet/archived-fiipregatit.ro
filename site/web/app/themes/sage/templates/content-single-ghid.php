<?php
  global $wp_query;

  TemplateEngine::get()->render(
    'jumbotron',
    array(
      'show_header' => false,
      'extra_class' => 'small-jumbotron',
      'algolia_search' => get_search_form($echo = false)
    )
  );

  $guide = \RepoManager::getGuideRepository()->getByPost(
    $wp_query->post,
    $include_similar = true
  );

  $allGuides = \RepoManager::getGuideRepository()->getList();
  $sidebarLinks = array();
  foreach ($allGuides as $g) {
    $sidebarLinks[] =  array(
      'text' => $g->getNume(),
      'href' => $g->getPermalink()
    );
  }

  TemplateEngine::get()->render(
    'guide',
    array(
      'title' => $guide->getNume(),
      'before_content' => $guide->getInainteaEvenimentului(),
      'during_content' => $guide->getInTimpulEvenimentului(),
      'after_content' => $guide->getDupaEveniment(),
      'extra_info' => $guide->getInformatiiAditionale(),
      'video' => $guide->getVideoAjutator(),
      'photo_gallery' => array(
        array(
          'photo' => $guide->getGalerieFoto(),
          'idx' => 0,
          'first' => true
        ),
        array(
          'photo' => $guide->getGalerieFoto(),
          'idx' => 0
        )
      ),
      'has_extra_info' => (
        $guide->getInformatiiAditionale()
        && $guide->getVideoAjutator()
        && $guide->getGalerieFoto()
      ),
      'pdf_guide' => $guide->getGuidePDF(),
      'pdf_size' => $guide->getPDFGuideSize(),
      'sidebar_links' => $sidebarLinks,
    )
  );

  $recommendedGuides = $guide->getSimilarGuides();
  $guideProps = array();

  foreach ($recommendedGuides as $guide) {
    $guideProps[] = array(
      'icon' => $guide->getPictograma()->getUrl(),
      'title' => $guide->getTitle(),
      'permalink' => $guide->getPermalink(),
      'see_more' => false
    );
  }

  TemplateEngine::get()->render(
    'guide_listing',
    array(
      'guides' => $guideProps,
      'title' => 'Alte situații',
      'bg' => '#fff',
    )
  );
?>
