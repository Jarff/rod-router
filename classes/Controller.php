<?php 
class Controller{

    protected static $request;

    public static function setRequest($request){
        self::$request = $request;
    }


    public static function view($page){
        return new \Panel\View($page, self::$request);
    }
}