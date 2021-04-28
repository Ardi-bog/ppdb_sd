<?php defined('BASEPATH') OR exit ('No direct script access allowed');

    class GambarSekolah_model extends CI_Model
    {
        private $_table = "gambar_sekolah";

        public $id;
        public $url;

        public function selectAll()
        {
            $this->db->order_by('id', 'desc');
            return $this->db->get($this->_table);
        }

        public function addGambarSekolah($url)
        {
            $this->id = '0';
            $this->url = $url;

            return $this->db->insert($this->_table, $this);
        }

        public function editGambarSekolah($url)
        {
            $id = $this->input->post('id');
            $data = array(
                'url' => $url
            );

            $this->db->update($this->_table, $data, array('id' => $id));
            return $this->db->affected_rows();
        }

        public function deleteGambarSekolah()
        {
            $this->id = $this->input->post('id');
            $query = $this->db->get_where($this->_table, array('id' => $this->id));
            foreach ($query->result() as $image) {
                if($image->url != './assets/img/no_images.png' && $image->url != './assets/img/gambar/no_images.png'){
                    if(file_exists($image->url)){
                        unlink($image->url);
                    }   
                }
            }

            return $this->db->delete($this->_table, array('id' => $this->id));
        }
    }
    

?>

