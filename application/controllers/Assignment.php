<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Assignment extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Admin_model');
        $this->load->model('User_model');
        $this->load->model('Assignment_model');
        $this->load->model('Course_model');
        $this->load->library('form_validation');
    }
    public function index($id)
    {
        $data['title'] = 'All Courses';
        $data['user'] = $this->db->get_where('account', ['username' => $this->session->userdata('username')])->row_array();
        $data['allCourse'] = $this->User_model->getAllCourses()->result();
        if ($data['user']['role_id'] == 1) {
            $data['myCourse'] = $this->Admin_model->getMyCourses($data['user']['user_id'])->result();
        } else {
            $data['myCourse'] = $this->User_model->getMyCourses($data['user']['user_id'])->result();
        }

        $this->load->view('_partials/header.php', $data);
        $this->load->view('_partials/topbar.php', $data);
        $this->load->view('_partials/left_sidebar.php', $data);
        $this->load->view('assignment', $data);
    }
    public function create($course_id, $material_id)
    {

        $data['title'] = 'Create Assignment';
        $data['user'] = $this->db->get_where('account', ['username' => $this->session->userdata('username')])->row_array();
        $data['myCourse'] = $this->Admin_model->getMyCourses($data['user']['user_id'])->result();
        $data['courseData'] = $this->Course_model->getCourseData($course_id)->row();
        $data['material_id'] = $material_id;

        $this->form_validation->set_rules('title', 'Title', 'required|trim');
        $this->form_validation->set_rules('desc', 'Desc', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('_partials/header.php', $data);
            $this->load->view('_partials/topbar.php', $data);
            $this->load->view('_partials/left_sidebar.php', $data);
            $this->load->view('admin/create_assignment', $data);
        } else {

            $this->Assignment_model->create($material_id, $course_id);

            $this->session->set_flashdata('message', ' <div class="alert alert-blue" style="margin-top: -25px">
            Congratulation! New assignment has been created. </div>');

            redirect(base_url('MyCourses/course_detail/' . $data['courseData']->course_id));
        }
    }

    public function delete($id, $course_id)
    {
        $this->Assignment_model->delete($id);

        $this->session->set_flashdata('message', ' <div class="alert alert-blue" style="margin-top: -25px">
            Congratulation! Assignment has been deleted. </div>');

        redirect(base_url('MyCourses/course_detail/' . $course_id));
    }

    // public function edit($course_id)
    // {

    //     $data['title'] = 'Edit Courses';
    //     $data['user'] = $this->db->get_where('account', ['username' => $this->session->userdata('username')])->row_array();
    //     $data['myCourse'] = $this->Admin_model->getMyCourses($data['user']['user_id'])->result();
    //     $data['courseData'] = $this->Course_model->getCourseData($course_id)->row();

    //     $this->form_validation->set_rules('title', 'Title', 'required|trim');
    //     $this->form_validation->set_rules('desc', 'Desc', 'required|trim');

    //     if ($this->form_validation->run() == false) {
    //         $this->load->view('_partials/header.php', $data);
    //         $this->load->view('_partials/topbar.php', $data);
    //         $this->load->view('_partials/left_sidebar.php', $data);
    //         $this->load->view('admin/edit_course', $data);
    //     } else {

    //         $this->Course_model->updateCourse($course_id);

    //         $this->session->set_flashdata('message', ' <div class="alert alert-blue" style="margin-top: -25px">
    //         Congratulation! Your course has been modified. </div>');

    //         redirect(base_url('MyCourses/course_detail/' . $data['courseData']->course_id));
    //     }
    // }
}
