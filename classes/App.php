<?php
namespace Panel;

class App{
    //Incluye los ruteos que se encuentran dentro de la carpeta routes
    public static function run(){
        if(file_exists(__DIR__.'/../routes')){
            $items = scandir(__DIR__.'/../routes');
            for($i = 2; $i < ( count($items) ); $i++){
                require_once('./routes/'.$items[$i]);
            }
        }
    }
}