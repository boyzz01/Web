<?php

class M_Users extends CI_Model{
    public $_table = 'users';


    public function login($username,$password){
        return $this->db->query("SELECT * FROM $this->_table WHERE username = '$username' AND password = '$password' ");
    }

    public function save($data){
        return $this->db->insert($this->_table,$data);
    }

    public function update($id,$data){
        return $this->db->update($this->_table, $data, array('id' => $id));
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    public function is_exist($id=null,$field,$value){
        $id_query = !empty($id) ? " AND id != '$id'" : null;
        return $this->db->query("SELECT * FROM $this->_table WHERE $field = '$value'".$id_query)->num_rows();
    }
}