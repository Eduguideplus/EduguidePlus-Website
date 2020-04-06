  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-5166643241987864",
    enable_page_level_ads: true
  });
</script>


<div class="header_banner">
         <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators res-dot">
    <?php 
      foreach($slider as $key=>$row)
      {
     ?>
    <li data-target="#myCarousel" data-slide-to="<?php echo $key;?>" class="<?php if($key==0) { ?>active  <?php } ?>"></li>
    <?php
  }
  ?>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
<?php 
foreach($slider as $key=>$row)
{
?>
    <div class="item <?php if($key==0){ ?>active <?php } ?>">
      <img src="<?php echo base_url()?>assets/uploads/slider/<?php echo $row->image;?>" alt="Los Angeles">
        <div class="overlay"></div>
       <div class="container slogan">
        <div class="col-lg-12">
         <h1 class="animated fadeInDown">
        <?php echo $row->title_1;?></h1>
          <h3 class="text-center"><?php echo $row->title_2;?></h3>
          <!-- <a href="<?php echo $row->button_link;?>"><?php echo $row->button_title;?></a> -->
        </div>

      </div>
    </div>
    <?php
  }
  ?>
  </div>
 

  <!-- Left and right controls -->

</div>
          
</div>
      




<div class="Welcome_section">
      <div class="container">
        <div class="rt-grid-12 rt-alpha rt-omega">
               <div class="rt-block  about-us">
            <div class="module-surround">
                                  <div class="module-content">
                      

                        <div class="custom about-us">
                          <h4> <?php if(@$welcome_content[0]->title !=''){ echo @$welcome_content[0]->title; } else{ echo 'N/A'; }?></h4>
                          <!-- <p>Eduguideplus is a renowned and established educational consultant in India.</p>
                          <p>We enable students to pursue their career in medical, engineering, BBA, MBA, nursing by studying in India and abroad. Education is the key to a bright and successful future. we believe in the motto "Education for all" keeping strictly to this motto our team of experts guide young aspiring students towards a brighter prospect. </p> -->

                          <?php if(@$welcome_content[0]->content !=''){ echo @$welcome_content[0]->content; } else{ echo 'N/A'; }?>
                        </div>
                    </div>
                  </div>
           </div>
  
          </div>
      </div>
    </div>


<section id="career_guide_sec">
  <div class="career_guide_part">
    <div class="container">
      <div class="col-md-12">
        <div class="row">

           <div class="courses-area">
            <h2 class="head-title text-center"> Career Guide</h2>
          </div>


          <div class="col-md-3 box_width_f">
            <a href="<?php echo $this->url->link(149);?>">
              <div class="career_guide_box">
                <div class="career_icon">
                  <img src="assets/images/icon1.png" alt="icon1">
                </div>
                <div class="career_cont">
                  <h3>Course & Colleges</h3>
                </div>
              </div>
            </a>
          </div>

          <div class="col-md-3 box_width_f">
            <a href="<?php echo $this->url->link(131); ?>">
              <div class="career_guide_box">
                <div class="career_icon">
                  <img src="assets/images/icon2.png" alt="icon2">
                </div>
                <div class="career_cont">
                  <h3>Online Exam</h3>
                </div>
              </div>
            </a>
          </div>

          <div class="col-md-3 box_width_f">
            <a href="<?php echo $this->url->link(154);?>">
              <div class="career_guide_box">
                <div class="career_icon">
                  <img src="assets/images/icon3.png" alt="icon3">
                </div>
                <div class="career_cont">
                  <h3>Services</h3>
                </div>
              </div>
            </a>
          </div>

          <div class="col-md-3 box_width_f">
            <a href="<?php echo $this->url->link(155);?>">
              <div class="career_guide_box">
                <div class="career_icon">
                  <img src="assets/images/icon4.png" alt="icon4">
                </div>
                <div class="career_cont">
                  <h3>Study Abroad</h3>
                </div>
              </div>
            </a>
          </div>

          <div class="col-md-3 box_width_f">
            <a href="<?php echo $this->url->link(151);?>">
              <div class="career_guide_box">
                <div class="career_icon">
                  <img src="assets/images/videotu.png" alt="videotu">
                </div>
                <div class="career_cont">
                  <h3>Video Tutorials</h3>
                </div>
              </div>
            </a>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>


<!-- start new slider -->
<section class="testimonial2">
  
<h2 class="text-center"> Our Experties </h2>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="carousel slide" data-ride="carousel" id="quote-carousel">
      
