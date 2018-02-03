<?php
use Repository\GhiduriRepository;
use Repository\CampaignRepository;
use Repository\LinkuriUtileRepository;

class RepoManager
{
    /**
     * Repositories 'cache'
     * @var array
     */
    static private $repositories = [];

    /**
     * @return GhiduriRepository
     */
    public static function getGhiduriRepository()
    {
        if (empty(self::$repositories[App::POST_TYPE_GHID])) {
            self::$repositories[App::POST_TYPE_GHID] = new GhiduriRepository();
        }

        return self::$repositories[App::POST_TYPE_GHID];
    }

    public static function getCampaignRepository(): CampaignRepository {
        if (empty(self::$repositories[App::POST_TYPE_CAMPAIGN])) {
            self::$repositories[App::POST_TYPE_CAMPAIGN] = new CampaignRepository();
        }

        return self::$repositories[App::POST_TYPE_CAMPAIGN];
    }

    /**
     * @return LinkuriUtileRepository
     */
    public static function getLinkuriUtileRepository()
    {
        if (empty(self::$repositories[App::POST_TYPE_LINK_UTIL])) {
            self::$repositories[App::POST_TYPE_LINK_UTIL] = new LinkuriUtileRepository();
        }

        return self::$repositories[App::POST_TYPE_LINK_UTIL];
    }
}
