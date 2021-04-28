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

        public function addKegiatan()
        {
            $post = $this->input->post();
            $this->id = '0';
            $this->judul = $post['judul'];
            $this->deskripsi = $post['deskripsi'];
            $this->gambar = $post['gambar'];
            $this->tgl_kegiatan = $post['tgl_kegiatan'];

            return $this->db->insert($this->_table, $this);
        }

        public function editKegiatan($url)
        {
            $post = $this->input->post();
            $this->id = $post['id']; 
            $this->judul = $post['judul'];
            $this->deskripsi = $post['deskripsi'];
            $this->gambar = $url;
            $this->tgl_kegiatan = $post['tgl_kegiatan'];

            $this->db->update($this->_table, $this, array('id' => $this->id));
            return $this->db->affected_rows();
            
        }

        public function editDeskripsiKegiatan()
        {
            $post = $this->input->post();
            $id = $post['id'];
            $data = array(
                'judul' => $post['judul'],
                'tgl_kegiatan' => date('Y-m-d', strtotime($post['tgl'])),
                'deskripsi' => $post['deskripsi']
            );

            $this->db->update($this->_table, $data, array('id' => $id));
            return $this->db->affected_rows();
        }

        public function deleteKegiatan()
        {
            $id = $this->input->post('id');
            $query = $this->db->get_where($this->_table, array('id' => $this->id));
            foreach ($query->result() as $image) {
                if(file_exists($image->gambar)){
                    unlink($image->gambar);
                }
            }
            return $this->db->delete($this->_table, array('id' => $id));
        }
    }

?>