<?php

class M_SMS_Aduan extends CI_Model{
    public $_table = 'sms_aduan';

    public function save($data){
        return $this->db->insert($this->_table,$data);
    }

    public function update($id,$data){
        return $this->db->update($this->_table, $data, array('id_pengaduan' => $id));
    }


    public function getAll(){
        return $this->db->order_by("tgl",'ASC')->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_pengaduan" => $id])->row();
    }

    public function getByIdUser($id_user)
    {
        return $this->db->order_by("tgl",'DESC')->get_where($this->_table, ["user_id" => $id_user])->result();
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_pengaduan" => $id));
    }
}