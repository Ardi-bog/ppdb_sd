<?php defined('BASEPATH') OR exit ('No direct script access allowed');

    class Ekstrakurikuler_model extends CI_Model
    {

        private $_table = "ekstrakurikuler";

        public $id;
        public $judul;
        public $deskripsi;
        public $gambar;
        public $tgl_eskul;

        public function selectAll()
        {
            return $this->db->get($this->_table);
        }

        public function addEskul()
        {
            $post = $this->input->post();
            $this->id = '0';
            $this->judul = $post['judul'];
            $this->deskripsi = $post['deskripsi'];
            $this->gambar = $post['gambar'];
            $this->tgl_eskul = $post['tgl_eskul'];

            return $this->db->insert($this->_table, $this);
        }

        public function editDeskripsiEskul()
        {
            $post = $this->input->post();
            $id = $post['id'];
            $data = array(
                'judul' => $post['judul'],
                'tgl_eskul' => date('Y-m-d', strtotime($post['tgl_eskul'])),
                'deskripsi' => $post['deskripsi']
            );

            $this->db->update($this->_table, $data, array('id' => $id));
            return $this->db->affected_rows();
        }

        public function editEskul($url)
        {
            $post = $this->input->post();
            $this->id = $post['id']; 
            $this->judul = $post['judul'];
            $this->deskripsi = $post['deskripsi'];
            $this->gambar = $url;
            $this->tgl_eskul= $this->input->post('tgl_eskul');

            $this->db->update($this->_table, $this, array('id' => $this->id));
            return $this->db->affected_rows();
        }

        public function deleteEskul()
        {
            $id = $this->input->post('id');
            $query = $this->db->get_where($this->_table, array('id' => $this->id));
            foreach ($query->result() as $image) {
                if($image->gambar != './assets/img/no_images.png' && $image->gambar != './assets/img/gambar/no_images.png'){
                    if(file_exists($image->gambar)){
                        unlink($image->gambar);
                    }
                }
            }
            return $this->db->delete($this->_table, array('id' => $id));
        }
    }
    

?>