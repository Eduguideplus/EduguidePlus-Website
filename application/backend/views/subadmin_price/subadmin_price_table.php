<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       SUB ADMIN PRICE TABLE
       
        
      </h1>
      <small><?php
            $succ_msg=$this->session->flashdata('succ_msg');
            if($succ_msg){
              ?>
              <br><span style="color:green">
               <b><?php echo $succ_msg; ?></b> 
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
              <h3 class="box-title">Total Sub Admin Question Price (<?php echo count($question_list);?>)</h3>
            </div>
            <!-- /.box-header -->
            
            <table width="100%">
            <tr>
              <td width="50%">
             <!--  <a href="<?php echo base_url();?>index.php/manage_question/add" class="btn btn-primary btn-action" title="Add"><i class="fa fa-pencil-square-o"></i> Bulk Upload </a> -->
              <a href="<?php echo base_url();?>index.php/Subadmin_question_price/add" class="btn btn-primary btn-action" title="Add">ADD </a>
             <!--  <a href="<?php echo base_url();?>index.php/manage_question/download_template/new_que_ans.xls" class="btn btn-primary " title="Download" download><i class="fa fa-download"></i> Download Template </a> -->
              
              </td>

              <td width="50%">
              <span style="padding-left: 20.5%">
              <a href="javascript:void(0)" class="btn btn-success btn-action" title="Active"  onclick="change_sts_active('active')"><i class="fa fa-pencil-square-o" ></i> Active</a>
              
              <a href="javascript:void(0)" class="btn btn-danger btn-action" title="Inactive" onclick="change_sts_active('inactive')"><i class="fa fa-pencil-square-o" ></i> Inactive</a>
                </span> 

                <!--<a href="javascript:void(0)" class="btn btn-danger btn-action" title="Selected Delete" onclick="delete_selected()"><i class="fa fa-trash-o"></i> Delete</a>-->
            </td>
            </tr>
            </table>
            
            <div class="box-body" style="overflow-x: auto; overflow-y: auto;">
              <table id="example1" class="table table-bordered table-striped">
                <thead class="bg-blue">
                <tr>
                  <th><input type="checkbox" name="all_chk" id="all_chk" onclick="check_all()"></th>
                  <th>Status</th>
                 <!--  <th>User Name</th> -->
               <!-- <th>Status</th>  -->
                  <th>Exam Group Name</th>
                  <th>Exam Name</th>
                  <th>Subject Name</th>
                 <!--  <th>Chapter Name</th> -->
                  <th>Question Price ( Rs. )</th>
                  <!--  <th>Correct Answer + Hints</th> -->
                 <!--   <th>Chapter Name</th> -->
                  <!--  <th>Passage Title(If Any)</th> -->

                   <!-- <th>Date</th> -->
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

              
               <?php
               foreach($question_list as $row)
               {


               ?>
                
                <tr>

                   <td><input type="checkbox" name="record" value="<?php echo @$row->subadmin_question_price_id;?>"></td>
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
                    <?php

                    $exam_group=$this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>@$row->exam_group_name), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

                     echo $exam_group[0]->exam_name;
                    ?> 
                  </td>
                 
                  <td>
                  <?php 

                  $exam=$this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>@$row->exam_name), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

                  echo @$exam[0]->exam_name; 
                  ?>
                  </td>


                   <td>
                    <?php

                    $section=$this->common_model->common($table_name = 'tbl_question_section', $field = array(), $where = array('id'=>@$row->subject_name), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

                     echo @$section[0]->section_name; 
                     ?>
                   </td>

                 <!--  <td>
                  <?php 

                  $chapter=$this->common_model->common($table_name = 'tbl_chapters', $field = array(), $where = array('chap_id'=>@$row->chapter_name), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

                  echo @$chapter[0]->chap_name; ?>
                    
                  </td> -->
               
                 


                <td><?php echo @$row->question_price; ?></td>
                  </td>

                  <td> <a href="<?php echo base_url();?>index.php/Subadmin_question_price/edit/<?php echo @$row->subadmin_question_price_id;?>" class="btn btn-info btn-action" title="View & Edit"><i class="fa fa-pencil-square-o"></i></a>
                    <button type="button" class="btn btn-danger" onclick="return delete_data(<?php echo @$row->subadmin_question_price_id;?>)" title="Delete"><i class="fa fa-trash-o"></i></button></td>
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
 
if(confirm("Are you sure....!"))
{
var baseurl='<?php echo  base_url();?>';
window.location=baseurl+'index.php/Subadmin_question_price/delete/'+id;
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
              
             url:base_url+'index.php/Subadmin_question_price/change_to_active',
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