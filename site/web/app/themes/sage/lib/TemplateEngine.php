<?php
  final class TemplateEngine {
    private static $instance = null;
    private $mustacheEngine = null;

    private function __construct() {
      $this->mustacheEngine = new Mustache_Engine(array(
        'cache' => dirname(__FILE__).'/../mustache_cache',
        'loader' => new Mustache_Loader_FilesystemLoader(
          dirname(__FILE__).'/../templates/mustache'
        ),
        'partials_loader' => new Mustache_Loader_FilesystemLoader(
          dirname(__FILE__).'/../templates/mustache/partials'
        ),
        'escape' => function($value) {
            return htmlspecialchars($value, ENT_COMPAT, 'UTF-8');
        },
        'logger' => new Mustache_Logger_StreamLogger('php://stderr'),
        'strict_callables' => true,
      ));
    }

    public static function get(): TemplateEngine {
      if (self::$instance) {
        return $instance;
      }

      return new TemplateEngine();
    }

    public function render(
      string $template_name,
      array $data
    ) {
      echo ($this->mustacheEngine->loadTemplate($template_name))->render($data);
    }

    public function getPartial(
      string $partial_name
    ) {
      return $this->mustacheEngine->loadPartial($partial_name);
    }
  }
?>
