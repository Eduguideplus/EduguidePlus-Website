<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Course/Exam list of <?php echo @$institute_details[0]->institute_name; ?>
       
        
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
              <?php
            $err_msg=$this->session->flashdata('err_msg');
            if($err_msg){
              ?>
              <br><span style="color:red">
                <?php echo $err_msg; ?>
              </span>
              <?php
              }
              ?>
              
              </small>
              <small id="msg" style="color:red"></small>
              
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li>Course/Exam list</li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
            
            <!-- /.box-header -->
            
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Course/Exam list(<?php echo count($get_course_list);?>)</h3>
            </div>
            <!-- /.box-header -->
            
            <table width="100%">
            <tr>
              <td width="20%">
                <a href="<?php echo base_url(); ?>index.php/manage_institution/inst_list" class="btn btn-danger btn-action" title="Back to Institute list" onclick="delete_selected()"><i class="fa fa-backward"></i> Back</a>
              </td>
              
              <td width="30%"><a href="<?php echo base_url();?>index.php/manage_institution/add_course/<?php echo $selected_inst_id; ?>" class="btn btn-primary btn-action" title="Add Course/Exam"><i class="fa fa-pencil-square-o"></i> Add </a></td>

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
                  <th>Course</th>
                  <th>Exam</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

              
               <?php
               foreach($get_course_list as $row)
               {

                


               ?>
                
                <tr>
                  <td><input type="checkbox" name="record" value="<?php echo $row->course_institute_id;?>"></td>
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
              
                <?php 
                      $get_course_details=$this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>$row->course_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


                      $get_exam_details=$this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>$row->examination_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


                     

                 ?>


                  
                  <td>
                      <?php
                      echo @$get_course_details[0]->exam_name; 
                      ?>      

                  </td>
                  <td>
                 <?php
                echo @$get_exam_details[0]->exam_name; 
                ?> 
                 
                  </td>
                
 <td>

    <button type="button" class="btn btn-danger" onclick="return delete_data(<?php echo $row->course_institute_id;?>,<?php echo $row->institute_id;?>)" title="Delete"><i class="fa fa-trash-o"></i></button>
               </td>    
                 
                  
                        

                  
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
function delete_data(id, inst_id)
{
 
if(confirm("Are you sure ?"))
{
var baseurl='<?php echo  base_url();?>';
window.location=baseurl+'index.php/manage_institution/course_exam_delete/'+id+'/'+inst_id;
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
              
             url:base_url+'index.php/manage_institution/change_to_active_inst_course',
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