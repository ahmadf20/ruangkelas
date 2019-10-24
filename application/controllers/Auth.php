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

        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login';
            $this->load->view('_partials/header.php', $data);
            $this->load->view('auth/login_page');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user = $this->db->get_where('akun', ['username' => $username])->row_array();

            if ($user) {
                if (password_verify($password, $user['password'])) {

                    $data = [
                        'username' => $user['username'],
                        'role_id' => $user['role_id']
                    ];

                    $this->session->set_userdata($data);

                    redirect('mycourses');
                } else {
                    $this->session->set_flashdata('message', ' <div class="alert alert-red" style="margin-top: -25px">
                    Wrong password!</div>');

                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', ' <div class="alert alert-red" style="margin-top: -25px">
                Username doenst exist. <a href="register" style="color: #721c24"> create account </a></div>');

                redirect('auth');
            }
        }
    }

    public function register()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[akun.email]', [
            'is_unique' => 'Email already exists.',
        ]);
        $this->form_validation->set_rules('npm', 'Npm', 'required|trim|exact_length[12]|is_unique[akun.user_id]|numeric', [
            'is_unique' => 'NPM already exists.',
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Register';
            $this->load->view('_partials/header.php', $data);
            $this->load->view('auth/register_page');
        } else {
            $data = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'user_id' => htmlspecialchars(($this->input->post('npm', true))),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'photo' => 'default.png',
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
