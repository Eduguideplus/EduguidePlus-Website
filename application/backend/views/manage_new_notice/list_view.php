
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Manage News And Notice</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url()?>index.php/dashboard"><i class="fa fa-dashboard" aria-hidden="true"></i>Dashboad</a></li>
            <li class="active">News And Notice List</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12 table-responsive">
                <div class="box">
                    <div class="box-header">
                           <h3 class="box-title">All  List(<?php echo count($tender);?>)</h3>
                    </div>

                     <small><?php
            $succ_delete=$this->session->flashdata('succ_delete');
            if($succ_delete){
              ?>
              <br><span style="color:green">
                <?php echo $succ_delete; ?>
              </span>
              <?php
              }
              ?></small>

              <small><?php
            $succ_add=$this->session->flashdata('succ_add');
            if($succ_add){
              ?>
              <br><span style="color:green;size: 20px" >
                <?php echo $succ_add; ?>
              </span>
              <?php
              }
              ?></small>
              <small><?php
            $msg=$this->session->flashdata('msg');
            if($msg){
              ?>
              <br><span style="color:green;size: 20px" >
                <?php echo $msg; ?>
              </span>
              <?php
              }
              ?></small>
              <small><?php
            $succ_update=$this->session->flashdata('succ_update');
            if($succ_update){
              ?>
              <br><span style="color:green;size: 20px" >
                <?php echo $succ_update; ?>
              </span>
              <?php
              }
              ?></small>
                    <div class="col-md-12" style="">


                          

                          

                        <a href="<?php echo base_url()?>index.php/manage_new_notice/add_view" class="btn btn-info btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Add</a>
                       
                   
                    
              <!--<span style="padding-left: 80.5%">-->

                <a href="javascript:void(0)" class="btn btn-success btn-action" title="Active"  onclick="change_sts_active('active')"><i class="fa fa-pencil-square-o"  ></i> Active</a>

          <a href="javascript:void(0)" class="btn btn-danger btn-action" title="Inactive" onclick="change_sts_active('inactive')"><i class="fa fa-pencil-square-o" ></i> Inactive</a>


              <!-- <a href="javascript:void(0)" class="btn btn-success btn-action btn-sm" title="Active"  onclick="change_sts_active('active')"><i class="fa fa-pencil-square-o" ></i> Active</a>

                <a href="javascript:void(0)" class="btn btn-danger btn-action btn-sm" title="Inactive" onclick="change_sts_active('inactive')"><i class="fa fa-pencil-square-o" ></i> Inactive</a> -->

                
            </div>
            <div class="clearfix"></div>        
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-hover table-condensed table-responsive">
                            <thead>
                            <tr class="bg-blue">
                              <th><input type="checkbox" name="all" id="all_chk"onclick="check_all()"></th>
                           
                             
                           <th>Status</th>
                           <th>Description</th>
                           <th>File</th>
                          
                          <th>Is New</th> 
                           

                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                              <?php 

                                if(count($tender) > 0)
                    {
                              foreach ($tender as $row) { 
                               

                                ?>

                               <tr>
                    <td><input type="checkbox" name="record" value="<?php echo $row->id;?>"></td>
                    <td>
                  <?php if($row->status=='active')
                  {?>
                     <img src="<?php echo base_url();?>../assets/uploads/active.png">
                  <?php 
                  }
                  else{ ?>
                     <img src="<?php echo base_url();?>../assets/uploads/inactive.png">
                  <?php
                  }  ?>
                  </td>
                              
                      
                         

                         <td><?php echo $row->description ?></td>

                         <td>
                          <?php
                          if($row->image!='')
                            {
                              ?>
                         <embed style="height: 60px; width: 70px;" src="<?php echo base_url(); ?>../assets/uploads/news_notice/<?php echo $row->image; ?>"></embed>
                         <?php
                       }
                       else{
                        echo "No file uploaded";
                      }
                      ?>

                         </td>

                         <td id="show_menu_<?php echo $row->id; ?>">

                     <?php
                     if(($row->is_new)=='Yes')
                      {
                      ?>
                     
                         <a class="label label-success" title="Change" onclick="change_home(<?php echo $row->id; ?>)" style="align:centre"> Yes</a> 
                      <?php
                       }
                       else
                       {
                      ?>
                        <a  class="label label-danger" title="Change" onclick="change_home(<?php echo $row->id; ?>)"> No</a> 
                       <?php
                        }
                       ?>
                </td>

                              
                <td>
                       
                       <a href="<?php echo base_url()?>index.php/manage_new_notice/edit_tender/<?php echo $row->id; ?> " class="btn-sm btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>

                      
                          <button type="button" class="btn-btn btn-danger" onclick="return delete_data(<?php echo $row->id;?>)" title="Delete"><i class="fa fa-trash-o"></i> Delete</button>
                             
                </td>
              </tr>
                <?php }} ?>  
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

