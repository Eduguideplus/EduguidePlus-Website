<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
     STUDENT LIST
       
        
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
        <li>Student</li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
            
            <!-- /.box-header -->
            
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Student(<?php echo count($user); ?>)</h3>
            </div>
            <!-- /.box-header -->
            
            
            <table width="100%">
            <tr>
              <td width="50%"><a href="<?php echo base_url();?>index.php/manage_user/add_student" class="btn btn-primary btn-action" title="Add"><i class="fa fa-pencil-square-o"></i> Add Student</a></td>

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
				          
				          <th>Registration time</th>
                  <th>User Code</th>
                  <th>Name</th>	
                  <th>Email Id.</th> 
                  <th>Contact No.</th> 
                  <th>Date Of Birth</th> 
                  <!-- <th>Batch</th>  -->
                  <th>City</th>

                
                 
                   <th>Action</th> 
                   </tr>
                </thead>
                <tbody>

               <?php
                
                foreach($user as $row)
                {
                   $batch_id= $row->batch_id;

                 $batch_details = $this->common_model->common($table_name = 'tbl_batch', $field = array(), $where = array('batch_id'=>$batch_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

                 $city_id= $row->city;

                  $city_details = $this->common_model->common($table_name = 'cities', $field = array(), $where = array('id'=>$city_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

					         if(@$row->user_type_id!=3 && @$row->user_type_id!=1)
                   {
                ?>
               
                <tr>
				
                <td><input type="checkbox" name="record" value="<?php echo $row->id;?>"><br>
                <img style="width:50%" src="<?php 

                  $sts=$row->status;
                  if($sts=="Active")
                                    {
                  echo base_url()."images/active.png";
                  }
                  else
                  {
                    echo base_url()."images/inactive.png";
                  }?>"></td>
				       
                <td>
               <?php echo date('jS M Y, H:i:s',strtotime($row->created_on)); ?>
             </td>
				      
                <td><?php echo $row->user_code;?></td>
                <td><?php echo $row->user_name;?></td>
                <td><?php echo $row->login_email;?></td>
                <td><?php echo $row->login_mob;?></td>
                <td><?php echo $row->dob;?></td>
               <!--  <td><?php 
                if($batch_id>0)
                  {
                    echo @$batch_details[0]->batch_name;
                  }
                  else{
                    echo 'No Batch Selected';
                  }
                  ?></td> -->
                <td><?php echo strtoupper(@$city_details[0]->name);?></td>
                
             
                

                
				 
				  <td> 
                   <a href="<?php echo base_url();?>index.php/manage_user/details_view/<?php echo $row->id;  ?>" class="btn btn-success btn-action" title="View Details"><i class="fa fa-eye view"></i></a>

                   <a href="<?php echo base_url();?>index.php/manage_user/edit_view/<?php echo  $row->id;  ?>" class="btn btn-primary btn-action" title="Edit Details" ><i class="fa fa-edit"></i></a>


                   <a href="<?php echo base_url();?>index.php/manage_user/view_password/<?php echo $row->id;  ?>" class="btn btn-info btn-action" title="Change Password"><i class="fa fa-key"></i></a>


                   
         </td> 
            </tr>
                <?php
              
                }}
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


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript">
  function delete_data(id)
  {
    var base_url="<?php echo  base_url();?>";
    Swal.fire({
                 title: 'Are you sure?',
                 type: 'warning',
                 showCancelButton: true,
                 confirmButtonColor: '#3085d6',
                 cancelButtonColor: '#d33',
                 confirmButtonText: 'Yes, delete it!'
               }).then((result) => {
                 if (result.value) {
                   window.location=base_url+'index.php/manage_user/delete_data/'+id;;
                 }
               })
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