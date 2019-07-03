<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Smsaduan extends REST_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model(['M_SMS_Aduan']);
       // $this->methods['users_post']['limit'] = 100;
    }


    public function index_get(){
        $data = $this->M_SMS_Aduan->getAll();
        $this->set_response($data, REST_Controller::HTTP_OK); 
    }

    public function tambah_post(){

    
        $data = [
            "nohp" => $this->post("nohp"),
            "isi" => $this->post("isi"),
            "tgl" => $this->post("tgl"),
            "status" => $this->post("status")
        ];

        if($this->M_SMS_Aduan->save($data)){
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

    public function edit_put($id){
       

        
        $data = [
            "nohp" => $this->put("nohp"),
            "isi" => $this->put("isi"),
            "tgl" => $this->put("tgl"),
            "status" => $this->put("status")
        ];

        if($this->M_SMS_Aduan->update($id,$data)){
            
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
        if($this->M_SMS_Aduan->delete($id)){
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