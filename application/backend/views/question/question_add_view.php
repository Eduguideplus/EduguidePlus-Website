

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        QUESTION BULK UPLOAD
        
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
              <!-- <h3 class="box-title">COMPANY ADD</h3> -->
            <div id="validation" style="color:red;"></div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="<?php echo base_url();?>index.php/manage_question/exceldataadd" method="post" id="add" enctype="multipart/form-data">
              <div class="box-body">
               <span style="color: rgb(255, 0, 0); padding-left: 2px;">(* fields are required)</span>
               
             

            

             

             <div class="form-group">
                  <label for="sub_name" class="col-sm-2 control-label">Upload Excel file<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-9">
                    <input type="file" name="qfile" id="qfile" class="form-control" placeholder="" value="" required>
                    
                  </div>
                 
              </div>

              <div class="form-group">
                  <label for="sub_name" class="col-sm-2 control-label">Upload as<span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-9">
                   <select name="upload_type" id="upload_type" class="form-control" onchange="select_type(this.value)">
                    <option value="">Select Upload Type</option>
                    <option value="Additional">Additional</option>
                    <option value="Reset">Reset</option>
                  </select>
                    <span style="color:#3c8dbc; font-weight: bold" id="typemsg"></span>
                  </div>
                 
              </div>



             

              </div>
             
             
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo base_url();?>index.php/manage_question/view" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-info pull-right" >Submit</button>
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

<script>

  function select_type(value)
  {
    if(value=="Additional")
    {
      $("#typemsg").text('By Additional upload new Questions will be added with existing');
    }
    else if(value=="Reset")
    {
      $("#typemsg").text('By Reset upload new Questions will be added after deleting the previous Questions');
    }
    else{
      $("#typemsg").text('');
    }
  }
  function get_subcategory(value)
{

  //alert(value);
    var html='<option value="">Select</option>';
    if(value>0)
    {
      $.ajax(
          {
              type: "POST",
              dataType:'json',
              url:"<?php echo base_url();?>index.php/manage_category/get_subcategory",
              data: {category_id: value},
              async: false,
              success: function(data)
              {

                  //alert(data[0].category_id);
                  for(var i=0; i<data.length; i++)
                  {
                      html+='<option value="'+data[i].category_id+'">'+data[i].category_name+'</option>';
                  }
                  $("#sub_category").html(html);

              }
          });
    }
    else
    {
        $("#sub_category").html(html);
    }


}



  </script>

  <script>
  function validation()
  {
    var company_name = $('#company_name').val();
      if (!isNull(company_name)) {
        $('#company_name').removeClass('black_border').addClass('red_border');
      } else {
        $('#company_name').removeClass('red_border').addClass('black_border');
      }

      var company_logo = $('#company_logo').val();
      if (!isNull(company_logo)) {
        $('#company_logo').removeClass('black_border').addClass('red_border');
      } else {
        $('#company_logo').removeClass('red_border').addClass('black_border');
      }

      
  }
/*  function form_validation()
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

  }*/

  </script>

            