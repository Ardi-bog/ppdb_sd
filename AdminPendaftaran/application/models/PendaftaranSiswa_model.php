<?php defined('BASEPATH') OR exit ('No direct script access allowed');

    class PendaftaranSiswa_model extends CI_Model
    {
        
        private $_table = "pendaftaran";

        public $id_pendaftaran;
        public $nama;
        public $tempat_lahir;
        public $tanggal_lahir;
        public $jk;
        public $nama_orang_tua;
        public $sekolah_asal;
        public $alamat;
        public $agama;
        public $no_akta;
        public $nik;
        public $id_user;
        public $status;
        public $tgl_daftar;
        public $provinsi;
        public $kota_kabupaten;
        public $kecamatan;
        public $desa_kelurahan; 
        public $rt;
        public $rw;
        public $kode_pos;

        public $nik_ayah;
        public $nama_ayah;
        public $pendidikan_ayah;
        public $pekerjaan_ayah;
        public $penghasilan_ayah;
        public $no_hp_ayah;
        public $alamat_ayah;

        public $nik_ibu;
        public $nama_ibu;
        public $pendidikan_ibu;
        public $pekerjaan_ibu;
        public $penghasilan_ibu;
        public $no_hp_ibu;
        public $alamat_ibu;

        public $nik_wali;
        public $nama_wali;
        public $pendidikan_wali;
        public $pekerjaan_wali;
        public $penghasilan_wali;
        public $no_hp_wali;
        public $alamat_wali;

        public $status_kps;
        public $no_kps;

        public $status_kip;
        public $no_kip;

        public $jenis_tinggal;
        public $berkebutuhan_khusus;
        public $anak_ke;
        public $jumlah_saudara;
        public $transportasi;
        public $jarak_rumah;

        public function selectAll()
        {
            return $this->db->get($this->_table);
        }

        public function selectAllPagination($limit, $offset)
        {
            $this->db->select('*');
            $this->db->from($this->_table);
            $this->db->order_by('id_pendaftaran', 'ASC');
            $this->db->limit($limit, $offset);

            return $this->db->get();
        }

        public function selectSiswaTerdaftar()
        {
            $this->db->select('*');
            $this->db->from($this->_table);
            $this->db->where('status', 'DITERIMA');

            return $this->db->get();
        }

        public function selectSiswaTidakTerdaftar()
        {
            $this->db->select('*');
            $this->db->from($this->_table);
            $this->db->where('status', 'PENDING');

            return $this->db->get();
        }

        public function selectById($id)
        {
            return $this->db->get_where($this->_table, ["id_pendaftaran" => $id]);
        }

        public function searchSiswa($keyword)
        {
            $this->db->select('*');
            $this->db->from($this->_table);
            $this->db->like('nama', $keyword);
            $this->db->or_like('alamat', $keyword);
            return $this->db->get();
        }

        public function updateStatusPendaftar($id, $fields)
        {
            $this->db->update($this->_table, $fields, array('id_pendaftaran' => $id));

            if ($this->db->affected_rows() > 0) {
                return true;
            } else {
                return false;
            }
            
        }

        public function selectTahun()
        {
            return $this->db->query("SELECT DISTINCT(DATE_FORMAT(pendaftaran.tgl_daftar,'%Y')) as tgl_daftar FROM pendaftaran");
        }

    }
    

?>