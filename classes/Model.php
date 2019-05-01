<?php
namespace Panel;

use \Panel\Connect as Connection;

class Model{
    public $_table;

    public function __construct(){

    }

    public static function find($id){
        $query = "SELECT * FROM {$this->table} WHERE {$this->primary_key} = '{$id}'";
        Connection::ejecutar_sentencia($query);
        $obj = Connection::fetchObject();
        return $obj;
    }

    public static function save(){

    }

    public function all(){
        $sql = "SELECT * FROM {$this->_table} WHERE 1 = 1";
        Connection::ejecutar_sentencia($sql);
        $data = [];
        while($_row = Connection::fetchAssoc()){
            array_push($data, $_row);
        }
        return $data;
    }
}