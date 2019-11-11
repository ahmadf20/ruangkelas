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
    }

    public function index()
    {
        $data['title'] = 'Register';
        $data['user'] = $this->db->get_where('account', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('_partials/header.php', $data);
        $this->load->view('edit_profile', $data);
    }

    public function save_password(){ 
        $this->form_validation->set_rules('passLama','password','required|trim|min_length[1]');
        $this->form_validation->set_rules('passBaru','New','required|alpha_numeric');
        $this->form_validation->set_rules('passKonf', 'Retype New', 'required|matches[passBaru]');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $data['user'] = $this->db->get_where('account', ['username' => $this->session->userdata('username')])->row_array();
        
        $npm = $this->input->post('npm');
        $password = $this->input->post('passLama');
        $user = $this->db->get_where('account', ['user_id' => $npm])->row_array();

        
        if($this->form_validation->run() == FALSE) {
            $data['title'] = 'Register';
            $this->session->set_flashdata('error','Old password not match!' );
            $this->load->view('_partials/header.php',$data);
            $this->load->view('edit_profile');
        } else{
            if(password_verify($password,$user['password'])){
                $this->User_model->save();
                $this->session->sess_destroy();
                $this->session->set_flashdata('error','Your password success to change, please relogin !' );
                $this->load->view('_partials/header.php');
                $this->load->view('auth/login_page');
            }
            else {
                $data['user'] = $this->db->get_where('account', ['user_id' => $this->input->post('npm')])->row_array();
                $this->session->set_flashdata('error','Old password not match!' );
                $this->load->view('_partials/header.php',$data);
                $this->load->view('edit_profile');
            }

            // $cek_old = $this->User_model->cek_old();
            // if ($cek_old == False){        
            //     $data['user'] = $this->db->get_where('account', ['user_id' => $this->session->userdata('user_id')]);
            //     $this->session->set_flashdata('error','Old password not match!' );
            //     $this->load->view('_partials/header.php',$data);
            //     $this->load->view('edit_profile');
            // }  else{
            //     $this->User_model->save();
            //     $this->session->sess_destroy();
            //     $this->session->set_flashdata('error','Your password success to change, please relogin !' );
            //     $this->load->view('_partials/header.php');
            //     $this->load->view('auth/login_page');
            // }
        }

    }


}
