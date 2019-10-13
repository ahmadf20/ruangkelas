<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Courses extends CI_Controller
{
    public function index()
    {
        $this->load->view('user/my_courses');
    }
    public function coursedetail()
    {
        $this->load->view('user/course_detail');
    }
}
