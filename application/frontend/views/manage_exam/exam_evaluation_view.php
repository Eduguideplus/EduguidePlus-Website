<html>

<head> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="icon" href="<?php echo base_url();?>assets/images/logo2small.png" type="image/png"/>
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/logo2small.png" type="image/png"/>
    <title>wbcsforum Evaluation</title>>
    <link href="<?php echo base_url();?>assets/css/testpage.css" rel="stylesheet" type="text/css"> 
    <link href="<?php echo base_url();?>assets/fonts_exam/flaticon.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/fonts_exam/stylesheet.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="<?php echo base_url();?>assets/js_exam/jquery-1.9.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--        <link href="css/woco-accordion.css" rel="stylesheet" type="text/css">-->
    <link href="<?php echo base_url();?>assets/css/responsive.css" rel="stylesheet" type="text/css">
    <!-- <link href="css/testpage.css" rel="stylesheet" type="text/css">  -->
    <link href="fonts/flaticon.css" rel="stylesheet" type="text/css">
    <!-- <link href="fonts/stylesheet.css" rel="stylesheet" type="text/css"> -->
   <!--  <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script> -->
    <!-- <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <!--        <link href="css/woco-accordion.css" rel="stylesheet" type="text/css">-->
    <link href="<?php echo base_url();?>assets/css/responsive.css" rel="stylesheet" type="text/css">
    <script src="<?php echo base_url();?>assets/js/jquery.js"></script>
<script src="js/jquery.simple.timer.js"></script>

</head>
<body>
    <header class="abcd">
        <div class="wrapper">
            <div class="inrhdr">

                <div class="ex-title text-center">
                <!-- <span class="logo"><img src="<?php if(@$exam_type[0]->icon!=''){echo base_url().'assets/uploads/company_logo/'.@$exam_type[0]->icon; }else{echo base_url().'assets/images/logo.png';}?>"></span> -->
                <span class="logo">
                   <!--  <img src="<?php echo base_url();?>assets/images/logo2.png"> --><!-- <h2><?php echo @$exam_type[0]->exam_name.' | '.@$st_name;?> </h2> -->
                   <h2><?php echo @$st_name;?> </h2>
                </span>
            </div>

                 <span class="profile">
                    <span class="profileimg"><img src="<?php if(@$user_details[0]->profile_photo!=''){echo base_url().'assets/uploads/user/'.@$user_details[0]->profile_photo; }else{echo base_url().'assets/images/profile.jpg';}?>"></span><span class="stdntnam"><?php echo @$user_details[0]->first_name; ?></span>

                </span>
                <span class="rytbtn" id="rightmenu">
                    <span class="line"></span>
                    <span class="line"></span>
                    <span class="line"></span>
                </span>
            </div>
            <!-- <h1 class="testname">Strategies for enhancement in food production</h1> -->
            <div class="Main Question"></div>
        </div>
        
    </header> 
    <!-- <div style=""> 
    <div class="subjinr">
     <span class="sbjctname">
     <i class="fa fa-clock-o fa-lg" aria-hidden="true"></i> :<?php echo $dur;?> Min
     </span>

     <span class="sbjctname">
     Total Marks :<?php echo $dur;?>
     </span>

     <span class="sbjctname">
     Your Score :<?php echo $dur;?>
     </span>
     </div>
     </div> -->
 
      <div class="lftpart ful-width ad-h">
         <h1 class="testname" style=" float: left;font-size: 18px;line-height: 34px; width: 77%;padding-left:20px;display:none">Strategies for enhancement in food production</h1>
         <div style="">



          <?php 
$section_list=array();

$i=0;
foreach(@$pattern as $pt){?>

            <a href="javascript:void(0)" onclick="get_section_question('<?php echo @$set_id[0]; ?>','<?php echo $pt->section_id; ?>','<?php echo @$user_exam; ?>')"><span class="subject subjecttab" id="">

            <div class="subjinr <?php if($i==0){echo 'active'; }?>" id="section<?php echo $pt->section_id; ?>">
            <span class="sbjcthdng">subject</span>
            <span class="sbjctname"><?php echo @$pt->section_name; ?></span>
            </div>
            </span></a>

<?php 
$section_list[$i]=$pt->section_id;
$i++; }$sec_ids=implode(",",$section_list); ?>

