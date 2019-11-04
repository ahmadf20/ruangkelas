<?php defined('BASEPATH') or exit('No direct script access allowed');
class Course_model extends CI_Model
{

    public function getMaterials($course_id)
    {
        $this->db->select('*');
        $this->db->from('material');
        $this->db->where('course_id', $course_id);
        return $this->db->get();
    }

    public function getMaterialFiles($course_id)
    {
        $this->db->select('*');
        $this->db->from('files');
        $this->db->where('course_id', $course_id);
        return $this->db->get();
    }
}
