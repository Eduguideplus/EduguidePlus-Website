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
      <h3> JOB SEEKER MANAGMENT
        <small></small>
      </h3>

        <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Job Seeker Managment</li>
      </ol>
    </section>

  <!-- Main content -->
    <section class="content">
      <!-- //////////////////////////////////////////////////////////////////////////// -->
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">

              
        
              <h3 class="box-title"> Job Seeker List(<?php echo count($job_seeker_details);?>)</h3>
              
            </div>
            <!-- /.box-header -->

            <form>
            <div style="padding-left: 12px;padding-top: 12px;">
           <!--  <button type="button" class="btn btn-primary" onClick="window.location='<?php echo base_url();?>index.php/manage_career/add_view';"><span class="glyphicon glyphicon-plus"></span> Add New Job</button> -->

          <a href="javascript:void(0)" class="btn btn-success btn-action" title="Active"  onclick="change_sts_active('active')"><i class="fa fa-pencil-square-o"  ></i> Active</a>

          <a href="javascript:void(0)" class="btn btn-danger btn-action" title="Inactive" onclick="change_sts_active('inactive')"><i class="fa fa-pencil-square-o" ></i> Inactive</a>
             
            </div>

           
            <div class="box-body table-responsive">

           
              <table id="example1" class="table table-bordered table-striped myTable1">
              
               <thead>
                <tr  class="bg-blue">
                <th><input type="checkbox" name="all" id="all_chk"onclick="check_all()"></th>
                 
                  <th>Status</th>
                 <th>Candidate Name</th>
                  <th>Email</th>
                  <th>Phone NO.</th>
                  <th>Subject</th>
                  <th>Message</th>
                  <th>Job Name</th>
                  <th>Attach File</th>
                  <th>Action</th>                
                  
                  <!-- <th>Edited Date</th>  -->
                                  
                     
                </tr>
               </thead>

               <tbody>
                     <?php 
                     if(count($job_seeker_details) > 0)
                    {
                      
                      foreach($job_seeker_details as $row)
                     {
                    
                   $job=$this->common_model->common($table_name = 'tbl_career', $field = array(), $where = array('job_alert_id'=>$row->job_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');  
                     ?>            
                    <tr>
                    <td><input type="checkbox" name="record" value="<?php echo $row->job_seeker_id;?>"></td>
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
                    <td><?php if(!empty($row->candidate_name)){ echo $row->candidate_name; } else{ echo 'N/A'; } ?></td>
                    <td><?php if(!empty($row->email)){ echo $row->email; } else{ echo 'N/A'; } ?></td>
                     <td><?php if(!empty($row->phone_number)){ echo $row->phone_number; } else{ echo 'N/A'; } ?></td>
                     <td><?php if(!empty($row->subject)){ echo $row->subject; } else{ echo 'N/A'; } ?></td>

                     <td><?php if(!empty($row->message)){ echo $row->message; } else{ echo 'N/A'; } ?></td>    
                            <td><?php if(!empty($job[0]->job_title)){ echo @$job[0]->job_title; } else{ echo 'N/A'; } ?></td>  
                          
                         <td>
                          <?php
                            if(!empty($row->candidate_resume)){ ?>
                            <a target="_blank" href="<?php echo base_url();?>../assets/uploads/career_cv/<?php echo $row->candidate_resume; ?>"><embed src="<?php echo base_url();?>../assets/uploads/career_cv/<?php echo $row->candidate_resume; ?>" height="100" width='100'></embed></a> 
                            <?php
                          }
                          else
                            {
                              echo "N/A" ;
                            }
                            ?>
                        </td> 

                        <td>
                          <button type="button" class="btn btn-danger" onclick="delete_data(<?php echo $row->job_seeker_id;  ?>)" title="Delete"><i class="fa fa-trash-o"></i></button>
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
          window.location=baseurl+'index.php/job_seeker/delete_career/'+id;

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
              
             url:base_url+'index.php/job_seeker/change_to_active',
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

  


  

 

  