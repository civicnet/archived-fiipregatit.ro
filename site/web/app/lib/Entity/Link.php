<?php

namespace Entity;


class Link extends Entity {
    /**
     * @var
     */
    private $_title;
    /**
     * @var
     */
    private $_target;

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->_title;
    }

    /**
     * @param mixed $title
     * @return $this
     */
    public function setTitle($title)
    {
        $this->_title = $title;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTarget()
    {
        return $this->_target;
    }

    /**
     * @param mixed $target
     * @return $this
     */
    public function setTarget($target)
    {
        $this->_target = $target;
        return $this;
    }


}
