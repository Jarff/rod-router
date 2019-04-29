<?php 
//Agregamos las clases generales
spl_autoload_register(function($nombre_clase){    
    $parts = explode('\\', $nombre_clase);      
    if(count($parts) > 1){        
        if(file_exists(__DIR__ . '/app/Models/' . end($parts) . '.php')){
            include __DIR__ . '/app/Models/' . end($parts) . '.php';
        }else{
            include __DIR__ . '/classes/' . end($parts) . '.php';
        }
    }else{        
        file_exists(__DIR__ . '/classes/' . $nombre_clase . '.php') ? include __DIR__ . '/classes/' . $nombre_clase . '.php' : '';    
        // include __DIR__ . '/clases/' . $nombre_clase . '.php';
    }    
}); 
//Agregamos los controllers
spl_autoload_register(function ($clase) {
    if(file_exists('./app/Http/Controllers/' . $clase . '.php'))
        include './app/Http/Controllers/' . $clase . '.php';
});
//Agregamos los modelos
spl_autoload_register(function ($clase) {
    if(file_exists('./app/Models/' . $clase . '.php'))
        include './app/Models/' . $clase . '.php';
});