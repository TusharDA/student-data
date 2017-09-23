<?php defined('BASEPATH') OR exit('No direct script access allowed');

public function index()
{
  $this->load->helper('form');
  $data = array();
  $data['title'] = 'Multiple file upload';
 
  if($this->input->post())
  {
    // retrieve the number of images uploaded;
    $number_of_files = sizeof($_FILES['uploadedimages']['tmp_name']);
    // considering that do_upload() accepts single files, we will have to do a small hack so that we can upload multiple files. For this we will have to keep the data of uploaded files in a variable, and redo the $_FILE.
    $files = $_FILES['uploadedimages'];
    $errors = array();
 
    // first make sure that there is no error in uploading the files
    for($i=0;$i<$number_of_files;$i++)
    {
      if($_FILES['uploadedimages']['error'][$i] != 0) $errors[$i][] = 'Couldn\'t upload file '.$_FILES['uploadedimages']['name'][$i];
    }
    if(sizeof($errors)==0)
    {
      // now, taking into account that there can be more than one file, for each file we will have to do the upload
      // we first load the upload library
      $this->load->library('upload');
      // next we pass the upload path for the images
      $config['upload_path'] = FCPATH . 'upload/';
      // also, we make sure we allow only certain type of images
      $config['allowed_types'] = 'gif|jpg|png';
      for ($i = 0; $i < $number_of_files; $i++) {
        $_FILES['uploadedimage']['name'] = $files['name'][$i];
        $_FILES['uploadedimage']['type'] = $files['type'][$i];
        $_FILES['uploadedimage']['tmp_name'] = $files['tmp_name'][$i];
        $_FILES['uploadedimage']['error'] = $files['error'][$i];
        $_FILES['uploadedimage']['size'] = $files['size'][$i];
        //now we initialize the upload library
        $this->upload->initialize($config);
        // we retrieve the number of files that were uploaded
        if ($this->upload->do_upload('uploadedimage'))
        {
          $data['uploads'][$i] = $this->upload->data();
        }
        else
        {
          $data['upload_errors'][$i] = $this->upload->display_errors();
        }
      }
    }
    else
    {
      print_r($errors);
    }
    echo '<pre>';
    print_r($data);
    echo '</pre>';
  }
  else
  {
    $this->load->view('upload_form', $data);
  }
}
?>