<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employee extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Employee_model');
        $this->load->model('JobHistory_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'HR - Karyawan';
        $data['subtitle'] = 'Halaman Karyawan';
        $data['employee'] = $this->Employee_model->getAllEmployee();

        $this->load->view('templates/header', $data);
        $this->load->view('employee/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'HR - Karyawan';
        $data['subtitle'] = 'Form Tambah Karyawan';

        $this->form_validation->set_rules('nip', 'Nip', 'required|numeric');
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('gender', 'Gender', 'required|is_numeric');
        $this->form_validation->set_rules('is_active', 'IsActive', 'required');
        $this->form_validation->set_rules('join_date', 'JoinDate', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('employee/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Employee_model->tambahDataEmployee();
            $this->session->set_flashdata('flash', 'ditambahkan!');
            redirect('employee');
        }
    }

    public function hapus($id)
    {
        $this->Employee_model->hapusDataEmployee($id);
        $this->session->set_flashdata('flash', 'dihapus!');
        redirect('employee');
    }

    public function detail($id)
    {
        $data['title'] = 'HR - Karyawan';
        $data['subtitle'] = 'Detail Data Karyawan';
        $data['employee'] = $this->Employee_model->getDetailEmployeeById($id);
        $data['jobhistory'] = $this->JobHistory_model->getJobHistoryByNip($id);

        $this->session->set_flashdata('flashnip', $id);
        $this->load->view('templates/header', $data);
        $this->load->view('employee/detail', $data);
        $this->load->view('templates/footer');
    }

    public function ubah($id)
    {
        $data['title'] = 'HR - Karyawan';
        $data['subtitle'] = 'Form Ubah Karyawan';
        $data['employee'] = $this->Employee_model->getEmployeeById($id);

        $this->form_validation->set_rules('nip', 'Nip', 'required|numeric');
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('gender', 'Gender', 'required|is_numeric');
        $this->form_validation->set_rules('is_active', 'IsActive', 'required');
        $this->form_validation->set_rules('join_date', 'JoinDate', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('employee/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Employee_model->ubahDataEmployee();
            $this->session->set_flashdata('flash', 'diubah!');
            redirect('employee');
        }
    }
}
