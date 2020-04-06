

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      EDIT SUB ADMIN  
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
            <form class="form-horizontal" action="<?php echo base_url();?>index.php/manage_rm/rm_update_action" method="post" id="add_rm" enctype="multipart/form-data">
              <div class="box-body">
               <span style="color: rgb(255, 0, 0); padding-left: 2px;">(* fields are required)</span>
                
                 <div class="text-center">
              <h4><b>Basic Information</b></h4>
              </div>
             
               <input type="hidden" name="old_image" id="old_image" class="form-control" placeholder="RM Name" value="<?php echo $all_data[0]->profile_photo; ?>" >

              <input type="hidden" name="oldid" id="oldid" class="form-control" placeholder="RM Name" value="<?php echo $all_data[0]->id; ?>" >

              <div class="form-group">
                  <label for="parent_cat" class="col-sm-2 control-label">Full Name: <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                <div class="col-sm-9">
                    <input type="text" name="fname" id="fname" class="form-control" placeholder="First Name" value="<?php echo $all_data[0]->user_name; ?>" >
                    
                </div>
                 
              </div> 

              <!--  <div class="form-group">
                 <label for="parent_cat" class="col-sm-2 control-label">Last Name: <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>
              
               <div class="col-sm-9">
                   <input type="text" name="lname" id="lname" class="form-control" placeholder="Last Name" value="<?php echo $all_data[0]->last_name; ?>" >
                   
               </div>
                
                            </div>  -->


              <div class="form-group">
                  <label for="parent_cat" class="col-sm-2 control-label">Email: <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                <div class="col-sm-9">
                    <input type="text" name="email" id="email" class="form-control" placeholder="RM Email-ID" value="<?php echo $all_data[0]->login_email; ?>" onblur="return checkemailret_edit()">
                     <span id="error_email" style="color:red"></span>
                    
                </div>
                 
              </div> 

              

              <div class="form-group">
                  <label for="cat_name" class="col-sm-2 control-label">Date of Birth: <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-9">
                    <input type="text" name="dob" id="dob" class="form-control" placeholder="Date of Birth" value="<?php echo $all_data[0]->dob; ?>" >
                    
                  </div>
                 
              </div>


            

             

              <div class="form-group">
                  <label for="cat_desc" class="col-sm-2 control-label">Mobile No.: <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-9">
                    
                    <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Mobile Number " value="<?php echo $all_data[0]->login_mob; ?>" >
                  </div>
                 
              </div>



              


              <div class="form-group">
                  <label for="cat_desc" class="col-sm-2 control-label">Profile Image: <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-9">
                  
                  <input type="file"  name="event_image" id="event_image" onchange="readURL(this);">
                  <?php if($all_data[0]->profile_photo=="") {
                    ?>
                   <img id="prof_pic" src="<?php echo base_url()?>../assets/images/no-image.jpg"  alt="User Image" style="margin-top: 10px;width:90px;height:90px;" />
                   <?php } else {
                    ?>
                    <img id="prof_pic" src="<?php echo base_url()?>../assets/uploads/profile_image/<?php echo $all_data[0]->profile_photo;?>"  alt="User Image" style="margin-top: 10px;width:90px;height:90px;" />
                    <?php } ?>
                  </div>
                 
              </div>



              <div class="text-center">
              <h4><b>Bank Details</b></h4>
              </div>

               <div class="form-group">
                  <label for="parent_cat" class="col-sm-2 control-label">Bank Name: <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                <div class="col-sm-9">
                    <input type="text" name="bank_name" id="bank_name" class="form-control" placeholder="Bank Name" value="<?php echo $all_data[0]->bank_name; ?>" >
                    
                </div>
                 
              </div> 

              <div class="form-group">
                  <label for="account" class="col-sm-2 control-label">A/C No: <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                <div class="col-sm-9">
                    <input type="text" name="account" id="account" class="form-control" placeholder="A/C No" onkeypress='return event.charCode >= 48 && event.charCode <= 57'  value="<?php echo $all_data[0]->bank_account; ?>" >
                    
                </div>
                 
              </div> 


               <div class="form-group">
                  <label for="ifsc" class="col-sm-2 control-label">IFSC Code: <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                <div class="col-sm-9">
                    <input type="text" name="ifsc" id="ifsc" class="form-control" placeholder="IFSC Code"  value="<?php echo $all_data[0]->bank_ifsc; ?>">
                    
                </div>
                 
              </div> 



                  <div class="text-center">
              <h4><b>Address Details</b></h4>
              </div>


           

              <div class="form-group">
                  <label for="cat_desc" class="col-sm-2 control-label">Address: </label>

                  <div class="col-sm-9">
                    
                    <textarea type="text" name="address" id="address" class="form-control"><?php echo $all_data[0]->user_address; ?></textarea>
                  </div>
                 
              </div>


           
            
              






             
              

                <!--  <div class="text-center">
              <h4><b>Payment</b></h4>
              </div>


              <div class="form-group">
                  <label for="cat_desc" class="col-sm-2 control-label">Registration Fees.: <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-9">
                    
                    <input type="text"  name="fees" id="fees" class="form-control" placeholder="Registration fees" value="<?php echo $fees[0]->registration_fees;?>" readonly>
                  </div>
                 
              </div>
 -->


             

             

              </div>
             
             
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo base_url()?>index.php/manage_rm/view_rm" class="btn btn-danger">Cancel</a>
                <button  type="button" class="btn btn-info pull-right" onclick="return rm_form_validation()">Update</button>
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
<script src="<?php echo base_url();?>custom_script/form_validation/admin_validation.js"></script>

