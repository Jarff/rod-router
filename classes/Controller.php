<?php 
class Controller{

    protected static $request;

    public static function setRequest($request){
        self::$request = $request;
    }


    public static function view($page){
        return new Test($page, self::$request);
    }
}

class Test{

    var $page_url;
    var $data;

    public function __construct($page_url, $request = ''){
        $this->page_url = $page_url;        
        $this->request = json_decode(json_encode($request), FALSE);
    }

    public function render(){
        require_once('./src/views/' . $this->page_url . '.php');
    }

    public function with($array){
        $this->data = json_decode(json_encode($array), FALSE);
        $this->render();
    }
}