<?php

  /*array(
    property => content
  )*/
  final class MetaMetaDecorator extends BaseDecorator {
    const TAG_CATEGORY = MetaCategories::META;

    public function getAllTagPairs(): /* array<Pair>*/ array {
      $flat_list = array();
      foreach(MetaMetaCategory::getList() as $category) {
        $pairs = $this->getTagPairs($category);
        if (!$pairs) {
          continue;
        }

        foreach($pairs as $key => $tag) {
          $flat_list[] = $tag;
        }
      }

      return $flat_list;
    }

    public function getTagPairs(
      /* OpenGraphMetaCategories */ string $category
    ): /* Pair */ ?array {
      if (!isset($this->getRawTags()[$category])) {
        return null;
      }

      $tags = $this->getRawTags()[$category];
      if (is_string($tags)) {
        $tags = array($category => $tags);
      }

      if (!is_array($tags)) {
        return null;
      }

      $parsed_tags = array();
      foreach ($tags as $key => $tag) {
        $parsed_tags[$key] = array(
          'name' => $this->sanitizeTagContent($key),
          'content' => $this->sanitizeTagContent($tag),
        );
      }

      return $parsed_tags;
    }
  }
