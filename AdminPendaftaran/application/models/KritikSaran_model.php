<?php defined('BASEPATH') OR exit('No direct script access allowed');

    class KritikSaran_model extends CI_Model 
    {
        
        private $_table = "kritik_saran";

        public $id;
        public $email;
        public $kritik_saran;
        public $tgl_buat;

        public function selectAllPagination($limit, $offset)
        {
            $this->db->select('*');
            $this->db->from($this->_table);
            $this->db->order_by('id', 'ASC');
            $this->db->limit($limit, $offset);

            return $this->db->get();
        }

        public function selectAll()
        {
            return $this->db->get($this->_table);
        }

        public function searchKritikSaran($email)
        {
            $this->db->select('*');
            $this->db->from($this->_table);
            $this->db->like('email', $email);

            return $this->db->get();
        }

    }
    

?>