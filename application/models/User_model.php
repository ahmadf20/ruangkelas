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
        $this->db->select('subject_id, subject_name, subject_desc, account.name');
        $this->db->from('subject, account');
        $this->db->where('subject.teacher_id = account.user_id');
        return $this->db->get();
    }
    public function getMyCourses($user_id)
    {
        $this->db->select('subject.subject_id, subject_name, subject_desc, account.name');
        $this->db->from('subject, account');
        $this->db->join('enroll', 'enroll.subject_id = subject.subject_id');
        $this->db->where('subject.teacher_id = account.user_id');
        $this->db->where('student_id', $user_id);
        return $this->db->get();
    }
    public function getDetailedCourses($subject_id)
    {
        $this->db->select('subject.subject_id, subject_name, subject_desc, account.name');
        $this->db->from('subject, account');
        $this->db->where('subject.teacher_id = account.user_id');
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
    public function getTeacherName($teacher_id)
    {
        $this->db->select('name');
        $this->db->from('account');
        $this->db->where('user_id', $teacher_id);
        return $this->db->get();
    }

    public function save(){
        $pass = password_hash($this->input->post('passBaru'),PASSWORD_DEFAULT);
        $email =  htmlspecialchars($this->input->post('email'),true);
        $username = htmlspecialchars($this->input->post('username'),true);
        
        $data = array (
            'username' => $username,
            'email' => $email, 
            'password' => $pass
        );
        $this->db->where('username', $this->session->userdata('username'));
        $this->db->update('account', $data);
    }
//    fungsi untuk mengecek password lama :
    public function cek_old()
    {
        $old = ($this->input->post('npm'));    
        $this->db->where('user_id',$old);
        $query = $this->db->get('account');
        return $query->result();;
    }


    // public function show_data_one($npm)
    // {
    //     $this->db->where('npm', $npm);
    //     return $this->db->get('siswa');
    // }
}