</div>
<div class="modal" tabindex="-1" role="dialog" id="buy_modal" style="align-content: center;" >
   <form id="add" name="form" class="form-horizontal" action="<?php echo base_url();?>index.php/manage_banner/banner_insert" method="post" enctype='multipart/form-data'>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <h5 class="modal-title">Modal title</h5> -->
       <!--  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
      </div>
     
      <div class="form-group">
                  <label class="col-sm-3 control-label">Choose Section: <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>
                  <div class="col-sm-7">
                      <select class="form-control" id="section" name="section">
                       <!--  <span id="error_catname" style="color:red"></span> --> 
                       <option value="">Select Section: </option>
                  
                            <option value="<?php echo $section->section_id;?>"></option>
                   

                       
                       
                
                      </select>
                  </div>
                </div>
                              <div class="form-group" >
                                <label for="editor1" class="col-sm-2"> Image<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>
                                <div class="col-sm-7">
                                    <div class="col-sm-3">
                                        <img id="upload_pic" class="img-thumbnail" src="https://images-na.ssl-images-amazon.com/images/G/01/abis-ui/camera_icon.png" alt="no-image">
                                    </div>
                                    <div class="clearfix"></div>
                                    <input type="file" name="img_upload" id="img_upload" onchange="readURL(this);" style="outline:none;margin-top:6px">
                                </div>
                            </div> 
      <div class="modal-footer">
       <!--  <button type="button" class="btn btn-primary">Save changes</button> -->
        <button type="submit" class="btn btn-success" data-dismiss="modal">Submit</button>
      </div>
    </div>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>



<script type="text/javascript">

          function click_for_top(id)
          {
           //alert(id);
          



          if(confirm)
          {
          var base_url='<?php echo  base_url();?>';

          $.ajax({
                        
              url:base_url+'index.php/current_affairs_module/featured_status_change',
              data:{pid:id},
              dataType: "json",
              type: "POST",

              success: function(data){

                   //alert(data);
                var perform= data.changedone;

                      if(perform['status']==1)
                      {
                        
                       var node='<span class="label label-success" onclick="click_for_top('+id+')" style="cursor: pointer;"><em>Yes</em></span>';

                        $("#featured_"+id).html(node);
                      }
                     if(perform['status']==0)
                      {
                        
                        var node='<span class="label label-danger" onclick="click_for_top('+id+')" style="cursor: pointer;"><em>No</em></span>';

                        $("#featured_"+id).html(node);
                      }
                
                  }
              });



          }
          

}</script>







<script type="text/javascript">
function parent_check_checked(chk)
  {
      var oTable = $("#example1").dataTable();
      if(chk==true)
      {
          $('.multi-chk-complete', oTable.fnGetNodes()).each(function() {
              this.checked = true;
          });
      }
      else
      {
          $('.multi-chk-complete', oTable.fnGetNodes()).each(function() {
              this.checked = false;
          });
      }
  }
</script>
<script>
  function multi_action()
  {
      var checkboxValue=[];
      $.each($("input[name='chk_status']:checked"), function()
      {
          checkboxValue.push($(this).val());
      });
      var checkboxValue=checkboxValue.join(",");
      $("#hid_id").val(checkboxValue);
      //return false;
  }
