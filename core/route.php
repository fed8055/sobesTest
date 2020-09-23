<?php
    class Route
    {
        static function Start()
        {
            $contr_name = 'index';//default
            $action = 'index';

            //site/controller/action

            $route = explode('/', $_SERVER['REQUEST_URI']);

            if (!empty($route[2])) {//передан ли вообще контроллер
                $contr = strtolower($route[2]);
                $contr = explode('?',$contr);//шоб отсечь гет переменные при наличии
                $contr_name = $contr[0];
            }

            if (!empty($route[3])) {//передан ли экшн
                $action = strtolower($route[3]);
            }

            if (file_exists('controller/' . $contr_name . '.php')) {//если такой файл есть, то включаем его
                include_once 'controller/' . $contr_name . '.php';
                $controller = new $contr_name;//и создаём объект
                $action = 'action_' . $action;

                if (method_exists($controller, $action)) {//есть ли в контроллере такой метод, если есть, то вызываем
                    $controller->$action();
                } else {
                    //todo редирект на 404. нормальный, а не тот, что ниже.
                }
            } else {
                include_once 'view/view404.php';
                echo '<br>'.$contr_name;
            }
        }
    }