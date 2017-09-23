<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class File extends CI_Model{

    public function getRows($id = '')
    {
        $this->db->select('id,file_name,created');
        $this->db->from('files');
        if($id){
            $this->db->where('id',$id);
            $query = $this->db->get();
            $result = $query->row_array();
        }
        else
        {
            $this->db->order_by('created','desc');
            $query = $this->db->get();
            $result = $query->result_array();
        }
        return !empty($result)?$result:false;
    }
    function addNewStudent()
	{
		$this->db->trans_start();
        $this->db->insert('student');
	    $insert_id = $this->db->insert_id();
		$this->db->trans_complete();
        return $insert_id;
    }
    public function insert($data){
        $insert = $this->db->insert('files',$data[0]);
        return $insert?true:false;
    }
}