</script>
<script type="text/javascript">
    function delete_category()
    {
      var conf=confirm('Are You Sure ?');
      if(conf)
      {
        var checkboxValue=[];
        $.each($("input[name='chk_status']:checked"), function()
        {
            checkboxValue.push($(this).val());
        });
        var checkboxValue=checkboxValue.join(",");
        //alert(checkboxValue);
        if(checkboxValue=="")
        {
            swal('Please Select Category!');
        }
        var base_url='<?php echo base_url(); ?>index.php/admin_category/delete_category';
        $.ajax(
        {
            type: "POST",
            dataType:'text',
            url:base_url,
            data: { id: checkboxValue},
            async: false,
            success: function(data)
            {
                    $.each($("input[name='chk_status']:checked"), function()
                    {
                        $("#category_row_id_"+$(this).val()).hide();
                    });
            }
        });
      }

    }
</script>

<script>
function change_home_status(id)
{
  //alert(id);
if(swal("Are you sure ?"))
{
var base_url='<?php echo  base_url();?>';

$.ajax({
              
              url:base_url+'index.php/admin_category/change_home_view_status',
              data:{cid:id},
              dataType: "json",
              type: "POST",
              success: function(data){

                
                var perform= data.changedone;
                //alert(perform);
                     
                      if(perform['status']==1)
                      {
                        
                       var node='<a href="#" class="label label-success"  title="Change" onclick="change_home_status('+id+')">Yes</a>';

                        $("#home_view_"+id).html(node);
                        //$("#buy_modal").modal('show');
                      }
                      else
                      {
                        
                        var node='<a href="#" class="label label-danger" title="Change" onclick="change_home_status('+id+')">No</a>';

                        $("#home_view_"+id).html(node);
                        //$("#buy_modal").modal('show');
                      }
                  
                  }
              });


}
}
</script>

<script>
function change_home(id)
{
  //alert(id);
if(swal("Are you sure ?"))
{
var base_url='<?php echo  base_url();?>';

$.ajax({
              
              url:base_url+'index.php/admin_category/change_home_status',
              data:{cid:id},
              dataType: "json",
              type: "POST",
              success: function(data){

                
                var perform= data.changedone;
                //alert(perform);
                     
                      if(perform['status']==1)
                      {
                        
                       var node='<a href="#" class="label label-success"  title="Change" onclick="change_home('+id+')">Yes</a>';

                        $("#show_menu_"+id).html(node);
                      }
                      else
                      {
                        
                        var node='<a href="#" class="label label-danger" title="Change" onclick="change_home('+id+')">No</a>';

                        $("#show_menu_"+id).html(node);
                      }
                  
                  }
              });


}
}
</script>

     <script type="text/javascript">
      
        function sort_order(value,id)
        {
          //alert(value);alert(id);
             $.ajax({

              type: "POST",
              dataType:'json',
              url:"<?php echo base_url();?>index.php/admin_category/update_sort_order",
              data: {order:value,cat_id:id},
              async: false,

                    success: function(data)
                      {
                        location.reload();
                      }

                });

        }

    </script>

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
              
             url:base_url+'index.php/manage_new_notice/change_to_active',
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
            if(confirm('Are you sure want to delete'))
            {
                window.location.href="<?php echo base_url();?>index.php/manage_new_notice/delete_tender/"+id;
            }
          }


           function question_answer_delete_data(id)
          {
            if(confirm('Are you sure to delete this Module?'))
            {
                window.location.href="<?php echo base_url();?>index.php/current_affairs_toppic/question_answer_delete_data/"+id;
            }
          }

        </script>
        <script>
    function readURL(input)
    {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#prof_pic')
                    .attr('src', e.target.result)
                    .width(90)
                    .height(90);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>


<script>
function change_home(id)
{
  //alert(id);
if(confirm("Are you sure ?"))
{
var base_url='<?php echo  base_url();?>';

$.ajax({
              
              url:base_url+'index.php/manage_new_notice/change_home_status',
              data:{cid:id},
              dataType: "json",
              type: "POST",
              success: function(data){

                
                var perform= data.changedone;
                //alert(perform);
                     
                      if(perform['status']==1)
                      {
                        
                       var node='<a href="#" class="label label-success"  title="Change" onclick="change_home('+id+')">Yes</a>';

                        $("#show_menu_"+id).html(node);
                      }
                      else
                      {
                        
                        var node='<a href="#" class="label label-danger" title="Change" onclick="change_home('+id+')">No</a>';

                        $("#show_menu_"+id).html(node);
                      }
                  
                  }
              });


}
}
</script>