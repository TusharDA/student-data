<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> 
        <i class="fa fa-tachometer" aria-hidden="true"></i>Data Entry Operator
        <small>Control panel</small>
      </h1>
    </section>
    
    <section class="content">
        <div class="row">
			<div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?php $query= $this->db->query('SELECT * FROM student'); 
                  echo $query->num_rows(); ?></h3>
                  <p>New Student</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="<?php echo base_url('user/viewstudent'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
			 <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
<<<<<<< HEAD
                  <h3><?php $query= $this->db->query('SELECT * FROM student'); 
                  echo $query->num_rows(); ?></h3>
                  <p>Total Students</p>
=======
                  <h3>150</h3>
                  <p>Total Standards</p>
>>>>>>> ff6cfda8934382dcfd113314f3d0a98ed9cdc548
                </div>
                <div class="icon">
                  <i class="fa fa-users"></i>
                </div>
                <a href="<?php  echo base_url('user/viewstudentlist'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
<<<<<<< HEAD
            </div><!-- ./col -->
			 <div class="col-lg-3 col-xs-6">
=======
            </div>
			<div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3>150</h3>
                  <p>Total Divisions</p>
                </div>
                <div class="icon">
                  <i class="fa fa-users"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-3 col-xs-6">
>>>>>>> ff6cfda8934382dcfd113314f3d0a98ed9cdc548
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
<<<<<<< HEAD
                  <h3>15</h3>
                  <p>Total Standards</p>
=======
                  <h3>44</h3>
                  <p>New Student</p>
>>>>>>> ff6cfda8934382dcfd113314f3d0a98ed9cdc548
                </div>
                <div class="icon">
                  <i class="fa fa-users"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
			<div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3>10</h3>
                  <p>Total Divisions</p>
                </div>
                <div class="icon">
                  <i class="fa fa-users"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            
          
          </div>
    </section>
</div>