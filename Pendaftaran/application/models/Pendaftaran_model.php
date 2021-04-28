<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran_model extends CI_Model
{
    function addData($no_akta,$nik,$nama,$jk,$tempat_lahir,$tanggal_lahir,$agama,$tgl_daftar,$alamat,$status,$provinsi,$kota_kabupaten,$kecamatan,$desa_kelurahan,$rt,$rw,$kode_pos,$nik_ayah,$nama_ayah,$pendidikan_ayah,$pekerjaan_ayah,$penghasilan_ayah,$no_hp_ayah,$alamat_ayah,$nik_ibu,$nama_ibu,$pendidikan_ibu,$pekerjaan_ibu,$penghasilan_ibu,$no_hp_ibu,$alamat_ibu,$nik_wali,$nama_wali,$pendidikan_wali,$pekerjaan_wali,$penghasilan_wali,$no_hp_wali,$alamat_wali,$status_kps,$no_kps,$status_kip,$no_kip,$jenis_tinggal,$berkebutuhan_khusus,$sekolah_asal,$anak_ke,$jumlah_saudara,$transportasi,$jarak_rumah,$username,$password){
		$hasil=$this->db->query("INSERT INTO pendaftaran VALUES('','$no_akta','$nik','$nama','$jk','$tempat_lahir','$tanggal_lahir','$agama','$tgl_daftar','$alamat','$status','$provinsi','$kota_kabupaten','$kecamatan','$desa_kelurahan','$rt','$rw','$kode_pos','$nik_ayah','$nama_ayah','$pendidikan_ayah','$pekerjaan_ayah','$penghasilan_ayah','$no_hp_ayah','$alamat_ayah','$nik_ibu','$nama_ibu','$pendidikan_ibu','$pekerjaan_ibu','$penghasilan_ibu','$no_hp_ibu','$alamat_ibu','$nik_wali','$nama_wali','$pendidikan_wali','$pekerjaan_wali','$penghasilan_wali','$no_hp_wali','$alamat_wali','$status_kps','$no_kps','$status_kip','$no_kip','$jenis_tinggal','$berkebutuhan_khusus','$sekolah_asal','$anak_ke','$jumlah_saudara','$transportasi','$jarak_rumah','$username','$password')");
		return $hasil;
	}
}