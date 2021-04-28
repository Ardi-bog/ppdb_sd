<?php defined('BASEPATH') OR exit ('No direct script access allowed');

    class Fasilitas_model extends CI_Model
    {
        private $_table = "fasilitas";

        public $id;
        public $fasilitas;
        public $deskripsi;

        public function selectAll()
        {
            return $this->db->get($this->_table);
        }
        
    }
    

?>