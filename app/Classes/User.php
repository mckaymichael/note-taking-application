<?php

    class User {

        //Properties
        static protected $db;
        
        public $id;
        public $name;
        public $email;
        public $password;

        //Methods
        //gives the ability to connect to our database
        static public function set_db($db) {
            self::$db = $db;
        }
        
        //needed for the login feature of the app
        //finds email associated to the user id
        static public function find_user_by_email($email) {
            $sql = "SELECT * FROM users ";
            $sql .= "WHERE email='" . $email . "'";
            $result = self::$db->query($sql);
            
            return $result;
        }

        //constructor to set the properties created from the user
        public function __construct($args = []) {
            $this->id = $args['id'] ?? null;
            $this->name = $args['name'] ?? null;
            $this->email = $args['email'] ?? null;
            $this->password = $args['password'] ?? null;
        }
        
        // runs the sql on the database and creates a user
        public function create() {
            $sql = "INSERT INTO users (name, email, password)";
            $sql .= " VALUES (?, ?, ?)";
            
            // hashes passowrd to project it from being hacked
            $hashed_password = password_hash($this->password, PASSWORD_DEFAULT);

            // Prepared statements are very useful against SQL injections. This is a security feature
            $stmt = self::$db->prepare($sql);
            $stmt->bind_param('sss', $this->name, $this->email, $hashed_password);
            $stmt->execute();
            
            $result = $stmt->insert_id;

            return $result;
        }

        //returns the result of our password varify which compares the password inserted in the form with the protected password in the database and returns true if it is
        public function validate_password($form_password) {
            return password_verify($form_password, $this->password);
        }
    
    }








?>