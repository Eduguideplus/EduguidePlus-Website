



<?php

/*$min_val=29;

$sec_val=60;

$dur=30;*/

$min_val=@$dur-1;

$sec_val=60;

$user_id=$this->session->userdata('activeuser');?>





<html>



<head> 

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">

    <link href="<?php echo base_url();?>assets/css/testpage.css" rel="stylesheet" type="text/css"> 

    <link href="<?php echo base_url();?>assets/fonts_exam/flaticon.css" rel="stylesheet" type="text/css">

    <link href="<?php echo base_url();?>assets/css/responsive.css" rel="stylesheet">

    <link href="<?php echo base_url();?>assets/fonts_exam/stylesheet.css" rel="stylesheet" type="text/css">

    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet" type="text/css">

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









</style>





<style>

.box

{

    width:400px;

    height:55px;

    line-height: 57px;

    color:#fff;

    float:left;

    text-decoration:none;

    text-align:center;

}



.box:hover {

    background:#007FEB;

}



.container_element

{ 

    white-space:nowrap;

    width:400px;

    margin-left: 10px;

    overflow-x:hidden;

    display:inline-block;

    overflow-y:hidden;

}



.inner_container

{

    width:10000px;

}



#lefty,#righty {

    width: 35px;

    display: inline-block;

    height: 57px;

    text-align: center;

    color: #fff;

    line-height: 57px;

    cursor: pointer;

    font-size: 24px;

}



#lefty {

    float:left;

}



#righty {

    float:right;

}



