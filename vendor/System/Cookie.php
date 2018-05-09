<?php
namespace System;
class Cookie
{
    private $app;

    /**
     * cookie path
     */
    private $path= '/';

    /**
     * Cookie constructor.
     * @param Application $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
        // we will get path from script_name index from _server
        // we will remove just get the directory of the script name
        // file name from it => we will remove index.php
        $this->path = dirname($this->app->request->serves('SCRIPT_NAME'))?:'/';
    }

    /**
     * set new cookies
     * @param $key
     * @param $value
     * @param int $hours
     */
    public function set($key, $value, $hours=1800)
    {
        // here we will see if the hours variable equals -1
        //then it means we will remove the key from cookies
        // otherwise we will just add our normal time
        $expireTime = $hours == -1 ? -1:time()+$hours * 360;
        setcookie($key, $value, $expireTime,$this->path,'',false,true);
    }

    /**
     * get value from cookies
     * @param $key
     * @param null $default
     * @return mixed
     */
    public function get($key, $default=null)
    {
        return array_get($_COOKIE, $key,$default);
    }

    /**
     * if the cookie has the key
     * @param $key
     * @return mixed
     */
    public function has($key)
    {
        return array_key_exists($key, $_COOKIE);
    }

    /**
     * get all cookies
     * @return mixed
     */
    public function all()
    {
        return $_COOKIE;
    }

    /**
     * remove all cookies
     * @param $key
     */
    public function remove($key)
    {
        $this->set($key,null,-1);
        unset($_COOKIE[$key]);
    }

  /**
   * DESTROY ALL COOKIES
   */
    public function destroy()
    {
        foreach (array_keys($this->all())AS $key){
        $this->remove($key);
    }
        unset($_COOKIE);
    }

}