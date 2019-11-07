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
    public function getCourseData($course_id)
    {
        $this->db->select('*');
        $this->db->from('course');
        $this->db->where('course_id', $course_id);
        return $this->db->get();
    }
    public function createCourse($teacher_id)
    {
        $data = [
            'course_name' => htmlspecialchars($this->input->post('title', true)),
            'course_desc' => htmlspecialchars($this->input->post('desc', true)),
            'teacher_id' => $teacher_id,
        ];

        if ($this->input->post('image', true) != '') {
            $data['image'] = ($this->input->post('image', true));
        }

        if ($this->input->post('icon', true) != '') {
            $data['icon'] = ($this->input->post('icon', true));
        }

        $this->db->insert('course', $data);
    }
    public function deleteCourse($course_id)
    {
        $this->db->where('course_id', $course_id);
        $this->db->delete('course');
    }
    public function updateCourse($course_id)
    {
        $data = [
            'course_name' => htmlspecialchars($this->input->post('title', true))
        ];

        if ($this->input->post('image', true) != '') {
            $data['image'] = ($this->input->post('image', true));
        }

        if ($this->input->post('icon', true) != '') {
            $data['icon'] = ($this->input->post('icon', true));
        }

        $this->db->where('course_id', $course_id);
        $this->db->update('course', $data);
    }
}
