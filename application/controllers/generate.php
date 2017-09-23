<?php
include_once(APPPATH . 'libraries/class.pdf.php');
class Generate extends CI_Controller
{

    function Generate()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
    }


    function create()
    {

                $this->load->library('cezpdf');

        $this->cezpdf->ezText('PDF REPORT OF LOGIN TABLE', 12, array('justification' => 'center'));
        $this->cezpdf->ezSetDy(-10);
                $i=1;
                $content="";

                $first_name="";
				$this->load->model("user_model");
				$this->user_model->	data();
               

                while($i <= $num){
                    $test = $i;
                    $value = $this->input->post($test);

                    if($value != ''){
                            $first_name= $first_name." ".$value;
                            array_push($farr, $value);

                        }
                     $i++;
                }

                $first_name = trim($first_name);

                $first_name=str_replace(' ', ',', $first_name);
                $this->db->select($first_name);
                $query = $this->db->get('student');
                $result = $query->result();

                foreach ($farr as $j)
                {

                    $content= strtoupper($j)."\n\n";
                    foreach($result as $res){
                       $content = $content.$res->$j."\n";
                    }

                      $this->cezpdf->ezText($content, 10);

                       $this->cezpdf->ezStream();
                 }

}}