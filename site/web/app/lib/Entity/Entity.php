<?php

namespace Entity;

/**
 * The base of an entity
 * @package Entity
 */
class Entity
{
    /**
     * @var int
     */
    protected $_id;

    /**
     * Entity constructor.
     * @param int $id
     */
    public function __construct($id)
    {
        $this->_id = $id;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->_id;
    }
}
