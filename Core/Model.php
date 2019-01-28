<?php
include 'Config.php';

/**
 * Class Model
 *
 * PHP 7
 *
 * Paula George
 */
    class Model{
        /**
         * connect to the DataBase
         *
         * @return mysqli
         */
         protected static function DB(){
            try{
                $db = new mysqli(Config::DB_HOST,
                    Config::DB_USER,
                    Config::DB_PASSWORD,
                    Config::DB_NAME);

                if($db->errno){
                    throw new Exception("This is a server error . ");
                }

                return $db ;

            }catch (Exception $e){
                die($e->getMessage());
            }

        }
    }