<?php

$first_name = '';
$last_name = '';
$standard = '';
$division = '';
$email = '';    
$student_dob = '';
$contact_no = '';
$laddress = '';
$padress = '';
$status = '';

if(!empty($Student_data))
{
    foreach($Student_data as $uf)
    {
        $first_name = $uf->first_name;
        $last_name = $uf->last_name;
        $std = $uf->standard;
        $div = $uf->division;
        $email = $uf->email_address;
        $student_dob = $uf->student_dob;
        $contact_no = $uf->contact_no;
        $laddress = $uf->laddress;
        $padress = $uf->padress;
        $status = $uf->status;
    }
}


?>

 
 <style>
 #success_message{ display: none;}
 </style>
 
   <div class="container">
 
    <form class="well form-horizontal" action="<?php  echo base_url('user/newstudent'); ?> " method="post"  id="contact_form">
<fieldset>

<!-- Form Name -->
<legend><center><h2><b>Update Student Form</b></h2></center></legend><br>
<div class="form-group">
  <label class="col-md-4 control-label">First Name</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input type="text" class="form-control" name="first_name" value="<?php echo $first_name;?>" >

    </div>
  </div>
</div>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label" >Last Name</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input id="last_name" name="last_name" placeholder="Last Name" value="<?php echo $last_name;?>" class="form-control"  type="text" required>
    </div>
  </div>
</div>

  <div class="form-group"> 
  <label class="col-md-4 control-label">Standard </label>
    <div class="col-md-4 selectContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
    <select name="std" id="std" value="<?php echo $standard;?>" class="form-control selectpicker" required>
      <option value="">Select your Standard / Class</option>
      <option value="0">Ist</option>
      <option value="1">IInd</option>
      <option value="2">IIIrd</option>
      <option value="3">IVth</option>
      <option value="4">Vth</option>
      <option value="5">VIth</option>
      <option value="6">VIIth</option>
      <option value="7">VIIIth</option>
      <option value="8">IXth</option>
	  <option value="9">Xth</option>
    </select>
  </div>
</div>
</div>

  <div class="form-group"> 
  <label class="col-md-4 control-label">Division</label>
    <div class="col-md-4 selectContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
    <select name="div" id="std" value="<?php echo $division;?>" class="form-control selectpicker" required>
      <option value="">Division</option>
      <option value="0">A</option>
      <option value="1">B</option>
	  <option value="2">C</option>
      <option value="3">D</option>
     
    </select>
  </div>
</div>
</div>

<!-- Text input-->
       <div class="form-group">
  <label class="col-md-4 control-label">E-Mail</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
  <input id="email" name="email" placeholder="E-Mail Address" value="<?php echo $email;?>" class="form-control"  type="email" required>
    </div>
  </div>
</div>


<!-- Text input-->
       <div class="form-group">
  <label class="col-md-4 control-label">Date of birth</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
  <input id="student_dob" name="student_dob" value="<?php echo $student_dob;?>" placeholder="Date of birth" class="form-control"  type="text" required>
    </div>
  </div>
</div>

<!-- Text input-->
       
<div class="form-group">
  <label class="col-md-4 control-label">Contact No.</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
  <input id="" name="contact_no" placeholder="(+91)" value="<?php echo $contact_no;?>" class="form-control" type="text" required>
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" >Local Address</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input id="last_name" name="laddress" value="<?php echo $laddress;?>"  placeholder="Local Address" class="form-control"  type="text" required>
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" >Permanant Address</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input id="last_name" name="padress" value="<?php echo $padress;?>"  placeholder="Permanant Address" class="form-control"  type="text" required>
    </div>
  </div>
</div>

<div class="form-group"> 
<label class="col-md-4 control-label">Status</label>
  <div class="col-md-4 selectContainer">
  <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
  <select name="status" id="status" class="form-control selectpicker" value="<?php echo $status; ?>" required>
    <option value="">Select Status</option>
    <option value="1">Active</option>
    <option value="0">Deactive</option>
  </select>
</div>
</div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" >Choose File</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <p><?php echo $this->session->flashdata('statusMsg'); ?></p>
  <input type="file" class="form-control" name="userFiles[]" multiple/>
    </div>
	<div class="row">
        <ul class="gallery">
            <?php if(!empty($files)): foreach($files as $file): ?>
            <li class="item">
                <img src="<?php echo base_url('uploads/'.$file['file_name']); ?>" alt="" >
                <p>Uploaded On <?php echo date("j M Y",strtotime($file['created'])); ?></p>
            </li>
            <?php endforeach; else: ?>
            <p>Image(s) not found.....</p>
            <?php endif; ?>
        </ul>
    </div>
  </div>
</div>
 
<!-- Success message -->	
<div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Success!.</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4"><br>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button type="submit" class="btn btn-warning" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspSUBMIT <span class="glyphicon glyphicon-send"></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</button>
  </div>
</div>

</fieldset>
</form>
</div>
    </div><!-- /.container -->
	
	