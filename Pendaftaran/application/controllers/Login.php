<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
        $this->load->model('Login_model');
	}

	public function index()
	{
        $this->load->view('welcome_message');
    }
    
    function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => md5(md5($password)),
			'level' => 'USER'
			);
		$cek = $this->Login_model->cek_login("users",$where)->num_rows();
		if($cek > 0){
 
			$data_session = array(
				'nama' => $username,
				'status' => "login"
				);
 
			$this->session->set_userdata($data_session);
 
			redirect("http://localhost/sdn-polehan-5/Pendaftaran/Dashboard");
 
		}else{
			echo "<script>alert('LOGIN GAGAL!');history.go(-1);</script>";
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect("http://localhost/sdn-polehan-5/Pendaftaran/");
	}
}
