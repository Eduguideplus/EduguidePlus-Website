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

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        TOP COLLEGES EDIT
        
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
              <!-- <h3 class="box-title">EXAM-TYPE ADD</h3> -->
            <div id="validation" style="color:red;"></div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="<?php echo base_url();?>index.php/manage_institution/update_inst" method="post" id="add" enctype="multipart/form-data">
              <div class="box-body">
               <!-- <span style="color: rgb(255, 0, 0); padding-left: 2px;">(* fields are required)</span> -->
               
            
        


           <div class="form-group">
                  <label for="sub_category" class="col-sm-2 control-label">Institute Level</label>
              
                <div class="col-sm-9">
                    <select name="inst_level" id="inst_level" class="form-control">
                        <option value="">Select Institute Level</option>
                        <?php foreach ($inst_level as $data) { ?>
                          
                       <option value="<?php echo $data->id; ?>"<?php if($data->id==@$inst[0]->inst_level_id){echo 'selected'; } ?>><?php echo $data->institute_level; ?></option>

                      <?php  } ?>
                    </select>
                      
                </div>
                 
              </div> 
           

            <div class="form-group">
                  <label for="cat_name" class="col-sm-2 control-label">Institute Name<span style="color: rgb(255, 0, 0); padding-left: 2px;"></span></label>

                  <div class="col-sm-9">
                    <input type="text" name="institute" id="institute" class="form-control" placeholder="Institute Name" value="<?php echo @$inst[0]->institute_name; ?>">
                    
                  </div>
                 
              </div>



               <div class="form-group">
                  <label for="cat_name" class="col-sm-2 control-label">Management of Institute<span style="color: rgb(255, 0, 0); padding-left: 2px;"></span></label>

                  <div class="col-sm-9">
                    <input type="text" name="management" id="management" class="form-control" placeholder="Management of Institute" value="<?php echo @$inst[0]->management_of_inst; ?>">
                    
                  </div>
                 
              </div>


              <div class="form-group">
                  <label for="cat_name" class="col-sm-2 control-label">Institute Banner(1920x300 px)<span style="color: rgb(255, 0, 0); padding-left: 2px;"></span></label>

                  <div class="col-sm-9">
                    <input type="file" name="image" id="image" class="form-control" placeholder="Image" >
                    <input type="hidden" name="old_image" id="old_image" class="form-control" placeholder="Image" value="<?php echo @$inst[0]->image; ?>" >

                    <img style="height: 100px;width: 150px;" src="<?php echo base_url(); ?>../assets/uploads/institute/<?php echo @$inst[0]->image; ?>">
                    
                  </div>
                 
              </div>


               <div class="form-group">
                  <label for="cat_name" class="col-sm-2 control-label">About Institute<span style="color: rgb(255, 0, 0); padding-left: 2px;"></span></label>

                  <div class="col-sm-9">
                    <textarea name="about" id="about" class="form-control" placeholder="About Institute"><?php echo @$inst[0]->about_institute; ?></textarea>
                    
                  </div>
                 
              </div>






              <div class="form-group">
                  <label for="sub_category" class="col-sm-2 control-label">Country</label>
              
                <div class="col-sm-9">
                    <select name="country1" id="country1" class="form-control" >
                        <option value="">Select Country</option>
                         <?php foreach ($countries as $data) { ?>
                          
                       <option value="<?php echo $data->id; ?>"<?php if($data->id==@$inst[0]->country){ echo 'selected'; } ?>><?php echo $data->name; ?></option>

                      <?php  } ?>
                    </select>
                      
                </div>
                 
              </div> 


               <div class="form-group">
                  <label for="sub_category" class="col-sm-2 control-label">State</label>
              
                <div class="col-sm-9">

                  <?php $state_detail=$this->admin_model->selectOne('states','country_id',@$inst[0]->country); 
                  ?>

                    <select name="state" id="state" class="form-control"  >

                      <?php if(count($state_detail)>0)
                      {

                      foreach($state_detail as $row)
                      {



                        ?>
                        <option value="<?php echo @$row->id;?>" <?php if($row->id==@$inst[0]->state) { echo 'selected'; } ?>><?php echo @$row->name;  ?></option>

                      <?php } } else { ?>
                          <option value="">Select State</option>
                      <?php } ?>
                    </select>
                      
                </div>
                 
              </div>


                <div class="form-group">
                  <label for="sub_category" class="col-sm-2 control-label">City</label>
              
                <div class="col-sm-9">

                  <?php $city_detail=$this->admin_model->selectOne('cities','state_id',@$inst[0]->state); 
                  
                   ?>

                    <select name="city" id="city" class="form-control"  >

                      <?php if(count($city_detail)>0)
                      {

                      foreach($city_detail as $row1)
                      {



                        ?>
                        <option value="<?php echo @$row1->id;?>" <?php if($row1->id==@$inst[0]->city) { echo 'selected'; } ?>><?php echo @$row1->name;  ?></option>

                      <?php } } else { ?>
                          <option value="">Select City</option>
                      <?php } ?>
                    </select>
                      
                </div>
                 
              </div>



             


             

            

              <div class="form-group">
                  <label for="cat_name" class="col-sm-2 control-label">Address<span style="color: rgb(255, 0, 0); padding-left: 2px;"></span></label>

                  <div class="col-sm-9">
                    

                    

                    <input type="text" name="address" id="address" class="form-control" placeholder="Address" value="<?php echo @$inst[0]->address; ?>">
                    
                  </div>
                 
              </div>

              <input type="hidden" name="edit_id" id="edit_id" value="<?php echo @$inst[0]->id; ?>">


              <div class="form-group">
                  <label for="cat_name" class="col-sm-2 control-label">Total Seat<span style="color: rgb(255, 0, 0); padding-left: 2px;"></span></label>

                  <div class="col-sm-9">
                    <input type="text" name="total_seat" id="total_seat" class="form-control" placeholder="Total Seat" value="<?php echo @$inst[0]->total_seat; ?>">
                    
                  </div>
                 
              </div>



               


             

