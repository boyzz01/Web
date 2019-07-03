<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Pengaduan extends REST_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model(['M_Pengaduan']);
       // $this->methods['users_post']['limit'] = 100;
    }


    public function index_get(){
        $data = $this->M_Pengaduan->getAll2();
        $this->set_response($data, REST_Controller::HTTP_OK); 
    }
    

    public function laporan_get($id_user){
        $data = $this->M_Pengaduan->getByIdUser($id_user);
        $this->set_response($data, REST_Controller::HTTP_OK); 
    }
    
    

    public function tambah_post(){

        $config['upload_path']          = './assets/img/pengaduan';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 2024;
        $config['encrypt_name']         = TRUE;

        $this->load->library('upload', $config);

        $gambar = null;
     
            
        if(!empty($_FILES["image_aduan"]["name"])){
                if (!$this->upload->do_upload('image_aduan')) {
                    $data = [
                        "status" => false,
                        "pesan" => $this->upload->display_errors()
                    ];
                    
                }
            $gambar = $this->upload->data()['file_name'];
        }
        

        $data = [
            "nama" => $this->post("nama"),
            "subject" => $this->post("subject"),
            "isi" => $this->post("isi"),
            "kategori" => $this->post("kategori"),
            "skpd" => $this->post("skpd"),
            "latitude" => $this->post("latitude"),
            "longitude" => $this->post("longitude"),
            "lokasi" => $this->post("lokasi"),
            "image_aduan" => $gambar,
            "ip" => $this->post("ip"),
            "publish" => $this->post("publish"),
            "status" => $this->post("status"),
            "tgl" => $this->post("tgl"),
            "unit" => $this->post("unit"),
            "deliver" => $this->post("deliver"),
            "user_id" => $this->post("user_id"),
        ];

        if($this->M_Pengaduan->save($data)){
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

  public function tambah2_post(){

        $config['upload_path']          = './assets/img/pengaduan';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 2024;
        $config['encrypt_name']         = TRUE;

        $this->load->library('upload', $config);

        $gambar = null;
        $gambar2 = null;
     
            
        if(!empty($_FILES["image_aduan"]["name"])){
                if (!$this->upload->do_upload('image_aduan')) {
                    $data = [
                        "status" => false,
                        "pesan" => $this->upload->display_errors()
                    ];
                    
                }
            $gambar = $this->upload->data()['file_name'];
        }
        
         if(!empty($_FILES["image_aduan2"]["name"])){
                if (!$this->upload->do_upload('image_aduan2')) {
                    $data = [
                        "status" => false,
                        "pesan" => $this->upload->display_errors()
                    ];
                    
                }
            $gambar2 = $this->upload->data()['file_name'];
        }
        

        $data = [
            "nama" => $this->post("nama"),
            "subject" => $this->post("subject"),
            "isi" => $this->post("isi"),
            "kategori" => $this->post("kategori"),
            "skpd" => $this->post("skpd"),
            "latitude" => $this->post("latitude"),
            "longitude" => $this->post("longitude"),
            "lokasi" => $this->post("lokasi"),
            "image_aduan" => $gambar,
             "image_aduan2" => $gambar2,
            "ip" => $this->post("ip"),
            "publish" => $this->post("publish"),
            "status" => $this->post("status"),
            "tgl" => $this->post("tgl"),
            "unit" => $this->post("unit"),
            "deliver" => $this->post("deliver"),
            "user_id" => $this->post("user_id"),
        ];

        if($this->M_Pengaduan->save($data)){
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
    
      public function tambah3_post(){

        $config['upload_path']          = './assets/img/pengaduan';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 2024;
        $config['encrypt_name']         = TRUE;

        $this->load->library('upload', $config);

        $gambar = null;
         $gambar2 = null;
          $gambar3 = null;
     
            
        if(!empty($_FILES["image_aduan"]["name"])){
                if (!$this->upload->do_upload('image_aduan')) {
                    $data = [
                        "status" => false,
                        "pesan" => $this->upload->display_errors()
                    ];
                    
                }
            $gambar = $this->upload->data()['file_name'];
        }
        
          if(!empty($_FILES["image_aduan2"]["name"])){
                if (!$this->upload->do_upload('image_aduan2')) {
                    $data = [
                        "status" => false,
                        "pesan" => $this->upload->display_errors()
                    ];
                    
                }
            $gambar2 = $this->upload->data()['file_name'];
        }
        
          if(!empty($_FILES["image_aduan3"]["name"])){
                if (!$this->upload->do_upload('image_aduan3')) {
                    $data = [
                        "status" => false,
                        "pesan" => $this->upload->display_errors()
                    ];
                    
                }
            $gambar3 = $this->upload->data()['file_name'];
        }
        
        

        $data = [
            "nama" => $this->post("nama"),
            "subject" => $this->post("subject"),
            "isi" => $this->post("isi"),
            "kategori" => $this->post("kategori"),
            "skpd" => $this->post("skpd"),
            "latitude" => $this->post("latitude"),
            "longitude" => $this->post("longitude"),
            "lokasi" => $this->post("lokasi"),
            "image_aduan" => $gambar,
            "image_aduan2" => $gambar2,
            "image_aduan3" => $gambar3,
            "ip" => $this->post("ip"),
            "publish" => $this->post("publish"),
            "status" => $this->post("status"),
            "tgl" => $this->post("tgl"),
            "unit" => $this->post("unit"),
            "deliver" => $this->post("deliver"),
            "user_id" => $this->post("user_id"),
        ];

        if($this->M_Pengaduan->save($data)){
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
        $config['upload_path']          = './assets/img/pengaduan';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 2024;
        $config['encrypt_name']         = TRUE;

        $this->load->library('upload', $config);

        $gambar_old = $this->M_Pengaduan->getById($id)->image_aduan;
        $gambar = $gambar_old;
            
        if(!empty($_FILES["image_aduan"]["name"])){
                if (!$this->upload->do_upload('image_aduan')) {
                    $data = [
                        "status" => false,
                        "pesan" => $this->upload->display_errors()
                    ];
                    
                }
            $gambar = $this->upload->data()['file_name'];
        }

        $data = [
            "nama" => $this->put('nama'),
            "subject" => $this->put('subject'),
            "isi" => $this->put('isi'),
            "kategori" => $this->put('kategori'),
            "skpd" => $this->put('skpd'),
            "latitude" => $this->put('latitude'),
            "longitude" => $this->put('longitude'),
            "lokasi" => $this->put('lokasi'),
            "image_aduan" => $gambar,
            "ip" => $this->put('ip'),
            "publish" => $this->put('publish'),
            "status" => $this->put('status'),
            "tgl" => $this->put('tgl'),
            "unit" => $this->put('unit'),
            "deliver" => $this->put('deliver'),
            "user_id" => $this->put('user_id'),
        ];

        if($this->M_Pengaduan->update($id,$data)){
            
            if(!empty($_FILES["image_aduan"]["name"])){
                unlink("assets/img/pengaduan/" .$gambar_old);
            }
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
        $gambar_old = $this->M_Pengaduan->getById($id)->image_aduan;
        if($this->M_Pengaduan->delete($id)){
            unlink("assets/img/pengaduan/" .$gambar_old);
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