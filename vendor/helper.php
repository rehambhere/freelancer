<?php
use System\Application;

if(! function_exists('pre'))
{
    /**
     *
     */
    function pre($var)
    {
        echo "<pre>";
        print_r($var);
        echo "<pre>";
    }
}

if(! function_exists('pred'))
{
    /**
     * anen variables in borwser  and die
     */
    function pred($var)
    {
        pre($var);
        die;
    }
}

if(! function_exists('array_get'))
{
    /**
     * get the value from the given array for the given key
     * other get the default value
     * @param $array
     * @param $key
     * @param null $default
     * @return null
     */
    function array_get($array, $key , $default = null)
    {
        return isset($array[$key])?$array[$key]:$default;
    }
}

if(! function_exists('_e'))
{
    function _e($value)
    {
       return  htmlspecialchars($value);
    }
    
}

if(! function_exists('assets')){
    //full path for the given path in public directory//
    function assets($path)
    {
        $app =Application::getInstance();
        return $app->url->link('public/'.$path);
    }
}

if(! function_exists('url')) {
    /**
     * generate full path for the given path
     * @param $path
     * @return mixed
     */
    function url($path)
    {
        $app =Application::getInstance();
        return $app->url->link($path);

    }

    if(! function_exists('read_more')) {
        /**
         * cut the given string and get the given number of words from it
         * 200 words
         * get the first 20 words
         * @pram string $string
         * @pram int $number_of_words
         * @return  string
         */
        function read_more($string, $number_of_words)
        {
            // remove any empty values in the exploded array
            $words_of_string = array_filter(explode(' ', $string));
            // if the total words of the given string is less than or equal to
            // the given number of words parametr
            // then we will just return the whole string
            // $number =20
            // number of words is bigger than the given string words
            if(count($words_of_string)<= $number_of_words) {
                return $string;
            }
            $cut_string_words = implode(' ',array_slice($words_of_string, 0 , $number_of_words));
            return $cut_string_words;
        }
    }
}
    
