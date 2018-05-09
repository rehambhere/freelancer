<?php

namespace System\View;

use System\Application;

class ViewFactory
{
    private $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * render the given view path with passed variables
     * @param $viewPath
     * @param array $data
     * @return View
     */
    public function render($viewPath, array $data=[])
    {
        $view=  new View($this->app->file, $viewPath, $data);
        return $view;
    }

}