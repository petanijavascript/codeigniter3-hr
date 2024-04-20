<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employee_model extends CI_Model
{
    public function getAllEmployee()
    {
        $this->db->from('employee');
        $this->db->order_by('employee.nip ASC');
        return $this->db->get()->result_array();
    }

    public function tambahDataEmployee()
    {
        $data = [
            "nip" => $this->input->post('nip', true),
            "name" => $this->input->post('name', true),
            "gender" => $this->input->post('gender', true),
            "join_date" => $this->input->post('join_date', true),
            "is_active" => $this->input->post('is_active', true)
        ];

        $this->db->insert('employee', $data);
    }

    public function hapusDataEmployee($id)
    {
        $this->db->delete('employee', ['id' => $id]);
    }

    public function getEmployeeById($id)
    {
        return $this->db->get_where('employee', ['nip' => $id])->row_array();
    }

    public function ubahDataEmployee()
    {
        $data = [
            "name" => $this->input->post('name', true),
            "gender" => $this->input->post('gender', true),
            "join_date" => $this->input->post('join_date', true),
            "is_active" => $this->input->post('is_active', true)
        ];

        $this->db->where('nip', $this->input->post('nip', true));
        $this->db->update('employee', $data);
    }

    public function getDetailEmployeeById($id)
    {
        if ($this->db->get_where('job_history', ['nip' => $id, 'is_main' => 1])->row_array() != null) {
            $this->db->select('employee.nip, employee.name AS nama, employee.gender, employee.join_date, employee.is_active, job.name AS jabatan, job_history.active_date');
            $this->db->from('employee');
            $this->db->join('job_history', 'job_history.nip = employee.nip', 'left');
            $this->db->join('job', 'job.id = job_history.job_id', 'left');
            $this->db->where('employee.nip', $id);
            $this->db->where('job_history.is_main', 1);
            $this->db->order_by('job_history.is_main DESC', 'job_history.active_date DESC');
            return $this->db->get()->row_array();
        } else {
            $this->db->select('employee.nip, employee.name AS nama, employee.gender, employee.join_date, employee.is_active, concat("kosong") AS jabatan');
            $this->db->from('employee');
            $this->db->where('employee.nip', $id);
            return $this->db->get()->row_array();
        }
    }
}
