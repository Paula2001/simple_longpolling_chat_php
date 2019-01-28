<?php

/**
 * Class Controller
 *
 * PHP 7
 *
 * Paula George
 */
    class Controller{
        /**
         * @param $name
         * @param $arguments
         *
         * this function will get called if method not found
         *
         * @return void
         */
        public function __call($name, $arguments)
        {
            echo "the method is not found ." ;
        }
    }