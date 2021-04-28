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
        public $jumlah_siswa;
        public $deskripsi_fasilitas;
        public $deskripsi_jumlahsiswa;
        public $deskripsi_pendidik;

        public function selectAll()
        {
            return $this->db->get($this->_table);
        }

        public function get_date(){
            $sql = "SELECT count(id_pendaftaran) as total FROM pendaftaran";
            $result = $this->db->query($sql);
            return $result->row()->total;
        }

    }
    

?>