<?php
namespace App;

use Panel\Model;

class Blog extends Model{

    public function __construct(){
        parent::__construct();
        $this->_table = 'wp_posts';
    }
    public $primary_key = 'ID';
}