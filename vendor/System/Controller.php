<?php
namespace System;

abstract class Controller
{
    /**
     * @var Application
     */
    protected $app;
    protected $errors =[];
    /**
     * Controller constructor.
     * @param Application $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * call shared application objects
     * @param $key
     * @return mixed|null
     */
    public function __get($key)
    {
        return $this->app->get($key);
    }

    /**
     * encode the given value json
     * @param $data
     * @return mixed
     */
    public function json($data)
    {
        return json_encode($data);
    }
}