<!-- Bottom Carousel Indicators -->
<ol class="carousel-indicators">
  <li data-target="#quote-carousel" data-slide-to="0" class="active"></li>
  <li data-target="#quote-carousel" data-slide-to="1"></li>
  <!-- <li data-target="#quote-carousel" data-slide-to="2"></li> -->
</ol>
        
<!-- Carousel Slides / Quotes -->
<div class="carousel-inner">

<!-- Quote 1 -->
<div class="item active">
  <div class="row">
    <div class="col-sm-12">
      <p>&ldquo;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sed diam eget risus varius blandit sit amet non magna. Etiam porta sem malesuada magna mollis euismod. Nulla vitae elit libero, a pharetra augue. Donec id elit non mi porta gravida at eget metus.&rdquo;</p>
      <div class="round-image">
        <img src="<?php echo base_url(); ?>assets/uploads/testimonial/1574153813.jpg" alt="Photo">
      </div>
      <h5>Arman Ali</h5>
      <h6>Kolkata</h6>
    </div>
  </div>
</div>

<!-- Quote 2 -->
<div class="item">
  <div class="row">
    <div class="col-sm-12">
      <p>&ldquo;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sed diam eget risus varius blandit sit amet non magna. Etiam porta sem malesuada magna mollis euismod. Nulla vitae elit libero, a pharetra augue. Donec id elit non mi porta gravida at eget metus.&rdquo;</p>
      <div class="round-image">
        <img src="<?php echo base_url(); ?>assets/uploads/testimonial/1574154097.jpg" alt="Photo">
      </div>
       <h5>Nayan Sardar</h5>
      <h6>Kolkata</h6>
    </div>
  </div>
</div>


  
</div>
        

      </div>                          
    </div>
  </div>
</div>
</section>


<!-- <div class="why_us">
  <div class="container">
    <div class="row">
      <div class="col-md-6 p-no">
        <div class="tab_menu">
          <div><h2>Why Us</h2></div>
          <div class="panel with-nav-tabs panel-default">

                <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#<?php echo $why_us[0]->title;?>" data-toggle="tab"><?php echo $why_us[0]->title;?></a></li>
                            <li><a href="#<?php echo $why_us[1]->title;?>" data-toggle="tab"><?php echo $why_us[1]->title;?></a></li>
                            <li><a href="#<?php echo $why_us[2]->title;?>" data-toggle="tab"><?php echo $why_us[2]->title;?></a></li>

                        </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="<?php echo $why_us[0]->title;?>">
                          <?php echo $why_us[0]->content; ?>
                        </div>
                        <div class="tab-pane fade" id="<?php echo $why_us[1]->title; ?>">
                          <?php echo $why_us[1]->content; ?>
                        </div>
                        <div class="tab-pane fade" id="<?php echo $why_us[2]->title; ?>">
                          <?php echo $why_us[2]->content; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="tab_menu">
          <div><h2>Our Philosophy</h2></div>
          <div class="panel-group wrap" id="accordion" role="tablist" aria-multiselectable="true">
            <?php 
              $i=0;
              foreach($philosophy as $key=>$row)
              {
                $i++;
              ?> 

      <div class="panel">
        <div class="panel-heading" role="tab" id="headingOne">
          <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $key;?>" aria-expanded="true" aria-controls="collapseOne">
          <?php echo $row->title;?>
        </a>
      </h4>
        </div>
        <div id="collapse<?php echo $key;?>" class="panel-collapse collapse <?php if($key==0){ echo 'in';} ?> " role="tabpanel" aria-labelledby="headingOne">
          <div class="panel-body">
           <?php echo $row->content;?>
          </div>
        </div>
      </div>
      <?php
    }
    ?>
  </div>
        </div>
      </div>
    </div>
  </div>
</div> -->



<!-- <div class="starttest add_sec">

  <div class="container">
    <div class="row">
      <div class="nopad test-app courses-area">
        <h2 class="head-title text-center"> Services Basket</h2>
      </div>
    <div class="modcontent clearfix">    
                    <div id="basket-testimonials" class="owl-carousel">
                        
                        <?php 
                        foreach($service as $ser)
                        {
                          if($ser->service_title=='TRAINING')
                          {
                            $link=$this->url->link(131);
                          }
                          else if($ser->service_title=='FINANCIAL SOLUTIONS')
                          {
                            $link=$this->url->link(149);
                          }
                          else{
                            $link=$this->url->link(150);
                          }
                          ?>
                        <div class="item">
                            <div class="add_img">
                              <a href="<?php echo $link; ?>">
                            <img src="<?php echo base_url();?>assets/uploads/service_basket/<?php echo  $ser->service_icon;?>">
                            </a>
                           </div>
                           <div class="add_info">
                            <a href="<?php echo $link; ?>"><h3><?php echo $ser->service_title;?></h3></a>
                           </div>
                        </div>
                        <?php
                      }
                      ?>
                        
          </div>
    </div>
  </div>
