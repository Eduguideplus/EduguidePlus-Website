<section class="breadcumb-wrapper">
      <div class="overlay-color">
        <div class="container">
          <div class="row clearfix">
            
          </div>
        </div>
      </div>
</section>
 <input type="hidden" name="hid_lnk" id="hid_lnk" value="<?php echo $exam_ready;?>">

<input type="hidden" name="knowledge_set_id" id="knowledge_set_id" value="<?php echo @$set_dtls[0]->kq_id; ?>">
<input type="hidden" name="hid_set" id="hid_set" value="<?php echo @$set_dtls[0]->kq_id; ?>">
<input type="hidden" name="hid_user_plan" id="hid_user_plan" value="">

<div class="container-fluid login_register deximJobs_tabs practice instruction_section">
 <div class="row">
  <div class="container main-container-home">
  		<div class="col-md-12 col-sm-12 col-xs-12 text-center log-in">
  			<h3 class="chapter_title">Instruction about <?php echo $set_dtls[0]->test_select_type.' '.@$test_type[0]->test_name; ?> ( <?php echo @$exam_type[0]->exam_name; ?> )<br><?php echo @$subject[0]->section_name; ?> <?php  if($set_dtls[0]->test_select_type=='Chapterwise') { echo " : ".@$chapter_det[0]->chap_name; } ?> </h3>
  		</div>

  		<div class="col-md-12 col-sm-12 col-xs-12">
  			<div class="rank-bx about-exam">
  				<div class="col-md-5 col-sm-4 col-xs-12">
  					<div class="about-exam-bx">
  						<img src="<?php echo base_url(); ?>assets/images/ab-exam.jpg" alt="" class="img-responsive">

  					</div>
  					

  				</div>
  				<div class="col-md-7 col-xs-12 col-sm-8">
  						<div class="about-exam-text instruction_info">
<?php
if($set_dtls[0]->test_select_type=='Mini Comprehensive')
{


?>
               
  							<ol>
                    <li><p> This is a Mock Examination of NISM-Series-V-A: MUTUAL FUND DISTRIBUTORS CERTIFICATION EXAMINATION.</p></li>
                    <li><p>This mock test has 25 questions of 1 marks each and time allotted 30 minutes.</p></li>
                    <li><p>Please note that the actual examination of NISM-Series-V-A Certification Examination has 100 questions of 1 mark each.</p></li>
                    <li><p>There is no negative marking</p></li>
                    <li><p>The passing score on the examination is 50%</p></li>
                    <li><p>This mock examination is only to give the candidates an experience of NISM testing system</p></li>
                    <li><p> Questions will be auto submitted in the event of time-up.</p></li>
                    <li><p>System will not will keep history of your practice, if you didn’t answer at least 75% questions on Comprehensive Test.</p></li>
                    

                </ol>
                <?php
              }
              else{
                ?>
                <ol>
                    <li><p> This is a Mock Examination of NISM-Series-V-A: MUTUAL FUND DISTRIBUTORS CERTIFICATION EXAMINATION.</p></li>
                    <li><p>This mock test has 100 questions of 1 marks each and time allotted 120 minutes.</p></li>
                    <li><p>Please note that the actual examination of NISM-Series-V-A Certification Examination has 100 questions of 1 mark each</p></li>
                    <li><p>There is no negative marking</p></li>
                    <li><p>The passing score on the examination is 50%</p></li>
                    <li><p>This mock examination is only to give the candidates an experience of NISM testing system.</p></li>
                    <li><p> Questions will be auto submitted in the event of time-up.</p></li>
                    <li><p>System will not will keep history of your practice, if you didn’t answer at least 75% questions on Comprehensive Test.</p></li>
                    

                </ol>
                <?php
              }
              ?>
    
  						</div>
 
      <div id="ready_to_big_false text-left" class="start_lft">  <?php
       if($exam_date_expired=='N')
        {
          ?>
        <a onclick="get_exam();" class="btn btn-success">Start Test Now<i class="fa fa forward" ></i></a>
        <?php
      }
      else{
        ?>
         <a class="btn btn-danger">Sorry, Test date expired!</a>
         <?php
       }
       ?></div>    
      <div id="ready_to_big_false" class="start_rht">  <a href="<?php echo $this->url->link(134); ?>" class="btn btn-danger"><i class="fa fa backward"></i> Back</a></div>   
  					
  				</div>



			  			</div>




  		</div>

  </div>
 </div>
</div>










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

if(confirm('are you ready to begin? '))
{

var user_id='<?php echo $this->session->userdata('activeuser'); ?>';
      


      if(user_id !=""){  
   
      var lnk=$("#hid_lnk").val();
      // alert(lnk);
    var curr_browser = navigator.appName;
    // alert(curr_browser);
    if (curr_browser == "Microsoft Internet Explorer") {
        window.opener = self;
    }
    var examwindow; 
    examwindow=window.open('<?php echo $this->url->link(27);?>/'+lnk, 'MockTest', 'width=1500,height=650,directories=no,titlebar=no,toolbar= no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,minimizable=no,controlBox=false');
    window.moveTo(0, 0);

    window.resizeTo(screen.width, screen.height);
     examwindow.document.title = 'testing';

       examwindow.onload = function() { this.document.title = "NISM Mock Test"; }
  }else{
    window.location="<?php echo $this->url->link(1); ?>"
  }                                    
}
}
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
    

                                                 examwindow.onload = function() { this.document.title = "Wbcs Forum Online Examination";}
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

       examwindow.onload = function() { this.document.title = "Wbcs Forum Online Examination"; }
     $("#instruction").modal('hide');

};
          </script>   -->
