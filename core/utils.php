<?php
    class utils{

        public static function Session($name, $value = null){
            //указана переменная value - записываем значение
            //не указана - возвращаем
            //todo выяснить у Сашки, за каким хуём это всё-таки надо
            if(is_null($value)){
                return $_SESSION[$name];
            }else{
                $_SESSION[$name] = $value;
            }
        }
    }