<?php defined('BASEPATH') or exit('No direct script access allowed');
class Download_model extends CI_Model
{

    public function getFile($id)
    {
        $this->db->select('*');
        $this->db->from('files');
        $this->db->where('id', $id);
        return $this->db->get();
    }
}
