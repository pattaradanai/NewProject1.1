<!DOCTYPE HTML>

<?php
include 'config.php';
 
session_start();
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

	<!-- textarea comment box -->

	
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
	
	</head>
	<body>
		
	<div class="fh5co-loader"></div>
		<div id="page">
			<nav class="fh5co-nav" role="navigation">
				<div class="container">
					<div class="fh5co-top-logo">
				
						<div> <a href="index.php">Logout</a></div>
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
							
							<li><a href="https://github.com/pattaradanai/NewProject1.1"><i class="icon-github"></i></a></li>
						</ul>
					</div>
				</div>
			</nav>
			<div class="container">
			<!-- RUN HARDWHERE -->
                <a href="run_hardware.php">
                    <img src="images/ic_camera_black_24dp_2x.png"  alt=""/> 
                    <h3> <font face="verdana" > upload </font></h3>
                </a>
            </div>
        </div>
        <form action = "commentToDB.php" method="post" >
            <div align="center" >				
                <textarea rows="4" cols="50" name = "comment" >  comment here ...</textarea>
                <br>
                <div  align = "5px" ><button type="submit">Click Me!</button> </div>
            </div>
        </form>
				<!-- comment box -- >
			
				

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
	<script $.reel.def.indicator = 5; </script>
	</body>
</html>