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
      <h1>
       GALLERY TAG ADD
        
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <!-- <h3 class="box-title">CATEGORY ADD</h3> -->
            <div id="validation" style="color:red;"></div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="<?php echo base_url();?>index.php/manage_gallery_tag/insert_tag" method="post" id="categoryadd_form_validation" enctype='multipart/form-data' >
              <div class="box-body">
               <span style="color: rgb(255, 0, 0); padding-left: 2px;">(* fields are required)</span>
               
  <?php $gall_details= $this->common->select($table_name='tbl_gallery_category',$field=array(),
       $where=array(),$like=array(),$order=array(),$where_or=array(),$like_or_array=array()); 

       ?>           

              <div class="form-group">
                  <label for="category_name" class="col-sm-2 control-label">Gallery Tag:<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-8">
                    <input type="text" name="category_name" id="category_name" onkeyup="catname(this.value)" class="form-control" placeholder="Gallery Tag" value=""  autocomplete="off">
                    
                  </div>
                 
              </div>
<div class="clearfix"></div> 
                             <!-- <div class="form-group" style="margin-top: 10px;">
                                    <label for="image" class="col-sm-2 control-label text-center">Album Image(788 X 543 px):<span style="color:#F00">*</span></label>
                                    <div class="col-sm-7">
                                        <input type="file"  name="cat_image" id="image" onchange="readURL(this);">
                                        <img id="prof_pic" src="<?php echo base_url()?>../assets/uploads/no-image.jpg"  alt="User Image" style="margin-top: 10px;width:90px;height:90px;" />
                                    </div>
                            </div> -->
         <!--    <div class="clearfix"></div> 
              <div class="form-group">
                  <label for="sort_order" class="col-sm-2 control-label">Category Sort Order</label>

                  <div class="col-sm-8">
                    <input type="number" name="sort_order" id="sort_order"
                     onchange="sort_order(this.value)"
                     class="form-control" placeholder="Sort Order" value="<?php echo count($gall_details)+1; ?>">
                    
                  </div>
                 
              </div> -->

               <!-- <div class="form-group">
                  <label for="branch_name" class="col-sm-2 control-label">Meta Title</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="meta_title" id="branch_name" placeholder=" Meta Title">
                    </div>
                 
                </div>
                <div class="form-group">
                  <label for="branch_name" class="col-sm-2 control-label">Meta Keyword</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="meta_keyword" id="branch_name" placeholder=" Meta Keyword">
                    </div>
                 
                </div><div class="form-group">
                  <label for="branch_address" class="col-sm-2 control-label">Meta Description</label>

                    <div class="col-sm-9" >
                      <div id="branch_address_area"><textarea class="form-control" rows="5" name="meta_description" id="branch_address" placeholder="Meta Description"></textarea></div>
                    </div>
                 
                </div> -->
               

              <div class="form-group">
                  <label for="status" class="col-sm-2 control-label">Status</label>

                  <div class="col-sm-8">
                    <select class="form-control" name="status" id="status">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                    </select>
                    
                  </div>
                 
              </div>

              </div>
             
             
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo base_url();?>index.php/manage_gallery_tag/list_view" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-info pull-right" onclick="return form_validation()">Submit</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
          <!-- general form elements disabled -->
          
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- </div> -->
 
<script src="<?php echo base_url();?>custom_script/validation_rulse.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- <script type="text/javascript">
        function sort_order(value1){
        // var sort_order = $('#sort_order').val();
        if (value1<=0 && value1=="") 
        {
          document.getElementById('#sort_order').value = 1;
         
        } }
</script>

 -->
   <script>

    function product_Submit_fm()
    {


        var category = $('#category_name').val();
        if (!isNull(category)) 
        {
          $('#category_name').removeClass('black_border').addClass('red_border');
          return false;
        } 
        else 
        {
          $('#category_name').removeClass('red_border').addClass('black_border');
        }
          /*  var image = $('#image').val();
        if (!isNull(image)) 
        {
          $('#image').removeClass('black_border').addClass('red_border');
          return false;
        } 
        else 
        {
          $('#image').removeClass('red_border').addClass('black_border');
        }


    var sort_order = $('#sort_order').val();
        if (sort_order<=0)
        {
          $('#sort_order').removeClass('black_border').addClass('red_border');
          return false;
        } 
        else 
        {
          $('#sort_order').removeClass('red_border').addClass('black_border');
        }
*/
       
       

    }

    function form_validation()
    {
        //alert("ok");

        $('#categoryadd_form_validation').attr('onchange', 'product_Submit_fm()');
        $('#categoryadd_form_validation').attr('onkeyup', 'product_Submit_fm()');

        product_Submit_fm();
        //alert($('#categoryadd_form_validation .red_border').size());

        if ($('#categoryadd_form_validation .red_border').size() > 0)
        {
            $('#categoryadd_form_validation .red_border:first').focus();
            $('#categoryadd_form_validation .alert-error').show();
            return false;
        } 
        else 
        {

            $('#categoryadd_form_validation').submit();
        }
    }
   </script>

   <!-- <script>
     function catname(value)
      {
          
          /*$.ajax({

              type: "POST",
              dataType:'json',
              url:"<?php echo base_url();?>index.php/manage_category/category_slug_show",
              data: {slug: value},
              async: false,

               success: function(data)
                {
                    var cat_slug_name= data.slug_name;

                      if(cat_slug_name!='')
                        {
                           $('#cat_slug').val(cat_slug_name);

                        }
                }
          });*/
            var value = value;
            var new_value = value.replace(" ", "-");
            $("#cat_slug").val(new_value);
          
     
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