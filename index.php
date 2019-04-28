<?php
spl_autoload_register(function ($clase) {
    if(file_exists('./classes/' . $clase . '.php'))
        include './classes/' . $clase . '.php';
});
require_once('./app/Http/Controllers/PagesController.php');
require_once('./routes/web.php');
