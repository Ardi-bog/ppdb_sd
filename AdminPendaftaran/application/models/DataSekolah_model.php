<?php defined('BASEPATH') OR exit ('No direct script access allowed');

    class DataSekolah_model extends CI_Model
    {
        
        private $_table = "data_sekolah";

        public $id;
        public $nama_sekolah;
        public $logo_sekolah;
        public $deskripsi;
        public $no_telp;
        public $email;
        public $alamat;
        public $jumlah_siswa;
        public $tujuan;
        public $visi;
        public $misi;
        public $google_maps;
        public $deskripsi_fasilitas;
        public $deskripsi_pendidik;
        public $deskripsi_jumlahsiswa;

        public function selectAll()
        {
            return $this->db->get($this->_table);
        }

        public function editDataSekolah()
        {
            $post = $this->input->post();
            $data = array(
                'nama_sekolah' => $post['nama_sekolah'],
                'deskripsi' => $post['deskripsi'],
                'email' => $post['email'],
                'no_telp' => $post['no_telp'],
                'alamat' => $post['alamat'],
                'tujuan' => $post['tujuan'],
                'visi' => $post['visi'],
                'misi' => $post['misi'],
                'jumlah_siswa' => $post['jumlah_siswa'],
                'deskripsi_jumlahsiswa' => $post['deskripsi_jumlahsiswa'],
                'google_maps' => $post['google_maps']
            );

            $this->db->update($this->_table, $data);
            return $this->db->affected_rows();
            
        }
        
        public function editLogoSekolah($url)
        {
            $post = $this->input->post();
            $this->nama_sekolah = $post['nama_sekolah'];
			$this->deskripsi = $post['deskripsi'];
			$this->email = $post['email'];
			$this->no_telp = $post['no_telp'];
			$this->alamat = $post['alamat'];
			$this->tujuan = $post['tujuan'];
			$this->visi = $post['visi'];
			$this->misi = $post['misi'];
			$this->jumlah_siswa = $post['jumlah_siswa'];
			$this->google_maps = $post['google_maps'];
            $this->logo_sekolah = $url;
			
            $this->db->update($this->_table, $this);
            return $this->db->affected_rows();
        }

        public function editDeskripsiFasilitas()
        {
            $this->deskripsi_fasilitas = $this->input->post('desc_fasilitas');
            return $this->db->update($this->_table, array('deskripsi_fasilitas' => $this->deskripsi_fasilitas));
        }

        public function editDeskripsiPendidik()
        {
            $this->deskripsi_fasilitas = $this->input->post('desc_pendidik');
            return $this->db->update($this->_table, array('deskripsi_pendidik' => $this->deskripsi_fasilitas));
        }

    }
    

?>