<!-- 

                  <div class="form-group">
                  <label for="cat_name" class="col-sm-2 control-label">Exam Description<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-9">
                    <textarea type="text" name="description" id="description" class="form-control " ></textarea>
                    
                  </div>
                 
              </div> -->

              <!--    <div class="form-group">
                  <label for="cat_name" class="col-sm-2 control-label">Detail Exam Description</label>

                  <div class="col-sm-9">
                    <textarea type="text" name="detail_description" id="detail_description" class="form-control " ></textarea>
                    
                  </div>
                 
              </div> -->


          

             

           

             

              </div>
             
             
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo base_url();?>index.php/manage_institution/inst_list" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-info pull-right">Submit</button>
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
  </div>
 
<script src="<?php echo base_url();?>custom_script/validation_rulse.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>




  <script>
  function validation()
  {

    var parent_cat = $('#parent_cat').val();
      if (!isNull(parent_cat)) {
        $('#parent_cat').removeClass('black_border').addClass('red_border');
      } else {
        $('#parent_cat').removeClass('red_border').addClass('black_border');
      }


    var cat_name = $('#cat_name').val();
      if (!isNull(cat_name)) {
        $('#cat_name').removeClass('black_border').addClass('red_border');
      } else {
        $('#cat_name').removeClass('red_border').addClass('black_border');
      }


       var cat_icon = $('#cat_icon').val();
       
      if (!isNull(cat_icon)) {
        $('#cat_icon').removeClass('black_border').addClass('red_border');
      } else {
        $('#cat_icon').removeClass('red_border').addClass('black_border');
      }


       var description = $('#description').val();
      if (!isNull(description)) {
        $('#description').removeClass('black_border').addClass('red_border');
      } else {
        $('#description').removeClass('red_border').addClass('black_border');
      }

     

      
  }
  function form_validation()
  {
  
   
    $('#add').attr('onchange', 'validation()');
    $('#add').attr('onkeyup', 'validation()');

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

  <script type="text/javascript">
  function add_document()
  {
    // alert(ok);
    var cunt= $('#multi_doc_div').children('.append_doc_div').length;


    var cunt = cunt+1;
    var num=cunt+1;



    var sum=0;
   var v_count= $('#hidden_video_count').val();


   sum = parseInt(v_count)+ 1;

$('#hidden_video_count').val(sum);
  //  alert(sum);
    
    

    // var html='<div class="append_doc_div" id="append_doc_div'+cunt+'"><div class="form-group"><label for="cat_name" class="col-sm-2 control-label">Video Link</label><input placeholder="Price" type="text" name="slider_image[]" id="slider_image_'+cunt+'" class="form-control"><i class="fa fa-plus" aria-hidden="true" onclick="add_document()"></i><i class="fa fa-minus" aria-hidden="true" onclick="remove_document('+cunt+')"></i></div>';



    var html=' <div id="append_doc_div'+cunt+'"><div class="form-group"><label for="cat_name" class="col-sm-2 control-label">Video '+sum+'<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label><div class="col-sm-9 positon_n"><input type="text" name="video_link[]" id="video_link" class="form-control" placeholder="Youtube Video Embed Link" value="" ><i class="fa fa-minus" aria-hidden="true" onclick="remove_document('+cunt+')" ></i> </div></div></div>';




      $('#multi_doc_div').append(html);

  }
   function remove_document(value)
  {
    $("#append_doc_div"+value).remove();
  }
</script>

<script>

  $(document).ready(function(){
    $('#country1').change(function(){
      //alert("hiii");
      var country_id = $('#country1').val();
      if(country_id=="")
      {
        alert("Plase Select Country");
      }
      
    if(country_id != '')
    {
       $.ajax({
         url:"<?php echo base_url();?>index.php/manage_institution/fetch_state",
         method:"POST",
         dataType:"json",
         data:{country_name:country_id},
         success:function(data)
         {
            
            // alert(data);
           state=data.state_list
           var i;
           var data_html='';
           data_html= '<option value="">Select State</option>'

          for(i=0;i<state.length;i++)
          {

           data_html=data_html+'<option value="'+ state[i].id+ '">'+state[i].name+'</option>';
          }
             
              $('#state').html(data_html);            
          }
        });
  }
  else
  {
         $('#state').html('<option value="">Select State</option>');
        $('#city').html('<option value="">Select City</option>');
   }
   });

   $('#state').change(function(){
  var state_id = $('#state').val();
  if(state_id=="")
  {
    alert("Plase Select State");
  }
  if(state_id != '')
  {
   $.ajax({
    url:"<?php echo base_url(); ?>index.php/manage_institution/fetch_city",
    method:"POST",
    dataType:"json",
    data:{state_id:state_id},
    success:function(data)
    {
     // alert(data);
      city=data.city_list
      var i;
      var data_html='';
      data_html= '<option value="">Select City</option>'
      for(i=0;i<city.length;i++)
      {

          data_html=data_html+'<option value="'+ city[i].id+ '">'+city[i].name+'</option>';
        }
        $('#city').html(data_html);
    }
   });
  }
  else
  {
   $('#city').html('<option value="">Select City</option>');
  }
  });
 });

</script>

            