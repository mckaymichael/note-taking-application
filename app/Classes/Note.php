<?php 
//create a class called Note
    class Note {

        //initialize variables
        static protected $db;

        public $id;
        public $name;
        public $body;
        public $course_number;
        public $user_id;

        // create a constructor that builds an array for initalizing objects
        public function __construct($args = []) {
            $this->id = $args['id'] ?? null;
            $this->name = $args['name'] ?? null;
			$this->body = $args['body'] ?? null;
			$this->course_number = $args['course_number'] ?? null;
            $this->user_id =  $args['user_id'] ?? null;
        }
        
        // Static Methods
        // ----------

        //Create a function that takes in the database and assigns it to $db in the Note class
        static public function set_db($db) {
            self::$db = $db;
        }

        // Find a Single Crud (Read)
        // select all the information that is related to their id
        static public function find_by_id($id, $user_id) {
            $sql = "SELECT * FROM crud_table WHERE id='" . $id . "' ";
            $sql .= "AND user_id='" . $user_id . "'";
            //store data from the query into result variable
            $result = self::$db->query($sql);
            //fetch the result as an associative array
            return $result ? $result->fetch_assoc() : false;
        }

        // create a function that returns the results of the current user by their unique id
        static public function find_all($user_id) {
            $sql = "SELECT * FROM crud_table WHERE user_id=?";
            
            $stmt = self::$db->prepare($sql);
            $stmt->bind_param('i', $user_id);
            $stmt->execute();
            
            $result = $stmt->get_result();

            return $result;
        }

        // Create
        //query() essentially speaks in sql, so it's just talking to the database that's been created by moi

        //use query() built in method to create a new note containing all necessary information. id is auto incremented.
        public function create() {
            $sql = "INSERT INTO crud_table (name, body, course_number, user_id)";
            $sql.= " VALUES ('{$this->name}', '{$this->body}', '{$this->course_number}', '{$this->user_id}')";   
            $result = self::$db->query($sql);
            return $result;  
        }

        // Delete
        // use query() built in method to delete the line of information related to the current id of the note
        public function delete() {
            $sql = "DELETE FROM crud_table ";
            $sql.= "WHERE id='" . $this->id . "' ";
            $sql.= "AND user_id='" . $this->user_id . "' ";
            $sql.= "LIMIT 1";
            $result = self::$db->query($sql);
            return $result;
        }

        // Update
        //use query() built in method to update the information associated with the current id using $this keyword.
        public function update() {
            $sql = "UPDATE crud_table SET ";
            $sql.= "name='" . $this->name . "', ";
            $sql.= "body='" . $this->body . "', ";
            $sql.= "course_number='" . $this->course_number . "' ";
            $sql.= "WHERE id='" . $this->id . "' ";
            $sql.= "AND user_id='" . $this->user_id . "' ";
            $sql.= "LIMIT 1";
            $result = self::$db->query($sql);
            
            return $result;
        }

    }