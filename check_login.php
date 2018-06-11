<!-- <!DOCTYPE html>
<html lang="en">
<head>
<!- Popup Alert -->

<!-- Latest compiled and minified CSS -->
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->

<!-- jQuery library -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->

<!-- Latest compiled JavaScript -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->


<!-- </head> --> 
<?php

	session_start();
	include("config.php");
	
	$sql = "SELECT * FROM user WHERE username = '".$_POST['uname']."' ";
	$query = mysqli_query($conn,$sql);
	$objResult = mysqli_fetch_array($query);
	if(!$objResult)
	{
		echo '<script type="text/javascript">'; 
		echo 'alert("ไม่พบ username นี้ในระบบ");';
		echo 'window.location.href = "Login.php"';
		echo '</script>';
		exit(); 
	}
	else
	{	
		if($objResult["password"] != $_POST["psw"])
		{
			echo '<script type="text/javascript">'; 
			echo 'alert("ไม่พบ password นี้ในระบบ");';
			echo 'window.location.href = "Login.php"';
			echo '</script>';
			// echo "
			// <div id='myModal' class='modal fade' role='dialog'>
			// <div class='modal-dialog'>

				
			// 	<div class='modal-content'>
			// 	<div class='modal-header'>
			// 		<button type='button' class='close' data-dismiss='modal'>&times;</button>
			// 		<h4 class='modal-title'>Modal Header</h4>
			// 	</div>
			// 	<div class='modal-body'>
			// 		<p>Some text in the modal.</p>
			// 	</div>
			// 	<div class='modal-footer'>
			// 		<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
			// 	</div>
			// 	</div>

			// </div>
			
			// ";
			
			
		  
			
			// exit(); 
		}
		else
		{
			$_SESSION["status"] = $objResult["status"];
			$_SESSION["username"] = $objResult["username"];
			$_SESSION["password"] = $objResult["password"];
			if($_SESSION["status"] == "0")
			{
				$_SESSION["id"] = $objResult["id"];
				header("Location:teacher.php");
			}
			else if ($_SESSION["status"] == "1")
			{
				$_SESSION["id"] = $objResult["id"];
				header("Location:student.php");
			}
		}
	}
	session_write_close();
	mysqli_close($conn);
	
?>
<!-- </body>
</html> -->