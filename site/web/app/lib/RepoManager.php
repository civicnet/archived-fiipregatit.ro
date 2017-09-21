<?php
use Repository\GhiduriEducativeRepository;

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
        if (empty(self::$repositories[Fiipregatit_Content::POST_TYPE_GHID_EDUCATIV])) {
            self::$repositories[Fiipregatit_Content::POST_TYPE_GHID_EDUCATIV] = new GhiduriEducativeRepository();
        }

        return self::$repositories[Fiipregatit_Content::POST_TYPE_GHID_EDUCATIV];
    }
}
