<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
		$this->load->model("PendaftaranSiswa_model");
		$this->load->model("DataSekolah_model");
		$this->load->model("Dashboard_model");
		
	} 

	public function index()
	{

		$page = 10;
		$offset = $this->uri->segment(1);

		$data['page'] = 'dashboard';

		$data['list_pendaftarsiswa'] = $this->PendaftaranSiswa_model->selectAllPagination($page, $offset)->result();
		$data['jumlah_pendaftar'] = $this->PendaftaranSiswa_model->selectAll()->num_rows();
		$data['jumlah_pendaftar_date'] = $this->Dashboard_model->get_date();
		$data['data_sekolah'] = $this->DataSekolah_model->selectAll()->result();

		$config['base_url'] = site_url();
		$config['total_rows'] = $this->PendaftaranSiswa_model->selectAll()->num_rows();
		$config['per_page'] = $page;
		$this->pagination->initialize($config);

		$this->load->view('template/header', $data);
		$this->load->view('index', $data);
		$this->load->view('template/footer');
	}
}
