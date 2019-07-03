<?php
	define('FIREBASE_API_KEY', 'AAAA10m8uHo:APA91bGPwNh3XbeBh6ZVSUuw9gCO-W-c_3PEOj83RZ-rfpHvuDh218hh_lpCZgfH-CM7z_dc2DNVgIwYm9pNFxkqVHeRUOkr-K6d5LIb1eusCcXeaBP8E6qhsyOiGuwOklU1h1xUVvPC');
class TanggapanController extends CI_Controller{
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model(['M_Tanggapan']);
        if ($this->session->userdata('status') != "login") {
            redirect(base_url("login"));
        }
    }

    public function add($id){
        $params["title"] = "Tanggapan";
        $params["page"] = "tanggapan/add";
        
        $validation = $this->form_validation;
        $validation->set_rules($this->M_Tanggapan->rules());


        if ($validation->run()) {
            $tanggapan = $this->input->post('tanggapan');
            $user = $this->db->query("SELECT * FROM users WHERE username='admin'")->row()->id;
          
           $devicetoken  = array($this->db->query("SELECT users.device_token FROM pengaduan JOIN users ON pengaduan.user_id = users.id  where pengaduan.id_pengaduan = $id")->row()->device_token);
               
               
            $data =[
                "pengaduan_id" =>$id,
                "tanggapan" =>$tanggapan,
                "tgl" => date("Y-m-d H:i:s"),
                "user" => $user,
                "publish" =>"1"
            ];
            if($this->M_Tanggapan->save($data)){
                 $pesan =[
                    "title" =>"Komentar Baru",
                    "message" => "Ada Komentar Baru Di Laporan Anda"
                  ]; 
                    $this->send($devicetoken, $pesan);
                $this->session->set_flashdata('msg', '<div class="alert alert-success"><h4>BERHASIL</h4><p>Data berhasil disimpan!</p></div>');
            }else{
                $this->session->set_flashdata('msg', '<div class="alert alert-danger"><h4>GAGAL</h4><p>Data gagal disimpan!</p></div>');
            }
             redirect(base_url()."pengaduan/detail/".$id);
        }
        $this->load->view("admin/overview", $params);
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
    
    public function edit($id){
        $params["title"] = "Tanggapan";
        $params["page"] = "tanggapan/edit";
        $data_tanggapan = $this->M_Tanggapan->getById($id);
        $params["data"]["tanggapan"] = $data_tanggapan;
        
        $validation = $this->form_validation;
        $validation->set_rules($this->M_Tanggapan->rules());


        if ($validation->run()) {
            $tanggapan = $this->input->post('tanggapan');
            $data = [
               
                "tanggapan" =>$tanggapan,
              
            ];
            if($this->M_Tanggapan->update($id,$data)){
                
                $this->session->set_flashdata('msg', '<div class="alert alert-success"><h4>BERHASIL</h4><p>Data berhasil disimpan!</p></div>');
            }else{
                $this->session->set_flashdata('msg', '<div class="alert alert-danger"><h4>GAGAL</h4><p>Data gagal disimpan!</p></div>');
            }
             redirect(base_url()."pengaduan/detail/".$data_tanggapan->pengaduan_id);
        }
        $this->load->view("admin/overview", $params);
    }

    public function delete($id)
    {
        $tanggapan = $this->M_Tanggapan;
        $data_tanggapan = $this->M_Tanggapan->getById($id);

        if($tanggapan->delete($id)){
            
            $this->session->set_flashdata('msg', '<div class="alert alert-success"><h4>BERHASIL</h4><p>Data berhasil dihapus!</p></div>');
        }else{
            $this->session->set_flashdata('msg', '<div class="alert alert-danger"><h4>GAGAL</h4><p>Data gagal dihapus!</p></div>');
        }
         redirect(base_url()."pengaduan/detail/".$data_tanggapan->pengaduan_id);
    }
}