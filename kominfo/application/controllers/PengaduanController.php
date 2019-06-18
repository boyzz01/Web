<?php

class PengaduanController extends CI_Controller{

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model(['M_Pengaduan']);
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
        //var_dump($this->M_Pengaduan->getById($id)->publish);die;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data =[
                "publish" =>$this->input->post('publish'),
                "status" =>$this->input->post('status')
            ];

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
        $params["data"]["pengaduan"]= $this->M_Pengaduan->getById($id);
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
}