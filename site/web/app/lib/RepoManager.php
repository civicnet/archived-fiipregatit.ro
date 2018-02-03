<?php
use Repository\GhiduriRepository;
use Repository\CampaniiRepository;
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

    /**
     * @return CampaniiRepository
     */
    public static function getCampaniiRepository()
    {
        if (empty(self::$repositories[App::POST_TYPE_CAMPANIE])) {
            self::$repositories[App::POST_TYPE_CAMPANIE] = new CampaniiRepository();
        }

        return self::$repositories[App::POST_TYPE_CAMPANIE];
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
