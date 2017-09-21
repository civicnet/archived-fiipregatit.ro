<?php

namespace Entity;


class GhidEducativ
{
    /**
     * @var int
     */
    private $_id;

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
     * @var string
     */
    private $_fisier1;

    /**
     * @var string
     */
    private $_fisier2;

    /**
     * @var string
     */
    private $_fisier3;

    /**
     * GhidEducativ constructor.
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
     * @return string
     */
    public function getFisier1()
    {
        return $this->_fisier1;
    }

    /**
     * @param string $fisier1
     * @return $this
     */
    public function setFisier1($fisier1)
    {
        $this->_fisier1 = $fisier1;
        return $this;
    }

    /**
     * @return string
     */
    public function getFisier2()
    {
        return $this->_fisier2;
    }

    /**
     * @param string $fisier2
     * @return $this
     */
    public function setFisier2($fisier2)
    {
        $this->_fisier2 = $fisier2;
        return $this;
    }

    /**
     * @return string
     */
    public function getFisier3()
    {
        return $this->_fisier3;
    }

    /**
     * @param string $fisier3
     * @return $this
     */
    public function setFisier3($fisier3)
    {
        $this->_fisier3 = $fisier3;
        return $this;
    }


}

