
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>

  <?php 

 @$actual_link =@$this->url->get_protocol()."://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
@$page_slug=$this->uri->segment(1); 
  
@$apps_routes=$this->common_model->common($table_name='app_routes',$field=array('id'),$where=array('slug'=>$page_slug),$where_or=array(),$like=array(),$like_or=array(),$order=array(),$start='',$end='');


 @$data['page_id']=@$apps_routes[0]->id;

 @$data['page_details']=$this->common_model->common($table_name='tbl_page_manage',$field=array(),$where=array('routes_id'=>@$data['page_id']),$where_or=array(),$like=array(),$like_or=array(),$order=array(),$start='',$end='');
         
  
  if( @$page_slug == "")
  { 
     @$apps_routes=$this->common_model->common($table_name='app_routes',$field=array('id'),$where=array('id'=>1),$where_or=array(),$like=array(),$like_or=array(),$order=array(),$start='',$end='');



          @$data['page_id']=@$apps_routes[0]->id;



          @$data['page_details']=$this->common_model->common($table_name='tbl_page_manage',$field=array(),$where=array('routes_id'=>@$data['page_id']),$where_or=array(),$like=array(),$like_or=array(),$order=array(),$start='',$end='');

    $title = @$data['page_details'][0]->meta_title;
  
        $meta_description=@$data['page_details'][0]->meta_description;
       $meta_keyword=@$data['page_details'][0]->meta_keyword;
  }
  
  else
  { 
       $title = @$data['page_details'][0]->meta_title;
        $meta_description=@$data['page_details'][0]->meta_description;
       $meta_keyword=@$data['page_details'][0]->meta_keyword;
  }

   ?> 

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
  <title><?php if($title!=""){ echo  $title; }else{ "Eduguide";} ?></title>
<meta name="keywords" content="<?php if($meta_keyword !=""){ echo  strip_tags(@$meta_keyword); }else{ "Eduguide";} ?>" />

<meta name="description" content="<?php if($meta_description !=""){ echo strip_tags(@$meta_description); }else{ "Eduguide";} ?>" />

  <meta property="og:title" content="<?php if($title !=""){ echo  $title; }else{ "Eduguide";} ?>" />
<meta property="og:description" content="<?php if($meta_description !=""){ echo  strip_tags(@$meta_description); }else{ "Eduguide";} ?>" />
<?php
        if($data['page_id'] == 151)
            {
                ?>
<meta property="og:image" content="<?php echo base_url() ?>assets/uploads/blog/<?php  echo @$blog_image; ?>" />

<?php }else{ ?>
<meta property="og:image" content="https://www.eduguideplus.com/assets/images/admin-logo.png" />
<?php } ?>
  <link rel="icon" href="<?php echo base_url();?>assets/images/favicon.png">
  <!-- Bootstrap -->
  <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
  <!--Custom template CSS-->
  <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
   <!--  <link href="<?php echo base_url();?>assets/css/styleone.css" rel="stylesheet"> -->
  <link href="<?php echo base_url();?>assets/css/sujan.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/css/responsive.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/css/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css" />
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

  

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

  

  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/select2/select2.min.css">  
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
<link rel='stylesheet prefetch' href='https://cdn.jsdelivr.net/jquery.slick/1.5.9/slick.css'>
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

 <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">

 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">

     <link href="https://cdn-na.infragistics.com/igniteui/2018.2/latest/css/themes/infragistics/infragistics.theme.css" rel="stylesheet" />
    <link href="https://cdn-na.infragistics.com/igniteui/2018.2/latest/css/structure/infragistics.css" rel="stylesheet" />
 
       <!--  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/examples.css"> -->

    <script type="text/javascript" src="<?php echo base_url();?>assets/custom_script/validation_rulse.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-145050173-1"></script>

<script>

  window.dataLayer = window.dataLayer || [];

  function gtag(){dataLayer.push(arguments);}

  gtag('js', new Date());

 

  gtag('config', 'UA-145050173-1');

</script>

    
  </head>
  <body onload="open_reg_modal()">
   <!--   <div id="loader-wrapper">
            <div id="loader"></div>
            <div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>
            <img src="<?php echo base_url(); ?>assets/images/site-logo.png" alt="" width="10%" class="img-responsive">
        </div> -->
    <div class="se-pre-con"></div>


<!-- top-header-start -->

    <section id="top_header_sec">
      <?php

