<?php
defined('BASEPATH') or exit('No direct script access allowed');

class JobHistory extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Employee_model');
        $this->load->model('JobHistory_model');
        $this->load->model('Job_model');
        $this->load->library('form_validation');
    }

    public function tambah($id)
    {
        $data['title'] = 'HR - Jabatan';
        $data['subtitle'] = 'Form Tambah Riwayat Jabatan';
        $data['employee'] = $this->Employee_model->getEmployeeById($id);
        $data['job'] = $this->Job_model->getAllJob();

        $this->form_validation->set_rules('active_date', 'ActiveDate', 'required');
        $this->form_validation->set_rules('nip', 'Nip', 'required');
        $this->form_validation->set_rules('job_id', 'JobId', 'required');
        $this->form_validation->set_rules('is_main', 'IsMain', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('jobhistory/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->JobHistory_model->tambahDataJobHistory();
            $this->session->set_flashdata('flash', 'ditambahkan!');
            redirect('employee/detail/' . $id);
        }
    }

    public function hapus($id)
    {
        $this->JobHistory_model->hapusDataJobHistory($id);
        $this->session->set_flashdata('flash', 'dihapus!');
        redirect('employee/detail/' . $this->session->flashdata('flashnip'));
    }

    public function ubah($id)
    {
        $data['title'] = 'HR - Riwayat';
        $data['subtitle'] = 'Form Ubah Riwayat Jabatan';
        $data['employee'] = $this->Employee_model->getEmployeeById($this->session->flashdata('flashnip'));
        $data['job'] = $this->Job_model->getAllJob();
        $data['jobhistory'] = $this->JobHistory_model->getJobHistoryById($id);

        $this->form_validation->set_rules('nip', 'Nip', 'required|numeric');
        $this->form_validation->set_rules('active_date', 'ActiveDate', 'required');
        $this->form_validation->set_rules('job_id', 'JobId', 'required|is_numeric');
        $this->form_validation->set_rules('is_main', 'IsMain', 'required|is_numeric');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('jobhistory/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->JobHistory_model->ubahDataJobHistory();
            $this->session->set_flashdata('flash', 'diubah!');
            redirect('employee/detail/' . $this->input->post('nip', true));
        }
    }
}
