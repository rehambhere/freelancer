<?php
namespace System;
    class Route
    {
        /**
         * routes container
         * @var array
         */
        protected $routes = [];
        /**
         * @var Application
         */
        private  $app;
        /**
         * @var
         */
        private $notFound;

        /**
         * Route constructor.
         * @param Application $app
         */
        public function __construct(Application $app)
        {
            $this->app = $app;
        }

        /**
         * add New Roust
         * @param $url
         * @param $action
         * @param string $requestMethod
         * @return array
         */
        public function add($url, $action , $requestMethod ='GET')
        {
            $route = [
                'url' =>$url,
                'pattern'=>$this->generatePattern($url),
                'action'=>$this->getAction($action),
                'requestMethod'=>$requestMethod,
            ];
            return $this->routes[]= $route;
        }

        /**
         * Generate regex pattern
         * @param $url
         * @return string
         */
        private function generatePattern($url)
        {
            $pattern ='#^';
            $pattern .= str_replace([':text',':id'],['([a-z A-z 0-9-]+)','(\d+)'],$url);
            $pattern.='$#';
            return $pattern;
        }

        /**
         * get the proper Action
         * @param $action
         * @return string
         */
        private function getAction($action)
        {
         $action = str_replace('/','\\',$action);
            return strpos($action,'@')!==false ? $action: $action.'@index';
        }

        /**
         * setNotFound
         * @param $url
         */
        public function notFound($url)
        {
           $this->notFound=$url;
        }

        /**
         * get proper Route
         */
        public function getProperRoute()
        {
            foreach ($this->routes as $route) {
                if($this->isMatching($route['pattern'])AND $this->isMatchingRequestMethod($route['requestMethod'])) {
                    $arguments = $this->getArgumentForm($route['pattern']);
                //controller @method//
                    list($controller, $method) = explode('@',$route['action']);
                    return [$controller, $method, $arguments];
                }
            }
            return $this->app->url->redirectTo($this->notFound);

        }

        /**
         * if the request method equales the given route method
         * @param $routeMethod
         * @return mixed
         */
        private function isMatchingRequestMethod($routeMethod)
        {
            return $routeMethod == $this->app->request->method();
        }

        /**
         * if the given pattern match request url
         * @param $pattern
         * @return mixed
         */
        private function isMatching($pattern)
        {
            return preg_match($pattern, $this->app->request->url());
        }

        /**
         * get argument the current request url
         * @param $pattern
         * @return mixed
         */
        private function getArgumentForm($pattern)
        {
            preg_match($pattern, $this->app->request->url(),$matches);
            array_shift($matches);
            return $matches;
        }

        /**
         * get al routs
         */
        public function routes()
        {
            return $this->routes;
        }

    }