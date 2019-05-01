<?php
namespace Panel;

class Tools{
    private static $dir = __DIR__.'/../env.json';
    
    public static function getEnv(){
        if(file_exists(self::$dir)){
            $arr = json_decode(file_get_contents(self::$dir, true));
            return $arr;
        }else{
            return 'Missing env.json in '.self::$dir;
        }
    }
}