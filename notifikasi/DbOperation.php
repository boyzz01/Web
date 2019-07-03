<?php

class DbOperation
{
    //Database connection link
    private $con;

    //Class constructor
    function __construct()
    {
        //Getting the DbConnect.php file
        require_once dirname(__FILE__) . '/DbConnect.php';

        //Creating a DbConnect object to connect to the database
        $db = new DbConnect();

        //Initializing our connection link of this class
        //by calling the method connect of DbConnect class
        $this->con = $db->connect();
    }

    //storing token in database 
   

    //the method will check if email already exist 
   

    //getting all tokens to send push to all devices
    // public function getAllTokens(){
        // $stmt = $this->con->prepare("SELECT token FROM devices");
        // $stmt->execute(); 
        // $result = $stmt->get_result();
        // $tokens = array(); 
        // while($token = $result->fetch_assoc()){
            // array_push($tokens, $token['token']);
        // }
        // return $tokens; 
    // }

    //getting a specified token to send push to selected device
    public function getTokenById($id){
        $stmt = $this->con->prepare("SELECT device_token FROM users WHERE id = ?");
        $stmt->bind_param("s",$id);
        $stmt->execute(); 
        $result = $stmt->get_result()->fetch_assoc();
        return array($result['device_token']);        
    }

    //getting all the registered devices from database 
    public function getAllDevices(){
        $stmt = $this->con->prepare("SELECT * FROM devices");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result; 
    }
}