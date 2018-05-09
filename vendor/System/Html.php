<?php
namespace System;

class Html
{
    private $app;
    private $title;
    private $description;
    
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * set title
     * @param $title
     */
    public function setTitle($title)
    {
        $this->title=$title;
    }

    /**
     * get title
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param $description
     */
    public function setDescription($description)
    {
        $this->description= $description;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }
}