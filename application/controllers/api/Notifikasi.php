<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');
	//defined a new constant for firebase api key
	define('FIREBASE_API_KEY', 'AAAA10m8uHo:APA91bGPwNh3XbeBh6ZVSUuw9gCO-W-c_3PEOj83RZ-rfpHvuDh218hh_lpCZgfH-CM7z_dc2DNVgIwYm9pNFxkqVHeRUOkr-K6d5LIb1eusCcXeaBP8E6qhsyOiGuwOklU1h1xUVvPC');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Notifikasi extends REST_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model(['M_Users']);
       // $this->methods['users_post']['limit'] = 100;
    }
    
    public function index_post($id_user){
        $devicetoken = $this->M_Users->getTokenById($id_user);
        $data = null;
        if(!empty($this->post('image'))){
            $data = [
                'title' => $this->post('title'),
                'message'=>$this->post('message'),
                'image'=>$this->post('iamge')
            ];
        }else{
            $data = [
                'title' => $this->post('title'),
                'message'=>$this->post('message'),
                'image'=>$this->post('image')
            ];
        }

		//sending push notification and displaying result 
		echo $this->send($devicetoken, $data);

    }
    
     public function send($registration_ids, $message) {
        $fields = array(
            'registration_ids' => $registration_ids,
            'data' => $message,
        );
        return $this->sendPushNotification($fields);
    }
    
    /*
    * This function will make the actuall curl request to firebase server
    * and then the message is sent 
    */
    private function sendPushNotification($fields) {
         
        //importing the constant files
        
        //firebase server url to send the curl request
        $url = 'https://fcm.googleapis.com/fcm/send';
 
        //building headers for the request
        $headers = array(
            'Authorization: key=' . FIREBASE_API_KEY,
            'Content-Type: application/json'
        );

        //Initializing curl to open a connection
        $ch = curl_init();
 
        //Setting the curl url
        curl_setopt($ch, CURLOPT_URL, $url);
        
        //setting the method as post
        curl_setopt($ch, CURLOPT_POST, true);

        //adding headers 
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 
        //disabling ssl support
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        
        //adding the fields in json format 
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
 
        //finally executing the curl request 
        $result = curl_exec($ch);
        if ($result === FALSE) {
            return 0;
        }else{
            
        //Now close the connection
        curl_close($ch);
 
        //and return the result 
        return 1;
        }
 
    }
}
