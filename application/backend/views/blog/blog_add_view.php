
<link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/datepicker/datepicker3.css">
<style>
    .glowing-border-red{
        outline: none;
        border-color: #ff3333;
        box-shadow: 0 0 10px #ff3333;
    }
    .glowing-border-green{
        outline: none;
        border-color: #4dff4d;
        box-shadow: 0 0 10px #4dff4d;
    }
</style>





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











<div class="wrapper">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Add Articles
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url()?>index.php/admin_dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                <li>Add Articles</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <!-- <h3 class="box-title">Add Home Slider</h3> -->
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form name="main" id="add" action="<?php echo base_url(); ?>index.php/manage_blog/blog_add_submit" role="form" method="post" enctype="multipart/form-data">
                            <div class="box-body">



                            <div class="form-group" style="margin-top: 10px">
                                    <label for="coupon_code" class="col-sm-2 control-label text-center">Articles Category: <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>
                                    <div class="col-sm-9">
                                       


                                       <select class="form-control" name="job_category" id="job_category">
                                <option value="">select category</option>

                                <?php foreach ($cat_details as $category) { ?>
                               <option value="<?php echo $category->id; ?>"><?php echo $category->category_name; ?></option>
                                            <?php } ?>
                              

                              
                             </select>


                                    </div>
                                </div>

                                <div class="clearfix"></div>
                                
                               


                             <div class="form-group" style="margin-top: 10px;">
                                    <label for="image" class="col-sm-2 control-label text-center">Image(841X400 px): <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="file"  name="slider_image" id="slider_image" onchange="readURL(this);">
                                        <img id="prof_pic" src="<?php echo base_url()?>../assets/uploads/no-image.jpg"  alt="User Image" style="margin-top: 10px;width:150px;height:90px;" />
                                    </div>
                            </div>
                              <div class="clearfix"></div>






                               
                                
                                


                               <div class="form-group" style="margin-top: 10px">
                                    <label for="coupon_code" class="col-sm-2 control-label text-center">Articles Title: <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>
                                    <div class="col-sm-9">
                                       <input type="text" class="form-control" name="blog_title" id="blog_title"> 


                                      


                                    </div>
                                </div>







                                 <div class="clearfix"></div>


                               <div class="form-group" style="margin-top: 10px">
                                    <label for="coupon_code" class="col-sm-2 control-label text-center">Articles Author: <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>
                                    <div class="col-sm-9">
                                       <input type="text" class="form-control" name="blog_author" id="blog_author"> 


                                      


                                    </div>
                                </div>   

                                 
                                
                                 <div class="clearfix"></div>


                               <div class="form-group" style="margin-top: 10px">
                                    <label for="coupon_code" class="col-sm-2 control-label text-center">Articles Description: <span style="color: rgb(255, 0, 0); padding-left: 2px;"></span></label>
                                    <div class="col-sm-9">

                                      <div id="description"><textarea class="form-control tinyarea" rows="20" name="description" id="description" placeholder="Enter requirements"></textarea></div>


                                      


                                    </div>
                                </div>



                                  <div class="clearfix"></div>


                         <h4 style="color:green;"><b><u>Seo Details:-</u></b></h4>
                               <div class="clearfix"></div>


                               <div class="form-group" style="margin-top: 10px">
                                    <label for="coupon_code" class="col-sm-2 control-label text-center">Meta Title: <span style="color: rgb(255, 0, 0); padding-left: 2px;"></span></label>
                                    <div class="col-sm-9">
                                       <input type="text" class="form-control" name="meta_title" id="meta_title"> 


                                      


                                    </div>
                                </div>

                                 <div class="clearfix"></div>


                               <div class="form-group" style="margin-top: 10px">
                                    <label for="coupon_code" class="col-sm-2 control-label text-center">Meta Keyword: <span style="color: rgb(255, 0, 0); padding-left: 2px;"></span></label>
                                    <div class="col-sm-9">
                                       <input type="text" class="form-control" name="meta_keyword" id="meta_keyword"> 


                                      


                                    </div>
                                </div>




                            <div class="clearfix"></div>


                               <div class="form-group" style="margin-top: 10px">
                                    <label for="coupon_code" class="col-sm-2 control-label text-center">Meta Description: <span style="color: rgb(255, 0, 0); padding-left: 2px;"></span></label>
                                    <div class="col-sm-9">

                                      <div id="meta_description"><textarea class="form-control tinyarea" rows="5" name="meta_description" id="meta_description" placeholder="Enter requirements"></textarea></div>


                                      


                                    </div>
                                </div>




                              <div class="clearfix"></div>





                               
                                <div class="box-footer" style="margin-top: 10px">
                                    <button type="submit" class="btn btn-primary" onclick="return form_validation()">Submit</button>
                                    <a href="<?php echo base_url();?>index.php/manage_blog/blog_list" class="btn btn-danger">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
</div>


<script src="<?php echo base_url();?>custom_script/validation_rulse.js"></script>

