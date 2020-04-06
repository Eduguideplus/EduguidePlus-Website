

 <div class="training">
	<div class="container-fluid">
		<div class="row">
			<div class="con-md-12 p-no training_cnt">
				<div class="training_img">
					<img src="<?php echo base_url();?>assets/uploads/training_slider/<?php echo @$slider[0]->slider_image;?>">
				</div>
				<div class="training_info text-center">
          <h2>MOCK TEST</h2>
					<h4>MUTUAL FUND DISTRIBUTORS CERTIFICATION EXAMINATION</h4>
					<ul>
            <li><p><b>FREE DEMO & PREMIUM TEST</b></p></li>
						<li><p>Demo exam has only 25 questions</p></li>
						<li><p>The same set will be repeated every time in Demo exam</p></li>
						<li><p>Try our PREMIUM EXAMS (600 Q & A)</p></li>
            <li><p>Chapter wise text of 15 marks</p></li>
            <li><p>Comprehensive Test of 100 marks</p></li>
            <li><p>For bulk enrolment at discounted rate contact Mr. Surajit</p></li>
            <li><p>Student’s Dashboard for self-evaluation</p></li>
            <li><p>Faculty Dashboard for students performance analysis</p></li>
						
					</ul>
					<div class="training_btn">
						<!-- <a href="<?php echo $this->url->link(133); ?>">Free Demo</a> -->
              <a href="<?php echo $this->url->link(133);?>">Free Demo</a>
						<a href="<?php echo $this->url->link(134);?>">Go For Test</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div> 



<div class="starttest add_sec class_room">

  <div class="container">
    <div class="row">
      <div class="nopad test-app courses-area">
        <h2 class="head-title text-center"> Class Room Training</h2>
      </div>
    <div class="modcontent clearfix">    
                    <div id="customers-testimonials" class="owl-carousel">
                        

                        <?php
                        foreach($class_room as $row)
                          {
                            ?>
                        
                        <div class="item"><a href="#!">
                            <div class="add_img">
                            <img src="<?php echo base_url();?>assets/uploads/classroom_training/<?php echo $row->training_photo;?>">
                           </div>
                           <div class="add_info">
                            <!-- <h3></h3> -->
                            <p>NEXT BATCH</p>
                           </div></a>
                        </div>
                        <?php
                      }
                      ?>
                      </div>
                       </div>
  </div>
</div>

</div>


<div class="Material_sec">
<div class="container testimionals">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
         <div class="nopad test-app courses-area">
      <h2 class="head-title text-center"> Student's Kit</h2>
   


           <div class="col-lg-12 app-ar">

            <?php 
            foreach($material as $mat)
            {
              ?>
            
           
            <div class="courses-block">
              <h2><img src="<?php echo base_url(); ?>assets/images/pdf1.png" class="dis-none"> <?php  echo character_limiter($mat->material_name, 21);?></h2>
              
            <a <?php if($this->session->userdata('activeuser')!=""){ ?> href="<?php echo base_url(); ?>assets/uploads/material/<?php echo $mat->material_file;?>" download <?php }else{  ?> href="<?php echo $this->url->link(86); ?>" <?php } ?>  ><img src="<?php echo base_url(); ?>assets/images/download1.png" class="pdf-down"></a>
            </div>
            <?php
          }
          ?>

             <!-- <div class="courses-block">
              <h2><img src="<?php echo base_url(); ?>assets/images/pdf1.png" class="dis-none"> Study Material 2</h2>
              
            <a <?php if($this->session->userdata('activeuser')!=""){ ?> href="#" download <?php }else{  ?> href="<?php echo $this->url->link(86); ?>" <?php } ?>  ><img src="<?php echo base_url(); ?>assets/images/download1.png" class="pdf-down"></a>
            </div> -->

             <!-- <div class="courses-block">
              <h2><img src="<?php echo base_url(); ?>assets/images/pdf1.png" class="dis-none"> Study Material 3</h2>
              
            <a <?php if($this->session->userdata('activeuser')!=""){ ?> href="#" download <?php }else{  ?> href="<?php echo $this->url->link(86); ?>" <?php } ?>  ><img src="<?php echo base_url(); ?>assets/images/download1.png" class="pdf-down"></a>
            </div> -->

             <!-- <div class="courses-block">
              <h2><img src="<?php echo base_url(); ?>assets/images/pdf1.png" class="dis-none"> Study Material 4</h2>
              
            <a <?php if($this->session->userdata('activeuser')!=""){ ?> href="#" download <?php }else{  ?> href="<?php echo $this->url->link(86); ?>" <?php } ?>  ><img src="<?php echo base_url(); ?>assets/images/download1.png" class="pdf-down"></a>
            </div> -->

           

           
            <div class="view_all">
                <button type="button" onclick="go_to_library()" class="btn read-btn">View All</button>
            </div>

          

          

          </div>


          </div>
      </div>
    </div>
  </div>
</div></div>

<div class="starttest add_sec class_room Partners_sec">

  <div class="container">
    <div class="row">
      <div class="nopad test-app courses-area">
        <h2 class="head-title text-center"> Our Partners</h2>
      </div>
    <div class="modcontent clearfix">    
                    <div id="customers-testimonials" class="Partners_slider">
                        
                        <?php 
                        foreach($partner_details as $pat)
                        {
                          ?>
                        
                        <div class="item"><a href="#!">
                            <div class="add_img">
                            <img src="<?php echo base_url();?>assets/uploads/manage_partner/<?php echo $pat->partner_photo;?>">
                           </div>
                           <!-- <div class="add_info">
                            <h3>MF Fee <span>Batch</span></h3>
                            <p>NEXT BATCH</p>
                           </div> --></a>
                        </div>
                        <?php
                      }
                      ?>
                        
       
                    </div>
                       </div>
  </div>
</div>

</div>

<script type="text/javascript">
  function go_to_library(){
     var baseurl='<?php echo base_url();?>';
  window.location='<?php echo $this->url->link(97);?>';
  }
</script>