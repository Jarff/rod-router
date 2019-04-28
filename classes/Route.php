<?php
class Route{

    public static $validRoutes = [];

    public static function get($route, $function){
        self::$validRoutes[] = $route;
        // echo 'route: '.$route.',';
        // echo 'url: '.$_GET['url'].',';
        // echo 'uri: '.$_SERVER['REQUEST_URI'].'/////';
        if($route == '/' && $_GET['url'] == 'index.php'){
            $function->__invoke(new Request());
            die();
        }

        $array_requested_route = explode('/', $route);
        $array = explode('/', $_SERVER['REQUEST_URI']);
        $temp = [];
        if(preg_match('/{/', end($array_requested_route))){
            $x = explode('{', end($array_requested_route));
            $y = explode('}', $x[1]);
            $temp[] = end($array);
            $array_requested_route[count($array_requested_route)-1] = end($array);
            $route = implode('/', $array_requested_route);
            
            if($_GET['url'] == $route){
                $function->__invoke(new Request($y[0], end($array)));
                die();
            }
        }
        // echo $_GET['url'].'/'.end($array).',';
        if((end($array) == $route)){
            $function->__invoke(new Request());
            die();
        }
    }

    public static function error($int){
        header("HTTP/1.0 404 Not Found");
        echo "<h1>404 Not Found</h1>";
        echo "The page that you have requested could not be found.";
        die();
    }
}

class Request{
    public $attribute = [];
    public function __construct($idx = '', $value = ''){
        $this->attribute[$idx] = $value;
    }
    public function getAttribute($index){
        return $this->attribute[$index];
    }
}