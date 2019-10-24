<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AllCourses extends CI_Controller
{
    public function index()
    {

        $data['title'] = 'All Courses';
        $this->load->view('_partials/header.php', $data);
        // $this->load->view('user/_partials/left_sidebar.php');
        $this->load->view('user/all_courses');
    }
}
