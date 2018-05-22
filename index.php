<!DOCTYPE HTML>
<?php 
		session_start();
		// $_SESSION["status"] = "teacher";
		// $_SESSION["id"] = "101";
		// $_SESSION["sid"] = "61002";
		
	?>
<html>
	<head>
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
				}
			
			</style>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Silpakorn</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by FreeHTML5.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="FreeHTML5.co" />

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
							<?php include('index_is_login.php');?>

						
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
			<input type="search" name="search" placeholder="รหัสนักเรียน" require>
			<span class="validity"></span>
		</form>		
  </div>
	<div id="fh5co-work">

		<div class="container">
	
			<div class="row top-line animate-box">
				
				<div class="col-md-12 text-center intro"  >
					
					<h2> Welcome To  Student Portfolio </h2>
					<!-- <h2>Shift is a Collection of a Beautiful &amp; Premium Themes.</h2> -->
				</div>
				
				
			</div>
				<div align = 'center'>
					<h3 style = " margin-up: 5px;  color:#3b3a3a;"> แสดงผลงานนักเรียนล่าสุด </h3>
				</div>
				<div class="row">
				<?php
					include('config.php');
					$block_no = 1;
					$temp_workid = 0;
					$block_full = false;
					$count = 1;
					mysqli_set_charset($conn, "utf8");
					##### query lastest workid and display image no 1 for each student amount 12 image #####
					$sql = "SELECT DISTINCT `workid`, `workname` FROM `work_subjectdata` ORDER BY `workid` ";
					$query = mysqli_query($conn, $sql);
					while($workid_worksubdata = $query -> fetch_assoc()){
						$sql2 = "SELECT DISTINCT `work_studentdata`.`studentid`, `work{$workid_worksubdata['workid']}`.`imgno`, `work{$workid_worksubdata['workid']}`.`img`
								FROM `work_studentdata` 
								LEFT JOIN `work{$workid_worksubdata['workid']}` 
								ON `work_studentdata`.`studentid`=`work{$workid_worksubdata['workid']}`.`studentid` 
								WHERE `work_studentdata`.`workid`='{$workid_worksubdata['workid']}'
								AND `work{$workid_worksubdata['workid']}`.`imgno`='33'";
						$query2 = mysqli_query($conn, $sql2);
						while($studentid_img = $query2 -> fetch_assoc()){
							$studentid = $studentid_img['studentid'];
							$sql3 = "SELECT * FROM `student` WHERE `studentid`='$studentid'";
							$name = mysqli_query($conn, $sql3);
							echo "<div class='col-md-4 text-center animate-box'>";
							echo "<a  href='index_to_show.php?block_no=$block_no' name='studentid_form_index'>";
							echo "<div class='work-grid' style='background-color: white'>";
							echo "<div class='desc' align='center' style='color: black;'>";
							echo "<div class='item'>";
							echo '<img src="data:image/jpeg;base64,'.base64_encode( $studentid_img['img'] ).'"  width="200" height="200" />'; 
							echo "<h3 align = 'center'>";
							echo "<font face='verdana' >";
							while($name_data = $name -> fetch_assoc()){
								echo "ชิ้นงาน {$workid_worksubdata['workname']} ของ {$name_data['name']} {$name_data['surname']}";
								$count++;
								break;
							}			
							echo"</font>
								</h3>
								</div>
								</div> 
								</div>
								</a>
								</div>";
							if($temp_workid == 0 ){
								$temp_workid = $workid_worksubdata['workid'];
								$block_no++;
							} else {
								$block_no++;
							}
							if($block_no == 12){
								$block_full = true;
							}
						}
						if($block_full==true){
							break;
						}
					}
				?>
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
	<!-- <script> $.reel.def.indicator = 5; </script> -->

	</body>
</html>
