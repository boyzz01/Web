<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class User extends REST_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model(['M_Users']);
       // $this->methods['users_post']['limit'] = 100;
    }
    
    public function login_post()
    {
        $username = $this->post('username');
        $password   = md5($this->post('password'));
        
        $login = $this->M_Users->login($username,$password);

        if($login->num_rows() > 0 ){
            $data_login = $login->row();
            $data = [
                'status' =>true,
                'pesan' =>'berhasil login',
                'id' => $data_login->id
            ];
            $this->set_response($data, REST_Controller::HTTP_OK); 
        }else{
            $data = [
                'status' =>false,
                'pesan' =>'gagal login'
            ];
            $this->set_response($data, REST_Controller::HTTP_NOT_FOUND); 
        }
       
    }

    public function register_post(){
        $config['upload_path']          = './assets/img/profil';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 2024;
        $config['encrypt_name']         = TRUE;

        $this->load->library('upload', $config);

        $gambar = 'user.png';
            
        if(!empty($_FILES["image_profil"]["name"])){
                if (!$this->upload->do_upload('image_profil')) {
                    $data = [
                        "status" => false,
                        "pesan" => $this->upload->display_errors()
                    ];
                    
                }
            $gambar = $this->upload->data()['file_name'];
        }

        $username = $this->post('username');
        $data = [
            'name'=> $this->post('name'),
            'username' => $username,
            'jenis_kelamin' => $this->post('jenis_kelamin'),
            'identitas' => $this->post('identitas'),
            'nik' => $this->post('nik'),
            'alamat' => $this->post('alamat'),
            'phone' => $this->post('phone'),
            'email' => $this->post('email'),
            'image_profil' => $gambar,
            'password' => md5($this->post('password'))
        ];
        if($this->M_Users->is_exist(null,'username',$username) > 0){
            $data = [
                'status' =>false,
                'pesan' =>'Username sudah ada'
            ];
            $this->set_response($data, REST_Controller::HTTP_BAD_REQUEST); 
        } else{
            
            if($this->M_Users->save($data)){
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
      
    }

    public function profil_get($id){
        
        $profil = $this->M_Users->getById($id);
        if($profil){
            $this->set_response($profil, REST_Controller::HTTP_OK); 
        }else{
            $this->set_response(NULL, REST_Controller::HTTP_NOT_FOUND); 
        }
        
    }

    public function edit_profil_post($id){

        $config['upload_path']          = './assets/img/profil';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 2024;
        $config['encrypt_name']         = TRUE;

        $this->load->library('upload', $config);

        $gambar_old = $this->M_Users->getById($id)->image_profil;
        $gambar = $gambar_old;
            
        if(!empty($_FILES["image_profil"]["name"])){
                if (!$this->upload->do_upload('image_profil')) {
                    $data = [
                        "status" => false,
                        "pesan" => $this->upload->display_errors()
                    ];
                    
                }
            $gambar = $this->upload->data()['file_name'];
        }
        
        $username = $this->post('username');
        $data = [
            'name'=> $this->post('name'),
            'username' => $username,
            'jenis_kelamin' => $this->post('jenis_kelamin'),
            'identitas' => $this->post('identitas'),
            'nik' => $this->post('nik'),
            'alamat' => $this->post('alamat'),
            'phone' => $this->post('phone'),
            'email' => $this->post('email'),
            'image_profil' => $gambar,
        ];
        if($this->M_Users->is_exist($id,'username',$username) > 0){
            $data = [
                'status' =>false,
                'pesan' =>'Username sudah ada'
            ];
            $this->set_response($data, REST_Controller::HTTP_BAD_REQUEST); 
        } else{
            
            if($this->M_Users->update($id,$data)){
                if(!empty($_FILES["image_profil"]["name"])){
                    unlink("assets/img/profil/" .$gambar_old);
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
    }

   

}