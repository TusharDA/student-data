   

 
 <style>
 #success_message{ display: none;}
 </style>
 
   <div class="container">

    <form class="well form-horizontal" action="<?php ?> " method="post"  id="contact_form">
<fieldset>

<!-- Form Name -->
<legend><center><h2><b>Student Admission Form</b></h2></center></legend><br>

<!-- Text input-->
 <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn btn-primary" href="<?php echo base_url('user/viewstudent'); ?>"><i class="fa fa-eye"></i>View Students</a>
                </div>
            </div>
        </div>
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
  <label class="col-md-4 control-label">Standard / Class</label>
    <div class="col-md-4 selectContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
    <select name="std" id="std" class="form-control selectpicker" required>
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
  <label class="col-md-4 control-label">Username</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input id="user_name" name="user_name" placeholder="Username" class="form-control"  type="text" required>
    </div>
  </div>
</div>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label" >Password</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input id="user_password" name="user_password" placeholder="Password" class="form-control"  type="password" required>
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
  <label class="col-md-4 control-label">Contact No.</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
  <input id="" name="contact_no" placeholder="(+91)" class="form-control" type="text" required>
    </div>
  </div>
</div>

<!-- Select Basic -->

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
	
	