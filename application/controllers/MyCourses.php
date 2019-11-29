<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MyCourses extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('User_model');
    }
 
    public function index()
    {
        $data['title'] = 'My Courses';
        $data['user'] = $this->db->get_where('account', ['username' => $this->session->userdata('username')])->row_array();
        $data['myCourse'] = $this->User_model->getMyCourses($data['user']['user_id'])->result();

        $this->load->view('_partials/header.php', $data);
        $this->load->view('_partials/topbar.php', $data);
        $this->load->view('_partials/left_sidebar.php', $data);
        $this->load->view('user/my_courses', $data);
    }
    public function course_detail()
    {
        $data['title'] = 'Course detail';
        $data['user'] = $this->db->get_where('account', ['username' => $this->session->userdata('username')])->row_array();
        $data['myCourse'] = $this->User_model->getMyCourses($data['user']['user_id'])->result();

        $subject_id = $this->uri->segment('3');

        $data['detailCourse'] = $this->User_model->getDetailedCourses($subject_id)->row_array();

        // var_dump($data['detailCourse']);

        $is_enrolled = false;
        foreach ($data['myCourse'] as $s) {
            if ($s->subject_id == $this->uri->segment(3)) {
                $is_enrolled = true;
                break;
            }
        }

        $data['is_enrolled'] = $is_enrolled;

        $this->load->view('_partials/header.php', $data);
        $this->load->view('_partials/topbar.php', $data);
        $this->load->view('_partials/left_sidebar.php', $data);
        $this->load->view('user/course_detail', $data);
    }
}
