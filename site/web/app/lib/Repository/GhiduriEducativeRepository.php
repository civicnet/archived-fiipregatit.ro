<?php
namespace Repository;

use Entity\GhidEducativ;

class GhiduriEducativeRepository extends AbstractRepository
{
    /**
     * @var string
     */
    protected $_customPostType = \App::POST_TYPE_GHID_EDUCATIV;

    /**
     * @param \WP_Post $post
     * @param bool $includeRelated
     * @return GhidEducativ
     */
    protected function _getEntity(\WP_Post $post, $includeRelated = false)
    {
        $ghid = new GhidEducativ($post->ID);

        $ghid
            ->setTitle($post->post_title)
            ->setIntro($post->post_content)
            ->setInainteaEvenimentului( get_field('ghid_inaintea_evenimentului') )
            ->setInTimpulEvenimentului( get_field('ghid_intimpul_evenimentului') )
            ->setDupaEveniment( get_field('ghid_dupa_eveniment') )
            ->setAlteInformatii( get_field('ghid_alte_informatii') )
            ->setFisier1( get_field('ghid_fisier_pdf_1') )
            ->setFisier2( get_field('ghid_fisier_pdf_2') )
            ->setFisier3( get_field('ghid_fisier_pdf_3') )
            ->setPermalink(get_the_permalink())
        ;

        if ($includeRelated) {
            $ghid->setGhiduriAsemanatoare($this->_getGhiduriAsemanatoare());
        }

        return $ghid;
    }

    /**
     * @return array
     */
    private function _getGhiduriAsemanatoare()
    {
        $relatedPosts = get_field('ghiduri_asemanatoare');
        if (!$relatedPosts) {
            return [];
        }

        $ghiduriAsemanatoare = [];
        foreach ($relatedPosts as $relatedPost){
            $ghiduriAsemanatoare[] = $this->_getEntity($relatedPost, false);
        }

        return $ghiduriAsemanatoare;
    }
}
