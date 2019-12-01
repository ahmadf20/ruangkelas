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
    public function update($id)
    {
        $data = [
            'title' => htmlspecialchars($this->input->post('title', true)),
            'desc' => htmlspecialchars($this->input->post('desc', true)),
            'due_date' => htmlspecialchars($this->input->post('due_date', true)),
            'date_created' => time()
        ];

        if ($this->input->post('is_late_accepted', true) != '') {
            $data['is_late_accepted'] = ($this->input->post('is_late_accepted', true));
        }

        $this->db->where('id', $id);
        $this->db->update('assignment', $data);
    }
    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('assignment');
    }
    public function uploadFile($files)
    {
        $files_data = [
            'assignment_id' => $files["assignment_id"],
            'student_id' => $files["student_id"],
            'file_name' => $files["raw_name"],
            'extension' => $files["file_ext"],
            'date_uploaded' => time()
        ];

        $this->db->insert('userfiles', $files_data);
    }
    public function getFiles($student_id)
    {
        $this->db->select('*');
        $this->db->from('userfiles');
        $this->db->where('student_id', $student_id);
        return $this->db->get();
    }
    public function getFile($id)
    {
        $this->db->select('*');
        $this->db->from('userfiles');
        $this->db->where('id', $id);
        return $this->db->get();
    }
    public function deleteFile($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('userfiles');
    }
    // public function totalSubmittedFiles()
    // {
    //     $this->db->select_sum('student_id');
    //     return $this->db->get('userfiles');
    // }
    // public function totalStudent($course_id)
    // {
    //     $this->db->select_sum('user_id');
    //     $this->db->from('enroll');
    //     $this->db->where('course_id', $course_id);
    //     return $this->db->get();
    // }
    public function getSubmittedFiles($assignment_id)
    {    //get submitted files by the students for a specific assignment
        $this->db->select('*');
        $this->db->from('userfiles');
        $this->db->where('assignment_id', $assignment_id);
        return $this->db->get();
    }
    public function getTodoList($student_id)
    {
        //natura join -> select * from enroll natural join assignment
        $this->db->select('*');
        $this->db->from('enroll');
        $this->db->join('assignment', 'enroll.course_id = assignment.course_id');
        $this->db->where('enroll.student_id', $student_id);

        return $this->db->get();
    }
}
