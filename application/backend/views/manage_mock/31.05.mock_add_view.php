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
        MOCK SET ADD/UPDATE
        
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
            <form class="form-horizontal" action="<?php echo base_url();?>index.php/manage_mock/insert" method="post" id="add_mock" >
              <div class="box-body">
               <span style="color: rgb(255, 0, 0); padding-left: 2px;">(* fields are required)</span>

                 <div class="form-group">
                  <label for="class" class="col-sm-2 control-label">Chose Question <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-8" style="height:687px;overflow:scroll;">
                    <?php

                    $str=''; 
                    
                    foreach($question as $qs){
                      if(count($mock)>0)
                      {
                        $counter=0;
                          foreach($mock as $mk)
                        {
                            if($counter==0)
                          {
                            $str=@$mk->qstn_id;
                          }
                          else
                          {
                             $str= $str.','.@$mk->qstn_id;
                          }
                          $counter++;
                        }
                      }
                      
                    
                          
                            ?>
                 
                      <input type="checkbox" name="qstn_check[]" id="check_<?php echo @$qs->id;?>" value="<?php echo @$qs->id; ?>" class="selectedcheck" onclick="generate_question_list('<?php echo @$qs->id; ?>')" <?php if(count(@$mock)>0){foreach($mock as $mk)
                      { if($mk->qstn_id==$qs->id){echo $status="checked"; break;}else{echo $status="";}}} ?>><textarea class="form-control tinyarea"><?php echo @$qs->question; ?></textarea>


                            <?php } ?>

                    
                    
                  </div>
                 
              </div>
             <input type="hidden" name="qlist" id="qlist" value="<?php echo @$str; ?>">
             
             
             
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo base_url();?>index.php/manage_plans/view" class="btn btn-danger">Cancel</a>
                <button type="button" class="btn btn-info pull-right" onclick="return mock_form_validation()">Submit</button>
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

  <script>
    function generate_question_list(value)
    {
      
      //var qstring='';
      var exist_qstr=$("#qlist").val();


        if($("#check_"+value).prop("checked") == true)
        {
          //alert("Checkbox is checked."+value);
            if(exist_qstr!='')
            {
             var array_q = exist_qstr.split(',');
             //alert(array_q.length);
             if(array_q.length<3)
             {
              exist_qstr=exist_qstr+','+value;
              $("#qlist").val(exist_qstr);
             }
             else
             {
              alert('Sorry!! Maximum Selection of question already reached');
              
               $("#check_"+value).prop("checked", false);
             }
            
            }
            else
            {
              exist_qstr=value;
              $("#qlist").val(exist_qstr);
            }
            
        }
        else if($("#check_"+value).prop("checked") == false)
        {
          //alert("Checkbox is unchecked.");
            if(exist_qstr!='')
            {
              var array_q = exist_qstr.split(',');
              for(var i=0;i<array_q.length;i++)
              {
                alert(array_q[i]);
                if(array_q[i]==value)
                {
                  array_q.splice(i, 1);
                  
                }
              }
              exist_qstr=array_q.toString();
              $("#qlist").val(exist_qstr);
            }
            
          
        }
    }
    
  </script>
 
<script src="<?php echo base_url();?>custom_script/validation_rulse.js"></script>

<script>
  function form_validation()
  {

    var qlist = $('#qlist').val();
      if (qlist == '') {
        $('#qlist').removeClass('black_border').addClass('red_border');
      } else {
        var array_q = qlist.split(',');
        if(array_q.length!=3)
        {
            $('#qlist').removeClass('black_border').addClass('red_border');
        }
        else
        {
           $('#qlist').removeClass('red_border').addClass('black_border');

        }
       
      }
     

  
     
      
  }
  function mock_form_validation()
  {
  
   
    $('#add_mock').attr('onchange', 'form_validation()');
    $('#add_mock').attr('onkeyup', 'form_validation()');

     form_validation();
    //alert($('#contact_form .red_border').size());

    if ($('#add_mock .red_border').size() > 0)
    {
      $('#add_mock .red_border:first').focus();
      $('#add_mock .alert-error').show();
      return false;
    } else {

      $('#add_mock').submit();
    }

  }

  </script>

   <script type="text/javascript">
     function multiple_paper_per_company(id)
    {
         
        var val=id;
         //alert(val);   
            if(val==2)
                {
                     $("#no_2").hide();
                      $("#minus").hide();
                }
            var base_url='<?php echo base_url(); ?>';
            if(val==3)
                {
                    $("#no_"+val).hide();
                   
                }
            if(val==4)
                {
                    $("#no_"+val).hide();
                }
                if(val==5)
                {
                    $("#no_"+val).hide();
                }
                if(val==6)
                {
                    $("#no_"+val).hide();
                }
                if(val==7)
                {
                    $("#no_"+val).hide();
                }
           

            $.ajax({
              
             url:base_url+'index.php/manage_plans/box_show',
             data:{num:val},
             dataType: "html",
             type: "POST",
             success: function(data){
//alert();

              $("#more_paper_"+id).html(data);
              $("#more_paper_"+id).show();

                 
                
              }
             });

    }

    function hiding_out(val)
    {
   
          var current_div=val-1;          
          $("#more_paper_"+current_div).html('');
          $("#more_paper_"+current_div).hide();
      
    }
   </script> 


   <!-- <script>
          $(".checkbox").change(function() {
          if(this.checked) {
            var q_id=$(this)
              //Do stuff
          }
         });
         </script>   -->      