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

        public function editInfoPendaftaran()
        {
            $post = $this->input->post();
            $this->id = $post['id']; 
            $this->info = $post['info'];
            $this->persyaratan_pendaftaran = $post['persyaratan_pendaftaran'];
            $this->tata_cara_pendaftaran = $post['tata_cara_pendaftaran'];

            $this->db->update($this->_table, $this, array('id' => $this->id));
            return $this->db->affected_rows();
        }
    }
    

?>