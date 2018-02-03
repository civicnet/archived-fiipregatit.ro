<?php
namespace Repository;

use Entity\Ghid;

final class GhiduriRepository extends AbstractRepository {
  protected $customPostType = \App::POST_TYPE_GHID;

  protected function getEntity(
    \WP_Post $post,
    bool $includeRelated = false
  ): Ghid {
    $ghid = (new Ghid($post->ID))
      ->setTitle($post->post_title)
      ->setNume(get_field('nume_eveniment'))
      ->setInainteaEvenimentului(get_field('inaintea_evenimentului'))
      ->setInTimpulEvenimentului(get_field('in_timpul_evenimentului'))
      ->setDupaEveniment(get_field('dupa_eveniment'))
      ->setInformatiiAditionale(get_field('informatii_aditionale'))
      ->setVideoAjutator(get_field('video_ajutator'))
      ->setGalerieFoto($this->falseyToNull(
        get_field('galerie_foto')
      ))
      ->setGhidPDF($this->falseyToNull(
        get_field('ghid_pdf')
      ))
      ->setPictograma(get_field('pictograma_eveniment'))
      ->setPermalink(get_the_permalink());

    if ($includeRelated) {
        $ghid->setGhiduriSimilare($this->getGhiduriSimilare());
    }

    return $ghid;
  }

  private function falseyToNull($value) {
    if ($value === false) {
      return null;
    }

    return $value;
  }

  private function getGhiduriSimilare(): array {
    $relatedPosts = get_field('ghiduri_similare');
    if (!$relatedPosts) {
      return [];
    }

    $ghiduriSimilare = [];
    foreach ($relatedPosts as $relatedPost) {
      $ghiduriSimilare[] = $this->getEntity($relatedPost, false);
    }

    return $ghiduriSimilare;
  }
}
