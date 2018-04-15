<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script src='http://code.jquery.com/jquery-1.9.1.min.js' type='text/javascript'></script>
<script src='jquery.reel.js' type='text/javascript'></script>

<style>
body, h1,h2,h3,h4,h5,h6 {font-family: "Montserrat", sans-serif}
.w3-row-padding img {margin-bottom: 12px}
/* Set the width of the sidebar to 120px */
.w3-sidebar {width: 120px;background: #222;}
/* Add a left margin to the "page content" that matchesthe width of the sidebar (120px) */
#main {margin-left: 120px}
/* Remove margins from "page content" on small screens */
@media only screen and (max-width: 600px) {#main {margin-left: 0}}


.circle{ /* ชื่อคลาสต้องตรงกับ <img class="circle"... */
    height: 20;  /* ความสูงปรับให้เป็นออโต้ */
    width: 20;  /* ความสูงปรับให้เป็นออโต้ */
    border: 3px solid #fff; /* เส้นขอบขนาด 3px solid: เส้น #fff:โค้ดสีขาว */
    border-radius: 50%; /* ปรับเป็น 50% คือความโค้งของเส้นขอบ*/
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.2); /* เงาของรูป */
    size: 15;
}

</style>

<body class="w3-black">


<!-- Icon Bar (Sidebar - hidden on small screens) -->


<nav class="w3-sidebar w3-bar-block w3-small w3-hide-small w3-center">
  <!-- Avatar image in top left corner -->

  <img class = "circle" src="images/images.png" width="120" height="120"/>
  <a href="listroom.php" class="w3-bar-item w3-button w3-padding-large w3-black">
    <i class="fa fa-home w3-xxlarge"></i>
    <p>ชั้นเรียน</p>
  </a>
 
</nav>

<!-- Navbar on small screens (Hidden on medium and large screens) -->
<div class="w3-top w3-hide-large w3-hide-medium" id="myNavbar">
  <div class="w3-bar w3-black w3-opacity w3-hover-opacity-off w3-center w3-small">
    <a href="listroom.php" class="w3-bar-item w3-button" style="width:25% !important">ชั้นเรียน</a>
    
  </div>
</div>

<!-- Page Content -->
<div class="w3-padding-large" id="main"></div>
            <!-- Header/Home -->
   <header  class="w3-container w3-padding-32 w3-center w3-black" id="home"> 
        <h1 class="w3-jumbo"><span class="w3-hide-small">Hi  </span>Teacher.</h1>            
   </header>

            <!-- About Section -->
            <div class="w3-content w3-justify w3-text-grey w3-padding-64" id="about"> 
              
                <div>
                  <center>
                      <div><?php include 'Object.html'; ?></div>
                      <div align="left "><h2 style="color: white;">Comment</h2></div>
                      <div><?php include 'Comment.html'; ?></div>
                  </center>
                </div>

            </div>


              <!-- Footer -->
            <footer class="w3-content w3-padding-64 w3-text-grey w3-xlarge">
              
            <!-- End footer -->
            </footer>

      
      
<script> $.reel.def.indicator = 5; </script>
</body>
</html>