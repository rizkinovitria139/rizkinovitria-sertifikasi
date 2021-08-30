<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Arsip_model extends CI_Model
{
    public function getAll()
    {
        $query = "SELECT *
        FROM `arsip`
        ORDER BY `id`";
        return $this->db->query($query)->result_array();
    }

    public function tambahData($upload)
    {
        $data = array(
            'no_surat' => $this->input->post('no_surat', true),
            'kategori' => $this->input->post('kategori', true),
            'judul' => $this->input->post('judul', true),
            'file_surat' => $upload['file']['file_name'],
        );
        $this->db->insert('arsip', $data);
    }

    public function upload()
    {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'pdf';
        $this->load->library('upload');
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file_surat')) {
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $return;
        } else {
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
            return $return;
        }
    }
}

/* End of file Arsip_model.php */
