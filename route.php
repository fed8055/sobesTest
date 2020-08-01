<?php
    class Route{
        static function Start(){
            $contr_name = 'index';//default
            $action = 'index';

            //site/controller/action
            $route = explode('/', $_SERVER['request_url']);

            if(!empty($route[1])) {//передан ли вообще контроллер
                $contr_name = strtolower($route[1]);
            }

            if(!empty($route[2])) {//передан ли экшн
                $action = strtolower($route[2]);
            }

            if (file_exists('controller/'.$contr_name.'.php')) {//если такой файл есть, то включаем его
                include_once 'controller/'.$contr_name.'.php';
                $controller = new $contr_name;//и создаём объект
                $action = 'action_'.$action;

                if(method_exists($controller, $action)){//есть ли в контроллере такой метод, если есть, то вызываем
                    $controller -> $action();
                } else {
                    //todo сделать редирект на 404
                }
            } else {
                //todo сделать редирект на 404
            }
        }
    }