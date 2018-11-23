<?php
    class MainController {
        public function login() {
            $username = filter_input(INPUT_POST, "username") ? filter_input(INPUT_POST, "username") : "%";
            $password = filter_input(INPUT_POST, "password") ? filter_input(INPUT_POST, "password") : "%";
            $user = Main::login(); //the variables reqiured to log into the system
            if(!$user) {
                require_once('view\main.php'); //call for reload of login page
            } else {
                if($user->role == "taxiowner") {
                    require_once('');
                } else if ($user->role == "admin"){
                    
                }
            } 
        }
    }
?>