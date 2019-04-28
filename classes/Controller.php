<?php 
class Controller{
    public static function view($page){
        return new Test($page);
    }
}

class Test{

    var $page_url;
    var $data;

    public function __construct($page_url){
        $this->page_url = $page_url;        
    }

    public function render(){
        require_once('./src/views/' . $this->page_url . '.php');
    }

    public function with($array){
        $this->data = json_decode(json_encode($array), FALSE);
        $this->render();
    }
}