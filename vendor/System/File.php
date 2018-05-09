<?php
namespace System;
class File
{
    /**
     * DIRECTORY SEPARETOR
     */
    const DS = DIRECTORY_SEPARATOR;
    /**
     * Root Path
     * @var string
     */
    private $root;

    /**
     * File constructor.
     * @param $root
     */
    public function __construct($root)
    {
        $this->root = $root;
    }

    /**
     * @param $file
     * @return bool
     */
    public function exists($file)
    {
      return file_exists($this->to($file));
    }

    /**
     * require the given file
     * @param $file
     * @return mixed
     */
    public function call($file)
    {
       return require $this->to($file);
    }

    /**
     * Generate full path to the given path in vendor volder
     * @param $path
     * @return mixed
     */
    public function toVendor($path)
    {
        return $this->to('vendor/'.$path);
    }

    /**
     * Generate full path to the given path public folder
     * @param $path
     * @return mixed
     */
    public function toPublic($path)
    {
        return $this->to('public/'.$path);
    }
    /**
     * Generate full path to the given path in genrall volder
     * @param $path
     * @return string
     */
    public function to($path)
    {
        return $this->root .static::DS .str_replace(['/','\\'],static::DS,$path);
    }
}