<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Login';
        $this->load->view('_partials/header.php', $data);
        $this->load->view('auth/login_page');
    }

    public function register()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[akun.email]', [
            'is_unique' => 'Email already exists.',
        ]);
        $this->form_validation->set_rules('npm', 'Npm', 'required|trim|min_length[12]|max_length[12]|is_unique[akun.user_id]', [
            'is_unique' => 'NPM already exists.',
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Register';
            $this->load->view('_partials/header.php', $data);
            $this->load->view('auth/register_page');
        } else {
            $data = [
                'username' => $this->input->post('username'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'user_id' => $this->input->post('npm'),
                'email' => $this->input->post('email'),
                'foto' => 'default.png',
                'role_id' => 0, //mahasiswa
                'date_created' => time(),
            ];

            $this->db->insert('akun', $data);

            $this->session->set_flashdata('message', ' <div class="alert alert-blue" style="margin-top: -25px">
            Congratulation! Your account has been created! Please login. </div>');

            redirect('auth');
        }
    }
}
