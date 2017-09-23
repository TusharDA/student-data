<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload_Controller extends CI_Controller {
public function __construct() {
parent::__construct();
$this->load->model('file');
$this->load->model('user_model');
}
public function file_view(){
$this->load->view('file_view', array('error' => ' ' ));
//$this->load->view('up_files', array('error' => ' ' ));
}
 public function do_upload()
{
	$post_data=array(
			'first_name'=>$this->input->post('first_name'),
			'last_name'=>$this->input->post('last_name'),
			'standard'=>$this->input->post('std'),
			'division'=>$this->input->post('div'),
			'email_address'=>$this->input->post('email'),
			'student_dob'=>$this->input->post('student_dob'),
			'contact_no'=>$this->input->post('contact_no'),
			'laddress'=>$this->input->post('laddress'),
            'padress'=>$this->input->post('padress'),
            'status'=>$this->input->post('status'),
            'date'=>date('Y-m-d H:i:s')
			);
            $this->db->set($post_data);
            $insert_student=$this->file->addNewStudent($post_data);
            return $this->get_stud_id();
	// $data = array();
    //     /* if($this->input->post('fileSubmit') && !empty($_FILES['userFiles']['name']))
	// 	{ */
    //         $filesCount = count($_FILES['userFiles']['name']);
    //         for($i = 0; $i < $filesCount; $i++)
	// 		{
    //             $_FILES['userFile']['name'] = $_FILES['userFiles']['name'][$i];
    //             $_FILES['userFile']['type'] = $_FILES['userFiles']['type'][$i];
    //             $_FILES['userFile']['tmp_name'] = $_FILES['userFiles']['tmp_name'][$i];
    //             $_FILES['userFile']['error'] = $_FILES['userFiles']['error'][$i];
    //             $_FILES['userFile']['size'] = $_FILES['userFiles']['size'][$i];

    //             $uploadPath = 'uploads/';
    //             $config['upload_path'] = $uploadPath;
    //             $config['allowed_types'] = 'gif|jpg|png';
                
    //             $this->load->library('upload', $config);
    //             $this->upload->initialize($config);
    //             if($this->upload->do_upload('userFile'))
	// 			{
    //                 $fileData = $this->upload->data();
    //                 $uploadData[$i]['file_name'] = $fileData['file_name'];
    //                 $uploadData[$i]['created'] = date("Y-m-d H:i:s");
    //                 $uploadData[$i]['modified'] = date("Y-m-d H:i:s");
    //             }
    //         }
            
    //         if(!empty($uploadData)){
    //             //Insert file information into the database
    //             $insert = $this->file->insert($uploadData);
    //             $statusMsg = $insert?'Files uploaded successfully.':'Some problem occurred, please try again.';
    //             $this->session->set_flashdata('statusMsg',$statusMsg);
    //         }
        
			
			
	// 		redirect('user/newstudent');
			
	// 		       //Get files data from database
	// 		$data['files'] = $this->file->getRows();
    //     //Pass the files data to view
    //     //$this->load->view('file_view', $data);

} 

public function get_stud_id()
{
    $data = array();
    /* if($this->input->post('fileSubmit') && !empty($_FILES['userFiles']['name']))
    { */
        $stud_id=
        $filesCount = count($_FILES['userFiles']['name']);
        for($i = 0; $i < $filesCount; $i++)
        {
            $_FILES['userFile']['name'] = $_FILES['userFiles']['name'][$i];
            $_FILES['userFile']['type'] = $_FILES['userFiles']['type'][$i];
            $_FILES['userFile']['tmp_name'] = $_FILES['userFiles']['tmp_name'][$i];
            $_FILES['userFile']['error'] = $_FILES['userFiles']['error'][$i];
            $_FILES['userFile']['size'] = $_FILES['userFiles']['size'][$i];

            $uploadPath = 'uploads/';
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = 'gif|jpg|png';
            
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if($this->upload->do_upload('userFile'))
            {
                $fileData = $this->upload->data();
                $uploadData[$i]['file_name'] = $fileData['file_name'];
                $uploadData[$i]['created'] = date("Y-m-d H:i:s");
                $uploadData[$i]['modified'] = date("Y-m-d H:i:s");
            }
        }
        
        if(!empty($uploadData)){
            //Insert file information into the database
            $insert = $this->file->insert($uploadData);
            $statusMsg = $insert?'Files uploaded successfully.':'Some problem occurred, please try again.';
            $this->session->set_flashdata('statusMsg',$statusMsg);
        }
    
        
        
        redirect('user/newstudent');
        
               //Get files data from database
        $data['files'] = $this->file->getRows();
    //Pass the files data to view
    //$this->load->view('file_view', $data);
}
}
?>