<script type="text/javascript">
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



   <script id="gap" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCOumj6vdI3OZ5BYIOHzuB4pXvpnMqvsn0&libraries=places&callback=initAutocomplete"
        async defer></script>

<script>




 var placeSearch, autocomplete, autocomplete2;
var componentForm = {
  street_number: 'short_name',
  route: 'long_name',
  locality: 'long_name',
  administrative_area_level_1: 'short_name',
  country: 'long_name',
  postal_code: 'short_name'
};


function initAutocomplete() {
  // Create the autocomplete object, restricting the search to geographical
  // location types.
  autocomplete = new google.maps.places.Autocomplete(
    /** @type {!HTMLInputElement} */
    (document.getElementById('autocomplete')), {
      types: ['geocode']
    });

  // When the user selects an address from the dropdown, populate the address
  // fields in the form.
  autocomplete.addListener('place_changed', function() {
    fillInAddress(autocomplete, "");
  });

  

}

function fillInAddress(autocomplete, unique) {
  // Get the place details from the autocomplete object.
  var place = autocomplete.getPlace();

  for (var component in componentForm) {
    if (!!document.getElementById(component + unique)) {
      document.getElementById(component + unique).value = '';
      document.getElementById(component + unique).disabled = false;
    }
  }

  // Get each component of the address from the place details
  // and fill the corresponding field on the form.
  for (var i = 0; i < place.address_components.length; i++) {
    var addressType = place.address_components[i].types[0];

          if(addressType=='administrative_area_level_1')
          {
              var val = place.address_components[i].long_name;
              $('#administrative_area_level_1').val(val);
          }
          if(addressType=='locality')
          {
              var val = place.address_components[i].long_name;
              $('#locality').val(val);
          }

          if(addressType=='postal_code')
          {
              var val = place.address_components[i].long_name;
              $('#postal_code').val(val);
          }

          if(addressType=='country')
          {
              var val = place.address_components[i].long_name;
              $('#country').val(val);
          }
    if (componentForm[addressType] && document.getElementById(addressType + unique)) {
      var val = place.address_components[i][componentForm[addressType]];
      /*document.getElementById(addressType + unique).value = val;*/
    
    }
      /*var latitude = place.geometry.location.lat;
      var longitude = place.geometry.location.lng;
     $('#lat'+unique).val(latitude);
     $('#long'+unique).val(longitude);*/
  }
 
}
google.maps.event.addDomListener(window, "load", initAutocomplete);

function geolocate() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var geolocation = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };
      var circle = new google.maps.Circle({
        center: geolocation,
        radius: position.coords.accuracy
      });
      autocomplete.setBounds(circle.getBounds());
    });
  }
}
</script>


<script>
   function rm_validation()
 {


    var fname = $('#fname').val();

   

          if (!isNull(fname)) {
            $('#fname').removeClass('black_border').addClass('red_border');
            $('#name').attr('placeholder', 'Name field Should not be Empty.');
            $('#name').addClass('customplaceholder');
          } else {
            $('#fname').removeClass('red_border').addClass('black_border');
            $('#fname').attr('placeholder', 'Enter Distributor name');
            $('#fname').removeClass('customplaceholder');
          }
           var email = $('#email').val();
          if (!isNull(email)) {
            $('#email').removeClass('black_border').addClass('red_border');
            $('#email').attr('placeholder', 'Email field Should not be Empty.');
            $('#email').addClass('customplaceholder');
          } else {

             if (!isEmail(email)) 
             {
              $('#email').removeClass('black_border').addClass('red_border');
              $('#email').attr('placeholder', 'Email field Should not be Empty.');
              $('#email').addClass('customplaceholder');
             }
             else
             {
                $('#email').removeClass('red_border').addClass('black_border');
                $('#email').attr('placeholder', 'Enter Distributor Email');
                $('#email').removeClass('customplaceholder');
             }
            
          }
   var dob = $('#dob').val();
          if (!isNull(dob)) {
            $('#dob').removeClass('black_border').addClass('red_border');
            $('#dob').attr('placeholder', 'DOB field Should not be Empty.');
            $('#dob').addClass('customplaceholder');
          } else {
            $('#dob').removeClass('red_border').addClass('black_border');
            $('#dob').attr('placeholder', 'Enter Distributor DOB');
            $('#dob').removeClass('customplaceholder');
          }

           var mobile = $('#mobile').val();
          if (!isNull(mobile)) {
            $('#mobile').removeClass('black_border').addClass('red_border');
            
          } else {
                $('#mobile').removeClass('red_border').addClass('black_border');
             }
         

             var bank_name = $('#bank_name').val();
          if (!isNull(bank_name)) {
            $('#bank_name').removeClass('black_border').addClass('red_border');
            
          } else {
            $('#bank_name').removeClass('red_border').addClass('black_border');
            
          }

          var account = $('#account').val();
          if (!isNull(account)) {
            $('#account').removeClass('black_border').addClass('red_border');
            
          } else {
            $('#account').removeClass('red_border').addClass('black_border');
            
          }

           var ifsc = $('#ifsc').val();
          if (!isNull(ifsc)) {
            $('#ifsc').removeClass('black_border').addClass('red_border');
            
          } else {
            $('#ifsc').removeClass('red_border').addClass('black_border');
            
          }

}


 function rm_form_validation()
 {

  // alert('okk');

    $('#add_rm').attr('onchange', 'rm_validation()');
    $('#add_rm').attr('onkeyup', 'rm_validation()');

     rm_validation();
   // alert($('#add_rm .red_border').size());

    if ($('#add_rm .red_border').size() > 0)
    {
      $('#add_rm .red_border:first').focus();
      $('#add_rm .alert-error').show();
      return false;
    } else {

      $('#add_rm').submit();
    }

 }
</script>



            