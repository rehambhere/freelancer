<?php
namespace System\Http;
use System\Application;
class Response
{
    private $app;
    private $headers=[];
    private $content='';
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * set the response output content
     * @param $content
     */
    public function setOutput($content)
    {
        $this->content=$content;
    }

    /**
     * send response headers and content
     */
    public function send()
    {
        $this->sendHeaders();
        $this->sendOutput();

    }
    /**
     * send response headers
     */
    private function sendHeaders()
    {
        foreach ($this->headers as $header=>$value)
        {
            header($header.':'.$value);
        }
    }
    public function setHeader($header, $value)
    {
        $this->headers[$header]= $value;
    }
    /**
     * send response output
     */
    private function sendOutput()
    {
        echo  $this->content;
    }
}