<?php
  use Roots\Sage\Assets;
?>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="<?= Assets\asset_path('images/fiipregatit_favicon_32x32.png') ?>" />
  <link href="https://fonts.googleapis.com/css?family=Merriweather:300,400,700|Roboto:300,400,700" rel="stylesheet">
  <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
  <?php wp_head(); ?>
  <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.css" />
  <script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.js"></script>
  <script>
  window.addEventListener("load", function(){
    window.cookieconsent.initialise({
      "palette": {
        "popup": {
          "background": "#ffffcc",
          "text": "#993333"
        },
        "button": {
          "background": "#993333"
        }
      },
      "showLink": false,
      "position": "bottom-right",
      "content": {
        "message": "Pentru o experiență cât mai bună, acest website folosește cookies.",
        "dismiss": "Am înțeles",
        "link": ""
      }
    })});
  </script>
</head>
