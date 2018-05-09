<?php
namespace System\View;
use System\File;
class View implements ViewInterface
{
    private $output;
    private $viewPath;
    private $file;
    private $data=[];

    /**
     * View constructor.
     * @param File $file
     * @param $viewPath
     * @param array $data
     */
    public function __construct(File $file, $viewPath, array $data)
    {
        $this->file = $file;
        $this->preparePath($viewPath);
        $this->data = $data;
    }

    /**
     * prepare path
     * @param $viewPath
     */
    private  function preparePath($viewPath)
    {
        $relativeViewPath = 'App/Views/'.$viewPath.'.php';
        $this->viewPath = $this->file->to($relativeViewPath);
         if(! $this->viewFileExists($relativeViewPath))
         {
        die($viewPath.'dosnt exist view');
        }
    }

    /**
     * check if file exists in folder views
     * @param $viewPath
     * @return bool
     */
    private function viewFileExists($viewPath)
    {
        return $this->file->exists($viewPath);
    }

    /**
     * {@inheritdoc}=>interface
     * @return mixed
     */
    public function getOutput()
    {
        if(is_null($this->output))
        {
            ob_start();
            extract($this->data);
            require $this->viewPath;
            $this->output = ob_get_clean();
        }
        return $this->output;
    }
    /**
     * {@inheritdoc}
     * @return mixed
     */
    public function __toString()
    {
        return $this->getOutput();
    }
}