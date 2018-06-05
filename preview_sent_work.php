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
					<div class="fh5co-top-logo">
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
									<a href="index.php">ออกจากระบบ</a>
								</ul>
							</li>
							
						</ul>
					</div>
					<div class="fh5co-top-social menu-1 text-right">
							<?php include("teacher_login.php"); ?>
					

						
					</div>
				</div>
			</nav>
			<div id="fh5co-work">
			<div class="container">
				<div class="row top-line animate-box">
							<div class="col-md-12 text-center intro"> 
							
										<div  align = "center">
										
											<?php 
											$subjectid = $_GET['subjectid_edit_work'];
											$workid = $_GET['workid_edit_work'];
											$studentid = $_GET['studentid_edit_work'];
											$src = "images/img_data/$subjectid/$workid/$studentid/001.jpg";
											$src1 = "images/img_data/$subjectid/$workid/$studentid/###.jpg";
											echo "
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
																		
										</div>
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
		<!-- comment box -->
<!-- <footer id="fh5co-footer" role="contentinfo">
</footer> -->
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