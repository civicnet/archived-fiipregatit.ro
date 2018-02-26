<?php

  use CustomPage\PersonalPlanPage;
  use CustomPage\FirstAidPage;
  use CustomPage\AboutPage;

  final class CustomPageManager {
      private function __construct() {}

      public static function getPersonalPlanPage(): PersonalPlanPage {
        return self::getPage(App::PAGE_PERSONAL_PLAN);
      }

      public static function getFirstAidPage(): FirstAidPage {
        return self::getPage(App::PAGE_FIRST_AID);
      }

      public static function getAboutPage(): AboutPage {
        return self::getPage(App::PAGE_ABOUT);
      }


      private static function getPage(
        string $key
      )/*: AbstractRepository*/ {
        switch ($key) {
          case App::PAGE_PERSONAL_PLAN:
            return PersonalPlanPage::get();
          case App::PAGE_FIRST_AID:
            return FirstAidPage::get();
          case App::PAGE_ABOUT:
            return AboutPage::get();
        }

        throw new Exception(sprintf(
          'Invalid repository type `%s`',
          $repositoryKey
        ));
      }
  }
