<?php

class M_Tanggapan extends CI_Model{
    public $_table = 'tanggapan';

    public function rules()
    {
        return [
            ['field' => 'tanggapan',
            'label' => 'Tanggapan',
            'rules' => 'required',
            'errors'=>[
                'required'=>'Tanggapan Tidak Boleh Kosong',
                
                ]
            ]
        ];
    }

    public function save($data){
        return $this->db->insert($this->_table,$data);
    }

    public function update($id,$data){
        return $this->db->update($this->_table, $data, array('id_tanggapan' => $id));
    }


    public function getAll(){
        return $this->db->order_by("tgl",'DESC')->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_tanggapan" => $id])->row();
    }

    public function getByIdPengaduan($id_pengaduan)
    {
        //return $this->db->order_by("tgl",'ASC')->get_where($this->_table, ["pengaduan_id" => $id_pengaduan])->result();
        return $this->db->query("SELECT tanggapan.*, users.name as nama_user FROM tanggapan JOIN users ON tanggapan.user = users.id WHERE tanggapan.pengaduan_id = $id_pengaduan")->result();
    
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_tanggapan" => $id));
    }
}