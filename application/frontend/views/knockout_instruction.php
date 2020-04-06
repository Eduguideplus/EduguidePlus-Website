<section class="breadcumb-wrapper">
      <div class="overlay-color">
        <div class="container">
          <div class="row clearfix">
            
          </div>
        </div>
      </div>
</section>




  <input type="hidden" name="hid_lnk" id="hid_lnk" value="">

<input type="hidden" name="knowledge_set_id" id="knowledge_set_id" value="<?php echo @$set_dtls[0]->kq_id; ?>">
<input type="hidden" name="hid_set" id="hid_set" value="">
<input type="hidden" name="hid_user_plan" id="hid_user_plan" value="">

<div class="container-fluid login_register deximJobs_tabs practice">
 <div class="row">
  <div class="container main-container-home">
  		<div class="col-md-12 col-sm-12 col-xs-12 text-center log-in">
  			<h3>Instruction about next level <?php echo @$test_type[0]->test_name; ?> ( <?php echo @$exam_type[0]->exam_name; ?> ,<?php echo @$subject[0]->section_name; ?> <?php if(@$set_dtls[0]->test_type==5 || @$set_dtls[0]->test_type==6){ echo " : ".@$chapter_det[0]->chap_name; } ?> )</h3>
  		</div>

  		<div class="col-md-12 col-sm-12 col-xs-12">
  			<div class="rank-bx about-exam">
  				<div class="col-md-5 col-sm-4 col-xs-12">
  					<div class="about-exam-bx">
  						<img src="<?php echo base_url(); ?>assets/images/ab-exam.jpg" alt="" class="img-responsive">

  					</div>
  					

  				</div>
  				<div class="col-md-7 col-xs-12 col-sm-8">
  						<div class="about-exam-text">

                <?php echo @$exam_type[0]->detail_description; ?>
  						<!-- 	<h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h4>
  							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
  							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
  							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
  							consequat. Duis aute irure dolor in reprehenderit in voluptate.</p>

  							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
  							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
  							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
  							consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
  							cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
  							proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> 
                -->
    <div class="dateofexam-list">
    <ul>
            
              <li><a>Examination Date : <span style=" font-weight:bold;"> <?php echo date("d/m/Y",strtotime(@$set_dtls[0]->exam_date_for_knockout_next_level)); ?></span></a></li>
              <li><a>Examination Time : <span style=" font-weight:bold;"> <?php echo @$set_dtls[0]->exam_time_for_knockout_next_level;$arr_tm=explode(":",$set_dtls[0]->exam_time_for_knockout_next_level);if(@$arr_tm[0]>=12){echo ' PM';}else{echo ' AM'; } ?></span></a></li>
            
            </ul> 
          </div>
  						</div>
 
<div id="before_exam" style="display: block"><h4>Your Exam will start after : </h4> <p id="timer_show"></p></div>
  					
            <div id="ready_to_big" style="display: none">	<a onclick="go_to_instruction_now('<?php echo @$set_dtls[0]->exam_id; ?>','<?php echo @$user_knw_plan[0]->user_plan_id ;?>')"   class="btn btn-success">Ready To Begin >></a></div>

          <div id="ready_to_big_false" style="display: none">  <a onclick="false_go();" class="btn btn-success">Start Exam Now <i class="fa fa forward" ></i> </a></div>    
  					
  				</div>



			  			</div>




  		</div>

  </div>
 </div>
</div>


