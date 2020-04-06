<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      PARTICIPATED USER LIST
       
        
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
        <li><a href="<?php echo base_url()?>index.php/manage_mock/mock_view">Manage Knowledge Set</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
            
            <!-- /.box-header -->
            
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Participated User(<?php echo count($enroll_details);?>)</h3>
            </div>
            <!-- /.box-header -->
            
           <table width="100%">
            <tr>
                <td width="50%">  <a href="<?php echo base_url();?>index.php/manage_knowledge/next_level_list/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4); ?>/<?php echo $this->uri->segment(5); ?>" class="btn btn-danger"><i class="fa fa-backward"></i> Back</a></td>

                   
              <!--<td width="50%"><a href="<?php echo base_url();?>index.php/manage_knowledge/add" class="btn btn-primary btn-action" title="Add"><i class="fa fa-plus-square-o"></i> Add Test </a></td> 
              <td width="50%"><a href="<?php echo base_url();?>index.php/manage_knowledge/add" class="btn btn-primary btn-action" title="Add"><i class="fa fa-plus-square-o"></i> Add Test </a></td>

              <td width="50%">
           
              <a href="javascript:void(0)" class="btn btn-success btn-action" title="Active"  onclick="change_sts_active('active')"><i class="fa fa-pencil-square-o" ></i> Active</a>
              
                <a href="javascript:void(0)" class="btn btn-danger btn-action" title="Inactive" onclick="change_sts_active('inactive')"><i class="fa fa-pencil-square-o" ></i> Inactive</a> 

                <a href="javascript:void(0)" class="btn btn-warning btn-action" title="Pending" onclick="change_sts_active('pending')"><i class="fa fa-pencil-square-o"></i> Pending</a>
            </td>-->
            </tr>
            </table>
             
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead class="bg-blue">
                <tr>
                  <th>Sl NO</th> 
                  <th>Image</th>
                  <th>Name</th>
                  <th>User Code</th>
                  <th>Obtained Marks</th>
                  <th>Rank Index</th>
                  <th>Email</th>
                  <th>Phone No</th>
                </tr>
                </thead>
                <tbody>

                  <?php
                  $i=0;
                  foreach($enroll_details as $row)
                  {
                        $rank_details=$this->common_model->common($table_name='tbl_user_rank',$field = array(),$where=array('set_id'=>$row->set_id,'level_id'=>@$row->level_id,'user_id'=>$row->user_id),$where_or=array(),$like=array(),$like_or=array(),$order=array(),$start='',$end=''); 

                      $user_details= $this->common_model->common($table_name='tbl_user', $field = array(), $where = array('id'=>@$row->user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

                    $i++;
                    ?>

                    <tr>

                      <td><?php echo $i; ?></td>
                      <td>
                        <?php if($user_details[0]->profile_photo!=''){ ?><img src="<?php echo base_url();?>../assets/uploads/profile_image/<?php echo $user_details[0]->profile_photo;?>" height="80px" width="80px" style="border-radius: 50%"></img>
                        <?php } else { ?> 
                        <img src="<?php echo base_url();?>../assets/uploads/user/no-img-profile.png" height="  80px" width="80px" style="border-radius: 50%">
                        <?php } ?>
                    </td>
                    <td><?php  echo $user_details[0]->user_name;?></td>
                     <td><?php echo $user_details[0]->user_code;?></td>
                     <td><?php  if(@$rank_details[0]->total_marks!=''){ echo @$rank_details[0]->total_marks; }else{ echo "N/A"; } ?></td>
                     <td><?php  if(@$rank_details[0]->rank_index!=''){ echo @$rank_details[0]->rank_index; }else{ echo "N/A"; } ?></td>
                     <td><?php echo $user_details[0]->login_email;?></td>
                     <td><?php echo $user_details[0]->login_mob;?></td> 

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
          
            var ids =[];

            $.each($("input[name='record']:checked"), function()
            {            
                ids.push($(this).val());
            });

            //alert(cat_ids[0]);
            var base_url='<?php echo base_url(); ?>';
            if(ids.length>0)
            {

            $.ajax({
              
             url:base_url+'index.php/manage_knowledge/change_to_active',
             data:{id:ids,status:val},
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