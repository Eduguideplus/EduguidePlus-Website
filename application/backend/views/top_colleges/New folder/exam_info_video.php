<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       VIDEO'S
       
        
      </h1>
      <small><?php
            $succ_msg=$this->session->flashdata('succ_msg');
            if($succ_msg){
              ?>
              <br><span style="color:green">
                <?php echo $succ_msg; ?>
              </span>
              <?php
              }
              ?>
              
              </small>
              <small id="msg" style="color:red"></small>
              
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li>Examination Information</li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
            
            <!-- /.box-header -->
            
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Video's(<?php echo count($video_info);?>)</h3>
            </div>
            <!-- /.box-header -->
            
            <table width="100%">
            <tr>
              <!-- <td width="50%"><a href="<?php echo base_url();?>index.php/manage_exam_type/add_exam_info/<?php echo $this->uri->segment(3); ?>" class="btn btn-primary btn-action" title="Add"><i class="fa fa-pencil-square-o"></i> Add </a></td> -->

              <td width="50%">
              <!--<span style="padding-left: 80.5%">-->
              <a href="javascript:void(0)" class="btn btn-success btn-action" title="Active"  onclick="change_sts_active('active')"><i class="fa fa-pencil-square-o" ></i> Active</a>

                <a href="javascript:void(0)" class="btn btn-danger btn-action" title="Inactive" onclick="change_sts_active('inactive')"><i class="fa fa-pencil-square-o" ></i> Inactive</a>


                <a href="<?php echo base_url();?>index.php/manage_exam_type/add_single_video/<?php echo $this->uri->segment(3); ?>/<?php echo @$video_info[0]->exam_info_id;?>" class="btn btn-success" title="Update Video Title">Add Youtube Video</a>

                 <div class="prepare-sec">
                     <div class="col-md-12">
                       <h3><?php echo $video_info[0]->video_title; ?></h3>
                        <a href="<?php echo base_url();?>index.php/manage_exam_type/edit_video_title/<?php echo $this->uri->segment(3); ?>/<?php echo @$video_info[0]->exam_info_id;?>" title="Update Video Title">Update</a>
                     </div>
                   
                 </div>
                 
                <!-- <label style="color: blue; width: 25px;"><?php echo $video_info[0]->video_title; ?></label> -->

                <!--<a href="javascript:void(0)" class="btn btn-danger btn-action" title="Selected Delete" onclick="delete_selected()"><i class="fa fa-trash-o"></i> Delete</a>-->
            </td>
            </tr>
           
            </table>
            
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead class="bg-blue">
                <tr>
                  <th><input type="checkbox" name="all_chk" id="all_chk" onclick="check_all()"></th>
                  <th>Status</th>
                  
                  <!-- <th>Title</th> -->
                  
                   
                   <th>Video</th>
                 
                                                                              
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

              
               <?php
               foreach($video_info as $row)
               {

                    
               ?>
                
                <tr>
                  <td><input type="checkbox" name="record" value="<?php echo $row->video_id;?>"></td>
                  <td>
                  <?php if($row->status=='active')
                  {?>
                     <img src="<?php echo base_url();?>../assets/images/active.png">
                  <?php 
                  }
                  else{ ?>
                     <img src="<?php echo base_url();?>../assets/images/inactive.png">
                  <?php
                  }  ?>
                  </td>

                 
                  
                  <!-- <td><?php echo $row->video_title; ?></td> -->
                
                  <td> <iframe width="140" height="125"
                              src="<?php echo $row->video; ?>">
                           </iframe> 

                           

                  </td>
                  
                

                  
                  <td> <a href="<?php echo base_url();?>index.php/manage_exam_type/edit_video/<?php echo $this->uri->segment(3); ?>/<?php echo $row->video_id;?>" class="btn btn-info btn-action" title="View & Edit"><i class="fa fa-pencil-square-o"></i></a>

                    
                    <button type="button" class="btn btn-danger" onclick="return delete_data(<?php echo $row->video_id;?>)" title="Delete"><i class="fa fa-trash-o"></i></button> 
                   
                 

                   
                   


               </td>
                </tr>

                <?php
              }
              ?>

                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    </div>
    </div>
    <script>
function delete_data(id)
{
 
if(confirm("Are you sure ?"))
{
var baseurl='<?php echo  base_url();?>';
window.location=baseurl+'index.php/manage_exam_type/delete_video/'+id+'/'+'<?php echo $this->uri->segment(3)?>/'+'<?php echo @$video_info[0]->exam_info_id;?>';
}
}

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">
function check_all()
{
  
   if ($("#all_chk").is(':checked')) {
            $("input[name=record]").each(function () {
                $(this).prop("checked", true);
            });

        } 
        else {
            $("input[name=record]").each(function () {
                $(this).prop("checked", false);
            });
          }
}
  </script>

  <script type="text/javascript">

   function change_sts_active(val)
        {
          
            var cat_ids =[];

            $.each($("input[name='record']:checked"), function()
            {            
                cat_ids.push($(this).val());
            });

            //alert(cat_ids[0]);
            var base_url='<?php echo base_url(); ?>';
            if(cat_ids.length>0)
            {

            $.ajax({
              
             url:base_url+'index.php/manage_exam_type/change_to_active_video',
             data:{catid:cat_ids,status:val},
             dataType: "json",
             type: "POST",
             success: function(data){


              var perform= data.changedone;

                 if(perform==1)
                 {
                   alert('Status changed successsfully.');
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