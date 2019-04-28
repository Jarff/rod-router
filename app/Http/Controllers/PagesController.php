<?php

class PagesController extends Controller{
    public function index(){
        return self::view('pages/home')->render();
    }
    public function about(){
        $data = ['name' => 'John Smith'];
        return self::view('pages/about')->with($data);
    }
    public function blog($blog_id = ''){
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
        if($blog_id != '' && $blog_id != 0){
            return self::view('pages/blog-detalle')->with($data[$blog_id - 1]);
        }else{
            return self::view('pages/blog')->with($data);
        }
    }
}