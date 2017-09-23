<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Uploadcsv extends CI_Controller {

public function __construct()
{
    parent::__construct();
    $this->load->helper('url');                    
    $this->load->model('Welcome_model');
}

public function index()
{
	
	//$this->data['view_data']= $this->welcome->view_data();
  $this->load->view('upload', $this->data, FALSE);
}

	//////////////////Import subscriber emails ////////////////////////////////
public function importbulkemail(){
	$this->load->view('upload');
}

public function import()
        {
	
  if(isset($_POST["import"]))
  {
        $filename=$_FILES["file"]["tmp_name"];
		
        if($_FILES["file"]["size"] > 0)
          {
            $file = fopen($filename, "r");
             while (($importdata = fgetcsv($file, 10000, ",")) !== FALSE)
             {
                    $data = array(
                        'name' => $importdata[0],
                        'email' =>$importdata[1],
                        'created_date' => date('Y-m-d'),
                        );
					
            $insert = $this->Welcome_model->insertCSV($data);
             }                    
            fclose($file);
			$this->session->set_flashdata('message', 'Data are imported successfully..');
			 $this->load->view('upload', $this->data, FALSE);
          }
          else
          {
			$this->session->set_flashdata('message', 'Something went wrong..');
		 $this->load->view('upload', $this->data, FALSE);
		}
    } $this->load->view('upload', $this->data, FALSE);
}


/////////////////////////////////Import subscriber emails ////////////////////////////////

}
