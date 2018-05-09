<?php
namespace System;

abstract class Model
{
    /**
     * @var Application
     */
    protected $app;
    /**
     * container errors
     * @var array
     */
    protected $errors =[];
    /**
     * table name
     * @var
     */
    protected $table;
    /**
     * Controller constructor.
     * @param Application $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * @param $key
     * @return mixed|null
     */
    public function __get($key)
    {
        return $this->app->get($key);
    }
    /**
     * Get All Model Recorse
     */
    public function all()
    {
        return $this->fetchAll($this->table);
    }

    /**
     * get all user without admin
     * @return mixed
     *
    public function allusers()
    {

        return $this->db->select('*')->from($this->table)
            ->where('users_group_id !=?',1)->fetchAll();
    }*/

    public function allW()
    {
        return $this->where('parent_id=?',0)->fetchAll($this->table);
    }
    /**
     * get user by id
     */
    public function get($id)
    {
        return $this->where('id=?',$id)->fetch($this->table);
    }

    /**
     * call db dynamicall
     */
    public function __call($method, $arguments)
    {
      return call_user_func_array([$this->app->db,$method],$arguments);
    }

    /**
     * if the given value of the key exists in database
     * @param $value
     * @param string $key
     * @return mixed
     */
    public function exists($value, $key = 'id')
    {
        return (bool) $this->select($key)->where($key.'= ?',$value)->fetch($this->table);
    }


    /**
     * delete recorde by id
     * @param $value
     * @param string $key
     * @return mixed
     */
    public function delete($id)
    {
        return (bool) $this->select($id)->where('id = ?',$id )->delete($this->table);
    }
 
   
}