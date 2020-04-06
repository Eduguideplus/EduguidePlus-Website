<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- <style type="text/css">
      .used-quest{
        background-color: orange;

      }
    </style> -->
    <section class="content-header">
      <h1>
       MANAGE QUESTIONS 
       
        
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
              <h3 class="box-title">Total Question(<?php echo count($question_list);?>)</h3>
            </div>
            <!-- /.box-header -->
            
            <table width="100%">
            <tr>
              <td width="60%">
            <?php 

$admin_details=$this->session_check_and_session_data->admin_session_data();
       
     //print_r($admin_details);exit;
    if(@$this->user_page_permission_checki_availablity_view_model->check_permission_for_controller('manage_question/add',$this->session->userdata('session_user_id'))=='Y' || $admin_details[0]->user_type_id==1)
    { ?>     
              <a href="<?php echo base_url();?>index.php/manage_question/add" class="btn btn-primary btn-action" title="Add"><i class="fa fa-pencil-square-o"></i> Bulk Upload </a>

            <?php } ?>

              <a href="<?php echo base_url();?>index.php/manage_question/single_add" class="btn btn-primary btn-action" title="Add"><i class="fa fa-plus-circle"></i> Single Add </a>

               
 <?php 

$admin_details=$this->session_check_and_session_data->admin_session_data();
       
     //print_r($admin_details);exit;
    if(@$this->user_page_permission_checki_availablity_view_model->check_permission_for_controller('manage_question/download_template/new_que_ans.xls',$this->session->userdata('session_user_id'))=='Y' || $admin_details[0]->user_type_id==1)
    { ?>
              <a href="<?php echo base_url();?>../assets/uploads/download_template/new_que_ans.xlsx" class="btn btn-primary" title="Download Template for Bulk uploads" download><i class="fa fa-download"></i></a>

            <?php } ?>

            <a href="<?php echo base_url(); ?>index.php/manage_question/export_csv" class="btn btn-success" title="Export Questions" ><i class="fa fa-file"></i></a>
            <!-- <a href="javascript:void(0)" class="btn btn-info btn-action" title="Create Test"><i class="fa fa-plus-circle"></i> Create Test </a> -->
              
              </td>
 <?php 

$admin_details=$this->session_check_and_session_data->admin_session_data();
       
     //print_r($admin_details);exit;
    if(@$this->user_page_permission_checki_availablity_view_model->check_permission_for_controller('manage_question/change_to_active',$this->session->userdata('session_user_id'))=='Y' || $admin_details[0]->user_type_id==1)
    { ?>
              <td width="40%">
              <span style="padding-left: 20.5%">
              <a href="javascript:void(0)" class="btn btn-success btn-action" title="Active"  onclick="change_sts_active('active')"><i class="fa fa-pencil-square-o" ></i> Active</a>
              
              <a href="javascript:void(0)" class="btn btn-danger btn-action" title="Inactive" onclick="change_sts_active('inactive')"><i class="fa fa-pencil-square-o" ></i> Inactive</a>
                </span> 

                <a href="javascript:void(0)" class="btn btn-danger btn-action" title="Selected Delete" onclick="delete_selected()"><i class="fa fa-trash-o"></i> Delete</a>
            </td>

          <?php } ?>
            </tr>
            </table>
            
            <div class="box-body" style="overflow: auto; height: 500px">
              <table id="example1" class="table table-bordered table-striped">
                <thead class="bg-blue">
                <tr>
                  
                  <th><input type="checkbox" name="all_chk" id="all_chk" onclick="check_all()"></th>
                  <th>SL NO</th>
                  <th>Status</th>
                  <th>Question</th>
                  <th>Examination>>Subject>>Chapter</th>
                  <th>Time</th>
                   <th>Answer</th>
                  <th>Date</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

              
               <?php
                $count=0;
               foreach($question_list as $row)
               {
                  $count++;

                  $qui_id= $row->id;
                 
                  $check_used_array= $this->common_model->common($table_name = 'tbl_knowledge_quiz_set_dtls', $field = array(), $where = array('que_id'=>$qui_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

                  $total_set= count($check_used_array);
                 
                
               ?>
                
                <tr <?php if($total_set >'0'){ ?> class="used-quest" <?php } ?>>
                  

                   <td><input type="checkbox" name="record" value="<?php echo @$row->id;?>"></td>
                   <td><?php echo $count;?></td>
                   <td>
                     <?php if(@$row->status=='active')
                  {?>
                     <img src="<?php echo base_url();?>../assets/images/active.png">
                  <?php 
                  }
                  else{ ?>
                     <img src="<?php echo base_url();?>../assets/images/inactive.png">
                  <?php
                  }  ?>

                   </td>
                  
                  <td>
                  <?php echo @$row->question; ?>
                  </td>


                   <td width="40%"><?php 

                  $exam=$this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>@$row->exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

                   $section=$this->common_model->common($table_name = 'tbl_question_section', $field = array(), $where = array('id'=>@$row->section_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

                    $chapter=$this->common_model->common($table_name = 'tbl_chapters', $field = array(), $where = array('chap_id'=>@$row->chap_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

                  echo @$exam[0]->exam_name.' >> '.@$section[0]->section_name.' >> '.@$chapter[0]->chap_name;?></td>

                  <td><?php  
                                if($row->time>0)
                                {
                                  echo $row->time.' Seconds';
                                }
                                else{
                                  echo "Not Available";
                                }
                        ?>
                          
                    </td>
                  
                  <td><?php 

                  $answer_arr=array('A','B','C','D','E');

                  $answer='N/A';

                  $choices=$this->common_model->common($table_name = 'tbl_question_choice', $field = array(), $where = array('que_id'=>@$row->id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

                 // print_r($choices);

                  for($i=0;$i<count($choices);$i++)
                  {
                    if($choices[$i]->is_correct=='Yes')
                    {
                      $answer=$choices[$i]->choice;
                      $answer_indx=@$answer_arr[$i];

                      echo '( '.@$answer_indx.' )'.@$answer;

                    }
                  }

                  ?></td>
                 
                 
                <td><?php echo @$row->created_on; ?></td>
                  </td>

                  <td> <a href="<?php echo base_url();?>index.php/manage_question/single_edit/<?php echo @$row->id;?>" class="btn btn-info btn-action" title="View & Edit"><i class="fa fa-pencil-square-o"></i></a>
                    <!-- <button type="button" class="btn btn-danger" onclick="return delete_data(<?php echo @$row->id;?>)" title="Delete"><i class="fa fa-trash-o"></i></button> --></td>
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
 
if(confirm("Are you sure want to delete this question?"))
{
var baseurl='<?php echo  base_url();?>';
window.location=baseurl+'index.php/manage_question/delete/'+id;
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

          
            var base_url='<?php echo base_url(); ?>';
            if(com_ids.length>0)
            {

            $.ajax({
              
             url:base_url+'index.php/manage_question/change_to_active',
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



         <script type="text/javascript">

   function delete_selected()
        {
          
            var com_ids =[];

            $.each($("input[name='record']:checked"), function()
            {            
                com_ids.push($(this).val());
            });

          
            var base_url='<?php echo base_url(); ?>';
            if(com_ids.length>0)
            {

            $.ajax({
              
             url:base_url+'index.php/manage_question/multi_select_delete',
             data:{id:com_ids},
             dataType: "json",
             type: "POST",
             success: function(data){


              var perform= data.result;

                 if(perform==1)
                 {
                   alert('Selected questions have been deleted');
                   location.reload();
                 }
                
              }
             });
          }
          else
          {
            alert('Sorry!! Please select any question to delete');
          }
}
  
        </script>