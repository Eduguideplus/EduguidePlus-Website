
 


<script type="text/javascript">
	var expanded = false;

function showCheckboxes() {
  var checkboxes = document.getElementById("checkboxes");
  if (!expanded) {
    checkboxes.style.display = "block";
    expanded = true;
  } else {
    checkboxes.style.display = "none";
    expanded = false;
  }
}
</script>

<section class="breadcumb-wrapper">
      <div class="overlay-color">
        <div class="container">
          <div class="row clearfix">
            
          </div>
        </div>
      </div>
</section>

<section class="register_cnt">
<div class="container register register_from">
                <div class="row">
                    <div class="col-md-3 register-left">
                        <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                        <h3>Welcome</h3>
                        <p>You are 30 seconds away from earning your own money!</p>
                        
                    </div>
                    <div class="col-md-9 register-right">
                        <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                            <li class="nav-item">
                                
                            </li>
                            <li class="nav-item">
<a class="nav-link" id="profile-tab"  aria-controls="profile" aria-selected="false">Register Now</a>
                            </li>
                        </ul>

             
                        <div class="tab-content" id="myTabContent">
                            <div class="" id="home" role="tabpanel" aria-labelledby="home-tab">
                             <form id="solver_id"   action="<?php echo base_url(); ?>index.php/Manage_career/solver_submit" method="post">     
                                <div class="row register-form">
                                   <span style="color:green"><?php echo $this->session->flashdata('msg'); ?></span>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text"  class="" placeholder=" Name *"  id="first-name" class="form-control" name="fname" />
                                        </div>
                                        
                                        <div class="form-group">
                                            <input type="text" minlength="10" maxlength="10" id="phone" class="form-control" name="phone" placeholder="Your Phone *" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="10" class="form-control" onkeyup="chk_phone(value)"  />
                                            <span style="color:red;" id="phone_error" ><b></b></span>
                                        </div>
                                         <div class="form-group">
                                         	<input type="email" class="form-control" placeholder="Your Email *"  class="form-control" name="email" id="email" onkeyup="chk_email(value)" />
                                    <span style="color:red;" id="email_error" ><b></b></span>          
                                        </div>
                                         <div class="form-group">
 <input type="text" class="form-control" placeholder="Qualification *" id="qualification" class="form-control" name="qualification" />
                                        </div>
                                  <input type="hidden" name="expert_in"  id="expert_in">      
                                        <div class="form-group">
                                          
                                        
  <div class="multiselect">
    <div class="selectBox" onclick="showCheckboxes()">
      <select class="form-control">
        <option>Expert IN</option>
      </select>
      <div class="overSelect"></div>
    </div>
    <div id="checkboxes">
       <?php foreach ($subject as $key => $row) {
         

  $exam_dtls=$this->admin_model->selectone('tbl_exam_type','id',$row->exam_id);

                    $group_id=@$exam_dtls[0]->exam_type_id;

                    $group_dtls=$this->admin_model->selectone('tbl_exam_type','id',$group_id);

          ?>
      <label for="one">

       
        <input type="checkbox" name="expert_sub[]" class="txt_qualification"  id="one" value="<?php echo $row->id; ?>" onclick="get_expert_id(this.value)" /><span><?php echo @$group_dtls[0]->exam_name.' >> '.@$exam_dtls[0]->exam_name.' >> '.@$row->section_name;  ?></span></label>

      <?php } ?>
    <!--   <label for="two">
        <input type="checkbox" class="txt_qualification" id="two" /><span>Second checkbox</span></label>
      <label for="three">
        <input type="checkbox" class="txt_qualification" id="three" /><span>Third checkbox</span></label> -->
    </div>
  </div>
</form>





                         					 </div>
                                       
                                        <input type="button" class="btnRegister" onclick="solver_apply_submit()" value="Register"/>
                                    </div>
                                    
                                </div>
                              </form>  
                            </div>
                            
                    </div>
                </div>

            </div>
 </div>
 </section>
<script type="text/javascript">
  // Material Select Initialization
