<!DOCTYPE HTML>
<?php
// session_start();
include('config.php');
?>
<html>
	<head>
			<style>
			.item{
				width:100px;
				text-align:center;
				display:block;
				background-color: transparent;
				border: 1px solid transparent;
				margin-right: 0px;
				padding : 20px;
				margin-bottom: 1px;
				float:left;
				
				}
			textarea{	
					
					margin-right : 20px ;
					color: black;
				}
			
			</style>

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
	<meta charset='utf-8' content='text/html' http-equiv='Content-type' />

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
		input[type=text] {
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
			<div class="fh5co-top-logo" >
				<a   id="fh5co-logo"  href="index.php">Home </a>
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
					<?php include('index_is_login.php');?>
					<div id="fh5co-logo"><a href="Login.html">Login</a></div>
				</ul>
			</div>
		</div>
	</nav>
	<	<div align = "right" >	
		<p style = "margin-right: 90px; margin-bottom: 5px;  color:#3b3a3a;" >ค้นหาผลงานนักเรียน</p>
	</div>

		<div align = "right"  margin-right = "50px">	
	
			<img src="images/search.png" alt="Girl in a jacket" style="width:50px;height:50px;">
			
			<input type="text" name="search" placeholder="รหัสนักเรียน" >
		
	</div>
	
	<div id="fh5co-work">
		<div class="container">
			<div class="row top-line animate-box">
				<div class="col-md-12 text-center intro">
					<h1>  
                   
                    </h1>
					<!-- <h2>Shift is a Collection of a Beautiful &amp; Premium Themes.</h2> -->
				</div>
				<?php
                    // $subjectid = $_SESSION['subjectid_form_index'];
                    // $workid = $_SESSION['workid_form_index'];
                    // $studentid = $_SESSION['studentid_form_index'];
                    // $subjectid = $_GET['subjectid_form_index'];
                    // $workid = $_GET['workid_form_index'];
                    // $studentid = $_GET['studentid_form_index'];
                    $src = "bottle/001.jpeg";
                    $src1 = "bottle/###.jpeg";
                    // $src = "images/img_data/1612101/161110004/61002/001.jpg";
                    // $src1 = "images/img_data/1612101/161110004/61002/###.jpg";
				?>
			</div>
			<div  align = "center">
					<?php echo "
						<img src= $src width='200' height='200'
						class='reel'
						id='image'
						data-images=$src1 
						data-frames='32'
						data-frame='32'
						data-rows='2'
						data-row='2'
						data-speed='0.3'>
						"
						?>
				<div class="reel-annotation"
						id="last_row"
						data-start="1"
						data-end="32"
						data-x="2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32"
						data-y="2"
						data-for="image">
				</div>
				<div class="reel-annotation"
						id="first_row"
						data-start="33"
						data-end="64"
						data-x="33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63"
						data-y="33"
						data-for="image">
				</div>
				<div style='margin-top: 4em '>
					<a style='color: black'>Score: 
					
					</a>
				</div>
			</div>
		</div>
	</div>
	<footer id="fh5co-footer" role="contentinfo">

	</footer>
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
	<script> $.reel.def.indicator = 5; </script>

	</body>
</html>