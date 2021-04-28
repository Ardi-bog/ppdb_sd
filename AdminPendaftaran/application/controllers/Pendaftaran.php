<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran extends CI_Controller {

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
	} 

	public function index($num = '')
	{

		$perpage = 10;
		$offset = $this->uri->segment(3);

		$data['page'] = 'pendaftaran';

		$data['list_pendaftarsiswa'] = $this->PendaftaranSiswa_model->selectAllPagination($perpage, $offset)->result();
		$data['tahun_daftar'] = $this->PendaftaranSiswa_model->selectTahun()->result();
		$data['no_offset'] = $offset;
		$config['base_url'] = base_url('Pendaftaran/index/');
		$config['total_rows'] = $this->PendaftaranSiswa_model->selectAll()->num_rows();
		$config['per_page'] = $perpage;
		$config['prev_link'] = 'Sebelumnya';
		$config['next_link'] = 'Selanjutnya';
		$config['cur_tag_open'] = '<a href="" class="active">';
		$config['cur_tag_close'] = '</a>';
		$this->pagination->initialize($config);

		$this->load->view('template/header', $data);
		$this->load->view('pendaftaran', $data);
		$this->load->view('template/footer');
	}

	public function detail($id = null)
	{

		if(!isset($id)) redirect(base_url()."Pendaftaran");

		$data['page'] = 'pendaftaran';

		$data["detail_pendaftar"] = $this->PendaftaranSiswa_model->selectById($id)->row();

		$this->load->view('template/header', $data);
		$this->load->view('detail_pendaftaran', $data);
		$this->load->view('template/footer');
	}

	public function selectSiswaTidakTerdaftar()
	{

		$response = array();

		$data = array();
		$data = $this->PendaftaranSiswa_model->selectSiswaTidakTerdaftar()->result();

		if(!empty($data)){
			$response['status'] = 'success';
			$response['message'] = 'data fetch';
			$response['data'] = $data;
		}else{
			$response['status'] = 'failed';
		}

		echo json_encode($response);
	}

	public function selectSiswaTerdaftar()
	{
		$response = array();

		$data = array();
		$data = $this->PendaftaranSiswa_model->selectSiswaTerdaftar()->result();

		if(!empty($data)){
			$response['status'] = 'success';
			$response['message'] = 'data fetch';
			$response['data'] = $data;
		}else{
			$response['status'] = 'failed';
		}

		echo json_encode($response);
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

	public function updateStatusPendaftar()
	{

		$response = array();

		$id = $this->input->post("id_pendaftaran");
		$data = array('status' => 'DITERIMA');
		$edit = $this->PendaftaranSiswa_model->updateStatusPendaftar($id, $data);

		if(!empty($edit)){
			$response['status'] = 'success';
			$response['message'] = 'Success update status';
			$response['last_query'] = $this->db->last_query();
		}else{
			$response['status'] = 'failed';
			$response['message'] = 'Failed to update status';
		}

		echo json_encode($response);
	}
}
