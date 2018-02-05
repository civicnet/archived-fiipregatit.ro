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
      ->setTitle($post->post_title)
      ->setContent(get_field('continut'))
      ->setDate(new \DateTime($post->post_date))
      ->setPermalink(get_the_permalink())
      ->setImage(get_field('imagine'))
      ->setExtras(get_field('extras'))
      ->setAttachments(static::falseyToNull(
        get_field('materiale_de_informare')
      ));
  }
}
