




 <script>

 // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));


  function testsfb()
  {
     FB.login(function(response) {
        if (response.authResponse) {
            console.log('Authenticated!');
            // location.reload(); //or do whatever you want
            testAPI()
        } else {
            console.log('User cancelled login or did not fully authorize.');
        }
    },
    {
        scope: 'email,user_checkins'
    });
  }
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  window.fbAsyncInit = function() {
  FB.init({
    appId      : '1902907476705485',
    cookie     : true,  // enable cookies to allow the server to access 
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.11' ,// use graph api version 2.5
    auth_type: 'rerequest',
     "permission":"public_profile",
      "status":"granted"
  });

  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });

  };

 
  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', {fields: 'id, first_name, last_name, email, gender, birthday,picture,permissions '}, function(response) {
     

       //alert(response.first_name);
        //window.location=base_url+'home';
       // alert(base_url);
        $.ajax(
        {
            type:'POST',
           // dataType:'json',
            url:'<?php echo base_url();?>manage_login/fb_login_action',
            data: { unique_id:response.id,
                    user_first_name:response.first_name,
                    user_last_name:response.last_name,
                    user_email:response.email,
                    user_gender:response.gender,
                    user_img: response.picture.data['url']
                },
            success: function (data)
            {
              //alert(data);
              var checkout='<?php echo $this->session->userdata('cart_session_id'); ?>';
              var  practice_exam_session = '<?php echo $this->session->userdata('practiceexam_id');?>';
              var  practice_cat_session = '<?php echo $this->session->userdata('practicecat_slug');?>';
              var live_tst_ss='<?php echo $this->session->userdata('livetest');?>';
              var forum_sess='<?php echo $this->session->userdata('go_to'); ?>';
              var blog_id='<?php echo $this->session->userdata('blog_id'); ?>'
              var blog_cmnt='<?php echo $this->session->userdata('blog_comment'); ?>';

              if(data=='1')
              {
                  $("#er_msg").show();
                  $("#er_msg").text('Sorry!! Email already exist.');
              }
              else
              {
                if(checkout!='')
                {
                   window.location.href = '<?php echo base_url(); ?>plan/checkout';
                }
                else if(practice_exam_session!='' && practice_cat_session!='')
                {
                   window.location.href="<?php echo $this->url->link(64).'/'?>"+practice_exam_session+'/'+practice_cat_session;
                }
                else if(live_tst_ss=='proceed')
                {
                  window.location.href="<?php echo $this->url->link(33);?>";
                }
                else if(forum_sess=='discussion')
                {
                  window.location.href="<?php echo $this->url->link(76);?>";
                }
                else if(blog_id!='' && blog_cmnt!='')
                {
                   $.ajax({
                              
                                             url:base_url+'index.php/manage_blog/put_comment',
                                             data:{cmnt:blog_cmnt,blog:blog_id},
                                             dataType: "json",
                                             type: "POST",
                                             success: function(data){
                                              var perform= data.workdone;
                                              //alert(perform['status']);
                                              
                                              if(perform['status']==1)
                                              {
                                               $("#myModal").modal('hide');
                                                $("#suc_msg").text('Your comment added successfully.wait for admin approval');
                                                setTimeout(function() {
                                                  $("#suc_msg").text('');
                                                }, 10000);
                                                
                                              }
                                              
                                            
                                                  }
                                         });

                }
                else
                {
                  location.href = "<?php echo $this->url->link(8);?>";

                }
                 //location.reload();
                 

              }
              // alert('You are successfully logged in');
               
              
           }
        });
    });
  }
  

 
  
</script>


<?php
  //$exam_all = $this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('status'=>'Active', 'type'=>'product'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
//$exam_all=$this->home_model->select_custom_plan();
/*echo '<pre>';
print_r($exam_all);*/

  

