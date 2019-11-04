<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AddCourse extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Admin_model');
        $this->load->library('form_validation');
    }

    public function index()
    {

        $data['title'] = 'My Courses';
        $data['user'] = $this->db->get_where('account', ['username' => $this->session->userdata('username')])->row_array();
        $data['myCourse'] = $this->Admin_model->getMyCourses($data['user']['user_id'])->result();


        $this->form_validation->set_rules('title', 'Title', 'required|trim|is_unique[course.course_name]');
        $this->form_validation->set_rules('desc', 'Desc', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('_partials/header.php', $data);
            $this->load->view('_partials/topbar.php', $data);
            $this->load->view('_partials/left_sidebar.php', $data);
            $this->load->view('admin/add_course', $data);
        } else {

            $data = [
                'course_name' => htmlspecialchars($this->input->post('title', true)),
                'course_desc' => htmlspecialchars($this->input->post('desc', true)),
                'teacher_id' => $data['user']['user_id'],
            ];


            if ($this->input->post('image', true) != '') {
                $data['image'] = ($this->input->post('image', true));
            }

            if ($this->input->post('icon', true) != '') {
                $data['icon'] = ($this->input->post('icon', true));
            }

            $this->db->insert('course', $data);

            $this->session->set_flashdata('message', ' <div class="alert alert-blue" style="margin-top: -25px">
            Congratulation! Course has been added. </div>');

            redirect('AddCourse');
        }
    }
}
