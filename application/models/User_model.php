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
        $this->db->select('course_id, course_name, course_desc, icon, image, account.name');
        $this->db->from('course, account');
        $this->db->where('course.teacher_id = account.user_id');
        $this->db->order_by('course_name', 'ASC');
        return $this->db->get();
    }
    public function getMyCourses($user_id)
    {
        $this->db->select('course.course_id, course_name, course_desc, icon, image, account.name');
        $this->db->from('course, account');
        $this->db->join('enroll', 'enroll.course_id = course.course_id');
        $this->db->where('course.teacher_id = account.user_id');
        $this->db->where('student_id', $user_id);
        return $this->db->get();
    }
    public function getDetailedCourses($course_id)
    {
        $this->db->select('course.course_id, course_name, course_desc, account.name');
        $this->db->from('course, account');
        $this->db->where('course.teacher_id = account.user_id');
        $this->db->where('course_id', $course_id);
        return $this->db->get();
    }
    public function enrollCourse($course_id, $user_id)
    {
        $data  = [
            'student_id' => $user_id,
            'course_id' => $course_id,
        ];

        $this->db->insert('enroll', $data);
    }
    public function unEnrollCourse($course_id, $user_id)
    {
        $this->db->delete('enroll', array('student_id' => $user_id, 'course_id' => $course_id));
    }
    public function getTeacherName($teacher_id)
    {
        $this->db->select('name');
        $this->db->from('account');
        $this->db->where('user_id', $teacher_id);
        return $this->db->get();
    }



    // public function show_data_one($npm)
    // {
    //     $this->db->where('npm', $npm);
    //     return $this->db->get('siswa');
    // }
}
