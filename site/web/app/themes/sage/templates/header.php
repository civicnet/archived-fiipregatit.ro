<?php
	use Roots\Sage\Assets;
?>

<nav class="navbar navbar-expand-lg navbar-light">
  <a class="navbar-brand" href="<?= esc_url(home_url('/')); ?>">
    <img
      src="<?=Assets\asset_path('images/Logo_DSU.svg');?>"
      height="70"
      class="d-inline-block"
      alt="Logo DSU" />
    <div class="brand-container">
      <div class="brand-text">
				<strong>fiipregătit</strong>.ro
			</div>
      <div class="subtitle">
        Departamentul pentru Situații de Urgență
      </div>
    </div>
  </a>

  <button
		class="navbar-toggler"
		type="button"
		data-toggle="collapse"
		data-target="#navbarContent"
		aria-controls="navbarContent"
		aria-expanded="false"
		aria-label="Toggle navigation">
    	<span class="navbar-toggler-icon"></span>
  </button>

	<div id="navbarContent" class="collapse navbar-collapse">
		<ul class="social-menu">
			<li class="first">
				<a href="https://www.facebook.com/departamenturgente">
					<i class="fab fa-facebook-square"></i>
				</a>
			</li>
			<li>
				<a href="https://twitter.com/dsuromania">
					<i class="fab fa-twitter-square"></i>
				</a>
			</li>
			<li>
				<a href="https://www.youtube.com/channel/UC5qTBf9rEFj2UdxNEQOzlxA">
					<i class="fab fa-youtube-square"></i>
				</a>
			</li>
		</ul>
	  <?php
	    if (has_nav_menu('main_navigation')) {
	      wp_nav_menu([
	        'theme_location' => 'main_navigation',
	        'menu_class' => 'navbar-nav ml-auto w-100 justify-content-end',
	      ]);
	    }
	  ?>
	</div>
</nav>
