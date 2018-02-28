<?php

  namespace CustomPage;
  use Entity\About;

  final class AboutPage extends BaseCustomPage {
    const PAGE_NAME = \App::PAGE_ABOUT;

    public function getPage(): About {
      return (new About($this->wpObject->ID))
        ->setDespre(get_field('despre', $this->wpObject->ID))
        ->setContext(get_field('context', $this->wpObject->ID))
        ->setEchipa(get_field('echipa', $this->wpObject->ID))
        ->setPermalink(get_page_link($this->wpObject->ID))
        ->setParteneri(array_filter(
          (array) get_post_meta(
            $this->wpObject->ID,
            \App::ABOUT_PAGE_METABOX_PARTNERS,
            true
          )
        ))
        ->setDescriereParteneri(get_post_meta(
          $this->wpObject->ID,
          \App::ABOUT_PAGE_METABOX_PARTNER_DESC,
          true
        )); 
    }
  }
