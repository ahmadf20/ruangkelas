<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Download extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url', 'download'));
        $this->load->model('Download_model');
    }

    public function file($id)
    {
        $data['file'] = $this->Download_model->getFile($id)->row_array();

        $file_name = $data['file']['file_name'] . $data['file']['extension'];

        // var_dump($file_name);
        // force_download('assets/files/materials/' . $file_name, NULL);

        redirect(base_url('assets/files/materials/' . $file_name));
    }
}
