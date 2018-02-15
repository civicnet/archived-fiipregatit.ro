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
		<ul class="social-menu d-none d-lg-block"> 
			<li class="first">
				<a href="https://www.facebook.com/departamenturgente">
					<!-- <i class="fab fa-facebook-square"></i> -->
						<!-- <img class="social-icon" src="<?=Assets\asset_path('images/facebook.svg');?>"	 /> -->
						<svg class="social-icon" viewBox="0 0 101 100">
  <path d="M95.15 0c1.52 0 2.822.543 3.907 1.628s1.628 2.387 1.628 3.906v88.932c0 1.52-.543 2.821-1.628 3.906S96.67 100 95.151 100H69.695V61.263h12.956l1.953-15.104H69.695v-9.636c0-2.43.51-4.253 1.53-5.468 1.02-1.216 3.006-1.823 5.957-1.823l7.943-.065V15.69c-2.735-.39-6.597-.586-11.589-.586-5.903 0-10.623 1.736-14.16 5.209-3.537 3.472-5.306 8.376-5.306 14.713v11.133H41.05v15.104h13.02V100H6.22c-1.52 0-2.822-.543-3.907-1.628S.685 95.985.685 94.466V5.534c0-1.52.542-2.821 1.627-3.906S4.7 0 6.22 0h88.93z"/>
</svg>
				</a>
			</li>
			<li>
				<a href="https://twitter.com/dsuromania">
					<!-- <i class="fab fa-twitter-square"></i> -->
					<!-- <img  class="social-icon" src="<?=Assets\asset_path('images/twitter.svg');?>"	 /> -->
					<svg class="social-icon" viewBox="0 0 101 87">
						<path d="M84.968 7.112C81.192 2.819 75.812.084 69.858-.015c-11.432-.19-20.702 9.47-20.702 21.575 0 1.719.184 3.394.537 5.002-17.205-1.116-32.459-10.075-42.668-23.58-1.782 3.237-2.803 7.02-2.803 11.07 0 7.67 3.654 14.477 9.209 18.497-3.393-.15-6.585-1.177-9.376-2.863-.002.092-.002.185-.002.278 0 10.711 7.135 19.697 16.605 21.79a19.495 19.495 0 0 1-9.348.315c2.634 8.784 10.279 15.194 19.338 15.406-7.085 5.881-16.01 9.384-25.71 9.364A39.436 39.436 0 0 1 0 76.519c9.161 6.287 20.042 9.946 31.733 9.95 38.076.01 58.899-33.126 58.899-61.868 0-.943-.021-1.88-.06-2.814 4.044-3.014 7.554-6.792 10.329-11.107a39.506 39.506 0 0 1-11.89 3.25c4.274-2.63 7.557-6.839 9.103-11.887-4 2.426-8.43 4.165-13.146 5.069z"/>
					</svg>
				</a>
			</li>
			<li>
				<a href="https://www.youtube.com/channel/UC5qTBf9rEFj2UdxNEQOzlxA">
					<!-- <i class="fab fa-youtube-square"></i> -->
					<!-- <img class="social-icon" src="<?=Assets\asset_path('images/youtube.svg');?>"	 /> -->

					<svg class="social-icon" viewBox="0 0 102 72">
						<path d="M100.198 15.945s-.989-6.951-4.021-10.013C92.333 1.915 88.02 1.896 86.045 1.66 71.895.64 50.667.64 50.667.64h-.045s-21.227 0-35.379 1.02c-1.976.236-6.285.255-10.131 4.272-3.033 3.062-4.02 10.013-4.02 10.013S.082 24.107.082 32.27v7.654c0 8.161 1.01 16.324 1.01 16.324s.987 6.95 4.02 10.013c3.846 4.018 8.899 3.889 11.15 4.31 8.09.775 34.382 1.015 34.382 1.015s21.25-.033 35.401-1.053c1.976-.235 6.288-.254 10.132-4.272 3.032-3.062 4.021-10.013 4.021-10.013s1.01-8.163 1.01-16.324V32.27c0-8.163-1.01-16.325-1.01-16.325zm-59.993 33.25l-.005-28.34 27.324 14.22-27.32 14.12z"/>
					</svg>
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
