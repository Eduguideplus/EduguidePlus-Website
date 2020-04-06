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
       <!--  SOCIAL LINK DETAILS -->
         
        
        
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
              <h3 class="box-title">STAT CHART DETAILS
                <span style="padding-right:30px;"></span>
                <small style="color:#008000;"><?php 
        
                  $msg=$this->session->flashdata('succ_msg');
                  if($msg)
                   {
                   echo $msg;
                   }

                ?></small>


              </h3>
                <div id="validation" style="color:red;"></div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="<?php echo base_url();?>index.php/manage_stat/stat_update" method="post" id="stat_chart" >
              <div class="box-body">
                  
                <div class="form-group">
                  <label for="facebook" class="col-sm-2 control-label">Loves Us</label>

                  <div class="col-sm-10">
                    <!--<textarea name="address" class="tinyarea" id="address" placeholder="Address"><?php echo $contact[0]->address; ?></textarea> -->
                    <input type="text" name="lu" id="lu" class="form-control" value="<?php echo @$stat[0]->love_us; ?>"> 
                    <span id="error_add" style="color:red"></span>
                  </div>
                  
                </div>

				<div class="form-group">
                  <label for="twitter" class="col-sm-2 control-label">Attempted Question</label>

                  <div class="col-sm-10">
                    <input type="text" name="aq" class="form-control" id="aq"   value="<?php echo @$stat[0]->question_attempt; ?>">
                    <span id="error_mobile" style="color:red"></span>
                  </div>
                  
                </div>

         <div class="form-group" >
              <label for="YouTube" class="col-sm-2 control-label">Attempted Test</label>

                  <div class="col-sm-10">
                    <input type="text" name="at" class="form-control" id="at"  value="<?php echo @$stat[0]->test_attempt; ?>">
                    <span id="error_email" style="color:red"></span>
                  </div>
                  
                </div>      

               <!--   <div class="form-group" >
              <label for="YouTube" class="col-sm-2 control-label">fact Description</label>

                  <div class="col-sm-10">
                    <textarea type="text" name="fd" class="form-control" id="fd"><?php echo @$stat[0]->fact_text; ?></textarea>
                    <span id="error_email" style="color:red"></span>
                  </div>
                  
                </div>   -->                                       
              

			
        
	                                 
              



              <input type="hidden" name="edit_id" value="<?php echo @$stat[0]->id; ?>">
              <div id="error"></div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo base_url();?>index.php/dashboard" class="btn btn-danger fa fa-backward"> <b>Back</b></a>
                <button type="submit" class="btn btn-info pull-right" onclick="return stat_chart_validation()"><b>Submit</b></button>
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
<script type="text/javascript">
  
function update()
 {
  
  
  var lu = $('#lu').val();
    if (!isNull(lu)) {
      $('#lu').removeClass('black_border').addClass('red_border');
            
    } else {
      $('#lu').removeClass('red_border').addClass('black_border');
            
    }

    var aq = $('#aq').val();
    if (!isNull(aq)) {
      $('#aq').removeClass('black_border').addClass('red_border');
            
    } else {
      $('#aq').removeClass('red_border').addClass('black_border');
            
    }

    var at = $('#at').val();
    if (!isNull(at)) {
      $('#at').removeClass('black_border').addClass('red_border');
            
    } else {
      $('#at').removeClass('red_border').addClass('black_border');
            
    }

       /*var fd = $('#fd').val();
    if (!isNull(fd)) {
      $('#fd').removeClass('black_border').addClass('red_border');
            
    } else {
      $('#fd').removeClass('red_border').addClass('black_border');
            
    }*/

   
   
}


    
function stat_chart_validation()
{ 
  //alert('ok');
    $('#stat_chart').attr('onchange', 'update()');
    $('#stat_chart').attr('onkeyup', 'update()');
    $('#stat_chart').attr('onclick', 'update()');
  
  var checking= update();

  if ($('#stat_chart .red_border').size() > 0)  {
    $('#stat_chart .red_border:first').focus();
    $('#stat_chart .alert-error').show();
    return false;
  } else {

    $("#stat_chart").submit();
  }
    
}

</script>
            

            