<?php 

session_start();

if(isset($_SESSION['id_user']) || isset($_SESSION['id_company'])) { 
  header("Location: index.php");
  exit();
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Job Portal</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="css/AdminLTE.min.css">
  <link rel="stylesheet" href="css/_all-skins.min.css">
  <!-- Custom -->
  <link rel="stylesheet" href="css/custom.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

<header  style="background-color: rgba(250,250,250,10); box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); padding: 2px 0; display: flex; align-items: center; justify-content: space-between;"> 
    <!-- Logo -->
    <a href="index.php" style="padding: 3px; display: inline-block;"> 
            <img src="img/logo2.png" alt="Job Portal Logo" style="height: 50px; width: auto;"> <!-- Adjust the height as needed -->
        </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav  style="background-color: rgba(248, 248, 248, 0.8); border: none; padding: 2px 0; box-shadow: none;">
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav" style="font-size: 16px; margin: 0; padding: 0; list-style: none; display: flex;"> 
                <li style="margin: 0 10px;">
                    <a href="jobs.php" style="color: black;">Jobs</a> <!-- Orange text color -->
                </li>
                <?php if(empty($_SESSION['id_user']) && empty($_SESSION['id_company'])) { ?>
                <li style="margin: 0 10px;">
                    <a href="login.php" style="color: black;">Login</a> <!-- Orange text color -->
                </li>
                <li style="margin: 0 10px;">
                    <a href="sign-up.php" style="color: black;">Sign Up</a> <!-- Orange text color -->
                </li>  
                <?php } else { 

                if(isset($_SESSION['id_user'])) { 
                ?>        
                <li style="margin: 0 10px;">
                    <a href="user/index.php" style="color: black;">Dashboard</a> <!-- Orange text color -->
                </li>
                <?php
                } else if(isset($_SESSION['id_company'])) { 
                ?>        
                <li style="margin: 0 10px;">
                    <a href="company/index.php" style="color: black;">Dashboard</a> <!-- Orange text color -->
                </li>
                <?php } ?>
                <li style="margin: 0 10px;">
                    <a href="logout.php" style="color: black;">Logout</a> <!-- Orange text color -->
                </li>
                <?php } ?>          
            </ul>
        </div>
    </nav>
</header>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-left: 0px;">

    <section class="content-header">
      <div class="container">
        <div class="row latest-job margin-top-50 margin-bottom-20">
          <h1 class="text-center margin-bottom-20">Log in</h1>
          <div class="col-md-6 latest-job ">
            <div class="small-box bg-yellow padding-5">
              <div class="inner">
                <h3 class="text-center">Candidates Login</h3>
              </div>
              <a href="login-candidates.php" class="small-box-footer">
                Login <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <div class="col-md-6 latest-job ">
            <div class="small-box bg-red padding-5">
              <div class="inner">
                <h3 class="text-center">Company Login</h3>
              </div>
              <a href="login-company.php" class="small-box-footer">
                Login <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>

    

  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer" style="margin-left: 0px;">
    <div class="text-center">
      <strong>Copyright &copy; 2024-25 <a href="learningfromscratch.online">Careerhub</a>.</strong> All rights
    reserved.
    </div>
  </footer>

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="js/adminlte.min.js"></script>
</body>
</html>