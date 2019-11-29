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
    public function detail($course_id, $id)
    {
        $data['title'] = 'All Courses';
        $data['user'] = $this->db->get_where('account', ['username' => $this->session->userdata('username')])->row_array();
        $data['allCourse'] = $this->User_model->getAllCourses()->result();
        $data['detailAssignment'] = $this->Assignment_model->getAssignmentDetail($id)->row_array();
        $data['userFiles'] = $this->db->get('userfiles')->result();
        // $data['totalSubmittedFiles'] = $this->Assignment_model->totalSubmittedFiles()->result();

        $data['myFile'] = $this->Assignment_model->getFiles($data['user']['user_id'])->result();

        // var_dump(sizeof($data['totalSubmittedFiles']));
        // exit;

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
    public function submit($course_id, $assignment_id)
    {

        $this->load->helper(array('form', 'url'));

        $config["upload_path"] = './assets/files/assignments';
        $config["allowed_types"] = 'gif|jpg|png|pdf|docx|zip|rar|
        ppt|pptx|doc|txt';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('userfile')) {

            $data = $this->upload->data();

            $data['user'] = $this->db->get_where('account', ['username' => $this->session->userdata('username')])->row_array();

            $data['assignment_id'] = $assignment_id;
            $data['student_id'] = $data['user']['user_id'];

            $this->Assignment_model->uploadFile($data);

            $this->session->set_flashdata('message', ' <div class="alert alert-blue" style="margin-top: -25px"> Congratulation! Your file(s) have been uploaded.</div>');
        } else {
            $this->session->set_flashdata('message', ' <div class="alert alert-red" style="margin-top: -25px"> Error! Cannot upload file. Please try again.</div>');
        }
        redirect(base_url('Assignment/detail/' . $course_id . '/' . $assignment_id));
    }
    public function unsubmit($userfiles_id)
    {
        $data['file'] = $this->Assignment_model->getFile($userfiles_id)->row();
        $data['assignment_data'] = $this->db->get_where('assignment', ['id' => $data['file']->assignment_id])->row();
        // var_dump($data['course_id']);
        // exit;

        $this->Assignment_model->deleteFile($userfiles_id);

        if (unlink("assets/files/assignments/" . $data['file']->file_name . $data['file']->extension)) {
            $this->session->set_flashdata('message', ' <div class="alert alert-blue" style="margin-top: -25px">
                Congratulation! Your file has been removed. </div>');
        } else {
            $this->session->set_flashdata('message', ' <div class="alert alert-red" style="margin-top: -25px">
                Failed to remove your file! Please try again. </div>');
        }
        redirect(base_url('Assignment/detail/' . $data['assignment_data']->course_id  . '/' . $data['file']->assignment_id));
    }
}
