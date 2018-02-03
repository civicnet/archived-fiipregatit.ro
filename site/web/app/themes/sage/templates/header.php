<?php
	use Roots\Sage\Assets;
?>

<nav class="navbar navbar-toggleable-md navbar-light fixed-top">
  <a class="navbar-brand" href="<?= esc_url(home_url('/')); ?>">
    <img
      src="<?=Assets\asset_path('images/logo.png');?>"
      height="60"
      class="d-inline-block align-top"
      alt="">
    <div>
      <strong>fiipregătit</strong>.ro
      <span class="subtitle">
        Departamentul pentru Situații de Urgență
      </span>
    </div>
  </a>

  <button
		class="navbar-toggler navbar-toggler-right"
		type="button"
		data-toggle="collapse"
		data-target="#navbarContent"
		aria-controls="navbarContent"
		aria-expanded="false"
		aria-label="Toggle navigation">
    	<span class="navbar-toggler-icon"></span>
  </button>

  <?php
    if (has_nav_menu('main_navigation')) {
      wp_nav_menu([
        'theme_location' => 'main_navigation',
        'menu_class' => 'navbar-nav',
        'container_class' => 'collapse navbar-collapse justify-content-end',
        'container_id' => 'navbarContent'
      ]);
    }
  ?>
</nav>
