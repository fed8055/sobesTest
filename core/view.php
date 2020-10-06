<?php
    class view{
        public static function Render($templatePath, $data = null){
            if(!is_null($data)) {
                foreach ($data as $key => $val) {
                    $$key = $val;
                }
            }

            include_once $templatePath;
        }
    }