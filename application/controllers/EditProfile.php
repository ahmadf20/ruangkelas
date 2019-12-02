<?php
defined('BASEPATH') or exit('No direct script access allowed');

class EditProfile extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('User_model');
        $this->load->helper(array('form', 'url'));
    }

    public function index()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('account', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('_partials/header.php', $data);
        $this->load->view('edit_profile', $data);
    }

    public function SavePassword()
    {
        $npm = $this->input->post('npm');
        $password = $this->input->post('passLama');
        $user = $this->db->get_where('account', ['user_id' => $npm])->row_array();
        
        $this->db->select('username')->from('account')->where('user_id', $npm);
        $user12 =  $this->db->get()->row_array();
        $user1 = implode($user12) ;


            if ($this->input->post('username') == $user1){
                $this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[5]|max_length[12]');
            }
            else    {
                $this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[5]|max_length[12]|is_unique[account.username]', [
                'is_unique' => 'username already exists.',]);
            }
            
            $this->form_validation->set_rules('passLama','Old Password', 'required');
            $this->form_validation->set_rules('passBaru', 'New password', 'alpha_numeric');
            $this->form_validation->set_rules('passKonf', 'Re-type password', 'matches[passBaru]');
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
            $data['user'] = $this->db->get_where('account', ['username' => $this->session->userdata('username')])->row_array();
            
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Register';
            $this->session->set_flashdata('error', 'Old password not match!');
            $this->load->view('_partials/header.php', $data);
            $this->load->view('edit_profile');
        } else {
            if ($this->input->post('passLama') == "" && $this->input->post('passBaru') == "" && $this->input->post('username') == $this->session->userdata('username')) {
                $this->session->set_flashdata('message', 'Your password success to change, please relogin !');
            } else {
                if (password_verify($password, $user['password'])) {
                    if ($this->input->post('passBaru') != "") {
                        $this->User_model->save();
                        $this->session->sess_destroy();
                        $this->session->set_flashdata('message', ' <div class="alert alert-blue" style="margin-top: -25px">
                        Congratulations! Your password success to change, please relogin. </div>');
                        $this->session->set_flashdata('error', 'Your password success to change, please relogin !');
                        $this->load->view('_partials/header.php');
                        $this->load->view('auth/login_page');
                    } else {   
                        
                        $this->User_model->saveOld();
                        $this->session->sess_destroy();
                        $this->session->set_flashdata('message', ' <div class="alert alert-blue" style="margin-top: -25px">
                        Your data has been changed !, Ples relogin !</div>');
                        $this->load->view('_partials/header.php');
                        $this->load->view('auth/login_page');

                    }
                } 
                else {
                    $data['user'] = $this->db->get_where('account', ['user_id' => $this->input->post('npm')])->row_array();
                    $this->session->set_flashdata('message', ' <div class="alert alert-red" style="margin-top: -25px">
                    Error! Old password not match </div>');
                    $this->load->view('_partials/header.php', $data);
                    $this->load->view('edit_profile');
                }
            }
        }
    }

    public function ImageUpload()
    {
        $data['user'] = $this->db->get_where('account', ['username' => $this->session->userdata('username')])->row_array();
        if ($this->input->post('submit')) {
            $upload = $this->User_model->UploadImage();
            if ($upload['result'] == "success") {
                $this->User_model->SaveImage($upload);
                redirect('EditProfile', $data);
            } else {
                redirect('EditProfile', $data);
            }
        }
        $this->load->view('EditProfile', $data);
    }
}
