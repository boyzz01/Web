<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['M_Admin']);

    }


    function login(){

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

           

            $username = $this->input->post("username",TRUE);
            $data = [
                "username" => $username,
                "password" => md5($this->input->post("password",TRUE))
            ];

            //var_dump($data);die;

            

            $login = $this->M_Admin->login($data);
           //var_dump($login->num_rows());die;
            if($login->num_rows()){
                // $data_admin = $login->row();
                $data_session = array(
                    'nama' => $username,
                    'status' => "login"
                    );
             
                $this->session->set_userdata($data_session);

                 redirect(base_url());
               
            }else{
                $this->session->set_flashdata('msg', '<div class="alert alert-danger"><p>username atau password anda salah!</p></div>');
               
            }   
        }
        $this->load->view("login/index");
        
    }

    function logout(){
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }

}