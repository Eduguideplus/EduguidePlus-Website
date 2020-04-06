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
  		<div class="col-md-12 col-sm-12 col-xs-12 text-center log-in head-section">
  			<h3><?php echo @$exam_dtls[0]->exam_name; ?> Examination</h3>
        <ul class="chapter">
          <li><a><?php echo @$exam_dtls[0]->description; ?></a></li>
       <!--    <li><a>10th Standard</a></li>
       <li><a>Secondary</a></li> -->
        </ul>

        <h6>Examination Group Name: <?php echo @$group_dtls[0]->exam_name; ?> Group</h6>
  		</div>

  		<div class="col-md-10 col-sm-12 col-xs-12 col-md-offset-1">

  				<div class="examination-bx">

           
              <ul class="nav nav-tabs">

                <?php
                $counter=1; 
                foreach($subjects as $sub){

                ?>

                <li <?php if($counter==1){echo 'class="active"'; }?> ><a data-toggle="tab" href="#<?php echo 'menu'.$sub->id; ?>"><?php echo $sub->section_name; ?></a></li>

                <?php $counter=$counter+1; } ?>
                 <!--  <li class="active"><a data-toggle="tab" href="#home">Physics</a></li>
                 <li><a data-toggle="tab" href="#menu1">Chemistry</a></li>
                 <li><a data-toggle="tab" href="#menu2">Mathematics</a></li> -->
                </ul>

                <div class="tab-content">

             <?php
                $counter=1; 
                foreach($subjects as $sub){

                  $sub_id=$sub->id;

                ?>

                  <div id="menu<?php echo @$sub->id; ?>" class="tab-pane fade <?php if($counter==1){echo 'in active'; }?>">

                <?php

                $chapters=$this->common_model->common($table_name = 'tbl_chapters', $field = array(), $where = array('sub_id'=> $sub_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

                if(count($chapters)>0)
                {
                  $counter_chap=1;
                  foreach($chapters as $chap)
                  {




                ?>
                      <div class="col-md-3 col-sm-4 col-xs-12 res767-wid-50">
                        <div class="chapter-bx">
                          <h4 title="<?php echo @$chap->chap_name; ?>"><?php if(strlen($chap->chap_name)>20){echo substr(@$chap->chap_name, 0, 20).'..';}else{echo @$chap->chap_name;} ?></h4>

                            <ul>
                              <li><a href="<?php echo $this->url->link(86); ?>" <?php if($counter!=1 || $counter_chap!=1){echo 'class="not-active-user"';}?>>Practice Test - 1</a></li>
                              <li><a href="javascript:void(0)" class="not-active-user">Practice Test - 2</a></li>
                              <li><a href="javascript:void(0)" class="not-active-user" >Practice Test - 3</a></li>
                            </ul>


                        </div>

                      </div>


                      <?php $counter_chap=$counter_chap+1;} }?>




                      <!-- <div class="col-md-3 col-sm-4 col-xs-12 res767-wid-50">
                        <div class="chapter-bx">
                          <h4>Chapter -2</h4>
                      
                            <ul>
                              <li><a href="#">Practice Test - 1</a></li>
                              <li><a href="#">Practice Test - 2</a></li>
                              <li><a href="#">Practice Test - 3</a></li>
                            </ul>
                      
                      
                        </div>
                      
                      </div>
                      <div class="col-md-3 col-sm-4 col-xs-12 res767-wid-50">
                        <div class="chapter-bx">
                          <h4>Chapter -3</h4>
                      
                            <ul>
                              <li><a href="#">Practice Test - 1</a></li>
                              <li><a href="#">Practice Test - 2</a></li>
                              <li><a href="#">Practice Test - 3</a></li>
                            </ul>
                      
                      
                        </div>
                      
                      </div>
                      <div class="col-md-3 col-sm-4 col-xs-12 res767-wid-50">
                        <div class="chapter-bx">
                          <h4>Chapter -4</h4>
                      
                            <ul>
                              <li><a href="#">Practice Test - 1</a></li>
                              <li><a href="#">Practice Test - 2</a></li>
                              <li><a href="#">Practice Test - 3</a></li>
                            </ul>
                      
                      
                        </div>
                      
                      </div>
                      
                      <div class="col-md-3 col-sm-4 col-xs-12 res767-wid-50">
                        <div class="chapter-bx">
                          <h4>Chapter -5</h4>
                      
                            <ul>
                              <li><a href="#">Practice Test - 1</a></li>
                              <li><a href="#">Practice Test - 2</a></li>
                              <li><a href="#">Practice Test - 3</a></li>
                            </ul>
                      
                      
                        </div>
                      
                      </div>
                      <div class="col-md-3 col-sm-4 col-xs-12 res767-wid-50">
                        <div class="chapter-bx">
                          <h4>Chapter -6</h4>
                      
                            <ul>
                              <li><a href="#">Practice Test - 1</a></li>
                              <li><a href="#">Practice Test - 2</a></li>
                              <li><a href="#">Practice Test - 3</a></li>
                            </ul>
                      
                      
                        </div>
                      
                      </div>
                      <div class="col-md-3 col-sm-4 col-xs-12 res767-wid-50">
                        <div class="chapter-bx">
                          <h4>Chapter -7</h4>
                      
                            <ul>
                              <li><a href="#">Practice Test - 1</a></li>
                              <li><a href="#">Practice Test - 2</a></li>
                              <li><a href="#">Practice Test - 3</a></li>
                            </ul>
                      
                      
                        </div>
                      
                      </div>
                      <div class="col-md-3 col-sm-4 col-xs-12 res767-wid-50">
                        <div class="chapter-bx">
                          <h4>Chapter -8</h4>
                      
                            <ul>
                              <li><a href="#">Practice Test - 1</a></li>
                              <li><a href="#">Practice Test - 2</a></li>
                              <li><a href="#">Practice Test - 3</a></li>
                            </ul>
                      
                      
                        </div>
                      
                      </div>
                      
                      
                      <div class="col-md-3 col-sm-4 col-xs-12 res767-wid-50">
                        <div class="chapter-bx">
                          <h4>Chapter -9</h4>
                      
                            <ul>
                              <li><a href="#">Practice Test - 1</a></li>
                              <li><a href="#">Practice Test - 2</a></li>
                              <li><a href="#">Practice Test - 3</a></li>
                            </ul>
                      
                      
                        </div>
                      
                      </div>
                      <div class="col-md-3 col-sm-4 col-xs-12 res767-wid-50">
                        <div class="chapter-bx">
                          <h4>Chapter -10</h4>
                      
                            <ul>
                              <li><a href="#">Practice Test - 1</a></li>
                              <li><a href="#">Practice Test - 2</a></li>
                              <li><a href="#">Practice Test - 3</a></li>
                            </ul>
                      
                      
                        </div>
                      
                      </div>
                      <div class="col-md-3 col-sm-4 col-xs-12 res767-wid-50">
                        <div class="chapter-bx">
                          <h4>Chapter -11</h4>
                      
                            <ul>
                              <li><a href="#">Practice Test - 1</a></li>
                              <li><a href="#">Practice Test - 2</a></li>
                              <li><a href="#">Practice Test - 3</a></li>
                            </ul>
                      
                      
                        </div>
                      
                      </div>
                      <div class="col-md-3 col-sm-4 col-xs-12 res767-wid-50">
                        <div class="chapter-bx">
                          <h4>Chapter -12</h4>
                      
                            <ul>
                              <li><a href="#">Practice Test - 1</a></li>
                              <li><a href="#">Practice Test - 2</a></li>
                              <li><a href="#">Practice Test - 3</a></li>
                            </ul>
                      
                      
                        </div>
                      
                      </div>
                      <div class="col-md-3 col-sm-4 col-xs-12 res767-wid-50">
                        <div class="chapter-bx">
                          <h4>Chapter -13</h4>
                      
                            <ul>
                              <li><a href="#">Practice Test - 1</a></li>
                              <li><a href="#">Practice Test - 2</a></li>
                              <li><a href="#">Practice Test - 3</a></li>
                            </ul>
                      
                      
                        </div>
                      
                      </div>
                      <div class="col-md-3 col-sm-4 col-xs-12 res767-wid-50">
                        <div class="chapter-bx">
                          <h4>Chapter -14</h4>
                      
                            <ul>
                              <li><a href="#">Practice Test - 1</a></li>
                              <li><a href="#">Practice Test - 2</a></li>
                              <li><a href="#">Practice Test - 3</a></li>
                            </ul>
                      
                      
                        </div>
                      
                      </div>
                      <div class="col-md-3 col-sm-4 col-xs-12 res767-wid-50">
                        <div class="chapter-bx">
                          <h4>Chapter -15</h4>
                      
                            <ul>
                              <li><a href="#">Practice Test - 1</a></li>
                              <li><a href="#">Practice Test - 2</a></li>
                              <li><a href="#">Practice Test - 3</a></li>
                            </ul>
                      
                      
                        </div>
                      
                      </div>
                      <div class="col-md-3 col-sm-4 col-xs-12 res767-wid-50">
                        <div class="chapter-bx">
                          <h4>Chapter -16</h4>
                      
                            <ul>
                              <li><a href="#">Practice Test - 1</a></li>
                              <li><a href="#">Practice Test - 2</a></li>
                              <li><a href="#">Practice Test - 3</a></li>
                            </ul>
                      
                      
                        </div>
                      
                      </div> -->
                  </div>


              <?php $counter=$counter+1;} ?>



                  <!-- <div id="menu1" class="tab-pane fade">
                    <div class="col-md-3 col-sm-4 col-xs-12 res767-wid-50">
                        <div class="chapter-bx">
                          <h4>Chapter -1</h4>
                  
                            <ul>
                              <li><a href="#">Practice Test - 1</a></li>
                              <li><a href="#">Practice Test - 2</a></li>
                              <li><a href="#">Practice Test - 3</a></li>
                            </ul>
                  
                  
                        </div>
                  
                      </div>
                      <div class="col-md-3 col-sm-4 col-xs-12 res767-wid-50">
                        <div class="chapter-bx">
                          <h4>Chapter -2</h4>
                  
                            <ul>
                              <li><a href="#">Practice Test - 1</a></li>
                              <li><a href="#">Practice Test - 2</a></li>
                              <li><a href="#">Practice Test - 3</a></li>
                            </ul>
                  
                  
                        </div>
                  
                      </div>
                      <div class="col-md-3 col-sm-4 col-xs-12 res767-wid-50">
                        <div class="chapter-bx">
                          <h4>Chapter -3</h4>
                  
                            <ul>
                              <li><a href="#">Practice Test - 1</a></li>
                              <li><a href="#">Practice Test - 2</a></li>
                              <li><a href="#">Practice Test - 3</a></li>
                            </ul>
                  
                  
                        </div>
                  
                      </div>
                      <div class="col-md-3 col-sm-4 col-xs-12 res767-wid-50">
                        <div class="chapter-bx">
                          <h4>Chapter -4</h4>
                  
                            <ul>
                              <li><a href="#">Practice Test - 1</a></li>
                              <li><a href="#">Practice Test - 2</a></li>
                              <li><a href="#">Practice Test - 3</a></li>
                            </ul>
                  
                  
                        </div>
                  
                      </div>
                  
                      <div class="col-md-3 col-sm-4 col-xs-12 res767-wid-50">
                        <div class="chapter-bx">
                          <h4>Chapter -5</h4>
                  
                            <ul>
                              <li><a href="#">Practice Test - 1</a></li>
                              <li><a href="#">Practice Test - 2</a></li>
                              <li><a href="#">Practice Test - 3</a></li>
                            </ul>
                  
                  
                        </div>
                  
                      </div>
                      <div class="col-md-3 col-sm-4 col-xs-12 res767-wid-50">
                        <div class="chapter-bx">
                          <h4>Chapter -6</h4>
                   
                            <ul>
                              <li><a href="#">Practice Test - 1</a></li>
                              <li><a href="#">Practice Test - 2</a></li>
                              <li><a href="#">Practice Test - 3</a></li>
                            </ul>
                  
                  
                        </div>
                  
                      </div>
                      <div class="col-md-3 col-sm-4 col-xs-12 res767-wid-50">
                        <div class="chapter-bx">
                          <h4>Chapter -7</h4>
                  
                            <ul>
                              <li><a href="#">Practice Test - 1</a></li>
                              <li><a href="#">Practice Test - 2</a></li>
                              <li><a href="#">Practice Test - 3</a></li>
                            </ul>
                  
                  
                        </div>
                  
                      </div>
                      <div class="col-md-3 col-sm-4 col-xs-12 res767-wid-50">
                        <div class="chapter-bx">
                          <h4>Chapter -8</h4>
                  
                            <ul>
                              <li><a href="#">Practice Test - 1</a></li>
                              <li><a href="#">Practice Test - 2</a></li>
                              <li><a href="#">Practice Test - 3</a></li>
                            </ul>
                  
                  
                        </div>
                  
                      </div>
                  
                  
                      <div class="col-md-3 col-sm-4 col-xs-12 res767-wid-50">
                        <div class="chapter-bx">
                          <h4>Chapter -9</h4>
                  
                            <ul>
                              <li><a href="#">Practice Test - 1</a></li>
                              <li><a href="#">Practice Test - 2</a></li>
                              <li><a href="#">Practice Test - 3</a></li>
                            </ul>
                  
                  
                        </div>
                  
                      </div>
                      <div class="col-md-3 col-sm-4 col-xs-12 res767-wid-50">
                        <div class="chapter-bx">
                          <h4>Chapter -10</h4>
                  
                            <ul>
                              <li><a href="#">Practice Test - 1</a></li>
                              <li><a href="#">Practice Test - 2</a></li>
                              <li><a href="#">Practice Test - 3</a></li>
                            </ul>
                  
                  
                        </div>
                  
                      </div>
                      <div class="col-md-3 col-sm-4 col-xs-12 res767-wid-50">
                        <div class="chapter-bx">
                          <h4>Chapter -11</h4>
                  
                            <ul>
                              <li><a href="#">Practice Test - 1</a></li>
                              <li><a href="#">Practice Test - 2</a></li>
                              <li><a href="#">Practice Test - 3</a></li>
                            </ul>
                  
                  
                        </div>
                  
                      </div>
                      <div class="col-md-3 col-sm-4 col-xs-12 res767-wid-50">
                        <div class="chapter-bx">
                          <h4>Chapter -12</h4>
                  
                            <ul>
                              <li><a href="#">Practice Test - 1</a></li>
                              <li><a href="#">Practice Test - 2</a></li>
                              <li><a href="#">Practice Test - 3</a></li>
                            </ul>
                  
                  
                        </div>
                  
                      </div>
                      <div class="col-md-3 col-sm-4 col-xs-12 res767-wid-50">
                        <div class="chapter-bx">
                          <h4>Chapter -13</h4>
                  
                            <ul>
                              <li><a href="#">Practice Test - 1</a></li>
                              <li><a href="#">Practice Test - 2</a></li>
                              <li><a href="#">Practice Test - 3</a></li>
                            </ul>
                  
                  
                        </div>
                  
                      </div>
                      <div class="col-md-3 col-sm-4 col-xs-12 res767-wid-50">
                        <div class="chapter-bx">
                          <h4>Chapter -14</h4>
                  
                            <ul>
                              <li><a href="#">Practice Test - 1</a></li>
                              <li><a href="#">Practice Test - 2</a></li>
                              <li><a href="#">Practice Test - 3</a></li>
                            </ul>
                  
                  
                        </div>
                  
                      </div>
                      <div class="col-md-3 col-sm-4 col-xs-12 res767-wid-50">
                        <div class="chapter-bx">
                          <h4>Chapter -15</h4>
                  
                            <ul>
                              <li><a href="#">Practice Test - 1</a></li>
                              <li><a href="#">Practice Test - 2</a></li>
                              <li><a href="#">Practice Test - 3</a></li>
                            </ul>
                  
                  
                        </div>
                  
                      </div>
                      <div class="col-md-3 col-sm-4 col-xs-12 res767-wid-50">
                        <div class="chapter-bx">
                          <h4>Chapter -16</h4>
                  
                            <ul>
                              <li><a href="#">Practice Test - 1</a></li>
                              <li><a href="#">Practice Test - 2</a></li>
                              <li><a href="#">Practice Test - 3</a></li>
                            </ul>
                  
                  
                        </div>
                  
                      </div>
                  </div>
                  <div id="menu2" class="tab-pane fade">
                    <div class="col-md-3 col-sm-4 col-xs-12 res767-wid-50">
                        <div class="chapter-bx">
                          <h4>Chapter -1</h4>
                  
                            <ul>
                              <li><a href="#">Practice Test - 1</a></li>
                              <li><a href="#">Practice Test - 2</a></li>
                              <li><a href="#">Practice Test - 3</a></li>
                            </ul>
                  
                  
                        </div>
                  
                      </div>
                      <div class="col-md-3 col-sm-4 col-xs-12 res767-wid-50">
                        <div class="chapter-bx">
                          <h4>Chapter -2</h4>
                  
                            <ul>
                              <li><a href="#">Practice Test - 1</a></li>
                              <li><a href="#">Practice Test - 2</a></li>
                              <li><a href="#">Practice Test - 3</a></li>
                            </ul>
                  
                  
                        </div>
                  
                      </div>
                      <div class="col-md-3 col-sm-4 col-xs-12 res767-wid-50">
                        <div class="chapter-bx">
                          <h4>Chapter -3</h4>
                  
                            <ul>
                              <li><a href="#">Practice Test - 1</a></li>
                              <li><a href="#">Practice Test - 2</a></li>
                              <li><a href="#">Practice Test - 3</a></li>
                            </ul>
                  
                  
                        </div>
                  
                      </div>
                      <div class="col-md-3 col-sm-4 col-xs-12 res767-wid-50">
                        <div class="chapter-bx">
                          <h4>Chapter -4</h4>
                  
                            <ul>
                              <li><a href="#">Practice Test - 1</a></li>
                              <li><a href="#">Practice Test - 2</a></li>
                              <li><a href="#">Practice Test - 3</a></li>
                            </ul>
                  
                  
                        </div>
                  
                      </div>
                  
                      <div class="col-md-3 col-sm-4 col-xs-12 res767-wid-50">
                        <div class="chapter-bx">
                          <h4>Chapter -5</h4>
                  
                            <ul>
                              <li><a href="#">Practice Test - 1</a></li>
                              <li><a href="#">Practice Test - 2</a></li>
                              <li><a href="#">Practice Test - 3</a></li>
                            </ul>
                  
                  
                        </div>
                  
                      </div>
                      <div class="col-md-3 col-sm-4 col-xs-12 res767-wid-50">
                        <div class="chapter-bx">
                          <h4>Chapter -6</h4>
                  
                            <ul>
                              <li><a href="#">Practice Test - 1</a></li>
                              <li><a href="#">Practice Test - 2</a></li>
                              <li><a href="#">Practice Test - 3</a></li>
                            </ul>
                  
                  
                        </div>
                  
                      </div>
                      <div class="col-md-3 col-sm-4 col-xs-12 res767-wid-50">
                        <div class="chapter-bx">
                          <h4>Chapter -7</h4>
                  
                            <ul>
                              <li><a href="#">Practice Test - 1</a></li>
                              <li><a href="#">Practice Test - 2</a></li>
                              <li><a href="#">Practice Test - 3</a></li>
                            </ul>
                  
                  
                        </div>
                  
                      </div>
                      <div class="col-md-3 col-sm-4 col-xs-12 res767-wid-50">
                        <div class="chapter-bx">
                          <h4>Chapter -8</h4>
                  
                            <ul>
                              <li><a href="#">Practice Test - 1</a></li>
                              <li><a href="#">Practice Test - 2</a></li>
                              <li><a href="#">Practice Test - 3</a></li>
                            </ul>
                  
                  
                        </div>
                  
                      </div>
                  
                  
                      <div class="col-md-3 col-sm-4 col-xs-12 res767-wid-50">
                        <div class="chapter-bx">
                          <h4>Chapter -9</h4>
                  
                            <ul>
                              <li><a href="#">Practice Test - 1</a></li>
                              <li><a href="#">Practice Test - 2</a></li>
                              <li><a href="#">Practice Test - 3</a></li>
                            </ul>
                  
                  
                        </div>
                  
                      </div>
                      <div class="col-md-3 col-sm-4 col-xs-12 res767-wid-50">
                        <div class="chapter-bx">
                          <h4>Chapter -10</h4>
                  
                            <ul>
                              <li><a href="#">Practice Test - 1</a></li>
                              <li><a href="#">Practice Test - 2</a></li>
                              <li><a href="#">Practice Test - 3</a></li>
                            </ul>
                  
                  
                        </div>
                  
                      </div>
                      <div class="col-md-3 col-sm-4 col-xs-12 res767-wid-50">
                        <div class="chapter-bx">
                          <h4>Chapter -11</h4>
                  
                            <ul>
                              <li><a href="#">Practice Test - 1</a></li>
                              <li><a href="#">Practice Test - 2</a></li>
                              <li><a href="#">Practice Test - 3</a></li>
                            </ul>
                  
                  
                        </div>
                  
                      </div>
                      <div class="col-md-3 col-sm-4 col-xs-12 res767-wid-50">
                        <div class="chapter-bx">
                          <h4>Chapter -12</h4>
                  
                            <ul>
                              <li><a href="#">Practice Test - 1</a></li>
                              <li><a href="#">Practice Test - 2</a></li>
                              <li><a href="#">Practice Test - 3</a></li>
                            </ul>
                  
                  
                        </div>
                  
                      </div>
                      <div class="col-md-3 col-sm-4 col-xs-12 res767-wid-50">
                        <div class="chapter-bx">
                          <h4>Chapter -13</h4>
                  
                            <ul>
                              <li><a href="#">Practice Test - 1</a></li>
                              <li><a href="#">Practice Test - 2</a></li>
                              <li><a href="#">Practice Test - 3</a></li>
                            </ul>
                  
                  
                        </div>
                  
                      </div>
                      <div class="col-md-3 col-sm-4 col-xs-12 res767-wid-50">
                        <div class="chapter-bx">
                          <h4>Chapter -14</h4>
                  
                            <ul>
                              <li><a href="#">Practice Test - 1</a></li>
                              <li><a href="#">Practice Test - 2</a></li>
                              <li><a href="#">Practice Test - 3</a></li>
                            </ul>
                  
                  
                        </div>
                  
                      </div>
                      <div class="col-md-3 col-sm-4 col-xs-12 res767-wid-50">
                        <div class="chapter-bx">
                          <h4>Chapter -15</h4>
                  
                            <ul>
                              <li><a href="#">Practice Test - 1</a></li>
                              <li><a href="#">Practice Test - 2</a></li>
                              <li><a href="#">Practice Test - 3</a></li>
                            </ul>
                  
                  
                        </div>
                  
                      </div>
                      <div class="col-md-3 col-sm-4 col-xs-12 res767-wid-50">
                        <div class="chapter-bx">
                          <h4>Chapter -16</h4>
                  
                            <ul>
                              <li><a href="#">Practice Test - 1</a></li>
                              <li><a href="#">Practice Test - 2</a></li>
                              <li><a href="#">Practice Test - 3</a></li>
                            </ul>
                  
                  
                        </div>
                  
                      </div>
                  </div> -->






                </div>

  					



  				</div>

  			


        

        
  			







  		</div>

  </div>
 </div>
</div>