<?php
    spl_autoload_register(function ($class) {//автолоадер, всё как у людей
        if(file_exists($class.'.php'))
            require_once $class.'.php';
        elseif(file_exists( 'model/'.$class.'.php'))
            require_once 'model/'.$class.'.php';
        elseif(file_exists( 'view/'.$class.'.php'))
            require_once 'view/'.$class.'.php';
        elseif(file_exists( 'controller/'.$class.'.php'))
            require_once 'controller/'.$class.'.php';
    else return false;});

    Route::Start();

    //$a = new dbConnect('localhost','test','root', 'root');
    //$a->getDbh()->query();
    //$a->dbh->query();