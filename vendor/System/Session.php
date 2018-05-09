<?php
namespace System;
class Session
{
    /**
     * Application object
     */
    private $app;

    /**
     * Session constructor.
     * @param Application $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * start session
     */
    public function start()
    {
        ini_set("session.use_only_cookies",1);
        if (!session_id()) {
            session_start();
        }
    }

    /**
     * set new value
     * @param $key
     * @param $value
     */
    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    /**
     * get value session
     * @param $key
     * @return mixed
     */
    public function get($key, $default =null)
    {
        return array_get($_SESSION, $key, $default);
    }

    /**
     * check if has key in session
     * @param $key
     * @return null
     */
    public function has($key)
    {
        return isset($_SESSION[$key]);
    }

    /**
     * remove the given key from session
     * @param $key
     */
    public function remove($key)
    {
        unset($_SESSION[$key]);
    }

    /**
     * @return mixed
     */
    public function all()
    {
        return $_SESSION;
    }

    /**
     * destroy session
     */
    public function destroy()
    {
        session_destroy();
        unset($_SESSION);
    }

    /**
     * get value from session  then remove
     * @param $key
     * @return mixed
     */
    public function pull($key)
    {
        $value = $this->get($key);
        $this->remove($key);
        return $value;
    }

}