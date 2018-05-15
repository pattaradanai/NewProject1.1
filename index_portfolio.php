<!DOCTYPE HTML>
<?php
	session_start();
	include('config.php');
?>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Silpakorn</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by FreeHTML5.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
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
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
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

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!--  Object  -->
	<script src='http://code.jquery.com/jquery-1.9.1.min.js' type='text/javascript'></script>
<script src='jquery.reel.js' type='text/javascript'></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	<style> 
		input[type=search] {
			width: 200px;
			box-sizing: border-box;
			border: 2px solid #ccc;
			border-radius: 4px;
			font-size: 16px;
			background-color: white;
			background-position: 10px 10px; 
			background-repeat: no-repeat;
			padding: 12px 20px 12px 40px;
			margin-right: 30px;
			
		}

		
	</style>

	</head>
	<body>
		
	<div class="fh5co-loader"></div>
	
	<div id="page">
	<nav class="fh5co-nav" role="navigation">
		<div class="container">
			<div class="fh5co-top-logo">
			<div id="fh5co-logo"><a href="index.php">Home</a></div>
			</div>
			<div class="fh5co-top-menu menu-1 text-center">
				<ul>
						<!-- Link Menu Write here (Web)-->
					<li class="has-dropdown">						
						<ul class="dropdown">
							<!-- Link Menu Write here (mobile)-->
							<a href="Login.html">Login</a>
						</ul>
					</li>					
				</ul>
			</div>
			<div class="fh5co-top-social menu-1 text-right">
				<ul class="fh5co-social">
				<?php include('index_is_login.php');?>
				
				
				</ul>
			</div>
		</div>
	</nav>
		<div align = "right" >	
	
			<p style = "margin-right: 90px; margin-bottom: 5px;  color:#3b3a3a;" >ค้นหาผลงานนักเรียน</p>
	
		</div>

		<div align = "right"  margin-right = "50px">	
		<form action="search.php" method="post">
			<img src="images/search.png" alt="Girl in a jacket" style="width:50px;height:50px;">
			<input type="search" name="search" placeholder="รหัสนักเรียน" required>
			<span class="validity"></span>
		</form>		
	</div>
	
	<div id="fh5co-work">
		<div class="container">
			<div class="row top-line animate-box">
				<div class="col-md-12 text-center intro">
				<font face="verdana" >  
				<?php 
					//$workid =  $_SESSION["workid"] ;
					
					$stdid =  $_SESSION["stdid_search"] ;
					
					
					$sql_port = "SELECT  `workid` FROM `work_studentdata` WHERE `studentid` = $stdid ";
					$sql_name = "SELECT * FROM `student` WHERE `studentid` = $stdid";
					$query_name =  mysqli_query($conn,$sql_name);
					$query_port =  mysqli_query($conn,$sql_port);

					//echo var_dump($query_name);
                   
					$objName = mysqli_fetch_array($query_name);
					$objPort = mysqli_fetch_array($query_port);





					




				
				
				
				?>
				<div class = "createborder">
					<font face="verdana" >  
						<h3> ชื่อ : <?php  echo $objName["name"] ?> </h3> 
						<h3> นามสกุล : <?php echo $objName["surname"] ?> </h3>
						<h3> รหัสนักเรียน : <?php echo $objName["studentid"] ?>  </h3>
						<h3> ห้อง : <?php echo $objName["class"] ?> </h3>
				

				
				</font>
				</div>
				
			</div>
			<div class="row">
	
				<div class="col-md-4 text-center animate-box">
					<a class="work" >
						<div class="work-grid" style="background-color: white">
								<div class="desc" align="center" style="color: black;">
									
								</div>
							
						</div>
					</a>
				</div>
	

			</div>
		</div>
	</div>

	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
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

