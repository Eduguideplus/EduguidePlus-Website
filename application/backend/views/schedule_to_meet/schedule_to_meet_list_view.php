<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Meeting Schedule List
       
        
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
        <li>Meeting Schedule List</li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
            
            <!-- /.box-header -->
            
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All (<?php echo count($exam_type);?>)</h3>
            </div>
            <!-- /.box-header -->
            
            <table width="100%">
            <tr>
              <!-- <td width="50%"><a href="<?php echo base_url();?>index.php/manage_exam_type/add" class="btn btn-primary btn-action" title="Add"><i class="fa fa-pencil-square-o"></i> Add </a></td> -->

              <!-- <td width="50%">
              
              <a href="javascript:void(0)" class="btn btn-success btn-action" title="Active"  onclick="change_sts_active('active')"><i class="fa fa-pencil-square-o" ></i> Active</a>

                <a href="javascript:void(0)" class="btn btn-danger btn-action" title="Inactive" onclick="change_sts_active('inactive')"><i class="fa fa-pencil-square-o" ></i> Inactive</a>

               
            </td> -->
            </tr>
            </table>
            
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead class="bg-blue">
                <tr>
                 
                  <th>Sl No.</th>
                  <th>Unique Id</th>
                  <th>User Name</th>
                  <th>Schedule Time</th>
                  <th>Schedule Day</th>
                  <th>Interested Course</th> 
                  <th>Meeting Date</th> 

                  
                                                                             
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

              
               <?php $i=0;
               foreach($exam_type as $row)
               { $i++;

                    $user_details= $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>$row->user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
               ?>
                
                <tr>
                  <td><?php echo $i;?></td>
                  <td>
                  <?php echo $row->schedule_unique_id;?>
                  </td>

                 <td>
                  <?php echo $user_details[0]->user_name;?>
                   
                 
                  </td>



                  <td><?php echo $row->schdule_time;?> </td> 







                  
                  
                
                  <td><?php echo $row->schdule_day;?></td>
                 
                 <td><?php echo @$row->interested_course;?></td>
                 <td><?php echo @$row->created_date;?></td>

                  
                  <td> 

                   
                    <button type="button" class="btn btn-danger" onclick="return delete_data(<?php echo $row->shedule_to_meet_id;?>)" title="Delete"><i class="fa fa-trash-o"></i></button> 
                   

                   
                   


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
window.location=baseurl+'index.php/manage_schedule_to_meet/delete_data/'+id;
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
              
             url:base_url+'index.php/manage_exam_type/change_to_active',
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




        <script type="text/javascript">

          function change_online_exam(id)
          {
            //alert(id);
          
          if(confirm("Are you sure ?"))
          {
          var base_url='<?php echo  base_url();?>';

          $.ajax({
                        
              url:base_url+'index.php/manage_exam_type/online_exam_change',
              data:{pid:id},
              dataType: "json",
              type: "POST",
              success: function(data){


                var perform= data.changedone;

                      if(perform['status']==1)
                      {
                        
                       var node ='<span class="label label-success" onclick="change_online_exam('+id+')" style="cursor: pointer;"><em>Yes</em></span>';

                        $("#pro_trending_"+id).html(node);
                      }
                      else
                      {
                        
                        var node ='<span class="label label-danger" onclick="change_online_exam('+id+')" style="cursor: pointer;">No</em></span>';

                        $("#pro_trending_"+id).html(node);
                      }
                
                  }
              });


}
}
</script>