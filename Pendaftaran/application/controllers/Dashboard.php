<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("DataSekolah_model");
		$this->load->model("InfoPendaftaran_model");
	}

	public function index()
	{
		$data['page'] = 'dashboard';
		
		$data['data_sekolah'] = $this->DataSekolah_model->selectAll()->result();
		$data['info_pendaftaran'] = $this->InfoPendaftaran_model->selectAll()->result();

        $this->load->view('template/header', $data);
		$this->load->view('dashboard');
		$this->load->view('template/footer');
    }
}
