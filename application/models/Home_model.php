<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home_model extends CI_Model
{
    public function getAllEmployeeSummary()
    {
        $this->db->select('employee.nip, employee.name AS nama, employee.gender, employee.join_date, employee.is_active, IFNULL(job.name, CONCAT("kosong")) AS jabatan, IFNULL(job_history.active_date, CONCAT("kosong")) AS active_date');
        $this->db->from('employee');
        $this->db->join('job_history', 'job_history.nip = employee.nip', 'left');
        $this->db->join('job', 'job.id = job_history.job_id');
        $this->db->order_by('employee.nip ASC');
        $this->db->group_by('employee.nip');
        return $this->db->get()->result_array();
    }
}
