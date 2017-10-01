<?php /* Template Name: listing-campanii */ ?>

<?php while (have_posts()) : the_post(); ?>
  <h1><?php the_title()?></h1>
  <p>
    <?php the_content()?>
  </p>
<?php endwhile; ?>

<?php

$campanii = \RepoManager::getCampaniiRepository()->getList(App::HOMEPAGE_CAMPANII_COUNT);
var_dump($campanii);

