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

        public function addPrestasi()
        {
            $post = $this->input->post();
            $this->id = '0';
            $this->nama = $post['nama'];
            $this->tgl = $post['tgl'];
            $this->deskripsi = $post['deskripsi'];
            $this->gambar = $post['gambar'];

            return $this->db->insert($this->_table, $this);
        }

        public function editPrestasi($url)
        {
            $post = $this->input->post();
            $this->id = $post['id'];
            $this->nama = $post['nama'];
            $this->tgl = date('Y-m-d', strtotime($post['tgl']));
            $this->deskripsi = $post['deskripsi'];
            $this->gambar = $url;

            $this->db->update($this->_table, $this, array('id' => $this->id));
            return $this->db->affected_rows();
        }

        public function deletePrestasi()
        {
            $id = $this->input->post('id');
            return $this->db->delete($this->_table, array('id' => $id));
        }

        public function editDeskripsiPrestasi()
        {
            $post = $this->input->post();
            $id = $post['id'];
            $data = array(
                'nama' => $post['nama'],
                'tgl' => date('Y-m-d', strtotime($post['tgl'])),
                'deskripsi' => $post['deskripsi']
            );

            $this->db->update($this->_table, $data, array('id' => $id));
            return $this->db->affected_rows();
        }
        
    }
    

?>