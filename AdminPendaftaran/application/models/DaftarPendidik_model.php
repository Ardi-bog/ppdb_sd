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

            return $this->db->insert($this->_table, $this);
        }

        public function editPendidik($url)
        {
            $post = $this->input->post();
            $this->id = $post['id']; 
            // $this->nip = $post['nip'];
            $this->nama_gelar = $post['nama_gelar'];
            // $this->jk = $post['jk'];
            $this->mapel = $post['mapel'];
            $this->gambar = $url;

            $this->db->update($this->_table, $this, array('id' => $this->id));
            return $this->db->affected_rows();
        }

        public function editDeskripsiPendidik()
        {
            $post = $this->input->post();
            $id = $post['id'];
            $data = array(
                'nama_gelar' => $post['nama_gelar'],
                'mapel' => $post['mapel'],
            );

            $this->db->update($this->_table, $data, array('id' => $id));
            return $this->db->affected_rows();
        }

        public function deletePendidik()
        {
            $post = $this->input->post();
            $this->id = $post['id']; 
            $query = $this->db->get_where($this->_table, array('id' => $this->id));
            foreach ($query->result() as $image) {
                if($image->gambar != './assets/img/no_images.png' && $image->gambar != './assets/img/gambar/no_images.png'){
                    if(file_exists($image->gambar)){
                        unlink($image->gambar);
                    }
                }
            }
            return $this->db->delete($this->_table, array('id' => $this->id));
        }        
    }
?>