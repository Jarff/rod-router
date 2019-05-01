<?php
namespace Panel;

use \Panel\Tools as Tools;

class Connect
{   
    protected static $affected_rows;
    public static $temporal;
    private static $conexion;
	public function __construct(){                    

	}

    private function conectar(){        
        $_env = Tools::getEnv();
        self::$host = $_env->db_host;
        self::$user = $_env->db_user;
        self::$password = $_env->db_password;
        self::$bd = $_env->db_name;
        self::$conexion = mysqli_connect(self::$host, self::$user, self::$password);
        mysqli_select_db(self::$conexion, self::$bd);
    }

    function desconectar(){
        mysqli_close(self::$conexion);
    }    
    

    static function ejecutar_sentencia($consulta){
        self::conectar();
        $resultados = mysqli_query(self::$conexion, $consulta);        
        if(!$resultados){
                echo '<blockquote style="background-color: #f2dede; padding: 15px;"><strong>Mysqli Error</strong>: <em>'. mysqli_error(self::$conexion) .'</em><hr><code>'. $consulta .'</code></blockquote>';
                //return 'error';
                exit;
            }
        if(preg_match('/insert/i', $consulta)){
            $resultados = mysqli_insert_id(self::$conexion);
            self::$affected_rows = mysqli_affected_rows(self::$conexion);
            return $resultados;
            self::desconectar();
        }else{
            self::$temporal = $resultados;
            self::$affected_rows = mysqli_affected_rows(self::$conexion);
            self::desconectar();
        }
    }

    static function fetchRow(){
        $_response = mysqli_fetch_array(self::$temporal);
        return $_response;
    }

    static function fetchObject(){
        $_response = mysqli_fetch_object(self::$temporal);
        return $_response;
    }

    static function fetchAssoc(){
        $_response = mysqli_fetch_assoc(self::$temporal);
        return $_response;
    }

    static function numRows(){
        $_response = mysqli_num_rows(self::$temporal);
        return $_response;
    }

    // function fetchInfo(){
    //     $_response = $this->temporal->info;
    //     return $_response;
    // }

    static function affectedRows(){
        $_response = self::$affected_rows;
        return $_response;
    }

}
?>