<?php
  global $wp_query;
  $campaign = \RepoManager::getCampaignRepository()
    ->getByPost($wp_query->post);
?>

<article>
  <header>
    <h1 class="entry-title"><?php echo $campaign->getTitle() ?></h1>
  </header>
  <div class="entry-content">
    <?php echo $campaign->getContent()?>
  </div>
</article>
