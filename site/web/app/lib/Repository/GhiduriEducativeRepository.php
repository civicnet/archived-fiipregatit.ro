<?php
namespace Repository;

use Entity\GhidEducativ;

class GhiduriEducativeRepository
{
    /**
     * @var string
     */
    private $_customPostType = \Fiipregatit_Content::POST_TYPE_GHID_EDUCATIV;

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
            $ghiduri[get_the_ID()] = $this->_getGhid($post);
        }
        wp_reset_query();  // Restore global post data stomped by the_post().

        return $ghiduri;
    }

    /**
     * @param \WP_Post $post
     * @return GhidEducativ
     */
    private function _getGhid(\WP_Post $post)
    {
        $ghid = new GhidEducativ($post->ID);

        $ghid
            ->setTitle($post->post_title)
            ->setIntro($post->post_content)
            ->setInainteaEvenimentului(
                $this->_getPostMeta($post->ID, 'ghid_inaintea_evenimentului')
            )
            ->setInTimpulEvenimentului(
                $this->_getPostMeta($post->ID, 'ghid_intimpul_evenimentului')
            )
            ->setDupaEveniment(
                $this->_getPostMeta($post->ID, 'ghid_dupa_eveniment')
            )
            ->setAlteInformatii(
                $this->_getPostMeta($post->ID, 'ghid_alte_informatii')
            )
            ->setFisier1(
                $this->_getPostMeta($post->ID, 'ghid_fisier_pdf_1')
            )
            ->setFisier2(
                $this->_getPostMeta($post->ID, 'ghid_fisier_pdf_2')
            )
            ->setFisier3(
                $this->_getPostMeta($post->ID, 'ghid_fisier_pdf_3')
            );

        return $ghid;
    }


    /**
     * @param $id
     * @param $key
     * @return mixed
     */
    protected function _getPostMeta($id, $key)
    {
        $meta = get_post_meta($id, $key);
        return (!empty($meta[0])) ? $meta[0] : null;
    }
}
