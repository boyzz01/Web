<?php

class M_Tanggapan extends CI_Model{
    public $_table = 'tanggapan';

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
        return $this->db->order_by("tgl",'DESC')->get_where($this->_table, ["pengaduan_id" => $id_pengaduan])->result();
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_tanggapan" => $id));
    }
}