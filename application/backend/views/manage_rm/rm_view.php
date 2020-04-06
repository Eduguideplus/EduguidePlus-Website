


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       MANAGE SUB ADMIN 
       
        
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



              <small><?php
            $succ_update=$this->session->flashdata('succ_update');
            if($succ_msg){
              ?>
              <br><span style="color:green">
                <?php echo $succ_update; ?>
              </span>
              <?php
              }
              ?>
              
              </small>


              <small><?php
            $succ_delete=$this->session->flashdata('succ_delete');
            if($succ_delete){
              ?>
              <br><span style="color:green">
                <?php echo $succ_delete; ?>
              </span>
              <?php
              }
              ?>
              
              </small>
              <small id="msg" style="color:red"></small>
              
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?php echo base_url()?>index.php/manage_retailer/view_retailer">RM</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
            
            <!-- /.box-header -->
            
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Total Sub Admin(<?php echo count($all_data); ?>)</h3>
            </div>
          
            <!-- /.box-header -->
            
            <table width="100%">
            <tr>
              <td width="50%"><a href="<?php echo base_url();?>index.php/manage_rm/add_rm" class="btn btn-primary btn-action" title="Add"><i class="fa fa-pencil-square-o"></i> Add Sub Admin</a>

              <!-- <a href="<?php echo base_url();?>index.php/manage_education/add_education_excel" class="btn btn-primary btn-action" title="Add"><i class="fa fa-file"></i></i> Upload Excel </a> -->

              </td>

              <td width="50%">
              <!--<span style="padding-left: 80.5%">-->
              <a href="javascript:void(0)" class="btn btn-success btn-action" title="Active"  onclick="change_status_rm('active')"><i class="fa fa-check-square-o" ></i> Active</a>

                <a href="javascript:void(0)" class="btn btn-danger btn-action" title="Inactive" onclick="change_status_rm('inactive')"><i class="fa fa-times" ></i> Inactive</a>


                 <!-- <a href="javascript:void(0)" class="btn btn-warning btn-action" title="Pending" onclick="change_sts_active_education('pending')"><i class="fa fa-exclamation-triangle" ></i> Pending</a> -->

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
                  <th>Profile Image</th>
                  <th>RM Name</th>
                  
                  <th>Email</th>
                  <th>Password</th>
                  <th>User Access</th>
                 
                  <th>Mobile Number</th>
                  <th>User Code</th>
                                                                                           
                  <th>Action</th>                                                                          
                  
                </tr>
                </thead>
                <tbody>

              
               <?php
               foreach($all_data as $row)
               {

               
$question_list=$this->common_model->common($table_name = 'tbl_questions', $field = array(), $where = array('created_by'=>$row->id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

               ?>
                
                <tr>
                  <td><input type="checkbox" name="record" value="<?php echo $row->id;?>"></td>
                  <td>
                  <?php if($row->status=='Active')
                  {?>
                     <img src="<?php echo base_url();?>../assets/images/active.png">
                  <?php 
                  }
                   else{ ?>
                      <img src="<?php echo base_url();?>../assets/images/inactive.png">
                    <?php } ?>
                  </td>
                   <td>

                       <?php
                                        if($row->profile_photo!="")
                                        {
                                            ?>
                                            <img id="prof_pic"
                                                 src="<?php echo base_url() ?>../assets/uploads/profile_image/<?php echo $row->profile_photo; ?>"
                                                 alt="User Image" style="width:50px;height:50px;"/>
                                            <?php
                                        }
                                        else
                                        {
                                            ?>
                                              <img id="prof_pic" src="<?php echo base_url()?>../assets/uploads/no-image.jpg"  alt="User Image" style="margin-top: 10px;width:50px;height:50px;" />
                                            <?php
                                        }
                                    ?>

                  </td>
                  <td><?php echo @$row->user_name;?></td>
               
                   
                  
                 <td><?php echo @$row->login_email;?></td>
                  <td><?php echo @$row->login_pass;?></td>

                  <td>
                     <a href="<?php echo base_url();?>index.php/page_permission/<?php echo $row->id;?>">Manage</a>
        
                  </td>   

                  <td><?php echo @$row->login_mob;?></td>

                  <td><?php echo @$row->user_code;?></td>

                

                  

                

                  
                  <td> <a href="<?php echo base_url();?>index.php/manage_rm/edit_rm/<?php echo $row->id;?>" class="btn btn-info btn-action" title="View & Edit"><i class="fa fa-pencil-square-o"></i></a>

                   <a href="<?php echo base_url();?>index.php/manage_rm/rm_detail_view/<?php echo $row->id; ?>" title="View Details" class="btn btn-success" ><i class="fa fa-eye" aria-hidden="true"></i></a> 
<?php  if(count($question_list)>0){ ?>

                   <a href="<?php echo base_url();?>index.php/manage_rm/question_price_list/<?php echo $row->id; ?>" title="Work History" class="btn btn-warning" > Q </a> 
<?php } ?>

               <button type="button" class="btn btn-danger" onclick="return delete_rm(<?php echo $row->id;?>)" title="Delete"><i class="fa fa-trash-o"></i></button></td>
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



    <script src="<?php echo base_url();?>custom_script/validation_rulse.js"></script>
     <script src="<?php echo base_url();?>custom_script/form_validation/admin_validation.js"></script>
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

     <script>
      function delete_rm(id)
      {
        window.location.href="<?php echo base_url();?>index.php/manage_rm/delete_rm/"+id;
      }
     </script>


  <script type="text/javascript">

   function change_status_rm(val)
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
              
             url:base_url+'index.php/manage_rm/change_to_active',
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
