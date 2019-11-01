<?php defined('BASEPATH') or exit('No direct script access allowed');
class Course_model extends CI_Model
{

    public function getMaterials($subject_id)
    {
        $this->db->select('*');
        $this->db->from('material');
        $this->db->where('subject_id', $subject_id);
        return $this->db->get();
    }

    public function getMaterialFiles($subject_id)
    {
        $this->db->select('*');
        $this->db->from('files');
        $this->db->where('subject_id', $subject_id);
        return $this->db->get();
    }
}
