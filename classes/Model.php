<?php
namespace Panel;
class Model{
    public static function find($id){
        $query = "SELECT * FROM {$this->table} WHERE {$this->primary_key} = '{$id}'";
        Connection::ejecutar_sentencia($query);
        $obj = Connection::fetchObject();
        return $obj;
    }

    public static function save(){

    }

    public static function all(){
        $data = [
            [
                'blog_id' => 1,
                'title' => 'Lorem ipsum',
                'body' => 'Lorem ipsum dolor sit amet'
            ],
            [
                'blog_id' => 2,
                'title' => 'Lorem ipsum',
                'body' => 'Lorem ipsum dolor sit amet'
            ],
            [
                'blog_id' => 3,
                'title' => 'Lorem ipsum',
                'body' => 'Lorem ipsum dolor sit amet'
            ]
        ];
        return $data;
    }
}