<?php
  get_template_part('templates/page', 'header');

  TemplateEngine::get()->render(
    'jumbotron',
    array(
      'show_header' => false,
      'extra_class' => 'small-jumbotron',
      'algolia_search' => get_search_form($echo = false)
    )
  );
?>

<div class="alert alert-warning">
  <?php _e('Ne cerem scuze, dar pagina pe care ați încercat să o accesați nu este disponibilă.', 'sage'); ?>
</div>
