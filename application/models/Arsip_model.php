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

    public function getById($id)
    {
        $query = "SELECT *
        FROM `arsip`
        WHERE `id` = $id
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
        $config['upload_path'] = 'assets/uploads/';
        $config['allowed_types'] = 'pdf';
        $config['file_name'] = $_FILES['upload']['name'];
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

    public function download($id)
    {
        $query = $this->db->get_where('arsip', array('id' => $id));
        return $query->row_array();
    }

    public function delete_arsip($id)
    {
        return $this->db->delete('arsip', array('id' => $id));
    }

    public function get_keyword($keyword)
    {
        $this->db->select('*');
        $this->db->from('arsip');
        $this->db->like('no_surat', $keyword);
        $this->db->or_like('judul', $keyword);
        $this->db->or_like('kategori', $keyword);
        $this->db->or_like('file_surat', $keyword);

        return $this->db->get()->result_array();
    }
}

/* End of file Arsip_model.php */
