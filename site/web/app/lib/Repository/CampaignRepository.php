<?php
  namespace Repository;

  use Entity\Campaign;

  final class CampaignRepository extends AbstractRepository {
    protected static $customPostType = \App::POST_TYPE_CAMPAIGN;

    protected static function getEntity(
      \WP_Post $post,
      bool $includeRelated = false
    ): Campaign {
      $campaign = (new Campaign($post->ID))
        ->setTitle($post->post_title, $post->ID)
        ->setContent(get_field('continut', $post->ID))
        ->setDate(new \DateTime($post->post_date))
        ->setPermalink(get_the_permalink($post->ID))
        ->setImage(get_field('imagine', $post->ID))
        ->setExtras(get_field('extras', $post->ID))
        ->setAttachments(array_filter(
          (array) get_post_meta($post->ID, \App::CAMPAIGN_METABOX_ATTACHMENTS, true)
      ));

      if ($includeRelated) {
        $similar = self::getSimilarGuides($post);
        $campaign->setSimilarGuides($similar);
      }

      return $campaign;
    }

    private static function getSimilarGuides(
      \WP_Post $post
    ): array {
      $relatedPosts = get_field('ghiduri_sugerate', $post->ID);
      if (!$relatedPosts) {
        return [];
      }

      $ghiduriSimilare = [];
      foreach ($relatedPosts as $relatedPost) {
        $ghiduriSimilare[] = \RepoManager::getGuideRepository()->getByPost($relatedPost);
      }

      return $ghiduriSimilare;
    }
  }
