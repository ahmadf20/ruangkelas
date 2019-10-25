<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AllCourses extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('User_model');
    }

    public function index()
    {

        $data['title'] = 'All Courses';
        $data['user'] = $this->db->get_where('account', ['username' => $this->session->userdata('username')])->row_array();
        $data['subjects'] = $this->User_model->getAllCourses()->result();

        $this->load->view('_partials/header.php', $data);
        $this->load->view('_partials/topbar.php', $data);
        $this->load->view('_partials/left_sidebar.php', $data);
        $this->load->view('user/all_courses', $data);
    }
    public function course_detail()
    {
        $data['title'] = 'Course detail';
        $data['user'] = $this->db->get_where('account', ['username' => $this->session->userdata('username')])->row_array();
        $data['subjects'] = $this->User_model->getAllCourses()->result();

        $this->load->view('_partials/header.php', $data);
        $this->load->view('_partials/topbar.php', $data);
        $this->load->view('_partials/left_sidebar.php', $data);
        $this->load->view('user/course_detail', $data);
    }
}
