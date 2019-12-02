<?php defined('BASEPATH') or exit('No direct script access allowed');
class Course_model extends CI_Model
{

    public function getStudentsList($course_id)
    {
        $this->db->select('*');
        $this->db->from('enroll');
        $this->db->join('account', 'enroll.student_id = account.user_id');
        $this->db->where('course_id', $course_id);
        return $this->db->get();
    }
    public function addMaterial($course_id)
    {
        $data = [
            'title' => htmlspecialchars($this->input->post('title', true)),
            'desc' => htmlspecialchars($this->input->post('desc', true)),
            'course_id' => $course_id,
            'date_created' => time()
        ];

        $this->db->insert('material', $data);
    }
    public function deleteMaterial($material_id)
    {
        //TODO:delete all files in within the material
        $this->db->select('*');
        $this->db->from('files');
        $this->db->where('material_id', $material_id);
        $data =  $this->db->get()->result();

        foreach ($data as $d) {
            unlink("assets/files/materials/" . $d->file_name . $d->extension);
        }

        $this->db->where('material_id', $material_id);
        $this->db->delete('material');
    }

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
    public function createCourse($data)
    {

        $data = [
            'course_name' => htmlspecialchars($this->input->post('title', true)),
            'course_desc' => htmlspecialchars($this->input->post('desc', true)),
            'teacher_id' => $data['user']['user_id'],
        ];

        if (!empty($_FILES['image']['name'])) {
            $data['image'] =  $_FILES['image']['name'];
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
            'course_name' => htmlspecialchars($this->input->post('title', true)),
            'course_desc' => htmlspecialchars($this->input->post('desc', true))
        ];

        if (!empty($_FILES['image']['name'])) {
            $data['image'] =  $_FILES['image']['name'];
        }

        if ($this->input->post('icon', true) != '') {
            $data['icon'] = ($this->input->post('icon', true));
        }

        $this->db->where('course_id', $course_id);
        $this->db->update('course', $data);
    }
    public function uploadFile($files)
    {
        $files_data = [
            'material_id' => $files["material_id"],
            'course_id' => $files["course_id"],
            'file_name' => $files["raw_name"],
            'extension' => $files["file_ext"],
            'date_uploaded' => time()
        ];

        $this->db->insert('files', $files_data);
    }
    public function deleteFile($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('files');
    }
    public function getFile($id)
    {
        $this->db->select('*');
        $this->db->from('files');
        $this->db->where('id', $id);
        return $this->db->get();
    }
}
