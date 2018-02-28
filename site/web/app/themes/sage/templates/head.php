<?php
  use Roots\Sage\Assets;
?>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php
    if (is_singular() || is_home() || is_404() || is_search()) {
      $post = get_post();
      if (is_search()) {
        $post = null;
      }

      $generator = MetaGenerator::get($post);

      $og_decorator = new OpenGraphMetaDecorator($generator);
      $meta_decorator = new MetaMetaDecorator($generator);

      $all_og_pairs = $og_decorator->getAllTagPairs();
      $all_meta_pairs = $meta_decorator->getAllTagPairs();

      TemplateEngine::get()->render(
        'og_tags',
        array('tags' => $all_og_pairs)
      );

      TemplateEngine::get()->render(
        'meta_tags',
        array('tags' => $all_meta_pairs)
      );
    }
  ?>

  <link rel="icon" type="image/png" href="<?= Assets\asset_path('images/fiipregatit_favicon_32x32.png') ?>" />
  <link href="https://fonts.googleapis.com/css?family=Merriweather:300,400,700|Roboto:300,400,700" rel="stylesheet">
  <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
  <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.css" />
  <?php
    TemplateEngine::get()->render(
      'cookie',
      array()
    );
  ?>
  <?php wp_head(); ?>
</head>
