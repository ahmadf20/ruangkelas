<?php defined('BASEPATH') or exit('No direct script access allowed');
class User_model extends CI_Model
{
    // private $_table = "account";

    // public $USERNAME;
    // public $PASSWORD;
    // public $KODEUSER;
    // public $EMAIL;
    // public $FOTO;
    // public $TIPE = 'mhs';

    // public function save()
    // {
    //     $post = $this->input->post();

    //     $this->USERNAME = $post["username"];
    //     $this->KODEUSER =  $post["npm"];
    //     $this->PASSWORD = $post["password"];
    //     $this->EMAIL = $post["email"];
    //     $this->TIPE = "mhs";
    //     $this->FOTO = 'foto';

    //     $this->db->insert($this->_table, $this);
    // }

    public function getAllCourses()
    {
        return $this->db->get('subject');
    }
    public function getMyCourses($user_id)
    {
        $this->db->select('*');
        $this->db->from('subject');
        $this->db->join('enroll', 'enroll.subject_id = subject.subject_id');
        $this->db->where('student_id', $user_id);
        return $this->db->get();
    }
    public function getDetailedCourses($subject_id)
    {
        $this->db->select('*');
        $this->db->from('subject');
        $this->db->where('subject_id', $subject_id);
        return $this->db->get();
    }
    public function enrollCourse($subject_id, $user_id)
    {
        $data  = [
            'student_id' => $user_id,
            'subject_id' => $subject_id,
        ];

        $this->db->insert('enroll', $data);
    }
    public function unEnrollCourse($subject_id, $user_id)
    {
        $this->db->delete('enroll', array('student_id' => $user_id, 'subject_id' => $subject_id));
    }



    // public function show_data_one($npm)
    // {
    //     $this->db->where('npm', $npm);
    //     return $this->db->get('siswa');
    // }
}
