<?php
$min_val=4;
$sec_val=15;
//$min_val=@$dur-1;
//$sec_val=60;
?>


<html>

<head> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <link rel="icon" href="<?php echo base_url();?>assets/images/logo2small.png" type="image/png"/>
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/logo2small.png" type="image/png"/>
    <link href="<?php echo base_url();?>assets/css/testpage.css" rel="stylesheet" type="text/css"> 
    <link href="<?php echo base_url();?>assets/fonts_exam/flaticon.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/fonts_exam/stylesheet.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="<?php echo base_url();?>assets/js_exam/jquery-1.9.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--        <link href="css/woco-accordion.css" rel="stylesheet" type="text/css">-->
    <link href="<?php echo base_url();?>assets/css/responsive.css" rel="stylesheet" type="text/css">
<style>

    #overlay { 
    position:absolute;
    z-index:10;
    width:100%;
    height:100%;
    top:0;
    left:0;
    background-color:#f00;
    filter:alpha(opacity=10);
    -moz-opacity:0.1;
    opacity:0.1;
    cursor:pointer;

} 
.text-danger{
	color: red;
	font-size: 18px;
	margin-bottom: 10px
}

.dialog {
    position: absolute;
    border: 2px solid #3366CC;
    width: 350px;
    height: 250px;
    background-color: #ffffff;
    z-index: 12;
    margin: 0px auto;
    text-align: center;
    left: 0px !important;
    right: 0px;
}

.btn {
    display: inline-block;
    padding: 6px 12px;
    margin-bottom: 0;
    font-size: 14px;
    font-weight: 400;
    line-height: 1.42857143;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -ms-touch-action: manipulation;
    touch-action: manipulation;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-image: none;
    border: 1px solid transparent;
    border-radius: 4px;
}

.btn-danger{
	background: #32cd32;
	color: white;
	margin-top: 12px;
}

</style>
    <script src="<?php echo base_url();?>assets/js_exam/jquery.js"></script>
<script src="<?php echo base_url();?>assets/js_exam/jquery.simple.timer.js"></script>

<script type="text/javascript">
   /*window.addEventListener("beforeunload", function (e) {
    var confirmationMessage = 'It looks like you have been editing something. '
                            + 'If you leave before saving, your changes will be lost.';

    (e || window.event).returnValue = confirmationMessage; //Gecko + IE
    return confirmationMessage; //Gecko + Webkit, Safari, Chrome etc.
});*/
//-----------To Disable ctrl+f5 and f5 key press-------------------------//
  function disableF5(e) { if ((e.which || e.keyCode) == 116 || (e.which || e.keyCode) == 82) e.preventDefault(); };

$(document).ready(function(){
$(document).on("keydown", disableF5);
});

//--------------------------End -------------------------------------//
</script>


<script type="text/javascript">
$(document).ready(function() { init() })

/*function init() {
    $('#overlay').click(function() { closeDialog(); })
}*/

function openDialog(element) {
    //this is the general dialog handler.
    //pass the element name and this will copy
    //the contents of the element to the dialog box

    $('#overlay').css('height', $(document.body).height() + 'px')
    $('#overlay').show()
    $('#dialog').html($(element).html())
    centerMe('#dialog')
    $('#dialog').show();
}

function closeDialog() {
    $('#overlay').hide();
    $('#dialog').hide().html('');
}

function centerMe(element) {
    //pass element name to be centered on screen
    var pWidth = $(window).width();
    var pTop = $(window).scrollTop()
    var eWidth = $(element).width()
    var height = $(element).height()
    $(element).css('top', '130px')
    //$(element).css('top',pTop+100+'px')
    $(element).css('left', parseInt((pWidth / 2) - (eWidth / 2)) + 'px')
}


</script>

