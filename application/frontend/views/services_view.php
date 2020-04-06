<div class="all_top">
</div>


<!-- about banner section stert here -->


<section id="about_banner_sec">
  <div class="about_banner_part">
    <div class="about_b_img">
      <img src="assets/images/services_b.jpg" alt="about-b">
    </div>
    <div class="container">
      <div class="col-md-12">
        <div class="about_b_cont online_x">
          <h2>Services</h2>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- about banner section end here -->

<div class="services_part">
<div class="container main-container-home">
      <div class="col-md-12 col-sm-12 col-xs-12 text-center log-in">
        <!-- <h3>Services Click will Open</h3> -->
        <!-- <p>This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here.</p> -->

        <?php
              echo $pageContent[0]->page_content;
              ?>
      </div>

      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="about-exam faq analysis-block">


            <div class="panel-group" id="accordion">

 
           <!--  <div class="panel panel-default">
              <div class="panel-heading  wrong-bg color_af active">
                <h4 class="panel-title color_c">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapse48">01. Career Counselling</a>
                </h4>
              </div>
              <div id="collapse48" class="panel-collapse collapse in">
                <div class="panel-body">
                <ul class="option-list">
                    <li>This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. </li>
                    <li>This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. </li>
                   </ul>
              </div>
            </div>
          </div>
 -->
           
            <?php foreach ($service as $key=> $value) { ?>

           <!--  <div class="panel-group" id="accordion"> -->

 
 
            <div class="panel panel-default">
              <div <?php if(@$key==0){?> class="panel-heading  wrong-bg color_af   active" <?php } else{ ?> class="panel-heading  wrong-bg color_af"<?php } ?> >
                <h4 class="panel-title color_c">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo @$value->service_id; ?>"><?php echo $value->service_title; ?></a>
                </h4>
              </div>
              <div id="collapse<?php echo @$value->service_id; ?>" <?php if(@$key==0){?> class="panel-collapse collapse in" <?php } else{ ?> class="panel-collapse collapse " <?php } ?> >
                <div class="panel-body">
                <ul class="option-list">
                    <li><?php echo $value->service_description; ?> </li>
                    <!-- <li>This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. </li> -->
                   </ul>
              </div>
            </div>
          </div>

        <?php } ?>

           
           <!--  <div class="panel panel-default">
              <div class="panel-heading  wrong-bg color_af ">
                <h4 class="panel-title color_c">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapse50">03. This is demo Title</a>
                </h4>
              </div>
              <div id="collapse50" class="panel-collapse collapse ">
                <div class="panel-body">
                <ul class="option-list">
                    <li>This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. </li>
                    <li>This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. </li>
                   </ul>
                
              </div>
            </div>
          </div>

           
            <div class="panel panel-default">
              <div class="panel-heading  wrong-bg color_af ">
                <h4 class="panel-title color_c">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapse51">04. This is demo Title</a>
                </h4>
              </div>
              <div id="collapse51" class="panel-collapse collapse ">
                <div class="panel-body">
                <ul class="option-list">
                    <li>This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. </li>
                    <li>This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. This is Demo Text Here. </li>
                   </ul>
               
              </div>
            </div>
          </div> -->

            

       
       

          






       <!-- <div class="back-block">
        <a href="http://192.168.0.12/eduguide/site/dashboard" class="pull-right gall_back"><i class="fa fa-chevron-right" aria-hidden="true"></i>Go to Dashboard</a> </div> -->

  </div>
  </div>
</div>
</div>
</div>