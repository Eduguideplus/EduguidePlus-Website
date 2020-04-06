<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       MANAGE TOP COLLEGES
       
        
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
        <li>Top Colleges</li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
            
            <!-- /.box-header -->
            
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Top Colleges(<?php echo count($top_clg);?>)</h3>
            </div>
            <!-- /.box-header -->
            
            <table width="100%">
            <tr>
              <td width="50%"><a href="<?php echo base_url();?>index.php/manage_top_college/add_institute" class="btn btn-primary btn-action" title="Add"><i class="fa fa-pencil-square-o"></i> Add </a></td>

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
                   <th>Header</th>
                  <th>College</th>
                 
               
                  <th>Type</th>
                  <th>Course</th>
                
                   <th>Duration</th>                                                           
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

              
               <?php
               foreach($top_clg as $row)
               {

                


               ?>
                
                <tr>
                  <td><input type="checkbox" name="record" value="<?php echo $row->top_college_id;?>"></td>
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
                      $header=$this->common_model->common($table_name = 'tbl_top_college_header', $field = array(), $where = array('header_id'=>$row->header_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


                      $inst=$this->common_model->common($table_name = 'tbl_institute', $field = array(), $where = array('id'=>$row->college_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


                      $course=$this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>$row->course), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
  

                 ?>


                  
                  <td><?php echo @$header[0]->header; ?></td>
                  <td>
                  
               <?php echo @$inst[0]->institute_name; ?>
                 
                  </td>
                

                 
                  
                
                  <td><?php echo $row->type; ?></td>
                
                  <td><?php echo @$course[0]->exam_name; ?></td>
                 
                
                 <td><?php echo $row->duration; ?></td>

                  
                  <td> <a href="<?php echo base_url();?>index.php/manage_top_college/edit_top_college/<?php echo $row->top_college_id;?>" class="btn btn-info btn-action" title="View & Edit"><i class="fa fa-pencil-square-o"></i></a>

                   
                    <button type="button" class="btn btn-danger" onclick="return delete_data(<?php echo $row->top_college_id;?>)" title="Delete"><i class="fa fa-trash-o"></i></button>
                   
                 
                   <!-- <a href="<?php echo base_url();?>index.php/manage_institution/inst_info/<?php echo $row->top_college_id;?>" class="btn btn-success" title="Institute Info"><i class="fa fa-graduation-cap"></i></a>  -->

                     
                        

                  
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
window.location=baseurl+'index.php/manage_top_college/inst_delete/'+id;
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
              
             url:base_url+'index.php/manage_top_college/change_to_active_top_college',
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