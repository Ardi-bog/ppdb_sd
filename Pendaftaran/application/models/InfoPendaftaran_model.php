<?php defined('BASEPATH') OR exit ('No direct script access allowed');

    class InfoPendaftaran_model extends CI_Model
    {
        
        private $_table = "info_pendaftaran";

        public $id;
        public $info;
        public $tata_cara_pendaftaran;
        public $persyaratan_pendaftaran;

        public function selectAll()
        {
            return $this->db->get($this->_table);
        }

    }
    

?>