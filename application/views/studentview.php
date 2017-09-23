<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <i class="fa fa-users"></i> Student Management
    <small>Add, Edit, Delete</small>
  </h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12 text-right">
            <div class="form-group">
                <a class="btn btn-primary" href="<?php echo base_url(); ?>addNew"><i class="fa fa-plus"></i> Add New</a>
                <a class="btn btn-primary" href="<?php echo base_url('user/viewupload'); ?>"><i class="fa fa-plus"></i> Upload csv file</a>
                <a class="btn btn-primary" href="<?php echo base_url('user/load_student_report'); ?>"><i class="fa fa-plus"></i> Download Excel</a>
          
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
                <h3 class="box-title">Student List</h3>
                <div class="box-tools">
                    <!-- <form action="<?php echo base_url() ?>userListing" method="POST" id="searchList">
                        <div class="input-group">
                          <input type="text" name="searchText" value="" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
                          <div class="input-group-btn">
                            <button class="btn btn-sm btn-default searchList"><i class="fa fa-search"></i></button>
                          </div>
                        </div>
                    </form> -->
                    <form action="<?php echo site_url('user/search_student');?>" method = "post">
                    <input type="text" name = "keyword" />
                    <input type="submit" value = "Search" />
                    </form>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                <th>Sr. No.</th>
                <th>Student Id</th>
                <th>Student Name</th>
                <th>Student Standerd</th>
                <th>Student Mobile No.</th>
                <th>Student Email </th>
                <th>Student Address</th>
                <th class="text-center">Actions</th>
                </tr>
                <?php
                for ($i = 0; $i < count($deptlist); ++$i)
                {
                ?>
                <tr>
                <td><?php echo ($i+1); ?></td>
                <td><?php echo $deptlist[$i]->stud_id; ?></td>
                <td><?php echo $deptlist[$i]->first_name;  ?></td>
                <td><?php echo $deptlist[$i]->standard; ?></td>
                <td><?php echo $deptlist[$i]->contact_no; ?></td>
                <td><?php echo $deptlist[$i]->email_address; ?></td>
                <td><?php echo $deptlist[$i]->padress; ?></td>
                <td class="text-center">
                <a class="btn btn-sm btn-info" href="<?php echo base_url('user/editOldstudent/'.$deptlist[$i]->stud_id) ; ?>"><i class="fa fa-pencil"></i></a>
               <a class="btn btn-sm btn-danger deleteUser" href="<?php echo site_url('user/delete_row/'.$deptlist[$i]->stud_id);?>"><i class="fa fa-trash"></i></a>
                 </td>
                </tr>
                <?php
                    }
            
                ?>
              </table>
              
            </div><!-- /.box-body -->
            <div class="box-footer clearfix">
                
            </div>
          </div><!-- /.box -->
        </div>
    </div>
</section>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
jQuery(document).ready(function(){
    jQuery('ul.pagination li a').click(function (e) {
        e.preventDefault();            
        var link = jQuery(this).get(0).href;            
        var value = link.substring(link.lastIndexOf('/') + 1);
        jQuery("#searchList").attr("action", baseURL + "userListing/" + value);
        jQuery("#searchList").submit();
    });
});
</script>
