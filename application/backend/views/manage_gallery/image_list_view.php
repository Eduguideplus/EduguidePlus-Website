 <?php
    $role_id= $this->session->userdata('session_role_id');
 ?>      
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <?php
            $succ_delete=$this->session->flashdata('succ_delete');
            if($succ_delete){
              ?>
              <br><span style="color:green">
                <b><?php echo $succ_delete; ?></b>
              </span>
              <?php
              }
              ?>
              <?php
            $err_delete=$this->session->flashdata('err_delete');
            if($err_delete){
              ?>
              <br><span style="color:red">
                <b><?php echo $err_delete; ?></b>
              </span>
              <?php
              }
              ?>
              <?php
            $succ_update=$this->session->flashdata('succ_update');
            if($succ_update){
              ?>
              <br><span style="color:green">
                <b><?php echo $succ_update; ?></b>
              </span>
              <?php
              }
              ?>
              <?php
            $succ_add=$this->session->flashdata('succ_add');
            if($succ_add){
              ?>
              <br><span style="color:green">
                <b><?php echo $succ_add; ?></b>
              </span>
              <?php
              }
              ?>
      <h3> IMAGES

        <small></small>
      </h3>

        <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Image List</li>
      </ol>
    </section>

  <!-- Main content -->
    <section class="content">
      <!-- //////////////////////////////////////////////////////////////////////////// -->
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">

           <?php $id=$this->uri->segment(4); ?>   
        
              <h3 class="box-title">All Images(<?php echo count($gallery_details);?>)</h3>
              
            </div>
            <!-- /.box-header -->

            <form>
              
            <div style="padding-left: 12px;padding-top: 12px;">
            <button type="button" class="btn btn-primary" onClick="window.location='<?php echo base_url();?>index.php/manage_gallery/add_image_view/<?php echo $gallery_id; ?>/<?php echo $id;?>';"><span class="glyphicon glyphicon-plus"></span>Add New Image</button>
            
             <a href="<?php echo base_url();?>index.php/manage_gallery/list_view/<?php echo $gallery_id;?>" class="btn btn-danger fa fa-backward"><b>Back</b></a>
              <!--<span style="padding-left: 80.5%">-->
              <!-- <a href="javascript:void(0)" class="btn btn-success btn-action" title="Active"  onclick="change_sts_active('active')"><i class="fa fa-pencil-square-o" ></i> Active</a>

                <a href="javascript:void(0)" class="btn btn-danger btn-action" title="Inactive" onclick="change_sts_active('inactive')"><i class="fa fa-pencil-square-o" ></i> Inactive</a> -->

                <!-- <a href="javascript:void(0)" class="btn btn-danger btn-action" title="Selected Delete" onclick="delete_selected()"><i class="fa fa-trash-o"></i> Delete</a>
             -->
             
            </div>

           
            <div class="box-body table-responsive">

           
              <table id="example1" class="table table-bordered table-striped myTable1">
              
               <thead>
                <tr class="bg-blue">
                <th><input type="checkbox" name="all" id="all_chk"onclick="check_all()"></th>
                 
                 <th>Status</th>
                  <th>Images</th>
                  <!-- <th>Image Title</th> -->
                 
                  <th>Added Date</th>
                  <th>Action</th>
                  <!-- <th>Edited Date</th>  -->
                  <!-- <th>Created By</th> -->                
                                 
                </tr>
               </thead>

               <tbody>
                     <?php 
                     if(count($gallery_details) > 0)
                    {
                      
                      foreach($gallery_details as $row)
                     {
                      
                     ?>            
                    <tr>
                    <td><input type="checkbox" name="record" value="<?php echo $row->gallery_id;?>"></td>
                     <td>
                  <?php if($row->status=='active')
                  {?>
                     <img src="<?php echo base_url();?>../assets/upload/active.png">
                  <?php 
                  }
                  else{ ?>
                     <img src="<?php echo base_url();?>../assets/upload/inactive.png">
                  <?php
                  }  ?>
                  </td> 
                        
                       
                    <td><?php if(!empty($row->image)){ ?><img src="<?php echo base_url();?>../assets/upload/category/gallery/<?php echo $row->image; ?>" height="70" width='90' class="img-responsive"><?php } else{ echo 'N/A';} ?> </td>
                    
                    <!-- <td><?php if(!empty($row->img_title)){ echo $row->img_title; } else{ echo 'N/A'; } ?></td> -->
                     
                        

                      <td><?php if(!empty($row->created_on)){ echo $row->created_on; } else{ echo 'N/A'; } ?></td> 
                     

                     <!-- <td><?php if(!empty($row->edited_date)){ echo $row->edited_date; } else{ echo 'N/A'; } ?></td>                          -->
                        <td>
                          
                             <a href="<?php echo base_url();?>index.php/manage_gallery/get_edit_img/<?php echo $row->id;?>/<?php echo $this->uri->segment(4);?>" class="btn btn-info"><i class="fa fa-pencil-square-o" title="edit"></i></a>
                             <a type="button" class="btn btn-danger" onclick="return delete_data('<?php echo $row->id;?>')" ><i class="fa fa-trash-o" title="delete"></i></a>
                             <!-- <a href="<?php echo base_url();?>index.php/manage_event/add_event_gallery/<?php echo $row->event_id;?>" class="btn btn-info" ><i>Gallery</i></a>
 -->
                        </td>
                       
                     </tr>
                     <?php
                     } 
                     }?>
   
                </tbody>

                
              </table>
            </div>
          <!-- <div><input type="hidden" name="event_id" value="<?php echo $gallery_details[0]->event_id;?>"></div> -->
            <!-- /.box-body -->
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- ////////////////////////////////////////////////////////////////////////////////// -->
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script type="text/javascript">
function check_all()
{
  
   if ($("#all_chk").is(':checked')) 
        {
            $("input[name=record]").each(function () {
                $(this).prop("checked", true);
            });

        } 
        else 
        {
            $("input[name=record]").each(function () {
                $(this).prop("checked", false);
            });        
        }
}
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

  <!-- <script type="text/javascript">

        function change_sts_active(val)
        {
          
            var test_ids =[];

            $.each($("input[name='record']:checked"), function()
            {            
                test_ids.push($(this).val());
            });

            //alert(cat_ids[0]);
            var base_url='<?php echo base_url(); ?>';
            if(test_ids.length>0)
            {

            $.ajax({
              
             url:base_url+'index.php/manage_event/change_to_active',
             data:{id:test_ids,status:val},
             dataType: "json",
             type: "POST",

             success: function(data){


              var perform=data.changedone;

                 if(perform==1)
                 {
                   alert('Status changed successsfully');
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
</script> -->


<script type="text/javascript">
function delete_data(id)
{
  //alert(id);
    if(confirm("Are you sure"))
      {
          var baseurl='<?php echo  base_url();?>';
          window.location=baseurl+'index.php/manage_gallery/delete_gal_img/'+id;

      }
}
</script>
<!-- <script type="text/javascript">

function change_status(id)
{
if(confirm("Are you sure"))
{
var baseurl='<?php echo  base_url();?>';
window.location=baseurl+'index.php/manage_event/change_to_active/'+id;
}
}
</script> -->

<!-- <script type="text/javascript">

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
  </script> -->


  

 

  