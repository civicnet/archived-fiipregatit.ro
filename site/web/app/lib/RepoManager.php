<?php
use Repository\GhiduriEducativeRepository;
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
     * @return GhiduriEducativeRepository
     */
    public static function getGhidurEducativeRepository()
    {
        if (empty(self::$repositories[App::POST_TYPE_GHID_EDUCATIV])) {
            self::$repositories[App::POST_TYPE_GHID_EDUCATIV] = new GhiduriEducativeRepository();
        }

        return self::$repositories[App::POST_TYPE_GHID_EDUCATIV];
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
