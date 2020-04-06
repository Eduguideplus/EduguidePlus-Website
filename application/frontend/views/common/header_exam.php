<?php
if($this->session->userdata('user_identity')!='')
{
  $user_id=$this->session->userdata('user_identity');

  $user = $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>$user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
}


?>


<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Surajit Pramanick</title>
  <link rel="icon" href="<?php echo base_url();?>assets/images/favicon.png">
  <!-- Bootstrap -->
  <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
  <!--Custom template CSS-->
  <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
  <!--Custom template CSS Responsive-->
  <link href="<?php echo base_url();?>assets/webcss/site-responsive.css" rel="stylesheet">
  <!--Animated CSS -->
  <link href="<?php echo base_url();?>assets/webcss/animate.css" rel="stylesheet">
  <!--Owsome Fonts -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.min.css">
  <!-- Important Owl stylesheet -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/owlslider/owl-carousel/owl.carousel.css">

  <!-- Default template -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/owlslider/owl-carousel/owl.template.css">

  <!--  validation  -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/custom_script/form_validation.css">
  

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
      <script type="text/javascript" src="<?php echo base_url();?>assets/custom_script/validation_rulse.js"></script>

      <script type = "text/javascript" >
   function preventBack(){window.history.forward();}
    setTimeout("preventBack()", 0);
    window.onunload=function(){null};
</script>
    </head>
    <body>
      <div id="loadessr"><div id="loader"></div></div>
      <!-- Header Image Or May be Slider-->
      <div id="header" class="container-fluid home">
        <div class="row">
          
         <!-- Header Image Or May be Slider-->
         <!-- <div class="header-top">
         <div class="container">
         <ul class="pull-right">
           <li class="margin-0"><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li class="margin-0"><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li class="margin-0"><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
                        <li class="margin-0"><a href="#"><i class="fa fa-linkedin"></i></a></li>
         </ul>
         </div>
         </div> -->
         <div class="top_header">
          <nav class="navbar navbar-fixed-top">

           <div class="container">
             <div class="logo">
              <a href="<?php echo $this->url->link(1);?>"><img src="<?php echo base_url();?>assets/images/logo2.png" alt="Photo" /> </a>
            </div>

            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav pull-right res-nav">


                <li><a href="<?php echo $this->url->link(1);?>">Home</a></li>
<!--                 <li class="dropdown">
                 <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Courses</a>
                 <ul class="dropdown-menu">
                  <li><a href="#">Category 1</a></li>
                  <li><a href="#">Category 2</a></li>

                </ul>
              </li> -->
              <li><a href="<?php echo $this->url->link(2);?>">Practice</a></li>
              <li><a href="practice.php">Quiz papers</a></li>
       
              <!-- <li><a data-toggle="modal" data-target="#myModal">Login/Signup</a></li> -->
              <?php if($this->session->userdata('user_identity')!=''){?>
                <li class="my-account"><a class="post_job"><?php if($user[0]->profile_photo!=''){?><span class="circle_img"><img class="img-responsive" src="<?php base_url();?>assets/uploads/user/<?php echo $user[0]->profile_photo;?>"></span><?php }else{?><span class="fa fa-user-circle-o"></span><?php }?></a> 

                  <div class="detail wow fadeInDown animated animated" style="visibility: visible; animation-name: fadeInDown;">
                <div class="accountList">
                  <ul>
                    <li><a href="<?php echo $this->url->link(8); ?>"><span class="fa fa-user-o"></span>My Account</a></li>
                    <li><a href="<?php echo $this->url->link(31); ?>"><span class="fa fa-user-o"></span>My Profile</a></li>
                     <li><a href="<?php echo $this->url->link(32); ?>"><span class="fa fa-cog"></span>My Setting</a></li>
                     <li><a href="<?php echo $this->url->link(33); ?>"><span class="fa fa-book"></span>My Exam Details</a></li>
                      <li><a href="<?php echo $this->url->link(35); ?>"><span class="fa fa-google-wallet"></span>My Wallet</a></li>
                    <li><a href="<?php echo $this->url->link(26); ?>"><span class="fa fa-unlock-alt"></span>Logout</a></li>
                    
                  </ul>
                </div>
              
                
              </div>


                </li>


                <?php } else{?>
              <li class="login"><a data-toggle="modal" data-target="#myModal" class="post_job"><span class="label job-type partytime">Login/Signup</span></a> </li>
              <?php } ?>
             <!--  <li class="mobile-menu"><a href="post-a-job.html">POST A JOB, IT’S FREE!</a></li>
              <li class="mobile-menu"><a href="login_register.html">Register User</a></li> -->

                   
                    
            </ul>

          </div><!-- navbar-collapse -->


        </div>
        <!-- container-fluid -->
      </nav>

      </div>


  </div>
</div>
<input type="hidden" name="baseurl" id="baseurl" value="<?php echo base_url(); ?>">