<?php //include "header.php"; ?>
<section class="breadcumb-wrapper">
      <div class="overlay-color">
        <div class="container">
          <div class="row clearfix">
            
          </div>
        </div>
      </div>
    </section>
<div class="ed_dashboard_wrapper">
    <div class="container">
        <div class="row">
            <!-- <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="ed_sidebar_wrapper">
                    <div class="ed_profile_img ">
                    <img src="<?php echo base_url();?>assets/uploads/user/<?php if(@$user[0]->profile_photo!=''){ echo @$user[0]->profile_photo; }else{echo 'no-img-profile.png'; }?>" alt="Dashboard Image" class="img-profile" id="img_profile">
                    <div class="img-loader" style="display:none;" id="photo_loader">
                        <img src="<?php echo base_url();?>assets/images/loading1.gif">
                    </div>
                    </div>
                    <h3><?php echo $user[0]->first_name;?></h3>
                     <div class="ed_tabs_left">
                        <ul class="nav nav-tabs">
                          <li class="active"><a href="<?php echo $this->url->link(8); ?>" data-toggle="tab">dashboard</a></li>
                          <li><a href="#profile" data-toggle="tab">profile</a></li>
                          <li><a href="#setting" data-toggle="tab">setting</a></li>
                          <li><a href="#wallet" data-toggle="tab">Details</a></li>
                        </ul>
                    </div>
                </div>
            </div> -->
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
            <div class="ed_dashboard_tab">
                <div class="tab-content">
                    
          
                    
                    <div class="tab-pane active" id="profile">
                        <div class="ed_dashboard_inner_tab">
                            <div role="tabpanel">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#view" aria-controls="view" role="tab" data-toggle="tab">Plan</a></li>
                                    <li role="presentation"><a href="#edit" aria-controls="edit" role="tab" data-toggle="tab">edit</a></li>
                                    <li role="presentation"><a href="#change" aria-controls="change" role="tab" data-toggle="tab">change profile photo</a></li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="view">
                                    <div class="ed_dashboard_inner_tab">
                                        <h2>Your Plan</h2>
                                        <div class="table-responsive">
                                            <table id="profile_view_settings" class="table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Plan Name</th>
                                                        <th>Plan Price</th>
                                                        <th>Valid to</th>
                                                        <th>Status</th>
                                                        <th>Renew</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php foreach ($plan as $plan) {
                                                        $current_date = date('Y-m-d');
                                                       ?>
                                                    <tr>
                                                        <td><?php echo $plan->plan_title;?></td>
                                                        <td><a>₹ <?php echo $plan->plan_price;?></a></td>
                                                        <td><?php echo date('jS M Y',strtotime($plan->validity_date));?></td>
                                                        <td><?php if($current_date > $plan->validity_date) { ?><button class="btn btn-danger" style="cursor: default">Inactive</button>
                                                            <?php } else { ?><button class="btn btn-success" style="cursor: default">Active</button><?php } ?></td>
                                                        <td>
                                                            <a href="<?php echo base_url();?>index.php/manage_user/renew_plan/<?php echo $plan->id;?>" class="readmore">Renew</a> 
                                                            <a href="<?php echo $this->url->link(63);?>" class="readmore pull-right">Choose new plan</a></td>
                                                    </tr>  
                                                    <?php } ?>                                             
                                                </tbody>
                                            </table>
                                        </div>    
                                    </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="edit">

                                    <div class="ed_dashboard_inner_tab">
                                        <h2 class="col-md-3">edit profile</h2>


                                         <div class="col-md-9" style="display:none;color:green;" id="suc_msg"></div>
                                         <div class="col-md-9" style="display:none;color:red;" id="err_msg"></div>



                                            <form class="ed_tabpersonal" name="profile" id="profile" >
                                                <div class="form-group">
                                                  <label for="name" class="col-md-3">Name:</label>
                                                  <div class="col-md-9">
                                                <input type="text" class="form-control" value="<?php echo @$user[0]->first_name;?>" placeholder="Name" name="name" id="name">
                                                </div>
                                                </div>
                                                <div class="form-group">
                                                <label for="name" class="col-md-3">Email:</label>
                                                <div class="col-md-9">
                                                <input type="text" class="form-control" value="<?php echo @$user[0]->login_email;?>" placeholder="Email" name="email" id="email">
                                                </div>
                                                </div>
                                                <div class="form-group">
                                                <label for="name" class="col-md-3">Phone No:</label>
                                                <div class="col-md-9">
                                                <input type="text" class="form-control" value="<?php echo @$user[0]->login_mob;?>" placeholder="Phone No" name="phno" id="phno">
                                                </div>
                                                </div>
                                                <div class="form-group">
                                                <label for="name" class="col-md-3">Date of Birth:</label>
                                                <div class="col-md-9">
                                                <input type="text" class="form-control" placeholder="Date of Birth" value="<?php echo @$user[0]->dob;?>" name="dob" id="dob">
                                                </div>
                                                </div>
                                                <div class="form-group">
                                                <label for="name" class="col-md-3">Education:</label>
                                                <div class="col-md-9">
                                                <select class="form-control" name="education" id="education">
                                                    <option value="10th Pass" <?php if(@$user[0]->user_education=='10th Pass'){ echo 'selected'; }?>>10th Pass</option>
                                                    <option value="12th Pass" <?php if(@$user[0]->user_education=='12th Pass'){ echo 'selected'; }?>>12th Pass</option>
                                                    <option value="Graduation" <?php if(@$user[0]->user_education=='Graduation'){ echo 'selected'; }?>>Graduation</option>
                                                    <option value="B.E/ B.TECH" <?php if(@$user[0]->user_education=='B.E/ B.TECH'){ echo 'selected'; }?>>B.E/ B.TECH</option>
                                                </select>
                                                </div> 
                                                </div>

                                                <div class="form-group">
                                                <label for="name" class="col-md-3">Category:</label>
                                                <div class="col-md-9">
                                                <select class="form-control" name="category" id="category">
                                                    <option value="General" <?php if(@$user[0]->user_category=='General'){echo 'selected';}?>>General</option>
                                                    <option value="OBC" <?php if(@$user[0]->user_category=='OBC'){echo 'selected';}?>>OBC</option>
                                                    <option value="SC"  <?php if(@$user[0]->user_category=='SC'){echo 'selected';}?>>SC</option>
                                                    <option value="ST"  <?php if(@$user[0]->user_category=='ST'){echo 'selected';}?>>ST</option>
                                                </select>
                                                </div> 
                                                </div>
                                                <div class="form-group">
                                                <label for="name" class="col-md-3">Location:</label>
                                                <div class="col-md-9">
                                                <input type="text" class="form-control" placeholder="Location" name="location" id="location" value="<?php echo @$user[0]->user_address;?>">
                                                </div>
                                                </div>

                                               
                                                <div class="form-group">
                                                <button class="readmore pull-right" type="button" onclick="save_profile()">save changes</button>
                                                </div>
                                            </form>
                                    </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="change">
                                        <div class="ed_dashboard_inner_tab">
                                            <h2>change photo</h2>


                                            <div class="col-md-9" style="display:none;color:green;" id="s_msg"></div>
                                         <div class="col-md-9" style="display:none;color:red;" id="e_msg"></div>

                                            <form class="ed_tabpersonal" id="prfile_pic">
                                                <div class="form-group">
                                                <p class="instruction-p">Click below to select a JPG, GIF or PNG format photo from your computer and then click 'Upload Image' to proceed.</p>
                                                </div>
                                                <div class="form-group">
                                                <input type="file" name="photo" id="photo" accept="image/*">
                                                </div>
                                                <div class="form-group">
                                                <button class="readmore pull-right" type="button" onclick="save_profile_pic()">upload image</button>
                                                </div>
                                                <div class="form-group">
                                                <p class="instruction-p">If you'd like to delete your current avatar but not upload a new one, please use the delete avatar button.</p>
                                                 <img src="<?php echo base_url();?>assets/uploads/user/<?php if(@$user[0]->profile_photo!=''){ echo @$user[0]->profile_photo; }else{echo 'no-img-profile.png'; }?>" alt="Dashboard Image" id="img_show">
                                                 <input type="hidden" name="current_img" id="current_img" value="<?php  echo @$user[0]->profile_photo; ?>">
                                                </div>
                                                <div class="form-group">
                                                <button type="button" class="readmore " onclick="delete_profile_pic()" >delete</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div><!--tab End-->
                        </div>
                    </div>
                    
                    
                    
                    
            </div>
            
            
        </div>
    </div>

    <div class="col-md-3" id="blog-sidebar">
    <div class="widget">
                      <h4 class="widget-title">My Stat</h4>
                      <hr>
                        <div class="post-list categories">
                          <ul>
                               <li><a href="#">Completed Examination<span class="pull-right"><b><?php $completed_paper=0;if(count(@$completed_exam)>0){ $completed_paper=count(@$completed_exam);} echo $completed_paper; ?></b></span></a></li> 
                              <li><a href="#">Incompleted Examination<span class="pull-right"><b><?php $incompleted_paper=0;if(count(@$incomplete_exam)>0){ $incompleted_paper=count(@$incomplete_exam);} echo $incompleted_paper; ?></b></span></a></li> 
                                <li><a href="#">Remaining Examination <span class="pull-right"><b><?php echo @$total_remaining_paper; ?></b></span></a></li>
                              
                            
                            </ul>
                            <a href="#" class="readmore">Exam Details</a>
                        </div>
                    </div>
    </div>
