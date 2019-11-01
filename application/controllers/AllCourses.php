<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AllCourses extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('User_model');
        $this->load->model('Course_model');
    }

    public function index()
    {

        $data['title'] = 'All Courses';
        $data['user'] = $this->db->get_where('account', ['username' => $this->session->userdata('username')])->row_array();
        $data['allCourse'] = $this->User_model->getAllCourses()->result();
        $data['myCourse'] = $this->User_model->getMyCourses($data['user']['user_id'])->result();

        // var_dump($data['allCourse']);
        // break;

        $this->load->view('_partials/header.php', $data);
        $this->load->view('_partials/topbar.php', $data);
        $this->load->view('_partials/left_sidebar.php', $data);
        $this->load->view('user/all_courses', $data);
    }

    public function course_detail()
    {
        $data['title'] = 'Course detail';
        $data['user'] = $this->db->get_where('account', ['username' => $this->session->userdata('username')])->row_array();
        $data['myCourse'] = $this->User_model->getMyCourses($data['user']['user_id'])->result();

        $subject_id = $this->uri->segment('3');

        $data['detailCourse'] = $this->User_model->getDetailedCourses($subject_id)->row_array();

        $data['materials'] = $this->Course_model->getMaterials($subject_id)->result();

        $data['files'] = $this->Course_model->getMaterialFiles($subject_id)->result();

        // var_dump($data['files']);
        // break;

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

    public function enroll()
    {
        $data['user'] = $this->db->get_where('account', ['username' => $this->session->userdata('username')])->row_array();

        $this->User_model->enrollCourse($this->uri->segment(3), $data['user']['user_id']);

        $this->session->set_flashdata('message', ' <div class="alert alert-blue" style="margin-top: 0px">
			Course has been enrolled.</div>');

        redirect(base_url('AllCourses/course_detail/' . $this->uri->segment(3)));
    }

    public function un_enroll()
    {
        $data['user'] = $this->db->get_where('account', ['username' => $this->session->userdata('username')])->row_array();

        $this->User_model->unEnrollCourse($this->uri->segment(3), $data['user']['user_id']);

        $this->session->set_flashdata('message', ' <div class="alert alert-blue" style="margin-top: 0px">
			Course has been removed.</div>');

        redirect(base_url('AllCourses/course_detail/' . $this->uri->segment(3)));
    }
}
