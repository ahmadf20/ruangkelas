<?php defined('BASEPATH') or exit('No direct script access allowed');
class Admin_model extends CI_Model
{
    public function getMyCourses($user_id)
    {
        $this->db->select('course.course_id, course_name, course_desc, icon, image');
        $this->db->from('course');
        $this->db->where('teacher_id', $user_id);
        return $this->db->get();
    }
}
