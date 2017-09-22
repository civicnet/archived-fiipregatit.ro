<?php
namespace Repository;

use Entity\GhidEducativ;

class GhiduriEducativeRepository
{
    /**
     * @var string
     */
    private $_customPostType = \App::POST_TYPE_GHID_EDUCATIV;

    /**
     * @param int $count
     * @param array $extraArgs
     * @return array
     */
    public function getList($count = -1, $extraArgs = [])
    {
        $args = array(
            'post_type' => $this->_customPostType,
            'post_status' => 'publish',
            'posts_per_page' => $count,
            'ignore_sticky_posts' => 1
        );

        if (!empty($extraArgs)) {
            $args = array_merge($args, $extraArgs);
        }

        $my_query = new \WP_Query($args);
        if (!$my_query->have_posts()) {
            return [];
        }

        $ghiduri = [];
        while ($my_query->have_posts()) {
            $my_query->the_post();
            $post = get_post(get_the_ID());
            $ghiduri[get_the_ID()] = $this->_getGhid($post, true);
        }
        wp_reset_query();  // Restore global post data stomped by the_post().

        return $ghiduri;
    }

    /**
     * @param \WP_Post $post
     * @return GhidEducativ
     */
    private function _getGhid(\WP_Post $post, $includeRelated = false)
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
            $ghiduriAsemanatoare[] = self::_getGhid($relatedPost, false);
        }

        return $ghiduriAsemanatoare;
    }
}
