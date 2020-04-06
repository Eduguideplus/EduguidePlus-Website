<section class="breadcumb-wrapper">
      <div class="overlay-color">
        <div class="container">
          <div class="row clearfix">
            
          </div>
        </div>
      </div>
</section>






<div class="blog_section Planning">
  <div class="container">
    <div class="row">
      <div class="col-md-12 p-no">
         <div class="nopad test-app courses-area">
            <h2 class="head-title text-center"> Financial Planning</h2>
        </div>
        


      </div>
      <div class="col-md-12">
      <div class="row">



      <?php
      foreach ($financial_list as $row) {
           ?>
        <div class="plan_def">
        <div class="col-md-7">
          <div class="Planning_item">
            <div class="Planning_item_title">
              <h2><?php echo $row->financial_planning_title; ?></h2>
            </div>
            <div class="Planning_item_info">
              <!-- <p>Being able to manage your life in a satisfying and fulﬁlling way using the ﬁnancial resources that you have is key to a positive retirement lifestyle. Although it might seem to be many years ahead, but what you do today will determine how smoothly you handle a happy retirement.</p>
              <p>Thus retirement planning is important from both personal and financial perspective, realizing a comfortable retirement is an extensive process that takes sensible planning and years of persistence.</p>
              <p>Retirement is the period of social adjustment where many elderly people struggle. They suffer from boredom, lack of purpose and motivation. Dreaming about your retirement is the first step; planning and working towards your retirement goals is what will actually lead you to happy retirement.</p>
              <p>At Vrishank, we customize your portfolio to suit your needs and make a realistic plan for you to achieve your objectives.</p> -->
              <?php  echo $row->financial_planning_content; ?>
            </div>
          </div>
        </div>

        <div class="col-md-5">
          <div class="retirement_img">
            <img src="<?php echo base_url(); ?>assets/uploads/financial_planning/<?php echo $row->financial_planning_image;?>" class="img-responsive">
          </div>
        </div>

      </div>

   <?php }?>


</div>

    </div>
  </div>
</div>
</div>
