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
		$this->load->model("KritikSaran_model");
		$this->load->model("DataSekolah_model");
		$this->load->model("Prestasi_model");
		$this->load->model("DaftarPendidik_model");
		$this->load->model("Ekstrakurikuler_model");
		$this->load->model("Kegiatan_model");
		$this->load->model("GambarSekolah_model");
		$this->load->model("Fasilitas_model");
	} 

	public function index()
	{
		$page = 5;

		$data['list_kritiksaran'] = $this->KritikSaran_model->selectAll($page)->result();
		$data['data_sekolah'] = $this->DataSekolah_model->selectAll()->result();
		$data['jumlah_pendaftar'] = $this->DataSekolah_model->get_date();
		$data['prestasi'] = $this->Prestasi_model->selectAll()->result();
		$data['kegiatan'] = $this->Kegiatan_model->selectAll()->result();
		$data['ekstrakurikuler'] = $this->Ekstrakurikuler_model->selectAll()->result();
		$data['ekstra_limit_3'] = $this->Ekstrakurikuler_model->selectLimit3()->result();
		$data['prestasi_limit_3'] = $this->Prestasi_model->selectLimit3()->result();
		$data['kegiatan_limit_3'] = $this->Kegiatan_model->selectLimit3()->result();
		$data['daftar_pendidik'] = $this->DaftarPendidik_model->selectAll()->result();
		$data['gambar_sekolah'] = $this->GambarSekolah_model->selectAll()->result_array();
		$data['fasilitas'] = $this->Fasilitas_model->selectAll()->result();

		$this->load->view('index', $data);
	}

	public function addKritikSaran()
	{
		$kritik_saran = $this->KritikSaran_model;
		$kritik_saran->add();

		redirect(base_url());
	}
}
