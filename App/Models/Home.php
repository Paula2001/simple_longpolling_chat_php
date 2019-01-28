<?php

/**
 * Class Model Home
 *
 * Paula George
 *
 * PHP 7
 */
    class Home extends Model {
        static public function newMsg(string $name,string $token ,string $msg,string $date){
            $db = self::DB();

            $query = "INSERT INTO messages(`user_name`,
                      `user_token`,
                      `message`,
                      `time_sent`) VALUES(?,?,?,?)";
            $stmt = $db->prepare($query);
            $stmt->bind_param('ssss',$name,$token,$msg,$date);
            $stmt->execute();
            return $stmt->affected_rows;
        }
        static public function getAllMsgs(){
            $db = self::DB();
            $query = "SELECT * FROM messages";
            $stmt = $db->query($query);
            $results = $stmt->fetch_all(MYSQLI_ASSOC);
            return $results ;
        }


        static public function getLastMsg($lastid){
            $db = self::DB();
            $query = "SELECT * FROM `messages` WHERE id > $lastid ";
            $stmt = $db->query($query);
            $results = $stmt->fetch_all(MYSQLI_ASSOC);
            return ($stmt->num_rows >= 1)? $results : false;
        }

    }