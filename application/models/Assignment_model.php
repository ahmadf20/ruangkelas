<?php defined('BASEPATH') or exit('No direct script access allowed');
class Assignment_model extends CI_Model
{
    public function getAssignment($course_id)
    {
        $this->db->select('*');
        $this->db->from('assignment');
        $this->db->where('course_id', $course_id);
        return $this->db->get();
    }
    public function getAssignmentDetail($id)
    {
        $this->db->select('*');
        $this->db->from('assignment');
        $this->db->where('id', $id);
        return $this->db->get();
    }
    public function create($material_id, $course_id)
    {
        $data = [
            'title' => htmlspecialchars($this->input->post('title', true)),
            'desc' => htmlspecialchars($this->input->post('desc', true)),
            'material_id' => $material_id,
            'course_id' => $course_id,
            'due_date' => htmlspecialchars($this->input->post('due_date', true)),
            'date_created' => time()
        ];

        if ($this->input->post('is_late_accepted', true) != '') {
            $data['is_late_accepted'] = ($this->input->post('is_late_accepted', true));
        }

        $this->db->insert('assignment', $data);
    }
    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('assignment');
    }
}
