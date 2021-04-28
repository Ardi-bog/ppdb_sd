<?php defined('BASEPATH') OR exit ('No direct script access allowed');

    class DataSekolah_model extends CI_Model
    {
        
        private $_table = "data_sekolah";

        public $id;
        public $nama_sekolah;
        public $deskripsi;
        public $no_telp;
        public $email;
        public $alamat;
        public $tujuan;
        public $visi;
        public $misi;

        public function selectAll()
        {
            return $this->db->get($this->_table);
        }

    }
    

?>