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
      <h3> GALLERY ALBUM

        <small></small>
      </h3>

        <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Gallery Album</li>
      </ol>
    </section>

  <!-- Main content -->
    <section class="content">
      <!-- //////////////////////////////////////////////////////////////////////////// -->
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">

              
        
              <h3 class="box-title">All Album(<?php echo count($category_details);?>)</h3>
              
            </div>
            <!-- /.box-header -->

            <form>
            <div style="padding-left: 12px;padding-top: 12px;">
            <button type="button" class="btn btn-primary" onClick="window.location='<?php echo base_url();?>index.php/manage_gallery_category/add_view';"><span class="glyphicon glyphicon-plus"></span>Add New Album</button>

            <a href="javascript:void(0)" class="btn btn-success btn-action" title="Active"  onclick="change_sts_active('active')"><i class="fa fa-pencil-square-o" ></i> Active</a>

                <a href="javascript:void(0)" class="btn btn-danger btn-action" title="Inactive" onclick="change_sts_active('inactive')"><i class="fa fa-pencil-square-o" ></i> Inactive</a>

             
            </div>

           
            <div class="box-body table-responsive">

           
              <table id="example1" class="table table-bordered table-striped myTable1">
              
               <thead>
                <tr  class="bg-blue">
                <th><input type="checkbox" name="all" id="all_chk"onclick="check_all()"></th>


                 
                  <th>Status</th>

                  <th>Gallery Tag</th>
                  <th>Album Title</th>
                 <th>Album Image</th>
                 
                  <th>Action</th>                  
                </tr>
               </thead>

               <tbody>
                     <?php 
                     if(count($category_details) > 0)
                    {
                      
                      foreach($category_details as $row)
                     {
                      
                     ?>            
                    <tr>
                    <td><input type="checkbox" name="record" value="<?php echo $row->cat_id;?>"></td>
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


                  <td><?php
                    @$gallery_tag_id = $row->gallery_tag_id;
                    $tag_details = $this->common->select($table_name='tbl_gallery_tag',$field=array(),
        $where=array('gallery_tag_id'=>@$gallery_tag_id),$like=array(),$order=array(),$where_or=array(),$like_or_array=array());

                    echo @$tag_details[0]->gallery_tag_name;
                    ?></td>
                        
                       
                    
                    <td><?php if(!empty($row->cat_name)){ echo $row->cat_name; } else{ echo 'N/A'; } ?></td>
                     
                     <td><?php if(!empty($row->cat_image)){ ?><img src="<?php echo base_url();?>../assets/uploads/category/<?php echo $row->cat_image; ?>" height="70" width='90' class="img-responsive"><?php } else{ echo 'N/A';} ?> </td>
                       <!-- <td id="cat_sort">
                   
                    <select name="sort" id="sort" onchange="sort_order(this.value,'<?php echo $row->cat_id; ?>')">
                    <option><?php echo $row->sort_order;?></option>
                     <?php 
                      for($i=1;$i<=100;$i++){
                     ?>
                     <option>
                       <?php echo $i; ?>
                     </option>
                     <?php } ?>
                   </select>
                 </td>           -->         
                        <td>
                          
                             <a href="<?php echo base_url();?>index.php/manage_gallery_category/get_edit_details/<?php echo $row->cat_id;?>" class="btn btn-info" ><i class="fa fa-pencil-square-o" title="edit"></i></a>

                            <?php  $gallery_details=$this->common->select($table_name ='tbl_gallery', $field = array(), $where = array('cat_id'=>@$row->cat_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');  

                            if(count($gallery_details)==0){

                            ?>


                             <a type="button" class="btn btn-danger" onclick="return delete_data('<?php echo $row->cat_id;?>')" ><i class="fa fa-trash-o" title="delete"></i></a>  <?php }?>

                        </td>
                       
                     </tr>
                     <?php
                     } 
                     }?>
   
                </tbody>

                
              </table>
            </div>
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

  <script type="text/javascript">

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
              
             url:base_url+'index.php/manage_gallery_category/change_to_active',
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

</script>
<script type="text/javascript">
function delete_data(id)
{
  //alert(id);
    if(confirm("Are you sure"))
      {
          var baseurl='<?php echo  base_url();?>';
          window.location=baseurl+'index.php/manage_gallery_category/delete_category/'+id;

      }
}


  </script>
  <script type="text/javascript">
      
        function sort_order(value,id)
        {
          // alert(value);alert(id);
          if(confirm("Are you sure to change")){
             $.ajax({

              type: "POST",
              dataType:'json',
              url:"<?php echo base_url();?>index.php/manage_gallery_category/update_sort_order",
              data: {order:value,cat_id:id},
              //async: false,

                    success: function(data)
                      {
                        //alert(data);
                        location.reload();
                      }

                });
           }
        }

    </script>
  


  

 

  