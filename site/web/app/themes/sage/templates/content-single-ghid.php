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

  $gallery = array();
  $is_first = true;
  $count = 0;
  foreach ($guide->getGalerieFoto() as $photo) {
    $gallery[] = array(
      'photo' => $photo,
      'idx' => $count,
      'first' => $is_first,
    );

    if ($is_first) {
      $is_first = false;
    }
    $count++;
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
      'photo_gallery' => $gallery,
      'has_extra_info' => (
        $guide->getInformatiiAditionale()
        || $guide->getVideoAjutator()
        || $gallery
      ),
      'pdf_guide' => $guide->getGuidePDF(),
      'pdf_size' => $guide->getPDFGuideSize(),
      'sidebar_links' => $sidebarLinks,
    )
  );

  $recommendedGuides = $guide->getSimilarGuides();
  if (!$recommendedGuides) {
    $recommendedGuides = array_slice($allGuides, 0, 2);
  }

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
      'center' => true
    )
  );
?>
