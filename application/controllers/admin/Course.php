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

        $this->load->helper(array('form', 'url'));

        $config["upload_path"] = './assets/course';
        $config["allowed_types"] = 'jpg|png';

        $this->load->library('upload', $config);

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
            if (!empty($_FILES['image']['name'])) {
                $this->upload->do_upload('image');
                $data['files_data'] = $this->upload->data();
            }

            $this->Course_model->createCourse($data);

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
    public function add_material($course_id)
    {
        $data['title'] = 'My Course';
        $data['user'] = $this->db->get_where('account', ['username' => $this->session->userdata('username')])->row_array();
        $data['myCourse'] = $this->Admin_model->getMyCourses($data['user']['user_id'])->result();
        $data['courseData'] = $this->Course_model->getCourseData($course_id)->row();

        $this->form_validation->set_rules('title', 'Title', 'required|trim');
        $this->form_validation->set_rules('desc', 'Desc', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', ' <div class="alert alert-red" style="margin-top: 0px">
			Failed to add a new course.</div>');
            redirect(base_url('AllCourses/course_detail/' . $course_id));
        } else {

            $this->Course_model->addMaterial($course_id);

            $this->session->set_flashdata('message', ' <div class="alert alert-blue" style="margin-top: -25px">
            Congratulation! New material has been added. </div>');

            redirect(base_url('MyCourses/course_detail/' . $course_id));
        }
    }
    public function delete_material($course_id, $material_id)
    {
        $this->Course_model->deleteMaterial($material_id);

        //delete files as well

        $this->session->set_flashdata('message', ' <div class="alert alert-blue" style="margin-top: -25px">
            Congratulation! Material has been deleted. </div>');

        redirect(base_url('AllCourses/course_detail/' . $course_id));
    }
    public function upload($course_id, $material_id)
    {
        // sleep(3);
        $this->load->helper(array('form', 'url'));


        $config["upload_path"] = './assets/files/materials';
        $config["allowed_types"] = 'gif|jpg|png|pdf|docx|zip|rar|
        ppt|pptx|doc';

        $this->load->library('upload', $config);


        if ($this->upload->do_upload('userfile')) {
            $data = $this->upload->data();
            $data['material_id'] = $material_id;
            $data['course_id'] = $course_id;

            $this->Course_model->uploadFile($data);

            $this->session->set_flashdata('message', ' <div class="alert alert-blue" style="margin-top: -25px"> Congratulation! File(s) have been uploaded.</div>');

            redirect(base_url('AllCourses/course_detail/' . $course_id));
        } else {
            $this->session->set_flashdata('message', ' <div class="alert alert-red" style="margin-top: -25px"> Error! Cannot upload file. Please try again.</div>');

            redirect(base_url('AllCourses/course_detail/' . $course_id));
        }
    }
    public function delete_file($id)
    {
        $data['file'] = $this->Course_model->getFile($id)->row();
        // var_dump($data['file']->file_name);
        $this->Course_model->deleteFile($id);

        if (unlink("assets/files/materials/" . $data['file']->file_name . $data['file']->extension)) {
            $this->session->set_flashdata('message', ' <div class="alert alert-blue" style="margin-top: -25px">
                Congratulation! File has been deleted. </div>');
            redirect(base_url('AllCourses/course_detail/' . $data['file']->course_id));
        }
    }
}
