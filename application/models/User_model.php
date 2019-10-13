<?php defined('BASEPATH') or exit('No direct script access allowed');
class User_model extends CI_Model
{
    private $_table = "akun";

    public $USERNAME;
    public $PASSWORD;
    public $KODEUSER;
    public $EMAIL;
    public $FOTO;
    public $TIPE = 'mhs';

    public function save()
    {
        $post = $this->input->post();

        $this->USERNAME = $post["username"];
        $this->KODEUSER =  $post["npm"];
        $this->PASSWORD = $post["password"];
        $this->EMAIL = $post["email"];
        $this->TIPE = "mhs";
        $this->FOTO = 'foto';

        $this->db->insert($this->_table, $this);
    }
}
