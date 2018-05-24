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
			$run_hardware_img = document.getElementById("run_hardware_img");
			$run_hardware_img.src = 'https://media.giphy.com/media/9i3Ax6g0DLlzW/giphy.gif';
			$run_hardware_img.style.width = '80px';
			// $run_hardware_img.style.margin-left = '15px';
			document.getElementById("process_text").innerHTML = 'กำลังถ่ายภาพ กรุณารอสักครู่';
			var xhttp;
			xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					$run_hardware_img.src = 'https://cdn2.iconfinder.com/data/icons/pointed-edge-web-navigation/130/tick-green-512.png'; 
					document.getElementById("process_text").innerHTML = 'ถ่ายภาพเสร็จแล้ว';
				}
			};
			// xhttp.open("GET", "test_2nd_process.php", true);
			xhttp.open("GET", "run_hardware.php?workid_sent_work="+workid+"&studentid_sent_work="+studentid+"&subjectid_sent_work="+subjectid, true);
			xhttp.send();
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
					} else {
						$ping_icon.src = 'https://png.icons8.com/metro/1600/disconnected.png';
						document.getElementById("ping_status").innerHTML = "ขาดการเชื่อมต่อกับอุปกรณ์";
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
			float:left;
			width: 100%;
			min-height: 35px;
			outline: none;
			resize: none;
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
							<a href="teacher.php">Back </a>&nbsp;&nbsp;&nbsp;&nbsp;
							
						</div>
					</div>
					<div class="fh5co-top-menu menu-1 text-center">
						<ul>
								<!-- Link Menu Write here (Web)-->
							<li class="has-dropdown">
								
								<ul class="dropdown">
									<a href="logout.php">Logout</a>
									<!-- Link Menu Write here (mobile)-->
								</ul>
							</li>
							
						</ul>
					</div>
					<div class="fh5co-top-social menu-1 text-right">
							<?php include("teacher_login.php"); ?>

						<ul class="fh5co-social">
							
							<li> <a style = "padding : 10px 10px ; font-size: 15px " href="logout.php">Logout</a></li>
						</ul>
					</div>
				</div>
			</nav>
			<div class="container" style='margin-top:50px; margin-left:41.6667%; padding-top: 2%'>
			<!-- RUN HARDWHERE -->
			<div style='margin-left:5%;'>
				<?php 
					// echo "<a onclick='move()' href='run_hardware.php?subjectid_from_index={$_GET['subjectid_from_index']}&workid_from_index={$_GET['workid_from_index']}&studentid_from_index={$_GET['studentid_from_index']}'>";
					echo "<a onclick='move({$_GET['workid_add_work']}, {$_GET['studentid_add_work']}, {$_GET['subjectid_add_work']})' style='cursor:pointer;'>";
				?>
                    <img id='run_hardware_img' src="images/ic_camera_black_24dp_2x.png" style='width:24dp;padding-left:50px' alt=""/> 
                    <h4> <font face="verdana" id='process_text'> คลิ้กเพื่อถ่ายภาพผลงาน </font></h4>
                </a>
				</div>
				<div style='display:-webkit-box;'>
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
				<button onclick='ping_hw()' style='margin-top:3px; color:black;'>ตรวจสอบการเชื่อมต่อกับอุปกรณ์</button>
            </div>
		</div>
		<?php
			$subjectid = $_GET['subjectid_add_work'];
			$workid = $_GET['workid_add_work'];
			$studentid = $_GET['studentid_add_work'];
			$imgno = '1';
			$comment = "SELECT * FROM `work_studentdata` WHERE `workid`='$workid' AND `studentid` = '$studentid'";
			// echo $comment;
			$re_comment = mysqli_query($conn, $comment);
			$row_comment = mysqli_fetch_assoc($re_comment);
			// echo var_dump($row_comment);
			// if($row_comment["comment"] == "none comment"){
			if($row_comment == NULL){
			# กรณีที่ยังไม่มีข้อมูล
		?>
		<?php 
                echo "<form action = 'commentToDB.php?subjectid_to_db={$subjectid}&workid_to_db={$workid}&studentid_to_db={$studentid}' method='post' >";
			?>
			<div class="form-group">
				<label class="control-label col-sm-5" align = 'right'>คำอธิบาย :</label>
				<div class="col-sm-7" align = 'left'>
					<textarea rows="4" cols="50" name = "comment" placeholder="พิมพ์คำอธิบายที่นี้ ..." required> </textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-5" align = 'right'>คะแนน :</label>
				<div class="col-sm-7" align = 'left'>
				<!-- <input type="number" name="quantity" min="0" max="100"> -->
				<?php
					$sql = "SELECT `max_score` FROM `work_subjectdata` WHERE `workid`='$workid'";
					$query = mysqli_query($conn, $sql);
					while($maxscore = $query->fetch_assoc()){
						echo "<input type='number' name='quantity' min='0' max='{$maxscore['max_score']}' required><p style='margin-bottom:0px;'>คะแนนเต็ม: {$maxscore['max_score']} คะแนน</p>";
						break;
					}
				?>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-5" align = 'right'></label>
				<div class="col-sm-7" align = 'left'>
				<div  align = "5px" ><br><button type="submit">ยืนยัน</button><a href='teacher.php' style='margin-left:10px; color:rgb(206, 69, 69); cursor:pointer;'>ยกเลิก</a></div>
				</div>
			</div>
		</form>
			<?php }
			else{
				# กรณีที่มีข้อมูลแล้ว
				while($data = $re_comment->fetch_assoc()){
				echo "<form action = 'commentToDB.php?subjectid_from_index=$subjectid&workid_from_index=$workid&studentid_from_index=$studentid' method='post' >";
			?>
		<!-- <form action = "commentToDB.php?subjectid=$subjectid" method="post" > -->
			<div class="form-group">
				<label class="control-label col-sm-5" align = 'right'>comment :</label>
				<div class="col-sm-7" align = 'left'>
					<textarea rows="4" cols="50" name = "comment" ><?php echo $data["comment"]; ?></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-5" align = 'right'>Point :</label>
				<div class="col-sm-7" align = 'left'>
					<!-- <input type="number" name="quantity" min="0" max="100" value="<?php echo $row_comment["score"]; ?>"> -->
					<?php
					$sql = "SELECT `max_score` FROM `work_subjectdata` WHERE `workid`='{$data['max_score']}'";
					$query = mysqli_query($conn, $sql);
					while($maxscore = $query->fetch_assoc()){
						echo "<input type='number' name='quantity' min='0' max='{$maxscore['max_score']}' required><p style='margin-bottom:0px;'>คะแนนเต็ม: {$maxscore['max_score']} คะแนนss</p>";
						break;
					}
				?>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-5" align = 'right'></label>
				<div class="col-sm-7" align = 'left'>
					<div align = "5px" ><button type="submit">ยืนยัน</button><button style='margin-left:10px;'>ยกเลิก</button> </div>
				</div>
			</div>
		</form>
			<?php }} ?>
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
	<script $.reel.def.indicator = 5;> </script>

	</body>
</html>