<script src='//cdn.tinymce.com/4/tinymce.min.js'></script>
  <!--<script>tinymce.init({ selector:'textarea' });</script>-->
  <script type="text/javascript">
    tinymce.init({
      selector: ".tinyarea",
      theme: "modern",
      menubar: "edit insert tools",
      plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern imagetools"
      ],
      toolbar1: "undo redo | styleselect | bold italic| forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist | link preview",
      image_advtab: true
    });
  </script>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->                                       
    <section class="content-header">
      <h3>
        
       ADD NEW GALLERY
      </h3>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Add Gallery</li>    
      </ol>
    </section>

  <!-- Main content -->
    <section class="content">
<!--//////////////////////////////////////////////////////////////////////////////////////////////////////-->
      <div class="row">
        
        <!-- right column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add Gallery</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
         <div style="padding-left: 12px;"><?php echo $this->session->flashdata('msg'); ?></div>
            
            <form id="add" name="form" class="form-horizontal" action="<?php echo base_url();?>index.php/manage_gallery/insert_gallery" method="post" enctype='multipart/form-data'>
              <div class="box-body">
             <div class="form-group">
                 <label for="inputUsername" class="col-sm-2 control-label">Choose Album:<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>
           
                          <div class="col-sm-9">
                               <select class="form-control" name="category" id="category">
                                <option name="category" value="">select Album</option>

                                <?php foreach ($cat_details as $category) { ?>
                               <option value="<?php echo $category->cat_id; ?>"><?php echo $category->cat_name; ?></option>
                                            <?php } ?>
                              

                              
                             </select>
                           </div>
                         </div>

                         <div class="form-group">
                 <label for="gallery_year" class="col-sm-2 control-label">Gallery Type:<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>
           
                 <div class="col-sm-9">
                   <select class="form-control" name="type" id="type1" onchange="gallery_type_show(this.value);" >
                         <!-- <option value="">select type</option> -->
                         <option value="image">Image</option>
                         <option value="video">Video</option>



                          
                             </select>
                   <span id="error_status"></span>
                 </div>
                 
             </div> 
              <div class="clearfix"></div> 
              <div class="form-group" id="video_link_show1" style="display: none;">
                  <label for="branch_name" class="col-sm-2 control-label">Video Link<span style="color: rgb(255, 0, 0); padding-left: 2px;"></span></label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="video_link[]" id="video_link" placeholder="Enter Video Link">
                    </div>
                 
                 <table>
                                          <tr>
                                            <td>
                                              <a href="javacript:void(0)" class="btn btn-primary" id="video_n_1" onclick="produce_file_box_video('1')"><b>+</b></a>
                                            </td>
                                            <td>
                                              <!--<a href="javacript:void(0)" class="btn btn-primary" id="minus" onclick="hiding_out('2');"><b>-</b></a>--></td>
                                            </tr>
                                          </table>

                                        </div>


                                         <div id="more_video_1"></div>
                                        <div id="more_video_2"></div>
                                        <div id="more_video_3"></div>
                                        <div id="more_video_4"></div>
                                        <div id="more_video_5"></div>

                                       
       
               
               <div class="clearfix"></div> 
                             <div class="form-group" style="margin-top: 10px;" id="image_link_show1"  >
                                    <label for="gallery_image" class="col-sm-2 control-label text-center">Gallery Image(788 X 543 px):<span style="color:#F00">*</span></label>
                                    <div class="col-sm-7">
                                        <input type="file"  name="gallery_image[]" id="gallery_image" onchange="readURL(this,1);" >
                                        <img id="prof_pic1" src="<?php echo base_url()?>../assets/uploads/no-image.jpg"  alt="User Image" style="margin-top: 10px;width:90px;height:90px;" />
                                    </div>
                          

                            <table>
                                          <tr>
                                            <td>
                                              <a href="javacript:void(0)" class="btn btn-primary" id="img_n_1" onclick="produce_file_box('1')"><b>+</b></a>
                                            </td>
                                            <td>
                                              <!--<a href="javacript:void(0)" class="btn btn-primary" id="minus" onclick="hiding_out('2');"><b>-</b></a>--></td>
                                            </tr>
                                          </table>

                                        </div>
                                        <div id="more_image_1"></div>
                                        <div id="more_image_2"></div>
                                        <div id="more_image_3"></div>
                                        <div id="more_image_4"></div>
                                        <div id="more_image_5"></div>



                            

             
               
               <!--  <div class="form-group">
                  <label for="branch_name" class="col-sm-2 control-label">Meta Title</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="meta_title" id="branch_name" placeholder="Enter Meta Title">
                    </div>
                 
                </div>
                <div class="form-group">
                  <label for="branch_name" class="col-sm-2 control-label">Meta Keyword</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="meta_keyword" id="branch_name" placeholder="Enter Meta Keyword">
                    </div>
                 
                </div><div class="form-group">
                  <label for="branch_address" class="col-sm-2 control-label">Meta Description</label>

                    <div class="col-sm-9" >
                      <div id="branch_address_area"><textarea class="form-control" rows="5" name="meta_description" id="branch_address" placeholder="Meta Description"></textarea></div>
                    </div>
                 
                </div> -->
                <div class="form-group">
                 <label for="inputUsername" class="col-sm-2 control-label">Status: </label>
           
                 <div class="col-sm-9">
                   <select class="form-control" name="status" id="status">
                  
                   <option value="active" selected>Active</option>
                   <option value="inactive">Inactive</option>
                   </select>
                   <span id="error_status"></span>
                 </div>
                 
             </div> 

             
               <input type="hidden" name="gallery_id">
             
             
             <span style="color: rgb(255, 0, 0); padding-left: 2px;">* fields are required</span>
              
              </div>

              <!-- /.box-body -->
               
             

            
              <div class="box-footer">
                <a href="<?php echo base_url();?>index.php/manage_gallery/list_view" class="btn btn-danger fa fa-backward"><b>Back</b></a>
                <button type="submit" class="btn btn-info pull-right" onclick="return form_validation()"><b>Submit</b></button>
              </div>
              <!-- /.box-footer -->

            </form>
          </div>
          <!-- /.box -->

        </div>
        <!--/.col (right) -->
      </div>
      <!-- ////////////////////////////////////////////////////////////////////////////////// -->
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<script src="<?php echo base_url();?>custom_script/validation_rulse.js"></script>
             <script src="<?php echo base_url();?>custom_script/setting_validation.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>

