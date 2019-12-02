

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajaxsearch extends CI_Controller {

	function index()
	{
		$this->load->view('ajaxsearch');
	}

	function fetch()
	{
		$output = '';
		$query = '';
		$this->load->model('ajaxsearch_model');
		if($this->input->post('query'))
		{
			$query = $this->input->post('query');
		}
        $data = $this->ajaxsearch_model->fetch_data($query);
        
		if($data->num_rows() > 0)
		{
			foreach($data->result() as $s)
			{
				$output .= '
                <div class="col-4">
                    <div class="card card-course" style="min-height: 333px; width: 270px" onclick="location.href=\'AllCourses/course_detail/'. $s->course_id .'\';">
                    <img class="card-img" src="./assets/course/'.$s->image .'" alt="">
                        <div class="card-body">
                        <div class="card-tittle">'. $s->course_name.'</div> 
                        <div class="card-subtitle">'. $s->course_desc .'
                        </div>
                        <hr>
                        <div class="card-subtitle">TO-DO</div>
                            <a class="todo" href="#">Tugas pertemuan 1</a>
                            <a class="todo" href="#">Tugas pertemuan 2</a>
                            <hr>
                            <div class="card-subtitle"> <i class="fas fa-user-graduate"></i> <span style="margin-left: 10px">'. $s->name .'</span></div>    
                        </div>
                    </div>
                </div>';
			}
		}
		// else
		// {
		// 	$output.= '
		// 	<h1>Data Not Found</h1>
		// 	'; 
		// }
		echo $output;
	}
	
}
