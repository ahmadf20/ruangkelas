<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Course extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Admin_model');
        $this->load->model('Course_model');
        $this->load->library('form_validation');
    }

    public function create()
    {

        $data['title'] = 'Create Courses';
        $data['user'] = $this->db->get_where('account', ['username' => $this->session->userdata('username')])->row_array();
        $data['myCourse'] = $this->Admin_model->getMyCourses($data['user']['user_id'])->result();


        $this->form_validation->set_rules('title', 'Title', 'required|trim|is_unique[course.course_name]');
        $this->form_validation->set_rules('desc', 'Desc', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('_partials/header.php', $data);
            $this->load->view('_partials/topbar.php', $data);
            $this->load->view('_partials/left_sidebar.php', $data);
            $this->load->view('admin/create_course', $data);
        } else {

            $this->Course_model->createCourse($data['user']['user_id']);

            $this->session->set_flashdata('message', ' <div class="alert alert-blue" style="margin-top: -25px">
            Congratulation! Your course has been created. </div>');

            redirect('Course/create');
        }
    }

    public function delete($course_id)
    {
        $this->Course_model->deleteCourse($course_id);

        $this->session->set_flashdata('message', ' <div class="alert alert-blue" style="margin-top: -25px">
            Congratulation! Your course has been deleted. </div>');

        redirect('MyCourses');
    }

    public function edit($course_id)
    {

        $data['title'] = 'Edit Courses';
        $data['user'] = $this->db->get_where('account', ['username' => $this->session->userdata('username')])->row_array();
        $data['myCourse'] = $this->Admin_model->getMyCourses($data['user']['user_id'])->result();
        $data['courseData'] = $this->Course_model->getCourseData($course_id)->row();

        $this->form_validation->set_rules('title', 'Title', 'required|trim');
        $this->form_validation->set_rules('desc', 'Desc', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('_partials/header.php', $data);
            $this->load->view('_partials/topbar.php', $data);
            $this->load->view('_partials/left_sidebar.php', $data);
            $this->load->view('admin/edit_course', $data);
        } else {

            $this->Course_model->updateCourse($course_id);

            $this->session->set_flashdata('message', ' <div class="alert alert-blue" style="margin-top: -25px">
            Congratulation! Your course has been modified. </div>');

            redirect(base_url('MyCourses/course_detail/' . $data['courseData']->course_id));
        }
    }
}
