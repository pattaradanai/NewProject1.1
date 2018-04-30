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

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Silpakorn</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by FreeHTML5.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="FreeHTML5.co" />

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

	<div align = "right" >	
	<p style = "margin-right: 90px; margin-bottom: 5px;  color:#3b3a3a;" >ค้นหาผลงานนักเรียน</p>
  </div>

	<div align = "right"  margin-right = "50px">	
	<form>
		<img src="images/search.png" alt="Girl in a jacket" style="width:50px;height:50px;">
		
		<input type="text" name="search" placeholder="รหัสนักเรียน" >
	</form>	
  </div>
	<div id="fh5co-work">

		<div class="container">
	
			<div class="row top-line animate-box">
				
				<div class="col-md-12 text-center intro"  >
					
					<h2> Welcome To  Student Portfolio <i class="icon-heart2"></i> </h2>
					<!-- <h2>Shift is a Collection of a Beautiful &amp; Premium Themes.</h2> -->
				</div>
				
				
			</div>
				<div align = 'center'>
					<h3 style = " margin-up: 5px;  color:#3b3a3a;"> แสดงผลงานนักเรียนล่าสุด </h3>
				</div>
			<div class="row">
				<?php
					include 'config.php';
					$block_no = 1;
					$temp_workid = 0;
					$block_full = false;
					$count = 1;
					mysqli_set_charset($conn, "utf8");

					##### query lastest workid and display image no 1 for each student amount 12 image #####
					$img = "SELECT 'workid' FROM `work_subjectdata` ORDER BY `workid` DESC";
					$imgstd = mysqli_query($conn, $img);  
       				while($workid = $imgstd -> fetch_assoc()){
						//$imgName = "161110002";
						// while($row2 = mysqli_fetch_array($rs_name)){
							// $_SESSION["studentid_for_index"] = $row2["$studentid"];
						// $img = "SELECT * FROM `work_studentdata` WHERE `workid`={$workid['workid']} ORDER BY `workid` DESC";
						$img = "SELECT `work_studentdata`.`studentid`, `work611001`.`img` 
								FROM `work_studentdata` 
								LEFT JOIN `work611001` 
								ON `work_studentdata`.`studentid`=`work611001`.`studentid` 
								WHERE `work_studentdata`.`workid`={$workid['workid']}";
						$imgstd = mysqli_query($conn, $img);
						while($row = $imgstd -> fetch_assoc()){
							// while($block_no<12){
							$studentid = $row['studentid'];
							$sql = "SELECT * FROM `student` WHERE `studentid`='$studentid'";
							$name = mysqli_query($conn, $sql);
								// session_write_close();
						
				?> 
				<div class="col-md-4 text-center animate-box">
					<!--  link to box-->
					<a class='work' href='index_show_work.php' name='studentid_form_index'>
					<!-- <a class='work' href="showstudent.php?subjectid_form_index=".$row['subjectid']."&workid_form_index=161110004&studentid_form_index=61002" name='studentid_form_index'> -->
						<!-- <?php 
							// $_SESSION['subjectid_form_index'] = $row['subjectid'];
							// $_SESSION['workid_form_index'] = $row['workid'];
							// $_SESSION['studentid_form_index'] = $studentid;
						?>'  -->
					<div class="work-grid" style="background-color: white">
						<div class="desc" align="center" style="color: black;">
							<div class="item">
							<?php 
								echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['img'] ).'"  width="200" height="200" />'; 
							?> 
								<h3 align = 'center' style = " padding-top: 25px;"> 
									<font face="verdana" > 
									<?php 
									while($name_data = $name -> fetch_assoc()){
										echo $name_data['name']." ".$name_data['surname'];
										$_SESSION['studentid_no_1'] = $studentid;
										$count++;
										break;
									}
									?> 
									</font>
								</h3>
								</div>
							</div> 
						</div>
					</a>
				</div>
				<?php
							if($temp_workid == 0 )
							{
								$temp_workid = $workid['workid'];
							} else 
							{
								if($temp_workid == $workid['workid'])
								{
									$block_no++;
								} else {
									$temp_workid = $workid['workid'];
									$block_no = 0;
								}
							}
							if($block_no == 12)
							{
								$block_full = true;
							}
						}
						if($block_full==true){
							break;
						}
					}
					session_write_close();
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
