<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Files extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->helper('download');
        $this->load->model('file');
    }
    
    public function index($stud_id){
     
      //$this->load->model('file');
        //get files from database
       $data['files'] = $this->db->query("SELECT * from student where stud_id = '$stud_id'")->row_array();
        //load the view
				
        $this->load->view('index', $data);
    }
	
    public function upload_im()
	{
		 $this->load->view('upload', $data);
	}
    public function download($doc){
        if(!empty($doc)){
        //load download helper
            $this->load->helper('download');
        //get file info from database
           //  $fileInfo= $this->file->getRows(array('stud_id' => $stud_id));
        //file path
           //  $file='uploads/'.$fileInfo['doc'];
        //download file from directory
           //  force_download($file, null);
        
        //$fileInfo= $this->file('doc');
        $file_name = $doc ;
        $file_path = "C:/xampp/htdocs/student/uploads/"; 
        header('Content-Type: application/octet-stream'); 
        header("Content-Disposition: attachment; filename=$file_name");
        ob_clean(); flush(); 
        readfile($file_path.$file_name);
        }
    }
}
?>
	