<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Arsip extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->helper('url', 'form', 'download');
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
                $uploadData = $this->upload->data();
                $filename = $uploadData['file_name'];
                $this->arsip_model->tambahData($upload);
                $this->session->set_flashdata('pesan', '<div class="alert alert-success">Surat berhasil diarsipkan!</div>');
                redirect('arsip');
            } else {
                echo $upload['error'];
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger">Surat gagal diarsipkan!</div>');
            }
        }
    }

    public function download($id)
    {
        $this->load->helper('download');
        $fileinfo = $this->arsip_model->download($id);
        $file = 'assets/uploads/' . $fileinfo['file_surat'];
        force_download($file, NULL);
    }

    public function delete_arsip($id)
    {
        $this->load->model('arsip_model', 'arsip');
        $this->arsip->delete_arsip($id);
        // untuk flashdata mempunyai 2 parameter (nama flashdata/alias, isi dari flashdatanya)
        $this->session->set_flashdata('pesan', '<div class="alert alert-warning" role="alert">Arsip berhasil dihapus!</div>');
        redirect('arsip', 'refresh');
    }

    public function search_surat()
    {
        $data['title'] = 'Arsip';

        $keyword = $this->input->post('keyword');
        $this->load->model('arsip_model', 'arsip');
        $data['arsip'] = $this->arsip->get_keyword($keyword);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('arsip/index', $data);
        $this->load->view('templates/footer');
    }
}
    

/* End of file Arsip.php */