$(document).ready(function() {
  $('.mdb-select').materialSelect();
});


   function get_expert_id(val)
        {
          
            // var sec_ids =[];

            // $.each($("input[name='expert_sub']:checked"), function()
            // {            
            //     sec_ids.push($(this).val());
            // });

$('#expert_in').val($('#one').val());
         }   
</script>

 <script src="<?php echo base_url();?>assets/custom_script/validation_rulse.js"></script>
<script src="<?php echo base_url();?>assets/custom_script/setting_validation.js"></script>

<script type="text/javascript">
    function reg_Submit_fm()
{

    // alert('ok');
    var fname = $('#first-name').val();
// alert(fname);

    if (!isNull(fname)) {
        $('#first-name').removeClass('black_border').addClass('red_border');
    } else {
        $('#first-name').removeClass('red_border').addClass('black_border');
    }
 
  var phone = $('#phone').val();
  var error_phone=$("#phone_error").text();
    if (!isNull(phone) || isNaN(phone) || phone.length<10) {
        $('#phone').removeClass('black_border').addClass('red_border');
    }else if(error_phone!=""){
 $('#phone').removeClass('black_border').addClass('red_border'); 
}
    else {
        $('#phone').removeClass('red_border').addClass('black_border');
    }
    var email = $('#email').val();
     var error_email=$("#email_error").text();
    if (!isEmail(email)) {
        $('#email').removeClass('black_border').addClass('red_border');
    }else if(error_email!=""){
 $('#email').removeClass('black_border').addClass('red_border'); 
}else {
        $('#email').removeClass('red_border').addClass('black_border');
    }
   var qualification = $('#qualification').val();
    if (!isNull(qualification)) {
        $('#qualification').removeClass('black_border').addClass('red_border');
    } else {
        $('#qualification').removeClass('red_border').addClass('black_border');
    }
   


    

    
}



function solver_apply_submit()
{
     // alert("ok");
 var expert_in = $('#expert_in').val();
// alert(expert_in);
    $('#solver_id').attr('onchange', 'reg_Submit_fm()');
    $('#solver_id').attr('onkeyup', 'reg_Submit_fm()');

    reg_Submit_fm();
// alert($('#solver_id .red_border').size());

    if ($('#solver_id .red_border').size() > 0)
    {
        $('#solver_id .red_border:first').focus();
        $('#solver_id .alert-error').show();
        return false;
    } else if(expert_in==""){

      alert('Please add the subject you are expert in..');
      return false;
    }


     else {

        $('#solver_id').submit();
    }
}
</script>   
<script>
  
  function chk_email(value)
  {

    // alert(value);


       var base_url='<?php echo  base_url();?>';
        if(value!='')
        {
          $.ajax({
                        
              url:'<?php echo  base_url();?>index.php/Manage_career/check_email',
              data:{email:value},
              dataType: "json",
              type: "POST",
              async: true,
              success: function(data)
              {
                    // alert(data);
                    var perform= data.changedone;
                    if(perform['status']==1)
                      {
                        
                        $("#email_error").text('This Email is already used.');
                        
                        $('#email').removeClass('black_border').addClass('red_border');
                       
                       
                      }
                      if(perform['status']==0){

                         
                         $('#email_error').text('');

                        $('#email').removeClass('red_border').addClass('black_border');
                      }                    
               }
                                                            
              });
        }
        else
        {
          $("#email_error").text("");
          
        }
      
  }

</script>

<script>
  
  function chk_phone(value)
  {

    //alert(value);


       var base_url='<?php echo  base_url();?>';
        if(value!='')
        {
          $.ajax({
                        
              url:'<?php echo base_url();?>index.php/Manage_career/check_phone',
              data:{phone:value},
              dataType: "json",
              type: "POST",
              async: true,
              success: function(data)
              {
                    //alert(data);
                    var perform= data.changedone;
                    if(perform['status']==1)
                      {
                        
                        $("#phone_error").text('This Number is already used.');
                        
                        $('#phone').removeClass('black_border').addClass('red_border');
                       
                       
                      }
                      if(perform['status']==0){

                         
                         $('#phone_error').text('');

                        $('#phone').removeClass('red_border').addClass('black_border');
                      }                    
               }
                                                            
              });
        }
        else
        {
          $("#phone_error").text("");
          
        }
      
  }

</script>