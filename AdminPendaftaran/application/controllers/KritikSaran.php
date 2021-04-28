<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KritikSaran extends CI_Controller {

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
	}

	public function index($num = '')
	{
		
		$perpage = 10;
		$offset = $this->uri->segment(3);
		$data['list_kritiksaran'] = $this->KritikSaran_model->selectAllPagination($perpage, $offset)->result();

		$data['page'] = 'kritikSaran';

		$config['base_url'] =  base_url('KritikSaran/index/');
		$config['total_rows'] = $this->KritikSaran_model->selectAll()->num_rows();
		$config['per_page'] = $perpage;
		$config['prev_link'] = 'Sebelumnya';
		$config['next_link'] = 'Selanjutnya';
		$config['cur_tag_open'] = '<a href="" class="active">';
		$config['cur_tag_close'] = '</a>';
		$this->pagination->initialize($config);

		$this->load->view('template/header', $data);
		$this->load->view('kritik_saran', $data);
		$this->load->view('template/footer');

	}

	public function searchKritikSaran()
	{
		$response = array();
		$data = array();

		$email = $this->input->post('email');
		$data = $this->KritikSaran_model->searchKritikSaran($email)->result();
		
		if (!empty($data)) {
			
			$response['status'] = 'success';
			$response['message'] = 'data fetch';
			$response['data'] = $data;
			
		}else{

			$response['status'] = 'failed';
			$response['message'] = 'No data found';

		}

		echo json_encode($response);

	}

	public function searchKritik()
	{
		$response = array();
		$data = array();

		$keyword = $this->input->post('keyword');
		$data = $this->KritikSaran_model->searchKritik($keyword)->result();

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
