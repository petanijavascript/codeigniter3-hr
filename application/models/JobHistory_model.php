<?php
defined('BASEPATH') or exit('No direct script access allowed');

class JobHistory_model extends CI_Model
{
    public function getAllJobHistory()
    {
        return $this->db->get('job_history')->result_array();
    }

    public function tambahDataJobHistory()
    {
        $data = [
            "active_date" => $this->input->post('active_date', true),
            "nip" => $this->input->post('nip', true),
            "job_id" => $this->input->post('job_id', true),
            "is_main" => $this->input->post('is_main', true)
        ];

        $this->db->insert('job_history', $data);
    }

    public function hapusDataJobHistory($id)
    {
        $this->db->delete('job_history', ['id' => $id]);
    }

    public function getJobHistoryByNip($id)
    {
        $this->db->select('job_history.id AS jobid, job_history.active_date, job_history.nip, job_history.job_id, job_history.is_main, job.name');
        $this->db->from('job_history');
        $this->db->join('job', 'job.id = job_history.job_id', 'left');
        $this->db->where('job_history.nip', $id);
        return $this->db->get()->result_array();
    }

    public function ubahDataJobHistory()
    {
        $data = [
            "active_date" => $this->input->post('active_date', true),
            "job_id" => $this->input->post('job_id', true),
            "is_main" => $this->input->post('is_main', true)
        ];

        $this->db->where('id', $this->input->post('jobid', true));
        $this->db->update('job_history', $data);
    }

    public function getJobHistoryById($id)
    {
        $this->db->select('job_history.id AS jobid, job_history.active_date, job_history.nip, job_history.job_id, job_history.is_main, job.name');
        $this->db->from('job_history');
        $this->db->join('job', 'job.id = job_history.job_id', 'left');
        $this->db->where('job_history.id', $id);
        return $this->db->get()->row_array();
    }
}
