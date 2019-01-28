<?php

/**
 * Class Router
 *
 * PHP 7
 *
 * Paula George
 */
    class Router{
        public $path  ;

        /**
         * Router constructor.
         *
         * set the path by using query_string
         */
        public function __construct(){
            $this->path = (isset($_SERVER['QUERY_STRING'])) ? $_SERVER['QUERY_STRING'] : false;
        }

        /**
         * reach the destination by dispatching
         * the controller and the method
         *
         *@return void
         */
        public function dispatch(){

            $cont_method_array = $this->bindControllerMethod($this->path);
            $Controller = $cont_method_array['controller'];
            $Controller = new $Controller;
            $method = $cont_method_array['method'];
            $Controller->$method();

        }

        /**
         * @param string $url
         *
         * get controller from the url
         *
         * @return bool|string
         */
        private function getController(string $url){
            preg_match('/\w+/',$url,$matches);
            $controller = (isset($matches[0]))? ucfirst($matches[0]) : false ;
            $controller = $controller."Controller";
            return ($matches) ? $controller : false ;
        }

        /**
         * @param string $controller
         * @param string $url
         * @param $hard_method
         *
         * get the method or get the hard coded method (index)
         *
         * @return string
         */
        private function getMethod(string $controller,string $url,$hard_method){

            $controller = str_replace('Controller','',$controller);
            $url = ucfirst($url);
            $method = str_replace("$controller",'',$url);
            $method = str_replace("/",'',$method);
            return ($method)? $method : $hard_method ;
        }

        /**
         * @param string $url
         *
         * run the get controller and get method and shove the results
         *
         * into an assoc. array
         *
         * @return array
         */
        private function bindControllerMethod(string $url){
            $controller = $this->getController($url);
            if(!$controller){$controller = 'HomeController' ;}

            $method = $this->getMethod($controller, $url,'index');

            return ['controller' => $controller , 'method' => $method];
        }
    }