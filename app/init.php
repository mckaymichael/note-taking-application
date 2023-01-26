<?php 
    
    define('WWW_ROOT', 'http://localhost');
    define('PROJECT_ROOT', dirname(__DIR__, 1));

    ini_set('display_errors', 1);
    error_reporting(~0);

    // Include functions
    require('functions.php');

    // Include Classes
    require(get_path('/app/Classes/Note.php'));
    require(get_path('/app/Classes/User.php'));
    require(get_path('/app/Classes/Session.php'));

    //start the session
    $session = new Session();

    // Connect to the database
    // ----------
    $db = db_connect();

    //Connect to the Note class
    Note::set_db($db);
    User::set_db($db);
