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
}
