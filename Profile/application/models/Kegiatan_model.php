<?php defined('BASEPATH') OR exit('No direct script access allowed');

    class Kegiatan_model extends CI_Model
    {
        private $_table = "kegiatan";

        public $id;
        public $judul;
        public $deskripsi;
        public $gambar;
        public $tgl_kegiatan;

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

        public function addKegiatan()
        {
            $post = $this->input->post();
            $this->id = '0';
            $this->judul = $post['judul'];
            $this->deskripsi = $post['deskripsi'];
            $this->gambar = $post['gambar'];
            $this->tgl_kegiatan = $post['tgl_kegiatan'];

            $this->db->insert($this->_table, $this);
        }

        public function editKegiatan()
        {
            $post = $this->input->post();
            $this->id = $post['id']; 
            $this->judul = $post['judul'];
            $this->deskripsi = $post['deskripsi'];
            $this->gambar = $post['gambar'];
            $this->tgl_kegiatan = $post['tgl_kegiatan'];

            $this->db->update($this->_table, $this, array('id' => $this->id));
        }

        public function deleteKegiatan()
        {
            $id = $this->input->post('id');
            return $this->db->delete($this->_table, array('id' => $id));
        }
    }

?>