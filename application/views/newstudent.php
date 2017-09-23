
 <style>
 #success_message{ display: none;}
 </style>
 
   <div class="container">
   
    <form class="well form-horizontal" action="<?php echo base_url('upload_controller/do_upload'); ?> " enctype="multipart/form-data" method="post" accept-charset="utf-8"  id="contact_form">
<fieldset>

<!-- Form Name -->
<legend><center><h2><b>Student Admission Form</b></h2></center></legend><br>

<div class="form-group">
  <label class="col-md-4 control-label">First Name</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input id="first_name" name="first_name" placeholder="First Name" class="form-control"  type="text" required>
    </div>
  </div>
</div>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label" >Last Name</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input id="last_name" name="last_name" placeholder="Last Name" class="form-control"  type="text" required>
    </div>
  </div>
</div>

  <div class="form-group"> 
  <label class="col-md-4 control-label">Standard </label>
    <div class="col-md-4 selectContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
    <select name="std" id="std" class="form-control selectpicker" required>
      <option value="">Select your Standard / Class</option>
      <option value="1">Ist</option>
      <option value="2">IInd</option>
      <option value="3">IIIrd</option>
      <option value="4">IVth</option>
      <option value="5">Vth</option>
      <option value="6">VIth</option>
      <option value="7">VIIth</option>
      <option value="8">VIIIth</option>
      <option value="9">IXth</option>
	  <option value="10">Xth</option>
    </select>
  </div>
</div>
</div>

  <div class="form-group"> 
  <label class="col-md-4 control-label">Division</label>
    <div class="col-md-4 selectContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
    <select name="div" id="std" class="form-control selectpicker" required>
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
  <input id="email" name="email" placeholder="E-Mail Address" class="form-control"  type="email" required>
    </div>
  </div>
</div>


<!-- Text input-->
       <div class="form-group">
  <label class="col-md-4 control-label">Date of birth</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
  <input id="student_dob" name="student_dob" placeholder="Date of birth" class="form-control"  type="text" required>
    </div>
  </div>
</div>

<!-- Text input-->
       
<div class="form-group">
  <label class="col-md-4 control-label">Contact No.</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
  <input id="" name="contact_no" placeholder="(+91)" class="form-control" type="text" required>
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" >Local Address</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input id="last_name" name="laddress" placeholder="Local Address" class="form-control"  type="text" required>
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" >Permanant Address</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input id="last_name" name="padress" placeholder="Permanant Address" class="form-control"  type="text" required>
    </div>
  </div>
</div>



<div class="form-group"> 
<label class="col-md-4 control-label">Status</label>
  <div class="col-md-4 selectContainer">
  <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
  <select name="status" id="status" class="form-control selectpicker" required>
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
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button type="submit" class="btn btn-warning" value="upload">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspSUBMIT <span class="glyphicon glyphicon-send"></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</button>
  </div>
</div>

</fieldset>
   </form>




</div>
    </div><!-- /.container -->
	
	