<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class JumlahPendaftar extends CI_Controller
{
    function index(){
        $data['count'] = $this->Dashboard_model->get_count();
        $data['countdate'] = $this->Dashboard_model->get_date();
        $this->load->view('index',$data);
    }

}