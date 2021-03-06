<!DOCTYPE HTML>

<?php 

include('is_login.php');

?>

<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Silpakorn</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Free HTML5 Website Template by FreeHTML5.co" />
  <meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive"
  />
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
  <meta property="og:title" content="" />
  <meta property="og:image" content="" />
  <meta property="og:url" content="" />
  <meta property="og:site_name" content="" />
  <meta property="og:description" content="" />
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
  <!-- Specified style-->
  <link rel="stylesheet" href="css/student.css">

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
    .btn {
      border: none;
      background-color: white;
      padding: 14px 28px;
      font-size: 16px;
      cursor: pointer;
      display: inline-block;
      border-radius: 10%;
    }
      /* On mouse-over */
    .btn:hover {background: #eee;}

    .success {color: green;}
    .info {color: red;}
    .warning {color: orange;}
    .danger {color: red;}
    .default {color: black;}
  </style>

   <script>
      function changePortfolioStatus(workid)
    {
      var image =  document.getElementById('portfolio_img_'+workid);
      var xhttp = new XMLHttpRequest();
      if (image.src == "https://i.imgur.com/pDqvmwb.png"){
        $.post('switch_portfolio_status.php', 
          { portfolio_status: '0', portfolio_workid: workid })
          .done(function(data) {
            // alert(data);
            image.src = 'https://i.imgur.com/zpJ2gms.png';
          });
      }
      else{
        $.post('switch_portfolio_status.php', 
          { portfolio_status: '1', portfolio_workid: workid })
          .done(function(data) {
            // alert(data);
            image.src = 'https://i.imgur.com/pDqvmwb.png';
          });
      }
    }
</script>


</head>

<body>
  <div class="fh5co-loader"></div>
  <div id="page">
    <nav class="fh5co-nav" role="navigation">
      <div class="container">
        <div class="fh5co-top-logo">
            <div id="fh5co-logo">
            <a href="index.php">หน้าหลัก</a>
          </div>
        </div>
        <div class="fh5co-top-menu menu-1 text-center">
          <ul>
            <!-- Link Menu Write here (Web)-->
            <li class="has-dropdown">
              <ul class="dropdown">
                <!-- Link Menu Write here (mobile)-->
                <a href="logout.php">ออกจากระบบ</a>
              </ul>
            </li>
          </ul>
        </div>
        <div class="fh5co-top-social menu-1 text-right">
          <div style = " font-size: 20px " > 
          <?php 
            include 'add_student_name.php';
          ?> 
          </div>
            <ul class="fh5co-social">
                <li>
                
                </li>
            </ul>
        </div>
      </div>
    </nav>
    <div style = 'padding-top: 5%; padding-left: 12%;'>
      <a class='btn info' href ="student_portfolio.php?studentid=<?php echo $_SESSION["id"]; ?>">
        แฟ้มสะสมข้อมูลของนักเรียน
      </a>
    </div>
    <div class="contentBox" style='padding-top:0px;'>



     <?php 
      $sql_1 = "SELECT DISTINCT `work_subjectdata`.subjectid 
      FROM `work_studentdata` 
      LEFT JOIN `work_subjectdata` 
      ON `work_studentdata`.workid = `work_subjectdata`.workid 
      WHERE `work_studentdata`.studentid = '{$_SESSION['id']}'
      ORDER BY `work_subjectdata`.subjectid DESC";
      $query_1 = mysqli_query($conn,$sql_1);
      if($query_1->num_rows == 0){
        echo "<div class='col-md-12 text-center intro' style = 'padding-top: 10%;' >
                <h2> ยังไม่มีงานที่ต้องส่ง </h2>
              </div>";
      }else {
        include 'generate_acc_student.php';
        // include 'test_call_php.php';
        // echo "1";
      }
      
    ?> 
    </div>
    
  <footer id="fh5co-footer" role="contentinfo">
  </footer>
  <div class="gototop js-top">
    <a href="#" class="js-gotop">
      <i class="icon-arrow-up"></i>
    </a>
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
