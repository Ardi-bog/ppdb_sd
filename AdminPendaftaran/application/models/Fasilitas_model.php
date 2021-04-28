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

        public function addFasilitas()
        {
            $post = $this->input->post();
            $this->id = '0';
            $this->fasilitas = $post['fasilitas'];
            $this->deskripsi = $post['deskripsi'];

            return $this->db->insert($this->_table, $this);
        }

        public function editFasilitas()
        {
            $post = $this->input->post();
            $this->id = $post['id'];
            $this->fasilitas = $post['fasilitas'];
            $this->deskripsi = $post['deskripsi'];

            $this->db->update($this->_table, $this, array('id' => $this->id));
            return $this->db->affected_rows();
        }

        public function deleteFasilitas()
        {
            $this->id = $this->input->post('id');
            return $this->db->delete($this->_table, array('id' => $this->id));
        }
    }
    

?>