</div>
</div>
</div>

<?php
$set_ids=array();
for($i=0;$i<count($sets);$i++)
{
    $set_ids[$i]=@$sets[$i]->id;

}
shuffle($set_ids);
$set_qty=count($set_ids)-1;
$random=mt_rand(0, @$set_qty);



?>
<input type="hidden" name="hid_set" id="hid_set" value="<?php echo $set_ids[$random]; ?>">

<!-- Modal -->
<div id="instruction" class="modal fade instruction" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center"><b>Instruction</b></h4>
      </div>
      <div class="modal-body">
        <p><b>Duration:</b> <span id="duration">180</span> min <span class="pull-right"><b>Full Marks:</b> <span id="fm">30</span></span></p>
        <p><b>Read the following instruction carefully:</b></p>
        <div class="panel-group">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" href="#collapse1">Know more about the interface</a>
      </h4>
    </div>
    <div id="collapse1" class="panel-collapse collapse in">
      <div class="panel-body">
      <p><b>General Instruction:</b></p>
<ol>
    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua.</li>
    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua.</li>
    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua.</li>
</ol>
      </div>
      
    </div>
  </div>
</div>
      </div>
      <div class="col-md-12">
     <input type="checkbox" name="agree" id="agree" value="1" class="form-control agreechk"><b class="agree_check">I understand all the rules and privacy policy of the examination.</b>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" onclick="window.location='testpage.html';" class="btn btn-primary btn-lg">Start Test</button> -->
        <a href=""  class="btn btn-primary btn-lg" id="ready_exam">I am ready to begin</a>
      </div>
    </div>

  </div>
