<!DOCTYPE HTML>
<?php
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
<<<<<<< HEAD
=======

>>>>>>> ab3820c1c0a4276ed081054274d0e0fd64f8a770
	FREE HTML5 TEMPLATE 
	DESIGNED & DEVELOPED by FreeHTML5.co
		
	Website: 		http://freehtml5.co/
	Email: 			info@freehtml5.co
	Twitter: 		http://twitter.com/fh5co
	Facebook: 		https://www.facebook.com/fh5co
<<<<<<< HEAD
=======

>>>>>>> ab3820c1c0a4276ed081054274d0e0fd64f8a770
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

	</head>
	<body>
		
	<div class="fh5co-loader"></div>
	
	<div id="page">
	<nav class="fh5co-nav" role="navigation">
		<div class="container">
			<div class="fh5co-top-logo">
            
            <div id="fh5co-logo">

            <div id="fh5co-logo">
                <a href="student.php">Back</a>
            </div>
            
            </div>
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
		

	
	<div id="fh5co-work">
		<div class="container">
			<div class="row top-line animate-box">
				<div class="col-md-12 text-center intro">
				<?php 
					
                    $sqlWork = "SELECT `workid` FROM `work_studentdata` WHERE `studentid`='{$_GET['studentid']}' AND `portfolio` = 1";
					$query_work = mysqli_query($conn,$sqlWork); 
					$name = $query_work->fetch_array();
					while($workid = $query_work -> fetch_assoc()){

                        $sql2 = "SELECT DISTINCT `work_studentdata`.`studentid`, `work{$workid['workid']}`.`imgno`, `work{$workid['workid']}`.`img`
                        FROM `work_studentdata` 
                        LEFT JOIN `work{$workid['workid']}` 
                        ON `work_studentdata`.`studentid`=`work{$workid['workid']}`.`studentid` 
                        WHERE `work_studentdata`.`workid`='{$workid['workid']}'
                        AND `work{$workid['workid']}`.`imgno`='0'";
                        $query2 = mysqli_query($conn, $sql2);
                                while($studentid_img = $query2 -> fetch_assoc()){
                                    $studentid = $studentid_img['studentid'];
                                    $sql3 = "SELECT * FROM `student` WHERE `studentid`='$studentid'";
                                    $name = mysqli_query($conn, $sql3);
                                    echo "<div class='col-md-4 text-center animate-box'>";
                                     echo "<a  href='portfolio_show_work.php'>";
                                    echo "<div class='work-grid' style='background-color: white'>";
                                    echo "<div class='desc' align='center' style='color: black;'>";
                                    echo "<div class='item'>";
                                    echo '<img src="data:image/jpeg;base64,'.base64_encode( $studentid_img['img'] ).'"  width="200" height="200" />'; 
                                    echo "<p align = 'center'>";
                                    echo "<font face='verdana' >";
                                $sql_subject = "SELECT * FROM `work_subjectdata` WHERE workid = {$workid['workid']}";
                                    $query_sub =  mysqli_query($conn,$sql_subject);
                                            while($name_data = $query_sub  -> fetch_assoc()){
                                                echo "ชิ้นงาน {$name_data['workname']} ";

                                                 $_SESSION['index_portfolio_stdid'] = $stdid ;
                                                 $_SESSION['index_portfolio_subjectid'] = $name_data['subjectid'];
                                                 $_SESSION['index_portfolio_workid'] = $workid['workid'] ;
                                                
                                            }	
                                            echo"</font>
                                                </p>
                                                </div>
                                                </div> 
                                                </div>
                                                </a>
                                                </div>";		


                                    }
                                }
            ?>

        

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