<div id="instruction" class="modal fade instruction" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center"><b>Instruction</b></h4>
      </div>
      <div class="modal-body">
        <?php  $set_slug_1=$this->uri->segment(2);
          $user_id=$this->session->userdata('activeuser');

   $set_dtls_1=$this->common_model->common($table_name = 'tbl_knowledge_qiuz_set', $field = array(), $where = array('set_slug'=>$set_slug_1), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
      ?>
        <p><b>Duration:</b> <span id="duration"><?php echo @$set_dtls_1[0]->exam_duration; ?> </span> Secs <span class="pull-right"><b>Full Marks:</b> <span id="fm"><?php echo round(@$set_dtls_1[0]->total_marks); ?></span></span></p>
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


    <?php echo @$set_dtls_1[0]->exam_instruction; ?>

  
    <!-- <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua.</li>
    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua.</li>
    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua.</li> -->

      </div>
      
    </div>
  </div>
</div>
      </div>
      <div class="col-md-12">
     <input type="checkbox" name="agree" id="agree" value="1" class="form-control agreechk" checked=""><b class="agree_check">I understand all the rules and privacy policy of the examination.</b>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" onclick="window.location='testpage.html';" class="btn btn-primary btn-lg">Start Test</button> -->
        <!-- <a href=""  class="btn btn-primary btn-lg" id="ready_exam">I am ready to begin</a> -->
        <input type="hidden" name="hid_lnk" id="hid_lnk" value="">
         <button target="_parent" class="btn btn-primary btn-lg" href="javascript:void(0);" id="ready_exam1" class="popup" >I am ready to begin</button>  
      </div>
    </div>

  </div>
</div>



<script>
var start_date_with_time='<?php echo date('M d, Y',strtotime(@$set_dtls[0]->exam_date_for_knockout_next_level)); ?> <?php echo @$set_dtls[0]->exam_time_for_knockout_next_level; ?>';

var countDownDate = new Date(start_date_with_time).getTime();
 // alert(countDownDate);
// Update the count down every 1 second
var x = setInterval(function() {

  // Get todays date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
   
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="timer_show"
  document.getElementById("timer_show").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
    

  if(Math.floor(distance / (1000 * 60))<='5'){
if(Math.floor(distance / (1000 * 60))<='1'){

$("#ready_to_big_false").css("display", "none");

     $("#ready_to_big").css("display", "block");
$('#ready_exam1').attr('disabled', true);
}else{
  $('#ready_exam1').attr('disabled', true);
$("#ready_to_big_false").css("display", "block");
 } }
 


  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    // document.getElementById("timer_show").innerHTML = "EXPIRED";
    $('#ready_exam1').attr('disabled', false);
$("#before_exam").css("display", "none");
     $("#ready_to_big").css("display", "block");
  }
}, 1000);
</script>



          <script>
          function go_to_instruction_now(exam_id,user_plan_id)
          {
            
// alert(exam_id); alert(user_plan_id);

                var knowledge_set_id=$("#knowledge_set_id").val();
                var base_url=$("#baseurl").val();
                $("#hid_user_plan").val(user_plan_id);

                 $.ajax({
                          
                         url:'<?php echo base_url(); ?>manage_exam/get_random_set',
                         data:{examid:exam_id,userplan:user_plan_id,knowledge_set_id:knowledge_set_id},
                          dataType: "json",
                         type: "POST",
                         success: function(data){
                           // alert(data);  
                         var perform= data.workdone;
                    // alert(perform);
                          
                          if(perform['status']==1)
                          {
                            var random_set=perform['r_set'];

                            $("#hid_set").val(random_set);
                          // alert(random_set);

                                    $.ajax({
                                  
                                             url:'<?php echo base_url(); ?>manage_exam/get_instruction_details',
                                             data:{set:random_set,userplan:user_plan_id},
                                               dataType: "json",
                                             type: "POST",
                                             success: function(data){
                                           // alert(data);
                                              var perform= data.workdone;
                                              // alert(perform['status']);
                                              
                                              if(perform['status']==1)
                                              {
                                      
                                                $("#duration").text(perform['dur']);
                                                $("#fm").text(perform['qty']);
                                                $("#instruction").modal('show');
                                              
                                                $("#hid_lnk").val(perform['exam_ready']);
                                                $("#ready_exam1").attr('onclick','return get_exam()');

   
                                              }
                                  
                                 
                                

                                     
                                    
                                        }
                                    });



                           

                            
                          }

                          else
                          {
                            var exam_d=perform['exam_d'];
                            var userplan_id=perform['userplan_id'];
                            go_to_instruction_now(exam_d,userplan_id);

                          }


                         
                        

                             
                            
                              }
                         });





              


                        
          }
          </script>

       <script>
     function get_exam() {

var user_id='<?php echo $this->session->userdata('activeuser'); ?>';
      var cat_ids=[];
        $(':checkbox[id^="agree"]:checked').each(function(){        
         cat_ids.push($(this).val());              
      });

        // alert(cat_ids);
 if(cat_ids!=1){              
          alert("Please agree with our terms and conditions.");              
          return false;            
        }else{
      if(user_id !=""){  
     $("#instruction").modal('hide');   
      var lnk=$("#hid_lnk").val();
      // alert(lnk);
    var curr_browser = navigator.appName;
    // alert(curr_browser);
    if (curr_browser == "Microsoft Internet Explorer") {
        window.opener = self;
    }
    var examwindow; 
    examwindow=window.open('<?php echo $this->url->link(125);?>/'+lnk, 'MyTest', 'width=1500,height=650,directories=no,titlebar=no,toolbar= no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,minimizable=no,controlBox=false');
    window.moveTo(0, 0);

    window.resizeTo(screen.width, screen.height);
     examwindow.document.title = 'testing';

       examwindow.onload = function() { this.document.title = "Your Success portal Online Examination"; }
  }else{
    window.location="<?php echo $this->url->link(1); ?>"
  }                                    
}
};
          </script>  


          <script>
          function go_to_resume_exam(user_exam_id,set_id)
          {


               var base_url=$("#baseurl").val();

            $.ajax({
                                  
                                             url:base_url+'index.php/manage_exam/get_resume_exam',
                                             data:{set:set_id,userexam:user_exam_id},
                                             dataType: "json",
                                             type: "POST",
                                             success: function(data){
                                              var perform= data.workdone;
                                              //alert(perform['status']);
                                              
                                              if(perform['status']==1)
                                              {


                                                  var examwindow;
                                                 examwindow=window.open('<?php echo $this->url->link(65);?>/'+perform['exam_ready'], 'MyTest', 'width=900,height=750,directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=no');
    

                                                 examwindow.onload = function() { this.document.title = "Surajit Pramanick Online Examination";}
                                                /*$("#duration").text(perform['dur']);
                                                $("#fm").text(perform['qty']);
                                                $("#instruction").modal('show');
                                               
                                               $("#hid_lnk").val(perform['exam_ready']);
                                                $("#ready_exam1").attr('onclick','return get_exam()');*/

                                      
                                              }
                                  
                                 
                                

                                     
                                    
                                        }
                                    });

          }
          </script>


