<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model
{
    /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @return number $count : This is row count
     */
     function userListingCount($searchText = '')
     {
         $this->db->select('BaseTbl.userId, BaseTbl.email, BaseTbl.name, BaseTbl.mobile, BaseTbl.role');
         $this->db->from('tbl_users as BaseTbl');
        //  $this->db->join('tbl_roles as Role', 'Role.roleId = BaseTbl.roleId','left');
        //  if(!empty($searchText)) {
        //      $likeCriteria = "(BaseTbl.email  LIKE '%".$searchText."%'
        //                      OR  BaseTbl.name  LIKE '%".$searchText."%'
        //                      OR  BaseTbl.mobile  LIKE '%".$searchText."%')";
        //      $this->db->where($likeCriteria);
        //  }
        //  $this->db->where('BaseTbl.isDeleted', 0);
        //  $this->db->where('BaseTbl.roleId !=', 1);
         $query = $this->db->get();
         
         return count($query->result());
     }
     function getDeactivatedStudent()
     {
         $this->db->select('*');
         $this->db->from('student');
         $this->db->where('status =', 0);
         $query = $this->db->get();
         
         return $query->result();
     }
	 function studentListingCount()
    {
		  $sql = 'select stud_id, first_name, standard, contact_no,email_address,padress,doc_file,doc from student ';
          $query = $this->db->query($sql);
          $this->db->order_by("stud_id", "desc");
          $result = $query->result();
          return $result;		
    }
    function userListing()
    {
        $this->db->select('userId, email, name,mobile, roleid');
        $this->db->from('tbl_users');
        // $this->db->join('tbl_roles as Role', 'Role.roleId = BaseTbl.roleId','left');
        // if(!empty($searchText)) {
        //     $likeCriteria = "(BaseTbl.email  LIKE '%".$searchText."%'
        //                     OR  BaseTbl.name  LIKE '%".$searchText."%'
        //                     OR  BaseTbl.mobile  LIKE '%".$searchText."%')";
        //     $this->db->where($likeCriteria);
        // }
        // $this->db->where('BaseTbl.isDeleted', 0);
        // $this->db->where('BaseTbl.roleId !=', 1);
        // $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }
    function visitor_count()
    {
        $query = $this->db->query("SELECT COUNT(*) FROM student");
        return $query->num_rows();
    }
    function getUserRoles()
    {
        $this->db->select('roleId, role');
        $this->db->from('tbl_roles');
        $this->db->where('roleId !=', 1);
        $query = $this->db->get();
        return $query->result();
    }
	function get_student_id($stud_id)
	{
        $this->db->select('*');
        $this->db->from('student');
		$this->db->where('stud_id',$stud_id);
        $query = $this->db->get();
        return $query->result();
    }
    public function did_delete_row($stud_id)
    {
        $this -> db -> where('stud_id', $stud_id);
        $this -> db -> delete('student');
     }
	function get_data_entry_operator()
    {
        $this->db->select('*');
        $this->db->from('tbl_users');
        $this->db->where('roleId =', 3);
        $query = $this->db->get();
        
        return $query->result();
    }
    function get_Moderator()
    {
        $this->db->select('*');
        $this->db->from('tbl_users');
        $this->db->where('roleId =', 2);
        $query = $this->db->get();
        return $query->result();
    }
    public function selectorganizer ($search)
	{
        $condition = "first_name = '" . $search . "'";
        $this->db->select('*');
        $this->db->from('student');
        $this->db->where($condition);
        $query = $this->db->get();
        return $result = $query->result();
    }  
	
    /**
     * This function is used to check whether email id is already exist or not
     * @param {string} $email : This is email id
     * @param {number} $userId : This is user id
     * @return {mixed} $result : This is searched result
     */
    function checkEmailExists($email, $userId = 0)
    {
        $this->db->select("email");
        $this->db->from("tbl_users");
        $this->db->where("email", $email);   
        $this->db->where("isDeleted", 0);
        if($userId != 0)
		{
            $this->db->where("userId !=", $userId);
        }
        $query = $this->db->get();
        return $query->result();
    }
    
    
    /**
     * This function is used to add new user to system
     * @return number $insert_id : This is last inserted id
     */
    function addNewUser($userInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_users', $userInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    
	/* function addNewStudent()
	{
		$this->db->trans_start();
		
        $this->db->insert('student');
		
	    $insert_id = $this->db->insert_id();
		 
		$this->db->trans_complete();
        return $insert_id;
	} */
    /**
     * This function used to get user information by id
     * @param number $userId : This is user id
     * @return array $result : This is user information
     */
    function getUserInfo($userId)
    {
        $this->db->select('userId, name, email, mobile, roleId');
        $this->db->from('tbl_users');
        $this->db->where('isDeleted', 0);
		$this->db->where('roleId !=', 1);
        $this->db->where('userId', $userId);
        $query = $this->db->get();
        
        return $query->result();
    }
    /**
     * This function is used to update the user information
     * @param array $userInfo : This is users updated information
     * @param number $userId : This is user id
     */
    function editUser($userInfo, $userId)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_users', $userInfo);
        
        return TRUE;
    }    
    /**
     * This function is used to delete the user information
     * @param number $userId : This is user id
     * @return boolean $result : TRUE / FALSE
     */
    function deleteUser($userId, $userInfo)
    {
        $this->db->where('userId', $userId);
        $this->db->update('tbl_users', $userInfo);
        
        return $this->db->affected_rows();
    }
	
    /**
     * This function is used to match users password for change password
     * @param number $userId : This is user id
     */
    function matchOldPassword($userId, $oldPassword)
    {
        $this->db->select('userId, password');
        $this->db->where('userId', $userId);        
        $this->db->where('isDeleted', 0);
        $query = $this->db->get('tbl_users');
        
        $user = $query->result();

        if(!empty($user)){
            if(verifyHashedPassword($oldPassword, $user[0]->password)){
                return $user;
            } else {
                return array();
            }
        } else {
            return array();
        }
    }
    
    /**
     * This function is used to change users password
     * @param number $userId : This is user id
     * @param array $userInfo : This is user updation info
     */
    function changePassword($userId, $userInfo)
    {
        $this->db->where('userId', $userId);
        $this->db->where('isDeleted', 0);
        $this->db->update('tbl_users', $userInfo);
        
        return $this->db->affected_rows();
    }
	function get_download_report_details($stud_id)
	{
		$this->db->select('*');
		$this->db->from('student');
		$this->db->where(array('stud_id'=>$stud_id));
		$this->db->order_by("stud_id", "desc");
		$query = $this->db->get();
		// echo $this->db->last_query();
		return $query->row();
	}
    function search($keyword)
    {
        $this->db->like('first_name',$keyword);
        $query  =   $this->db->get('student');
        return $query->result();
    }
    function search_users($keyword)
    {
        $this->db->like('name',$keyword);
        $query  =   $this->db->get('tbl_users');
        return $query->result();
    }
    function search_data_entry($keyword)
    {
        $this->db->like('name',$keyword);
        $query  =   $this->db->get('tbl_users');
        return $query->result();
    }
    
	
}

  