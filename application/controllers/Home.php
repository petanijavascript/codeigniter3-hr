<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Home_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'HR - Home';
        $data['employee'] = $this->Home_model->getAllEmployeeSummary();

        $this->load->view('templates/header', $data);
        $this->load->view('home/index', $data);
        $this->load->view('templates/footer');
    }
}
