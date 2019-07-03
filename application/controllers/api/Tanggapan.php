<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');
	define('FIREBASE_API_KEY', 'AAAA10m8uHo:APA91bGPwNh3XbeBh6ZVSUuw9gCO-W-c_3PEOj83RZ-rfpHvuDh218hh_lpCZgfH-CM7z_dc2DNVgIwYm9pNFxkqVHeRUOkr-K6d5LIb1eusCcXeaBP8E6qhsyOiGuwOklU1h1xUVvPC');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Tanggapan extends REST_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model(['M_Tanggapan']);
       // $this->methods['users_post']['limit'] = 100;
    }

    public function ambil_get($id_pengaduan){
        $data = $this->M_Tanggapan->getByIdPengaduan($id_pengaduan);
        $this->set_response($data, REST_Controller::HTTP_OK); 
    }

    public function tambah_post($id_pengaduan){
          $devicetoken  = array($this->db->query("SELECT users.device_token FROM pengaduan JOIN users ON pengaduan.user_id = users.id  where pengaduan.id_pengaduan = $id_pengaduan")->row()->device_token);
               
                $pesan =[
                    "title" =>"Komentar Baru",
                    "message" => "Ada Komentar Baru Di Laporan Anda"
                  ]; 
                    $this->send($devicetoken, $pesan);
        $data = [
            "pengaduan_id" => $id_pengaduan,
            "tanggapan" => "aaa",
            "tgl"=> $this->post('tgl'),
            "user"=>$this->post('user'),
        ];

        if($this->M_Tanggapan->save($data)){
             
            $data = [
                'status' =>true,
                'pesan' =>'Data Berhasil Disimpan'
            ];
            $this->set_response($data, REST_Controller::HTTP_OK); 
        }else{
            $data = [
                'status' =>false,
                'pesan' =>'Data Gagal Disimpan'
            ];
            $this->set_response($data, REST_Controller::HTTP_BAD_REQUEST); 
        }
    }
    
      public function send($registration_ids, $message) {
        $fields = array(
            'registration_ids' => $registration_ids,
            'data' => $message,
        );
        return $this->sendPushNotification($fields);
    }
    
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
    

    public function edit_put($id_tanggapan){
        $data = [
            "tanggapan" => $this->put('tanggapan')
        ];

        if($this->M_Tanggapan->update($id_tanggapan,$data)){
            $data = [
                'status' =>true,
                'pesan' =>'Data Berhasil Disimpan'
            ];
            $this->set_response($data, REST_Controller::HTTP_OK); 
        }else{
            $data = [
                'status' =>false,
                'pesan' =>'Data Gagal Disimpan'
            ];
            $this->set_response($data, REST_Controller::HTTP_BAD_REQUEST); 
        }
    }

    public function hapus_delete($id){
    
        if($this->M_Tanggapan->delete($id)){
            $data = [
                'status' =>true,
                'pesan' =>'Data Berhasil Dihapus'
            ];
            $this->set_response($data, REST_Controller::HTTP_OK); 
        }else{
            $data = [
                'status' =>false,
                'pesan' =>'Data Gagal Dihapus'
            ];
            $this->set_response($data, REST_Controller::HTTP_BAD_REQUEST); 
        }
    }

}