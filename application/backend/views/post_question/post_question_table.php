<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       POSTED QUESTION LIST
       
        
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
        <li><a href="<?php echo base_url()?>index.php/manage_category/category_view">Posted Question</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
            
            <!-- /.box-header -->
            
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            
            <table width="100%">
            <tr>
              <!-- <td width="50%"><a href="<?php echo base_url();?>index.php/vocabulary/add" class="btn btn-primary btn-action" title="Add"><i class="fa fa-pencil-square-o"></i> Add </a></td>
 -->
              <td width="50%">
              <!--<span style="padding-left: 80.5%">-->
              <a href="javascript:void(0)" class="btn btn-success btn-action" title="Active"  onclick="change_sts_active('active')"><i class="fa fa-pencil-square-o" ></i> Active</a>

                <a href="javascript:void(0)" class="btn btn-danger btn-action" title="Inactive" onclick="change_sts_active('inactive')"><i class="fa fa-pencil-square-o" ></i> Inactive</a>

                <!--<a href="javascript:void(0)" class="btn btn-danger btn-action" title="Selected Delete" onclick="delete_selected()"><i class="fa fa-trash-o"></i> Delete</a>-->
            </td>
            </tr>
            </table>
            
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead class="bg-blue">
                <tr>
                  <th><input type="checkbox" name="all_chk" id="all_chk" onclick="check_all()"></th>
                  <th>Status</th>
                  <th>User Name</th>
                  <th>Posted Question</th> 
                  <th>Front Show</th> 
                  <!-- <th>Exam Name</th>
                  <th>Question Set</th> -->         
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

                  <?php foreach($post_question as $row)
                  {
                    ?>

              
              
                
                <tr>
                  <td><input type="checkbox" name="record" value="<?php echo $row->post_id;?>"></td>
                  <td>
                  <?php if($row->status=='active')
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
                   $name=$this->common->select($table_name ='tbl_user', $field = array(), $where = array('id'=>$row->user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
                   echo @$name[0]->user_name;
                  ?>
                  </td>

                  <td><?php if(!empty($row->posted_question)){ echo $row->posted_question; } else{ echo 'N/A'; } ?></td>



                  <td id="front_show_<?php echo $row->post_id; ?>">

                     <?php
                     if(($row->front_show)=='Yes')
                      {
                      ?>
                     
                         <a class="label label-success" title="Change" onclick="change_home(<?php echo $row->post_id; ?>,<?php echo $row->user_id; ?>)" style="align:centre"> Yes</a> 
                      <?php
                       }
                       else
                       {
                      ?>
                        <a  class="label label-danger" title="Change" onclick="change_home(<?php echo $row->post_id; ?>,<?php echo $row->user_id; ?>)"> No</a> 
                       <?php
                        }
                       ?>
                </td>

                <!-- <td>
                  <?php 
                   $exam=$this->common->select($table_name ='tbl_exam_type', $field = array(), $where = array('id'=>$row->exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
                   echo @$exam[0]->exam_name;
                  ?>
                  </td> -->


                 <!--  <td>
                  <?php 
                   $set=$this->common->select($table_name ='tbl_knowledge_qiuz_set', $field = array(), $where = array('kq_id'=>$row->set_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
                   echo @$set[0]->set_name;
                  ?>
                  </td> -->

                  <td> 
                  <!-- <a href="<?php echo base_url();?>index.php/discussion/edit/<?php echo $row->comment_id; ?>" class="btn btn-info btn-action" title="View & Edit"><i class="fa fa-pencil-square-o"></i></a> -->
                  
                    <button type="button" class="btn btn-danger" onclick="return delete_data(<?php echo $row->post_id;?>)" title="Delete"><i class="fa fa-trash-o"></i></button> </td>
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

    <div class="modal fade" role="dialog" id="myModal1"  aria-hidden="true" style=" padding: 12px;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <center><span style="margin-left: 20% " ><h4 style="color:red"><b>Reason For Rejection </h4></span></center>
                   
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </button>
                </div>
                
                <!-- Begin # DIV Form -->
                <div id="div-forms">
                
                    <form id="question_post" name="form" style="text-align: center" action="<?php echo base_url(); ?>index.php/post_question/post_question_insert" method="post">

                        <div class="modal-body">

                            <div class="row" >
                            
                           <div id="reason_for_cancellation"> <textarea class="form-control tinearea"  name="reason_for_cancellation"  id="reason_for_cancellation" style="margin-left: 50px; margin-right: 50px;     width: 85%;"  type="text"  required="" ></textarea></div>
                        </div>
                       
                        

                         <!-- <div class="row mt-top">
                           <label>End date</label>
                            <input  class="form-control" name="end_date"  id="datepicker1" style="margin-left: 50px; margin-right: 50px;width: 85%;"    required="">
                        </div> -->
                            
                        </div>
                        <div class="modal-footer">
                            <!-- <div>
                                <button type="submit" onclick="login_submit()" class="btn btn-primary btn-lg btn-block">Login</button>
                            </div> -->

                              <input type="hidden" name="post_id" id="post_id" value="">
                       <input type="hidden" name="user_id" id="user_id" value="">
                            <div class="add-to-cart text-center">
                                       
                <button type="submit" class="btn btn-success" onclick="validate()">Submit</button>
                                      
                                    </div>
                            <div>
                                
                            </div>
                        </div>
                      
                    </form>
                    <!-- End # Login Form -->
                    
                    <!-- Begin | Lost Password Form -->
   
                </div>
                <!-- End # DIV Form -->
                
            </div>
        </div>
    </div>

    <script>
function delete_data(id)
{
 
if(confirm("Are you sure ?"))
{
var baseurl='<?php echo  base_url();?>';
window.location=baseurl+'index.php/post_question/delete_data/'+id;
}
}

</script>
<script src="<?php echo base_url();?>custom_script/validation_rulse.js"></script>
  <script src="<?php echo base_url();?>custom_script/setting_validation.js"></script>
<script>

   function  post_question_Submit_frm()
   {
     
        var reason_for_cancellation = tinymce.get('reason_for_cancellation').getContent();
        // alert(full_address);
        if (!isNull(reason_for_cancellation)) 
        {
          $('#reason_for_cancellation').removeClass('black_border').addClass('red_border');
        
        } 
        else 
        {
          $('#reason_for_cancellation').removeClass('red_border').addClass('black_border');
        }
   }
    function validate()
    {
        
        $('#question_post').attr('onchange', 'post_question_Submit_frm()');
        $('#question_post').attr('onkeyup', 'post_question_Submit_frm()');

        post_question_Submit_frm();
        //alert($('#contact_form .red_border').size());

        if ($('#question_post .red_border').size() > 0)
        {
            $('#question_post .red_border:first').focus();
            $('#question_post .alert-error').show();

            return false;
        } 
        else 
        {

            $('#question_post').submit();
        }
    }
</script>

<style>
.error {color: #FF0000;}
</style>


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
              
             url:base_url+'index.php/post_question/change_to_active',
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


        <script>
function change_home(id,user_id)
{
  // alert(id); alert(user_id);
if(confirm("Are you sure ?"))
{
var base_url='<?php echo  base_url();?>';

$.ajax({
              
              url:base_url+'index.php/post_question/change_home_status',
              data:{cid:id,user_id:user_id},
              dataType: "json",
              type: "POST",
              success: function(data){

                
                var perform= data.changedone;
               var perform1= data.user_id;
                     
                      if(perform['status']==1)
                      {
                        
                       var node='<a href="#" class="label label-success"  title="Change" onclick="change_home('+id+','+perform1+')">Yes</a>';

                        $("#front_show_"+id).html(node);

                          
                         
                      }
                      else
                      {
                        
                        var node='<a href="#" class="label label-danger" title="Change" onclick="change_home('+id+','+perform1+')">No</a>';

                        $("#front_show_"+id).html(node);
                          var post_id= $("#post_id").val(id);
                            var user_id= $("#user_id").val(perform1);
                        $("#myModal1").modal('show');
                      }
                  
                  }
              });


}
}
</script>

