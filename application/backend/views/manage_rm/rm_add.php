

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Add SUB ADMIN 
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
            <form class="form-horizontal" action="<?php echo base_url();?>index.php/manage_rm/rm_add_action" method="post" id="add" enctype="multipart/form-data">
              <div class="box-body">
               <span style="color: rgb(255, 0, 0); padding-left: 2px;">(* fields are required)</span>
                
                 <div class="text-center">
              <h4><b>Basic Information</b></h4>
              </div>
             


              <div class="form-group">
                  <label for="parent_cat" class="col-sm-2 control-label">First Name: <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                <div class="col-sm-9">
                    <input type="text" name="fname" id="fname" class="form-control" placeholder="Name" value="" >
                    
                </div>
                 
              </div> 


               <div class="form-group">
                  <label for="parent_cat" class="col-sm-2 control-label">Last Name: <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                <div class="col-sm-9">
                    <input type="text" name="lname" id="lname" class="form-control" placeholder="Name" value="" >
                    
                </div>
                 
              </div> 


              <div class="form-group">
                  <label for="parent_cat" class="col-sm-2 control-label">Email: <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                <div class="col-sm-9">
                    <input type="text" name="email" id="email" class="form-control" placeholder="Email-ID" value="" onblur="return checkemailret()">
                     <span id="error_email" style="color:red"></span>
                    
                </div>
                 
              </div> 

              

              <div class="form-group">
                  <label for="cat_name" class="col-sm-2 control-label">Date of Birth: <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-9">
                    <input type="text" name="dob" id="dob" class="form-control" placeholder="Date of Birth" value="" >
                    
                  </div>
                 
              </div>


            

             

              <div class="form-group">
                  <label for="cat_desc" class="col-sm-2 control-label">Mobile No.: <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-9">
                    
                    <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Mobile Number " value="" >
                  </div>
                 
              </div>


              <div class="form-group">
                  <label for="cat_desc" class="col-sm-2 control-label">Profile Image: <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-9" id="event_image_err">
                  <input type="file"  name="event_image" id="event_image" onchange="readURL(this);">
                   <img id="prof_pic" src="<?php echo base_url()?>../assets/uploads/no_image.png"  alt="User Image" style="margin-top: 10px;width:90px;height:90px;" />
                    
                  </div>
                 
              </div>


            <!--   <div class="form-group">
                  <label for="cat_desc" class="col-sm-2 control-label">Under Distributor: <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-9">
                    <select name="under_d" id="under_d" class="form-control" onchange="get_available_services(this.value)">
                    <option value="">Select Distributor</option>
                    <?php foreach($m_dis as $md){
                      $add=$this->common_model->common($table_name = 'tbl_user_address', $field = array(), $where = array('user_id'=>$md->id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

                      ?>
                      <option value="<?php echo $md->id; ?>"><?php echo $md->user_name.'('.@$add[0]->user_location.')'; ?></option>
                      <?php } ?>
                    </select>
                    
                  </div>
                 
              </div> -->



              <div class="text-center">
              <h4><b>Bank Details</b></h4>
              </div>

               <div class="form-group">
                  <label for="parent_cat" class="col-sm-2 control-label">Bank Name: <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                <div class="col-sm-9">
                    <input type="text" name="bank_name" id="bank_name" class="form-control" placeholder="Bank Name"  >
                    
                </div>
                 
              </div> 

              <div class="form-group">
                  <label for="account" class="col-sm-2 control-label">A/C No: <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                <div class="col-sm-9">
                    <input type="text" name="account" id="account" class="form-control" placeholder="A/C No" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                    
                </div>
                 
              </div> 


               <div class="form-group">
                  <label for="ifsc" class="col-sm-2 control-label">IFSC Code: <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                <div class="col-sm-9">
                    <input type="text" name="ifsc" id="ifsc" class="form-control" placeholder="IFSC Code"  >
                    
                </div>
                 
              </div> 


                  <div class="text-center">
              <h4><b>Address Details</b></h4>
              </div>


              <div class="form-group">
                  <label for="cat_desc" class="col-sm-2 control-label">Address type: </label>

                  <div class="col-sm-9">
                    
                    <select class="form-control" name="type" id="type">
                      <option value="">Please Select</option>
                      <option value="present">Present</option>
                       <option value="permanent">Permanent</option>
                    </select>
                  </div>
                 
              </div>


               <div class="form-group">
                  <label for="cat_desc" class="col-sm-2 control-label">House No: </label>

                  <div class="col-sm-9">
                    
                    <input type="text" name="house" id="house" class="form-control" placeholder="House Number" value="" >
                  </div>
                 
              </div>


              <div class="form-group">
                  <label for="cat_desc" class="col-sm-2 control-label">Street No.: </label>

                  <div class="col-sm-9">
                    
                    <input type="text" name="street" id="street" class="form-control" placeholder="Street Number" value="" >
                  </div>
                 
              </div>

              
            
              <div class="form-group">
                  <label for="cat_desc" class="col-sm-2 control-label">Location: <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-9">
                    
                   <input type="text" name="location" id="autocomplete" class="form-control" placeholder="Location" value="" onclick="geolocate()" >
                  </div>
                 
              </div>



              <div class="form-group">
                  <label for="cat_desc" class="col-sm-2 control-label">Pincode: <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-9">
                    
                   <input type="text" name="pin" id="postal_code" class="form-control" placeholder="Pincode" value="" >

                  </div>
                 
              </div>


              <div class="form-group">
                  <label for="cat_desc" class="col-sm-2 control-label">City: <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-9">
                    
                    <input type="text" name="city" id="locality" class="form-control" placeholder="City" value="" >

                  </div>
                 
              </div>


              


              <div class="form-group">
                  <label for="cat_desc" class="col-sm-2 control-label">State: <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-9">
                    
                    <input type="text" name="state" id="administrative_area_level_1" class="form-control" placeholder="State" value="" >

                  </div>
                 
              </div>



              <div class="form-group">
                  <label for="cat_desc" class="col-sm-2 control-label">Country: <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-9">
                    
                    <input type="text" name="country" id="country" class="form-control" placeholder="Country" value="" >
                  </div>
                 
              </div>





              <!--  <div class="text-center">
              <h4><b>List of Services</b></h4>
              </div>


              <div class="form-group">
                  <label for="cat_desc" class="col-sm-2 control-label">Services.: <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-9" id="service_err" >
                    
                    <select   name="u_service[]" id="u_service" class="form-control select2" multiple>
                    <option value="">Select Service</option>
                    <?php foreach($services as $sv){?>
                      <option value="<?php echo @$sv->service_id; ?>"><?php echo @$sv->service_name; ?></option>

                      <?php } ?>
                    </select>
                  </div>
                 
              </div> -->


              <!--     <div class="text-center">
              <h4><b>Payment Detail</b></h4>
              </div>


              <div class="form-group">
                  <label for="cat_desc" class="col-sm-2 control-label">Registration Fees.: <span style="color: rgb(255, 0, 0); padding-left: 2px;">*</span></label>

                  <div class="col-sm-9">
                    
                    <input type="text"  name="fees" id="fees" class="form-control" placeholder="Registration fees" value="<?php echo $fees[0]->registration_fees;?>" readonly>
                  </div>
                 
              </div> -->

             

              </div>
             
             
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo base_url()?>index.php/manage_rm/view_rm" class="btn btn-danger">Cancel</a>
                <button  type="submit" class="btn btn-info pull-right" onclick="return rm_form_validation()">Submit</button>
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
<script src="<?php echo base_url();?>custom_script/request_response/admin_request.js"></script> 

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


           var lname = $('#lname').val();
          if (!isNull(lname)) {
            $('#lname').removeClass('black_border').addClass('red_border');
            $('#lname').attr('placeholder', 'Name field Should not be Empty.');
            $('#lname').addClass('customplaceholder');
          } else {
            $('#lname').removeClass('red_border').addClass('black_border');
            $('#lname').attr('placeholder', 'Enter Distributor name');
            $('#lname').removeClass('customplaceholder');
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
            $('#mobile').attr('placeholder', 'Mobile field Should not be Empty.');
            $('#mobile').addClass('customplaceholder');
          } else {

            if (!iMobile(mobile))
             {

              $('#mobile').removeClass('black_border').addClass('red_border');
              $('#mobile').attr('placeholder', 'Mobile field Should not be Empty.');
              $('#mobile').addClass('customplaceholder');

            }
            else
            {
                $('#mobile').removeClass('red_border').addClass('black_border');
                $('#mobile').attr('placeholder', 'Enter Distributor Mobile');
                $('#mobile').removeClass('customplaceholder');
            }
           
          }

          



            var event_image = $('#event_image').val();
          if (!isNull(event_image)) {
            $('#event_image_err').removeClass('black_border').addClass('red_border');
            
          } else {
            $('#event_image_err').removeClass('red_border').addClass('black_border');
            
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

   var type = $('#type').val();
          if (!isNull(type)) {
            $('#type').removeClass('black_border').addClass('red_border');
            
          } else {
            $('#type').removeClass('red_border').addClass('black_border');
            
          }
          


           var autocomplete = $('#autocomplete').val();
          if (!isNull(autocomplete)) {
            $('#autocomplete').removeClass('black_border').addClass('red_border');
            $('#autocomplete').attr('placeholder', 'Location field Should not be Empty.');
            $('#autocomplete').addClass('customplaceholder');
          } else {
            $('#autocomplete').removeClass('red_border').addClass('black_border');
            $('#autocomplete').attr('placeholder', 'Enter Distributor Location');
            $('#autocomplete').removeClass('customplaceholder');
          }

             var postal_code = $('#postal_code').val();
          if (!isNull(postal_code)) {
            $('#postal_code').removeClass('black_border').addClass('red_border');
            $('#postal_code').attr('placeholder', 'Pin code field Should not be Empty.');
            $('#postal_code').addClass('customplaceholder');
          } else {
            $('#postal_code').removeClass('red_border').addClass('black_border');
            $('#postal_code').attr('placeholder', 'Enter Distributor Pin code');
            $('#postal_code').removeClass('customplaceholder');
          }


           var locality = $('#locality').val();
          if (!isNull(locality)) {
            $('#locality').removeClass('black_border').addClass('red_border');
            $('#locality').attr('placeholder', 'City field Should not be Empty.');
            $('#locality').addClass('customplaceholder');
          } else {
            $('#locality').removeClass('red_border').addClass('black_border');
            $('#locality').attr('placeholder', 'Enter Distributor City');
            $('#locality').removeClass('customplaceholder');
          }

            var administrative_area_level_1 = $('#administrative_area_level_1').val();
          if (!isNull(administrative_area_level_1)) {
            $('#administrative_area_level_1').removeClass('black_border').addClass('red_border');
            $('#administrative_area_level_1').attr('placeholder', 'State field Should not be Empty.');
            $('#administrative_area_level_1').addClass('customplaceholder');
          } else {
            $('#administrative_area_level_1').removeClass('red_border').addClass('black_border');
            $('#administrative_area_level_1').attr('placeholder', 'Enter Distributor State');
            $('#administrative_area_level_1').removeClass('customplaceholder');
          }


           var country = $('#country').val();
          if (!isNull(country)) {
            $('#country').removeClass('black_border').addClass('red_border');
            $('#country').attr('placeholder', 'Country field Should not be Empty.');
            $('#country').addClass('customplaceholder');
          } else {
            $('#country').removeClass('red_border').addClass('black_border');
            $('#country').attr('placeholder', 'Enter Distributor Country');
            $('#country').removeClass('customplaceholder');
          }


          /* var contact_person = $('#contact_person').val();
          if (!isNull(contact_person)) {
            $('#contact_person').removeClass('black_border').addClass('red_border');
            $('#contact_person').attr('placeholder', 'This field Should not be Empty.');
            $('#contact_person').addClass('customplaceholder');
          } else {
            $('#contact_person').removeClass('red_border').addClass('black_border');
            $('#contact_person').attr('placeholder', 'Enter Distributor Contact Person');
            $('#contact_person').removeClass('customplaceholder');
          }

          var pan = $('#pan').val();
          if (!isNull(pan)) {
            $('#pan').removeClass('black_border').addClass('red_border');
            $('#pan').attr('placeholder', 'Pan No. field Should not be Empty.');
            $('#pan').addClass('customplaceholder');
          } else {
            $('#pan').removeClass('red_border').addClass('black_border');
            $('#pan').attr('placeholder', 'Enter Distributor Pan No.');
            $('#pan').removeClass('customplaceholder');
          }

          var aadhar = $('#aadhar').val();
          if (!isNull(aadhar)) {
            $('#aadhar').removeClass('black_border').addClass('red_border');
            $('#aadhar').attr('placeholder', 'Aadhar No. field Should not be Empty.');
            $('#aadhar').addClass('customplaceholder');
          } else {
            $('#aadhar').removeClass('red_border').addClass('black_border');
            $('#aadhar').attr('placeholder', 'Enter Distributor aadhar No.');
            $('#aadhar').removeClass('customplaceholder');
          }*/

         

              

 }


 function rm_form_validation()
 {
    $('#add').attr('onchange', 'rm_validation()');
    $('#add').attr('onkeyup', 'rm_validation()');

     rm_validation();
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

 



            