<script>
  function validation()
  {
    
      var job_category = $('#job_category').val();
      if (!isNull(job_category)) {
        $('#job_category').removeClass('black_border').addClass('red_border');
      } else {
        $('#job_category').removeClass('red_border').addClass('black_border');
      }

      var slider_image = $('#slider_image').val();
      if (!isNull(slider_image)) {
        $('#slider_image').removeClass('black_border').addClass('red_border');
      } else {
        $('#slider_image').removeClass('red_border').addClass('black_border');
      }


        var blog_title = $('#blog_title').val();
      if (!isNull(blog_title)) {
        $('#blog_title').removeClass('black_border').addClass('red_border');
      } else {
        $('#blog_title').removeClass('red_border').addClass('black_border');
      }

        var blog_author = $('#blog_author').val();
      if (!isNull(blog_author)) {
        $('#blog_author').removeClass('black_border').addClass('red_border');
      } else {
        $('#blog_author').removeClass('red_border').addClass('black_border');
      }

        /*var slider_image = $('#slider_image').val();
      if (!isNull(slider_image)) {
        $('#slider_image').removeClass('black_border').addClass('red_border');
      } else {
        $('#slider_image').removeClass('red_border').addClass('black_border');
      }*/

       




  }
  function form_validation()
  {
  
   
    $('#add').attr('onchange', 'validation()');
    $('#add').attr('onkeyup', 'validation()');
    $('#add').attr('onclick', 'validation()');

     validation();
    //alert($('#contact_form .red_border').size());

    if ($('#add .red_border').size() > 0)
    {
      $('#add .red_border:first').focus();
      $('#add .alert-error').show();
      return false;
    } else {

      $('#add').submit();
    }

  }

  </script>
















<!-- <script src="<?php echo base_url();?>custom_script/validation_rulse.js"></script>
  <script src="<?php echo base_url();?>custom_script/setting_validation.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>


function product_Submit_frm()
    {



        var job_category = $('#job_category').val();

        if (!isNull(job_category))
        {
          $('#job_category').removeClass('black_border').addClass('red_border');
           $("#job_category").attr("data-toggle", "tooltip");
                $("#job_category").attr("data-placement", "bottom");
                document.getElementById('job_category').title = 'Category Is Required';
                $('#job_category').tooltip('show');
          
        } 
        else 
        {
          $('#job_category').removeClass('red_border').addClass('black_border');
           document.getElementById('job_category').title = '';
                $('#job_category').tooltip('destroy');
        }


       var slider_image = $('#slider_image').val();
        if (!isNull(slider_image)) 
        {
          $('#slider_image').removeClass('black_border').addClass('red_border');

         $("#slider_image").attr("data-toggle", "tooltip");
                $("#slider_image").attr("data-placement", "bottom");
                document.getElementById('slider_image').title = 'Image Is Required';
                $('#slider_image').tooltip('show'); 
        } 
        else 
        {
          $('#slider_image').removeClass('red_border').addClass('black_border');
            document.getElementById('slider_image').title = '';
                $('#slider_image').tooltip('destroy');
        }



        var blog_title = $('#blog_title').val();
        if (!isNull(blog_title)) 
        {
          $('#blog_title').removeClass('black_border').addClass('red_border');
        

         $("#blog_title").attr("data-toggle", "tooltip");
                $("#blog_title").attr("data-placement", "bottom");
                document.getElementById('blog_title').title = 'Title Is Required';
                $('#blog_title').tooltip('show');  
        } 
        else 
        {
          $('#blog_title').removeClass('red_border').addClass('black_border');
           document.getElementById('blog_title').title = '';
                $('#blog_title').tooltip('destroy');
        }

         
          var blog_author = $('#blog_author').val();
        if (!isNull(blog_author)) 
        {
          $('#blog_author').removeClass('black_border').addClass('red_border');
         
          $("#blog_author").attr("data-toggle", "tooltip");
                $("#blog_author").attr("data-placement", "bottom");
                document.getElementById('blog_author').title = 'Author Is Required';
                $('#blog_author').tooltip('show');  
        } 
        else 
        {
          $('#blog_author').removeClass('red_border').addClass('black_border');
          document.getElementById('blog_author').title = '';
 $('#blog_author').tooltip('destroy');       
}
        
       


          var description= tinymce.get('description').getContent();
        if (!isNull(description)) 
        {
          
          $('#description').removeClass('black_border').addClass('red_border');
           $("#description").attr("data-toggle", "tooltip");
                $("#description").attr("data-placement", "bottom");
                document.getElementById('description').title = 'Description Is Required';
                $('#description').tooltip('show'); 
        } 
        else 
         {
           $('#description').removeClass('red_border').addClass('black_border');
           document.getElementById('description').title = '';
                $('#description').tooltip('destroy');
         }    



         
         
         

        

    }

    function form_validation()
    {
        //alert("ok");

        //$('#add_event').attr('onclick', 'product_Submit_frm()');
        $('#main').attr('onchange', 'product_Submit_frm()');
        $('#main').attr('onkeyup', 'product_Submit_frm()');

        product_Submit_frm();
        //alert($('#contact_form .red_border').size());

        if ($('#main .red_border').size() > 0)
        {
            $('#main .red_border:first').focus();
            $('#main .alert-error').show();

            return false;
        } 
        else 
        {

            $('#main').submit();
        }
    }

    
</script> -->

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






