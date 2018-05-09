<?php
namespace System;

use PDO;
use PDOException;

class Database
{
    private $table;
    private  $data = [];
    private $bindings= [];
    private $lastId ;
    private $wheres = [];
    private $having = [];
    private  $groupBy = [];
    private $limit ;
    private $joins=[];
    private $orderBy=[];
    private $selects= [];
    private $offset;
    private $rows=0;
    private $reset;
    /**
     * static connection i cant make new object  fixed
     * @var
     */
    private static $connection;
    /**
     * @var Application
     */
    private $app;

    /**
     * Database constructor.
     * @param Application $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
        if(! $this->isConnected()) {
            $this->connect();
        }
    }

    /**
     * return connected value 
     * @return bool
     */
    private function isConnected()
    {
        return static::$connection InstanceOF PDO;
    }

    /**
     * if not connect you should connect database 
     */
    private function connect()
    {
        $connectionData= $this->app->file->call('config.php');
        extract($connectionData);
        try{
            static::$connection = new PDO('mysql:host='.$server.';dbname='.$dbname,$dbuser,$dbpass);
           static::$connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,  PDO::FETCH_OBJ);

            static::$connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            static::$connection->exec('SET NAMES utf8');
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    /**
     * get database connection object
     * @return mixed
     */
    public function Connection()
    {
        return static::$connection;
    }

    /**
     * set the table name
     * @param $table
     */
    public function table($table)
    {
        $this->table = $table;
        return $this;
    }

    /**
     * set the table use from when select user or delet
     */
    public function from($table)
    {
        return $this->table($table);
    }
    /**
     * set the data well be stored in database use insert or select
     * @param $key
     * @param null $value
     * @return $this
     */
    public  function data($key, $value = null)
    {
        if(is_array($key)){
            $this->data = array_merge($this->data, $key);
            $this->addToBindings($key);
        } else {
            $this->data[$key] = $value;
            $this->addToBindings($value);
        }
        return $this;
    }

    /**
     * add to bindings
     * @param $value
     */
    private function addToBindings($value)
    {
        if(is_array($value)){
            $this->bindings = array_merge($this->bindings, array_values($value));

        } else {
            $this->bindings[]= $value;
        }

    }

    /**
     * set where
     * @return $this
     */
    public function where()
    {
        $bindings = func_get_args();

        $sql = array_shift($bindings);

        $this->addToBindings($bindings);

        $this->wheres[] = $sql;

        return $this;
    }

    /**
     * add new having clause
     */
    public function having()
    {
        $bindings = func_get_args();

        $sql = array_shift($bindings);

        $this->addToBindings($bindings);

        $this->having[] = $sql;

        return $this;

    }
    /**
     * add new group groupBy clause
     */
    public function groupBy ($arguments)
    {
     $this->groupBy = $arguments;

        return $this;

    }



    /**
     * insert data base
     * @param null $table
     * @return $this|void
     */
    public function insert($table=null)
    {
        if($table){

          $this->table($table);
        }
        $sql = ' INSERT INTO '.$this->table.' SET ' ;

        $sql .= $this->setFields();

        $this->query($sql, $this->bindings);

        $this->lastId = $this->Connection()->lastInsertId();

        $this->reset();

        return $this;
    }

    public function update($table = null)
    {
        if($table){
            $this->table($table);
        }
        $sql = 'UPDATE '.$this->table.' SET ';

        $sql .= $this->setFields();

        $sql = rtrim($sql, ' , ');
       if($this->wheres){
           $sql .= ' WHERE '.implode('', $this->wheres);
       }
        $this->query($sql, $this->bindings);
        $this->reset();
        return $this;
    }
    /**
     * execute the given sql statement
     * @return mixed
     */
    public function query()
    {
        $bindings = func_get_args();
        $sql = array_shift($bindings);
        if(count($bindings)==1 AND is_array($bindings[0])){

            $bindings = $bindings[0];
        }
        try{
            $query = $this->Connection()->prepare($sql);
            foreach ($bindings as $key=>$value){
                $query->bindValue ($key + 1,_e($value));
            }
            $query->execute();
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }

    }
    
    public function lastId()
    {
        return $this->lastId;
    }

    /**
     * set fileds for insert and update
     * return string
     */
    public function setFields() {
        $sql ='';
        foreach (array_keys($this->data)AS $key){
            $sql .= '`'.$key.'`= ? , ';

         }
         $sql = rtrim($sql, ' , ');
         return $sql;
          }

    /**
     * @param $select
     * @return $this
     */
    public function select($selects)
    {
        $selects = func_get_args();
        $this->selects =  array_merge($this->selects,$selects);
        return $this;
    }

    /**
     * @param $limit
     * @param $offset
     * @return $this
     */
    public function limit($limit, $offset)
    {
        $this->limit = $limit;
        $this->offset = $offset;
        return $this;
    }

    /**
     * @param $join
     * @return $this
     */
    public function join($join)
    {
        $this->joins[]=$join;
        return $this;
    }

    /**
     * @param $orderBy
     * @param string $sort
     * @return $this
     */
    public function orderBy($orderBy, $sort='ASC')
    {
        $this->orderBy = [$orderBy, $sort];
        return $this;
    }

    /**
     * @param null $table
     * @return mixed
     */
    public function fetch($table=null)
    {
        if($table){
            $this->table($table);
        }
        $sql = $this->fetchStatment();
        $results = $this->query($sql, $this->bindings)->fetch();
        $this->reset();
        return $results;
        
    }

    /**
     * @param null $table
     * @return mixed
     */
    public function fetchAll($table=null)
    {
        if($table){
            $this->table($table);
        }
        $sql = $this->fetchStatment();
        $query = $this->query($sql, $this->bindings);
        $results = $query->fetchAll();
        $this->rows = $query->rowCount();
        $this->reset();
        return $results;
    }

    /**
     * @param null $table
     * @return $this
     */
    public function Delete($table=null)
    {
        if($table){
            $this->table($table);
        }
        $sql = ' DELETE FROM '.$this->table .' ';
        if($this->wheres){
            $sql .= ' WHERE '.implode(' ',$this->wheres); 
        }
        $this->query($sql, $this->bindings);
        $this->reset();
        return $this;
    }

    /**
     * @return string
     */
    private function fetchStatment()
    {
        $sql = 'SELECT ';
        if($this->selects){
            $sql .= implode(',',$this->selects);
        } else {
            $sql .= '*';
        }
        $sql .=' FROM '. $this->table.' ';
        if($this->joins){
            $sql .= implode(' ',$this->joins);
        }
        if($this->wheres){
            $sql .= ' WHERE '.implode(' ',$this->wheres);
        }
        if($this->limit){
            $sql .= ' LIMIT '.$this->limit;
        }
        if($this->offset){
            $sql .= ' OFFSET '.$this->offset;
        }
        if($this->having){
            $sql .= ' HAVING '. implode('',$this->having). ' ';
        }
        if($this->groupBy){
            $sql .= ' GROUP BY '. implode('',$this->groupBy). ' ';
        }
        if($this->orderBy){
            $sql .= ' ORDER BY '.implode(' ',$this->orderBy);
        }
        return $sql;
        
    }



    /**
     * row count
     * @return int
     */
    public function rows()
    {
        return $this->rows;
    }
    private function reset()
    {
        $this->data=[];
        $this->bindings=[];
        $this->wheres=[];
        $this->joins=[];
        $this->limit=null;
        $this->orderBy=[];
        $this->selects=[];
        $this->having = [];
        $this->groupBy = [];
        $this->table=null;
        $this->offset=null;
    }

}