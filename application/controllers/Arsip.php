<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Arsip extends CI_Controller
{

    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('arsip/dashboard');
        $this->load->view('templates/footer');
    }
}

/* End of file Arsip.php */
