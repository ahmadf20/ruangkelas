<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MyCourses extends CI_Controller
{
    public function index()
    {

        $data['title'] = 'My Courses';
        $this->load->view('_partials/header.php', $data);
        // $this->load->view('user/_partials/left_sidebar.php');
        $this->load->view('user/my_courses');
    }
    public function course_detail()
    {
        $data['title'] = 'Course detail';
        $this->load->view('_partials/header.php', $data);
        $this->load->view('user/course_detail');
    }
}
