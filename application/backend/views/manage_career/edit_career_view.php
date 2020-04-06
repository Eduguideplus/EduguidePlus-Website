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
        
       EDIT JOB 
      </h3>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Edit Job </li>    
      </ol>
    </section>

  <!-- Main content -->
    <section class="content">
      <!-- ////////////////////////////////////////////////////////////////////////////////// -->
      <div class="row">
        
        <!-- right column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
             <!--  <h3 class="box-title">Edit Career</h3> -->
            </div>
            <!-- /.box-header -->
            <!-- form start -->
         <div style="padding-left: 12px;"><?php echo $this->session->flashdata('msg'); ?></div>
            
            <form id="ediit" name="form" class="form-horizontal" action="<?php echo base_url();?>index.php/manage_career/edit_action" method="post" enctype='multipart/form-data'>
              <div class="box-body">

                      <div class="form-group">
                  <label for="job_category" class="col-sm-2 control-label">Job Category :  <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                    <div class="col-sm-9">
                      <select class="form-control" name="job_category" id="job_category">
 <option value="">select category</option>
                      <!-- <option value="<?php echo $cat_details[0]->gallery_category_name; ?>"

                        <?php if($cat_details[0]->gallery_category_name==$cat_details[0]->gallery_category_name) { echo 'selected'; } ?>
                        > 
                        <?php echo $cat_details[0]->gallery_category_name; ?>
                         
                       </option> -->
                              
                            <!--  <?php foreach ($cat_details as $category) { ?>
                                            <option value="<?php echo $category->gallery_category_id; ?>"><?php echo $category->gallery_category_name; ?></option>
                                            <?php } ?>-->
                               <?php
                              for($i=0; $i<count(@$cat_details); $i++){




                                 ?>
                                <option value="<?php echo @$cat_details[$i]->job_category_id;
                                ?>"
                                  <?php if($cat_details[$i]->job_category_id==@$career_details[0]->job_category_id) { echo 'selected'; } 
                                  ?>
                                  >
                        <?php echo @$cat_details[$i]->job_category_title;?></option>

                                <?php } ?> 
                     
                             </select>
                      <!-- <input type="text" class="form-control" name="gallery_category" id="branch_name" placeholder="" value="<?php @$cat_details[0]->gallery_category_id; 
                      echo $cat_details[0]->gallery_category_name; ?>"> -->
                    </div>
                 
                </div>
         <div class="form-group">
                  <label for="job_name" class="col-sm-2 control-label">Job Name : <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="job_name" id="job_name" value="<?php echo @$career_details[0]->job_title; ?>" placeholder="Enter Job Name" >
                    </div>
                 
                </div>
                 <div class="form-group">
                  <label for="work_location" class="col-sm-2 control-label">Work Location : <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="work_location" id="work_location" value="<?php echo @$career_details[0]->work_location; ?>" placeholder="Enter Work Location" >
                    </div>
                 
                </div>
                
                
                <div class="form-group">
                  <label for="career_date" class="col-sm-2 control-label">Vacancy : <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                   <div class="col-sm-9">
                      <input type="text" class="form-control" name="vacancy" value="<?php echo @$career_details[0]->vacancy; ?>" id="vacancy" placeholder="Enter No of Vacancy">
                    </div>
                </div>
              

             

                
                <div class="form-group">
                  <label class="col-sm-2 control-label">Qualifications:<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>
                  <div class="col-sm-9">
                   <input type="text" class="form-control" id="qualification" name="qualification" value="<?php echo @$career_details[0]->requisite_qualification; ?>" placeholder="Please Enter Requisite Qualifications"> 
                 <!--   <textarea class="form-control" rows="5" name="qualification"  id="qualification" placeholder="Enter Requisite Qualifications"><?php echo $career_details[0]->requisite_qualification; ?></textarea>
                    --> 
                  </div>
                </div>


                      <div class="form-group">
                  <label class="col-sm-2 control-label">Experience : <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="experience" name="experience" value="<?php echo @$career_details[0]->experience; ?>" placeholder="Please Enter  Experience" >
                   
                  </div>
                </div> 

                         <div class="form-group">
                  <label for="branch_address" class="col-sm-2 control-label">Job Requirments : <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                    <div class="col-sm-9" >
                      <div id="job_details"><textarea class="form-control tinyarea" rows="5" name="job_details" id="job_details" placeholder="Enter Job Details"><?php echo @$career_details[0]->job_requirment; ?></textarea></div>
                    </div>
                 
                </div>
                <div class="form-group">
                  <label for="branch_name" class="col-sm-2 control-label">Meta Title :</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="meta_title" id="branch_name" placeholder="Enter Meta Title" value="<?php echo @$career_details[0]->meta_title; ?>">
                    </div>
                 
                </div>
                
                <div class="form-group">
                  <label for="branch_name" class="col-sm-2 control-label">Meta Keyword :</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="meta_keyword" id="branch_name" placeholder="Enter Meta Keyword" value="<?php echo @$career_details[0]->meta_keyword; ?>">
                    </div>
                 </div>
                <div class="form-group">
                  <label for="branch_address" class="col-sm-2 control-label">Meta Description :</label>

                    <div class="col-sm-9" >
                      <div id="branch_address_area"><textarea class="form-control" rows="5" placeholder="Enter Meta Description" name="meta_description" id="branch_address" ><?php echo @$career_details[0]->meta_description; ?></textarea></div>
                    </div>
                 
                </div>
                   <input type="hidden" value="<?php echo @$career_details[0]->job_alert_id;?>" name="job_alert_id">


                

              <span style="color: rgb(255, 0, 0); padding-left: 2px;">* fields are required</span>
              </div>
              <!-- /.box-body -->

 <script src="<?php echo base_url();?>custom_script/validation_rulse.js"></script>
