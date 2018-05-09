<?php
namespace System\Http;
class Request
{
    /**
     * URl
     * @var
     */
    private $url;
    /**
     * baseUrl
     * @var
     */
    private $baseUrl;
    private $files=[];

    /**
     * prepare URl
     */
    public function PrepareUrl()
    {
        $script = dirname($this->serves('SCRIPT_NAME'));
        $requestUri = $this->serves('REQUEST_URI');
        if(strpos($requestUri,'?')!==false) {
            list($requestUri, $queryString)=explode('?',$requestUri);
        }

          $this->url  = rtrim(preg_replace('#^'.$script.'#','',$requestUri),'/');

        if(!$this->url){
            $this->url = '/';
        }
        $this->baseUrl = $this->serves('REQUEST_SCHEME').'://'.$this->serves('HTTP_HOST').$script.'/';
    }

    /**
     * get relative url 
     * @return mixed
     */
     public function url()
    {
        return $this->url;
    }

    /**
     *
     * @param $key
     * @param null $default
     * @return null
     */
    public function serves($key, $default=null)
    {
        return array_get($_SERVER,$key, $default);
    }

    /**
     * get value from get
     * @param $key
     * @param null $default
     * @return null
     */
    public function get($key, $default= null)
    {
        return array_get($_GET,$key, $default);

    }

    /**
     * get valur from post
     * @param $key
     * @param null $default
     * @return null
     */
    public function post($key, $default = null)
    {
        return array_get($_POST,$key, $default);

    }

    /**
     * @return mixed
     */
    public function method()
    {
        return $this->serves('REQUEST_METHOD');
    }

    /**
     * get full url of the script
     * baseUrl // http:://domain/script
     * @return mixed
     */

    public function baseUrl()
    {
        return $this->baseUrl;
    }

    /**
     * get the uploded file object for the given input
     * @param $input
     * @return mixed
     */
    public function file($input)
    {
        if(isset($this->files[$input])){
            return $this->files[$input];
        }
         $uploadedFile = new UploadedFile($input);
         $this->files[$input]= $uploadedFile;
         return $this->files[$input];
    }
}