</div>

</div> -->




<!-- <div class="examinations">
 
</div>
 -->


<!-- <section class="fact text-center">
  <div class="container-fluid bluesection">
 <div class="row">
  

   <div class="container main-container" id="cjobs">
     <div class="col-xs-12">
      
      <ul id="counter">
       
          <h3>Our Records</h3>
       <li class="col-md-3 col-sm-6 col-xs-12 mt-btn-20 res767-wid-50">
        <div class="counter-single">
          <img src="<?php echo base_url()?>assets/images/fact-3.png" class="img-responsive">
        <div class="count"><div class=""><?php echo @$records[0]->record_1_count; ?></div></div><span><?php echo @$records[0]->record_1_title; ?></span>
      </div>
      </li>
       <li class="col-md-3 col-sm-6 col-xs-12 mt-btn-20 res767-wid-50">
        <div class="counter-single">
        <img src="<?php echo base_url()?>assets/images/aua.png" class="img-responsive">
        <div class="count"><div class=""><?php echo @$records[0]->record_2_count; ?></div></div><span><?php echo @$records[0]->record_2_title; ?></span>
      </div>
      </li>
       <li class="col-md-3 col-sm-6 col-xs-12 mt-btn-10 res767-wid-50">
        <div class="counter-single">
        <img src="<?php echo base_url()?>assets/images/fact-1.png" class="img-responsive">
        <div class="count"><div class=""><?php echo @$records[0]->record_3_count; ?></div></div><span><?php echo @$records[0]->record_3_title; ?></span>
      </div>
      </li>
      <li class="col-md-3 col-sm-6 col-xs-12 mt-btn-10 res767-wid-50">
        <div class="counter-single">
        <img src="<?php echo base_url()?>assets/images/fact-2.png" class="img-responsive">
        <div class="count"><div class=""><?php echo @$records[0]->record_4_count; ?></div></div><span><?php echo @$records[0]->record_4_title; ?></span>
      </div>
      </li>
  

     </ul>                
   </div>

 </div>
</div>
</div>
</section> -->








<!-- news event start here -->


