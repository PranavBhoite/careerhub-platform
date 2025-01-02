<?php

//To Handle Session Variables on This Page
session_start();


//Including Database Connection From db.php file to avoid rewriting in all files
require_once("db.php");
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

        <style>
          

.attachment-block:hover {
    background-color: #f8f9fa; /* Light background color on hover */
    transform: scale(1.05); /* Slight zoom effect */
    border-color: #000; /* Darker black border color on hover */
}



.attachment-heading a {
    color: #007bff; /* Blue text color for job title */
    text-decoration: none;
}

.attachment-heading a:hover {
    text-decoration: underline; /* Underline on hover for job title */
}

/* Ensure all thumbnail boxes are the same size */
.thumbnail {
    position: relative;
    overflow: hidden;
    width: 100%; /* Adjust as needed */
    height: 300px; /* Fixed height for uniformity */
    border-radius: 8px;
    transition: transform 0.6s, box-shadow 0.3s;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Optional shadow effect */
    display: flex;
    align-items: center; /* Center content vertically */
    justify-content: center; /* Center content horizontally */
}

.thumbnail img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* Ensures images cover the box without distortion */
    transition: transform 0.6s;
}

.thumbnail:hover img {
    transform: scale(1.1); /* Zoom effect on hover */
}

.thumbnail:hover {
    transform: rotateY(180deg); /* Flip effect on hover */
}

/* Optional: For a better flip effect, you might want to use perspective and 3D transform */
.container {
    perspective: 1000px; /* Add perspective to container */
}

.thumbnail {
    transform-style: preserve-3d; /* Enable 3D transformations */
}

