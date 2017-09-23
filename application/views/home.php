<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> 
        <i class="fa fa-tachometer" aria-hidden="true"></i>Dashboard
        <small>Control panel</small>
      </h1>
    </section>
    
    <section class="content">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">!! Welcome !!</h2><br>
            <h3 class="text-center">School Management System</h3><br>
        </div>
    </div>
            <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?php $query= $this->db->query('SELECT * FROM student'); 
                  echo $query->num_rows(); ?></h3>
                  <p>List of Students</p>
                </div>
                <div class="icon">
                  <i class="fa fa-users"></i>
                </div>
                <a href="<?php  echo base_url('user/viewstudentlist'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
			 <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?php $query = $this->db->query('SELECT * FROM tbl_users where roleId = 2');
                    echo $query->num_rows(); ?></h3>
                  <p>List of Moderator</p>
                </div>
                <div class="icon">
                  <i class="fa fa-users"></i>
                </div>
                <a href="<?php  echo base_url('user/view_modrator'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
			<div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php $query = $this->db->query('SELECT * FROM tbl_users where roleId = 3');
                    echo $query->num_rows(); ?></h3>
                  <p>List of Data Entry Operator</p>
                </div>
                <div class="icon">
                  <i class="fa fa-users"></i>
                </div>
                <a href="<?php  echo base_url('user/view_data_entry_operator'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            
          
          </div>
    </section>
</div>