<script>

          function go_to_evaluation(user_exam,set_id)
{
  //alert('ok');
  
  var base_url='<?php echo base_url(); ?>';
  $.ajax(

                        {

                        type: "POST",

                        dataType: 'json',

                        url:base_url+'index.php/manage_exam/get_evaluation_link',
                        data:{uexam:user_exam,set:set_id},
                        async: false,

                        success: function (data) {
                            
                            var perform= data.workdone;
                                    //alert(perform['status']);
                                    if(perform['status']==1)
                                    {
                                      //alert(perform['evaluation_ready']);
                                      var lnk=perform['evaluation_ready']
                      var scorewindow;
                      scorewindow=window.open('<?php echo $this->url->link(62);?>/'+lnk, 'MyEvaluation', 'width=900,height=750,directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=no');

                      var exam_name=perform['exam_name'];

                      scorewindow.onload = function() { this.document.title = exam_name+" Examination Result Evaluation"; }

                      /*closeDialog($('#content'));
                    close();*/
                                        
                                        

                                    }
                                   
                                    
                                      }
                        });


  
}
</script>

<script>
function send_request(set_id,user_plan_id)
{

   

   $("#reasonmodal").modal('show');

   $("#hdn_set").val(set_id);
   $("#hdn_u_plan").val(user_plan_id);
   $('#send_btn').attr('onclick', 'send_request_reason()');

  /*$.ajax(

                        {

                        type: "POST",

                        dataType: 'json',

                        url:base_url+'index.php/manage_exam/put_resume_request',
                        data:{set:set_id,userplan:user_plan_id},
                        async: false,

                        success: function (data) {
                            
                            var perform= data.workdone;
                                    //alert(perform['status']);
                                    if(perform['status']==1)
                                    {
                                      alert('Request Sent successfully');
                                      var node='<a href="javascript:void(0)" class="btn btn-info" target="_blank"><i class="fa fa-cog" aria-hidden="true"></i> Request Sent</a>';
                                      $("#req_"+set_id).html(node);

                                     
                                    }
                                   
                                    
                                      }
                        });
*/
}
</script>

<script>
function send_request_reason()
{
  alert('ok');
  
  var set_id=$("#hdn_set").val();
  var user_plan_id=$("#hdn_u_plan").val();
  var rsn=$("#reason").val();
  var base_url='<?php echo base_url(); ?>';

  if(rsn!='')
{ 

//$("#req_loader").show();
          $.ajax(

                        {

                        type: "POST",

                        dataType: 'json',

                        url:base_url+'index.php/manage_exam/put_resume_request',
                        data:{set:set_id, userplan:user_plan_id, reason:rsn},
                        async: false,

                        success: function (data) {
                            //$("#req_loader").hide();
                            var perform= data.workdone;
                                    //alert(perform['status']);
                                    if(perform['status']==1)
                                    {

                                      var node='<img class="img-responsive center-block" width="200px" height="200px" src='+base_url+'./assets/images/request.gif>'

                                      $("#reason_body").html(node);


                                            setTimeout(
                                                    function() 
                                                    {
                                                      $("#reasonmodal").modal('hide');
                                                    }, 3000);


                                      
                                      //alert('Request Sent successfully');

                                      var node='<a href="javascript:void(0)" class="btn btn-info" target="_blank"><i class="fa fa-cog" aria-hidden="true"></i> Request Sent</a>';
                                      $("#req_"+set_id).html(node);

                                     
                                    }
                                   
                                    
                                      }
                        });


}
else
{
     
  $("#error").text('Sorry!! without reason request can not be sent');

}

   

   

}
</script>

<script type="text/javascript">
  function false_go() {
    alert('Opps! We are sorry. ');
  }
</script>

    <!--  <script>
     function get_exam() {
      //alert('ok');
      var lnk=$("#hid_lnk").val();
      //alert(lnk);
    var curr_browser = navigator.appName;
    if (curr_browser == "Microsoft Internet Explorer") {
        window.opener = self;
    }
    var examwindow;
    examwindow=window.open('<?php echo $this->url->link(27);?>/'+lnk, 'MyTest', 'width=900,height=750,directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=no');
    window.moveTo(0, 0);
    window.resizeTo(screen.width, screen.height - 100);
     examwindow.document.title = 'testing';

       examwindow.onload = function() { this.document.title = "Surajit Pramanick Online Examination"; }
     $("#instruction").modal('hide');

};
          </script>   -->
