<?php

  use CustomPage\PersonalPlanPage;

  final class CustomPageManager {
      private function __construct() {}

      public static function getPersonalPlanPage(): PersonalPlanPage {
          return self::getPage(App::PAGE_PERSONAL_PLAN);
      }

      private static function getPage(
        string $key
      )/*: AbstractRepository*/ {
        switch ($key) {
          case App::PAGE_PERSONAL_PLAN:
            return PersonalPlanPage::get();
        }

        throw new Exception(sprintf(
          'Invalid repository type `%s`',
          $repositoryKey
        ));
      }
  }
