<?php defined('BASEPATH') OR exit('No direct script access allowed');

    class KritikSaran_model extends CI_Model 
    {
        
        private $_table = "kritik_saran";

        public $id;
        public $email;
        public $kritik_saran;
        public $tgl_buat;

        public function add()
        {
            $post = $this->input->post();
            $this->id = '0';
            $this->email = $post['email'];
            $this->kritik_saran = $post['kritik_saran'];
            $this->tgl_buat = date("Y-m-d");
            $this->db->insert($this->_table, $this);
        }

        public function selectAll($limit)
        {
            $this->db->select('*');
            $this->db->from('kritik_saran');
            $this->db->order_by('tgl_buat', 'DESC');
            $this->db->limit($limit);

            return $this->db->get();
        }

    }
    

?>