<?php
use Repository\GuideRepository;
use Repository\CampaignRepository;
use Repository\LinkRepository;

final class RepoManager {
    private function __construct() {}

    public static function getGuideRepository(): GuideRepository {
        return self::getRepository(App::POST_TYPE_GUIDE);
    }

    public static function getCampaignRepository(): CampaignRepository {
        return self::getRepository(App::POST_TYPE_CAMPAIGN);
    }

    public static function getLinkRepository(): LinkRepository {
        return self::getRepository(App::POST_TYPE_LINK);
    }

    private static function getRepository(
      string $repositoryKey
    )/*: AbstractRepository*/ {
      switch ($repositoryKey) {
        case App::POST_TYPE_LINK:
          return LinkRepository::get();
        case App::POST_TYPE_GUIDE:
          return GuideRepository::get();
        case App::POST_TYPE_CAMPAIGN:
          return CampaignRepository::get();
      }

      throw new Exception(sprintf(
        'Invalid repository type `%s`',
        $repositoryKey
      ));
    }
}
