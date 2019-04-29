<?php
namespace App;

use Panel\Model;

class Blog extends Model{
    protected $table = 'blog';
    public $primary_key = 'blog_id';
}