$contact=$this->common_model->common($table_name = 'tbl_contact', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');






?>
      <div class="top_header_part">
        <div class="container">
          <div class="col-md-12">
            <div class="row">

              <div class="col-md-6">
                <div class="top_header_left">
                  <ul>
                    <li><a href="tel:<?php echo @$contact[0]->contact_phno; ?>"><i class="fa fa-phone" aria-hidden="true"></i> <?php echo @$contact[0]->contact_phno; ?></a></li>
                    <li><a href="mailto:<?php echo @$contact[0]->contact_email; ?>"><i class="fa fa-envelope" aria-hidden="true"></i> <?php echo @$contact[0]->contact_email; ?></a></li>
                  </ul>
                </div>
              </div>

              <div class="col-md-6">
                <div class="top_header_right">
                  <a href="#"><button type="button">Download App</button></a>
                  <a href="#"><i class="fa fa-android" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-apple" aria-hidden="true"></i></a>
                 <!--  <ul>
                    <li><a href="#"><i class="fa fa-phone" aria-hidden="true"></a></li>
                    <li><a href="#"><i class="fa fa-phone" aria-hidden="true"></a></li>
                  </ul> -->
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- top-header-end -->
  

    <div id="header" class="container-fluid home">
      <div class="row">

       <div class="top_header">
        <nav class="navbar navbar-fixed-top">

         <div class="container">
          <div class="row">
            <div class="col-md-2 col-xs-3 col-sm-3">
             <div class="header-bg"> 
           <div class="logo">
            <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/eduguide-logo01.png" class="img-responsive" alt=""></a>
          </div>


              
        <?php  $social = $this->common_model->common($table_name = 'tbl_social_link', $field = array(), $where = array(), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = ''); ?>
            
             



          <?php if($this->session->userdata('activeuser')!=''){

          $user_det= $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>$this->session->userdata('activeuser')), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

            ?>

        
            <?php } ?>




        </div>
      </div>


      <div class="col-md-10 col-sm-9 col-xs-9">


      <nav class="navbar main-nav">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span> 
            </button>
            
          </div>


        <div class="collapse navbar-collapse main-nav-cnt " id="myNavbar">
             <ul class="nav navbar-nav pull-right res-nav exam-menu">


        <li><a href="<?php echo base_url(); ?>">Home</a></li>

              <!-- <li><a href="<?php echo $this->url->link(127); ?>"> Profile Of SP </a></li>
            <li><a href="<?php echo $this->url->link(128); ?>"> Available Test</a></li>
                <li><a href="<?php echo $this->url->link(129); ?>">link</a></li> -->
                <li><a href="<?php echo $this->url->link(127); ?>">About us</a></li>
                <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="">Career Guide <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                   <?php if(@$user_det[0]->user_type_id!=3) { ?>
                    <li><a href="<?php echo $this->url->link(149);?>">Course & Colleges</a></li>
                  <?php } ?>

                   <li><a href="<?php echo $this->url->link(131); ?>">Online Exams </a></li>
                         <li><a href="<?php echo $this->url->link(154);?>"> Services</a></li>
                         <li><a href="<?php echo $this->url->link(155);?>"> Study Abroad</a></li>
                          <li><a href="<?php echo $this->url->link(151);?>"> Video Tutorials</a></li>
                
                
                </ul>
                </li>

                <!-- <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="">Registration<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                   <?php if(@$user_det[0]->user_type_id!=3) { ?>
                    <li><a href="#">Course & Colleges</a></li>
                  <?php } ?>

                   <li><a href="#">College</a></li>
                         <li><a href="#">School</a></li>
                         <li><a href="#">Interested Course</a></li>
                         <li><a href="#">Interested Exam</a></li>
                     
                
                
                </ul>
                </li> -->

                <!-- <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="">resources <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="<?php echo $this->url->link(144); ?>"> Articles</a></li>
                    <li><a href="<?php echo $this->url->link(147); ?>"> Gallery</a></li>
                   
                    <li><a href="<?php echo $this->url->link(138); ?>"> Important Links  </a></li>
                     <li><a href="<?php echo $this->url->link(155); ?>">  Downloads  </a></li>
                
                
                </ul>
                </li> -->

              <!--   <li><a href="<?php //echo $this->url->link(153); ?>">Tools</a></li> -->
              

            
              <li><a href="<?php echo $this->url->link(130); ?>">Contact Us</a>
                <!-- <li><a href="<?php echo $this->url->link(130); ?>">Contact Us</a> -->
                
              </li>
               
               

            
                 

                <!-- <li><a href=""> Signout </a></li> -->

                  <?php if($this->session->userdata('activeuser')==''){ ?>

                   <li class="dropdown"><!-- <?php echo $this->url->link(86); ?> -->
                    <a href="<?php echo $this->url->link(86); ?>"> Login / Sign Up <!-- <span class="caret"></span> --></a>
                    <!-- <ul class="dropdown-menu">
                       <li><a href="<?php echo $this->url->link(86); ?>">Student</a></li>
                       <li><a href="<?php echo $this->url->link(161); ?>"> Partner</a></li>
                      <li><a href="<?php echo $this->url->link(142); ?>"> Principal</a></li>         
                    </ul> -->
                  </li>
                   <?php
                 }
                 ?>

                 <?php if($this->session->userdata('activeuser')!=''){

                  $name_array= @explode(' ',@$user_det[0]->user_name);
                  $firstName= @$name_array[0];
                 ?>
                <li class="dropdown">
               <a href="#" class="dropdown-toggle <?php if($this->session->userdata('activeuser')!=''){ ?> login_active <?php } ?>" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo @$firstName; ?><span class="caret"></span></a>
         <ul class="dropdown-menu">
              <li><a href="<?php echo $this->url->link(95); ?>"> Dashboard</a></li>
                <li><a href="<?php echo base_url().'logout';?>"> Log Out</a></li>
                
                
          </ul>
            </li>
               
             <?php
           }
           if(@$user_det[0]->user_type_id==2 || @$user_det[0]->user_type_id=='')
             {
           ?>
             
           <!--  <li><a href="<?php echo $this->url->link(131); ?>">Training Portal</a></li> --> 

             <!-- <li><a href="http://nism.surajitpramanick.com/">Training Portal</a></li> -->
              <?php } ?>
              </ul>


            </div>


             </div>
      </nav>



      </div>












          </div>

        </div>
        <!-- container-fluid -->
      </nav>

        </div>


      </div>
    </div>


<input type="hidden" name="baseurl" id="baseurl" value="<?php echo base_url(); ?>">