</script> 

<script type="text/javascript">
    function readURL(input,id)
    {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#prof_pic'+id)
                    .attr('src', e.target.result)
                    .width(90)
                    .height(90);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }





     function gallery_type_show(type)
    {

     // alert(type);
        if (type=='image') {
            

           $('#image_link_show1').show();
           $('#video_link_show1').hide();
           $('#video_link_show2').hide();
           $('#video_link_show3').hide();
           $('#video_link_show4').hide();
           $('#video_link_show5').hide();

            
        }

        else{

         $('#video_link_show1').show();
         $('#image_link_show1').hide();
         $('#image_link_show2').hide();
         $('#image_link_show3').hide();
         $('#image_link_show4').hide();
         $('#image_link_show5').hide();

        }




    }



</script>
<script>

     function product_Submit_fm()
    {

          var category = $('#category').val();
        if (!isNull(category)) 
        {
          $('#category').removeClass('black_border').addClass('red_border');
          return false;
        } 
        else 
        {
          $('#category').removeClass('red_border').addClass('black_border');
        } 




         /* var type1 = $('#type1').val();
     
         if(type1=='video'){

            var video_link = $('#video_link').val();
        if (!isNull(video_link)) 
        {
          $('#video_link').removeClass('black_border').addClass('red_border');
          return false;
        } 
        else 
        {
          $('#video_link').removeClass('red_border').addClass('black_border');
        }




         }
        else{



          var gallery_image = $('#gallery_image').val();
        if (!isNull(gallery_image)) 
        {
          $('#gallery_image').removeClass('black_border').addClass('red_border');
          return false;
        } 
        else 
        {
          $('#gallery_image').removeClass('red_border').addClass('black_border');
        }

  
  }*/
        

    }

    function form_validation()
    {
        //alert("ok");

        $('#add').attr('onchange', 'product_Submit_fm()');
        $('#add').attr('onkeyup', 'product_Submit_fm()');

        product_Submit_fm();
        //alert($('#contact_form .red_border').size());

        if ($('#add .red_border').size() > 0)
        {
            $('#add .red_border:first').focus();
            $('#add .alert-error').show();
            return false;
        } 
        else 
        {

            $('#add').submit();
        }
    }
</script>


<script type="text/javascript">

  function produce_file_box(id)
  {
       // alert(id);

        var val=id;

        if(val==1)
        {
         $("#img_no_1").hide();
         $("#img_minus").hide();
       }
       var base_url='<?php echo base_url(); ?>';
       if(val==2)
       {
        $("#img_no_"+val).hide();

      }
      if(val==3)
      {
        $("#img_no_"+val).hide();
      }

       if(val==4)
      {
        $("#img_no_"+val).hide();
      }

     if(val==5)
      {
        $("#img_no_"+val).hide();
      }



      $.ajax({

       url:base_url+'index.php/manage_gallery/file_box_show',
       data:{num:val},
       dataType: "html",
       type: "POST",
       success: function(data){


        $("#more_image_"+id).html(data);
        $("#more_image_"+id).show();



      }
    });

    }

    
    function hiding_out(val)
    {

      //  alert(val);

      var current_div=val-1;          
      $("#more_image_"+current_div).html('');
      $("#more_image_"+current_div).hide();
      
    }





 function produce_file_box_video(id)
  {
      //  alert(id);

        var val=id;

        if(val==1)
        {
         $("#video_no_1").hide();
         $("#video_minus").hide();
       }
       var base_url='<?php echo base_url(); ?>';
       if(val==2)
       {
        $("#video_no_"+val).hide();

      }
      if(val==3)
      {
        $("#video_no_"+val).hide();
      }

       if(val==4)
      {
        $("#video_no_"+val).hide();
      }

     if(val==5)
      {
        $("#video_no_"+val).hide();
      }



      $.ajax({

       url:base_url+'index.php/manage_gallery/file_box_show_video',
       data:{num:val},
       dataType: "html",
       type: "POST",
       success: function(data){

      //  alert(id);

       // alert(data);


        $("#more_video_"+id).html(data);
        $("#more_video_"+id).show();



      }
    });

    }

    
    function hiding_out_video(val)
    {

      //  alert(val);

      var current_div=val-1;          
      $("#more_video_"+current_div).html('');
      $("#more_video_"+current_div).hide();

     /* if(val==2)
      $("#video_no_1").show();*/
      
    }


</script>











<style>
.error {color: #FF0000;}
</style>

 
    