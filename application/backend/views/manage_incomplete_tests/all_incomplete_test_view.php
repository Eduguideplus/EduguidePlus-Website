

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       ALL INCOMPLETE TEST
       
        
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
              
     <!--  <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?php echo base_url()?>index.php/manage_set/show_set_details">Examination Set Listing</a></li>
        
      </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
            
            <!-- /.box-header -->
            
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Total incomplete Test(<?php echo count($incomplete_test);?>)</h3>
            </div>
            <!-- /.box-header -->
            
            
            
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                 
                  <th>Test By</th>
                  <th>Plan Name</th>
                  <!-- <th>Request Date<th> -->
                  <th>Set Name</th>
                  <th>Exam Created on</th>
                  <th>Plan Validity</th> 
                  <th>Action</th>
               
                </tr>
                </thead>
                <tbody>

              
               <?php
               if(count(@$incomplete_test)>0)
               {
               foreach(@$incomplete_test as $row)
               {
                $user=$this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>$row->user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

                $set_dtls=$this->common_model->common($table_name = 'tbl_set', $field = array(), $where = array('id'=>$row->set_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

                $plan_dtls=$this->set_model->get_plan_details($row->user_plan_id,$row->user_id);
                

                 $exam_dtls=$this->common_model->common($table_name = 'tbl_user_exam', $field = array(), $where = array('set_id'=>$row->set_id,'user_id'=>$row->user_id,'user_plan_id'=>$row->user_plan_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


                //print_r($plan_dtls);

                //$set=$this->common_model->common($table_name = 'tbl_set', $field = array(), $where = array('exam_id'=>$row->exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
               ?>
                
                <tr>
                 
               
                  <td><?php echo @$user[0]->first_name; ?> </td>
                  <td> <?php echo @$plan_dtls[0]->plan_title; ?></td>
                  <td><?php echo @$set_dtls[0]->set_name; ?></td>
                  <td> <?php echo @$row->created_on;?></td>
                  <td><?php echo @$plan_dtls[0]->validity_date; ?></td>
                
                  <td><span id="stat"> <a href="javascript:void(0)" class="btn btn-info btn-action" title="View" onclick="send_notification('<?php echo @$user[0]->first_name;?>','<?php echo @$plan_dtls[0]->plan_title;?>','<?php echo @$set_dtls[0]->set_name; ?>','<?php echo @$row->created_on;?>');">Send Mail To Notify</a></span>
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


    <script>
    function send_notification(user,plan_name,set_name,created_on)
    {
      alert('ok');
      var base_url='<?php echo base_url(); ?>';

      // $.ajax({
              
      //        url:base_url+'index.php/manage_resume/change_status',
      //        data:{stat:val,resume_id:id},
      //        dataType: "json",
      //        type: "POST",
      //        success: function(data){


      //         var perform= data.workdone;

      //            if(perform['status']==1)
      //            {
      //              alert('Status changed successsfully.');
      //              location.reload();
      //            }
                
      //         }
      //        });

    }
    </script>
    <script>
function delete_data(id)
{
 
if(confirm("Are you sure ?"))
{
var baseurl='<?php echo  base_url();?>';
window.location=baseurl+'index.php/manage_set/delete/'+id;
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
          
            var com_ids =[];

            $.each($("input[name='record']:checked"), function()
            {            
                com_ids.push($(this).val());
            });

            //alert(cat_ids[0]);
            var base_url='<?php echo base_url(); ?>';
            if(com_ids.length>0)
            {

            $.ajax({
              
             url:base_url+'index.php/manage_company/change_to_active',
             data:{id:com_ids,status:val},
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