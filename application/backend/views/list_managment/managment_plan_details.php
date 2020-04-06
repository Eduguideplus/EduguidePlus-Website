<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
     USER PLAN LIST
       
        
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
        <li>USER</li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
            
            <!-- /.box-header -->
            
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Plan(<?php echo count($user_plan_details); ?>)</h3>
            </div>
            <!-- /.box-header -->
            
            
            <table width="100%">
            <tr>
              <td width="50%"><a href="<?php echo base_url();?>index.php/manage_user/list_view" class="btn btn-danger btn-action" title="Back"><i class="fa fa-backword"></i> Back</a></td> 
                
              <td width="20%">
              <!--<span style="padding-left: 80.5%">-->
              <!-- <a href="javascript:void(0)" class="btn btn-success btn-action" title="Active"  onclick="change_sts_active('active')"><i class="fa fa-pencil-square-o" ></i> Active</a>
              
                <a href="javascript:void(0)" class="btn btn-danger btn-action" title="Inactive" onclick="change_sts_active('inactive')"><i class="fa fa-pencil-square-o" ></i> Inactive</a> -->              
                <!-- <a href="javascript:void(0)" class="btn btn-danger btn-action" title="Selected Delete" onclick="delete_selected()"><i class="fa fa-trash-o"></i> Delete</a> -->
           <!--  <select class="form-control" onchange="change_plan_type(this.value)">
             <option value="">Show Plans by Type</option>
             <option value="General">General Plans</option>
             <option value="Customarized">Customarized Plans</option>
           </select>
            -->
            </td>

            </tr>
            </table>
            
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr class="bg-blue">
                  <th>Sl No.</th>
				          
				          <th>Plan Name</th>
                  <th>Plan Code</th>
                  <th>Plan Price</th>
                  <th>Plan Validity(Month)</th>	
                  <th>Subscription Date</th> 
                  
                   </tr>
                </thead>
                <tbody>

               <?php
                $i=0;
                foreach($user_plan_details as $row)
                {
                  $i++;


					
                ?>
               
                <tr>
				
                <td><?php echo $i;?> .</td>
				       

				        <td>
                 <?php 

                   $plan_dtls = $this->common_model->common($table_name = 'tbl_plan', $field = array(), $where = array('id'=>$row->plan_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

                 echo @$plan_dtls[0]->plan_title;?>
                </td>

                <td><?php echo @$row->plan_code;?></td>
                <!-- <td>
                <?php 
                if($this->uri->segment(2)=='plan_filter')
                {
                  $plan_u_id = $row->user_id;
                  $plan_user = $this->common_model->common($table_name = 'tbl_user_plan_details', $field = array(), $where = array('user_id'=>$plan_u_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
                  //echo $plan_user_id;
                  $plan_user_id = @$plan_user[0]->id;
                }
                else
                {
                  $plan_user_id = $row->id;
                   //echo $plan_user_id;
                }
                  
                  //echo $plan_user_id;
                  $plan_company = $this->common_model->common($table_name = 'tbl_user_plan_company', $field = array(), $where = array('user_plan_id'=>$plan_user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
                  
                  $i=0;
                  foreach($plan_company as $company)
                  {
                    $i++;
                    $auto_company_id = $company->company_id;
                
                    $company_name = $this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>$auto_company_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
                    
                    echo $i;?> . <?php echo  @$company_name[0]->exam_name; ?><br><?php
                  }
                  ?>
                </td> -->
                <td>Rs. <?php 
                   echo  $row->plan_amount;
                

               

               ?></td>
               
                <td><?php echo @$row->plan_validity;?></td>
                <td><?php echo @$row->created_on;?></td>
               
               
                

                
				 
				 <!--  <td> 
                             <a href="<?php echo base_url();?>index.php/manage_user/details_view/<?php echo $row->id;  ?>" class="btn btn-success btn-action" title="View Details"><i class="fa fa-eye view"></i></a>
                             <a href="<?php echo base_url();?>index.php/manage_user/details_view/<?php echo $row->id;  ?>" class="btn btn-success btn-action" title="Plan Details"><i class="fa fa-shopping-bag"></i></a>
                             
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

        <script type="text/javascript">
          function change_plan_type(plan_type)
          {
              //alert(plan_type);
              window.location.href="<?php echo base_url();?>index.php/manage_user/plan_filter/"+plan_type+'/'+<?php echo $this->uri->segment(4);?>;
          }
        </script>