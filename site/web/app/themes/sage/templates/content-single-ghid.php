<?php
  global $wp_query;

  TemplateEngine::get()->render(
    'jumbotron',
    array(
      'show_header' => false,
      'extra_class' => 'small-jumbotron'
    )
  );

  $guide = \RepoManager::getGuideRepository()->getByPost($wp_query->post);

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
      'sidebar_links' => $sidebarLinks
    )
  );
?>