if($this->session->userdata('activeuser')!='')
{
  $user_id=$this->session->userdata('activeuser');
  
     $user = $this->common_model->common($table_name = 'tbl_user', $field = array(), $where = array('id'=>$user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');
     $exam_group=@$user[0]->exam_group;
     $exam_id=@$user[0]->exam_id;
 

  


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
  <title>livetestportal</title>
  <link rel="icon" href="<?php echo base_url();?>assets/images/favicon.png">
  <!-- Bootstrap -->
  <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
  <!--Custom template CSS-->
  <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/css/responsive.css" rel="stylesheet">
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
<link rel='stylesheet prefetch' href='http://cdn.jsdelivr.net/jquery.slick/1.5.9/slick.css'>
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

 <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
       <!--  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/examples.css"> -->

    <script type="text/javascript" src="<?php echo base_url();?>assets/custom_script/validation_rulse.js"></script>

   <!-- <style>
.no-js #loader { display: none;  }
.js #loader { display: block; position: absolute; left: 100px; top: 0; }
.se-pre-con {
  position: fixed;
  left: 0px;
  top: 0px;
  width: 100%;
  height: 100%;
  z-index: 999999;
  background: url(<?php echo base_url();?>assets/images/Preloader_1.png) center no-repeat #fff;
}
</style>  -->



    
  </head>
  <body onload="open_reg_modal()">
     <div id="loader-wrapper">
            <div id="loader"></div>
            <div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>
            <img src="<?php echo base_url(); ?>assets/images/site-logo.png" alt="" width="10%" class="img-responsive">
        </div><!--//preloader-->
    <div class="se-pre-con"></div>

   <!--  <div id="loadessr"><div><img src="<?php echo base_url();?>assets/images/Preloader_1.gif"></div></div> -->
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
          <div class="row">
            <div class="col-md-12 col-xs-12 col-sm-12">
             <div class="header-bg"> 
           <div class="logo">
            <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/site-logo.png" class="img-responsive" alt=""></a>
          </div>


              <div class="dropdown dropdown-cart pull-right cart-list"  ><a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown" id="cart_count"> <?php
              if($this->session->userdata('cart_session_id') != "")
              {
                $cart_session_id = $this->session->userdata('cart_session_id');

                $data = $this->home_model->selectOne('tbl_cart','cart_session_id',$cart_session_id);
                $total_cart = count($data);
                ?>
                <span class="basket-item-count count"><?php echo $total_cart;?></span>
                <?php } else { ?><span class="basket-item-count count">0</span>
                <?php } ?></a>
                <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown"><div class="items-cart-inner">
                  <div class="basket">
                    <div class="cart-icon"><i class="fa fa-shopping-cart" aria-hidden="true"></i></div>

                  </div>
                  
                  
                </div>
              </a>
              <ul class="dropdown-menu">
                <li id="cart-detail">
                 <?php 
                 if($this->session->userdata('cart_session_id') != "")
                 {
                  $cart_session_id = $this->session->userdata('cart_session_id');
                  $data = $this->home_model->selectOne('tbl_cart','cart_session_id',$cart_session_id);
                  $total_price = 0;
                  if(count($data)!=0)
                  {
                    foreach ($data as $cart) {
                      $plan = $this->home_model->selectOne('tbl_plan','id',$cart->plan_id);
                      $plan_title = $plan[0]->plan_title;
                      $total_price = $total_price + $cart->price;
                      $company_id = $plan[0]->company_id;
                      $company = $this->home_model->selectOne('tbl_exam_type','id',$company_id);

                      ?>
                      <div class="cart-item product-summary">
                        <div class="row">
                         
                          <div class="col-xs-11 mh">
                            <h3 class="name"><a><?php echo $plan_title;?></a></h3>
                            <p>12 Months Subscription</p>
                            <div class="price" id="kom"><i class="fa fa-inr" aria-hidden="true"></i> <?php echo $cart->price; ?></div>

                          </div>
                          <div class="col-xs-1 action"> <a href="javascript:void(0)" onclick="delete_cart(<?php echo $cart->id;?>)"><i class="glyphicon glyphicon-remove-circle"></i></a> </div>
                        </div>
                      </div>

                      <hr>
                      <?php } ?>
                      <div class="cart-total">
                        <div class="cart-price"> <span class="text">Sub Total :</span><span class="price"><i class="fa fa-inr" aria-hidden="true"></i> <?php echo $total_price; ?></span> </div>
                        <div class="clearfix"></div>
                        <a href="<?php echo base_url();?>plan/cart_view" class="btn btn-upper btn-primary check pull-left" id="cart">View Details</a> 
                        <a href="javascript:void(0)" class="btn btn-upper btn-primary check pull-right" id="check" onclick="user_check_login()">Checkout</a> </div>                <!-- /.cart-total--> 
                        <?php
                      }
                      else

                      {

                        ?>
                        <div class="cart-item product-summary">
                         <div class="row text-center">
                          <h4>Your cart is empty !!!</h4>
                        </div>
                      </div>
                      <hr>
                      <div class="clearfix cart-total">
                        
                        <a href="<?php echo $this->url->link(63);?>" class="btn btn-upper btn-primary btn-block m-t-20" id="cart">Book Plan</a> 
                      </div>  
                      <?php
                    } } else { ?>
                    <div class="cart-item product-summary">
                     <div class="row text-center">
                      <h4>Your cart is empty !!!</h4>
                    </div>
                  </div>
                  <hr>
                  <div class="clearfix cart-total">
                    
                    <a href="<?php echo $this->url->link(103); ?>" class="btn btn-upper btn-primary btn-block m-t-20" id="cart">Cart</a> 
                  </div>  
                  <?php
                }?>
              </li>
            </ul>
            <!-- /.dropdown-menu--> 
          </div>

            <ul class="social-link">
              <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
            </ul>
             



          <?php if($this->session->userdata('user_identity')!=''){?>

             <?php } else{?>
            <a href="" class="user-btn login">User Login Details</a>
            <?php } ?>




        </div>
      </div>


      <div class="col-md-12 col-sm-12 col-xs-12">


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

              <li><a href="<?php echo $this->url->link(93); ?>"> Mock Test </a></li>

                <li class="dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Start Test<span class="caret"></span></a>
         <ul class="dropdown-menu">
              <li><a href="<?php echo $this->url->link(88);?>"> Knowledge Test</a></li>
                <li><a href="<?php echo $this->url->link(88);?>"> Quiz Test 1</a></li>
                <li><a href="<?php echo $this->url->link(88);?>">Quiz Test 2</a></li>
                  <li><a href="<?php echo $this->url->link(88);?>">Quiz Test 2</a></li>
                
          </ul>
            </li>

            <?php 

                $exam_all = $this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('exam_type_id !='=>'o'), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

                //print_r($groups_all);exit;

              ?>

              <li class="dropdown"><a href="#" data-toggle="dropdown">Examinations <span class="caret"></span></a>
                <ul class="dropdown-menu">

                  <?php 

                  $user_id=$this->session->userdata('activeuser');
                  if(@$user_id!='')
                  {


                     //$exam_list = $this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>$exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

                    $exam_list = $this->common_model->common($table_name = 'tbl_user_exam_type', $field = array(), $where = array('user_id'=>$user_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

                     $count=1;

                  foreach($exam_list as $row){

                    $exam_dtls=$this->common_model->common($table_name = 'tbl_exam_type', $field = array(), $where = array('id'=>$row->exam_id), $where_or = array(), $like = array(), $like_or = array(), $order = array(), $start = '', $end = '');

                    ?>
               
                  <li <?php if($count==1){echo 'class="dropdown"';}?>><a href="<?php echo $this->url->link(91).'/'.$exam_dtls[0]->slug.'/'.$exam_dtls[0]->id; ?>"><?php echo $exam_dtls[0]->exam_name; ?></a></li>
                  <?php 
                  $count=$count+1;
                }
              }
              else
              {
                 $count=1;
                foreach($exam_all as $row)
                    {

                    ?>
                  <li <?php if($count==1){echo 'class="dropdown"';}?>><a href="<?php echo $this->url->link(91).'/'.$row->slug.'/'.$row->id; ?>"><?php echo $row->exam_name; ?></a></li>
                 <!--  <li><a href="<?php echo $this->url->link(91); ?>">Railway</a></li>
                 <li><a href="<?php echo $this->url->link(91); ?>">Clearkship</a></li>
                 <li><a href="<?php echo $this->url->link(91); ?>">Health</a></li>
                 <li><a href="<?php echo $this->url->link(91); ?>">Defence</a></li> -->

              <?php $count=$count+1;} }?>

                </ul>
              </li>

            

              <li><a href="<?php echo $this->url->link(97); ?>"> Library </a></li>

              <li><a href="<?php echo $this->url->link(94); ?>"> Discussion </a></li>

              <?php
              $user_id=$this->session->userdata('activeuser');
                  if(@$user_id!='')
                  {
                  ?>

              <li><a href="<?php echo $this->url->link(95); ?>"> Dashboard </a></li>

              <?php } ?>


              <li><a href="<?php echo $this->url->link(96); ?>"> About Examination </a></li>

               <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Career <span class="caret"></span></a>
                <ul class="dropdown-menu">
              <li><a href="<?php echo $this->url->link(86); ?>"> Job Seekers</a></li>
                <li><a href="<?php echo $this->url->link(86); ?>"> Solver</a></li>
                
          </ul>

               </li>
                <li><a href="<?php echo $this->url->link(90); ?>"> Rank & Award </a></li>
                 <?php 

                  $user_id=$this->session->userdata('activeuser');
                  if(@$user_id!='')
                  {
                  ?>

                <li><a href="<?php echo $this->url->link(26); ?>"> Log Out </a></li>

                <?php 
              }
                else
                {
                  ?>
                   <li><a href="<?php echo $this->url->link(86); ?>"> Login </a></li>

                <?php }?>

                <?php 

                  $user_id=$this->session->userdata('activeuser');
                  if(@$user_id=='')
                  {
                  ?>
                <li><a href="<?php echo $this->url->link(87); ?>"> Create Account </a></li>
                <?php 

                }
                ?>
             
             
             
              
             
              

              
              <!-- <li><a data-toggle="modal" data-target="#myModal">Login/Signup</a></li> -->
              <?php if($this->session->userdata('user_identity')!=''){?>
              <li class="my-account dis-none"><a class="post_job dropdown-toggle" data-toggle="dropdown"><?php if($user[0]->profile_photo!=''){?><span class="circle_img"><img class="img-responsive" src="<?php echo base_url();?>assets/uploads/user/<?php echo $user[0]->profile_photo;?>"></span><?php }else{?><span class="fa fa-user-circle-o"></span><?php }?></a> 

                <div class="detail dropdown-menu">
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
            
              <?php } ?>
             <!--  <li class="mobile-menu"><a href="post-a-job.html">POST A JOB, IT’S FREE!</a></li>
              <li class="mobile-menu"><a href="login_register.html">Register User</a></li> -->

              
              
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


