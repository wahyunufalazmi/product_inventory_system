<?php
 
class Login extends CI_Controller{
 
    function __construct(){
        parent::__construct();     
        $this->load->model('login_model');
 
    }

    function reg(){
        $this->load->view('registration_view');
    }

    function register(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
       
        $this->login_model->register($username,$password);
        redirect('login');
    }
 
    function index(){
        $this->load->view('login_view');
    }
 
    function aksi_login(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $where = array(
            'username' => $username,
            'password' => $password
            );
        $cek = $this->login_model->cek_login("user",$where)->num_rows();
        if($cek > 0){
 
            $data_session = array(
                'identity' => $username,
                'status' => "logged"
                );
 
            $this->session->set_userdata($data_session);
 
            redirect(base_url("objek"));
 
        }else{
            redirect(base_url("login"));
        }
    }
 
    function logout(){
        $this->session->sess_destroy();
        $this->session->unset_userdata($data_session);
        redirect(base_url('home'));
    }
}