</head>
<body>

    <header>
        <div class="wrapper">
            <div class="inrhdr">
                <span class="logo"><img src="<?php if(@$exam_type[0]->icon!=''){echo base_url().'assets/uploads/company_logo/'.@$exam_type[0]->icon; }else{echo base_url().'assets/images/logo.png';}?>"></span>
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

    
    <div class="wrapper maindiv">
        <div class="lftpart ">
         <h1 class="testname" style=" float: left;font-size: 18px;line-height: 34px; width: 77%;padding-left:20px;display:none">Strategies for enhancement in food production</h1>
         <div style="">

<?php 
$section_list=array();

$i=0;
foreach(@$pattern as $pt){?>

            <a href="javascript:void(0)" onclick="get_section_question('<?php echo @$set_id[0]; ?>','<?php echo $pt->section_id; ?>')"><span class="subject subjecttab" id="">

            <div class="subjinr <?php if($i==0){echo 'active'; }?>" id="section<?php echo $pt->section_id; ?>">
            <span class="sbjcthdng">subject</span>
            <span class="sbjctname"><?php echo @$pt->section_name; ?></span>
            </div>
            </span></a>

<?php 
$section_list[$i]=$pt->section_id;
$i++; }$sec_ids=implode(",",$section_list); ?>
<input type="hidden" name="num_pattern" id="num_pattern" value="<?php echo $sec_ids; ?>">
<!-- <div id="attempt_hid">
<input type="hidden" id="hid_attempt" name="hid_attempt" value="">
</div>
<div id="review_hid">
<input type="hidden" id="hid_review" name="hid_review" value="">
</div> -->
        <!-- <span class="subject dropdown subjecttab" id="">

         <div class="subjinr" id=""><span class="sbjcthdng">subject</span>
            <span class="sbjctname">Chemistry</span>
        </div>


    </span>
    <span class="subject dropdown subjecttab" id="">

     <div class="subjinr" id=""><span class="sbjcthdng">subject</span>
        <span class="sbjctname">General Knowledge</span>
    </div>


</span>
<span class="subject dropdown subjecttab" id="">

 <div class="subjinr" id=""><span class="sbjcthdng">subject</span>
    <span class="sbjctname">English</span>
</div>


</span> -->
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
<div class="subject language" id="languagedrop">
    <div class="timer-quick" data-seconds-left="3600"></div>
    <!-- <p id="demo" class="timer-quick"></p> -->
    <div id="timer" class="timer-quick"><?php echo @$dur;?></div>
    <input type="hidden" name="hid_duration" id="hid_duration" value="<?php echo @$dur;?>">

      <input type="hidden" name="hid_minute" id="hid_minute" value="<?php echo $min_val; ?>">
      <input type="hidden" name="hid_second" id="hid_second" value="<?php echo $sec_val; ?>">
</div>
</div>


