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
						<div id="fh5co-logo">
							<a href="teacher.php">Back </a>&nbsp;&nbsp;&nbsp;&nbsp;
							<a href="index.php">Logout</a>
						</div>
					</div>
					<div class="fh5co-top-menu menu-1 text-center">
						<ul>
								<!-- Link Menu Write here (Web)-->
							<li class="has-dropdown">
								
								<ul class="dropdown">
									<!-- Link Menu Write here (mobile)-->
									<a href="index.php">Logout</a>
								</ul>
							</li>
							
						</ul>
					</div>
					<div class="fh5co-top-social menu-1 text-right">
						<div style = " font-size: 20px " > Teacher </div>
							<ul class="fh5co-social">
							
								<li>
									<a style = "padding : 10px 10px ; font-size: 15px " href="logout.php">Logout</a>
								</li>
							</ul>
					</div>
				</div>
			</nav>
			<div class="container">
			<!-- RUN HARDWHERE -->
				<?php 
					echo "<a href='run_hardware.php?subjectid_from_index={$_GET['subjectid_from_index']}&workid_from_index={$_GET['workid_from_index']}&studentid_from_index={$_GET['studentid_from_index']}'>";
				?>
                <!-- <a href="run_hardware.php?subjectid_from_index={$_GET['submit_subjectid']}&workid_from_index={$_GET['submit_workid']}&studentid_from_index={$_GET['submit_studentid']}"> -->
                    <img src="images/ic_camera_black_24dp_2x.png"  alt=""/> 
                    <h3> <font face="verdana" > upload </font></h3>
                </a>
            </div>
		</div>
		<?php
			$subjectid = $_GET['subjectid_from_index'];
			$workid = $_GET['workid_from_index'];
			$studentid = $_GET['studentid_from_index'];
			$imgno = '1';
			$comment = "SELECT * FROM `work_studentdata` WHERE `workid`='$workid' AND `studentid` = '$studentid'";
			$re_comment = mysqli_query($conn, $comment);
			$row_comment = mysqli_fetch_array($re_comment);
			if($row_comment["comment"] == "none comment"){
		?>
		<?php 
                echo "<form action = 'commentToDB.php?subjectid_from_index={$subjectid}&workid_from_index={$workid}&studentid_from_index={$studentid}' method='post' >";
			?>
        <!-- <form action = "commentToDB.php" method="post" >	 -->
			<div class="form-group">
				<label class="control-label col-sm-5" align = 'right'>คำอธิบาย :</label>
				<div class="col-sm-7" align = 'left'>
					<textarea rows="4" cols="50" name = "comment" >  comment here ...</textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-5" align = 'right'>คะแนน :</label>
				<div class="col-sm-7" align = 'left'>
				<!-- <input type="number" name="quantity" min="0" max="100"> -->
				<?php
					$sql = "SELECT `max_score` FROM `work_subjectdata` WHERE `workid`='{$row_comment['max_score']}'";
					$query = mysqli_query($conn, $sql);
					while($maxscore = $query->fetch_assoc()){
						$mscore = $maxscore['max_score'];
						if($mscore<10){
							echo "<input type='text' name='quantity' pattern='[1-$mscore]{1}'><p>คะแนนเต็ม: $mscore</p>";
						} else {
							$two = $mscore/10;
							$one = $mscore%10;
							if($two<2){
								echo "<input type='text' name='quantity' pattern='[1]{1}[0-$one]{1}'><p>คะแนนเต็ม: $mscore</p>";
							} else {
								echo "<input type='text' name='quantity' pattern='[1-$two]{1}[0-$one]{1}'><p>คะแนนเต็ม: $mscore</p>";
							}
						}
					}
				?>
				
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-5" align = 'right'></label>
				<div class="col-sm-7" align = 'left'>
					<div  align = "5px" ><br><button type="submit">ยืนยัน</button> </div>
				</div>
			</div>
		</form>
			<?php }
			else{
				echo "<form action = 'commentToDB.php?subjectid_from_index=$subjectid&workid_from_index=$workid&studentid_from_index=$studentid' method='post' >";
			?>
		<!-- <form action = "commentToDB.php?subjectid=$subjectid" method="post" > -->
			<div class="form-group">
				<label class="control-label col-sm-5" align = 'right'>comment :</label>
				<div class="col-sm-7" align = 'left'>
					<textarea rows="4" cols="50" name = "comment" ><?php echo $row_comment["comment"]; ?></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-5" align = 'right'>Point :</label>
				<div class="col-sm-7" align = 'left'>
					<input type="number" name="quantity" min="0" max="100" value="<?php echo $row_comment["score"]; ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-5" align = 'right'></label>
				<div class="col-sm-7" align = 'left'>
					<div align = "5px" ><br><button type="submit">submit</button> </div>
				</div>
			</div>
		</form>
			<?php } ?>
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