<?php get_template_part('templates/page', 'header'); ?>

<h1>Home page</h1>
<?php

$ghiduri = \RepoManager::getGhidurEducativeRepository()->getList(App::HOMEPAGE_GHID_COUNT);
var_dump($ghiduri);

$linkuriUtile = \RepoManager::getLinkuriUtileRepository()->getList(App::LINKURI_UTILE_COUNT);
var_dump($linkuriUtile);

$campanii = \RepoManager::getCampaniiRepository()->getList(App::HOMEPAGE_CAMPANII_COUNT);
var_dump($campanii);



?>

<?php the_posts_navigation(); ?>
