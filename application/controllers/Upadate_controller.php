<?php
class Update_controller extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Update_model');
	}
	function show_student_id()
	{
		$id = $this->uri->segment(3);
		$data['students'] = $this->Update_model->show_students();
		$data['single_student'] = $this->Update_model->show_student_id($id);
		$this->load->view('edit_student', $data);
	}
	function update_student_id1() 
	{
		$id= $this->input->post('did');
		$data = array(
					'first_name'=>$this->input->post('first_name'),
					'last_name'=>$this->input->post('last_name'),
					'standard'=>$this->input->post('std'),
					'division'=>$this->input->post('div'),
					'email_address'=>$this->input->post('email'),
					'student_dob'=>$this->input->post('student_dob'),
					'contact_no'=>$this->input->post('contact_no'),
					'laddress'=>$this->input->post('laddress'),
					'padress'=>$this->input->post('padress')
		);
		$this->Update_model->update_student_id1($id,$data);
		$this->show_student_id();
	}
}
?>