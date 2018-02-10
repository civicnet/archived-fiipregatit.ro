<?php
namespace Repository;

use Entity\Guide;

final class GuideRepository extends AbstractRepository {
  protected static $customPostType = \App::POST_TYPE_GUIDE;

  protected static function getEntity(
    \WP_Post $post,
    bool $includeRelated = false
  ): Guide {
    $ghid = (new Guide($post->ID))
      ->setTitle($post->post_title, $post->ID)
      ->setNume(get_field('nume_eveniment', $post->ID))
      ->setInainteaEvenimentului(get_field('inaintea_evenimentului', $post->ID))
      ->setInTimpulEvenimentului(get_field('in_timpul_evenimentului', $post->ID))
      ->setDupaEveniment(get_field('dupa_eveniment', $post->ID))
      ->setInformatiiAditionale(get_field('informatii_aditionale', $post->ID))
      ->setVideoAjutator(get_field('video_ajutator', $post->ID))
      ->setGalerieFoto(array_filter(
        (array) get_post_meta($post->ID, \App::GUIDE_METABOX_GALLERY, 1)
      ))
      ->setGuidePDF(static::falseyToNull(
        get_field('ghid_pdf', $post->ID)
      ))
      ->setPictograma(get_field('pictograma_eveniment', $post->ID))
      ->setPermalink(get_the_permalink($post->ID));

    if ($includeRelated) {
      $similar = self::getSimilarGuides($post);
      $ghid->setSimilarGuides($similar);
    }

    return $ghid;
  }

  private static function getSimilarGuides(
    \WP_Post $post
  ): array {
    $relatedPosts = get_field('ghiduri_similare', $post->ID);
    if (!$relatedPosts) {
      return [];
    }

    $ghiduriSimilare = [];
    foreach ($relatedPosts as $relatedPost) {
      $ghiduriSimilare[] = self::getEntity($relatedPost);
    }

    return $ghiduriSimilare;
  }
}
