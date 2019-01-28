<?php
include 'App/Models/Home.php' ;

/**
 * Class HomeController
 *
 * PHP 7
 *
 * Paula George
 */

    class HomeController extends Controller{

        /**
         * set token session
         *
         * render index view
         *
         * @return void
         */
        public function index(){
            if(!isset($_SESSION['user_token'])){
                $_SESSION['user_token'] = date("sihdmy");
            }
            view::renderView('index');
        }

        /**
         * render Chat View
         *
         * first if to set name session
         *
         * second if to send msg
         *
         * third if open long polling
         *
         * @return void
         */
        public function chat()
        {

            if(isset($_POST['submit'])){
                if(empty($_POST['name'])){
                    $_SESSION['name'] ="user".$_SESSION['user_token'];
                }else{
                 $_SESSION['name'] =  $_POST['name'] ;
                }
            }

            if (isset($_POST['sendReq'])) {
                if(isset($_POST['message'])) {
                    $this->sendMsg($_POST['message']);
                }
            }

            //get all messages for the first time
            $array_msgs = $this->getAllMsgs();
            $array_size = sizeof($array_msgs);
            $last_id =$array_msgs[$array_size - 1]['id'];



            if(isset($_POST['getReq'])){
                set_time_limit(40);
                clearstatcache();
                session_write_close();
                while(true){
                    $last_msg =Home::getLastMsg($last_id) ;
                    if($last_msg) {
                        $file = fopen('msgs.json','w+');
                        $last_msg = json_encode($last_msg);
                        fwrite($file,$last_msg);
                        fclose($file);
                        return ;
                    }

                    sleep(2);
                }
            }

            view::renderView('msgs' ,['name' => $_SESSION['name'] ,'array_results'=> $array_msgs ]);
        }

        /**
         * @param string $msg
         *
         * send messages and filter them before sending them
         *
         * @return void
         */
        private function sendMsg(string $msg){
            $name = htmlentities($_SESSION['name']);
            $msg = htmlentities($msg);
            preg_match('/\w+/' ,$msg,$matches);
            if($matches[0]) {
                Home::newMsg($name,
                    $_SESSION['user_token'],
                    $msg,
                    date("y-m-d h:i:s"));
            }
        }

        /**
         * get all messages
         *
         * @return array
         */
        private function getAllMsgs(){
            $array_results = Home::getAllMsgs();
            return $array_results  ;
        }
    }