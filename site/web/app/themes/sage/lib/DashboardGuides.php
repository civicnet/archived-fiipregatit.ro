<?php

  final class DashboardGuides {
    private static $instance = null;
    private $guidePath = null;
    private $parser = null;
    private $purifier = null;

    private function __construct() {
      $this->guidePath = dirname(__FILE__).'/../templates/markdown/';
      $this->parser = new Parsedown();
      $this->purifier = new HTMLPurifier(HTMLPurifier_Config::createDefault());
    }

    public static function get(): DashboardGuides {
      if (self::$instance) {
        return $instance;
      }

      return new DashboardGuides();
    }

    public function render(): void {
      $handler = opendir($this->guidePath);

      while (($file = readdir($handler)) !== false) {
        $file_path = $this->guidePath . $file;
        if (!is_file($file_path)) {
          continue;
        }

        $path_parts = pathinfo($file);
        if ($path_parts['extension'] !== 'md') {
          continue;
        }

        $contents = file_get_contents($this->guidePath . $file);
        $output = $this->purifier->purify(
          $this->parser->text($contents)
        );

        wp_add_dashboard_widget(
          'help_widget_'.$path_parts['filename'],
          $path_parts['filename'],
          function() use ($output) {
            echo $output;
          }
        );
      }
    }
  }
