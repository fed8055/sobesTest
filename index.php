<?php
spl_autoload_register(function ($class) {//автолоадер, всё как у людей
    if(file_exists( 'model/'.$class.'.php'))
        require_once 'model/'.$class.'.php';
    else return false;});

    $a = new dbConnect('localhost','test','root', 'root');
    $a->getDbh()->query();
    $a->dbh->query();