<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	//defined a new constant for firebase api key
	define('FIREBASE_API_KEY', 'AAAA10m8uHo:APA91bGPwNh3XbeBh6ZVSUuw9gCO-W-c_3PEOj83RZ-rfpHvuDh218hh_lpCZgfH-CM7z_dc2DNVgIwYm9pNFxkqVHeRUOkr-K6d5LIb1eusCcXeaBP8E6qhsyOiGuwOklU1h1xUVvPC');
	
class PengaduanController extends CI_Controller{

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model(['M_Pengaduan','M_Users','M_Tanggapan']);
        if ($this->session->userdata('status') != "login") {
            redirect(base_url("login"));
        }
     
    }

    public function index(){
        $params['title'] = "Pengaduan";
        $params["page"] = "pengaduan/index";
        $params["data"]["pengaduan"] = $this->M_Pengaduan->getAll();
        $this->load->view("admin/overview", $params);
    }

    public function edit($id){
        $params["title"] = "Pengaduan";
        $params["page"] = "pengaduan/edit";
        $params["data"]["pengaduan"]= $this->M_Pengaduan->getById($id);
  
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $devicetoken  = array($this->db->query("SELECT users.device_token FROM pengaduan JOIN users ON pengaduan.user_id = users.id  where pengaduan.id_pengaduan = $id")->row()->device_token);
            
            $publish = $this->input->post('publish');
            $status = $this->input->post('status');
            $data =[
                "publish" =>$publish,
                "status" =>$status
            ];
            
            $cek_alredy_edit = $this->db->query("SELECT * FROM pengaduan WHERE publish = $publish AND id_pengaduan = $id")->num_rows();
             $cek_alredy_edit2 = $this->db->query("SELECT * FROM pengaduan WHERE status = $status AND id_pengaduan = $id")->num_rows();
            if(!$cek_alredy_edit){
                if ($publish == 1 )
                {
                  $pesan =[
                    "title" =>"Laporan Anda Berubah",
                    "message" => "Laporan Anda Diubah Menjadi Publik"
                    
                  ]; 
                   $this->send($devicetoken, $pesan);
                }
                 if ($publish == 2 )
                {
                  $pesan =[
                    "title" =>"Laporan Anda Berubah",
                    "message" => "Laporan Anda Diubah Menjadi Private"
                  ]; 
                   $this->send($devicetoken, $pesan);
                }
               
                
            }
            
             if(!$cek_alredy_edit2){
                if ($status == 1 )
                {
                  $pesan =[
                    "title" =>"Laporan Anda Berubah",
                    "message" => "Laporan Anda Sedang Diproses"
                  ]; 
                   $this->send($devicetoken, $pesan);
                }
                 if ($status == 2 )
                {
                  $pesan =[
                    "title" =>"Laporan Anda Berubah",
                    "message" => "Laporan Anda Belum Ditanggapi"
                  ]; 
                   $this->send($devicetoken, $pesan);
                }
                
                 if ($status == 3 )
                {
                  $pesan =[
                    "title" =>"Laporan Anda Berubah",
                    "message" => "Laporan Anda Sudah Ditangani"
                  ]; 
                   $this->send($devicetoken, $pesan);
                }
              
            }

            if($this->M_Pengaduan->update($id,$data)){
                $this->session->set_flashdata('msg', '<div class="alert alert-success"><p>Data berhasil disimpan</p></div>');
               
            }else{
                $this->session->set_flashdata('msg', '<div class="alert alert-danger"><p>Data gagal disimpan!</p></div>');
               
            }
            redirect("pengaduan");
        }
        $this->load->view("admin/overview", $params);
    }

    public function detail($id){
        $params["title"] = "Pengaduan";
        $params["page"] = "pengaduan/detail";
        $params["data"]["tanggapan"]  = $this->M_Tanggapan->getByIdPengaduan($id);
        $params["data"]["pengaduan"]= $this->M_Pengaduan->getById($id);
        //var_dump($this->M_Tanggapan->getByIdPengaduan($id));die;
        $this->load->view("admin/overview", $params);
    }

    public function delete($id)
    {
        $pengaduan = $this->M_Pengaduan;
        $gambar_old = $pengaduan->getById($id)->image_aduan;
        
        if($pengaduan->delete($id)){
            if(!empty($_FILES["image_aduan"]["name"])){
                unlink("assets/img/pengaduan/" .$gambar_old);
            }
            
            $this->session->set_flashdata('msg', '<div class="alert alert-success"><h4>BERHASIL</h4><p>Data berhasil dihapus!</p></div>');
        }else{
            $this->session->set_flashdata('msg', '<div class="alert alert-danger"><h4>GAGAL</h4><p>Data gagal dihapus!</p></div>');
        }
         redirect("pengaduan");
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