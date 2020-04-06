<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       MANAGE BATCH 
       
        
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
        <li><a href="<?php echo base_url()?>index.php/manage_category/category_view">Category</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
            
            <!-- /.box-header -->
            
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Total Batch(<?php echo count($batch);?>)</h3>
            </div>
            <!-- /.box-header -->
            
            <table width="100%">
            <tr>
              <td width="50%"><a href="<?php echo base_url();?>index.php/manage_batch/add_batch" class="btn btn-primary btn-action" title="Add"><i class="fa fa-pencil-square-o"></i> Add Batch </a></td>

              <td width="50%">
              <!--<span style="padding-left: 80.5%">-->
              <a href="javascript:void(0)" class="btn btn-success btn-action" title="Active"  onclick="change_sts_active('active')"><i class="fa fa-pencil-square-o" ></i> Active</a>

                <a href="javascript:void(0)" class="btn btn-danger btn-action" title="Inactive" onclick="change_sts_active('inactive')"><i class="fa fa-pencil-square-o" ></i> Inactive</a>

                <!--<a href="javascript:void(0)" class="btn btn-danger btn-action" title="Selected Delete" onclick="delete_selected()"><i class="fa fa-trash-o"></i> Delete</a>-->
            </td>
            </tr>
            </table>
            <?php 
            $city=@$user_detail[0]->city_id;
            $city_list= $this->common_model->common($table_name ='cities', $field = array(), $where = array('id'=>$city), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
?>
            
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead class="bg-blue">
                <tr>
                  <th>SL NO</th>
                  <th><input type="checkbox" name="all_chk" id="all_chk" onclick="check_all()"></th>
                  
                  <th>Status</th>
                  <th>Batch Code</th>
                  <th>Batch Country</th>
                  <th>Batch State</th>
                  <th>Batch City</th>
                  <th>Batch Year</th>
                  <!-- <th>Batch Month</th> -->
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

              
               <?php
               $i=0;
               foreach($batch as $row)
               {
                  $i++;
                 ?>
                
                <tr>
                  <td><?php echo $i;?></td>
                  <td><input type="checkbox" name="record" value="<?php echo @$row->batch_id;?>"></td>
                  <td>
                  <?php if(@$row->batch_status=='active')
                  {?>
                     <img src="<?php echo base_url();?>../assets/images/active.png">
                  <?php 
                  }
                  else{ ?>
                     <img src="<?php echo base_url();?>../assets/images/inactive.png">
                  <?php
                  }  ?>
                  </td>
                  <td><?php echo @$row->batch_name;?></td>
                   <td>
                    <?php

                   $country_id=$row->batch_country;
                   $country_list= $this->common_model->common($table_name ='countries', $field = array(), $where = array('id'=>$country_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

                   echo @$country_list[0]->name;?>
                     
                   </td>
                    <td>
                    <?php

                   $state_id=$row->batch_state;
                   $state_list= $this->common_model->common($table_name ='states', $field = array(), $where = array('id'=>$state_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

                   echo @$state_list[0]->name;?>
                     
                   </td>
                  <td>
                    <?php

                   $city_id=$row->batch_city;

                  $city_list= $this->common_model->common($table_name ='cities', $field = array(), $where = array('id'=>$city_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

                   echo @$city_list[0]->name;?>
                     
                   </td>
                  <td><?php echo @$row->batch_year;?></td>
                  <!-- <td><?php echo @$row->batch_month;?></td> -->


                  <td> <a href="<?php echo base_url();?>index.php/manage_batch/edit/<?php echo @$row->batch_id;?>" class="btn btn-info btn-action" title="View & Edit"><i class="fa fa-pencil-square-o"></i></a>
                 

                    <button type="button" class="btn btn-danger" onclick="return delete_data(<?php echo @$row->batch_id;?>)" title="Delete"><i class="fa fa-trash-o"></i></button></td>
              
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
window.location=baseurl+'index.php/manage_batch/delete/'+id;
}
}
/*function change_popularity(id)
{
if(confirm("Are you sure"))
{
var baseurl='<?php echo  base_url();?>';
window.location=baseurl+'index.php/manage_category/popularity_change/'+id;
}
}*/
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
          
            var batch_id =[];

            $.each($("input[name='record']:checked"), function()
            {   
                // alert($(this).val());         
                batch_id.push($(this).val());
            });

            //alert(cat_ids[0]);
            var base_url='<?php echo base_url(); ?>';
            if(batch_id.length>0)
            {

            $.ajax({
              
             url:base_url+'index.php/manage_batch/change_to_active',
             data:{id:batch_id,status:val},
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