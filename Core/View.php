<?php

/**
 * Class View
 *
 * PHP 7
 *
 * Paula George
 */
    class View{
        /**
         * @param $file
         * @param array $args
         *
         * redirect to the view
         *
         *@return void
         */
        public static function renderView($file ,$args = []){
            $file = "App/Views/$file.php";
            extract($args, EXTR_SKIP);
            include $file ;
        }
    }