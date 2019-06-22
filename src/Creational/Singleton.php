<?php


/**
 * This class implements the singleton pattern, let's think about a Logger class that we need to use it whenever we want, for example, to control the concurrency
 * Singleton Pattern offer us the way to retrieve a unique instance of the class
 *
 * Class Logger
 * @author Jonathan Díaz <jgdiazcherrez@gmail.com>
 */
class Logger {

    static $i;


    /**
     * We don't want to implement a constructor
     * Logger constructor.
     */
    protected function __construct()
    {
    }

    public static function getInstance(){
        if(!self::$i){
            self::$i = new Logger();
        }
        return self::$i;
    }

    public function log($message){

    }

    public function warning($message){

    }

    public function error($message){

    }
}