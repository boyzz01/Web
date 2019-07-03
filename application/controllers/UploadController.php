<?php

class UploadController extends CI_Controller{

    public function uploadpengaduan() {
        $config['upload_path']          = './assets/img/sertifikat_coc';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 2024;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;
        $config['encrypt_name']         = TRUE;

        $this->load->library('upload', $config);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            if(!empty($_FILES["gambar"]["name"])){
                if (!$this->upload->do_upload('gambar')) {
                    $data = [
                        "status" => false,
                        "pesan" => $this->upload->display_errors()
                    ];
                }
                $gambar = $this->upload->data()['file_name'];
            }
        }
    }
}