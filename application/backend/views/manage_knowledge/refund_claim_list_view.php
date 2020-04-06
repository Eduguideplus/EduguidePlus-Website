<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       REFUND CLAIM LIST
       
        
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
              <h3 class="box-title">All Refunded User</h3>
            </div>
            <!-- /.box-header -->
            
           <table width="100%">
            <tr>
<!-- 
              <td width="50%">  <a href="<?php echo base_url();?>index.php/manage_knowledge/knowledge_view" class="btn btn-danger"><i class="fa fa-backward"></i> Back</a></td>
 -->
                <td width="50%">
           
              <a href="javascript:void(0)" class="btn btn-success btn-action" title="Approve"  onclick="change_sts('approved')"><i class="fa fa-pencil-square-o" ></i> Approve</a>
              
                <a href="javascript:void(0)" class="btn btn-danger btn-action" title="Cancel" onclick="change_sts('cancel')"><i class="fa fa-pencil-square-o" ></i> Cancel</a> 

              <!--  <a href="javascript:void(0)" class="btn btn-warning btn-action" title="Pending" onclick="change_sts('pending')"><i class="fa fa-pencil-square-o"></i> Pending</a>
            </td>  -->
            </tr>
            </table>
           
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead class="bg-blue">
                <tr>
                  <th><input type="checkbox" name="all" id="all_chk" onclick="check_all()"></th>
                 
                  <th>Sl NO</th> 
                   <th>Status</th>
                  <th>Type of Test</th>
                 
                  <th>Examination Name</th>
                  <th>Subject Name</th>
                  <th>Examination Code</th>
                   <th>Rank Index</th>
                 <!--  <th>Awarded Amount</th> -->
                   <th>Claim Type</th>
                 
                  <th>Image</th>
                  <th>Name</th>
                  <th>User Code</th>
                  <th>Email</th>
                  <th>Phone No</th>
                  <th>User Name(As bank ) </th>
                  <th>Father Name</th>
                  <th>Address_1</th>
                   <th>Address_2</th>
                  <th>City</th>
                  <th>State</th>
                  <th>Pincode</th>
                  <th>Bank Account Number</th>
                  <th>IFSC Code</th>
                  <th>Bank Branch Name</th>
                  <th>Phone Number</th>
                  mber</th>
                 
                

                </tr>
                </thead>
                <tbody>

                  <?php
                  $i=0;
                  foreach($claim_data as $row)
                  {


                      $knowledge_test_dtls=$this->common_model->common($table_name = 'tbl_knowledge_qiuz_set', $field = array(), $where = array('kq_id'=>$row->set_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
  
$test_dtls=$this->common_model->common($table_name = 'tbl_test_type', $field = array(), $where = array('test_id'=>@$knowledge_test_dtls[0]->test_type), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
 
 $exam_dtls=$this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>@$knowledge_test_dtls[0]->exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

 $subject_dtls=$this->common_model->common($table_name = 'tbl_question_section', $field = array(), $where = array('id'=>@$knowledge_test_dtls[0]->subject_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
  
                      $user_details= $this->common_model->common($table_name='tbl_user', $field = array(), $where = array('id'=>@$row->user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

 $rank_indexing_data = $this->common_model->common($table_name = 'tbl_user_rank', $field = array(), $where = array('set_id'=>$row->set_id,'user_id'=>@$row->user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
  $rank= $this->common_model->common($table_name = 'tbl_user_rank', $field = array(), $where = array('set_id'=>$row->set_id), $where_or = array(), $like = array(), $like_or = array(), $order = array('rank_index'=>'desc'), $start = '', $end = '');
  $user_award=$this->common_model->common($table_name = 'tbl_user_award', $field = array(), $where = array('set_id'=>$row->set_id,'user_id'=>@$row->user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
                    $i++;
                    ?>

                    <tr>
<td><input type="checkbox" name="record" value="<?php echo $row->claim_id;?>"></td>
                 
                      <td><?php echo $i; ?></td>
                         <td><?php if($row->status=='pending'){ echo 'Pending';}if($row->status=='approved'){ echo 'Approved';} if(@$row->status=='cancel'){ echo 'Canceled';} ?></td>

                        <td><?php echo @$test_dtls[0]->test_name; ?></td>
   
    
           <td><?php echo @$exam_dtls[0]->exam_name; ?></td>
           <td><?php echo @$subject_dtls[0]->section_name; ?></td>
           <td><?php echo $row->examination_code;?></td>
                   

      <td><?php echo @$rank_indexing_data[0]->rank_index;?></td>
                      
                   <!--   <td><?php if(@$user_award[0]->award_amount=='refund'){echo '0';}else{ echo @$user_award[0]->award_amount;}?></td> -->
 <td><?php echo $row->claim_type;?></td>
                      <td>
                        <?php if(@$user_details[0]->profile_photo!=''){ ?><img src="<?php echo base_url();?>../assets/uploads/profile_image/<?php echo @$user_details[0]->profile_photo;?>" height="80px" width="80px" style="border-radius: 50%"></img>
                        <?php } else { ?> 
                        <img src="<?php echo base_url();?>../assets/uploads/user/no-img-profile.png" height="  80px" width="80px" style="border-radius: 50%">
                        <?php } ?>
                    </td>
                   <td><?php echo @$user_details[0]->user_name;?></td>
                     <td><?php echo @$user_details[0]->user_code;?></td>
                     <td><?php echo @$user_details[0]->login_email;?></td>
                     <td><?php echo @$user_details[0]->login_mob;?></td> 
                   
                    
                     <td><?php echo $row->user_name;?></td>
                     <td><?php echo $row->father_name;?></td>
                     <td><?php echo $row->address_1;?></td>
                     <td><?php echo $row->address_2;?></td>
                     <td><?php echo $row->city;?></td>
                     <td><?php echo $row->state;?></td>
                     <td><?php echo $row->pin;?></td>
                     <td><?php echo $row->bank_ac_number;?></td>
                     <td><?php echo $row->ifsc_code;?></td>
                     <td><?php echo $row->bank_branch_name;?></td>
                     <td><?php echo $row->phone_number;?></td>
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

   function change_sts(val)
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
              
             url:base_url+'index.php/manage_knowledge/change_to_approve_refund',
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