<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KelolaProfile extends CI_Controller {

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
		$this->load->model("DataSekolah_model");
		$this->load->model("PendaftaranSiswa_model");
		$this->load->model("Prestasi_model");
		$this->load->model("DaftarPendidik_model");
		$this->load->model("Ekstrakurikuler_model");
		$this->load->model("Kegiatan_model");
		$this->load->model("Fasilitas_model");
		$this->load->model("GambarSekolah_model");
		$this->load->model("InfoPendaftaran_model");
	}

	public function index()
	{
		$data['page'] = 'kelolaProfile';

		$data['data_sekolah'] = $this->DataSekolah_model->selectAll()->result();
		$data['info_pendaftaran'] = $this->InfoPendaftaran_model->selectAll()->result();
		$data['jumlah_siswa_terdaftar'] = $this->PendaftaranSiswa_model->selectSiswaTerdaftar()->num_rows();
		$data['prestasi'] = $this->Prestasi_model->selectAll()->result();
		$data['kegiatan'] = $this->Kegiatan_model->selectAll()->result();
		$data['ekstrakurikuler'] = $this->Ekstrakurikuler_model->selectAll()->result();
		$data['daftar_pendidik'] = $this->DaftarPendidik_model->selectAll()->result();
		$data['fasilitas'] = $this->Fasilitas_model->selectALl()->result();
		$data['gambar_sekolah'] = $this->GambarSekolah_model->selectAll()->result();

		$this->load->view('template/header', $data);
		$this->load->view('kelola_profile', $data);
		$this->load->view('template/footer');
	}

	public function editDataSekolah()
	{
		if($this->DataSekolah_model->editDataSekolah()){
			$callback = array('status' => 'success');
		}else{
			$callback = array('status' => 'failed');
		}

		echo json_encode($callback);
	}

	public function editLogoSekolah()
	{
		$response = array();

		$config['upload_path'] = "./assets/img/gambar/";
		$post = $this->input->post();
		$tipe = $post['tipe'];
		$url = $config['upload_path'].''.$tipe;
		$gambar64 = $post['gambar'];
		$decode64 = base64_decode($gambar64); 
		if (file_put_contents($config['upload_path'].''.$tipe, $decode64)) {
			if($this->DataSekolah_model->editLogoSekolah($url) > 0){
				$response['status'] = 'success';
			}else{
				$response['status'] = 'failed';
				$response['message'] = 'Gagal mengedit prestasi';
			}
		}else{
			$response['status'] = 'failed';
			$response['message'] = 'Gagal mengupload gambar prestasi';
		}

		echo json_encode($response);
	}

	// -- Gambar Sekolah -- //
	public function addGambarSekolah()
	{
		$response = array();

		$config['upload_path'] = "./assets/img/gambar/";
		$post = $this->input->post();
		$tipe = $post['tipe'];
		$url = $config['upload_path'].''.$tipe;
		$gambar64 = $post['gambar'];
		$decode64 = base64_decode($gambar64); 
		if (file_put_contents($config['upload_path'].''.$tipe, $decode64)) {
			if($this->GambarSekolah_model->addGambarSekolah($url)){
				$response['status'] = 'success';
			}else{
				$response['status'] = 'failed';
			}
	
		}else{
			$response['status'] = 'failed';
			$response['message'] = 'Gagal mengupload gambar sekolah';
		}

		echo json_encode($response);
	}

	public function editGambarSekolah()
	{
		$response = array();

		$config['upload_path'] = "./assets/img/gambar/";
		$post = $this->input->post();
		$tipe = $post['tipe'];
		$url = $config['upload_path'].''.$tipe;
		$gambar64 = $post['gambar'];
		$decode64 = base64_decode($gambar64); 
		if (file_put_contents($config['upload_path'].''.$tipe, $decode64)) {
			if($this->GambarSekolah_model->editGambarSekolah($url) > 0){
				$response['status'] = 'success';
			}else{
				$response['status'] = 'failed';
				$response['message'] = 'Gagal mengedit gambar';
			}
	
		}else{
			$response['status'] = 'failed';
			$response['message'] = 'Gagal mengupload gambar sekolah';
		}

		echo json_encode($response);
	}

	public function selectGambarSekolah()
	{
		$response = array();
		$data =  $this->GambarSekolah_model->selectAll()->result();
		$response['status'] = 'success';
		$response['data'] = $data;
		

		echo json_encode($response);
	}

	public function deleteGambarSekolah()
	{
		$response = array();
		if($this->GambarSekolah_model->deleteGambarSekolah()){
			$response['status'] = 'success';
		}else{
			$response['status'] = 'failed';
		}

		echo json_encode($response);
	}

	// -- Fasilitas -- //
	public function addFasilitas()
	{
		$response = array();
		if($this->Fasilitas_model->addFasilitas()){
			$response['status'] = 'success';
		}else{
			$response['status'] = 'failed';
		}

		echo json_encode($response);
	}

	public function selectFasilitas()
	{
		$response = array();
		$data =  $this->Fasilitas_model->selectAll()->result();
		$response['status'] = 'success';
		$response['data'] = $data;
		

		echo json_encode($response);
	}

	public function editFasilitas()
	{
		$response = array();
		if($this->Fasilitas_model->editFasilitas() > 0){
			$response['status'] = 'success';
		}else{
			$response['status'] = 'failed';
		}

		echo json_encode($response);
	}

	public function deleteFasilitas()
	{
		$response = array();
		if($this->Fasilitas_model->deleteFasilitas()){
			$response['status'] = 'success';
		}else{
			$response['status'] = 'failed';
		}

		echo json_encode($response);
	}

	public function editDeskripsiFasilitas()
	{
		$response = array();
		if($this->DataSekolah_model->editDeskripsiFasilitas()){
			$response['status'] = 'success';
		}else{
			$response['status'] = 'failed';
		}

		echo json_encode($response);
	}

	public function editDeskripsiDaftarPendidik()
	{
		$response = array();
		if($this->DataSekolah_model->editDeskripsiPendidik()){
			$response['status'] = 'success';
		}else{
			$response['status'] = 'failed';
		}

		echo json_encode($response);
	}

	// -- Prestasi -- //
	public function addPrestasi()
	{
		$Prestasi_model = $this->Prestasi_model;
		if ($Prestasi_model->addPrestasi()) {
			$response['status'] = 'success';
		}else{
			$response['status'] = 'failed';
		}

		echo json_encode($response);
		
	}

	public function selectPrestasi()
	{
		$response = array();
		$data =  $this->Prestasi_model->selectAll()->result();
		$response['status'] = 'success';
		$response['data'] = $data;
		

		echo json_encode($response);
	}

	public function deletePrestasi()
	{

		$response = array();
		if($this->Prestasi_model->deletePrestasi()){
			$response['status'] = 'success';
		}else{
			$response['status'] = 'failed';
		}

		echo json_encode($response);
	}

	public function editFormPrestasi()
	{
		$response = array();
		if($this->Prestasi_model->editDeskripsiPrestasi()){
			$response['status'] = 'success';
		}else{
			$response['status'] = 'failed';
		}

		echo json_encode($response);
	}

	public function editPrestasi()
	{
		$response = array();

		$config['upload_path'] = "./assets/img/gambar/";
		$post = $this->input->post();
		$tipe = $post['tipe'];
		$url = $config['upload_path'].''.$tipe;
		$gambar64 = $post['gambar'];
		$decode64 = base64_decode($gambar64); 
		if (file_put_contents($config['upload_path'].''.$tipe, $decode64)) {
			if($this->Prestasi_model->editPrestasi($url) > 0){
				$response['status'] = 'success';
			}else{
				$response['status'] = 'failed';
				$response['message'] = 'Gagal mengedit prestasi';
			}
		}else{
			$response['status'] = 'failed';
			$response['message'] = 'Gagal mengupload gambar prestasi';
		}

		echo json_encode($response);
	}
	
	// -- Kegiatan -- //
	
	public function addKegiatan()
	{
		$response = array();
		if($this->Kegiatan_model->addKegiatan()){
			$response['status'] = 'success';
		}else{
			$response['status'] = 'failed';
		}

		echo json_encode($response);
	}

	public function selectKegiatan()
	{
		$response = array();
		$data =  $this->Kegiatan_model->selectAll()->result();
		$response['status'] = 'success';
		$response['data'] = $data;
		

		echo json_encode($response);
	}

	public function editDeskripsiKegiatan()
	{
		$response = array();
		if($this->Kegiatan_model->editDeskripsiKegiatan()){
			$response['status'] = 'success';
		}else{
			$response['status'] = 'failed';
		}

		echo json_encode($response);
	}


	public function editKegiatan()
	{
		$response = array();

		$config['upload_path'] = "./assets/img/gambar/";
		$post = $this->input->post();
		$tipe = $post['tipe'];
		$url = $config['upload_path'].''.$tipe;
		$gambar64 = $post['gambar'];
		$decode64 = base64_decode($gambar64); 
		if (file_put_contents($config['upload_path'].''.$tipe, $decode64)) {
			if($this->Kegiatan_model->editKegiatan($url) > 0){
				$response['status'] = 'success';
			}else{
				$response['status'] = 'failed';
				$response['message'] = 'Gagal mengedit prestasi';
			}
		}else{
			$response['status'] = 'failed';
			$response['message'] = 'Gagal mengupload gambar prestasi';
		}

		echo json_encode($response);
	}

	public function deleteKegiatan()
	{
		$response = array();
		if($this->Kegiatan_model->deleteKegiatan()){
			$response['status'] = 'success';
		}else{
			$response['status'] = 'failed';
		}

		echo json_encode($response);
		
	}

	// -- Ekstrakurikuler -- //

	public function addEkskul()
	{
		$response = array();
		if($this->Ekstrakurikuler_model->addEskul()){
			$response['status'] = 'success';
		}else{
			$response['status'] = 'failed';
		}

		echo json_encode($response);
	}

	public function selectEskul()
	{
		$response = array();
		$data =  $this->Ekstrakurikuler_model->selectAll()->result();
		$response['status'] = 'success';
		$response['data'] = $data;
		

		echo json_encode($response);
	}


	public function editEkskul()
	{
		$response = array();

		$config['upload_path'] = "./assets/img/gambar/";
		$post = $this->input->post();
		$tipe = $post['tipe'];
		$url = $config['upload_path'].''.$tipe;
		$gambar64 = $post['gambar'];
		$decode64 = base64_decode($gambar64); 
		if (file_put_contents($config['upload_path'].''.$tipe, $decode64)) {
			if($this->Ekstrakurikuler_model->editEskul($url) > 0){
				$response['status'] = 'success';
			}else{
				$response['status'] = 'failed';
				$response['message'] = 'Gagal mengedit prestasi';
			}
		}else{
			$response['status'] = 'failed';
			$response['message'] = 'Gagal mengupload gambar prestasi';
		}

		echo json_encode($response);
	}

	public function editDesrkripsiEskul()
	{
		$response = array();
		if($this->Ekstrakurikuler_model->editDeskripsiEskul()){
			$response['status'] = 'success';
		}else{
			$response['status'] = 'failed';
		}

		echo json_encode($response);
	}

	public function deleteEkskul()
	{
		$response = array();
		if($this->Ekstrakurikuler_model->deleteEskul()){
			$response['status'] = 'success';
		}else{
			$response['status'] = 'failed';
		}

		echo json_encode($response);
	}

	// -- Daftar Pendidik -- //

	public function addPendidik()
	{
		$response = array();
		if($this->DaftarPendidik_model->addPendidik()){
			$response['status'] = 'success';
		}else{
			$response['status'] = 'failed';
		}

		echo json_encode($response);
	}

	public function selectPendidik()
	{
		$response = array();
		$data =  $this->DaftarPendidik_model->selectAll()->result();
		$response['status'] = 'success';
		$response['data'] = $data;
		

		echo json_encode($response);
	}

	public function editPendidik()
	{
	
		$response = array();

		$config['upload_path'] = "./assets/img/gambar/";
		$post = $this->input->post();
		$tipe = $post['tipe'];
		$url = $config['upload_path'].''.$tipe;
		$gambar64 = $post['gambar'];
		$decode64 = base64_decode($gambar64); 
		if (file_put_contents($config['upload_path'].''.$tipe, $decode64)) {
			if($this->DaftarPendidik_model->editPendidik($url) > 0){
				$response['status'] = 'success';
			}else{
				$response['status'] = 'failed';
				$response['message'] = 'Gagal mengedit prestasi';
			}
		}else{
			$response['status'] = 'failed';
			$response['message'] = 'Gagal mengupload gambar prestasi';
		}

		echo json_encode($response);
	}

	public function editDeskripsiPendidik()
	{
		$response = array();
		if($this->DaftarPendidik_model->editDeskripsiPendidik()){
			$response['status'] = 'success';
		}else{
			$response['status'] = 'failed';
		}

		echo json_encode($response);
	}

	public function deletePendidik()
	{
		$response = array();
		if($this->DaftarPendidik_model->deletePendidik()){
			$response['status'] = 'success';
		}else{
			$response['status'] = 'failed';
		}

		echo json_encode($response);
	}

	public function editInfoPendaftaran()
	{
		$response = array();
		if($this->InfoPendaftaran_model->editInfoPendaftaran() > 0){
			$response['status'] = 'success';
		}else{
			$response['status'] = 'failed';
		}

		echo json_encode($response);
	}


}
