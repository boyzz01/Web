<?php

class M_Admin extends CI_Model{
    public $_table = 'admin';


   
    public function login($data){
        return $this->db->get_where($this->_table,$data);
    }

}