/* Hover effect */
.small-box:hover {
    transform: scale(1.1);
    animation: blink 0.6s ease-in-out infinite;
  }

  /* Blinking effect */
  @keyframes blink {
    0% { border-color: #ff6600; }
    50% { border-color: transparent; }
    100% { border-color: #ff6600; }
  }

          </style>
</head>
<body class="hold-transition skin-green sidebar-mini" style="background-color: black;">
<div style="background-color: black;">

<header style="background-color: rgba(500,500,500,10);"> 
   <!-- Header Navbar -->
   <nav style="background-color: rgba(248, 248, 248, 0.8); border: none; padding: 2px 0; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); display: flex; align-items: center; justify-content: space-between;"> <!-- Added transparency and shadow effect -->
       <!-- Logo -->
       <a href="index.php" style=" padding: 3px; display: inline-block; margin-right: 10px; margin-left: 20px;"> <!-- Added margin-left for spacing -->
           <!-- Logo Image -->
           <img src="img/logo2.png" alt="Job Portal Logo" style="height: 50px; width: auto; margin-right: 10px;"> <!-- Adjust the height as needed -->
       </a>
       <!-- Navbar Right Menu -->
       <div class="navbar-custom-menu">
           <ul class="nav navbar-nav" style="font-size: 14px; margin: 0; padding: 0; list-style: none; display: flex;"> <!-- Reduced font size for navbar items and removed default margin/padding -->
               <li style="margin: 0 10px;">
                   <a href="jobs.php" style="color: black; font-size: 16px;">Jobs</a> <!-- Orange text and increased font size -->
               </li>
               <li style="margin: 0 10px;">
                   <a href="#candidates" style="color: black; font-size: 16px;">Candidates</a> <!-- Orange text and increased font size -->
               </li>
               <li style="margin: 0 10px;">
                   <a href="#company" style="color: black; font-size: 16px;">Company</a> <!-- Orange text and increased font size -->
               </li>
               <li style="margin: 0 10px;">
                   <a href="#about" style="color: black; font-size: 16px;">About Us</a> <!-- Orange text and increased font size -->
               </li>
               <?php if(empty($_SESSION['id_user']) && empty($_SESSION['id_company'])) { ?>
               <li style="margin: 0 10px;">
                   <a href="login.php" style="color: black; font-size: 16px;">Login</a> <!-- Orange text and increased font size -->
               </li>
               <li style="margin: 0 10px;">
                   <a href="sign-up.php" style="color: black; font-size: 16px;">Sign Up</a> <!-- Orange text and increased font size -->
               </li>  
               <?php } else { 
               if(isset($_SESSION['id_user'])) { 
               ?>        
               <li style="margin: 0 10px;">
                   <a href="user/index.php" style="color: black; font-size: 16px;">Dashboard</a> <!-- Orange text and increased font size -->
               </li>
               <?php
               } else if(isset($_SESSION['id_company'])) { 
               ?>        
               <li style="margin: 0 10px;">
                   <a href="company/index.php" style="color: black; font-size: 16px;">Dashboard</a> <!-- Orange text and increased font size -->
               </li>
               <?php } ?>
               <li style="margin: 0 10px;">
                   <a href="logout.php" style="color: black; font-size: 16px;">Logout</a> <!-- Orange text and increased font size -->
               </li>
               <?php } ?>
           </ul>
       </div>
   </nav>
</header>


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-left: 0px;">

  <section style="position: relative; overflow: hidden; background: url('img/starter.png') no-repeat center center; background-size: cover; height: 70vh;">
    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5);"></div> <!-- Dark overlay for brightness reduction -->
    <div class="container" style="position: relative; z-index: 1; display: flex; flex-direction: column; align-items: center; justify-content: center; height: 100%; color: white; padding: 0;">
        <div class="row">
            <div style="max-width: 600px; text-align: center;"> <!-- Center-align text -->
                <h1 style="font-size: 4em; font-weight: bold; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">Welcome <strong>to </strong>Careerhub</h1> <!-- Increased font size and bold -->
                
                <p style="font-size: 2em;">Connecting talent with opportunity</p> <!-- Increased font size -->
                <p>
                    <a class="btn btn-success btn-lg" href="jobs.php" role="button" style="background-color: #ff6600; border-color: #ff6600; color: white; font-size: 1.2em; padding: 10px 20px;">
                        Search Jobs...
                    </a>
                </p>
            </div>
        </div>
    </div>
</section>



    

<section class="content-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12 latest-job margin-bottom-20">
                <h1 class="text-center" style="font-size: 4em; font-weight: bold; color:blue;  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">Latest Jobs</h1>
                <?php 
                /* Show any 4 random job posts
                 * 
                 * Store SQL query result in $result variable and loop through it if we have any rows
                 * returned from database. $result->num_rows will return the total number of rows returned from the database.
                */
                $sql = "SELECT * FROM job_post ORDER BY RAND() LIMIT 4";
                $result = $conn->query($sql);
                if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $sql1 = "SELECT * FROM company WHERE id_company='$row[id_company]'";
                        $result1 = $conn->query($sql1);
                        if($result1->num_rows > 0) {
                            while($row1 = $result1->fetch_assoc()) {
                ?>
                 <div class="attachment-block clearfix">
                    <img class="attachment-img" src="img/photo1.png" alt="Attachment Image">
                    <div class="attachment-pushed">
                        <h4 class="attachment-heading">
                            <a href="view-job-post.php?id=<?php echo $row['id_jobpost']; ?>"><?php echo $row['jobtitle']; ?></a> 
                            <span class="attachment-heading pull-right">$<?php echo $row['maximumsalary']; ?>/Month</span>
                        </h4>
                        <div class="attachment-text">
                            <div><strong><?php echo $row1['companyname']; ?> | <?php echo $row1['city']; ?> | Experience <?php echo $row['experience']; ?> Years</strong></div>
                        </div>
                    </div>
                </div>
                <?php
                            }
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>
</section>

<section id="candidates" class="content-header">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center latest-job margin-bottom-20">
        <h1 style="font-size: 4em; font-weight: bold; color: blue;  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">Candidates</h1>
        <p>Finding a job just got easier. Create a profile and apply with a single mouse click.</p>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-4 col-md-4">
        <div class="thumbnail candidate-img" style="position: relative; overflow: hidden; transition: transform 0.3s ease; border: 1px solid #ff6600;">
          <img src="img/brows.jpg" alt="Browse Jobs" style="width: 100%; height: auto;">
          <div class="caption" style="position: absolute; bottom: 0; left: 0; width: 100%; padding: 10px; text-align: center; color: black; background: white;">
            <h3>Browse Jobs</h3>
          </div>
        </div>
      </div>
      <div class="col-sm-4 col-md-4">
        <div class="thumbnail candidate-img" style="position: relative; overflow: hidden; transition: transform 0.3s ease; border: 1px solid #ff6600;">
          <img src="img/interview.jpeg" alt="Apply & Get Interviewed" style="width: 100%; height: auto;">
          <div class="caption" style="position: absolute; bottom: 0; left: 0; width: 100%; padding: 10px; text-align: center; color: black; background: white;">
            <h3>Apply & Get Interviewed</h3>
          </div>
        </div>
      </div>
      <div class="col-sm-4 col-md-4">
        <div class="thumbnail candidate-img" style="position: relative; overflow: hidden; transition: transform 0.3s ease; border: 1px solid #ff6600;">
          <img src="img/careers.jpeg" alt="Start A Career" style="width: 100%; height: auto;">
          <div class="caption" style="position: absolute; bottom: 0; left: 0; width: 100%; padding: 10px; text-align: center; color: black; background: white;">
            <h3>Start A Career</h3>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<section id="company" class="content-header">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center latest-job margin-bottom-20">
        <h1 style="font-size: 4em; font-weight: bold; color: blue;  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">Companies</h1>
        <p>Hiring? Register your company for free, browse our talented pool, post and track job applications.</p>            
      </div>
    </div>
    <div class="row">
      <div class="col-sm-4 col-md-4">
        <div class="thumbnail company-img" style="position: relative; overflow: hidden; transition: transform 0.3s ease; border: 1px solid #ff6600;">
          <img src="img/post.jpeg" alt="Post A Job" style="width: 100%; height: auto;">
          <div class="caption" style="position: absolute; bottom: 0; left: 0; width: 100%; padding: 10px; text-align: center; color: black; background: white;">
            <h3>Post A Job</h3>
          </div>
        </div>
      </div>
      <div class="col-sm-4 col-md-4">
        <div class="thumbnail company-img" style="position: relative; overflow: hidden; transition: transform 0.3s ease; border: 1px solid #ff6600;">
          <img src="img/manage2.jpg" alt="Manage & Track" style="width: 100%; height: auto;">
          <div class="caption" style="position: absolute; bottom: 0; left: 0; width: 100%; padding: 10px; text-align: center; color: black; background: white;">
            <h3>Manage & Track</h3>
          </div>
        </div>
      </div>
      <div class="col-sm-4 col-md-4">
        <div class="thumbnail company-img" style="position: relative; overflow: hidden; transition: transform 0.3s ease; border: 1px solid #ff6600;">
          <img src="img/hiring.jpg" alt="Hire" style="width: 100%; height: auto;">
          <div class="caption" style="position: absolute; bottom: 0; left: 0; width: 100%; padding: 10px; text-align: center; color: black; background: white;">
            <h3>Hire</h3>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="statistics" class="content-header">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center latest-job margin-bottom-20">
        <h1  style="font-size: 4em; font-weight: bold; color: blue;  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">Our Statistics</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua" style="position: relative; overflow: hidden; transition: transform 0.3s ease; border: 1px solid #ff6600;">
          <div class="inner">
            <?php
              $sql = "SELECT * FROM job_post";
              $result = $conn->query($sql);
              if($result->num_rows > 0) {
                $totalno = $result->num_rows;
              } else {
                $totalno = 0;
              }
            ?>
            <h3><?php echo $totalno; ?></h3>
            <p>Job Offers</p>
          </div>
          <div class="icon">
            <i class="ion ion-ios-paper"></i>
          </div>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green" style="position: relative; overflow: hidden; transition: transform 0.3s ease; border: 1px solid #ff6600;">
          <div class="inner">
            <?php
              $sql = "SELECT * FROM company WHERE active='1'";
              $result = $conn->query($sql);
              if($result->num_rows > 0) {
                $totalno = $result->num_rows;
              } else {
                $totalno = 0;
              }
            ?>
            <h3><?php echo $totalno; ?></h3>
            <p>Registered Company</p>
          </div>
          <div class="icon">
            <i class="ion ion-briefcase"></i>
          </div>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow" style="position: relative; overflow: hidden; transition: transform 0.3s ease; border: 1px solid #ff6600;">
          <div class="inner">
            <?php
              $sql = "SELECT * FROM users WHERE resume!=''";
              $result = $conn->query($sql);
              if($result->num_rows > 0) {
                $totalno = $result->num_rows;
              } else {
                $totalno = 0;
              }
            ?>
            <h3><?php echo $totalno; ?></h3>
            <p>CV'S/Resume</p>
          </div>
          <div class="icon">
            <i class="ion ion-ios-list"></i>
          </div>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red" style="position: relative; overflow: hidden; transition: transform 0.3s ease; border: 1px solid #ff6600;">
          <div class="inner">
            <?php
              $sql = "SELECT * FROM users WHERE active='1'";
              $result = $conn->query($sql);
              if($result->num_rows > 0) {
                $totalno = $result->num_rows;
              } else {
                $totalno = 0;
              }
            ?>
            <h3><?php echo $totalno; ?></h3>
            <p>Daily Users</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-stalker"></i>
          </div>
        </div>
      </div>
      <!-- ./col -->
    </div>
  </div>
</section>


<section id="about" class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center latest-job margin-bottom-20">
            <h1  style="font-size: 4em; font-weight: bold; color: blue;  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">About US</h1>                      
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <img src="img/browse.jpg" class="img-responsive">
          </div>
          <div class="col-md-6 about-text margin-bottom-20">
            <p>We are from Careerhub that is dedicated to helping job seekers find their dream job. <p>The online careerhub application allows job seekers and recruiters to connect.The application provides the ability for job seekers to create their accounts, upload their profile and resume, search for jobs, apply for jobs, view different job openings. The application provides the ability for companies to create their accounts, search candidates, create job postings, and view candidates applications.
            </p>
            <p>
              This website is used to provide a platform for potential candidates to get their dream job and excel in yheir career.
              This site can be used as a paving path for both companies and job-seekers for a better life .
              
            </p>
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

<script>
window.embeddedChatbotConfig = {
chatbotId: "gtsSeGRrGtdxfbFjdSFuX",
domain: "www.chatbase.co"
}
</script>
<script
src="https://www.chatbase.co/embed.min.js"
chatbotId="gtsSeGRrGtdxfbFjdSFuX"
domain="www.chatbase.co"
defer>
</script>

</body>
</html>
