<?php

namespace Entity;

use Field\File;

class GhidEducativ extends Entity
{
    /**
     * @var string
     */
    private $_title;

    /**
     * @var string
     */
    private $_intro;

    /**
     * @var string
     */
    private $_inainteaEvenimentului;

    /**
     * @var string
     */
    private $_inTimpulEvenimentului;

    /**
     * @var string
     */
    private $_dupaEveniment;

    /**
     * @var string
     */
    private $_alteInformatii;

    /**
     * @var File | null
     */
    private $_fisier1;

    /**
     * @var File | null
     */
    private $_fisier2;

    /**
     * @var File | null
     */
    private $_fisier3;

    /**
     * @var GhidEducativ[]
     */
    private $_ghiduriAsemanatoare = [];

    /**
     * @var string
     */
    private $_permalink;

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->_title;
    }

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle($title)
    {
        $this->_title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getIntro()
    {
        return $this->_intro;
    }

    /**
     * @param string $intro
     * @return $this
     */
    public function setIntro($intro)
    {
        $this->_intro = $intro;
        return $this;
    }

    /**
     * @return string
     */
    public function getInainteaEvenimentului()
    {
        return $this->_inainteaEvenimentului;
    }

    /**
     * @param string $inainteaEvenimentului
     * @return $this
     */
    public function setInainteaEvenimentului($inainteaEvenimentului)
    {
        $this->_inainteaEvenimentului = $inainteaEvenimentului;
        return $this;
    }

    /**
     * @return string
     */
    public function getInTimpulEvenimentului()
    {
        return $this->_inTimpulEvenimentului;
    }

    /**
     * @param string $inTimpulEvenimentului
     * @return $this
     */
    public function setInTimpulEvenimentului($inTimpulEvenimentului)
    {
        $this->_inTimpulEvenimentului = $inTimpulEvenimentului;
        return $this;
    }

    /**
     * @return string
     */
    public function getDupaEveniment()
    {
        return $this->_dupaEveniment;
    }

    /**
     * @param string $dupaEveniment
     * @return $this
     */
    public function setDupaEveniment($dupaEveniment)
    {
        $this->_dupaEveniment = $dupaEveniment;
        return $this;
    }

    /**
     * @return string
     */
    public function getAlteInformatii()
    {
        return $this->_alteInformatii;
    }

    /**
     * @param string $alteInformatii
     * @return $this
     */
    public function setAlteInformatii($alteInformatii)
    {
        $this->_alteInformatii = $alteInformatii;
        return $this;
    }

    /**
     * @return array
     */
    public function getFisier1()
    {
        return $this->_fisier1;
    }

    /**
     * @param array|bool $fisier1
     * @return $this
     */
    public function setFisier1($fisier1)
    {
        $this->_fisier1 = null;
        if (is_array($fisier1)) {
            $this->_fisier1 = new File($fisier1);
        }

        return $this;
    }

    /**
     * @return array
     */
    public function getFisier2()
    {
        return $this->_fisier2;
    }

    /**
     * @param array|bool $fisier2
     * @return $this
     */
    public function setFisier2($fisier2)
    {
        $this->_fisier2 = null;
        if (is_array($fisier2)) {
            $this->_fisier2 = new File($fisier2);
        }
        return $this;
    }

    /**
     * @return array
     */
    public function getFisier3()
    {
        return $this->_fisier3;
    }

    /**
     * @param array|bool $fisier3
     * @return $this
     */
    public function setFisier3($fisier3)
    {
        $this->_fisier3 = null;
        if (is_array($fisier3)) {
            $this->_fisier3 = new File($fisier3);
        }
        return $this;
    }

    /**
     * @return GhidEducativ[]
     */
    public function getGhiduriAsemanatoare()
    {
        return $this->_ghiduriAsemanatoare;
    }

    /**
     * @param GhidEducativ[] $ghiduriAsemanatoare
     * @return $this
     */
    public function setGhiduriAsemanatoare($ghiduriAsemanatoare)
    {
        $this->_ghiduriAsemanatoare = $ghiduriAsemanatoare;
        return $this;
    }

    /**
     * @return string
     */
    public function getPermalink()
    {
        return $this->_permalink;
    }

    /**
     * @param string $permalink
     * @return $this
     */
    public function setPermalink($permalink)
    {
        $this->_permalink = $permalink;
        return $this;
    }
}

