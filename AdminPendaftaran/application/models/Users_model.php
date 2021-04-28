<?php defined('BASEPATH') OR exit('No direct script access allowed');

    class Users_model extends CI_Model 
    {
        function __construct()  
        {  
            parent::__construct();  
            $this->load->database();  
        }  
        
        function cek_login($table,$where){		
            return $this->db->get_where($table,$where);
        }
    }
?>