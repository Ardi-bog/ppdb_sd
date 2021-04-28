<?php defined('BASEPATH') OR exit('No direct script access allowed');

    class Prestasi_model extends CI_Model
    {

        private $_table = "prestasi";

        public $id;
        public $nama;
        public $tgl;
        public $deskripsi;
        public $gambar;

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

        public function addPrestasi()
        {
            $post = $this->input->post();
            $this->id = '0';
            $this->nama = $post['nama'];
            $this->tgl = $post['tgl'];
            $this->deskripsi = $post['deskripsi'];
            $this->gambar = $post['gambar'];

            $this->db->insert($this->_table, $this);
        }

        public function editPrestasi()
        {
            $post = $this->input->post();
            $this->id = $post['id'];
            $this->nama = $post['nama'];
            $this->tgl = $post['tgl'];
            $this->deskripsi = $post['deskripsi'];
            $this->gambar = $post['gambar'];

            $this->db->update($this->_table, $this, array('id' => $this->id));
        }

        public function deletePrestasi()
        {
            $id = $this->input->post('id');
            return $this->db->delete($this->_table, array('id' => $id));
        }
        
    }
    

?>