<?php
session_start();
/**
 * Front Controller
 *
 * PHP 7
 *
 * Paula George
 */

include 'Core/Router.php';
include 'Core/Controller.php';
include 'Core/View.php';
include 'Core/Model.php';

/**
 *
 *  autoload classes and if not found kill the script
 *
 */
spl_autoload_register(function($file){
    $file = "App/Controllers/$file.php" ;
    try{
      if(file_exists($file)){
          include $file ;
      }else{
          $msg = "<h1>404 not found</h1>";
          throw new Exception($msg);
      }
    }catch (Exception $e){
        die($e->getMessage());
    }
});
/**
 *
 * The Router
 *
 */
$Router = new Router();
$Router->dispatch() ;







