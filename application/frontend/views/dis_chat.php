
<script src='//cdn.tinymce.com/4/tinymce.min.js'></script>
<script type="text/javascript">
        tinymce.init({
            selector: "textarea",
            theme: "modern",
            menubar: "edit insert tools",
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern imagetools"
            ],
            toolbar1: "undo redo | styleselect | bold italic| forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist | link preview",
            image_advtab: true,
            extended_valid_elements : "span[*],i[*]",
            relative_urls : false,
            remove_script_host : false,
            convert_urls : true
        });
    </script>









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
  			<h3>Welcome to XXXXX <br> Discussion forum</h3>
  		</div>


  		<div class="col-md-10 col-md-offset-1">
  		<div class="col-md-4 col-sm-4 col-xs-12 mt-20">
  				<div class="discuss text-center">


  				<!--<a href="Javascripts:void(0)" aria-hidden="true" data-toggle="collapse" data-target="#discuss">Start Discussion</a>
  					<div class="clearfix"></div>
  					<a href="Javascripts:void(0)" aria-hidden="true" data-toggle="collapse" data-target="#question">Post Question</a>
  					<div class="clearfix"></div>-->




  					<ul class="nav nav-tabs dis-ul">
					  <li class="active"><a data-toggle="tab" href="#home">Start Discussion</a></li>
					  <li><a data-toggle="tab" href="#menu1">Post Question</a></li>
					 
					</ul>

					
  					
  					<!-- <ul class="discussion-ul">
  						<li><a href="#"><i class="fa fa-snowflake-o" aria-hidden="true"></i> Post Question by Student</a></li>
  						<li><a href="#"><i class="fa fa-snowflake-o" aria-hidden="true"></i> Post Question by Admin</a></li>
  						<li><a href="#"><i class="fa fa-snowflake-o" aria-hidden="true"></i> Student to Student Discussion</a></li>
  						<li><a href="#"><i class="fa fa-snowflake-o" aria-hidden="true"></i> Student to Solver Discussion</a></li>
  					</ul> -->




  				</div>


  		</div>

  		<div class="col-md-8 col-xs-12 col-sm-8 mt-20">
  			<div class="discuss">
  				


  					<div class="discuss-list">
  							<!--<div class="discuss-item">
  								<div class="pic">
  									<a href="#"><img src="<?php echo base_url(); ?>assets/images/pro-file.jpg" alt="" class="img-responsive"></a>

  								</div>

  								<div class="details">
  									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>

  									<ul>
  										<li><a href="#"><strong>Partha Goswami</strong></a></li>
  										<li><a href="#">started on 2018-01-15</a></li>
  										<li><a href="#">16:09:51</a></li>

  									</ul>

  								</div>



  							</div>

  							<div class="discuss-item">
  								<div class="pic">
  									<a href="#"><img src="<?php echo base_url(); ?>assets/images/pro-file.jpg" alt="" class="img-responsive"></a>

  								</div>

  								<div class="details">
  									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>

  									<ul>
  										<li><a href="#"><strong>Partha Goswami</strong></a></li>
  										<li><a href="#">started on 2018-01-15</a></li>
  										<li><a href="#">16:09:51</a></li>

  									</ul>

  								</div>



  							</div>


  							<div class="discuss-item">
  								<div class="pic">
  									<a href="#"><img src="<?php echo base_url(); ?>assets/images/pro-file.jpg" alt="" class="img-responsive"></a>

  								</div>

  								<div class="details">
  									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>

  									<ul>
  										<li><a href="#"><strong>Partha Goswami</strong></a></li>
  										<li><a href="#">started on 2018-01-15</a></li>
  										<li><a href="#">16:09:51</a></li>

  									</ul>

  								</div>



  							</div>-->
  							<div class="tab-content">
							  <div id="home" class="tab-pane fade in active">
							    <div class="col-md-12 col-sm-12 col-xs-12">

			  							<div id="live-chat">
					
											<header class="clearfix">
												
												

												<h4><i class="fa fa-comments-o" aria-hidden="true"></i> Discussion <i class="fa fa-angle-down minimize" aria-hidden="true" data-toggle="collapse" data-target="#discuss"></i></h4>

												<span class="chat-message-counter">4</span>

											</header>

											<div class="chat collapse in" id="discuss">
												
													<div class="chat-history" id="comment_div">
													

							<?php foreach ($comment_list as $comment) {

$user_data = $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>$comment->user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
							 ?>
													<div class="chat-list">
		<img src="<?php echo base_url(); ?>assets/uploads/profile_image/<?php echo @$user_data[0]->profile_photo; ?>" alt="Avatar">
				<div class="massage-chat">
		<span class="time-left"><h6><?php echo @$user_data[0]->user_name; ?></h6></span>
		<span class="time-right"><i class="fa fa-clock-o" aria-hidden="true"></i> 11:00</span>
				<div class="clearfix"></div>
		 <p><?php echo $comment->comment; ?></p>
				</div>
														   
			</div>

												<?php } ?>		

														

														

												</div> <!-- end chat-history -->

											

												<form  method="post" class="chat-footer">

													<fieldset>
														
														<input type="text" id="comment" name="comment" placeholder="Type your message…" autofocus>
														<input type="hidden">

														<button type="button" onclick="comment_sub()" class="chat-send-btn">SEND</button>

													</fieldset>

												</form>

											</div> <!-- end chat -->

										</div>

								</div>
							  </div>
						  <div id="menu1" class="tab-pane fade">
						    <div class="col-md-12 col-sm-12 col-xs-12">

		  							<div id="live-chat1">
				
										<header class="clearfix">
											
											

											<h4><i class="fa fa-comments-o" aria-hidden="true"></i> Posted Question <i class="fa fa-angle-down minimize" aria-hidden="true" data-toggle="collapse" data-target="#question"></i></h4>

											<span class="chat-message-counter">4</span>

										</header>

										<div class="chat collapse in" id="question">
											
											<div class="chat-history">
												
												<div class="chat-list">
													  <img src="<?php echo base_url(); ?>assets/images/job-admin1.png" alt="Avatar">
													  <div class="massage-chat">
													  <span class="time-left"><h6>Bhaumik Patel</h6></span>
													  <span class="time-right"><i class="fa fa-clock-o" aria-hidden="true"></i> 11:00</span>
													  <div class="clearfix"></div>
													  <p>Hello. How are you today?</p>
													  </div>
													   
													</div>

													<div class="chat-list darker">
													  <img src="<?php echo base_url(); ?>assets/images/job-admin.png" alt="Avatar" class="right">
													   <div class="massage-chat">
													  <span class="time-right"><h6>Jack Sparrow</h6></span>
													  <span class="time-left"><i class="fa fa-clock-o" aria-hidden="true"></i> 11:01</span>
													  <div class="clearfix"></div>
													  <p>Hey! I'm fine. Thanks for asking!</p>
													  </div>
													  
													</div>

													<div class="chat-list">
													  <img src="<?php echo base_url(); ?>assets/images/job-admin1.png" alt="Avatar">
													   <div class="massage-chat">
													  <span class="time-left"><h6>Bhaumik Patel</h6></span>
													  <span class="time-right"><i class="fa fa-clock-o" aria-hidden="true"></i> 11:02</span>
													  <div class="clearfix"></div>
													  <p>Sweet! So, what do you wanna do today?</p>
													  </div>
													  
													</div>

													<div class="chat-list darker">
													  <img src="<?php echo base_url(); ?>assets/images/job-admin.png" alt="Avatar" class="right">
													   <div class="massage-chat">
													  <span class="time-right"><h6>Jack Sparrow</h6></span>
													  <span class="time-left"><i class="fa fa-clock-o" aria-hidden="true"></i> 11:05</span>
													  <div class="clearfix"></div>
													  <p>Nah, I dunno. Play soccer.. or learn more coding perhaps?</p>
													  </div>
													  
													</div>

											</div> <!-- end chat-history -->

										

											<form action="#" method="post" class="chat-footer">

												<fieldset>
													
													
													<textarea></textarea>

													<button type="submit" class="chat-send-btn center-btn">SEND</button>

												</fieldset>

											</form>

										</div> <!-- end chat -->

									</div>

							</div>
						  </div>
						 
						</div>

  							

							



  					</div>






  			</div>

  		</div>
  		</div>



  </div>
 </div>
</div>





<script type="text/javascript">
	function comment_sub()
	{
		var comment=$('#comment').val();
		var base_url="<?php echo base_url(); ?>";
		$.ajax({
			      url:base_url+'Discussion/comment_submit',
			      data:{comment:comment},
			      dataType:'html',
			      type:'POST',
			      success: function(data)
			      {
			      	$('#comment_div').html(data);
			      }
		});
	}
</script>

 