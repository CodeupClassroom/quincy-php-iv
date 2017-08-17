<?php

class Father
{
    protected static $name = 'Darth Vader';

    public static function getName() 
    {
        return self::$name;
    }
}