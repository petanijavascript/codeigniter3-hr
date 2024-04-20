<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Job extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Job_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'HR - Jabatan';
        $data['subtitle'] = 'Halaman Jabatan';
        $data['job'] = $this->Job_model->getAllJob();

        $this->load->view('templates/header', $data);
        $this->load->view('job/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'HR - Jabatan';
        $data['subtitle'] = 'Form Tambah Jabatan';

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('job/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Job_model->tambahDataJob();
            $this->session->set_flashdata('flash', 'ditambahkan!');
            redirect('job');
        }
    }

    public function hapus($id)
    {
        $this->Job_model->hapusDataJob($id);
        $this->session->set_flashdata('flash', 'dihapus!');
        redirect('job');
    }

    public function ubah($id)
    {
        $data['title'] = 'HR - Jabatan';
        $data['subtitle'] = 'Form Ubah Jabatan';
        $data['job'] = $this->Job_model->getJobById($id);

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('job/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Job_model->ubahDataJob();
            $this->session->set_flashdata('flash', 'diubah!');
            redirect('job');
        }
    }
}
