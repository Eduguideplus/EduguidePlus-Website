<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
     SOLVER LIST
       
        
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
             
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>index.php/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li>SOLVER</li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
            
            <!-- /.box-header -->
            
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Solver(<?php echo count($solver); ?>)</h3>
            </div>
            <!-- /.box-header -->
            
            
            <table width="100%">
            <tr>
              <!-- <td width="50%"><a href="<?php echo base_url();?>index.php/manage_career/add" class="btn btn-primary btn-action" title="Add"><i class="fa fa-pencil-square-o"></i> Add Requirment</a></td> -->

              <td width="50%">
              <!--<span style="padding-left: 80.5%">-->
              <a href="javascript:void(0)" class="btn btn-success btn-action" title="Active"  onclick="change_sts_active('active')"><i class="fa fa-pencil-square-o" ></i> Active</a>

                <a href="javascript:void(0)" class="btn btn-danger btn-action" title="Inactive" onclick="change_sts_active('inactive')"><i class="fa fa-pencil-square-o" ></i> Inactive</a>

                <!-- <a href="javascript:void(0)" class="btn btn-danger btn-action" title="Selected Delete" onclick="delete_selected()"><i class="fa fa-trash-o"></i> Delete</a> -->
            </td>
            </tr>
            </table>
            
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead class="bg-blue">
                <tr>
                  <th><input type="checkbox" name="all" id="all_chk"onclick="check_all()"></th>
				          <th>Status</th>
				         <!--  <th>Profile Picture</th>
                  <th>User Code</th> -->
                  <th>Name</th>	
                  <th>Email Id.</th> 
                  <th>Contact No.</th> 
                   <th>Qualification</th> 
                     <th>Experts In</th> 
                   <!--  <th>Address</th>  
                 
                   <th>Action</th> -->
                   </tr>
                </thead>
                <tbody>

               <?php
                
                foreach($solver as $row)
                {

$expert_in= $this->common_model->common($table_name = 'tbl_user_expert_in', $field = array(), $where = array('user_id'=>$row->id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
                   

					         
                ?>
               
                <tr>
				
                <td><input type="checkbox" name="record" value="<?php echo $row->id;?>"></td>
				        <td><img src="<?php 

                  $sts=$row->status;
                  if($sts=="Active")
                                    {
                  echo base_url()."images/active.png";
                  }
                  else
                  {
                    echo base_url()."images/inactive.png";
                  }?>">

                </td>
				       <!--  <td>
                  <?php if($row->profile_photo!=''){ ?><img src="<?php echo base_url();?>../assets/uploads/profile_image/<?php echo $row->profile_photo;?>" height="80px" width="80px" style="border-radius: 50%"></img>
                <?php } else { ?> 
                  <img src="<?php echo base_url();?>../assets/uploads/user/no-img-profile.png" height="80px" width="80px" style="border-radius: 50%">
                <?php } ?>
                </td> 
                <td><?php echo $row->user_code;?></td>-->
                <td><?php echo $row->user_name;?></td>
                <td><?php echo $row->login_email;?></td>
                <td><?php echo $row->login_mob;?></td>
                <td><?php echo $row->qualification;?></td>
                 <td><?php if(count($expert_in)>0){
for ($i=0; $i < count($expert_in) ; $i++) { 

                  $subject= $this->common_model->common($table_name = 'tbl_question_section', $field = array(), $where = array('id'=>@$expert_in[$i]->subject_expert_in), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

$exam_dtls=$this->admin_model->selectone('tbl_exam_type','id',$subject[0]->exam_id);

                    $group_id=@$exam_dtls[0]->exam_type_id;

                    $group_dtls=$this->admin_model->selectone('tbl_exam_type','id',$group_id);

                echo @$group_dtls[0]->exam_name.' >> '.@$exam_dtls[0]->exam_name.' >> '.@$subject[0]->section_name.' , ';  
} } ?></td>
             <!--   <td><?php echo $row->user_address;?></td> -->
                

                
				<!--  
				  <td> 
                   <a href="<?php echo base_url();?>index.php/manage_user/details_view/<?php echo $row->id;  ?>" class="btn btn-success btn-action" title="View Details"><i class="fa fa-eye view"></i></a>
                   <a href="<?php echo base_url();?>index.php/manage_user/user_plan_list/plans/<?php echo $row->id;  ?>" class="btn btn-success btn-action" title="Plan Details"><i class="fa fa-shopping-bag"></i></a>

                   <a href="<?php echo base_url();?>index.php/manage_user/verify_email/<?php echo $row->id;  ?>" class="btn btn-success btn-action" title="Plan Details">Email Verify</a>
                   
         </td> --> 
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
  window.location=baseurl+'index.php/manage_career/delete/'+id;
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
              
             url:base_url+'index.php/manage_user/change_to_active',
             data:{id:test_ids,status:val},
             dataType: "json",
             type: "POST",
             success: function(data){


              var perform= data.changedone;

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
function delete_selected()
{
	 var gal_ids =[];

            $.each($("input[name='record']:checked"), function()
            {            
                gal_ids.push($(this).val());
            });

           //alert(gal_ids[0]);
            var base_url='<?php echo base_url(); ?>';
            if(gal_ids.length>0)
            {

            $.ajax({
              
             url:base_url+'index.php/testimonial/delete_selected',
             data:{galid:gal_ids},
             dataType: "json",
             type: "POST",
             success: function(data){


              var perform= data.deletedone;

                 if(perform==1)
                 {
                   alert('Selected Items deleted successsfully');
                   location.reload();
                 }
                
                if(perform==2)
                 {
                   alert('Selected Items deleted successsfully');
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