nav#sub {

  background: #004173;

  background: linear-gradient(to bottom, #004173 0%,#014f8d 100%);

  background: -moz-linear-gradient(top, #004173 0%, #014f8d 100%);

  background: -ms-linear-gradient(top, #004173 0%,#014f8d 100%);

  background: -o-linear-gradient(top, #004173 0%,#014f8d 100%);

  background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#004173), color-stop(100%,#014f8d));

  background: -webkit-linear-gradient(top, #004173 0%,#014f8d 100%);

  border-bottom: #00325a solid 3px;

  box-shadow: 0 4px 6px 0 #BFBFBF;

  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#004173', endColorstr='#014f8d',GradientType=0 );

  webkit-box-shadow: 0 4px 6px 0 #BFBFBF;

}

</style>

    <script src="<?php echo base_url();?>assets/js_exam/jquery.js"></script>

<script src="<?php echo base_url();?>assets/js_exam/jquery.simple.timer.js"></script>



<script type="text/javascript">

//   window.addEventListener("beforeunload", function (e) {

//     var confirmationMessage = 'It looks like you have been editing something. '

//                             + 'If you leave before saving, your changes will be lost.';



//     (e || window.event).returnValue = confirmationMessage; //Gecko + IE

//     return confirmationMessage; //Gecko + Webkit, Safari, Chrome etc.

// });

//-----------To Disable ctrl+f5 and f5 key press-------------------------//

  function disableF5(e) { if ((e.which || e.keyCode) == 116 || (e.which || e.keyCode) == 82 ||(e.which || e.keyCode) == 27 || event.altKey) e.preventDefault(); };





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



<style type="text/css">.ex-title{

    width: 80%;

    float: left;

    background: #000000c9

;

font-size:18px;

color:#fff;

padding:10px;

text-align:center;

}</style>



</head>

<body  style="height: 100%; width:100%; position: fixed; resize:none; " class="exam_body"  >

<?php

  $subject_name=$this->common_model->common($table_name = 'tbl_question_section', $field = array(), $where = array('id'=>@$subject_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

 $chapter_name=$this->common_model->common($table_name = 'tbl_chapters', $field = array(), $where = array('sub_id'=>@$subject_id,'chap_id'=>@$chapter_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');





 $exam_name=$this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>@$exam), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = ''); ?>

    <header class="testpageheader">

        <div class="wrapper">

            <div class="inrhdr">

              <span class="logo"><img src="<?php echo base_url().'assets/images/admin-logo.png';?>"></span> 

                <span class="time-left">

                    <ul>

                        

                        <li><!-- <strong>Subject:</strong> <?php echo @$subject_name[0]->section_name; ?> -->
                            <strong>Subject:</strong> <?php echo @$subject_name[0]->section_name; ?> ( <?php echo @$exam_name[0]->exam_name; ?> )
                        </li>



                        <!-- <?php if(@$set_dtls[0]->test_type==5 || @$set_dtls[0]->test_type==6){ ?>

                           <li><strong>Chapter:</strong> <?php echo @$chapter_name[0]->chap_name; ?></li> <?php } ?> -->



                 <li class="set-cus"><strong>Set Code:</strong> <?php echo $set_dtls[0]->set_code; ?></li>

                 <li><strong>Full Marks:</strong> <?php echo round(@$set_dtls[0]->total_marks); ?></li>

                <li><strong>Duration:</strong> <?php echo gmdate('H:i:s', @$dur);?> </li>

               <li> <strong> Remaining Time :</strong> <span id="timer"> <?php echo gmdate('H:i:s', @$dur);?></span > </li> 

                    </ul>    

                </span> 

                <input type="hidden" id="actualtime" value="<?php echo @$dur;?>">



                 <input type="hidden" id="first_qstn_id" value="<?php echo $first_qstn_id;?>">



               <!-- <div class="ex-title text-center">

                    <h2><?php echo @$st_name;?></h2>

               </div> -->

                <span class="profile">
                    <ul>
                        <li class="img_tx_al">
                            <span class="profileimg"><img src="<?php if(@$user_details[0]->profile_photo!=''){echo base_url().'assets/uploads/student_pic/'.@$user_details[0]->profile_photo; }else{echo base_url().'assets/images/profile.jpg';}?>">
                           </span>
                        </li>
                        <li>
                            <span class="stdntnam"><?php echo @$user_details[0]->user_name; ?></span>
                        </li>
                        <li>
                            <span><?php echo date('jS M Y'); ?> 
                            </span> 
                        </li>
                    </ul>

                
<!--                     <span><?php echo $set_dtls[0]->set_code; ?></span> 

 -->                



                </span>

                <span class="rytbtn" id="rightmenu">

                    <span class="line"></span>

                    <span class="line"></span>

                    <span class="line"></span>

                </span>

            </div>

            <!-- <h1 class="testname">Strategies for enhancement in food production</h1> -->

            

        </div>

        

    </header> 



<!--Mobile pelete View-->



 <span class="exam-bar" style="font-size:30px;cursor:pointer" onclick="openNav()"><i class="fa fa-bars" aria-hidden="true"></i></span> 



            <div class="main-side-nav">

            <div id="mySidenav" class="sidenav">

          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>



          </br>



         <div id="about" class="qpelete"> 

        <div class="nano-content">

        <div id="accordion">





        <?php 







 



        $exm_qstn=$this->join_model->get_question_of_section_knowledgetest($set_id[0],$pattern[0]->subject_id);

        ?>

        <h3 class="acrdnhdr"><?php echo @$subject_name[0]->section_name; ?> <?php if(@$set_dtls[0]->test_type==5 || @$set_dtls[0]->test_type==6){ ?> ( <?php echo @$chapter_name[0]->chap_name; ?> ) <?php }

         ?> </h3>

            <div>

                <div style="display:inline-block;width:100%">

                    <ul>

                    <?php 

                    $qs_count=0;

                    for($i=1;$i<=$pattern[0]->q_qty;$i++)

                    {

                        $qs_id=@$exm_qstn[$qs_count]->question_id;







 $user_exam_question=$this->common_model->common($table_name = 'tbl_user_exam', $field = array(), $where = array('user_id'=>@$user_id,'set_id'=>@$set_id,'user_plan_id'=>$user_plan_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');







                         $attempted_question=$this->common_model->common($table_name = 'tbl_user_exam_details', $field = array(), $where = array('user_exam_id'=>@$user_exam_question[0]->id,'question_master_id'=>@$qs_id,'is_review'=>'No'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');



                        $reviewed_question=$this->common_model->common($table_name = 'tbl_user_exam_details', $field = array(), $where = array('user_exam_id'=>@$user_exam,'question_master_id'=>@$qs_id,'is_review'=>'Yes'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');





                    ?>

                        <a href="javascript:void(0)" onclick="get_single_question('<?php echo @$qs_id; ?>','<?php echo $pattern[0]->subject_id; ?>','<?php echo $i;?>','<?php echo $set_id[0];?>')"><li class="questionnumb <?php if(count(@$attempted_question)>0){if(count(@$reviewed_question)>0){echo 'review';}else{echo 'attempted';}}else{ echo 'unattempted'; } ?>" id="qmob_<?php echo @$qs_id; ?>"><?php echo $i;?></li></a>



                    <?php 

                    $qs_count++; }

                    ?>

                        <!--<li class="questionnumb unattempted"></li>

                        <li class="questionnumb skip">2</li>

                        <li class="questionnumb attempted">3</li>

                        <li class="questionnumb review">4</li>

                        <li class="questionnumb ">5</li>

                        <li class="questionnumb ">6</li>

                        <li class="questionnumb ">7</li>

                        <li class="questionnumb review">8</li>-->

                    </ul> 



 





    

           

                    

                </div>

            </div>









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

        <!-- <li><span class="crcl crcl2"></span>Review</li> -->

        <!-- <li><span class="crcl crcl3"></span>Skip</li> -->

    </ul>

    <a href="javascript:void(0);" class="submitbtn" onclick="submit_examination()">Submit test</a>

</div>

</div>

</div>

          <!-- <a href="#">About</a>

          <a href="#">Services</a>

          <a href="#">Clients</a>

          <a href="#">Contact</a> -->



      </div>

        </div>





<!--      ......end............                   -->







    

    <div class="wrapper maindiv exammaindiv">



<!-- <nav id="sub" class="clearfix exam-name-details">

<div id="lefty">&lt;</div>

<div class="container_element">

    <div class="inner_container">

   <?php foreach(@$pattern as $pt){



    ?>

    <a href="javascript:void(0)" onclick="get_section_question('<?php echo @$set_id; ?>','<?php echo $pt->subject_id; ?>')"><div class="box"><b><?php echo @$subject_name[0]->section_name; ?></b></div></a>

    <?php } ?>



    </div>

</div>

<div id="righty">&gt;</div>

</nav> -->









        <div class="lftpart time-box ">

         <h1 class="testname" style=" float: left;font-size: 18px;line-height: 34px; width: 77%;padding-left:20px;display:none">Strategies for enhancement in food production</h1>

         <div style="" class="res-dis-none">



<?php 

$section_list=array();







$subject_name=$this->common_model->common($table_name = 'tbl_question_section', $field = array(), $where = array('id'=>@$subject_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');









    ?>



            <a href="javascript:void(0)" onclick="get_section_question('<?php echo @$set_id; ?>','<?php echo $pt->subject_id; ?>')"><span class="subject subjecttab" id="">



            <div class="subjinr active" id="section<?php echo $pt->subject_id; ?>">

            <span class="sbjcthdng">subject</span>

            <span class="sbjctname active" ><?php echo @$subject_name[0]->section_name; ?> ( <?php echo @$exam_name[0]->exam_name; ?> )</span>

            </div>

            </span></a>



<?php 

@$section_list[0]=@$subject_name[0]->id;

 $sec_ids=implode(",",$section_list); ?>

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

    <ul class="timelist">

        <!--<li><strong>Total Time :</strong> <?php echo @$dur;?> Secs</li>

        <li> -->



<strong>

<!-- Total Remaining Time in secs :</strong><div   id="timer"> <?php echo @$dur;?></div >  -->

    <input type="hidden" name="hid_duration" id="hid_duration" value="<?php echo @$dur;?>">



      <input type="hidden" name="hid_minute" id="hid_minute" value="<?php echo $min_val; ?>">

      <input type="hidden" name="hid_second" id="hid_second" value="<?php echo $dur; ?>">

      <input type="hidden" name="hid_user_plan" id="hid_user_plan" value="<?php echo $user_plan_id; ?>">

      </li>

    </ul>

</div>

</div>





<div class="inrmain">



    <div class="leftmain" id="place">

<input type="hidden" name="hid_se" id="hid_se" value="<?php echo @$subject_id; ?>">

<input type="hidden" name="current_quest_details_id" id="current_quest_details_id" value="<?php echo @$first_qstn_id;?>">

        <div class="quehdng">

            <div class="col-md-12">
                <div class="col-md-4 col-xs-2">
                    <span class="quehdnglft">Question.1</span>
                </div>
                <div class="col-md-4 col-xs-5">
                    <span class="quehdnglft back_des">MARKS : + <?php echo $qstn[0]->marks;?> </span>
                </div>
                <div class="col-md-4 col-xs-5">
                    <span class="quehdnglft back_des">NEGATIVE MARKS : - <?php echo $qstn[0]->neg_mark;?></span>
                </div>
            </div>

            

            <span class="quehdngryt">

                <!-- <span class="markdef">Maximum Mark. <span class="green"><?php echo number_format((float)@$qstn[0]->marks, 2, '.', '');?></span></span>

                <span class="markdef">Negative Mark. <span class="green red"><?php  echo '0.25'; ?></span></span> -->

               <!--  <span class="markdef"><span class="triangle"></span>Report</span> -->

            </span>

        </div>

        <!--normal que Single choice-->

        <div id="about" class="nano questionoutr" style="display:block">

            <div class="nano-content">





                <div class="questioninr">

                <div class="question-bx">

                    <?php echo $qstn[0]->question;?>

                    </div>

                    <div class="col-md-8">

<h2 class="answer-txt">Answer Option :</h2>



                    <div class="optninr">

                  



                    <?php 



                    $q_id= @$qstn[0]->id;

// echo $q_id.'okk';

                    $answr=$this->common_model->common($table_name = 'tbl_question_choice', $field = array(), $where = array('que_id'=>$q_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

// echo count(@$answr); exit;

                    $alphas = range('A', 'Z');

                   for($a=0;$a<count(@$answr);$a++){



                    ?>



                        <input id="radio<?php if($a>0){ echo $a; }?>" class="radiobtn" name="radio[]" type="radio" value="<?php echo $a+1; ?>">

                        <label class="option" for="radio<?php if($a>0){ echo $a; }?>"<?php if($a>0){ echo $a; }?>>

                            <div class="optncrcl"><span class="optnvalue"><!-- <?php echo $alphas[$a]; ?> --></span></div>

                            <span class="optncntnt"><?php echo @$answr[$a]->choice; ?> </span>

                        </label>



<?php } ?>



                       

                    </div>

                </div>















                </div>

            </div>



        </div>





 

</div>

<!--Match making simple-->







<div class="footrlft">

    <a class="arrow_slide2" href="javascript:void(0);" id="previosbtid" style="display: none"><i class="fa fa-angle-left"></i> PREVIOUS</a>



    <a class="arrow_slide2" id="save" style="display: block" href="javascript:void(0);" onclick="save_get_next_question('<?php echo @$exam; ?>','<?php echo @$set_id; ?>','<?php echo @$qstn[0]->section_id;?>','<?php echo  @$q_id; ?>')">SAVE & NEXT &nbsp;<span class="angle2"></span> <i class="fa fa-angle-right"></i> </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

    

<!-- <a class="arrow_slide2" id="prevque" style="display: block" href="javascript:void(0);" onclick="get_previous_question('<?php echo @$qstn[0]->dtls_id-1; ?>','<?php echo $pattern[0]->subject_id; ?>','<?php echo $set_id;?>')">GO PREVIOUS &nbsp;<span class="angle2"></span></a> -->



    <div class="chckbx_ques instr">



<input type="hidden" name="first_question_id" value="<?php echo @$qstn[0]->dtls_id; ?>">

     

  </div>

 <!--  <div class="chckbx_ques">



    <input type="checkbox" id="check1" name="check1" value="1" checked=""><label class="chckbx" for="check1">Review your question</label></div>

 -->



</div>

</div>



<div class="rightpart" id="rightpart">

  <div id="about" class="nano rightmain">

    <div class="nano-content">

        <div id="accordion">





        <?php 





      

        $exm_qstn=$this->join_model->get_question_of_section_knowledgetest($set_id,$pattern[0]->subject_id);





$subject_name=$this->common_model->common($table_name = 'tbl_question_section', $field = array(), $where = array('id'=>@$subject_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

     



// echo count($subject_name); 

      

   ?>

        <h3 class="acrdnhdr"><?php echo @$subject_name[0]->section_name; ?> ( <?php echo @$exam_name[0]->exam_name; ?> )</h3>

            <div>

                <div class="right_option" style="display:inline-block;width:100%">

                    <ul>

                    <?php 

                    $qs_count=0;

                    for($i=1;$i<=@$set_dtls[0]->q_qty;$i++)

                    {

                        $qs_id=$qstn[$qs_count]->que_id;



                    ?>

                        <a href="javascript:void(0)" onclick="get_single_question('<?php echo @$qs_id; ?>','<?php echo @$subject_id; ?>','<?php echo $i;?>','<?php echo $set_id;?>')"><li class="questionnumb unattempted" id="q_<?php echo @$qs_id; ?>"><?php echo $i;?></li></a>



                    <?php $qs_count++; }?>

                       

                    </ul> 

  





    

           

                    

                </div>

            </div>







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





<div class="submit  res-768-disnone">

    <ul>

        <li><span class="crcl"></span>Attempted</li>

        <li><span class="crcl crcl1" style="background:#ff0000;"></span>Unattempted</li>

        <!-- <li><span class="crcl crcl2"></span>Review</li> -->

        <!-- <li><span class="crcl crcl3"></span>Skip</li> -->

    </ul>

    <a href="javascript:void(0);" class="submitbtn" onclick="submit_examination()">Submit test</a>

</div>

</div>

</div>



</div>



<!-- <div id="feedback">

    <div id="feedback-form" style='display:none;' class="col-xs-4 col-md-4 panel panel-default">

        <div class="calculator" align="center">

                  <div class="displayBox">

                    <p class="displayText" id="display">0</p>

                  </div>

                  <div class="row numberPad">

                    <div class="col-md-9 col-xs-9 col-sm-9">

                      <div class="row">

                        <button class="btn clear hvr-back-pulse" id="clear">C</button>

                        <button class="btn btn-calc hvr-radial-out" id="sqrt">√</button>

                        <button class="btn btn-calc hvr-radial-out hvr-radial-out" id="square">x<sup>2</sup></button>

                      </div>

                      <div class="row">

                        <button class="btn btn-calc hvr-radial-out" id="seven">7</button>

                        <button class="btn btn-calc hvr-radial-out" id="eight">8</button>

                        <button class="btn btn-calc hvr-radial-out" id="nine">9</button>

                      </div>

                      <div class="row">

                        <button class="btn btn-calc hvr-radial-out" id="four">4</button>

                        <button class="btn btn-calc hvr-radial-out" id="five">5</button>

                        <button class="btn btn-calc hvr-radial-out" id="six">6</button>

                      </div>

                      <div class="row">

                        <button class="btn btn-calc hvr-radial-out" id="one">1</button>

                        <button class="btn btn-calc hvr-radial-out" id="two">2</button>

                        <button class="btn btn-calc hvr-radial-out" id="three">3</button>

                      </div>

                      <div class="row">

                        <button class="btn btn-calc hvr-radial-out" id="plus_minus">&#177;</button>

                        <button class="btn btn-calc hvr-radial-out" id="zero">0</button>

                        <button class="btn btn-calc hvr-radial-out" id="decimal">.</button>

                      </div>

                    </div>

                    <div class="col-md-3 col-sm-3 col-xs-3 operationSide">

                      <button id="divide" class="btn btn-operation hvr-fade">÷</button>

                      <button id="multiply" class="btn btn-operation hvr-fade">×</button>

                      <button id="subtract" class="btn btn-operation hvr-fade">−</button>

                      <button id="add" class="btn btn-operation hvr-fade">+</button>

                      <button id="equals" class="btn btn-operation equals hvr-back-pulse">=</button>

                    </div>

                  </div>

                </div>

            </div>

    <div id="feedback-tab">Basic Calculator</div>

</div> -->





 <!-- <button type="button" class="btn btn-info btn-lg basic-cal" data-toggle="modal" data-target="#basic-cal-modal">Basic Calculator</button> -->







<!-- Modal -->

<div id="basic-cal-modal" class="modal fade basic-cal-modal" role="dialog">

  <div class="modal-dialog">



    <!-- Modal content-->

    <div class="modal-content">

      

      <div class="modal-body">

      <button type="button" class="close" data-dismiss="modal">&times;</button>

        <div class="calculator" align="center">

                  <div class="displayBox">

                    <p class="displayText" id="display">0</p>

                  </div>

                  <div class="row numberPad">

                    <div class="col-md-9 col-sm-9 col-xs-9">

                      <div class="row">

                        <button class="btn clear hvr-back-pulse" id="clear">C</button>

                        <button class="btn btn-calc hvr-radial-out" id="sqrt">√</button>

                        <button class="btn btn-calc hvr-radial-out hvr-radial-out" id="square">x<sup>2</sup></button>

                      </div>

                      <div class="row">

                        <button class="btn btn-calc hvr-radial-out" id="seven">7</button>

                        <button class="btn btn-calc hvr-radial-out" id="eight">8</button>

                        <button class="btn btn-calc hvr-radial-out" id="nine">9</button>

                      </div>

                      <div class="row">

                        <button class="btn btn-calc hvr-radial-out" id="four">4</button>

                        <button class="btn btn-calc hvr-radial-out" id="five">5</button>

                        <button class="btn btn-calc hvr-radial-out" id="six">6</button>

                      </div>

                      <div class="row">

                        <button class="btn btn-calc hvr-radial-out" id="one">1</button>

                        <button class="btn btn-calc hvr-radial-out" id="two">2</button>

                        <button class="btn btn-calc hvr-radial-out" id="three">3</button>

                      </div>

                      <div class="row">

                        <button class="btn btn-calc hvr-radial-out" id="plus_minus">&#177;</button>

                        <button class="btn btn-calc hvr-radial-out" id="zero">0</button>

                        <button class="btn btn-calc hvr-radial-out" id="decimal">.</button>

                      </div>

                    </div>

                    <div class="col-md-3 col-sm-3 col-xs-3 operationSide">

                      <button id="divide" class="btn btn-operation hvr-fade">÷</button>

                      <button id="multiply" class="btn btn-operation hvr-fade">×</button>

                      <button id="subtract" class="btn btn-operation hvr-fade">−</button>

                      <button id="add" class="btn btn-operation hvr-fade">+</button>

                      <button id="equals" class="btn btn-operation equals hvr-back-pulse">=</button>

                    </div>

                  </div>

                </div>

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

<div id="examover" class="modal fade"  role="dialog" data-backdrop="static" data-keyboard="false" style="display:none;">

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















<script src="<?php echo base_url();?>assets/js_exam/scrollbar.js" type="text/javascript"></script>

 





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

function  get_single_question(question_id,section_id,question_no,set_id)

{



    // alert(question_id); alert(section_id); alert(question_no); alert(set_id);

    var sections=$("#num_pattern").val();

    var sec_array = sections.split(',');



    var prev_se=$("#hid_se").val();







     var base_url='<?php echo base_url(); ?>';

                //alert(question_id);

                  $.ajax(



                {



                type: "POST",



                dataType: 'html',



                url:'<?php echo base_url(); ?>manage_exam/get_single_question',

                data:{q_id:question_id,q_no:question_no,s_id:set_id},

                async: false,



                success: function (data) {

                            // alert(data);

                            $("#place").html(data);



                            document.getElementById("save").style.display = "block";



                            var review=$("#hid_review").val();





                            // if(review=='Yes')

                            // {

                            //     $('#check1').prop('checked', true);

                            // }

                            // else

                            // {

                            //     $('#check1').prop('checked', false);

                            // }

                            for(var i=0;i<sec_array.length;i++)

                            { 

                                //alert(sec_array[i]);

                                // if(sec_array[i]==section_id)

                                // {

                                //      $("#section"+sec_array[i]).addClass('active');

                                // }

                                // else

                                // {

                                //     $("#section"+sec_array[i]).removeClass('active');

                                // }

                            }

                             var e_id=$("#hid_e").val();

                            var s_id=$("#hid_s").val();

                            var se_id=$("#hid_se").val();

                            var q_id=$("#hid_q").val();



                          

                            var node='save_get_next_question('+e_id+','+set_id+','+se_id+','+q_id+')';

                             // alert(q_id); 

                            $('#save').attr('onclick', node);



                            var first_qstndetails_id= $("#first_qstn_id").val();

                            var current_quest_details_id= $("#current_quest_details_id").val();



                            if(first_qstndetails_id!=current_quest_details_id)

                            {

                                document.getElementById("previosbtid").style.display = "block";

                                var prevnode='get_previous_question('+current_quest_details_id+','+set_id+','+se_id+','+e_id+')';

                                 $('#previosbtid').attr('onclick', prevnode); 

                            }

                            else{

                                document.getElementById("previosbtid").style.display = "none";

                            }









                      









                          if(x>y)

                            {

                                var diff=x-y;

                                    var state = 0;

                                    var maxState = 8;

                                    var winWidth = $(window).width();

                                    //var wwinWidth=winWidth*60/100;

                                    $(window).resize(function(){

                                        winWidth = $(window).width();

                                        $('.box,.container_element').width(winWidth-100);

                                        $('.container_element').scrollLeft((winWidth-100)*state);

                                    }).trigger('resize');



                                     if (state==maxState) 

                                     {

                                        state = 0;

                                     } else

                                     {

                                         state=state-diff;

                                     }

                                 $('.container_element').animate({scrollLeft:((winWidth-100)*state)+'px'}, 100);

                            }

                            if(y>x)

                            {

                                var diff=y-x;

                                  var state = 0;

                                    var maxState = 8;

                                    var winWidth = $(window).width();

                                    //var wwinWidth=winWidth*60/100;

                                    $(window).resize(function(){

                                        winWidth = $(window).width();

                                        $('.box,.container_element').width(winWidth-100);

                                        $('.container_element').scrollLeft((winWidth-100)*state);

                                    }).trigger('resize');



                                    if (state==maxState) 

                                     {

                                        state = 0;

                                     } else

                                     {

                                         state=state+diff;

                                     }

                                $('.container_element').animate({scrollLeft:((winWidth-100)*state)+'px'}, 100);

                            }











                            

                              }

                         });











}

</script>





<script>

function  get_previous_question(current_quest_details_id,set_id,se_id,e_id)

{



   



    var sections=$("#num_pattern").val();

    var sec_array = sections.split(',');



    var prev_se=$("#hid_se").val();







     var base_url='<?php echo base_url(); ?>';

                //alert(question_id);

                  $.ajax(



                {



                type: "POST",



                dataType: 'html',



                url:'<?php echo base_url(); ?>manage_exam/get_previous_question',

                data:{current_quest_details_id:current_quest_details_id},

                async: false,



                success: function (data) {

                            // alert(data);

                            $("#place").html(data);



                            document.getElementById("save").style.display = "block";



                            var review=$("#hid_review").val();





                            for(var i=0;i<sec_array.length;i++)

                            { 

                                

                            }

                             var e_id=$("#hid_e").val();

                            var s_id=$("#hid_s").val();

                            var se_id=$("#hid_se").val();

                            var q_id=$("#hid_q").val();



                          

                            var node='save_get_next_question('+e_id+','+set_id+','+se_id+','+q_id+')';

                             // alert(q_id); 

                            $('#save').attr('onclick', node);



                            var first_qstndetails_id= $("#first_qstn_id").val();

                            var current_quest_details_id= $("#current_quest_details_id").val();



                            if(first_qstndetails_id!=current_quest_details_id)

                            {

                                document.getElementById("previosbtid").style.display = "block";

                                var prevnode='get_previous_question('+current_quest_details_id+','+s_id+','+se_id+','+e_id+')';

                                 $('#previosbtid').attr('onclick', prevnode); 

                            }

                            else{

                                document.getElementById("previosbtid").style.display = "none";

                            }



if(x>y)

                            {

                                var diff=x-y;

                                    var state = 0;

                                    var maxState = 8;

                                    var winWidth = $(window).width();

                                    //var wwinWidth=winWidth*60/100;

                                    $(window).resize(function(){

                                        winWidth = $(window).width();

                                        $('.box,.container_element').width(winWidth-100);

                                        $('.container_element').scrollLeft((winWidth-100)*state);

                                    }).trigger('resize');



                                     if (state==maxState) 

                                     {

                                        state = 0;

                                     } else

                                     {

                                         state=state-diff;

                                     }

                                 $('.container_element').animate({scrollLeft:((winWidth-100)*state)+'px'}, 100);

                            }

                            if(y>x)

                            {

                                var diff=y-x;

                                  var state = 0;

                                    var maxState = 8;

                                    var winWidth = $(window).width();

                                    //var wwinWidth=winWidth*60/100;

                                    $(window).resize(function(){

                                        winWidth = $(window).width();

                                        $('.box,.container_element').width(winWidth-100);

                                        $('.container_element').scrollLeft((winWidth-100)*state);

                                    }).trigger('resize');



                                    if (state==maxState) 

                                     {

                                        state = 0;

                                     } else

                                     {

                                         state=state+diff;

                                     }

                                $('.container_element').animate({scrollLeft:((winWidth-100)*state)+'px'}, 100);

                            }











                            

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

 <script src="<?php echo base_url();?>assets/js/feedback.js"></script>

   <script src="<?php echo base_url();?>assets/js/calculate.js"></script>

     <script src="<?php echo base_url();?>assets/js/jchart.min.js"></script>











     <script>

    let jchart1, jchart2, jchart3;

    $(function () {

        jchart1 = $("#element1").jChart({

            data: [

                {

                    value: 300

                },

                {

                    value: 1500,

                    color: {

                        normal: '#77dd4f',

                        active: '#b0ff9f',

                    },

                    draw: true, //false

                    push: true, //false

                },



                {

                    value: 755,

                    color: {

                        normal: '#333',

                        active: '#000',

                    },

                    order: 1

                }





            ],

            appearance: {

                type: 'donut',

                subType: 'path',

                baseColor: '#ddd',

                radius: 125 / (2 * Math.PI),

                gap: 1,

                baseStrokeWidth: 0.5,

                // animated: false



                title: {

                    showSummary: true,

                    summarySegment: 2

                }

            },

            callbacks: {

                onSegmentMouseover: function (did, segment) {

                    // console.log(did);

                    // console.log(segment);

                }

            }

        });

          jchart2 = $("#element2").jChart({

            data: [

                {

                    value: 800

                },

                {

                    value: 1100,

                    color: {

                        normal: '#77dd4f',

                        active: '#b0ff9f',

                    },

                    draw: true, //false

                    push: true, //false

                },

                {

                    value: 555,

                    color: {

                        normal: '#333',

                        active: '#000',

                    },

                    order: 1

                }

            ],

            appearance: {

                type: 'donut',

                subType: 'path',

                baseColor: '#ddd',

                radius: 125 / (2 * Math.PI),

                gap: 1,

                baseStrokeWidth: 0.5,

                // animated: false



                title: {

                    showSummary: true,

                    summarySegment: 2

                }

            },

            callbacks: {

                onSegmentMouseover: function (did, segment) {

                    // console.log(did);

                    // console.log(segment);

                }

            }

        });

       jchart3 = $("#element3").jChart({

            data: [

                {

                    value: 800

                },

                {

                    value: 1700,

                    color: {

                        normal: '#77dd4f',

                        active: '#b0ff9f',

                    },

                    draw: true, //false

                    push: true, //false

                },

                {

                    value: 200,

                    color: {

                        normal: '#333',

                        active: '#000',

                    },

                    order: 1

                }

            ],

            appearance: {

                type: 'donut',

                subType: 'path',

                baseColor: '#ddd',

                radius: 125 / (2 * Math.PI),

                gap: 1,

                baseStrokeWidth: 0.5,

                // animated: false



                title: {

                    showSummary: true,

                    summarySegment: 2

                }

            },

            callbacks: {

                onSegmentMouseover: function (did, segment) {

                    // console.log(did);

                    // console.log(segment);

                }

            }

        });



        jchart4 = $("#element4").jChart({

            data: [

                {

                    value: 300

                },

                {

                    value: 1700,

                    color: {

                        normal: '#77dd4f',

                        active: '#b0ff9f',

                    },

                    draw: true, //false

                    push: true, //false

                },

                {

                    value: 800,

                    color: {

                        normal: '#333',

                        active: '#000',

                    },

                    order: 1

                }

            ],

            appearance: {

                type: 'donut',

                subType: 'path',

                baseColor: '#ddd',

                radius: 125 / (2 * Math.PI),

                gap: 1,

                baseStrokeWidth: 0.5,

                // animated: false



                title: {

                    showSummary: true,

                    summarySegment: 2

                }

            },

            callbacks: {

                onSegmentMouseover: function (did, segment) {

                    // console.log(did);

                    // console.log(segment);

                }

            }

        });

         jchart5 = $("#element5").jChart({

            data: [

                {

                    value: 300

                },

                {

                    value: 2300,

                    color: {

                        normal: '#77dd4f',

                        active: '#b0ff9f',

                    },

                    draw: true, //false

                    push: true, //false

                },

                {

                    value: 200,

                    color: {

                        normal: '#333',

                        active: '#000',

                    },

                    order: 1

                }

            ],

            appearance: {

                type: 'donut',

                subType: 'path',

                baseColor: '#ddd',

                radius: 125 / (2 * Math.PI),

                gap: 1,

                baseStrokeWidth: 0.5,

                // animated: false



                title: {

                    showSummary: true,

                    summarySegment: 2

                }

            },

            callbacks: {

                onSegmentMouseover: function (did, segment) {

                    // console.log(did);

                    // console.log(segment);

                }

            }

        });

       

    });

</script>

 <script type="text/javascript">





var exam_id='<?php echo $user_exam; ?>';



var minute=parseInt($("#hid_minute").val());

var second=parseInt($("#hid_second").val());

var set='<?php echo @$set_id; ?>'

var timeoutHandle;

//alert(minute);

//alert(second);



  var seconds;

  var temp;

 

  function countdown() {

  /*  seconds = document.getElementById('timer').innerHTML;*/

  seconds=$("#actualtime").val();

    seconds = parseInt(seconds,10);

 

   

 

    seconds--;



    var sec, min, hour;



if(seconds<3600){

    var a = Math.floor(seconds/60); //minutes

    var b = seconds%60; //seconds



    if (b!=1){

        sec = "seconds";

    }else{

        sec = "second";

    }



    if(a!=1){

        min = "minutes";

    }else{

        min = "minute";

    }



    /*$('span').text("You have played "+a+" "+min+" and "+b+" "+sec+".");*/



    var timing='00:'+a+':'+b;

}else{

        var a = Math.floor(seconds/3600); //hours

    var x = seconds%3600;

    var b = Math.floor(x/60); //minutes

    var c = seconds%60; //seconds



     if (c!=1){

        sec = "seconds";

    }else{

        sec = "second";

    }



    if(b!=1){

        min = "minutes";

    }else{

        min = "minute";

    }



    if(c!=1){

        hour = "hours";

    }else{

        hour = "hour";

    }



    /*$('span').text("You have played "+a+" "+hour+", "+b+" "+min+" and "+c+" "+sec+".");*/

    var timing=a+':'+b+':'+c;

}

$("#actualtime").val(seconds);

    temp = document.getElementById('timer');

    temp.innerHTML = timing;

    timeoutMyOswego = setTimeout(countdown, 1000);

   console.log(seconds);

 if(seconds == 1) {

                            var user_exam_id='<?php echo $user_exam; ?>';

    var base_url='<?php echo base_url();?>';

    var set='<?php echo @$set_id; ?>'

    var endtm='<?php echo date("Y-m-d H:i:s");?>';

    var remaining_time=$('#timer').text();

    // alert(remaining_time);





    

   



      $.ajax({


                        type: "POST",

                        dataType: 'json',
                        url:'<?php echo base_url();?>manage_exam/complete_examination_show_result',
                        data:{setid:set,exmid:user_exam_id,endtime:endtm,remaining_time:remaining_time},
                        async: false,

                        success: function (data) {

                        console.log(data);

                             var perform= data.workdone;

                             var exmid= data.exmid;

                                //alert(perform['status']);     

                    if(perform['status']==1)

                        {

                                window.location='<?php echo $this->url->link(140);?>/'+exmid;  

                        }

                        }

                        });

    



                    }



  } 

 

  countdown();

</script>

</script> 



<script>

function save_get_next_question(exam_id,set_id,section_id,question_id)

{

    // alert(question_id); 

    var prev_se_id=section_id;

        //var attempt_list=$("#hid_attempt").val();

        //var review_list=$("#hid_review").val();

        var review='';

        var answer_no='';

        if ($('#check1').is(":checked"))

        {

            var review=$('#check1').val();

      

        }

        var answer_no = [];



             $.each($("input[name='radio[]']:checked"), function(){            

                answer_no.push($(this).val());

            });

       // alert(answer_no);



    var sections=$("#num_pattern").val();

    var sec_array = sections.split(',');

     var base_url='<?php echo base_url(); ?>';

                //alert(question_id);

                  $.ajax(



                {



                type: "POST",



               dataType: 'html',



                url:'<?php echo base_url(); ?>manage_exam/save_next_question',

                data:{e_id:exam_id, s_id:set_id, se_id:section_id, q_id:question_id,rvw:

                    review,answ:answer_no},

                async: false,



                success: function (data) {

                    // alert(data);

                    if(data==5){



                    document.getElementById("save").style.display = "none";

 

                            var review=$("#hid_review").val();

                            // if(review=='Yes')

                            // {

                            //     $('#check1').prop('checked', true);

                            // }

                            // else

                            // {

                            //     $('#check1').prop('checked', false);

                            // }



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

                            // alert(q_id);

                            var node='save_get_next_question('+e_id+','+s_id+','+se_id+','+q_id+')';

                            $('#save').attr('onclick', node);



                            var first_qstndetails_id= $("#first_qstn_id").val();

                            var current_quest_details_id= $("#current_quest_details_id").val();



                            if(first_qstndetails_id!=current_quest_details_id)

                            {

                                document.getElementById("previosbtid").style.display = "block";

                                var prevnode='get_previous_question('+current_quest_details_id+','+s_id+','+se_id+','+e_id+')';

                                    $('#previosbtid').attr('onclick', prevnode);





                            }

                            else{

                                document.getElementById("previosbtid").style.display = "none";

                            }





                            var attempted=$("#hid_attempt").val();

                            var reviewed=$("#hid_review1").val();

                            //alert(reviewed);

                            // $('input[name="check1"]').prop('checked', false);

                            var attempted_arr = attempted.split(',');

                            var reviewed_arr = reviewed.split(',');

                            //alert(reviewed_arr);

                             //alert(attempted_arr);



                                for(var q=0;q<attempted_arr.length;q++)

                                {

                                    $("#q_"+attempted_arr[q]).removeClass('unattempted');

                                    $("#q_"+attempted_arr[q]).removeClass('review');

                                    $("#q_"+attempted_arr[q]).addClass('attempted');



                                    $("#qmob_"+attempted_arr[q]).removeClass('unattempted');

                                    $("#qmob_"+attempted_arr[q]).removeClass('review');

                                    $("#qmob_"+attempted_arr[q]).addClass('attempted');

                                }

                            



                              for(var q=0;q<reviewed_arr.length;q++)

                                {

                                    $("#q_"+reviewed_arr[q]).removeClass('unattempted');

                                    $("#q_"+reviewed_arr[q]).removeClass('attempted');

                                    $("#q_"+reviewed_arr[q]).addClass('review');





                                    $("#qmob_"+reviewed_arr[q]).removeClass('unattempted');

                                    $("#qmob_"+reviewed_arr[q]).removeClass('attempted');

                                    $("#qmob_"+reviewed_arr[q]).addClass('review');

                                } 









                                for(var i=0;i<sec_array.length;i++)

                            {

                                if(sec_array[i]==prev_se_id)

                                {

                                    var x=i;

                                }

                                if(sec_array[i]==se_id)

                                {

                                    var y=i;

                                }





                            }



                            if(x>y)

                            {

                                var diff=x-y;

                                    var state = 0;

                                    var maxState = 8;

                                    var winWidth = $(window).width();

                                    //var wwinWidth=winWidth*60/100;

                                    $(window).resize(function(){

                                        winWidth = $(window).width();

                                        $('.box,.container_element').width(winWidth-100);

                                        $('.container_element').scrollLeft((winWidth-100)*state);

                                    }).trigger('resize');



                                     if (state==maxState) 

                                     {

                                        state = 0;

                                     } else

                                     {

                                         state=state-diff;

                                     }

                                 $('.container_element').animate({scrollLeft:((winWidth-100)*state)+'px'}, 100);

                            }

                            if(y>x)

                            {

                                var diff=y-x;

                                  var state = 0;

                                    var maxState = 8;

                                    var winWidth = $(window).width();

                                    //var wwinWidth=winWidth*60/100;

                                    $(window).resize(function(){

                                        winWidth = $(window).width();

                                        $('.box,.container_element').width(winWidth-100);

                                        $('.container_element').scrollLeft((winWidth-100)*state);

                                    }).trigger('resize');



                                    if (state==maxState) 

                                     {

                                        state = 0;

                                     } else

                                     {

                                         state=state+diff;

                                     }

                                $('.container_element').animate({scrollLeft:((winWidth-100)*state)+'px'}, 100);

                            }

                          }

                           else{

                            $("#place").html(data);



                            var review=$("#hid_review").val();

                            if(review=='Yes')

                            {

                                $('#check1').prop('checked', true);

                            }

                            else

                            {

                                $('#check1').prop('checked', false);

                            }



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

                            // alert(q_id);

                            var node='save_get_next_question('+e_id+','+s_id+','+se_id+','+q_id+')';

                            $('#save').attr('onclick', node);



                            var first_qstndetails_id= $("#first_qstn_id").val();

                            var current_quest_details_id= $("#current_quest_details_id").val();



                           // alert(current_quest_details_id);

                            //alert(first_qstndetails_id);



                            if(first_qstndetails_id!=current_quest_details_id)

                            {

                                document.getElementById("previosbtid").style.display = "block"; 



                                var prevnode='get_previous_question('+current_quest_details_id+','+s_id+','+se_id+','+e_id+')';

                                 $('#previosbtid').attr('onclick', prevnode);

                            }

                            else{

                                document.getElementById("previosbtid").style.display = "none";

                            }



                            var attempted=$("#hid_attempt").val();

                            var reviewed=$("#hid_review1").val();

                            //alert(reviewed);

                            // $('input[name="check1"]').prop('checked', false);

                            var attempted_arr = attempted.split(',');

                            var reviewed_arr = reviewed.split(',');

                            //alert(reviewed_arr);

                             //alert(attempted_arr);



                                for(var q=0;q<attempted_arr.length;q++)

                                {

                                    $("#q_"+attempted_arr[q]).removeClass('unattempted');

                                    $("#q_"+attempted_arr[q]).removeClass('review');

                                    $("#q_"+attempted_arr[q]).addClass('attempted');



                                    $("#qmob_"+attempted_arr[q]).removeClass('unattempted');

                                    $("#qmob_"+attempted_arr[q]).removeClass('review');

                                    $("#qmob_"+attempted_arr[q]).addClass('attempted');

                                }

                            



                              for(var q=0;q<reviewed_arr.length;q++)

                                {

                                    $("#q_"+reviewed_arr[q]).removeClass('unattempted');

                                    $("#q_"+reviewed_arr[q]).removeClass('attempted');

                                    $("#q_"+reviewed_arr[q]).addClass('review');





                                    $("#qmob_"+reviewed_arr[q]).removeClass('unattempted');

                                    $("#qmob_"+reviewed_arr[q]).removeClass('attempted');

                                    $("#qmob_"+reviewed_arr[q]).addClass('review');

                                } 









                                for(var i=0;i<sec_array.length;i++)

                            {

                                if(sec_array[i]==prev_se_id)

                                {

                                    var x=i;

                                }

                                if(sec_array[i]==se_id)

                                {

                                    var y=i;

                                }





                            }



                            if(x>y)

                            {

                                var diff=x-y;

                                    var state = 0;

                                    var maxState = 8;

                                    var winWidth = $(window).width();

                                    //var wwinWidth=winWidth*60/100;

                                    $(window).resize(function(){

                                        winWidth = $(window).width();

                                        $('.box,.container_element').width(winWidth-100);

                                        $('.container_element').scrollLeft((winWidth-100)*state);

                                    }).trigger('resize');



                                     if (state==maxState) 

                                     {

                                        state = 0;

                                     } else

                                     {

                                         state=state-diff;

                                     }

                                 $('.container_element').animate({scrollLeft:((winWidth-100)*state)+'px'}, 100);

                            }

                            if(y>x)

                            {

                                var diff=y-x;

                                  var state = 0;

                                    var maxState = 8;

                                    var winWidth = $(window).width();

                                    //var wwinWidth=winWidth*60/100;

                                    $(window).resize(function(){

                                        winWidth = $(window).width();

                                        $('.box,.container_element').width(winWidth-100);

                                        $('.container_element').scrollLeft((winWidth-100)*state);

                                    }).trigger('resize');



                                    if (state==maxState) 

                                     {

                                        state = 0;

                                     } else

                                     {

                                         state=state+diff;

                                     }

                                $('.container_element').animate({scrollLeft:((winWidth-100)*state)+'px'}, 100);

                            }





  

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

    //alert('ok');

    

    var base_url='<?php echo base_url(); ?>';

    $.ajax(



                        {



                        type: "POST",



                        dataType: 'json',



                        url:base_url+'manage_exam/get_score_link',

                        data:{uexam:user_exam,set:set_id},

                        async: false,



                        success: function (data) {

                   

                            var perform= data.workdone;

                                    //alert(perform['status']);

                                    if(perform['status']==1)

                                    {



                     window.location='<?php echo $this->url->link(95);?>';



                                        // // alert(perform['score_ready']);

                                        // var lnk=perform['score_ready']

                                        // var scorewindow;

                                        // scorewindow=window.open('<?php echo $this->url->link(95);?>/'+lnk, 'MyTest', 'width=900,height=750,directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=no');



                                        /*closeDialog($('#content'));

                                        close();*/

                                        

                                        



                                    }

                                   

                                    

                                      }

                        });





    

}

</script>





<script>

function submit_examination()

{ 



    //alert('ok');





    var user_exam_id='<?php echo $user_exam; ?>';

    var base_url='<?php echo base_url();?>';

    var set='<?php echo @$set_id; ?>'

    var endtm='<?php echo date("Y-m-d H:i:s");?>';

    var remaining_time=$('#timer').text();

    // alert(remaining_time);





     var r = confirm("Are you sure about submitting test?");

    if (r == true) 

    {



      $.ajax(

                    {



                        type: "POST",



                       dataType: 'json',



                        url:'<?php echo base_url();?>manage_exam/complete_examination_show_result',

                        data:{setid:set,exmid:user_exam_id,endtime:endtm,remaining_time:remaining_time},

                        async: false,



                        success: function (data) {

                         // alert(data);

                             var perform= data.workdone;

                             var exmid= data.exmid;

                                 // alert(perform['status']);     

                    if(perform['status']==1)

                        {

                                window.location='<?php echo $this->url->link(140);?>/'+exmid;  

                        }

                        }

                        });

    }



      



}

</script>





<script>

$( document ).ready(function() {

    var state = 0;

    var maxState = 8;

    var winWidth = $(window).width();

    //var wwinWidth=winWidth*60/100;

    $(window).resize(function(){

        winWidth = $(window).width();

        $('.box,.container_element').width(winWidth-100);

        $('.container_element').scrollLeft((winWidth-100)*state);

    }).trigger('resize');

    $('#lefty').click(function(){

        if (state==0) {

           state = maxState;

        } else {

           state--;

        }

        $('.container_element').animate({scrollLeft:((winWidth-100)*state)+'px'}, 100);

    });

    $('#righty').click(function(){

        if (state==maxState) {

           state = 0;

        } else {

           state++;

        }

        $('.container_element').animate({scrollLeft:((winWidth-100)*state)+'px'}, 100);

    });

});

</script>





<script type="text/javascript">

function openNav() {

    document.getElementById("mySidenav").style.display = "block";

    //$("#mySidenav").css("display","block");

}



function closeNav() {

    document.getElementById("mySidenav").style.display = "none";

}

</script>







<script type="text/javascript">

document.onkeydown = function(e) {

if(event.keyCode == 123) {

return false;

}

if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {

return false;

}

if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {

return false;

}



if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {

return false;

}





}

</script> 


<!-- inspect off script start here -->


<!-- <script type="text/javascript">

$(document).ready(function () {



$("body").on("contextmenu",function(e){

return false;

});





$("#id").on("contextmenu",function(e){

return false;

});

});

</script> -->


<!-- inspect off script end here -->



<script type="text/javascript">

    document.addEventListener("keyup", function (e) {

    var keyCode = e.keyCode ? e.keyCode : e.which;

            if (keyCode == 44) {

                stopPrntScr();

            }

        });

function stopPrntScr() {



            var inpFld = document.createElement("input");

            inpFld.setAttribute("value", ".");

            inpFld.setAttribute("width", "0");

            inpFld.style.height = "0px";

            inpFld.style.width = "0px";

            inpFld.style.border = "0px";

            document.body.appendChild(inpFld);

            inpFld.select();

            document.execCommand("copy");

            inpFld.remove(inpFld);

        }

       function AccessClipboardData() {

            try {

                window.clipboardData.setData('text', "Access   Restricted");

            } catch (err) {

            }

        }

        setInterval("AccessClipboardData()", 300);

</script>



</body>





</html>



