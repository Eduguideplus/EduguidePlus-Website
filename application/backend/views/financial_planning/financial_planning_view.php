<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/datatables/dataTables.bootstrap.css">

<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script type="text/javascript">
        tinymce.init({
            selector: "textarea",
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
        <h1>Financial Planning </h1>

       <small><?php
            $succ_delete=$this->session->flashdata('msg');
            if($succ_delete){
              ?>
              <br><span style="color:green">
                <?php echo $succ_delete; ?>
              </span>
              <?php
              }
              ?></small>

              <small><?php
            $succ_delete=$this->session->flashdata('msg_err');
            if($succ_delete){
              ?>
              <br><span style="color:red">
                <?php echo $succ_delete; ?>
              </span>
              <?php
              }
              ?></small>





        <ol class="breadcrumb">
            <li><a href="<?php echo base_url()?>index.php/ dashboard"><i class="fa fa-dashboard" aria-hidden="true"></i>Dashboad</a></li>
            <li class="active">Financial Planning</li>
        </ol>
    </section>

    <!-- Main content -->
    
    <!-- /.content -->










           
     <!-- Main content -->
       

        <section class="content">
        <div class="row">
            <div class="col-xs-12 table-responsive">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"><b><u style="color:green">Financial Planning List</u> :- </b></h3>
                    </div>
                    <div class="col-md-12" style="">

                           
                            <button type="button" class="btn btn-primary" onClick="window.location='<?php echo base_url();?>index.php/manage_financial_planning/add_view';"><span class="glyphicon glyphicon-plus"></span>Add</button>
                           <!--  <a href="<?php echo base_url()?>index.php/manage_financial_solutions/add_view" class="btn btn-info btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Add</a> -->

                            <a href="javascript:void(0)" class="btn btn-success btn-action" title="Active"  onclick="change_sts_active('active')"><i class="fa fa-pencil-square-o" ></i> Active</a>

                <a href="javascript:void(0)" class="btn btn-danger btn-action" title="Inactive" onclick="change_sts_active('inactive')"><i class="fa fa-pencil-square-o" ></i> Inactive</a>
                         
                      
                  
                   
                    </div>
                    <div class="clearfix"></div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-hover table-condensed table-responsive">
                            <thead>
                            <tr class="bg-blue">

                               <th><input type="checkbox" name="all" id="all_chk"onclick="check_all()"></th>


                 
                         <th>Status</th>
                            
                              
                                <th>Image</th>
                                <th>Title</th>
                                <th>Content</th>
                                
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                              <?php foreach ($data_list as $slider){ ?>
                                <tr>

                                   <td><input type="checkbox" name="record" value="<?php echo $slider->financial_planning_id;?>"></td>
                    <td>
                  <?php if($slider->status=='active')
                  {?>
                     <img src="<?php echo base_url();?>../assets/images/active.png">
                  <?php 
                  }
                  else{ ?>
                     <img src="<?php echo base_url();?>../assets/images/inactive.png">
                  <?php
                  }  ?>
                  </td>
                                 
                                    
                                    <td><img src="<?php echo base_url();?>../assets/uploads/financial_planning/<?php  echo $slider->financial_planning_image; ?>" width="150" height="64"></td>
                                    <td><?php echo @$slider->financial_planning_title; ?></td>
                                    <td><?php echo substr(strip_tags(@$slider->financial_planning_content),0,80) ;?></td>
                                    
                                    <td>
                                        <a href="<?php echo base_url()?>index.php/manage_financial_planning/edit_view/<?php echo $slider->financial_planning_id; ?>" class="btn-primary btn-sm" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                         <a href="<?php echo base_url()?>index.php/manage_financial_planning/delete_data/<?php echo $slider->financial_planning_id; ?>" class="btn-danger btn-sm" name="" id="" onclick="return confirm('Are you sure ?')" title="delete"><i class="fa fa-trash" aria-hidden="true"></i></a>

                                    </td>
                                </tr>
                              <?php } ?>



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




<script src="<?php echo base_url();?>custom_script/validation_rulse.js"></script>
  <script src="<?php echo base_url();?>custom_script/setting_validation.js"></script>
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
              
             url:base_url+'index.php/manage_financial_planning/change_to_active',
             data:{financial_planning_id:test_ids,status:val},
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

<!-- <script>


function product_Submit_frm()
    {



        /*var title = $('#title').val();

        if (!isNull(title))
        {
          $('#title').removeClass('black_border').addClass('red_border');
           $("#title").attr("data-toggle", "tooltip");
                $("#title").attr("data-placement", "bottom");
                document.getElementById('title').title = 'Title Is Required';
                $('#title').tooltip('show');
          
        } 
        else 
        {
          $('#title').removeClass('red_border').addClass('black_border');
           document.getElementById('title').title = '';
                $('#title').tooltip('destroy');
        }

       
*/


       var content= tinymce.get('content').getContent();
        if (!isNull(content)) 
        {
          
          $('#content').removeClass('black_border').addClass('red_border');
           $("#content").attr("data-toggle", "tooltip");
                $("#content").attr("data-placement", "bottom");
                document.getElementById('content').title = 'Content Is Required';
                $('#content').tooltip('show'); 
        } 
        else 
         {
           $('#content').removeClass('red_border').addClass('black_border');
           document.getElementById('content').title = '';
                $('#content').tooltip('destroy');
         }    


       



       /*  var bottom_content= tinymce.get('bottom_content').getContent();
        if (!isNull(bottom_content)) 
        {
          
          $('#bottom_content').removeClass('black_border').addClass('red_border');
           $("#bottom_content").attr("data-toggle", "tooltip");
                $("#bottom_content").attr("data-placement", "bottom");
                document.getElementById('bottom_content').title = 'Bottom Content Is Required';
                $('#bottom_content').tooltip('show'); 
        } 
        else 
         {
           $('#bottom_content').removeClass('red_border').addClass('black_border');
           document.getElementById('bottom_content').title = '';
                $('#bottom_content').tooltip('destroy');
         }    
*/




 
         
         
         

        

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