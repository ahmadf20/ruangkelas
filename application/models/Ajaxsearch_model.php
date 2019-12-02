<?php
class Ajaxsearch_model extends CI_Model
{
	function fetch_data($query)
	{
        $this->db->select('course_id, course_name, course_desc, icon, image, account.name');
        $this->db->from("course,account");
        $this->db->where('course.teacher_id = account.user_id');
		if($query != '')
		{
			$this->db->like('course_name', $query);
            // $this->db->or_like('account.name', $query);
		}
		return $this->db->get();
	}
}
?>