<?php defined('BASEPATH') OR exit ('No direct script access allowed');

    class PendaftaranSiswa_model extends CI_Model
    {
        
        private $_table = "pendaftaran";

        public $id_pendaftaran;
        public $nama;
        public $tanggal_lahir;
        public $jk;
        public $nama_orang_tua;
        public $asal_sekolah;
        public $alamat;
        public $agama;
        public $no_akta;
        public $no_kk_nik;
        public $id_user;
        public $status;
        public $tgl_daftar;

        public function selectAll()
        {
            return $this->db->get($this->_table);
        }

        public function selectAllPagination($limit, $offset)
        {
            $this->db->select('*');
            $this->db->from($this->_table);
            $this->db->limit($limit, $offset);

            return $this->db->get();
        }

        public function searchSiswa($keyword)
        {
            $this->db->select('*');
            $this->db->from($this->_table);
            $this->db->like('nama', $keyword);
            $this->db->or_like('alamat', $keyword);
            return $this->db->get();
        }

    }
    

?>