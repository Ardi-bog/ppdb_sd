<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
    public function get_count(){
        $sql = "SELECT count(id_pendaftaran) as total FROM pendaftaran";
        $result = $this->db->query($sql);
        return $result->row()->id_pendaftaran;
    }

    public function get_date(){
        $date = date("Y-m-d");
        $sql = "SELECT count(id_pendaftaran) as total FROM pendaftaran WHERE tgl_daftar = '$date'";
        $result = $this->db->query($sql);
        return $result->row()->total;
    }
}