<div class="inrmain">

    <div class="leftmain" id="place">

        <div class="quehdng">
            <span class="quehdnglft">Question.1</span>
            <span class="quehdngryt">
                <span class="markdef">Maximum Mark. <span class="green"><?php echo number_format((float)@$qstn[0]->marks, 2, '.', '');?></span></span>
                <span class="markdef">Negative Mark. <span class="green red"><?php if($negative_marks!=''){echo number_format((float)@$negative_marks, 2, '.', '');}else{ echo '0'; }?></span></span>
                <span class="markdef"><span class="triangle"></span>Report</span>
            </span>
        </div>
        <!--normal que Single choice-->
        <div id="about" class="nano questionoutr" style="display:block">
            <div class="nano-content">


                <div class="questioninr">
                    <?php echo $qstn[0]->question;?>

                    <div class="optninr">
                    <?php 

                    $q_id= @$qstn[0]->question_id;

                    $answr=$this->common_model->common($table_name = 'tbl_question_choice', $field = array(), $where = array('que_id'=>$q_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

                    $alphas = range('A', 'Z');
                   for($a=0;$a<count(@$answr);$a++){

                    ?>

                        <input id="radio<?php if($a>0){ echo $a; }?>" class="radiobtn" name="radio" type="radio" value="<?php echo $a+1; ?>">
                        <label class="option" for="radio<?php if($a>0){ echo $a; }?>"<?php if($a>0){ echo $a; }?>>
                            <div class="optncrcl"><span class="optnvalue"><?php echo $alphas[$a]; ?></span></div>
                            <span class="optncntnt"><?php echo @$answr[$a]->choice; ?> </span>
                        </label>

<?php } ?>

                        <!-- <input id="radio1" class="radiobtn" name="radio" type="radio">
                        <label class="option" for="radio1">
                            <div class="optncrcl"><span class="optnvalue">B</span></div>
                            <span class="optncntnt">em.Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. ibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pell</span>
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
                        </label> -->
                    </div>
                </div>
            </div>

        </div>




</div>
<!--Match making simple-->



<div class="footrlft">
    <!-- <a class="arrow_slide" href="javascript:void(0);"><span class="angle1"></span></a> -->
    <a class="arrow_slide2" id="save" href="javascript:void(0);" onclick="save_get_next_question('<?php echo @$exam; ?>','<?php echo @$set_id; ?>','<?php echo @$qstn[0]->section_id;?>','<?php echo  @$q_id; ?>')">SAVE & NEXT &nbsp;<span class="angle2"></span></a>
    <div class="chckbx_ques instr">
      <!--   <a href="javascript:void(0)" class="info" onclick="show1();">

          <i class="fa fa-info-circle" aria-hidden="true"></i> Instruction
      </a> -->
  </div>
  <div class="chckbx_ques">

    <input type="checkbox" id="check1" name="check1" value="1"><label class="chckbx" for="check1">Review your question</label></div>


</div>
</div>

<div class="rightpart" id="rightpart">
  <div id="about" class="nano rightmain">
    <div class="nano-content">
        <div id="accordion">


        <?php 

foreach(@$pattern as $pt){

    if($pt->section_id!=3)
    {
        $exm_qstn=$this->join_model->get_question_of_section($set_id[0],$pt->section_id);
        ?>
        <h3 class="acrdnhdr"><?php echo $pt->section_name; ?></h3>
            <div>
                <div style="display:inline-block;width:100%">
                    <ul>
                    <?php 
                    $qs_count=0;
                    for($i=1;$i<=$pt->quantity;$i++)
                    {
                        $qs_id=@$exm_qstn[$qs_count]->question_id;
                    ?>
                        <a href="javascript:void(0)" onclick="get_single_question('<?php echo @$qs_id; ?>','<?php echo $pt->section_id; ?>','<?php echo $i;?>','<?php echo $set_id[0];?>')"><li class="questionnumb unattempted" id="q_<?php echo @$qs_id; ?>"><?php echo $i;?></li></a>

                    <?php $qs_count++; }?>
                        <!--<li class="questionnumb unattempted"></li>
                        <li class="questionnumb skip">2</li>
                        <li class="questionnumb attempted">3</li>
                        <li class="questionnumb review">4</li>
                        <li class="questionnumb ">5</li>
                        <li class="questionnumb ">6</li>
                        <li class="questionnumb ">7</li>
                        <li class="questionnumb review">8</li>-->
                    </ul> 
   <?php
    }
    else
    {
        $passage=$this->join_model->get_passage($set_id[0]);
        $exm_qstn=$this->join_model->get_passage_questions_all($set_id[0],$pt->section_id);

        
        /*echo '<pre>';
        print_r($qstn);*/

        ?>

         <h3 class="acrdnhdr"><?php echo $pt->section_name; ?></h3>
            <div>
                <div style="display:inline-block;width:100%">
                    <ul>
                    <?php 
                    $qs_count=0;
                    for($i=1;$i<=$pt->quantity;$i++)
                    {
                        $qs_id=@$exm_qstn[$qs_count]->id;
                        $psg_id=@$exm_qstn[$qs_count]->passage_id;
                    ?>
                        <a href="javascript:void(0)" onclick="get_single_passage_question('<?php echo @$qs_id; ?>','<?php echo $pt->section_id; ?>','<?php echo $i;?>','<?php echo @$psg_id; ?>','<?php echo $set_id[0];?>')"><li class="questionnumb unattempted" id="q_<?php echo @$qs_id; ?>"><?php echo $i;?></li></a>

                    <?php $qs_count++; }?>
                        <!--<li class="questionnumb unattempted"></li>
                        <li class="questionnumb skip">2</li>
                        <li class="questionnumb attempted">3</li>
                        <li class="questionnumb review">4</li>
                        <li class="questionnumb ">5</li>
                        <li class="questionnumb ">6</li>
                        <li class="questionnumb ">7</li>
                        <li class="questionnumb review">8</li>-->
                    </ul>    
   <?php } ?>


    
           
                    
                </div>
            </div>

<?php } ?>


           <!--  <h3 class="acrdnhdr">Chemistry</h3>
            <div>
                <div style="display:inline-block;width:100%">
                    <ul>
                        <li class="questionnumb unattempted">1</li>
                        <li class="questionnumb skip">2</li>
                        <li class="questionnumb attempted">3</li>
                        <li class="questionnumb review">4</li>
                        <li class="questionnumb attempted">5</li>
                        <li class="questionnumb attempted">6</li>
                        <li class="questionnumb attempted">7</li>
                        <li class="questionnumb review">8</li>
                        <li class="questionnumb review">9</li>
                        <li class="questionnumb review">10</li>
                    </ul>  
                </div>
            </div> -->
        </div>
    </div>

</div>


<div class="submit">
    <ul>
        <li><span class="crcl"></span>Attempted</li>
        <li><span class="crcl crcl1" style="background:#70BF6B;"></span>Unattempted</li>
        <li><span class="crcl crcl2"></span>Review</li>
        <!-- <li><span class="crcl crcl3"></span>Skip</li> -->
    </ul>
    <a href="javascript:void(0);" class="submitbtn">Submit test</a>
</div>
</div>
</div>

</div>
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





<!-- Modal -->
<div id="examover" class="modal fade"  role="dialog" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
        <h4 class="modal-title text-center" style="color:red;">Time has been expired!!</h4>
      </div>
      <div class="modal-body">
        
        <p><b class="text-center">Click "Submit Now" button to complete your examination.</b></p>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-default" onclick="go_to_result('<?php echo $setid;?>','<?php echo $examid;?>')">Submit Now</button> -->
      </div>
    </div>

  </div>
</div>



<!-- <a href="javascript:;//close me" onclick="openDialog($('#content'))">show dialog A</a> -->

<!-- <a href="javascript:;//close me" onclick="openDialog($('#contentB'))">show dialog B</a> -->

<div id="dialog" class="dialog text-center" style="display:none" data-backdrop="static" data-keyboard="false"></div>
<div id="overlay" style="display:none"></div>
<div id="content" style="display:none">
<span class=""><img src="<?php echo base_url();?>assets/images/time_expire.jpg" width="100px" height="100px"></span>
  <p class="text-center text-danger"><b> OOPS!! Time has been Expired. </b></p>
  <p class="text-center">Click 'OK' to complete your examination</p>
  <button class="text-center btn btn-danger" id="exam_score">OK</button>
</div>

<div id="contentB" style="display:none">
    Moooo mooo moo moo moo!!! 
</div>







<script src="<?php base_url();?>assets/js_exam/scrollbar.js" type="text/javascript"></script>

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

<script src="<?php base_url();?>assets/js_exam/jquery-ui.js"></script>

<script>
function get_section_question(set_id,section_id)
{
    var sections=$("#num_pattern").val();
    var sec_array = sections.split(',');
    var base_url='<?php echo base_url(); ?>';
                //alert(sections);
                  $.ajax(

                {

                type: "POST",

                dataType: 'html',

                url:base_url+'index.php/manage_exam/get_question_by_section',
                data:{set:set_id,section:section_id},
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

<script>
function get_single_question(question_id,section_id,question_no,set_id)
{
    var sections=$("#num_pattern").val();
    var sec_array = sections.split(',');
     var base_url='<?php echo base_url(); ?>';
                //alert(question_id);
                  $.ajax(

                {

                type: "POST",

                dataType: 'html',

                url:base_url+'index.php/manage_exam/get_single_question',
                data:{q_id:question_id,q_no:question_no,s_id:set_id},
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
<script>
function get_single_passage_question(question_id,section_id,question_no,passage_id,set_id)
{

    var sections=$("#num_pattern").val();
    var sec_array = sections.split(',');
     var base_url='<?php echo base_url(); ?>';
                //alert(question_id);
                  $.ajax(

                {

                type: "POST",

                dataType: 'html',

                url:base_url+'index.php/manage_exam/get_single_passage_question',
                data:{q_id:question_id,q_no:question_no,p_id:passage_id,s_id:set_id},
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


<script>
//window.onbeforeunload = function() { return "You work will be lost."; };
</script>

<!-- <script>
// Set the date we're counting down to
var countDownDate = new Date("Jan 5, 2018 15:37:25").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

    // Get todays date and time
    var now = new Date().getTime();

    // Find the distance between now an the count down date
    var distance = countDownDate - now;
    //alert(now);
    
    // Time calculations for days, hours, minutes and seconds
    //var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    //var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
    // Output the result in an element with id="demo"
    document.getElementById("demo").innerHTML = minutes + ": " + seconds;
    
    // If the count down is over, write some text 
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "EXPIRED";
    }
}, 1000);
</script> -->
 <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-1.9.1.min.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>

 <script type="text/javascript">


var exam_id='<?php echo $user_exam; ?>';

var minute=parseInt($("#hid_minute").val());
var second=parseInt($("#hid_second").val());
var set='<?php echo @$set_id; ?>'
var timeoutHandle;
//alert(minute);
//alert(second);
function countdown(minute,second) {
   
    var seconds = parseInt(second);
    var mins = parseInt(minute);
    function tick() {
        var counter = document.getElementById("timer");
        var current_minutes = mins
        seconds--;

        counter.innerHTML =
        (current_minutes < 10 ? "0" : "")+current_minutes.toString() + ":" + (seconds < 10 ? "0" : "") + String(seconds);
 
      

   var base_url='<?php echo base_url(); ?>';

     $.ajax(

                {

                type: "POST",

                dataType: 'json',

                url:base_url+'index.php/manage_exam/set_timer_update',
                data:{min:mins, sec:seconds, setid:set, exmid:exam_id},
                async: false,

                success: function (data) {
                    var perform= data.workdone;
                            //alert(perform['status']);
                           
                            
                              }
                         });
        

        if( seconds > 0 )
         {
            timeoutHandle=setTimeout(tick, 1000);
        } 
        else 
        {

            if(mins > 1)
            {
                seconds=60;
                //mint=mins-1;
               // countdown(mins-1);   never reach “00″ issue solved:Contributed by Victor Streithorst
               
               setTimeout(function () { countdown(mins-1,second); }, 1000);

            }
            else
            {
                if(mins==1)
                {
                    setTimeout(function () { countdown(mins-1,60); }, 1000);
                }
                if(mins==0)
                {
                	//ert('ok');
                    //$("#examover").modal('show');
                    openDialog($('#content'));
                    var node='go_to_result('+exam_id+','+set+')';
                     $('#exam_score').attr('onclick', node);

                    var endtm='<?php echo date("Y-m-d H:i:s");?>';

                        $.ajax(

                        {

                        type: "POST",

                        dataType: 'json',

                        url:base_url+'index.php/manage_exam/complete_examination',
                        data:{min:mins,sec:seconds,setid:set,exmid:exam_id,endtime:endtm},
                        async: false,

                        success: function (data) {
                            
                            var perform= data.workdone;
                                    //alert(perform['status']);
                                    if(perform['status']==1)
                                    {
                                        
                                        

                                    }
                                   
                                    
                                      }
                        });
                }
                
                

                    

            }
                
                
            }
        }
   
    tick();
}

countdown(minute,second);

</script> 

<script>
function save_get_next_question(exam_id,set_id,section_id,question_id)
{
        //var attempt_list=$("#hid_attempt").val();
        //var review_list=$("#hid_review").val();
        var review='';
        var answer_no='';
        if ($('#check1').is(":checked"))
        {
            var review=$('#check1').val();
      
        }
        //alert(review);
         if($("input[name='radio']").is(':checked')) 
            { 
               var answer_no = $("input[name='radio']:checked").val();
            }
        
        //alert(answer_no);

    var sections=$("#num_pattern").val();
    var sec_array = sections.split(',');
     var base_url='<?php echo base_url(); ?>';
                //alert(question_id);
                  $.ajax(

                {

                type: "POST",

                dataType: 'html',

                url:base_url+'index.php/manage_exam/save_next_question',
                data:{e_id:exam_id, s_id:set_id, se_id:section_id, q_id:question_id,rvw:
                    review,answ:answer_no},
                async: false,

                success: function (data) {
                            //alert(data);
                            $("#place").html(data);
                            var section_id=$("#hid_se").val();
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

                            var attempted=$("#hid_attempt").val();
                            var reviewed=$("#hid_review").val();
                            //alert(reviewed);
                            $('input[name="check1"]').prop('checked', false);
                            var attempted_arr = attempted.split(',');
                            var reviewed_arr = reviewed.split(',');
                            

                                for(var q=0;q<attempted_arr.length;q++)
                                {
                                    $("#q_"+attempted_arr[q]).removeClass('unattempted');
                                    $("#q_"+attempted_arr[q]).removeClass('review');
                                    $("#q_"+attempted_arr[q]).addClass('attempted');
                                }
                            

                              for(var q=0;q<reviewed_arr.length;q++)
                                {
                                    $("#q_"+reviewed_arr[q]).removeClass('unattempted');
                                    $("#q_"+reviewed_arr[q]).removeClass('attempted');
                                    $("#q_"+reviewed_arr[q]).addClass('review');
                                }   
                            
                            
                              }
                         });



}
</script>


<script>

/*function shuffle(array) {
  var currentIndex = array.length, temporaryValue, randomIndex;

  // While there remain elements to shuffle...
  while (0 !== currentIndex) {

    // Pick a remaining element...
    randomIndex = Math.floor(Math.random() * currentIndex);
    currentIndex -= 1;

    // And swap it with the current element.
    temporaryValue = array[currentIndex];
    array[currentIndex] = array[randomIndex];
    array[randomIndex] = temporaryValue;
  }

  return array;
}*/

function go_to_result(user_exam,set_id)
{
	alert('ok');
	
	var base_url='<?php echo base_url(); ?>';
	$.ajax(

                        {

                        type: "POST",

                        dataType: 'json',

                        url:base_url+'index.php/manage_exam/get_score_link',
                        data:{uexam:user_exam,set:set_id},
                        async: false,

                        success: function (data) {
                            
                            var perform= data.workdone;
                                    //alert(perform['status']);
                                    if(perform['status']==1)
                                    {
                                    	alert(perform['score_ready']);
                                    	var lnk=perform['score_ready']
									    var scorewindow;
									    scorewindow=window.open('<?php echo $this->url->link(60);?>/'+lnk, 'MyTest', 'width=900,height=750,directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=no');

									    /*closeDialog($('#content'));
										close();*/
                                        
                                        

                                    }
                                   
                                    
                                      }
                        });


	
}
</script>



</body>


</html>

