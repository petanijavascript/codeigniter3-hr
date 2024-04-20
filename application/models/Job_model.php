<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Job_model extends CI_Model
{
    public function getAllJob()
    {
        return $this->db->get('job')->result_array();
    }

    public function tambahDataJob()
    {
        $data = [
            "name" => $this->input->post('name', true)
        ];

        $this->db->insert('job', $data);
    }

    public function getJobById($id)
    {
        return $this->db->get_where('job', ['id' => $id])->row_array();
    }

    public function hapusDataJob($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('job');
    }

    public function ubahDataJob()
    {
        $data = [
            "name" => $this->input->post('name', true)
        ];

        $this->db->where('id', $this->input->post('id', true));
        $this->db->update('job', $data);
    }
}
