<!DOCTYPE HTML>
<?php 
		session_start();
		include("config.php");
		ini_set('max_execution_time', 300);
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
    <!-- Specified style-->
    <link rel="stylesheet" href="css/teacher.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!--  Object  -->
	<script src='http://code.jquery.com/jquery-1.9.1.min.js' type='text/javascript'></script>
	<script src='jquery.reel.js' type='text/javascript'></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
 	<!-- import excel -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
	<!-- End -->

	</head>
	<body>
		
	<div class="fh5co-loader"></div>
	
	<div id="page">
	<nav class="fh5co-nav" role="navigation">
	
		<div class="container" >
			
			<div class="fh5co-top-logo">
			 
            <p>   
             </p>
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
				<ul class="fh5co-social" >
					<?php include('index_is_login.php');?>
				</ul>
			</div>
		</div>
	</nav>
 
	

        <div class="contentBox">
            <!-- ปุ่มแอด รายชื่อ --> 
			<!-- End -->
			 
    <div class="container" style="height: 87%; position: fixed; width: 100%;">
    	<div clas="row" style="height: 100%;">
    	   	<div class="col-xs-6" style="border-right: 4px solid grey; height: 100%; overflow: scroll;">
               
	    	<div class="col-xs-6" style="height: 100%;">
                <center>
                <form action="#"" method="post" enctype="multipart/form-data">
						Select Excel (.xlsx) file to upload: 
                    <input type="file" name="fileToUpload" id="fileToUpload">
                    <input type="submit" value="Upload File" name="submit">
                </form>
                </center>
                <span>
                    <?php
                    if(isset($_POST['submit'])):
                        $target_dir = "Examples/";
                        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                        $uploadOk = 1;
                        $FileType = pathinfo($target_file,PATHINFO_EXTENSION);
                        // Allow certain file formats
                        if(!($FileType == "xlsx" || $FileType =="xls")) {
                            echo "Sorry, only xlsx files are allowed.";
                            $uploadOk = 0;
                        }
                        // Check if $uploadOk is set to 0 by an error
                        if ($uploadOk == 0) {
                            echo "Sorry, your file was not uploaded.";
                        // if everything is ok, try to upload file
                        } else {
                            echo $target_file;
                            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],"Examples/file.xlsx")) {
                                echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                            } else {
                                echo "Sorry, there was an error uploading your file.";
                            }
                        }
                    ?>
                </span>
                <br><br><br>
	    		<center><button type="button" class="btn btn-lg btn-primary" id="import">Import Excel to DB</button></center>
                <?php 
                    endif;
                ?>
                <span id="import_result"></span>
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
