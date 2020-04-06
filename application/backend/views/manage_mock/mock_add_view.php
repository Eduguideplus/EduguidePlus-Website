<div class="content-wrapper">

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

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      MOCK SET ADD/UPDATE
       
        
      </h1>
      <small><?php
            $succ_msg=$this->session->flashdata('succ_msg');
            if($succ_msg){
              ?>
              <br><span style="color:green">
                <?php echo $succ_msg; ?>
              </span>
              <?php
              }
              ?>
              
              </small>
              <small id="msg" style="color:red"></small>
              
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?php echo base_url()?>index.php/manage_mock/mock_view"> MOCK SET ADD/UPDATE</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
            
            <!-- /.box-header -->
            
          <div class="box">
            <div class="box-header">
           
                  
            </div>
            <!-- /.box-header -->
          <form class="form-horizontal" action="<?php echo base_url();?>index.php/manage_mock/insert" method="post" id="add_mock" >
              <div class="box-body">
            <table width="100%">
            <tr>
              <td width="50%"><a href="<?php echo base_url();?>index.php/manage_mock/mock_view" class="btn btn-danger btn-action" title="Add">Back</a></td>

              
            </tr>
            </table>
            
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead class="bg-blue">
                <tr>
                 <th></th>
                <th>ID</th>
                  <th>Question</th>
                  
                 

                 
                </tr>
                </thead>
                <tbody>

              
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
                
                <tr>
                 
                 
               	 <td>
                 <input type="checkbox" name="qstn_check[]" id="check_<?php echo @$qs->id;?>" value="<?php echo @$qs->id; ?>" class="selectedcheck" onclick="generate_question_list('<?php echo @$qs->id; ?>')" <?php if(count(@$mock)>0){foreach($mock as $mk)
                      { if($mk->qstn_id==$qs->id){echo $status="checked"; break;}else{echo $status="";}}} ?>>                  
                 </td>
                  <td><?php echo @$qs->id; ?> </td>
                  <td>
                    <?php echo @$qs->question; ?>
                   <!--  <textarea class="form-control tinyarea"><?php echo @$qs->question; ?></textarea> -->

            
                    </td>
                  
             
                </tr>

                <?php
              }
              ?>

                </tfoot>
              </table>
              <h3>Currently added IDs: </h3>
               <input type="text" name="qlist" id="qlist" value="<?php echo @$str; ?>" readonly>

               <button type="button" class="btn btn-info pull-right" onclick="return mock_form_validation()">Submit</button>
             </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    </div>
    </div>
    <script>
function delete_data(id)
{
 
if(confirm("Are you sure ?"))
{
var baseurl='<?php echo  base_url();?>';
window.location=baseurl+'index.php/manage_plans/delete/'+id;
}
}

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">
function check_all()
{
  
   if ($("#all_chk").is(':checked')) {
            $("input[name=record]").each(function () {
                $(this).prop("checked", true);
            });

        } 
        else {
            $("input[name=record]").each(function () {
                $(this).prop("checked", false);
            });
          }
}
  </script>

  <script type="text/javascript">

   function change_sts_active(val)
        {
          
            var ids =[];

            $.each($("input[name='record']:checked"), function()
            {            
                ids.push($(this).val());
            });

            //alert(cat_ids[0]);
            var base_url='<?php echo base_url(); ?>';
            if(ids.length>0)
            {

            $.ajax({
              
             url:base_url+'index.php/manage_plans/change_to_active',
             data:{id:ids,status:val},
             dataType: "json",
             type: "POST",
             success: function(data){


              var perform= data.changedone;

                 if(perform==1)
                 {
                   alert('Status changed successsfully.');
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