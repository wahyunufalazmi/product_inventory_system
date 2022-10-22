<?php
 
class Login_model extends CI_Model{
    
    function cek_login($table,$where){     
        return $this->db->get_where($table,$where);
    }

    function register($username,$password){
    $data = array(
      'username' => $username,
      'password' => $password
    );
    $this->db->insert('user',$data);
  }

}