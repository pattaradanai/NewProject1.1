<!DOCTYPE HTML>

<?php
include('config.php');
 
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
	<script>
		function move(workid, studentid, subjectid) {
			var disconnect = 0;
			var run_hardware_img = document.getElementById("run_hardware_img");
			run_hardware_img.src = 'https://media.giphy.com/media/9i3Ax6g0DLlzW/giphy.gif';
			run_hardware_img.style.width = '80px';
			var progress_text = document.getElementById("progress_text");
			var percent_text = document.getElementById("percent_text");
			var progress_bar = document.getElementById("bar");
			var width = 3.125;
			var i = 1;
			var run_count = 0;
			// $run_hardware_img.style.margin-left = '15px';
			progress_text.innerHTML = 'กำลังถ่ายภาพ กรุณารอสักครู่';
			while(i<33){
				var xhttp = new XMLHttpRequest();
				xhttp.open("GET", "run_hardware.php?workid_sent_work="+workid+"&studentid_sent_work="+studentid+"&subjectid_sent_work="+subjectid+"&i="+i, true);
				xhttp.onreadystatechange = function() {
					if(this.readyState == 4 && this.status == 200){
						if(this.responseText == 'false'){
							document.getElementById("ping_status").style.color = 'rgb(206, 69, 69)';
							progress_text.innerHTML = "ขาดการเชื่อมต่อกับอุปกรณ์ระหว่างการทำงาน กรุณาลองใหม่อีกครั้ง";
						}else{
							run_count++;
							percent_text.innerHTML = width +'%';
							progress_bar.style.width = width+'%';
							width = width + 3.125;
						}
						if(run_count==32){
							run_hardware_img.src = 'https://cdn2.iconfinder.com/data/icons/pointed-edge-web-navigation/130/tick-green-512.png'; 
							progress_text.innerHTML = 'ถ่ายภาพเสร็จแล้ว';
						}
					}
				};
				xhttp.send();
				i++;
			}
		}
	</script>
	<script>
		function ping_hw() {
			$ping_icon = document.getElementById("ping_icon");
			$ping_icon.src = 'https://media.giphy.com/media/9i3Ax6g0DLlzW/giphy.gif';
			// $ping_icon.style.width = '80px';
			document.getElementById("ping_status").innerHTML = "กำลังตรวจสอบการเชื่อมต่อกับอุปกรณ์";
			var xhttp;
			xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					if(this.responseText == 0){
						$ping_icon.src = 'https://png.icons8.com/metro/1600/connected.png';
						document.getElementById("ping_status").innerHTML = "เชื่อมต่อกับอุปกรณ์สำเร็จ";
						document.getElementById("ping_status").style.color = 'rgb(69, 206, 69)';
					} else {
						$ping_icon.src = 'https://png.icons8.com/metro/1600/disconnected.png';
						document.getElementById("ping_status").innerHTML = "ขาดการเชื่อมต่อกับอุปกรณ์";
						document.getElementById("ping_status").style.color = 'rgb(206, 69, 69)';
					}
				}
			};
			xhttp.open("GET", "ping_hardware.php", true);
			xhttp.send();
		}
	</script>
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
	#progress_bar {
		width: 30%;
		background-color: rgba(226, 225, 225, 0.623);
	}
	#bar {
		width: 0%;
		height: 30px;
		background-color: green;
	}
	</style>
	
	</head>
	<body>
	<div class="fh5co-loader"></div>
		<div id="page">
			<nav class="fh5co-nav" role="navigation">
				<div class="container">
					<div class="fh5co-top-logo" >
						<div id="fh5co-logo">
							<a href="teacher.php">ย้อนกลับ </a>&nbsp;&nbsp;&nbsp;&nbsp;
							
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
							<?php include("teacher_login.php"); ?>

					
					</div>
				</div>
			</nav>
			<div class="container" style='margin-top:50px; margin-left:40%;'>
				<?php
					$subjectid = $_GET['subjectid_add_work'];
					$workid = $_GET['workid_add_work'];
					$studentid = $_GET['studentid_add_work'];
					$sql = "SELECT * FROM `student` WHERE `studentid`='$studentid'";
					$query = mysqli_query($conn, $sql);
					while($student = $query->fetch_assoc()){
						if($student['sex']==0){
							echo "<p style='padding:0px;margin:0px;'>ผลงานของนาย  {$student['name']} {$student['surname']}</p>";
						}else{
							echo "<p style='padding:0px;margin:0px;'>ผลงานของนางสาว {$student['name']} {$student['surname']}</p>";
						}
					}
				?>
			</div>
			<div class="container" style='margin-top:50px; margin-left:40%;'>
			<!-- RUN HARDWHERE -->
				<div style='margin-left:6.667%;'>
				<?php 
					// echo "<a onclick='move()' href='run_hardware.php?subjectid_from_index={$_GET['subjectid_from_index']}&workid_from_index={$_GET['workid_from_index']}&studentid_from_index={$_GET['studentid_from_index']}'>";
					echo "<a onclick='move({$_GET['workid_add_work']}, {$_GET['studentid_add_work']}, {$_GET['subjectid_add_work']})' style='cursor:pointer;'>";
				?>
                    <img id='run_hardware_img' src="images/ic_camera_black_24dp_2x.png" style='width:24dp;padding-left:50px' alt=""/> 
                    <h4> <font face="verdana" id='progress_text'> คลิ้กเพื่อถ่ายภาพผลงาน </font></h4>
                </a>
				</div>
				<div id="progress_bar">
					<div id="bar"></div>
				</div>
				<p id='percent_text' style='margin:0px; padding:0px;'>0%</p>
				<div style='display:-webkit-box; margin-left:1.6667%;'>
				<?php 
					$ip = '192.168.149.106';
					exec("ping -n 1 $ip", $output, $status);
					if($status==0){
						echo "<img id='ping_icon' style='width:30px;' src='https://png.icons8.com/metro/1600/connected.png'/><p id='ping_status' style='margin:10px 0px 0px 10px; color:rgb(69, 206, 69);'>เชื่อมต่อกับอุปกรณ์สำเร็จ</p>";
					} else {
						echo "<img id='ping_icon' style='width:30px;' src='https://png.icons8.com/metro/1600/disconnected.png'/><p id='ping_status' style='margin:10px 0px 0px 10px; color:rgb(206, 69, 69)'>ขาดการเชื่อมต่อกับอุปกรณ์</p>";
					}
				?>
				</div>
				<button onclick='ping_hw()' style='margin-top:3px; color:black; margin-left:1%;'>ตรวจสอบการเชื่อมต่อกับอุปกรณ์</button>
            </div>
		</div>
		<?php
			$imgno = '1';
			$comment = "SELECT * FROM `work_studentdata` WHERE `workid`='$workid' AND `studentid` = '$studentid'";
			// echo $comment;
			$re_comment = mysqli_query($conn, $comment);
			$row_comment = mysqli_fetch_assoc($re_comment);
			// echo var_dump($row_comment);
			// if($row_comment["comment"] == "none comment"){
			// if($row_comment == NULL){
			# กรณีที่ยังไม่มีข้อมูล
		?>

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
	<script $.reel.def.indicator = 5;> </script>

	</body>
</html>