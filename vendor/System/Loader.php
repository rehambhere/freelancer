<?php
namespace System;
class Loader
{
    private $app;
    private $controllers = [];
    private $models = [];

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * 
     * @param $controller
     * @param $method
     * @param array $arguments
     */
        public function action($controller, $method,array $arguments=[])
        {
            $object = $this->controller($controller);
           return call_user_func_array([$object,$method],$arguments);
        }
    /**
     * call the given controller
     * @param $controller
     * @return mixed
     */
    public function controller($controller)
    {
        $controller = $this->getControllerName($controller);
        
        if(! $this->hasController($controller)) {
            $this->addController($controller);
        }
        return $this->getController($controller);
    }
    /**
     * if the given class controller exists
     * @param $controller
     * @return mixed
     */
    private function hasController($controller)
    {
        return array_key_exists($controller,$this->controllers);
    }

    /**
     * add new controller
     * @param $controller
     * @return mixed
     */
    private function addController($controller)
    {
        $object = new $controller($this->app);

        return $this->controllers[$controller] = $object;
    }

    /**  
     * return get the controller 
     * @param $controller
     * @return mixed
     */
    private  function getController($controller)
    {
        return $this->controllers[$controller];
    }

    /**
     * get controller name
     * @param $controller
     * @return string
     */
    private function getControllerName($controller)
    {
        $controller .='Controller';
        $controller = 'App\\Controllers\\'.$controller;
        return str_replace('/','\\',$controller);
    }


    /**
     * call the given model
     * @param $model
     * @return mixed
     */
    public function model($model)
    {
        $model = $this->getModelName($model);

        if(! $this->hasModel($model)) {
            $this->addModel($model);
        }
        return $this->getModel($model);
    }
    /**
     * if the given class model exists
     * @param $model
     * @return mixed
     */
    private function hasModel($model)
    {
        return array_key_exists($model,$this->models);
    }

    /**
     * add new model
     * @param $model
     * @return mixed
     */
    private function addModel($model)
    {
        $object = new $model($this->app);

        return $this->models[$model] = $object;
    }

    /**
     * return get the Model
     * @param $Model
     * @return mixed
     */
    private  function getModel($model)
    {
        return $this->models[$model];
    }

    /**
     * get Model name
     * @param $Model
     * @return string
     */
    private function getModelName($model)
    {
        $model .='Model';
        $model = 'App\\Models\\'.$model;
        return str_replace('/','\\',$model);
    }
}