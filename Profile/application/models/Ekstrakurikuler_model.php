<?php defined('BASEPATH') OR exit ('No direct script access allowed');

    class Ekstrakurikuler_model extends CI_Model
    {

        private $_table = "ekstrakurikuler";

        public $id;
        public $judul;
        public $deskripsi;
        public $gambar;
        public $tgl_ekstrakurikuler;

        public function selectAll()
        {
            return $this->db->get($this->_table);
        }

        public function selectLimit3()
        {
            $this->db->select('*');
            $this->db->from($this->_table);
            $this->db->limit(3);

            return $this->db->get();
        }

        public function addEskul()
        {
            $post = $this->input->post();
            $this->id = '0';
            $this->judul = $post['judul'];
            $this->deskripsi = $post['deskripsi'];
            $this->gambar = $post['gambar'];
            $this->tgl_ekstrakurikuler = $post['tgl_ekstrakurikuler'];

            $this->db->insert($this->_table, $this);
        }

        public function editEskul()
        {
            $post = $this->input->post();
            $this->id = $this->input->post('id'); 
            $this->judul = $this->input->post('judul');
            $this->deskripsi = $this->input->post('deskripsi');
            $this->gambar = $this->input->post('gambar');
            $this->tgl_ekstrakurikuler = $this->input->post('tgl_ekstrakurikuler');

            $this->db->update($this->_table, $this, array('id' => $this->id));
        }

        public function deleteEskul()
        {
            $id = $this->input->post('id');
            return $this->db->delete($this->_table, array('id' => $id));
        }
    }
    

?>