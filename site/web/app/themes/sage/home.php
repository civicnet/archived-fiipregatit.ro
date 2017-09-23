<?php get_template_part('templates/page', 'header'); ?>

<h1>Home page</h1>
<?php

$ghiduri = \RepoManager::getGhidurEducativeRepository()->getList(App::HOMEPAGE_GHID_COUNT);

var_dump($ghiduri);

?>

<?php the_posts_navigation(); ?>