</div>

          <?php //include "footer.php"; ?>

          <script>
          function save_profile()
          {
            alert('ok');
            var name=$('#name').val();
            var email=$('#email').val();
            var phno=$('#phno').val();
            var dob=$('#dob').val();
            var education=$('#education').val();
            var category=$('#category').val();
            var location=$('#location').val();
            var base_url=$("#baseurl").val();
           


            $.ajax({
                          
                         url:base_url+'index.php/manage_user/profile_change',
                         data:{nm:name, eml:email, phn:phno, dtb:dob, edu:education, cat:category, loc:location},
                         dataType: "json",
                         type: "POST",
                         success: function(data){
                          var perform= data.workdone;
                          //alert(perform['status']);
                          
                          if(perform['status']==1)
                          {
                            
                            $("#suc_msg").css("display", "block");
                            $("#err_msg").css("display", "none");
                            $("#suc_msg").text('Your profile has been saved successfully.');
                            
                          }
                          
                          else 
                          {
                            
                            $("#err_msg").css("display", "block");
                            $("#suc_msg").css("display", "none");
                            $("#err_msg").text('Sorry!! profile can not be saved.');
                           
                          }
                        

                             
                            
                              }
                         });
          }
          </script>


          <script>
           function save_profile_pic()
           {
            var pic=$("#photo").val();
            if(pic!='')
            {
                $("#photo_loader").css("display","block");
                var base_url=$("#baseurl").val();
                //alert(base_url);
                var formData = new FormData($("#prfile_pic")[0]);


                $.ajax({
                url: base_url+'index.php/manage_user/profile_image_save', // Url to which the request is send
                type: "POST",             // Type of request to be send, called as method
                data: formData, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                dataType: "json",
                async: false,
                success: function(data)   // A function to be called if request succeeds
                { 
                    var perform= data.workdone;
                   // alert(perform['status']);
                    if(perform['status']==1)
                    {
                         setTimeout(function() 
                        {
                    //do something special
                            $("#s_msg").css("display", "block");
                            $("#e_msg").css("display", "none");
                            $("#photo_loader").css("display","none");
                            $("#img_profile").attr('src','<?php echo base_url();?>assets/uploads/user/'+perform['pro_pic']);
                            $("#img_show").attr('src','<?php echo base_url();?>assets/uploads/user/'+perform['pro_pic']);
                            $("#current_img").val(perform['pro_pic']);
                            $("#s_msg").text('Your profile picture has been saved successfully.');
                    
                        }, 3000);
                            
                    }
                    else
                    {
                            $("#e_msg").css("display", "block");
                            $("#s_msg").css("display", "none");
                            $("#e_msg").text('Sorry!! profile picture can not be saved.');

                        
                    }
                },

                cache: false,
                contentType: false,
                processData: false


                });

            }
            else
            {
                            $("#e_msg").css("display", "block");
                            $("#s_msg").css("display", "none");
                            $("#e_msg").text('Sorry!! please chose one photo.');

            }
            
           }


          </script>

          <script>
              function change_setting()
              {
                var ac_email=$("#ac_email").val();
                var new_pwd=$("#new_pwd").val();
                var con_pwd=$("#con_pwd").val();
                var base_url=$("#baseurl").val();
                if(ac_email!='' && new_pwd=='' || con_pwd=='')
                {

           


            $.ajax({
                          
                         url:base_url+'index.php/manage_user/setting_change',
                         data:{eml:ac_email},
                         dataType: "json",
                         type: "POST",
                         success: function(data){
                          var perform= data.workdone;
                          //alert(perform['status']);
                          
                          if(perform['status']==1)
                          {
                            
                            $("#true_msg").css("display", "block");
                            $("#false_msg").css("display", "none");
                            $("#true_msg").text('Your account email has been saved successfully.');
                            
                          }
                          
                          else 
                          {
                            
                            $("#false_msg").css("display", "block");
                            $("#true_msg").css("display", "none");
                            $("#false_msg").text('Sorry!! email account can not be saved.');
                           
                          }
                        

                             
                            
                              }
                         });

                }
                if(ac_email!='' && new_pwd!='' && con_pwd!='')
                {
                     $.ajax({
                          
                         url:base_url+'index.php/manage_user/password_change',
                         data:{eml:ac_email, np:new_pwd, cp:con_pwd},
                         dataType: "json",
                         type: "POST",
                         success: function(data){
                          var perform= data.workdone;
                          //alert(perform['status']);
                          
                          if(perform['status']==1)
                          {
                            
                            $("#true_msg").css("display", "block");
                            $("#false_msg").css("display", "none");
                            $("#true_msg").text('Your account email and password has been saved successfully.');
                            
                          }
                          
                          else 
                          {
                            
                            $("#false_msg").css("display", "block");
                            $("#true_msg").css("display", "none");
                            $("#false_msg").text('Sorry!! account email and password can not be saved.');
                           
                          }
                        

                             
                            
                              }
                         });

                }

              }
          </script>


          <script>
           function delete_profile_pic()
           {
            var current_pic=$("#current_img").val();
            //alert(current_pic);
            if(current_pic!='')
            {
                $("#photo_loader").css("display","block");
                var base_url=$("#baseurl").val();
                //alert(base_url);
               


                $.ajax({
                url: base_url+'index.php/manage_user/profile_image_delete', 
                type: "POST",             
                data: {c_pic:current_pic}, 
                dataType: "json",
                async: false,
                success: function(data)  
                { 
                    var perform= data.workdone;
                    //alert(perform['status']);
                    if(perform['status']==1)
                    {
                        $("#img_show").attr('src','<?php echo base_url();?>assets/uploads/user/no-img-profile.png');

                         setTimeout(function() 
                        {
                    //do something special
                            $("#s_msg").css("display", "block");
                            $("#e_msg").css("display", "none");
                            $("#photo_loader").css("display","none");
                            $("#img_profile").attr('src','<?php echo base_url();?>assets/uploads/user/no-img-profile.png');

                            $("#s_msg").text('Your profile picture has been Deleted successfully.');
                    
                        }, 3000);
                            
                    }
                    else
                    {
                            $("#e_msg").css("display", "block");
                            $("#s_msg").css("display", "none");
                            $("#e_msg").text('Sorry!! No profile photo found to delete');

                        
                    }
                }

                


                });

            }
            else
            {
                            $("#e_msg").css("display", "block");
                            $("#s_msg").css("display", "none");
                            $("#e_msg").text('Sorry!! No profile photo found to delete');

            }
            
           }


          </script>


          <script>
          function go_to_instruction_now()
          {

                var set_id=$("#hid_set").val();
                var base_url=$("#baseurl").val();
                //alert(set_id);
                $.ajax({
                          
                         url:base_url+'index.php/manage_exam/get_instruction_details',
                         data:{set:set_id},
                         dataType: "json",
                         type: "POST",
                         success: function(data){
                          var perform= data.workdone;
                          alert(perform['status']);
                          
                          if(perform['status']==1)
                          {
                            
                            $("#duration").text(perform['dur']);
                            $("#fm").text(perform['qty']);
                            $("#instruction").modal('show');
                            $("#ready_exam").attr('href','<?php echo $this->url->link(27).'/';?>'+perform['exam_ready']);
                            
                            
                          }
                          
                         
                        

                             
                            
                              }
                         });


                        
          }
          </script>

