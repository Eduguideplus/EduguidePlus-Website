 <?php 
    $role_id= $this->session->userdata('session_role_id');
 ?>      
  <!-- Content Wrapper. Contains page content -->
  <script language="JavaScript" type="text/javascript" src="<?php echo base_url();?>tiny_mce/tiny_mce.js"></script>
  <script type="text/javascript">
        tinymce.init({
              mode : "textareas",

        height:"400px",
        theme : "advanced",
        editor_deselector : "mceNoEditor",
    relative_urls:false,
        plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
         file_browser_callback : "filebrowser",
        // Theme options
        theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,search,replace,|,styleprops",
        theme_advanced_buttons2 : "styleselect,formatselect,fontselect,fontsizeselect,|,help,code,|,forecolor,backcolor",
        theme_advanced_buttons3 : "cut,copy,paste,pastetext,pasteword,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,|,insertdate,inserttime,preview",
        theme_advanced_buttons4 : "tablecontrols,|,hr,removeformat,visualaid,|,charmap,emotions,iespell,media,advhr,|,print",
        theme_advanced_buttons5 : "insertlayer,moveforward,movebackward,absolute,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,|,sub,sup,|,fullscreen,|,ltr,rtl",
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "bottom",
        //theme_advanced_resizing : true,

        // Example content CSS (should be your site CSS)
      
        });
    </script>
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
      <h3> HOME TITLE

        <small></small>
      </h3>

        <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">HOME TITLE</li>
      </ol>
    </section>

  <!-- Main content -->
    <section class="content">
      <!-- //////////////////////////////////////////////////////////////////////////// -->
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
             <!-- <form class="form-horizontal" action="<?php echo base_url();?>index.php/home/home_update" method="post" id="sign_up" enctype="multipart/form-data">
              <div class="box-body">
              <div class="form-group">
                  <label for="title1" class="col-sm-2 control-label"><center>Home Title1:<span style="color:#F00">*</span> </center></label>

                  <div class="col-sm-9">
                   
                  <input type="text"  name="title1" id="title1" class="form-control"  value="<?php echo $title[0]->home_main_title;?>">
                  <input type="hidden" value="<?php echo @$title[0]->home_id;?>" name="home_id">
                  </div>
                  
                </div>

                  <div class="form-group">
                  <label for="title2" class="col-sm-2 control-label"><center>Home Title2:<span style="color:#F00">*</span> </center></label>

                  <div class="col-sm-9">
                   
                  <input type="text"  name="title2" id="title2" class="form-control"  value="<?php echo $title[0]->home_title; ?>">

                  </div>
                  
                </div>

                 <div class="form-group">
                  <label for="title3" class="col-sm-2 control-label"><center>Button Title:<span style="color:#F00">*</span> </center></label>

                  <div class="col-sm-9">
                   
                  <input type="text"  name="title3" id="title3" class="form-control"  value="<?php echo $title[0]->button_title;?>">

                  </div>
                  
                </div>

                </div>

                <div class="box-footer">
                < <a href="<?php echo base_url(); ?>index.php/manage_what_we_do/list_view" class="btn btn-danger">Cancel</a> 
                <button type="submit" class="btn btn-info pull-right" onclick="return login_validation()">Update</button>
              </div>
                </form> -->
            <div class="box-header with-border">

              
        
              <h3 class="box-title">Slider Images(<?php echo count($slider_image);?>)</h3>
              
            </div>
            <!-- /.box-header -->

            <form>
              
            <div style="padding-left: 12px;padding-top: 12px;">
            <button type="button" class="btn btn-primary" onClick="window.location='<?php echo base_url();?>index.php/home/add_image';"><span class="glyphicon glyphicon-plus"></span>Add New Image</button>
            
             
              <!--<span style="padding-left: 80.5%">-->
              <a href="javascript:void(0)" class="btn btn-success btn-action" title="Active"  onclick="change_sts_active('active')"><i class="fa fa-pencil-square-o"  ></i> Active</a>

                <a href="javascript:void(0)" class="btn btn-danger btn-action" title="Inactive" onclick="change_sts_active('inactive')"><i class="fa fa-pencil-square-o" ></i> Inactive</a>

                <!-- <a href="javascript:void(0)" class="btn btn-danger btn-action" title="Selected Delete" onclick="delete_selected()"><i class="fa fa-trash-o"></i> Delete</a> -->
            
             
            </div>

           
            <div class="box-body table-responsive">

           
              <table id="example1" class="table table-bordered table-striped myTable1">
              
               <thead>
                <tr class="bg-blue" >
                <th><input type="checkbox" name="all" id="all_chk" onclick="check_all()"></th>
                 
                 <th>Status</th> 
                 <!-- <th>Title</th>
                  <th>Description</th> -->
                  <th>Image</th>
                  <th>Action</th>                  
                </tr>
               </thead>

               <tbody>
                     <?php 
                    //  if(count($what) > 0)
                    // {
                      
                      foreach($slider_image as $row)
                     {
                      
                     ?>            
                    <tr>
                    <td><input type="checkbox" name="record" value="<?php echo $row->slider_id;?>"></td>
                  
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
                   
                    <!-- <td><?php if(!empty($row->record_1_title)){ echo $row->record_1_title; } else{ echo 'N/A'; } ?></td>
                   
                    <td >
                   <?php if(!empty($row->record_1_count)){ echo word_limiter($row->record_1_count,10); } else{ echo 'N/A'; } ?>
                    
                 </td> -->
              
          <td><?php if(!empty($row->image)){ ?><img src="<?php echo base_url();?>../assets/uploads/slider/<?php echo $row->image; ?>" height='60' width='60' style="background-color: orange;" ><?php } else{ echo 'N/A';} ?> </td>
                     

                        <td>
                     
                          
                             <a href="<?php echo base_url();?>index.php/home/edit_image/<?php echo $row->slider_id;?>" class="btn btn-info"><i class="fa fa-pencil-square-o" title="edit"></i></a>
                             
                             <a type="button" class="btn btn-danger" onclick="return delete_data('<?php echo $row->slider_id;?>')" ><i class="fa fa-trash-o" title="delete"></i></a>
                            
                        </td>
                       
                     </tr>
                     <?php
                     // } 
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
<style>
    .glowing-border-red_show{
        outline: none;
        border-color: #ff3333 !important;
        box-shadow: 0 0 10px #ff3333 !important;
    }
</style>


                <!--  view -->

<script type="text/javascript">
  function validatelogin()
    {

        var title=$('#title').val();

         if(title=="")
         {
            $("#title").addClass("glowing-border-red_show");
            return false;
         }
         else
         {
            $("#title").removeClass("glowing-border-red_show");
         }


         var description = tinymce.get('description').getContent();

         if(description=="")
         {
            $("#description").addClass("glowing-border-red_show");
             document.getElementById("error_catname").innerHTML = "Please provide description.";
            return false;
         }
         else
         {
            $("#description").removeClass("glowing-border-red_show");
         }


      }

  function login_validation()
    {
        //alert("ok");

        $('#sign_up').attr('onchange', 'validatelogin()');
        $('#sign_up').attr('onkeyup', 'validatelogin()');

       validatelogin();
        //alert($('#contact_form .red_border').size());

        if ($('#sign_up .glowing-border-red_show').size() > 0)
        {
            $('#sign_up .glowing-border-red_show:first').focus();
            /*$('#login_form .alert-error').show();*/
            return false;
        } 
        else 
        {

            $('#sign_up').submit();
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
              
             url:base_url+'index.php/manage_what_we_do_con/change_to_active',
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
<script>
function change_featured(id)
{
if(confirm("Are you sure"))
{
  
var baseurl='<?php echo  base_url();?>';

$.ajax({
              
              url:baseurl+'index.php/manage_blog/change_featured_status',
              data:{pid:id},
              dataType: "json",
              type: "POST",
              success: function(data){


                var perform= data.changedone;

                      if(perform['status']==1)
                      {
                        
                       var node='<a href="#" class="btn btn-success btn-action" title="Change" onclick="change_featured('+id+')"><i class="fa fa-o" ></i>Yes</a>';

                        $("#featured_"+id).html(node);
                      }
                      else
                      {
                        
                        var node='<a href="#" class="btn btn-danger btn-action" title="Change" onclick="change_featured('+id+')"><i class="fa fa-o" ></i>No</a>';

                        $("#featured_"+id).html(node);
                      }
                
                  }
              });
//window.location=baseurl+'index.php/manage_category/popularity_change/'+id;


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
          window.location=baseurl+'index.php/home/delete_data/'+id;

      }
}
</script>
<script type="text/javascript">

function change_status(id)
{
if(confirm("Are you sure"))
{
var baseurl='<?php echo  base_url();?>';
window.location=baseurl+'index.php/home/change_to_active/'+id;
}
}
</script>

<script type="text/javascript">
      
        function sort_order(value,id)
        {
          //alert(value);alert(id);
          if(confirm("Are you sure to change")){
             $.ajax({

              type: "POST",
              dataType:'json',
              url:"<?php echo base_url();?>index.php/manage_blog/update_sort_order",
              data: {order:value,cat_id:id},
              //async: false,

                    success: function(data)
                      {
                        //alert('okk');
                        location.reload();
                      }

                });
           }
        }




  function change_sts_active(status)
    {
        
        var favorite = [];
        $.each($("input[name='record']:checked"), function(){
            favorite.push($(this).val());
        });

        var value=favorite;
        //alert(status);
        if(value=="")
        {
            alert('Please select atleast one record');
        }
        else
        {
            $.ajax(
                {
                    type: "POST",
                    dataType:'json',
                    url:"<?php echo base_url(); ?>index.php/home/change_to_active",
                    data: {id:value,status:status},
                    dataType: "json",
                    async: false,
                    success: function(data)
                    {
                        // alert(data);
                       // location.reload();
                     var perform= data.changedone;
                    // alert(perform);

                 if(perform==1)
                 {
                   alert('Status changed successsfully');
                   location.reload();
                 }
                
              }
                });
        }

    }
    </script>
  

 

  