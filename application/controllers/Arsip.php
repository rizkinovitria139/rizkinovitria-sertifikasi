d<?php

    defined('BASEPATH') or exit('No direct script access allowed');

    class Arsip extends CI_Controller
    {

        public function __construct()
        {
            parent::__construct();
            //Do your magic here
            $this->load->helper('url', 'form');
            $this->load->library('form_validation');
            $this->load->model('arsip_model');
        }

        public function index()
        {
            $data['title'] = 'Arsip';

            $this->load->model('Arsip_model', 'arsip');
            $data['arsip'] = $this->arsip->getAll();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('arsip/index', $data);
            $this->load->view('templates/footer');
        }

        public function tambah()
        {
            $data['title'] = 'Tambah Data';

            $this->form_validation->set_rules('no_surat', 'Nomor Surat', 'required');
            $this->form_validation->set_rules('kategori', 'Kategori', 'required');
            $this->form_validation->set_rules('judul', 'Judul', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar');
                $this->load->view('arsip/tambah');
                $this->load->view('templates/footer');
            } else {
                $upload = $this->arsip_model->upload();
                if ($upload['result'] == 'success') {
                    $this->arsip_model->tambahData($upload);
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success">Surat berhasil diarsipkan!</div>');
                    redirect('arsip');
                } else {
                    echo $upload['error'];
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger">Surat gagal diarsipkan!</div>');
                }
            }
        }
    }
    

/* End of file Arsip.php */
