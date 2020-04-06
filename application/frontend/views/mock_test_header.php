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
  			<h3>Mock Test<!-- <br> Take a Test --></h3>
  		</div>

  		<div class="col-md-12 col-sm-12 col-xs-12">

  				<div class="rank-bx">

            <form method="post" action="" class="rank-form">
              <div class="col-md-4 col-sm-4 col-xs-12 res480-mb-10">
                <div class="form-group">
                  <label>Group of Examination:</label>
                   <select class="form-control"  id="group_name" name="group_name" onchange="get_examination_from_group(this.value)">
                   <option value="">----Select Examination Group------ </option>
                   <?php if(count(@$groups)>0){foreach($groups as $gp){?>
                      <option value="<?php echo @$gp->id; ?>"><?php echo @$gp->exam_name; ?></option>
                      <?php }} ?>
                     <!--  <option>Quiz Test 1</option>
                     <option>Quiz Test 2</option>
                     <option>Quiz Test 2</option> -->
                    </select>

                </div>


              </div>


                <div class="col-md-4 col-sm-4 col-xs-12 res480-mb-10">
                <div class="form-group">
                  <label>Examination :</label>
                   <select class="form-control" id="exam_name" name="exam_name" onchange="get_subject_name_from_exam(this.value)">
                   <option value="">----Select Examination Name------ </option>
                     <!--  <option>Engineering</option>
                     <option>Bank</option>
                     <option>Railway</option>
                     <option>Clearkship</option>
                     <option>Health</option>
                     <option>Defense</option> -->
                    </select>

                </div>


              </div>


                <div class="col-md-4 col-sm-4 col-xs-12 res480-mb-10">
                <div class="form-group">
                  <label>Subject :</label>
                   <select class="form-control" name="sub_name" id="sub_name" onchange="fetch_question_list(this.value)">
                   <option value="">----Select Examination Subject------ </option>
                      <!-- <option>English</option>
                      <option>Math</option>
                      <option>General knowledge</option>
                      <option>History</option> -->
                    </select>

                </div>


              </div>


             


            <div id="fetch_qstn">
            <div class="col-md-12 col-sm-12 col-xs-12">

                <?php if(count(@$mock)>0){$counter=1; foreach($mock as $mk){

                  $qstn_dtls=$this->common_model->common($table_name = 'tbl_questions', $field = array(), $where = array('id'=>$mk->qstn_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

                   $option_details=$this->common_model->common($table_name = 'tbl_question_choice', $field = array(), $where = array('que_id'=>$mk->qstn_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

                   $option_arr=array('A','B','C','D','E');

                  ?>
                  <div class="quaton-bx">
                      <h4>Question: <?php echo @$counter; ?></h4>
                        <div class="setup">
                            <h1><?php echo @$qstn_dtls[0]->question; ?></h1>

                            <div class="clearfix"></div>


                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <div class="ans">
                                    <ul>

                                       <?php $counter1=0;foreach($option_details as $od){?>
                                      <li class="qstnoptn<?php echo @$mk->qstn_id; ?>" id="opt_<?php echo @$od->id; ?>"><a href="javascript:void(0)" onclick="check_right_wrong('<?php echo @$od->id; ?>','<?php echo @$mk->qstn_id;?>')"><div class="measure-question"><span><i class="fa fa-dot-circle-o" aria-hidden="true"></i> <?php echo @$option_arr[$counter1]; ?> .</span> <?php echo @$od->choice; ?></div><span id="wrong_<?php echo @$od->id; ?>" class="hideelement"><i class="fa fa-times" aria-hidden="true"></i></span><span id="right_<?php echo @$od->id; ?>" class="hideelement"><i class="fa fa-check" aria-hidden="true"></i></span></a></li>

                                       <?php $counter1++;} ?>


                                      <!-- <li class="wrong"><a><i class="fa fa-dot-circle-o" aria-hidden="true"></i> A . 123<span><i class="fa fa-times" aria-hidden="true"></i></span></a></li>
                                      <li class="wrong"><a><i class="fa fa-dot-circle-o" aria-hidden="true"></i> B . 123<span><i class="fa fa-times" aria-hidden="true"></i></span></a></li>
                                      <li class="wrong"><a><i class="fa fa-dot-circle-o" aria-hidden="true"></i> C . 123<span><i class="fa fa-times" aria-hidden="true"></i></span></a></li>
                                      <li class="right"><a><i class="fa fa-dot-circle-o" aria-hidden="true"></i> D . 123<span><i class="fa fa-check" aria-hidden="true"></i></span></a></li>
                                      <li class="wrong"><a><i class="fa fa-dot-circle-o" aria-hidden="true"></i> E . 123<span><i class="fa fa-times" aria-hidden="true"></i></span></a></li> -->


                                    </ul>



                                </div>



                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="hints text-center hideelement" id="hint<?php echo @$qstn_dtls[0]->id; ?>">
                                      <h5>Hints</h5>

                                        <?php echo @$qstn_dtls[0]->explanation; ?>
                                      <!-- <ul>
                                        <li><a><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Lorem ipsum dolor sit amet, consectetur.</a></li>
                                        <li><a><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Lorem ipsum dolor sit amet, consectetur.</a></li>
                                        <li><a><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Lorem ipsum dolor sit amet, consectetur.</a></li>
                                        <li><a><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Lorem ipsum dolor sit amet, consectetur.</a></li>
                                      
                                      </ul> -->



                                </div>
                            </div>

                        </div>


                  </div>

<?php $counter++; } }?>




                   <!-- <div class="quaton-bx">
                      <h4>Question: 2</h4>
                        <div class="setup">
                            <h1>A's income is Rs.140 more than B's income and C's income is Rs.80 more than ------------------------------?</h1>
                   
                            <div class="clearfix"></div>
                   
                   
                            <div class="col-md-6 col-sm-6 col-xs-12">
                   
                                <div class="ans">
                                    <ul>
                                      <li class="wrong"><a><i class="fa fa-dot-circle-o" aria-hidden="true"></i> A . 123<span><i class="fa fa-times" aria-hidden="true"></i></span></a></li>
                                      <li class="wrong"><a><i class="fa fa-dot-circle-o" aria-hidden="true"></i> B . 123<span><i class="fa fa-times" aria-hidden="true"></i></span></a></li>
                                      <li class="wrong"><a><i class="fa fa-dot-circle-o" aria-hidden="true"></i> C . 123<span><i class="fa fa-times" aria-hidden="true"></i></span></a></li>
                                      <li class="right"><a><i class="fa fa-dot-circle-o" aria-hidden="true"></i> D . 123<span><i class="fa fa-check" aria-hidden="true"></i></span></a></li>
                                      <li class="wrong"><a><i class="fa fa-dot-circle-o" aria-hidden="true"></i> E . 123<span><i class="fa fa-times" aria-hidden="true"></i></span></a></li>
                                    </ul>
                   
                   
                   
                                </div>
                   
                   
                   
                            </div>
                   
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="hints text-center">
                                      <h5>Hints</h5>
                   
                   
                                      <ul>
                                        <li><a><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Lorem ipsum dolor sit amet, consectetur.</a></li>
                                        <li><a><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Lorem ipsum dolor sit amet, consectetur.</a></li>
                                        <li><a><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Lorem ipsum dolor sit amet, consectetur.</a></li>
                                        <li><a><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Lorem ipsum dolor sit amet, consectetur.</a></li>
                   
                                      </ul>
                   
                   
                   
                                </div>
                            </div>
                   
                        </div>
                   
                   
                                     </div>
                   
                   <div class="quaton-bx">
                      <h4>Question: 3</h4>
                        <div class="setup">
                            <h1>A's income is Rs.140 more than B's income and C's income is Rs.80 more than ------------------------------?</h1>
                   
                            <div class="clearfix"></div>
                   
                   
                            <div class="col-md-6 col-sm-6 col-xs-12">
                   
                                <div class="ans">
                                    <ul>
                                      <li class="wrong"><a><i class="fa fa-dot-circle-o" aria-hidden="true"></i> A . 123<span><i class="fa fa-times" aria-hidden="true"></i></span></a></li>
                                      <li class="wrong"><a><i class="fa fa-dot-circle-o" aria-hidden="true"></i> B . 123<span><i class="fa fa-times" aria-hidden="true"></i></span></a></li>
                                      <li class="wrong"><a><i class="fa fa-dot-circle-o" aria-hidden="true"></i> C . 123<span><i class="fa fa-times" aria-hidden="true"></i></span></a></li>
                                      <li class="right"><a><i class="fa fa-dot-circle-o" aria-hidden="true"></i> D . 123<span><i class="fa fa-check" aria-hidden="true"></i></span></a></li>
                                      <li class="wrong"><a><i class="fa fa-dot-circle-o" aria-hidden="true"></i> E . 123<span><i class="fa fa-times" aria-hidden="true"></i></span></a></li>
                                    </ul>
                   
                   
                   
                                </div>
                   
                   
                   
                            </div>
                   
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="hints text-center">
                                      <h5>Hints</h5>
                   
                   
                                      <ul>
                                        <li><a><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Lorem ipsum dolor sit amet, consectetur.</a></li>
                                        <li><a><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Lorem ipsum dolor sit amet, consectetur.</a></li>
                                        <li><a><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Lorem ipsum dolor sit amet, consectetur.</a></li>
                                        <li><a><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Lorem ipsum dolor sit amet, consectetur.</a></li>
                   
                                      </ul>
                   
                   
                   
                                </div>
                            </div>
                   
                        </div>
                   
                   
                                     </div> -->

              </div>



            </div>


              <div class="col-md-6 col-sm-6 col-xs-12">
                <!--  <a href="#" class="btn read-btn pull-left">Your Mock Test Dashboard</a> -->
              </div>


              <div class="col-md-6 col-sm-6 col-xs-12">
                <!--  <a href="#" class="btn read-btn pull-right">Close</a> -->
              </div>

              </form>




            



          </div>

        


        

        
        







      </div>

  </div>
 </div>
</div>





<div id="feedback">
  <div id="feedback-form" style='display:none;' class="col-xs-4 col-md-4 panel panel-default">
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
  <div id="feedback-tab">Basic Calculator</div>
</div>





<button type="button" class="btn btn-info btn-lg basic-cal" data-toggle="modal" data-target="#basic-cal-modal">Basic Calculator</button>



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
 


 <script>
  function check_right_wrong(choice_id,q_id)
  {
   

   
    //alert(choice_id);
    //alert(q_id);


     if(choice_id!='' && q_id!='')
          {
            $.ajax(
                {
                    type: "POST",
                    dataType:'json',
                    url:"<?php echo base_url();?>index.php/Mock_test_header/check_current_option",
                    data: {optn: choice_id, qstn:q_id},
                    async: false,
                    success: function(data)
                    {
                      //alert(data);
                      //console.log(data);
                      //alert(data.answer.length);
                      //var perform=data.changedone;

                      //alert(perform);
                      if(data.status==1)
                      {
                        for(var i=0;i<data.answer.length;i++)
                        { var ch_id=data.answer[i];
                            $("#opt_"+ch_id).addClass('right');
                            $("#right_"+ch_id).removeClass('hideelement').addClass('showelement');
                        }
                       
                        $("#hint"+q_id).removeClass('hideelement').addClass('showelement');
                        $(".qstnoptn"+q_id).addClass('inactive-option');

                      }
                      else
                      {
                        $("#opt_"+choice_id).addClass('wrong');
                        $("#wrong_"+choice_id).removeClass('hideelement').addClass('showelement');
                      }

                    }
                });
          }
         
  }
</script>


 <script>

    function get_examination_from_group(value)
    {
      //alert(value);
          var html='  <option value="">----Select Examination Name------ </option>';
          if(value>0)
          {
            $.ajax(
                {
                    type: "POST",
                    dataType:'json',
                    url:"<?php echo base_url();?>index.php/Mock_test_header/get_exam",
                    data: {category_id: value},
                    async: false,
                    success: function(data)
                    {

                        //alert(data[0].category_id);
                        for(var i=0; i<data.length; i++)
                        {
                            html+='<option value="'+data[i].id+'">'+data[i].exam_name+'</option>';
                        }
                        //alert(html); 
                        $("#exam_name").html(html);

                    }
                });
          }
          else
          {
              $("#exam_name").html(html);
          }
    }
  </script>

  <script>
    function get_subject_name_from_exam(value)
    {
      var html='<option value="">----Select Examination Subject------ </option>';
          if(value>0)
          {
            $.ajax(
                {
                    type: "POST",
                    dataType:'json',
                    url:"<?php echo base_url();?>index.php/Mock_test_header/get_subjects",
                    data: {category_id: value},
                    async: false,
                    success: function(data)
                    {

                        //alert(data[0].category_id);
                        for(var i=0; i<data.length; i++)
                        {
                            html+='<option value="'+data[i].id+'">'+data[i].section_name+'</option>';
                        }
                        //alert(html); 
                        $("#sub_name").html(html);

                    }
                });
          }
          else
          {
              $("#sub_name").html(html);
          }
    }
  </script>


  <script>
    function fetch_question_list(value)
    {
      var exam_id=$("#exam_name").val();
      var section_id=value;

      //alert(exam_id);
      //alert(section_id);


      if(section_id>0 && exam_id>0)
          {
            $.ajax(
                {
                    type: "POST",
                    dataType:'html',
                    url:"<?php echo base_url();?>index.php/Mock_test_header/get_mock_question_list",
                    data: {sec_id: section_id, exam:exam_id},
                    async: false,
                    success: function(data)
                    {
                      //alert(data);

                       /* //alert(data[0].category_id);
                        for(var i=0; i<data.length; i++)
                        {
                            html+='<option value="'+data[i].id+'">'+data[i].section_name+'</option>';
                        }
                        //alert(html); */
                        $("#fetch_qstn").html(data);


                    }
                });
          }
    }
  </script>