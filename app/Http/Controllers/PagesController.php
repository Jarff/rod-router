<?php
use App\Blog as Blog;

class PagesController extends Controller{
    public function index(){
        return self::view('pages/home')->render();
    }
    public function about(){
        return self::view('pages/about')->render();
    }
    public function blog($blog_id = ''){
        if($blog_id != ''){
            if($blog_id != 0){
                $data = Blog::all();
                return self::view('pages/blog-detalle')->with($data[$blog_id - 1]);
            }else{
                header("HTTP/1.0 404 Not Found");
                echo "<h1>404 Not Found</h1>";
                echo "The page that you have requested could not be found.";
            }
        }else{
            $blog = new Blog();
            $data = $blog->all();
            return self::view('pages/blog')->with($data);
        }
    }
    public function pricing(){
        return self::view('pages/pricing')->render();
    }
    public function contact(){
        return self::view('pages/contact')->render();
    }
}