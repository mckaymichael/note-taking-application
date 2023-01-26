<?php

    class Session {
        public $user_id;

        //create an object in the session class
        public function __construct() {
            //
            //must start a session in php in order to acces the $_SESSION suplerglobal
            session_start();
            //sets the user id to the current user id in the $_SESSION
            $this->user_id = $_SESSION['user_id'] ?? null;
        }
        
        public function login($id) {
            //prevent session hijacking
            session_regenerate_id();
            //set the current objects user id to the id that gets passed in and update the sessions id
            $this->user_id = $id;
            $_SESSION['user_id'] = $this->user_id;
        }

        // Logs user out by returning current user id and $_SESSION superglobal to null
        public function logout() {
            unset($this->user_id);
            unset($_SESSION['user_id']);
            
            return true;
        }

        // checks if the user is logged in or not, if not, then send user to the login page where they can login.
        public function is_logged_in() {
            if(is_null($this->user_id)) {
                redirect('/users/login.php');
            } else {
                return true;
            }
        }
    }

?>