<input type="hidden" name="num_pattern" id="num_pattern" value="<?php echo $sec_ids; ?>">

            <span class="subject subjecttab shiftright" id="">

           <!--  <div class="subjinr" >
            <span class="sbjcthdng">subject</span>
            <span class="sbjctname bgorange"> | <i class="fa fa-clock-o fa-lg" aria-hidden="true"></i> :<?php echo $dur;?> Min |</span>
            </div> -->
            </span>
            <span class="subject subjecttab shiftright" id="">

          <!--   <div class="subjinr" >
            <span class="sbjcthdng">subject</span>
            <span class="sbjctname bgorange"> | Full Marks :<?php echo $full_marks;?> |</span>
            </div> -->
            </span>

            <span class="subject subjecttab shiftright" id="">

          <!--   <div class="subjinr" >
            <span class="sbjcthdng">subject</span>
            <span class="sbjctname bgorange"> | Your Score :<?php echo number_format(@$score,2);?> |</span>
            </div> -->
            </span>

       
</div>
<!--More than 4 subject-->
<span id="dropsubject" class="subject dropdown" style="display:none">
    <div id="subjin" class="subjinr">
        <span class="sbjcthdng">subject</span>
        <span class="sbjctname">Biology</span>
    </div>

    <div id="dropsubcntnt" class="dropdown-content" style="display:none">

        <div>
            <div class="frst_drop"><a href="javascript:void(0);">
                <div class="lft_blck">
                    <p>physics</p>
                    <div class="blocks">
                        <div class="inr_blck">
                            <div class="crcl"></div><span>10</span>
                        </div>
                        <div class="inr_blck">
                            <div class="crcl crcl1"></div><span>05</span>                                </div>
                            <div class="inr_blck">
                                <div class="crcl crcl2"></div><span>01</span>
                            </div>
                            <div class="inr_blck">
                                <div class="crcl crcl3"></div><span>00</span>
                            </div>
                        </div>
                    </div>
                    <div class="nmbr_blck">(20)</div>
                </a>

            </div>

            <div class="brdr_btm"></div>
            <div class="frst_drop"><a href="javascript:void(0);">
                <div class="lft_blck">
                    <p>chemistry</p>
                    <div class="blocks">
                        <div class="inr_blck">
                            <div class="crcl"></div><span>06</span>
                        </div>
                        <div class="inr_blck">
                            <div class="crcl crcl1"></div><span>08</span>
                        </div>
                        <div class="inr_blck">
                            <div class="crcl crcl2"></div><span>00</span>
                        </div>
                        <div class="inr_blck">
                            <div class="crcl crcl3"></div><span>00</span>
                        </div>
                    </div>
                </div>
                <div class="nmbr_blck">(20)</div>
            </a>

        </div>
        <div class="brdr_btm"></div>
        <div class="frst_drop"><a href="javascript:void(0);">
            <div class="lft_blck">
                <p>biology</p>
                <div class="blocks">
                    <div class="inr_blck">
                        <div class="crcl"></div><span>00</span>
                    </div>
                    <div class="inr_blck">
                        <div class="crcl crcl1"></div><span>01</span>
                    </div>
                    <div class="inr_blck">
                        <div class="crcl crcl2"></div><span>06</span>
                    </div>
                    <div class="inr_blck">
                        <div class="crcl crcl3"></div><span>00</span>
                    </div>
                </div>
            </div>
            <div class="nmbr_blck">(20)</div>
        </a>

    </div>
    <div class="brdr_btm"></div>
    <div class="frst_drop"><a href="javascript:void(0);">
        <div class="lft_blck">
            <p>history of anotomy</p>
            <div class="blocks">
                <div class="inr_blck">
                    <div class="crcl"></div><span>02</span>
                </div>
                <div class="inr_blck">
                    <div class="crcl crcl1"></div><span>01</span>
                </div>
                <div class="inr_blck">
                    <div class="crcl crcl2"></div><span>05</span>
                </div>
                <div class="inr_blck">
                    <div class="crcl crcl3"></div><span>00</span>
                </div>
            </div>
        </div>
        <div class="nmbr_blck">(20)</div>
    </a>

</div>
<div class="brdr_btm"></div>
<div class="frst_drop"><a href="javascript:void(0);">
    <div class="lft_blck">
        <p>history of biotechnology</p>
        <div class="blocks">
            <div class="inr_blck">
                <div class="crcl"></div><span>09</span>
            </div>
            <div class="inr_blck">
                <div class="crcl crcl1"></div><span>00</span>
            </div>
            <div class="inr_blck">
                <div class="crcl crcl2"></div><span>05</span>
            </div>
            <div class="inr_blck">
                <div class="crcl crcl3"></div><span>00</span>
            </div>
        </div>
    </div>
    <div class="nmbr_blck">(20)</div>
</a>

