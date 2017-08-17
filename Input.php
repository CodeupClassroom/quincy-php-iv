<?php

class Input
{

    public static function getNumber($key) 
    {

        $input = self::get($key);
        if (!is_numeric($input)) {
            throw new Exception("Must be a number");   
        } else if (empty($input)) {
            throw new Exception("Cannot be empty");
        }
        return $input;
    }

    public static function getString($key)
    {
        $input = self::get($key);
        if (is_numeric($input) || !is_string($input)) {
            throw new Exception("Must be a string");
        } else if (empty($input)) {
            throw new Exception("Cannot be empty");
        }
        return $input;
    }

    public static function getDate($key) 
    {

        $input = self::get($key);
        if (!is_numeric(strtotime($input))) {
            throw new Exception("Must be a valid date");
        } else {
            $date = new DateTime();
            $date->setTimestamp(strtotime($input));  
            $date->setTimezone(new DateTimeZone('America/Chicago')); 
        }
        return $date;

    }

    /**
     * Check if a given value was passed in the request
     *
     * @param string $key index to look for in request
     * @return boolean whether value exists in $_POST or $_GET
     */
    public static function has($key)
    {
        $result = isset($_REQUEST[$key]) ? true : false;
        return $result;
    }

    /**
     * Get a requested value from either $_POST or $_GET
     *
     * @param string $key index to look for in index
     * @param mixed $default default value to return if key not found
     * @return mixed value passed in request
     */
    public static function get($key, $default = null)
    {
        $result = (self::has($key)) ? $_REQUEST[$key] : $default;
        return $result;
    }

    public static function escape($input)
    {
        return htmlspecialchars(strip_tags($input));
    }

    ///////////////////////////////////////////////////////////////////////////
    //                      DO NOT EDIT ANYTHING BELOW!!                     //
    // The Input class should not ever be instantiated, so we prevent the    //
    // constructor method from being called. We will be covering private     //
    // later in the curriculum.                                              //
    ///////////////////////////////////////////////////////////////////////////
    private function __construct() {}
}
