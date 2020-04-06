<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<section class="breadcumb-wrapper">
      <div class="overlay-color">
        <div class="container">
          <div class="row clearfix">
            
          </div>
        </div>
      </div>
</section>



<div class="testimonial-block-three test-block-content">
	<div class="container ">
        <div class="col-sm-12 col-xs-12 nopad test ">
          <h2 class="text-center"> What People Say About Us</h2>
        </div>
		<div class="row">

            <?php foreach($testimonial as $test)
                 {
                   ?>
		<div class="col-md-12">
            <div class="client-infos">
                <div class="img-box">
                  <img src="<?php echo base_url()?>assets/uploads/testimonial/<?php echo $test->testimonial_image;?>" alt="" class="img-responsive auth1 sprites">
                            </div>
                            <div class="text-holder block-name">
                                <h3><?php echo $test->testimonial_name;?></h3>
                                <span><?php echo $test->testimonial_designation;?></span>
                                <div class="review-box">
                                    <ul>
                                       <!--  <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li> -->
                                    </ul>
                                </div>
                            </div>
                        </div>


                        <div class="text-box" id="style-5">
                            <?php echo $test->testimonial_content ;?>
                        </div>
                    </div>
                    <?php
                }
                ?>

                    <!-- <div class="col-md-10 col-md-offset-1">
                        <div class="client-infos">
                            <div class="img-box">
                                <img src="http://192.168.0.12/mikami/medicine/site/assets/upload/testimonial_image/small/075368700_1533713503.png" alt="" class="img-responsive auth1 sprites">
                            </div>
                            <div class="text-holder block-name">
                                <h3>Beally Russel</h3>
                                <span>Newyork</span>
                                <div class="review-box">
                                    <ul>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="text-box" id="style-5">
                            <p></p><p>It involves an examination of operations which allows their team discuss the art of the possible. They bring a wealth of knowledge, we believe fortune.</p><p></p>
                        </div>
                    </div> -->

                </div>

                    </div>
                    </div>



</body>
</html>