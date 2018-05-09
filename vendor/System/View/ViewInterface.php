<?php
namespace System\View;

interface ViewInterface
{
/**
 * get the view output
 */
    public function getOutput();
    /**
     * convert view object to string in printing
     */
    public function __toString(); 

}