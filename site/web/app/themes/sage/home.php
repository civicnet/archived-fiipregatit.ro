<?php get_template_part('templates/page', 'header'); ?>

<h1>Home page</h1>

<?php

$linkuriUtile = \RepoManager::getLinkuriUtileRepository()->getList(App::LINKURI_UTILE_COUNT);
var_dump($linkuriUtile);

?>

<?php the_posts_navigation(); ?>
