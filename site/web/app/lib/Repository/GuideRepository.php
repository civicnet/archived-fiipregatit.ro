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
      ->setTitle($post->post_title)
      ->setNume(get_field('nume_eveniment'))
      ->setInainteaEvenimentului(get_field('inaintea_evenimentului'))
      ->setInTimpulEvenimentului(get_field('in_timpul_evenimentului'))
      ->setDupaEveniment(get_field('dupa_eveniment'))
      ->setInformatiiAditionale(get_field('informatii_aditionale'))
      ->setVideoAjutator(get_field('video_ajutator'))
      ->setGalerieFoto(static::falseyToNull(
        get_field('galerie_foto')
      ))
      ->setGuidePDF(static::falseyToNull(
        get_field('ghid_pdf')
      ))
      ->setPictograma(get_field('pictograma_eveniment'))
      ->setPermalink(get_the_permalink());

    if ($includeRelated) {
        $ghid->setSimilarGuides(self::getSimilarGuides());
    }

    return $ghid;
  }

  private static function getSimilarGuides(): array {
    $relatedPosts = get_field('ghiduri_similare');
    if (!$relatedPosts) {
      return [];
    }

    $ghiduriSimilare = [];
    foreach ($relatedPosts as $relatedPost) {
      $ghiduriSimilare[] = self::getEntity($relatedPost, false);
    }

    return $ghiduriSimilare;
  }
}