<script src="<?php echo base_url();?>custom_script/setting_validation.js"></script>


              <div class="box-footer">
                <a href="<?php echo base_url();?>index.php/manage_career/career_list_view" class="btn btn-danger fa fa-backward"> <b> Back</b></a>
                <button type="button" class="btn btn-info pull-right" onclick="return form_validation();"><b>Update</b></button>
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

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!--   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 -->
  <script>

        $("#last_date").datepicker({
         startDate: new Date(),
         dateFormat:'yy-mm-dd',
         autoclose:true,
         todayHighlight:1
    });

</script>
<script>

     function career_submit_fm()
    {


// alert('OKKKKKKKKKK');
       
    

           var job_category= $('#job_category').val();
        if (!isNull(job_category)) 
        {
          $('#job_category').removeClass('black_border').addClass('red_border');
        
      
        } 
        else 
        {
          $('#job_category').removeClass('red_border').addClass('black_border');

          
        }
// alert(job_category);

   var job_name=$('#job_name').val();
        if (!isNull(job_name)) 
        {
          $('#job_name').removeClass('black_border').addClass('red_border');
          
         
        } 
        else 
        {
          $('#job_name').removeClass('red_border').addClass('black_border');
        }


        var work_location=$('#work_location').val();
        if (!isNull(work_location)) 
        {
          $('#work_location').removeClass('black_border').addClass('red_border');
         

        } 
        else 
        {
          $('#work_location').removeClass('red_border').addClass('black_border');


        }

         var vacancy = $('#vacancy').val();
        if (!isNull(vacancy)) 
        {
          $('#vacancy').removeClass('black_border').addClass('red_border');
          

       
        } 
        else 
        {
          $('#vacancy').removeClass('red_border').addClass('black_border');

           
        }




       
var qualification=$('#qualification').val();
        if (!isNull(qualification)) 
        {
          $('#qualification').removeClass('black_border').addClass('red_border');
          

        } 
        else 
        {
          $('#qualification').removeClass('red_border').addClass('black_border');

           
        }


       
var experience=$('#experience').val();
        if (!isNull(experience)) 
        {
          $('#experience').removeClass('black_border').addClass('red_border');
          

        } 
        else 
        {
          $('#experience').removeClass('red_border').addClass('black_border');

           
        }



     var job_details= tinymce.get('job_details').getContent();
        if (!isNull(job_details)) 
        {
          
          $('#job_details').removeClass('black_border').addClass('red_border');
          
        } 
        else 
         {
           $('#job_details').removeClass('red_border').addClass('black_border');
         }

          
         
         

        

   

    }

    function form_validation()
    {
      // alert("ok");
      $('#ediit').attr('onclick', 'career_submit_fm()');

        $('#ediit').attr('onchange', 'career_submit_fm()');
        $('#ediit').attr('onkeyup', 'career_submit_fm()');
 

        career_submit_fm();
      // alert($('#ediit .red_border').size());
        if ($('#ediit .red_border').size() > 0)
        {
            $('#ediit .red_border:first').focus();
            $('#ediit .alert-error').show();
            return false;
        } 
        else 
        {

            $('#ediit').submit();
        }
    }
</script>
<style>
.error {color: #FF0000;}
</style>

 