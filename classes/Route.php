<?php
use \Panel\Tools as Tools;
class Route{

    private static $development = true;
    public static $validRoutes = [];

    public static function get($route, $function){
        if($_SERVER['REQUEST_METHOD'] != 'GET'){
            // header("HTTP/1.0 405 Method not allowed");
            // echo "<h1>405 Method not allowed</h1>";
            // echo "Expecting GET method.";
            // die();
            //Debería regresar un response
        }else{
            if(self::$development){
                $url = explode('/', $_SERVER['REQUEST_URI']);
                unset($url[1]);
                $url = implode('/', $url);                
            }else{
                $url = $_SERVER['REQUEST_URI'];
            }
            // echo $_SERVER['REQUEST_METHOD'];
            self::includeAssets($url);
           
            self::$validRoutes[] = $route;
            // echo 'route: '.$route.',';
            // echo 'url: '.$_GET['url'].',';
            //  echo 'url: '.$url;
            if($route == '/' && $url == 'index.php'){
                $function->__invoke(new Request());
                die();
            }
    
            $array_requested_route = explode('/', $route);
            $array = explode('/', $_SERVER['REQUEST_URI']);
    
            if(preg_match('/{/', end($array_requested_route))){
                $req_url = self::getDynamicAttr($array_requested_route, $array, $url, $route);
                if($req_url['success']){
                    $function->__invoke(new Request($req_url));
                    die();
                }
            }
            // echo $_GET['url'].'/'.end($array).',';
            if($url == $route){
                $function->__invoke(new Request(['url' => $url]));
                die();
            }
        }
    }

    public static function post($route, $function){
        if(self::$development){
            $url = explode('/', $_SERVER['REQUEST_URI']);
            unset($url[1]);
            $url = implode('/', $url);                
        }else{
            $url = $_SERVER['REQUEST_URI'];
        }
        // echo $_SERVER['REQUEST_METHOD'];
        self::includeAssets($url);
       
        self::$validRoutes[] = $route;
        // echo 'route: '.$route.',';
        // echo 'url: '.$_GET['url'].',';
        //  echo 'url: '.$url;
        if($route == '/' && $url == 'index.php'){
            $function->__invoke(new Request());
            die();
        }

        $array_requested_route = explode('/', $route);
        $array = explode('/', $_SERVER['REQUEST_URI']);

        if(preg_match('/{/', end($array_requested_route))){
            $req_url = self::getDynamicAttr($array_requested_route, $array, $url, $route);
            if($req_url['success']){
                $function->__invoke(new Request($req_url));
                die();
            }
        }
        // echo $_GET['url'].'/'.end($array).',';
        if($url == $route){
            $function->__invoke(new Request(['url' => $url]));
            die();
        }
        print_r($_POST);
    }

    private static function includeAssets($url){
        $env = Tools::getEnv();
        $new_arr = explode('/', $env->assets_dir);
        $string_match = '/';
        foreach($new_arr as $el){
            $string_match .= '('.$el.')\/';
        }
        $string_match .= '/';
        if(preg_match($string_match, $_SERVER['REQUEST_URI'], $output)){
            if(file_exists('./' . $url)){
                include_once('./' . $url);
                die();
            }else{
                if(preg_match('/(?)/', $_SERVER['REQUEST_URI'], $output)){
                    $_str = explode('?', $url);

                    if(file_exists('.' . $_str[0])){
                        include_once('.' . $_str[0]);
                        die();
                    }
                }else{
                    self::error(404);
                }
            }
        }
    }

    public static function getDynamicAttr($array_requested_route, $array, $url, $route){
        $x = explode('{', end($array_requested_route));
        $y = explode('}', $x[1]);
        $array_requested_route[count($array_requested_route)-1] = end($array);
        $route = implode('/', $array_requested_route);
        if($url == $route){
            $arr = ['success' => true, 'url' => $url, 'idx' => $y[0], 'value' => end($array)];
            return $arr;
        }else{
            $arr = ['success' => false];
            return $arr;
        }
    }

    public static function error($int){
        header("HTTP/1.0 404 Not Found");
        echo "<h1>404 Not Found</h1>";
        echo "The page that you have requested could not be found.";
        die();
    }
}