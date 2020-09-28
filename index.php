<?php session_start();
    spl_autoload_register(function ($class) {//автолоадер, всё как у людей
        if(file_exists($class.'.php'))
            require_once $class.'.php';
        elseif(file_exists( 'model/'.$class.'.php'))
            require_once 'model/'.$class.'.php';
        elseif(file_exists( 'view/'.$class.'.php'))
            require_once 'view/'.$class.'.php';
        elseif(file_exists( 'controller/'.$class.'.php'))
            require_once 'controller/'.$class.'.php';
        elseif(file_exists( 'core/'.$class.'.php'))
            require_once 'core/'.$class.'.php';
    else return false;});

    $user = new user();
    Route::Start();