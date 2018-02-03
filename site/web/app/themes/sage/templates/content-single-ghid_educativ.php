<?php
global $wp_query;
$ghid = \RepoManager::getGhidurEducativeRepository()->getByPost($wp_query->post);
?>

<article>
  <header>
    <h1 class="entry-title"><?php echo $ghid->getTitle() ?></h1>
  </header>
  <div class="entry-content">
    <?php echo $ghid->getIntro()?>
  </div>
</article>
