<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Arsip extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }

    public function index()
    {
        $data['title'] = 'Arsip';

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('arsip/index');
        $this->load->view('templates/footer');
    }

    public function show()
    {
        $data['title'] = 'Arsip';

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('arsip/index');
        $this->load->view('templates/footer');
    }
}

/* End of file Arsip.php */
