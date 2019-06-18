<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

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
        $data = [
            "pengaduan_id" => $id_pengaduan,
            "tanggapan" => $this->post('tanggapan'),
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