<?php

  TemplateEngine::get()->render(
    'search_form',
    array(
      'action' => esc_url(home_url( '/' ))
    )
  );
