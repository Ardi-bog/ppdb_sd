<?php defined('BASEPATH') OR exit ('No direct script access allowed');

    class GambarSekolah_model extends CI_Model
    {
        private $_table = "gambar_sekolah";

        public $id;
        public $url;

        public function selectAll()
        {
            $this->db->select('url');
            $this->db->from($this->_table);
            $this->db->where('id != 0');
            $this->db->order_by('id', 'asc');
            return $this->db->get();
        }
        

        public function addGambarSekolah($url)
        {
            $this->id = '0';
            $this->url = $url;

            return $this->db->insert($this->_table, $this);
        }

        public function editGambarSekolah($url)
        {
            $this->id = $this->input->post('id');
            $this->url = $url;

            $this->db->update($this->_table, $this, array('id' => $this->id));
            return $this->db->affected_rows();
        }

        public function deleteGambarSekolah()
        {
            $this->id = $this->input->post('id');
            return $this->db->delete($this->_table, array('id' => $this->id));
        }
    }
    

?>

