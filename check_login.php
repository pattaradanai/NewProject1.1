<?php
	session_start();
	include("config.php");
	
	$sql = "SELECT * FROM user WHERE username = '".$_POST['uname']."' ";
	$query = mysqli_query($conn,$sql);
	$objResult = mysqli_fetch_array($query);
	if(!$objResult)
	{
		echo '<script type="text/javascript">'; 
		echo 'alert("ไม่พบ Email นี้ในระบบ");';
		echo 'window.location.href = "Login.html"';
		echo '</script>';
		exit(); 
	}
	else
	{	
		if($objResult["password"] != $_POST["psw"])
		{
			echo '<script type="text/javascript">'; 
			echo 'alert("Password ไม่ถูกต้อง")';
			echo 'window.location.href = "Login.html"';
			echo '</script>';
			exit(); 
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