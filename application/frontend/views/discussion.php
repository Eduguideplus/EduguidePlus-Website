
<script type="text/javascript" src="<?php echo base_url();?>assets/tinymce_math/jscripts/tiny_mce/plugins/asciimath/js/ASCIIMathMLwFallback.js"></script>

    <script type="text/javascript" src="<?php echo base_url();?>assets/tinymce_math/jscripts/tiny_mce/plugins/equation/editor_plugin.js"></script>
<script type="text/javascript">
var AMTcgiloc = "http://www.imathas.com/cgi-bin/mimetex.cgi";     //change me
</script>

<!-- TinyMCE -->
<script type="text/javascript" src="<?php echo base_url();?>assets/tinymce_math/jscripts/tiny_mce/tiny_mce.js"></script>

<script type="text/javascript">
tinyMCE.init({

    mode : "specific_textareas",
    editor_selector : "textarea",
    theme : "advanced",

    relative_urls:false,
    theme_advanced_buttons1 : "fontselect,fontsizeselect,formatselect,bold,italic,underline,strikethrough,separator,sub,sup,separator,cut,copy,paste,undo,redo",
    theme_advanced_buttons2 : "justifyleft,justifycenter,justifyright,justifyfull,separator,numlist,bullist,outdent,indent,separator,forecolor,backcolor,separator,hr,link,unlink,image,media,table,code,separator,asciimath,asciimathcharmap,asciisvg,equation",
    theme_advanced_buttons3 : "",
    theme_advanced_fonts : "Arial=arial,helvetica,sans-serif,Courier New=courier new,courier,monospace,Georgia=georgia,times new roman,times,serif,Tahoma=tahoma,arial,helvetica,sans-serif,Times=times new roman,times,serif,Verdana=verdana,arial,helvetica,sans-serif",
    theme_advanced_toolbar_location : "top",
    theme_advanced_toolbar_align : "left",
    theme_advanced_statusbar_location : "bottom",
    plugins : 'asciimath,asciisvg,table,inlinepopups,media,equation',
   
    AScgiloc : 'http://www.imathas.com/editordemo/php/svgimg.php',            //change me  
    ASdloc : 'http://www.imathas.com/editordemo/jscripts/tiny_mce/plugins/asciisvg/js/d.svg',  //change me    
        
    content_css : "<?php echo base_url();?>assets/tinymce_math/css/content.css"
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
  			<h3>Welcome to  Discussion forum</h3>
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

												<span class="chat-message-counter" id="count_div"><?php echo count($comment_list); ?></span>

											</header>

											<div class="chat collapse in" id="discuss">
												
													<div class="chat-history" id="comment_div">
													

							<?php foreach ($comment_list as $comment) {
$user_id=$this->session->userdata('activeuser');
$user_data = $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>$comment->user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


							 if($comment->user_id==$user_id){
		 ?>

														<div class="chat-list">
		<img src="<?php echo base_url(); ?>assets/uploads/profile_image/<?php echo @$user_data[0]->profile_photo; ?>" alt="Avatar">
				<div class="massage-chat">
		<span class="time-left"><h6><?php echo @$user_data[0]->user_name; ?></h6></span>
		<span class="time-right"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo date("H:i",strtotime($comment->date)); ?></span>
				<div class="clearfix"></div>
		 <p><?php echo $comment->comment; ?></p>
				</div>
														   
			</div>

                         <?php }else{ ?>

															
					<div class="chat-list darker">
														  

<?php 
if(@$user_data[0]->profile_photo!='')
{
	?>

		<img src="<?php echo base_url(); ?>assets/uploads/profile_image/<?php echo @$user_data[0]->profile_photo; ?>" alt="Surajit Pramanick" class="right">
		<?php
	}
	else{
		?>
		<img src="<?php echo base_url(); ?>assets/images/no-img-profile.png" alt="Surajit Pramanick" class="right">
		<?php
	}
	?>
														   <div class="massage-chat">
														  <span class="time-right"><h6><?php echo @$user_data[0]->user_name; ?></h6></span>
														  <span class="time-left"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo date("H:i",strtotime($comment->date)); ?></span>
														  <div class="clearfix"></div>
														  <p><?php echo $comment->comment; ?></p>
														  </div>
														  
														</div>


                           

		<?php } }	
		?>

														

														

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

											<span class="chat-message-counter" id="count1_div"><?php echo count($post_question_list); ?></span>

										</header>

										<div class="chat collapse in" id="question">
											
											<div class="chat-history" id="post_div">
												
								
							<?php foreach ($post_question_list as $post) {
$user_id=$this->session->userdata('activeuser');
$user_data = $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>$post->user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');


							 if($post->user_id==$user_id){
		 ?>

	<div class="chat-list">

		<?php
if(@$user_data[0]->profile_photo!='')
{
	?>

		<img src="<?php echo base_url(); ?>assets/uploads/profile_image/<?php echo @$user_data[0]->profile_photo; ?>" alt="Surajit Pramanick">
		<?php
	}
	else{
		?>
		<img src="<?php echo base_url(); ?>assets/images/no-img-profile.png" alt="Surajit Pramanick" >
		<?php
	}
	?>
				<div class="massage-chat">

		<span class="time-left"><h6><?php echo @$user_data[0]->user_name; ?></h6></span>
		<span class="time-right"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo date("H:i",strtotime($post->date)); ?></span>
				<div class="clearfix"></div>
		 <p><?php echo $post->posted_question; ?></p>
				</div>
														   
			</div>

                         <?php }else{ ?>

<div class="chat-list darker">
	<?php
if(@$user_data[0]->profile_photo!='')
{
	?>

<img src="<?php echo base_url(); ?>assets/uploads/profile_image/<?php echo @$user_data[0]->profile_photo; ?>" alt="Surajit Pramanick" class="right">
<?php
}
else{
	?>
	<img src="<?php echo base_url(); ?>assets/images/no-img-profile.png" alt="Surajit Pramanick" class="right">
	<?php
}
?>

<div class="massage-chat">
<span class="time-right"><h6><?php echo @$user_data[0]->user_name; ?></h6></span>
<span class="time-left"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo date("H:i",strtotime($post->date)); ?></span>
<div class="clearfix"></div>
<p><?php echo $post->posted_question; ?></p>
</div>

</div>


                           

		<?php } }	?>


												<!-- 	<div class="chat-list">
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
													  
													</div> -->

											</div> <!-- end chat-history -->

										

											<form id="post_question_form" class="" method="post">

												<fieldset>
													
												
	<!-- <textarea id="posted_qus" name="post_qus" class="form-control tinyarea" placeholder="Type your message…"  ></textarea> -->

													<input type="text" id="posted" name="post_qus" placeholder="Type your message…" autofocus>
													<button type="button" class="chat-send-btn " onclick="post_sub();">SEND</button>

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

	// alert(comment);
		var base_url="<?php echo base_url(); ?>";
		$.ajax({
			      url:base_url+'Discussion/comment_submit',
			      data:{comment:comment},
			      dataType:'html',
			      type:'POST',
			      success: function(data)
			      {

			      	// alert(data);
			      	$('#comment_div').html(data);

			      	$("#comment").val('');


			      	 swal({
                title: 'Comment Posted',
                text: 'Your comment successfully posted,please wait for admin approval.',
                timer: 5000,
                
                showCancelButton: false,
                showConfirmButton: false,
                type:'success'
              }).then(
                function () {},
                // handling the promise rejection
                function (dismiss) {
                  if (dismiss === 'timer') {
                    //console.log('I was closed by the timer')
                  }
                }
              )
			      }
		});
	}
</script>

<script type="text/javascript">
	function post_sub()
	{
 	// 	alert('okk');
		 // var post=tinyMCE.get('post_qus');
		 // alert(post);
		var postdata = $('#post_question_form')[0];
		/*var post=$("#posted_qus").val();*/
		// alert(post);
		
		var base_url="<?php echo base_url(); ?>";
		$.ajax({
			      url:'<?php echo base_url(); ?>Discussion/post_ques_submit',
			               type: "POST",
			               data: new FormData(postdata),
			               contentType: false,
                           cache: false,
                           processData:false,
			      success: function(data)
			      {
			      	// alert(data);
			      	$('#post_div').html(data);
			      	$('#posted').val('');

			      	 swal({
                title: 'Question Posted',
                text: 'Your question successfully posted, please wait for admin approval.',
                timer: 5000,
                
                showCancelButton: false,
                showConfirmButton: false,
                type:'success'
              }).then(
                function () {},
                // handling the promise rejection
                function (dismiss) {
                  if (dismiss === 'timer') {
                    //console.log('I was closed by the timer')
                  }
                }
              )

			      }
		});
	}
	
</script>

<script type="text/javascript">
	function get_post_question(argument) {
		// alert('okk');
		alert(tinymce.get('posted_qus').getContent());
	}

</script>
    <!--    <script>
            $("#post_question_form").on("submit", function(event) {
          
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>Discussion/post_ques_submit",
                    data: $(this).serialize(),
                    success: function(data) {
                        alert(data);
			      	$('#post_div').html(data);
                    },
                });
            });
        </script> -->
 