</div>
<div class="brdr_btm"></div>
<div class="frst_drop"><a href="javascript:void(0);">
    <div class="lft_blck">
        <p>history of modal organisms</p>
        <div class="blocks">
            <div class="inr_blck">
                <div class="crcl"></div><span>01</span>
            </div>
            <div class="inr_blck">
                <div class="crcl crcl1"></div><span>05</span>
            </div>
            <div class="inr_blck">
                <div class="crcl crcl2"></div><span>07</span>
            </div>
            <div class="inr_blck">
                <div class="crcl crcl3"></div><span>00</span>
            </div>
        </div>
    </div>
    <div class="nmbr_blck">(20)</div>
</a>
</div>
</div>
</div>

</span>
<!--more than 4 subject close-->
<!-- <div class="subject language" id="languagedrop">
    <div class="timer-quick" data-seconds-left="3600"></div>
</div> -->
</div>


    <div class="wrapper maindiv abc1 ad-g" id="place">
      
<?php 
$count=1;

foreach ($qstn as $qs){

     $exam_time=$this->common_model->common($table_name = 'tbl_exam_time', $field = array(), $where = array('exam_id'=>@$examid), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
      $negative_marks=$qs->marks*@$exam_time[0]->negative_marks/100;

    ?>

<div class="inrmain abc">

    <div class="leftmain ful-width">
        <div class="quehdng">
            <span class="quehdnglft">Question.<?php echo $count; ?></span>
            <span class="quehdngryt">
                <span class="markdef">Maximum Mark. <span class="green"><?php echo number_format(@$qs->marks,2);?></span></span>
                <span class="markdef">Negative Mark. <span class="green red"><?php echo @$negative_marks; ?></span></span>
                <!-- <span class="markdef"><span class="triangle"></span>Report</span> -->
            </span>
        </div>
        <!--normal que Single choice-->
        <div id="about" class="nano questionoutr ful-width abc" style="display:block">
            <div class="nano-content abc">


                <div class="questioninr">
                    <div class="eve-qust">
                   <?php echo @$qs->question; ?>

               </div>

                    <div class="optninr">



                     <?php 

                    $q_id= @$qs->question_id;
                    $user_exam_id=$this->uri->segment(2);

                    $answr=$this->common_model->common($table_name = 'tbl_question_choice', $field = array(), $where = array('que_id'=>$q_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

                    $selected_answr=$this->common_model->common($table_name = 'tbl_user_exam_details', $field = array(), $where = array('question_master_id'=>@$q_id,'user_exam_id'=>@$user_exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
                    $selected_choice=@$selected_answr[0]->selected_choice;
                    $correct_choice=@$selected_answr[0]->correct_choice;

                    $alphas = range('A', 'Z');
                   for($a=0;$a<count(@$answr);$a++){

                    ?>





                     <input id="radio<?php if($a>0){ echo $a; }?>" class="radiobtn" name="radio" type="radio" value="<?php echo $a+1; ?>">
                        <label class="option <?php if(@$answr[$a]->id==@$selected_choice){if(@$correct_choice==@$answr[$a]->id){echo 'right-test';}else{ echo 'wrong-test'; }}?>" for="radio<?php if($a>0){ echo $a; }?>"<?php if($a>0){ echo $a; }?>>
                            <div class="optncrcl"><span class="optnvalue <?php if(@$answr[$a]->id==@$selected_choice){if(@$correct_choice==@$answr[$a]->id){echo 'right-test-value';}else{ echo 'wrong-test-value'; }}?>"><?php echo $alphas[$a]; ?></span></div>
                            <span class="optncntnt"><?php echo @$answr[$a]->choice; ?> </span>
                        </label>

                        <!--<input id="radio" class="radiobtn" name="radio" type="radio">
                        <label class="option right-test" for="radio">
                            <div class="optncrcl"><span class="optnvalue right-test-value">A</span></div>
                            <span class="optncntnt right-test-ans">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. </span>
                        </label>
                        <input id="radio1" class="radiobtn" name="radio" type="radio">
                        <label class="option wrong-test" for="radio1">
                            <div class="optncrcl"><span class="optnvalue wrong-test-value">B</span></div>
                            <span class="optncntnt wrong-test-ans">em.Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. ibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pell</span>
                        </label>
                       <input id="radio2" class="radiobtn" name="radio" type="radio">
                        <label class="option" for="radio2">
                            <div class="optncrcl"><span class="optnvalue">C</span></div>
                            <span class="optncntnt">cies nec, pellentesque eu, pretium quis, sem.Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. ibus et magnis dis parturient montes,</span>
                        </label>
                        <input id="radio3" class="radiobtn" name="radio" type="radio">
                        <label class="option" for="radio3">
                            <div class="optncrcl"><span class="optnvalue">D</span></div>
                            <span class="optncntnt">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. </span>
                        </label>-->

                        <?php } ?>




                    </div>
                </div>

                
                <a class="arrow_slide2 test-view" href="javascript:void(0);" onclick="answer_show_hide('<?php echo @$qs->id; ?>')">VIEW ANSWER</a>
    
  <div class="ans-bx" id="ans_box_<?php echo @$qs->id; ?>"><?php for($i=0;$i<count($answr);$i++)
  {
    if(@$answr[$i]->is_correct== 'Yes')
        {
            echo '<span class="optnvalue">'.@$alphas[$i].'</span>  ' .@$answr[$i]->choice;


        }

  }
  ?>

  

   </div>
<div class="exp-box" id="exp_box_<?php echo @$qs->id; ?>" style="display: none;">
      <h3>Explanation :</h3>
      <p><?php echo @$qs->explanation; ?></p>
  </div>

  <div class="chckbx_ques">




            </div>

        </div>

</div>







</div>

</div>


<?php $count++; } ?>





















<div id="gettouchform" class="getin_touchpop" style="display: none;">
  <div id="gtformhid" class="contact_form pop_show"> <!--<span class="popclose sprite" onclick="gettouch_hide()"></span>-->
    <div class="getpophdr">
      <h1 id="head">Title</h1>
  </div>
  <div class="rgt_pg_cnct">
    Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. ibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
    <div style="margin-top:15px;"><a href="javascript:void(0);"onclick="gettouch_hide()" class="submitbtn popupbtn">Done</a></div></div>
</div>
</div>


<script src="js/scrollbar.js" type="text/javascript"></script>

<style>
.jst-hours {
  float: left;
}
.jst-minutes {
  float: left;
}
.jst-seconds {
  float: left;
}
.jst-clearDiv {
  clear: both;
}
.jst-timeout {
  color: red;
}

.timer-quick {
    font-size: 19px;
    margin-top: 5px;
    color: black;
    font-weight: bold;
}

</style>
<script>

 $(document).ready(function(){ 
    $("#dropsubject").click(function(){
        $("#dropsubcntnt").toggle();
        $("#subjin").toggleClass("activedrop");

    }); 
    $("#languagedrop").click(function(){
        $("#languagecntnt").toggle();
        $("#langin").toggleClass("activedrop");

    }); 
    $("#rightmenu").click(function(){
        $("#rightpart").toggle();
    });

    $("#accordion").accordion({heightStyle: "content"});
    $(".nano").nanoScroller();

});
</script>

<script>
$(function(){

    $('.timer-quick').startTimer();

    $('.timer').startTimer({
      onComplete: function(){
        console.log('Complete');
      }
    });

    $('.timer-pause').startTimer({
      onComplete: function(){
        console.log('Complete');
      },
      allowPause: true
    });
})
</script>
<script>
   /* $(".test-view").click(function(){
    $(".ans-bx").show();
});*/

function answer_show_hide(q_id)
{
    $("#ans_box_"+q_id).toggle(); 
     $("#exp_box_"+q_id).toggle();

}



</script>



<script>
function get_section_question(set_id,section_id,user_exam)
{
    var sections=$("#num_pattern").val();
    var sec_array = sections.split(',');
    var base_url='<?php echo base_url(); ?>';
                //alert(sections);
                  $.ajax(

                {

                type: "POST",

                dataType: 'html',

                url:base_url+'index.php/manage_exam/get_all_question_by_section',
                data:{set:set_id,section:section_id,u_exam:user_exam},
                async: false,

                success: function (data) {
                            //alert(data);
                            $("#place").html(data);
                            for(var i=0;i<sec_array.length;i++)
                            { 
                                //alert(sec_array[i]);
                                if(sec_array[i]==section_id)
                                {
                                     $("#section"+sec_array[i]).addClass('active');
                                }
                                else
                                {
                                    $("#section"+sec_array[i]).removeClass('active');
                                }
                            }

                            var e_id=$("#hid_e").val();
                            var s_id=$("#hid_s").val();
                            var se_id=$("#hid_se").val();
                            var q_id=$("#hid_q").val();
                            var node='save_get_next_question('+e_id+','+s_id+','+se_id+','+q_id+')';
                            $('#save').attr('onclick', node);
                           
                          
                            
                              }
                         });


}
</script>


<script src="js/jquery-ui.js"></script>
</body>


</html>

