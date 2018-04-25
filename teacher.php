<!DOCTYPE HTML>



<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Shift &mdash; Free Website Template, Free HTML5 Template by FreeHTML5.co</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Free HTML5 Website Template by FreeHTML5.co" />
  <meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive"
  />
  <meta name="author" content="FreeHTML5.co" />

  <!-- 
	//////////////////////////////////////////////////////

	FREE HTML5 TEMPLATE 
	DESIGNED & DEVELOPED by FreeHTML5.co
		
	Website: 		http://freehtml5.co/
	Email: 			info@freehtml5.co
	Twitter: 		http://twitter.com/fh5co
	Facebook: 		https://www.facebook.com/fh5co

	//////////////////////////////////////////////////////
	 -->

  <!-- Facebook and Twitter integration -->
  <meta property="og:title" content="" />
  <meta property="og:image" content="" />
  <meta property="og:url" content="" />
  <meta property="og:site_name" content="" />
  <meta property="og:description" content="" />
  <meta name="twitter:title" content="" />
  <meta name="twitter:image" content="" />
  <meta name="twitter:url" content="" />
  <meta name="twitter:card" content="" />

  <!-- <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet"> -->

  <!-- Animate.css -->
  <link rel="stylesheet" href="css/animate.css">
  <!-- Icomoon Icon Fonts-->
  <link rel="stylesheet" href="css/icomoon.css">
  <!-- Bootstrap  -->
  <link rel="stylesheet" href="css/bootstrap.css">
  <!-- Theme style  -->
  <link rel="stylesheet" href="css/style.css">
  <!-- Specified style-->
  <link rel="stylesheet" href="css/teacher.css">

  <!-- Modernizr JS -->
  <script src="js/modernizr-2.6.2.min.js"></script>
  <!--  Object  -->
  <script src='http://code.jquery.com/jquery-1.9.1.min.js' type='text/javascript'></script>
  <script src='jquery.reel.js' type='text/javascript'></script>
  <!-- FOR IE9 below -->
  <!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

</head>

<body>
  <div class="fh5co-loader"></div>

  <div id="page">
    <nav class="fh5co-nav" role="navigation">
      <div class="container">
        <div class="fh5co-top-logo">
          <div id="fh5co-logo">
            <a href="index.php">Logout</a>
          </div>
        </div>
        <div class="fh5co-top-menu menu-1 text-center">
          <ul>
            <!-- Link Menu Write here (Web)-->
            <li class="has-dropdown">

              <ul class="dropdown">
                <!-- Link Menu Write here (mobile)-->
              </ul>
            </li>

          </ul>
        </div>
        <div class="fh5co-top-social menu-1 text-right">
          <ul class="fh5co-social">
            <li>
              <a href="https://github.com/pattaradanai/NewProject1.1">
                <i class="icon-github"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="contentBox">
      <?php include 'add_teacher_name.php' ?>
      <div style="margin-bottom: 5px;">
      <form class="accform" action="acc_add_subject.php" method="POST">
        <div>
          <label for="subname">Subject: </label>
          <input class="subinput" type="text" name="subname" placeholder="Subject name" required>  
        </div>
        <div>
          <label for="year">Year: </label>
          <input class="subinput" type="text" name="year" placeholder="Year" required>  
        </div>
        <div>
          <label for="term">Term: </label>
          <input class="subinput" type="text" name="term" placeholder="Term" required>  
        </div>
        <div>
          <label for="term">Section: </label>
          <input class="subinput" type="text" name="section" placeholder="Section" required>  
        </div>
        <div>
          <label for="year1-6">Year1-6: </label>
          <input class="subinput" type="text" name="year1-6" placeholder="Year1-6" required>  
        </div>
        <div class="createacc">
          <button type"submit">
            Add Subject
          </button>
        </div>
      </form>
      </div>
      <?php
        include 'generate_acc_teacher.php';
      ?> 
  </div>
  <footer id="fh5co-footer" role="contentinfo">

</footer>
  <div class="gototop js-top">
    <a href="#" class="js-gotop">
      <i class="icon-arrow-up"></i>
    </a>
  </div>

  <!-- jQuery -->
  <script src="js/jquery.min.js"></script>
  <!-- jQuery Easing -->
  <script src="js/jquery.easing.1.3.js"></script>
  <!-- Bootstrap -->
  <script src="js/bootstrap.min.js"></script>
  <!-- Waypoints -->
  <script src="js/jquery.waypoints.min.js"></script>
  <!-- Main -->
  <script src="js/main.js"></script>
  <!-- Object -->
  <!-- <script> $.reel.def.indicator = 5; </script> -->

</body>

</html>
