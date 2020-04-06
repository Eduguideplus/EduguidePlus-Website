<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Eduguide Plus</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url();?>bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url();?>dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url();?>plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url();?>plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url();?>plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url();?>plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url();?>plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url();?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/select2/select2.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>custom_css/form_validation.css">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>../assets/images/header/favicon.png">





  <link rel="stylesheet" href="<?php echo base_url();?>css/jquery-ui.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>css/jquery-ui.theme.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>css/jquery-ui.structure.min.css">
  <script src="<?php echo base_url(); ?>plugins/jQueryUI/jquery-ui.min.js"></script>






  <script src="<?php echo base_url(); ?>plugins/datepicker/bootstrap-datepicker.js"></script>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url();?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>SP</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b><img src="<?=base_url();?>../assets/images/admin-logo.png" style="width:60%"></b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!--<img src="<?php echo base_url();?>dist/img/user2-160x160.jpg" class="user-image" alt="User Image">-->
              <span class="hidden-xs">
              <?php if(get_cookie('session_user_id'))
              {
                  $user_id= get_cookie('session_user_id');
                  //echo $user_id;
                  $user_details=$this->admin_model->selectone('tbl_user','id',$user_id);
                  echo $user_details[0]->user_name;
             } ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <!--<img src="<?php echo base_url();?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">-->

                <p>
                  <?php  echo $user_details[0]->user_name; ?>
                  <small></small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">


                   <?php 

$admin_details=$this->session_check_and_session_data->admin_session_data();
       
     //print_r($admin_details);exit;
    if(@$this->user_page_permission_checki_availablity_view_model->check_permission_for_controller('change_password/password_edit',get_cookie('session_user_id'))=='Y' || @$admin_details[0]->user_type_id==6)
    { ?>
  <div class="col-xs-6 text-center">
                    <a href="<?php echo base_url();?>index.php/my_account/my_account_view/<?php echo get_cookie('session_user_id'); ?>">My Account</a>
                  </div>

                   <?php }

$admin_details=$this->session_check_and_session_data->admin_session_data();
       
     //print_r($admin_details);exit;
    if(@$this->user_page_permission_checki_availablity_view_model->check_permission_for_controller('change_password/password_edit',get_cookie('session_user_id'))=='Y' || $admin_details[0]->user_type_id==1)
    { ?>
                  <div class="col-xs-6 text-center">
                    <a href="<?php echo base_url();?>index.php/change_password/password_edit">Change Password</a>
                  </div>

                <?php } 

$admin_details=$this->session_check_and_session_data->admin_session_data();
       
     //print_r($admin_details);exit;
    if(@$this->user_page_permission_checki_availablity_view_model->check_permission_for_controller('email_settings/',get_cookie('session_user_id'))=='Y' || $admin_details[0]->user_type_id==1)
    { ?>
                  <div class="col-xs-6 text-center">
                    <a href="<?php echo base_url();?>index.php/email_settings/">Email Setting</a>
                  </div>

                <?php } ?>
                  <!--<div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>-->
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                   <?php 

$admin_details=$this->session_check_and_session_data->admin_session_data();
       
     //print_r($admin_details);exit;
    if(@$this->user_page_permission_checki_availablity_view_model->check_permission_for_controller('profile/profile_view',get_cookie('session_user_id'))=='Y' || $admin_details[0]->user_type_id==1)
    { ?>
                  <a href="<?php echo base_url();?>index.php/profile/profile_view/<?php echo @$user_id; ?>" class="btn btn-default btn-flat">Profile</a>

            <?php } ?>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url();?>index.php/login/logout/<?php echo $user_id; ?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <!--<li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>-->
        </ul>
      </div>
    </nav>
  </header>