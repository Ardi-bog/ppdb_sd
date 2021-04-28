<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller {

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
	function __construct(){
		parent::__construct();
		$this->load->model('Pendaftaran_model');
	}

	public function index()
	{
		$this->load->view('form_pendaftaran');
	}
	
	function addData(){
		$no_akta = $this->input->post('no_akta');
		$nik = $this->input->post('nik');
		$nama = $this->input->post('nama');
        $jk = $this->input->post('jk');
        $tempat_lahir = $this->input->post('tempat_lahir');
        $tanggal_lahir = $this->input->post('tanggal_lahir');
		$agama = $this->input->post('agama');
		$tgl_daftar = date("Y-m-d");
		$alamat = $this->input->post('alamat');
		$status = 'PENDING';
		$provinsi = $this->input->post('provinsi');
		$kota_kabupaten = $this->input->post('kota_kabupaten');
        $kecamatan = $this->input->post('kecamatan');
        $desa_kelurahan = $this->input->post('desa_kelurahan');
        $rt = $this->input->post('rt');
		$rw = $this->input->post('rw');
		$kode_pos = $this->input->post('kode_pos');
		$nik_ayah = $this->input->post('nik_ayah');
		$nama_ayah = $this->input->post('nama_ayah');
        $pendidikan_ayah = $this->input->post('pendidikan_ayah');
        $pekerjaan_ayah = $this->input->post('pekerjaan_ayah');
        $penghasilan_ayah = $this->input->post('penghasilan_ayah');
		$no_hp_ayah = $this->input->post('no_hp_ayah');
		$alamat_ayah = $this->input->post('alamat_ayah');
		$nik_ibu = $this->input->post('nik_ibu');
		$nama_ibu = $this->input->post('nama_ibu');
        $pendidikan_ibu = $this->input->post('pendidikan_ibu');
        $pekerjaan_ibu = $this->input->post('pekerjaan_ibu');
        $penghasilan_ibu = $this->input->post('penghasilan_ibu');
		$no_hp_ibu = $this->input->post('no_hp_ibu');
		$alamat_ibu = $this->input->post('alamat_ibu');
		$nik_wali = $this->input->post('nik_wali');
		$nama_wali = $this->input->post('nama_wali');
        $pendidikan_wali = $this->input->post('pendidikan_wali');
        $pekerjaan_wali = $this->input->post('pekerjaan_wali');
        $penghasilan_wali = $this->input->post('penghasilan_wali');
		$no_hp_wali = $this->input->post('no_hp_wali');
		$alamat_wali = $this->input->post('alamat_wali');
		$status_kps = $this->input->post('status_kps');
        $no_kps = $this->input->post('no_kps');
        $status_kip = $this->input->post('status_kip');
		$no_kip = $this->input->post('no_kip');
		$jenis_tinggal = $this->input->post('jenis_tinggal');
		$berkebutuhan_khusus = $this->input->post('berkebutuhan_khusus');
		$sekolah_asal = $this->input->post('sekolah_asal');
        $anak_ke = $this->input->post('anak_ke');
        $jumlah_saudara = $this->input->post('jumlah_saudara');
        $transportasi = $this->input->post('transportasi');
		$jarak_rumah = $this->input->post('jarak_rumah');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$encrypt = md5(md5($password));
		$data=$this->Pendaftaran_model->addData($no_akta,$nik,$nama,$jk,$tempat_lahir,$tanggal_lahir,$agama,$tgl_daftar,$alamat,$status,$provinsi,$kota_kabupaten,$kecamatan,$desa_kelurahan,$rt,$rw,$kode_pos,$nik_ayah,$nama_ayah,$pendidikan_ayah,$pekerjaan_ayah,$penghasilan_ayah,$no_hp_ayah,$alamat_ayah,$nik_ibu,$nama_ibu,$pendidikan_ibu,$pekerjaan_ibu,$penghasilan_ibu,$no_hp_ibu,$alamat_ibu,$nik_wali,$nama_wali,$pendidikan_wali,$pekerjaan_wali,$penghasilan_wali,$no_hp_wali,$alamat_wali,$status_kps,$no_kps,$status_kip,$no_kip,$jenis_tinggal,$berkebutuhan_khusus,$sekolah_asal,$anak_ke,$jumlah_saudara,$transportasi,$jarak_rumah,$username,$encrypt);
		echo json_encode($data);

	}
}
