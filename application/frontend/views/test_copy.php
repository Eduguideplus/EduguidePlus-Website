<!-- <script>

var countDownDate = new Date("oct 12, 2018 17:25:35").getTime();


var x = setInterval(function() {

  
    var now = new Date().getTime();
    
  
    var distance = countDownDate - now;
    
   
    
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    

    document.getElementById("demo").innerHTML = hours + "h "
    + minutes + "m " + seconds + "s ";
    
 
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "EXPIRED";
    }
}, 1000);
</script> -->












<section class="breadcumb-wrapper">
      <div class="overlay-color">
        <div class="container">
          <div class="row clearfix">
            
          </div>
        </div>
      </div>
</section>









<div class="container-fluid login_register deximJobs_tabs practice">
 <div class="row">
  <div class="container main-container-home">
  		<div class="col-md-12 col-sm-12 col-xs-12 text-center log-in">
  			<h3><?php echo @$test_dtls[0]->test_name; ?></h3>
  		</div>

  		<div class="col-md-12 col-sm-12 col-xs-12">


<?php 

$knowledge_id ="";

$timer_end_date ="";

$timer_end_time ="";
if(count(@$set_list)>0){ foreach($set_list as $key=>$sl){



$id= @$sl->kq_id;


if($key != count(@$set_list)-1)
{
  $comma = ",";
}
else
{
  $comma = "";
}

$knowledge_id = $knowledge_id.$id.$comma;






$exam_dtls=$this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>$sl->exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
$sub_dtls=$this->common_model->common($table_name = 'tbl_question_section', $field = array(), $where = array('id'=>$sl->subject_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

$user_knowledge_quiz=$this->common_model->common($table_name = 'tbl_user_knowledge_quiz', $field = array(), $where = array('set_id'=>$sl->kq_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');



$start_exam=$sl->exam_date; 


 $timer_end_date = $timer_end_date.@$start_exam.$comma;


 $timer_end_time= $timer_end_time.@$sl->exam_time.$comma;


  ?>
  			<div class="col-md-4 col-sm-6 col-xs-12">
  				<div class="test-cnt">
  					<h4><?php echo @$test_dtls[0]->test_name; ?></h4>
  					<h6><?php echo @$exam_dtls[0]->exam_name; ?></h6>
  					<h6><?php echo @$sub_dtls[0]->section_name; ?></h6>

  						

  					<ul>
                <?php if(@$user_knowledge_quiz[0]->status!='enrolled'){ ?>
  
            <li ><a>Registration Start Date:<span style="color:#2008e8; font-weight:bold;"><?php echo date("d/m/Y", strtotime(@$sl->reg_start_date)); ?></span></a></li>
            <li><a>Registration End Date:<span style="color:#f41b1b; font-weight:bold;"><?php echo date("d/m/Y",strtotime(@$sl->reg_closing_date)); ?></span></a></li>

<?php } ?>
  						<li><a>Examination Date:<span style=" font-weight:bold;"><?php echo date("d/m/Y",strtotime(@$sl->exam_date)); ?></span></a></li>
  						<li><a>Examination Time:<span style=" font-weight:bold;"><?php echo @$sl->exam_time;$arr_tm=explode(":",$sl->exam_time);if(@$arr_tm[0]>=12){echo ' PM';}else{echo ' AM'; } ?></span></a></li>

<?php if(@$user_knowledge_quiz[0]->status!='enrolled'){ ?>

  						<li><a>Registration Fee( <i class="fa fa-inr" aria-hidden="true"></i> ):<span style="font-weight:bold;"><?php echo number_format(@$sl->exam_fees,2); ?></span></a></li>
  					</ul>	
      
        <?php } if(count(@$user_knowledge_quiz)==0){  ?>

            <a href="<?php echo $this->url->link(89).'/'.@$sl->set_slug; ?>" class="btn read-btn">Join</a>

           <?php }else{ ?>  

       <div id="before_exam" style="display: block"><h4>Your exam will start after </h4> <div id="timer_show_<?php echo @$sl->kq_id; ?>"></div></div>
            
 <div id="ready_to_big" style="display: none"> <a href="" class="btn read-btn">Ready To Start <i class="fa fa forward" ></i></a></div>
   

        <?php } ?>  



  				</div>

  			</div>
<?php }}else{echo 'Sorry!! No Test Availbale Now';} ?>

        <!-- <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="test-cnt">
            <h4>Knowledge Test</h4>
            <h6>Examination Name</h6>
                    <h6>Subject</h6>
        
              
        
                      <h5 class="mt-50">Examination Start After</h5>
        
                      <p id="timer1" class="time-counter"></p>
        
        
            <a href="<?php echo $this->url->link(89); ?>" class="btn read-btn">Join</a>
        
        
        
        
          </div>
        
        </div>
        
        
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="test-cnt">
            <h4>Knowledge Test</h4>
            <h6>Examination Name</h6>
                    <h6>Subject</h6>
        
              
        
           
        
        
            <a href="<?php echo $this->url->link(89); ?>" class="btn read-btn mt-50">Start Knowladge Test</a>
        
        
        
        
          </div>
        
        </div> -->

        
  			







  		</div>

  </div>
 </div>
</div>


<?php   if(count(@$user_knowledge_quiz)!=0){ ?>

<script>
var x = setInterval(function() {



var knowledge_id = '<?php echo $knowledge_id;?>';
var start_exam = '<?php echo $timer_end_date;?>';
var start_time = '<?php echo $timer_end_time;?>';

var res = knowledge_id.split(",");
  
var res1 = start_exam.split(",");
var res2 = start_time.split(",");


for(var i = 1; i < res.length; i ++)
{
// Update the count down every 1 second
  

  // Get todays date and time
  var now = new Date().getTime();
  var countDownDate = new Date(res1[i]).getTime();
  
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    // alert(distance);
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="timer_show"
  // alert(res[i]);
 
  // If the count down is over, write some text 
  if (distance < 0) {
   
    // document.getElementById("timer_show").innerHTML = "EXPIRED";
$("#before_exam").css("display", "none");
     $("#ready_to_big").css("display", "block");
  }
  else{

    // alert(res[i]);   alert(days);  alert(hours);   alert(minutes);  alert(seconds); alert(distance);  

     document.getElementById("timer_show_"+res[i]).innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
  }


   }
}, 1000);
</script>

<?php } ?>
