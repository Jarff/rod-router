<?php
class Request{
    public $attribute = [];
    public $opt = [];
    public function __construct($opt = ''){
        if(isset($opt['idx'])){
            $this->attribute[$opt['idx']] = $opt['value'];
        }
        $this->opt = $opt;
    }
    public function getAttribute($index){
        return $this->attribute[$index];
    }
}