<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
		$this->load->model("Prestasi_model");
		$this->load->model("DaftarPendidik_model");
		$this->load->model("Ekstrakurikuler_model");
		$this->load->model("Kegiatan_model");
		$this->load->model("InfoPendaftaran_model");
		$this->load->model("DataSekolah_model");
	}

	public function index()
	{
		$data['info_pendaftaran'] = $this->InfoPendaftaran_model->selectAll()->result();
		$data['prestasi'] = $this->Prestasi_model->selectLimit3()->result();
		$data['kegiatan'] = $this->Kegiatan_model->selectLimit3()->result();
		$data['ekstrakurikuler'] = $this->Ekstrakurikuler_model->selectLimit3()->result();
		$data['daftar_pendidik'] = $this->DaftarPendidik_model->selectAll()->result();
		$data['data_sekolah'] = $this->DataSekolah_model->selectAll()->result();
		$this->load->view('welcome_message', $data);
	}
}
