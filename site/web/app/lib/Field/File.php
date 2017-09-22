<?php
namespace Field;


class File
{
    /**
     * @var int
     */
    private $_id;
    /**
     * @var string
     */
    private $_alt;
    /**
     * @var string
     */
    private $_title;
    /**
     * @var string
     */
    private $_caption;
    /**
     * @var string
     */
    private $_description;
    /**
     * @var string
     */
    private $_mimeType;
    /**
     * @var string
     */
    private $_url;

    /**
     * Fisier constructor.
     * @param array $file
     */
    public function __construct(array $file)
    {
        $this->_id = $file['id'];
        $this->_alt = $file['alt'];
        $this->_title = $file['title'];
        $this->_caption= $file['caption'];
        $this->_description= $file['description'];
        $this->_mimeType= $file['mime_type'];
        $this->_url= $file['url'];
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
    public function getAlt()
    {
        return $this->_alt;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->_title;
    }

    /**
     * @return string
     */
    public function getCaption()
    {
        return $this->_caption;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->_description;
    }

    /**
     * @return string
     */
    public function getMimeType()
    {
        return $this->_mimeType;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->_url;
    }

}