<section id="news_event_sec">
  <div class="news_event_part" style="background: url(assets/images/pattern.png);">
    <div class="container">
      <div class="col-md-12">
        <div class="row">

          <div class="courses-area">
            <h2 class="head-title text-center">News and Event</h2>
          </div>

          <div class="news_part">
            <div class="col-md-6">
              <div class="news_box">
                <h3>Latest News & Notice</h3>
                <div class="latest_news">
                 
                    <marquee direction="up" height="100" scrolldelay="300" onmouseover="this.stop();" onmouseout="this.start();">
                     




                      <li><a href="#">
                        <div class="lt_n_img">
                          <h1>1.</h1>
                        </div>
                        <div class="latest_news_content">
                          <p>Important Notice Regarding Filling up Online Application Form for MOP-UP Counselling of Post Graduate Degree / Diploma Courses in Govt. & Private Medical/ Dental on the basis of NEET- Date & Time for Third (Offline) Counselling of ITICAT-2019 (Adv. No. BCECEB(ITICAT)-2019/16 Dated 16.11.2019)<span class="blink">New</span></p>
                        </div></a>
                      </li>

                      <li><a href="#">
                        <div class="lt_n_img">
                          <h1>2.</h1>
                        </div>
                          <div class="latest_news_content">
                          <p>Important Notice Regarding Third (Offline) Counselling of Important Notice Regarding Filling up Online Application Form for MOP-UP Counselling of Post Graduate Degree / Diploma Courses in Govt. & Private Medical/ Dental on the basis of NEET- ITICAT-2019 (Adv. No. BCECEB(ITICAT)-2019/15 Dated 16.11.2019)</p>
                        </div></a>
                      </li>

                      <li><a href="#">
                        <div class="lt_n_img">
                          <h1>3.</h1>
                        </div>
                          <div class="latest_news_content">
                          <p>Extension of Date for Filling up Online Choices for Online Counselling of DCECE-2019 [PARA MEDICAL / PARA MEDICAL DENTAL]PM/PMD Courses in Govt / Private Colleges (Adv. No. BCECEB(DCECE)-2019/15 Fee Structure for Private Ayurveda and Homeopathy College for Counselling of PGMAC[AYUSH] Dated 14.11.2019)<span class="blink">New</span></p>
                        </div></a>
                      </li>


                      <li><a href="#">
                        <div class="lt_n_img">
                          <h1>4.</h1>
                        </div>
                          <div class="latest_news_content">
                          <p>Online Second Round Allotment & Document Verification Schedule of Pharmacy / Medical / Agriculutre Courses  for  (PCM/PCB/PCMB) and Agriculutre Group Vacant Seat Position in Govt/Private (Ayurveda and Homeopathy) College for PGMAC[AYUSH]  (CBA/MBA/MCA/PCA) on the Basis of BCECE-2019 (Adv. No. BCECEB(BCECE)-2019/15 Dated 11.11.2019)</p>
                        </div></a>
                      </li>

                      <li><a href="#">
                        <div class="lt_n_img">
                          <h1>5.</h1>
                        </div>
                          <div class="latest_news_content">
                          <p>Online Second Round Allotment & Document Verification Details for Filling up Online Application Form for Second MOP-UP Counselling of Post Graduate Degree / Diploma Courses in Govt. & Private Medical Colleges on the basis of NEET Schedule of   DECE[LE]-2019  (Adv. No. BCECEB(DECE[LE])-2019/07 Dated 11.11.2019)<span class="blink">New</span></p>
                        </div></a>
                      </li>

                       <li><a href="#">
                        <div class="lt_n_img">
                          <h1>6.</h1>
                        </div>
                          <div class="latest_news_content">
                          <p>Details Regarding Filling up Online Choices for Online Counselling of DCECE-2019 [PARA MEDICAL / PARA MEDICAL for Second MOP-UP Counselling of Post Graduate Degree  & Private Medical Colleges on the basis of NEET DENTAL]PM/PMD Courses in Govt / Private Colleges (Adv. No. BCECEB(DCECE)-2019/14 Dated 08.11.2019)</p>
                        </div></a>
                      </li>
              

                    </marquee>

 

                 
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="news_box">
                <h3>Events</h3>
                <div class="latest_news">
                  <marquee direction="up" height="100" scrolldelay="220" onmouseover="this.stop();" onmouseout="this.start();">

                       <li><a href="#">
                        <div class="lt_n_img">
                          <h1>1.</h1>
                        </div>
                        <div class="latest_news_content">
                          <p>Details Regarding Filling up Online Application Form for Admission in Post Graduate Ayurveda & Homeopathy Courses & Private Medical Colleges on the basis of NEET in & Private Medical Colleges on the basis of NEET Govt. Colleges on the basis of AIAPGET-(AYUSH)-2019 (Adv. No. BCECEB(PGMAC)-2019/14 Dated 24.10.2019)<span class="blink">New</span></p>
                        </div></a>
                        </li>

                        <li><a href="#">
                      <div class="lt_n_img">
                          <h1>2.</h1>
                        </div>
                        <div class="latest_news_content">
                          <p>Details for Filling up Online Application Form for Second MOP-UP Counselling of Post Graduate Degree / Diploma Courses & Private Medical Colleges on the basis of NEET in Govt. & Private & Private Medical Colleges on the basis of NEET Medical Colleges on the basis of NEET-(PG)-2019 (Adv. No. BCECEB(PGMAC)-2019/12 Dated 12.05.2019)</p>
                        </div></a>
                        </li>

                        <li><a href="#">
                      <div class="lt_n_img">
                          <h1>3.</h1>
                        </div>
                        <div class="latest_news_content">
                          <p>Details of Filling up Online Application Form for MOP-UP Counselling of Post Graduate Degree / Diploma Courses in Govt. & & Private Medical Colleges on the basis of NEET & Private Medical Colleges on the basis of NEET Private Medical/ Dental on the basis of NEET-(PG/MDS)-2019  (Adv. No. BCECEB(PGMAC)-2019/09 Dated 02.05.2019)<span class="blink">New</span></p>
                        </div></a>
                        </li>

                        <li><a href="#">
                      <div class="lt_n_img">
                          <h1>4.</h1>
                        </div>
                        <div class="latest_news_content">
                          <p>Details of Filling up Online Application Form for Form for  Admission in Post Graduate Degree / Diploma Courses in Govt. & Private & Private Medical Colleges on the basis of NEET Medical/ Dental on the basis of NEET-(PG/MDS)-2019  (Adv. No. BCECEB(PGMAC)-2019/02 Dated 30.03.2019)</p>
                        </div></a>
                        </li>

                        <li><a href="#">
                      <div class="lt_n_img">
                          <h1>5.</h1>
                        </div>
                        <div class="latest_news_content">
                          <p>Important Notice Regarding Extension in Date for Filling up Online Application Form for  Admission in Post Graduated Engineering in  M. Tech [Machine Design / Thermal Engg./ Mirco Electronics and VLSI Technology] PEGAC-2019 (Adv. No. BCECEB(PGEAC)-2019/04 Dated 01.10.2019)<span class="blink">New</span></p>
                        </div></a>
                        </li>

                         <li><a href="#">
                      <div class="lt_n_img">
                          <h1>6.</h1>
                        </div>
                        <div class="latest_news_content">
                          <p>Important Notice Regarding Extension in Date for Filling up Online Application Form for Second Mop-Up Counselling for  Admission in Under Graduate Dental Courses in  Dental Colleges  on the basis of NEET-(UG)-2019 (Adv. No. BCECEB(UGMAC)-2019/30 Dated 07.09.2019)</p>
                        </div></a>
                        </li>



              

                    </marquee>
                   
                </div>
              </div>
            </div>

          </div>
          
        </div>
      </div>
    </div>
  </div>
