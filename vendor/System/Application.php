<?php
namespace System;
use Closure;
class Application
{
    private static $instance;
    /**
     * @var array
     */
    private $container = [];

    /**
     * run the Application
     */
    public function run()
    {
        $this->session->start();
        $this->request->PrepareUrl();
        $this->file->call('App/index.php');
        list($controller, $method, $arguments)= $this->route->getProperRoute();
        $output = $this->load->action($controller, $method, $arguments);
        $this->response->setOutput($output);
        $this->response->send();
    }
    /**
     * Application constructor.
     * @param File $file
     */
    private function __construct(File $file)
    {
        $this->share('file',$file);
        $this->registerClasses();
        $this->loadHelpers();


    }

    /**
     * Get Application Instance
     * @param $file
     * @return mixed
     */
    public static function getInstance($file = null)
    {
        if(is_null(static::$instance)) {
            static::$instance = new static($file);
        }
        return static::$instance;
    }



    /**
     *  Register classes spl auto load register
     */
    private function registerClasses()
    {
        spl_autoload_register([$this,'load']);
    }

    /**
     * load class through autoloading
     * @param $class
     */
    public function load($class)
    {
        if(strpos($class,'App')===0){
            $file = $class.'.php';
      

        } else {
            //get the class from vendor
            $file = 'vendor/'.$class.'.php';
        }
        if($this->file->exists($file)){
            $this->file->call($file);
        }
    }

    /**
     * get shared value
     * @param $key
     * @return mixed|null
     */
    public function get($key)
    {
        if(! $this->isSharing($key)) {
            if($this->isCoreAlias($key)) {
              $this->share($key, $this->creatNewObject($key));
            } else {
                die($key .' not found in application ');
            }
        }
        return $this->container[$key];
    }

    /**
     * if the given key in an alias
     * @param $alias
     * @return bool
     */
    private function isCoreAlias($alias)
    {
        $coreClasses = $this->coreClass();
        return isset($coreClasses[$alias]);
    }

    /**
     * creat new object for the core class
     * @param $alias
     * @return mixed
     */
    private function creatNewObject($alias)
    {
        $coreClasses = $this->coreClass();
        $object = $coreClasses[$alias];
        return new $object($this);
    }

    /**
     * Detrmine if the given key shared Application
     * @param $key
     * @return bool
     */
    public function isSharing($key)
    {
        return isset($this->container[$key]);
    }
    /**
     * share the given key|value through Application
     * @param $key
     * @param $value
     * @return mixed
     */
    public function share($key, $value)
    {
        if($value instanceof Closure){
            $value = call_user_func($value,$this);
        }
        $this->container[$key] = $value;
      }

    /**
     * get all core class with its aliases
     * @return array
     */
    public function coreClass()
    {
      return[
          'request'  =>  'System\\Http\\Request',
          'response' =>  'System\\Http\\Response',
          'session'  =>  'System\\Session',
          'route'    =>   'System\\Route',
          'html'     =>   'System\\Html',
          'load'     =>   'System\\Loader',
          'cookie'   =>   'System\\Cookie',
          'db'       =>   'System\\Database',
          'url'      =>   'System\\Url',
          'view'     =>   'System\\View\\ViewFactory',
          'validator' =>   'System\\Validation'
      ] ;
    }

    /**
     * get shared value dynamically
     * @param $key
     * @return mixed|null
     */
    public function __get($key)
    {
       return $this->get($key);
    }

    /**
     * load Helper
     * @return mixed
     */
    private function loadHelpers()
    {
       return $this->file->call('vendor/helper.php');
    }

}