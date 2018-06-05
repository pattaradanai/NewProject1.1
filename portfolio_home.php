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
			.item{
				width:200px;
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
				float:left;
				width: 100%;
				min-height: 35px;
				outline: none;
				resize: none;
				}
			
			</style>


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
		<div align = "right" style = "padding-top: 5%;" >	
	
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
					$sql = "SELECT `name`, `surname` 
							FROM `student`
							WHERE `studentid`='{$_SESSION['stdid_search']}'";
					$query = mysqli_query($conn, $sql); 
					$name = $query->fetch_array();
					// echo var_dump($name);
					echo "<h3>{$name['name']} {$name['surname']}</h3>";
				?>
				</div>
				</div>
				<div class="row">
				<!-- ใส่ตามช่างงาน  -->
				<?php
				$count = 1;
				mysqli_set_charset($conn, "utf8");
				##### หารหัสวิชาของงานที่นักเรียนเลือกไว้ #####
				$studentid = $_SESSION['stdid_search'];
				$img = "SELECT DISTINCT `workid` 
						FROM `work_studentdata` 
						WHERE `studentid`='$studentid'
						AND `portfolio`='1' 
						ORDER BY `workid` DESC";
				// echo $img;
				$imgstd = mysqli_query($conn, $img);  
				while($workid = $imgstd -> fetch_assoc()){
					$sql = "SELECT `img` 
							FROM `work{$workid['workid']}` 
							WHERE `imgno`='1' 
							AND `studentid`='$studentid'";
							// AND `work{$workid['workid']}`.`imgno`='1'";
					$query = mysqli_query($conn, $sql);
					while($row = $query->fetch_assoc()){
						$sql = "SELECT * FROM `student` WHERE `studentid`='$studentid'";
						$name = mysqli_query($conn, $sql);
						echo "<div class='col-md-4 text-center animate-box'>";
						$sql_subject = "SELECT `subjectid` FROM `work_subjectdata` WHERE `workid`='{$workid['workid']}'";
						$query_subject = mysqli_query($conn, $sql_subject);
						$subject = $query_subject->fetch_array();
						echo "<a class='work' href='portfolio_show_work.php?portfolio_show_stdid=$studentid&portfolio_show_subjectid={$subject['subjectid']}&portfolio_show_workid={$workid['workid']}' name='studentid_form_index'>";
						echo "<div class='work-grid'>";
						echo "<div class='desc' align='center' style='color: black;'>";
						echo "<div class='item'>";
						echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['img'] ).'"  width="200" height="200" />'; 
						echo "<h3 align = 'center' style='margin-top:9px; padding:7px 3px 7px 3px; background-color:rgb(250,250,250); border:3px groove rgb(245,245,245);'>";
						echo "<font face='verdana' >";
						while($name_data = $name -> fetch_assoc()){
							echo "ผลงานของนักเรียน {$name_data['name']} {$name_data['surname']}";
							$count++;
							break;
						}		
						echo"</font>
							</h3>";
						// echo "<font > ";
						// echo "</font>";
						echo "</div>";
						echo "</div> ";
						echo "</div>";
						echo "</a>";
						echo "</div>";
					}
				}
			?> 
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

