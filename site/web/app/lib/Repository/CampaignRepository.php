<?php
namespace Repository;

use Entity\Campaign;

final class CampaignRepository extends AbstractRepository {
  protected static $customPostType = \App::POST_TYPE_CAMPAIGN;

  protected static function getEntity(
    \WP_Post $post,
    bool $includeRelated = false
  ): Campaign {
    return (new Campaign($post->ID))
      ->setTitle($post->post_title, $post->ID)
      ->setContent(get_field('continut', $post->ID))
      ->setDate(new \DateTime($post->post_date))
      ->setPermalink(get_the_permalink($post->ID))
      ->setImage(get_field('imagine', $post->ID))
      ->setExtras(get_field('extras', $post->ID))
      ->setAttachments(array_filter(
        (array) get_post_meta($post->ID, \App::CAMPAIGN_METABOX_ATTACHMENTS, true)
      ));
  }
}
