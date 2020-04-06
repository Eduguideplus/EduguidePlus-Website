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
      <h3> GALLERY LIST 

        <small></small>
      </h3>

        <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Gallery List</li>
      </ol>
    </section>

  <!-- Main content -->
    <section class="content">
      <!-- //////////////////////////////////////////////////////////////////////////// -->
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">

              
        
              <h3 class="box-title">All Gallery Image(<?php echo count($gallery_details);?>)</h3>
              
            </div>
            <!-- /.box-header -->

            <form>
              
            <div style="padding-left: 12px;padding-top: 12px;">
            <button type="button" class="btn btn-primary" onClick="window.location='<?php echo base_url();?>index.php/manage_gallery/add_view';"><span class="glyphicon glyphicon-plus"></span>Add New Gallery</button>
            
             
              <!--<span style="padding-left: 80.5%">-->
              <a href="javascript:void(0)" class="btn btn-success btn-action" title="Active"  onclick="change_sts_active('active')"><i class="fa fa-pencil-square-o"  ></i> Active</a>

                <a href="javascript:void(0)" class="btn btn-danger btn-action" title="Inactive" onclick="change_sts_active('inactive')"><i class="fa fa-pencil-square-o" ></i> Inactive</a>

                <!-- <a href="javascript:void(0)" class="btn btn-danger btn-action" title="Selected Delete" onclick="delete_selected()"><i class="fa fa-trash-o"></i> Delete</a> -->
            
             
            </div>

           
            <div class="box-body table-responsive">

           
              <table id="example1" class="table table-bordered table-striped myTable1">
              
               <thead>
                <tr class="bg-blue">
                <th><input type="checkbox" name="all" id="all_chk"onclick="check_all()"></th>
                 
                 <th>Status</th> 
                 <th>Gallery Image/Video</th>
                 <th>Album</th>
                 <th>Gallery Type</th>

                 <!--  <th>Title</th> 
                  <th>Year</th>  -->          
                  <th>Action</th>                  
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
                     <img src="<?php echo base_url();?>../assets/images/active.png">
                  <?php 
                  }
                  else{ ?>
                     <img src="<?php echo base_url();?>../assets/images/inactive.png">
                  <?php
                  }  ?>
                  </td>
                        
                       
                    <td><?php if($row->type=='image'){ if(!empty($row->gallery_cover_image )){ ?><img src="<?php echo base_url();?>../assets/uploads/category/gallery/<?php echo $row->gallery_cover_image  ; ?>" height="70" width='90' class="img-responsive"><?php } else{ echo 'N/A';} } else{ 

                    //  echo $row->video_link; 


                              $string=Null;
                            if($row->video_link!='')
                              {
                              
                                $string     = $row->video_link;
                                                $search     = '/youtube\.com\/watch\?v=([a-zA-Z0-9]+)/smi';       //show & play video in the list...
                                                $replace    = "youtube.com/embed/$1";    
                                                $url = preg_replace($search,$replace,$string);
                            ?>
                                            <iframe height="70" width="90" src="<?php echo $url;?>" frameborder="0" allowfullscreen></iframe>










                  <?php  } } ?> </td>
                    
                    <td><?php
                    @$cat_id = $row->cat_id;
                    $category_details = $this->common->select($table_name='tbl_gallery_category',$field=array(),
        $where=array('cat_id'=>@$cat_id),$like=array(),$order=array(),$where_or=array(),$like_or_array=array());

                    echo @$category_details[0]->cat_name;
                    ?></td>

                    <td><?php echo $row->type; ?></td>

                  <!--   <td><?php if(!empty($row->gallery_title)){ echo $row->gallery_title; } else{ echo 'N/A'; } ?></td>
                    
            <td><?php echo $row->gallery_year; ?></td> -->
                        <td>
                          
                             <a href="<?php echo base_url();?>index.php/manage_gallery/get_edit_details/<?php echo $row->gallery_id;?>" class="btn btn-info"><i class="fa fa-pencil-square-o" title="edit"></i></a>
                             <a type="button" class="btn btn-danger" onclick="return delete_data('<?php echo $row->gallery_id;?>')" ><i class="fa fa-trash-o" title="delete"></i></a>
                             <!-- <a href="<?php echo base_url();?>index.php/manage_gallery/gallery_view/<?php echo $row->gallery_id;?>/<?php echo $row->cat_id;?>" class="btn btn-success" ><i class="fa fa-picture-o" title="Gallery"></i></a> -->
 
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
              
             url:base_url+'index.php/manage_gallery/change_to_active',
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
          window.location=baseurl+'index.php/manage_gallery/delete_gallery/'+id;

      }
}
</script>
<script type="text/javascript">

function change_status(id)
{
if(confirm("Are you sure"))
{
var baseurl='<?php echo  base_url();?>';
window.location=baseurl+'index.php/manage_gallery/change_to_active/'+id;
}
}
</script>

<script type="text/javascript">
function change_upcoming_statuss(id)
{

//alert(id);
if(confirm("Are you sure"))
{
  
var baseurl='<?php echo  base_url();?>';

$.ajax({
              
              //url:baseurl+'index.php/manage_post/change_featured_status',
              url:'<?php echo base_url(); ?>index.php/manage_gallery/change_upcoming_status',
              data:{pid:id},
              dataType: "json",
              type: "POST",
             // alert('okk');
              success: function(data){
                //alert(okk);
                var perform= data.changedone;

                      if(perform['status']==1)
                      {
                        
                       var node='<a href="#" class="btn btn-success btn-action" title="Change" onclick="change_upcoming_statuss('+id+')"><i class="fa fa-o" ></i>Yes</a>';

                        $("#upcoming_statuss"+id).html(node);
                      }
                      else
                      {
                        
                        var node='<a href="#" class="btn btn-danger btn-action" title="Change" onclick="change_upcoming_statuss('+id+')"><i class="fa fa-o" ></i>No</a>';

                        $("#upcoming_statuss"+id).html(node);
                      }
                
                  }
              });
//window.location=baseurl+'index.php/manage_category/popularity_change/'+id;


}
}
</script>
  

 

  