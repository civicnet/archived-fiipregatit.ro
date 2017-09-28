<?php /* Template Name: listing-ghiduri */ ?>

<?php while (have_posts()) : the_post(); ?>
  <h1><?php the_title()?></h1>
  <p>
    <?php the_content()?>
  </p>
<?php endwhile; ?>

<?php

$ghiduri = \RepoManager::getGhidurEducativeRepository()->getList(App::HOMEPAGE_GHID_COUNT);
var_dup($ghiduri);


