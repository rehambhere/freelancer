<?php
namespace System;
class Url
{
    /**
     * @var Application
     */
    private $app;

    /**
     * Url constructor.
     * @param Application $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * genreall full link for the given path
     * @param $path
     * @return string
     */
    public function link($path)
    {
       return $this->app->request->baseUrl().trim($path,'/');
    }

    /**redirect to the given path
     * @param $path
     */
    public function redirectTo($path)
    {
        header('location:'.$this->link($path));
        exit;
    }
}