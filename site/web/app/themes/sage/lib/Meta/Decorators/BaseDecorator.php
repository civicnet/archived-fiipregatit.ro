<?php

  /*
    $generator = MetaGenerator::get($post)->getAll();
    //$decorator = new BaseDecorator($generator);
    $og_decorator = new OpenGraphMetaDecorator($generator);

    $partials = $og_decorator->getTagPartials(OpenGraphMetaCategory::IMAGE);
    $all_partials = $og_decorator->getAllTagPartials();
  */
  abstract class BaseDecorator {
    private $metaGenerator;
    private $tags;

    const TAG_CATEGORY = null;

    public function __construct(MetaGenerator $generator) {
      $this->metaGenerator = $generator;
      $this->initTags();
    }

    private function initTags(): void {
      $this->tags = $this->metaGenerator->getAll()[static::TAG_CATEGORY];
    }

    final protected function getRawTags(): array {
      return $this->tags;
    }

    abstract public function getTagPairs(
      /* FooMetaCategory */ string $category
    ): /* Pair */ ?array;

    abstract public function getAllTagPairs(
    ): /* array<Pair> */ array;

    protected function sanitizeTagContent(string $string): string {
      return trim(preg_replace('/\s+/', ' ', $string));
    }
  }
