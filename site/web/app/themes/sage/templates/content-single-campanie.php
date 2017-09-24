<?php
global $wp_query;
$campanie = \RepoManager::getCampaniiRepository()->getByPost($wp_query->post);
?>

<article>
  <header>
    <h1 class="entry-title"><?php echo $campanie->getTitle() ?></h1>
  </header>
  <div class="entry-content">
    <?php echo $campanie->getContent()?>
  </div>
</article>
