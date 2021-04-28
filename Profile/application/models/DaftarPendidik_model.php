<?php defined('BASEPATH') OR exit ('No direct script access allowed');

    class DaftarPendidik_model extends CI_Model
    {
        private $_table = "daftar_pendidik";

        public $id;
        public $nip;
        public $nama_gelar;
        public $jk;
        public $mapel;
        public $gambar;

        public function selectAll()
        {
            return $this->db->get($this->_table);
        }

        public function addPendidik()
        {
            $post = $this->input->post();
            $this->id = '0';
            $this->nip = $post['nip'];
            $this->nama_gelar = $post['nama_gelar'];
            $this->jk = $post['jk'];
            $this->mapel = $post['mapel'];
            $this->gambar = $post['gambar'];

            $this->db->insert($this->_table, $this);
        }

        public function editPendidik()
        {
            $post = $this->input->post();
            $this->id = $post['id']; 
            $this->nip = $post['nip'];
            $this->nama_gelar = $post['nama_gelar'];
            $this->jk = $post['jk'];
            $this->mapel = $post['mapel'];
            $this->gambar = $post['gambar'];

            $this->db->update($this->_table, $this, array('id' => $this->id));
        }

        public function deletePendidik()
        {
            return $this->db->delete($this->_table, array('id' => $id));
        }        
    }
    

?>