</section>



<!-- news event end here -->



 <!-- Testimionals Slider-->

<div class="testimionals_sec">
 <div class="container testimionals" >
 <div class="row">
  <div class="">
   <div class="col-sm-12 col-xs-12 nopad test ">
    <h2 class="text-center"> Testimionals </h2>
  <div id="testio" class="owl-carousel owl-template">
   

<?php foreach($testimonial as $test){?>
      <div class="item">
       
        <div class="info">
         
         <p><?php echo character_limiter(strip_tags($test->testimonial_content),300);?></p>
        <?php if($test->testimonial_image !=''){?> <img src="<?php echo base_url()?>assets/uploads/testimonial/<?php echo $test->testimonial_image;?>" alt="Photo" /> 
        <?php } else{?>
                  <img src="<?php echo base_url()?>assets/uploads/no_image.png" alt="Photo" height="100px" width="100px"> <?php }?>

         <h5><?php echo $test->testimonial_name;?></h5>
         <h6><?php echo $test->testimonial_designation;?></h6>
         <div class="test_btn">
            <!-- <button type="Submit" > </button> -->
            <a href="<?php echo $this->url->link(136);?>" class="btn_read_more">Read More</a>
         </div>
        </div>
         
      </div>

      <?php } ?>

    </div>

    


  </div>
 
</div>     
</div>
</div>
</div>
<!-- Testimionals Slider-->


<!-- download app section start here -->


<section id="download_app_sec">
  <div class="downbload_app_Part">
    <div class="container">
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-6">
            <div class="downbload_app_cont">
              <h2>Download App</h2>
              <h4>This is Demo Title</h4>
              <p>Eduguideplus is a renowned and established educational consultant in India. We enable students to pursue their career in medical, engineering, BBA, MBA, nursing by studying in India and abroad.</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="downbload_app_img">
              <img src="assets/images/down1.png" alt="down1">
              <img src="assets/images/down2.png" alt="down2">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>




<!-- start new slider


<section class="testimonial2">
  <div class="bs-example">
    <div id="myCarousel" class="carousel slide" data-interval="6500" data-ride="carousel">
      <!-- Carousel indicators
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>   
       <!-- Carousel items 
        <div class="carousel-inner">
            <div class="active item carousel-fade">
                 <div class="info">
         
         <p><?php echo character_limiter(strip_tags($test->testimonial_content),300);?></p>
        <?php if($test->testimonial_image !=''){?> <img src="<?php echo base_url()?>assets/uploads/testimonial/<?php echo $test->testimonial_image;?>" alt="Photo" /> 
        <?php } else{?>
                  <img src="<?php echo base_url()?>assets/uploads/no_image.png" alt="Photo" height="100px" width="100px"> <?php }?>

         <h5><?php echo $test->testimonial_name;?></h5>
         <h6><?php echo $test->testimonial_designation;?></h6>
         <div class="test_btn">
            <!-- <button type="Submit" > </button> 
            <a href="<?php echo $this->url->link(136);?>" class="btn_read_more">Read More</a>
         </div>
        </div>
            </div>
            <div class="item carousel-fade">
                <h2>Slide 2</h2>
                <div class="carousel-caption">
                  <h3>Second slide label</h3>
                  <p>Aliquam sit amet gravida nibh, facilisis gravida odio.</p>
                </div>
            </div>
            <div class="item carousel-fade">
                <h2>Slide 3</h2>
                <div class="carousel-caption">
                  <h3>Third slide label</h3>
                  <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                </div>
            </div>
        </div>
        <!-- Carousel nav         <a class="carousel-control left" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="carousel-control right" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>
  
</section>


<!-- download app section end here -->












<!-- Green Banner-->

<!-- Green Banner-->





