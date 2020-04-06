 <?php
    $role_id= $this->session->userdata('session_role_id');
 ?>      
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <?php
            $succ_delete=$this->session->flashdata('succ_delete');
            if($succ_delete){
              ?>
              <br><span style="color:red">
                <b><?php echo $succ_delete; ?></b>
              </span>
              <?php
              }
              ?>
              <?php
            $err_delete=$this->session->flashdata('err_delete');
            if($err_delete){
              ?>
              <br><span style="color:red">
                <b><?php echo $err_delete; ?></b>
              </span>
              <?php
              }
              ?>
              <?php
            $succ_update=$this->session->flashdata('succ_update');
            if($succ_update){
              ?>
              <br><span style="color:green">
                <b><?php echo $succ_update; ?></b>
              </span>
              <?php
              }
              ?>
              <?php
            $succ_add=$this->session->flashdata('succ_add');
            if($succ_add){
              ?>
              <br><span style="color:green">
                <b><?php echo $succ_add; ?></b>
              </span>
              <?php
              }
              ?>
      <h3> JOB CAREER
        <small></small>
      </h3>

        <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Job List</li>
      </ol>
    </section>

  <!-- Main content -->
    <section class="content">
      <!-- //////////////////////////////////////////////////////////////////////////// -->
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">

              
        
              <h3 class="box-title"> Job List(<?php echo count($career_details);?>)</h3>
              
            </div>
            <!-- /.box-header -->

            <form>
            <div style="padding-left: 12px;padding-top: 12px;">
            <button type="button" class="btn btn-primary" onClick="window.location='<?php echo base_url();?>index.php/manage_career/add_view';"><span class="glyphicon glyphicon-plus"></span> Add New Job</button>

          <a href="javascript:void(0)" class="btn btn-success btn-action" title="Active"  onclick="change_sts_active('active')"><i class="fa fa-pencil-square-o"  ></i> Active</a>

          <a href="javascript:void(0)" class="btn btn-danger btn-action" title="Inactive" onclick="change_sts_active('inactive')"><i class="fa fa-pencil-square-o" ></i> Inactive</a>
             
            </div>

           
            <div class="box-body table-responsive">

           
              <table id="example1" class="table table-bordered table-striped myTable1">
              
               <thead>
                <tr  class="bg-blue">
                <th><input type="checkbox" name="all" id="all_chk"onclick="check_all()"></th>
                 
                  <th>Status</th>
                 <th>Job Name</th>
                  <th>Work Location</th>
                  <th>Vacancy</th>
                  <th>Qualifications</th>
                  <th>Exerience</th>
                  <th>Job Requirment</th>
                  <th>Action</th>                  
                  
                  <!-- <th>Edited Date</th>  -->
                                  
                     
                </tr>
               </thead>

               <tbody>
                     <?php 
                     if(count($career_details) > 0)
                    {
                      
                      foreach($career_details as $row)
                     {
                      
                     ?>            
                    <tr>
                    <td><input type="checkbox" name="record" value="<?php echo $row->job_alert_id;?>"></td>
                    <td>
                  <?php if($row->status=='active')
                  {?>
                     <img src="<?php echo base_url();?>../assets/uploads/active.png">
                  <?php 
                  }
                  else{ ?>
                     <img src="<?php echo base_url();?>../assets/uploads/inactive.png">
                  <?php
                  }  ?>
                  </td>
                        
                   <!--  <td><?php if(!empty($row->job_image)){ ?><embed src="<?php echo base_url();?>../assets/uploads/career/<?php echo $row->job_image; ?>"  height="50" width='90' class="img-responsive" ><?php } else{ echo 'N/A';} ?> </td>
                        -->
                    <td><?php if(!empty($row->job_title)){ echo $row->job_title; } else{ echo 'N/A'; } ?></td>
                    <td><?php if(!empty($row->work_location)){ echo $row->work_location; } else{ echo 'N/A'; } ?></td>
                     <td><?php if(!empty($row->vacancy)){ echo $row->vacancy; } else{ echo 'N/A'; } ?></td>
                     <td><?php if(!empty($row->requisite_qualification)){ echo $row->requisite_qualification; } else{ echo 'N/A'; } ?></td>

                     <td><?php if(!empty($row->experience)){ echo $row->experience; } else{ echo 'N/A'; } ?></td>    
                       
                          <td><?php if(!empty($row->job_requirment)){ echo character_limiter($row->job_requirment,50); } else{ echo 'N/A'; } ?></td>    
                        <td>
                          
                             <a href="<?php echo base_url();?>index.php/manage_career/get_edit_details/<?php echo $row->job_alert_id;?>" class="btn btn-info" ><i class="fa fa-pencil-square-o" title="edit"></i></a>
                             <a type="button" class="btn btn-danger" onclick="return delete_data('<?php echo $row->job_alert_id;?>')" ><i class="fa fa-trash-o" title="delete"></i></a>

                        </td>
                       
                     </tr>
                     <?php
                     } 
                     }?>
   
                </tbody>

                
              </table>
            </div>
            <!-- /.box-body -->
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- ////////////////////////////////////////////////////////////////////////////////// -->
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">
function check_all()
{
  
   if ($("#all_chk").is(':checked')) 
        {
            $("input[name=record]").each(function () {
                $(this).prop("checked", true);
            });

        } 
        else 
        {
            $("input[name=record]").each(function () {
                $(this).prop("checked", false);
            });        
        }
}

function delete_data(id)
{
  //alert(id);
    if(confirm("Are you sure"))
      {
          var baseurl='<?php echo  base_url();?>';
          window.location=baseurl+'index.php/manage_career/delete_career/'+id;

      }
}
</script>

<script type="text/javascript">

        function change_sts_active(val)
        {
          
            var test_ids =[];

            $.each($("input[name='record']:checked"), function()
            {            
                test_ids.push($(this).val());
            });

            //alert(cat_ids[0]);
            var base_url='<?php echo base_url(); ?>';
            if(test_ids.length>0)
            {

            $.ajax({
              
             url:base_url+'index.php/manage_career/change_to_active',
             data:{id:test_ids,status:val},
             dataType: "json",
             type: "POST",

             success: function(data){


              var perform=data.changedone;

                 if(perform==1)
                 {
                   alert('Status changed successsfully');
                   location.reload();
                 }
                
              }
             });
          }
          else
          {
            alert('Sorry!! please select any records');
          }
}
</script>

  


  

 

  