<?php session_start() ?>

<!DOCTYPE HTML>



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
  <link rel="stylesheet" href="css/teacher_editer.css">

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
          <div id="fh5co-logo">
            <a href="Login.html">Login</a>
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
          <ul class="fh5co-social">
            <li>
              <a href="https://github.com/pattaradanai/NewProject1.1">
                <i class="icon-github"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="contentBox">
      <?php 
      // include 'add_teacher_name.php' 
      ?>
      <div style="margin-bottom: 5px;">
      <div style="margin-bottom: 5px;">
      <form class="accform" action="acc_add_subject.php" method="POST">
        <div style='margin-bottom:5px;'>
          <label for="subname">วิชา: </label>
          <input class="subinput" type="text" name="subname" placeholder="Subject name" style='margin-left:5px;' required>  
        </div>
        <div style='margin-bottom:5px;'>
          <label for="year">ปีการศึกษา: </label>
          <input class="subinput" type="text" name="year" placeholder="Year" style='margin-left:5px;' required>  
        </div>
        <div style='margin-bottom:5px;'>
        <label for="term">เทอมที่: </label>
          <select name="term" style='margin-left:5px;'>
            <option value="1">1</option>
            <option value="2">2</option>
          </select>
        </div>
        <div style='margin-bottom:5px;'>
          <label for="section">หมวดวิชา: </label>
          <select name="section" style='margin-left:5px;'>
            <option value="1">1:</option>
            <option value="2">2:</option>
            <option value="2">3:</option>
            <option value="2">4:</option>
            <option value="2">5:</option>
            <option value="2">6:</option>
          </select>  
        </div>
        <div style='margin-bottom:5px;'>
          <label for="year1-6">นักเรียนช่วงชั้นที่สอน: </label>
          <select name="year1-6" style='margin-left:5px;'>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="2">3</option>
            <option value="2">4</option>
            <option value="2">5</option>
            <option value="2">6</option>
          </select>  
        </div>
        <div class="createacc">
          <button type"submit">
            เพิ่มวิชา
          </button>
        </div>
      </form>
      </div>
      </div>
      <div class='tablv1'>
        <input class='input_tablv1' id='tabno-lv1' type='checkbox' name='panel' />
        <label class='label-tablv1' for='tabno-lv1'>asd</label>
        <div class='edit_box'>
          <form class="work_form" action="" method="POST">
            <div class='form_table'>
              <table>
              <tbody>
                <tr>
                  <th>ชื่องาน</th>
                  <th>คะแนนเต็ม</th>
                </tr>
                <?php 
                  echo "
                  <tr>
                    <td>
                      <div>
                        <p>Subject name</p>
                      </div>
                    </td>
                    <td>
                      <div>
                        <p>my score</P>  
                      </div>
                    </td>
                  </tr>";
                ?>
                <tr>
                  <td>
                    <div>
                      <input type="text" name="subject_name" placeholder="ชื่องาน" required>  
                    </div>
                  </td>
                  <td>
                    <div>
                      <input type="text" name="score" placeholder="คะแนนเต็ม" required>  
                    </div>
                  </td>
                </tr>
              </tbody>
              </table>
            </div>
          <div class="createacc">
            <button type"submit">
              เพิ่มงาน
            </button>
          </div>
          </from>
        </div>
        <div class='edit_box'>
          <form class="work_form" action="" method="POST">
            <div class='form_table'>
              <ul style='padding-left: 1em; list-style-type: none;'>
              <li>
                <?php 
                  echo "
                  <div>
                    <p>ห้อง 1/1</p>
                  </div>";
                ?>
                <div>
                  <input type="text" name="subject_name" placeholder="ห้อง" required>  
                </div>
              </li>
              <div>
                <input type="text" name="subject_name" placeholder="ห้อง" required>  
              </div>
              </ul>
            </div>
          <div class="createacc" style='margin-left:1em;'>
            <button type"submit" style='color: black;'>
              เพิ่มห้อง
            </button>
          </div>
          </from>
        </div>
      </div>
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