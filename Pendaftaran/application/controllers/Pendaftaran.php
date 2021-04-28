<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("PendaftaranSiswa_model");
	} 

	public function index()
	{
		$page = 10;
		$offset = $this->uri->segment(1);

        $data['page'] = 'pendaftaran';

		$data['list_pendaftarsiswa'] = $this->PendaftaranSiswa_model->selectAllPagination($page, $offset)->result();

		$config['base_url'] = site_url();
		$config['total_rows'] = $this->PendaftaranSiswa_model->selectAll()->num_rows();
		
        $this->load->view('template/header', $data);
		$this->load->view('pendaftaran');
		$this->load->view('template/footer');
	}
	
	public function selectAll()
	{
		$response = array();

		$data = array();
		$data = $this->PendaftaranSiswa_model->selectAll()->result();

		if(!empty($data)){
			$response['status'] = 'success';
			$response['message'] = 'data fetch';
			$response['data'] = $data;
		}else{
			$response['status'] = 'failed';
		}

		echo json_encode($response);
	}

	public function searchSiswa()
	{
		$response = array();
		$data = array();

		$keyword = $this->input->post('keyword');
		$data = $this->PendaftaranSiswa_model->searchSiswa($keyword)->result();

		if (!empty($data)) {

			$response['status'] = 'success';
			$response['message'] = 'data fetch';
			$response['last_query'] = $this->db->last_query();
			$response['keyword'] = $keyword;
			$response['data'] = $data;
			
		}else{
			
			$response['status'] = 'failed';
			$response['message'] = 'No data found';

		}

		echo json_encode($response);

	}
}
