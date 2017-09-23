<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


 


/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class User extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
		$this->load->library('upload');
		$this->load->database();
		$this->load->helper('url');
		$this->load->helper('form');
        $this->load->model('user_model');
		
        $this->isLoggedIn();   
    }
    
    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Dashboard';
        
        $this->loadViews("dashboard", $this->global, NULL , NULL);
    }
    public function select ($search)
    {
            $this->load->model('user_model');
            if(isset($_GET ['search']) && !empty($_GET['search'])) {
                $search= $_GET[ 'search'];
                $this->load->model('Login_model');
                if($this->user_model->selectorganizer($search))
                {
                   $this->load->view('studentview');
                }
                else
                {
                    redirect('user/index');
                }
            }  
        } 
    
	public function moderator_dash()
    {
        $this->global['pageTitle'] = 'CodeInsect : Dashboard';
        
        $this->loadViews("moderator_dashboard", $this->global, NULL , NULL);
    }
<<<<<<< HEAD
    function home()
	{
		if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
		else
		{
               // $this->loadViews("newstudent",$this->global,NULL);
                
                $this->global['pageTitle'] = 'Student : student Listing';
                $this->loadViews("home", $this->global,  NULL);
		}
			
    }
   
=======
    
>>>>>>> ff6cfda8934382dcfd113314f3d0a98ed9cdc548
    /**
     * This function is used to load the user list
     */
     function userListing()
     {
         if($this->isAdmin() == TRUE)
         {
             $this->loadThis();
         }
         else
         {
             $this->load->model('user_model');
         
              $searchText = $this->input->post('searchText');
              $data['searchText'] = $searchText;
             
           // $this->load->library('pagination');
             
           // $count = $this->user_model->userListingCount($searchText);
 
            // $returns = $this->paginationCompress ( "userListing/", $count, 5 );
             
           $data['userRecords'] = $this->user_model->userListing();
             
             $this->global['pageTitle'] = 'CodeInsect : User Listing';
             
             $this->loadViews("users", $this->global, $data, NULL);
         }
     }
	function viewstudentlist()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
			$deptresult = $this->user_model->studentListingCount();  
            $data['deptlist'] = $deptresult;
            $this->global['pageTitle'] = 'Student : student Listing';
            $this->loadViews("studentview", $this->global, $data, NULL);
			
        }
    }
    
	function view_data_entry_operator()
	{
		if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
		  else
        {
			
            $this->load->model('user_model');
        
            $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;
            $deptresult = $this->user_model->get_data_entry_operator($searchText); 
            $data['deptlist'] = $deptresult;
            $this->global['pageTitle'] = 'Student : student Listing';
            $this->loadViews("data_entry_view", $this->global, $data, NULL);
        }
			
    }
    function view_modrator()
	{
		if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
		  else
        {
			
            $this->load->model('user_model');
        
            $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;
            $deptresult = $this->user_model->get_Moderator($searchText); 
            $data['deptlist'] = $deptresult;
            $this->global['pageTitle'] = 'Student : student Listing';
            $this->loadViews("mod_view", $this->global, $data, NULL);
        }
			
	}
	
	
     function editmod()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $data['roles'] = $this->user_model->getUserRoles();
            $data['userInfo'] = $this->user_model->get_Moderator();
            $this->global['pageTitle'] = 'Student : Edit User';
            $this->loadViews("editmoderator", $this->global, $data, NULL);
        }
    }	

    function editdataentry()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $data['roles'] = $this->user_model->getUserRoles();
            $data['userInfo'] = $this->user_model->get_data_entry_operator();
            $this->global['pageTitle'] = 'Student : Edit User';
            $this->loadViews("editmoderator", $this->global, $data, NULL);
        }
    }	
    /**
     * This function is used to load the add new form
     */
    function addNew()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('user_model');
            $data['roles'] = $this->user_model->getUserRoles();
            $this->global['pageTitle'] = 'CodeInsect : Add New User';
            $this->loadViews("addNew", $this->global, $data, NULL);
        }
    }

	
    /**
     * This function is used to check whether email already exist or not
     */
    function checkEmailExists()
    {
        $userId = $this->input->post("userId");
        $email = $this->input->post("email");
        if(empty($userId)){
            $result = $this->user_model->checkEmailExists($email);
        } else {
            $result = $this->user_model->checkEmailExists($email, $userId);
        }
        if(empty($result)){ echo("true"); }
        else { echo("false"); }
    }
    
	function viewstudent()
	{
		if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
		else
		{
                $this->global['pageTitle'] = 'Student : student Listing';
                $this->loadViews("newstudent", $this->global,  NULL);
		}
			
    }
		function newstudent()
	{
		if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
	    else
		{
           
			/* $post_data=array('stud_id'=>$this->input->post('stud_id'),
			'first_name'=>$this->input->post('first_name'),
			'last_name'=>$this->input->post('last_name'),
			'standard'=>$this->input->post('std'),
			'division'=>$this->input->post('div'),
			'email_address'=>$this->input->post('email'),
			'student_dob'=>$this->input->post('student_dob'),
			'contact_no'=>$this->input->post('contact_no'),
			'laddress'=>$this->input->post('laddress'),
			'padress'=>$this->input->post('padress'),
			'doc_file'=>$this->input->post('full_path')
			
			);
			
			$insert_student=$this->user_model->addNewStudent($post_data); */
				$this->loadViews("newstudent",$this->global,NULL);
				
		
	}
	
	}
    /**
     * This function is used to add new user to the system
     */
    function addNewUser()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('fname','Full Name','trim|required|max_length[128]|xss_clean');
            $this->form_validation->set_rules('email','Email','trim|required|valid_email|xss_clean|max_length[128]');
            $this->form_validation->set_rules('password','Password','required|max_length[20]');
            $this->form_validation->set_rules('cpassword','Confirm Password','trim|required|matches[password]|max_length[20]');
            $this->form_validation->set_rules('role','Role','trim|required|numeric');
            $this->form_validation->set_rules('mobile','Mobile Number','required|min_length[10]|xss_clean');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->addNew();
            }
            else
            {
                $name = ucwords(strtolower($this->input->post('fname')));
                $email = $this->input->post('email');
                $password = $this->input->post('password');
                $roleId = $this->input->post('role');
                $mobile = $this->input->post('mobile');
                
                $userInfo = array('email'=>$email, 'password'=>getHashedPassword($password), 'roleId'=>$roleId, 'name'=> $name,
                                    'mobile'=>$mobile, 'createdBy'=>$this->vendorId, 'createdDtm'=>date('Y-m-d H:i:s'));
                
                $this->load->model('user_model');
                $result = $this->user_model->addNewUser($userInfo);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New User created successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'User creation failed');
                }
                
                redirect('addNew');
            }
        }
    }

	
    /**
     * This function is used load user edit information
     * @param number $userId : Optional : This is user id
     */
    function editOld($userId = NULL)
    {
        if($this->isAdmin() == TRUE || $userId == 1)
        {
            $this->loadThis();
        }
        else
        {
            if($userId == null)
            {
                redirect('userListing');
            }
            
            $data['roles'] = $this->user_model->getUserRoles();
            $data['userInfo'] = $this->user_model->getUserInfo($userId);
            
            $this->global['pageTitle'] = 'Student : Edit User';
            
            $this->loadViews("editOld", $this->global, $data, NULL);
        }
    }
    function editOldstudent($stud_id)
    
        {
            if($this->isAdmin() == TRUE)
            {
                $this->loadThis();
            }
            else
            {
                 $data['Student_data'] = $this->user_model->get_student_id($stud_id);    
                 $this->global['pageTitle'] = 'Student : Edit User';
                 $this->loadViews("edit_student", $this->global, $data, NULL);
            }
        }
    public function delete_row($stud_id) 
        {   
            $this->user_model->did_delete_row($stud_id);
            redirect('user/viewstudentlist');
        
        }
  
    /**
     * This function is used to edit the user information
     */
    function editUser()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $userId = $this->input->post('userId');
            
            $this->form_validation->set_rules('fname','Full Name','trim|required|max_length[128]|xss_clean');
            $this->form_validation->set_rules('email','Email','trim|required|valid_email|xss_clean|max_length[128]');
            $this->form_validation->set_rules('password','Password','matches[cpassword]|max_length[20]');
            $this->form_validation->set_rules('cpassword','Confirm Password','matches[password]|max_length[20]');
            $this->form_validation->set_rules('role','Role','trim|required|numeric');
            $this->form_validation->set_rules('mobile','Mobile Number','required|min_length[10]|xss_clean');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->editOld($userId);
            }
            else
            {
                $name = ucwords(strtolower($this->input->post('fname')));
                $email = $this->input->post('email');
                $password = $this->input->post('password');
                $roleId = $this->input->post('role');
                $mobile = $this->input->post('mobile');
                
                $userInfo = array();
                
                if(empty($password))
                {
                    $userInfo = array('email'=>$email, 'roleId'=>$roleId, 'name'=>$name,
                                    'mobile'=>$mobile, 'updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'));
                }
                else
                {
                    $userInfo = array('email'=>$email, 'password'=>getHashedPassword($password), 'roleId'=>$roleId,
                        'name'=>ucwords($name), 'mobile'=>$mobile, 'updatedBy'=>$this->vendorId, 
                        'updatedDtm'=>date('Y-m-d H:i:s'));
                }
                
                $result = $this->user_model->editUser($userInfo, $userId);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'User updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'User updation failed');
                }
                redirect('userListing');
            }
        }
    }
	
    /**
     * This function is used to delete the user using userId
     * @return boolean $result : TRUE / FALSE
     */
    function deleteUser()
    {
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {
            $userId = $this->input->post('userId');
            $userInfo = array('isDeleted'=>1,'updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'));
            
            $result = $this->user_model->deleteUser($userId, $userInfo);
            
            if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            else { echo(json_encode(array('status'=>FALSE))); }
        }
    }
    
    /**
     * This function is used to load the change password screen
     */
    function loadChangePass()
    {
        $this->global['pageTitle'] = 'Student : Change Password';
        
        $this->loadViews("changePassword", $this->global, NULL, NULL);
    }
	function setpage()
    {
       // $this->global['pageTitle'] = 'Student : Change Password';
        
        $this->loadViews("settings");
    }
    /**
     * This function is used to change the password of the user
     */
    function changePassword()
    {
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('oldPassword','Old password','required|max_length[20]');
        $this->form_validation->set_rules('newPassword','New password','required|max_length[20]');
        $this->form_validation->set_rules('cNewPassword','Confirm new password','required|matches[newPassword]|max_length[20]');
        
        if($this->form_validation->run() == FALSE)
        {
            $this->loadChangePass();
        }
        else
        {
            $oldPassword = $this->input->post('oldPassword');
            $newPassword = $this->input->post('newPassword');
            $resultPas = $this->user_model->matchOldPassword($this->vendorId, $oldPassword);
            
            if(empty($resultPas))
            {
                $this->session->set_flashdata('nomatch', 'Your old password not correct');
                redirect('loadChangePass');
            }
            else
            {
                $usersData = array('password'=>getHashedPassword($newPassword), 'updatedBy'=>$this->vendorId,
                                'updatedDtm'=>date('Y-m-d H:i:s'));
                
                $result = $this->user_model->changePassword($this->vendorId, $usersData);
                
                if($result > 0) { $this->session->set_flashdata('success', 'Password updation successful'); }
                else { $this->session->set_flashdata('error', 'Password updation failed'); }
                
                redirect('loadChangePass');
            }
        }
    }
		function viewupload()
	{
		if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
		else
		{
				$this->loadViews("upload",$this->global,NULL);
		}
			
	}
	
	function upload_data()
	{
		ini_set('memory_limit', '512M');
			ini_set('max_execution_time', '180');
			//$data["DataMaping"] = $this->Data_transform_model->get_datamaping_details();			
			if($_POST == NULL)
			{
				$this->load->view("upload",$data);
			}
			else
			{
				/*-----------------------File Upload---------------------*/
				$config['upload_path'] = './Data_uploads/';
				$config['allowed_types'] = 'xlsx|xls|csv';
				$config['max_size'] = '50000';
				$config['max_width'] = '1920';
				$config['max_height'] = '1280';	
				$config['encrypt_name'] = 'false';
				$config['overwrite'] = 'true';
				
				$this->load->library('upload', $config);
				$this->upload->initialize($config);		
			}				
				
    }
    function deactivated_stud()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
			$this->load->model('user_model');
			$deptresult = $this->user_model->getDeactivatedStudent(); 
            $data['deptlist'] = $deptresult;
            $this->global['pageTitle'] = 'Student : Edit User';
            $this->loadViews("deactiveStudents", $this->global, $data, NULL);
        }
    }
	public function load_student_report()
    {
			$data['result'] = $this->user_model->studentListingCount();
            $this->load->view('report',$data);
    }
    function search_student()
    {
        $keyword    =   $this->input->post('keyword');
        $data['results']    =   $this->user_model->search($keyword);
        $this->global['pageTitle'] = 'Student : student Listing';
        $this->loadViews("search_student", $this->global, $data, NULL);
    }
    function search_user()
    {
        $keyword    =   $this->input->post('keyword');
        $data['results']    =   $this->user_model->search_users($keyword);
        $this->global['pageTitle'] = 'Student : student Listing';
        $this->loadViews("search_users", $this->global, $data, NULL);
    }
	function search_data_entry_operator()
    {
        $keyword    =   $this->input->post('keyword');
        $data['results']    =   $this->user_model->search_data_entry($keyword);
        $this->global['pageTitle'] = 'Student : student Listing';
        $this->loadViews("search_data_entry", $this->global, $data, NULL);
    }
    function pageNotFound()
    {
        $this->global['pageTitle'] = 'Student : 404 - Page Not Found';
        $this->loadViews("404", $this->global, NULL, NULL);
    }

}

?>