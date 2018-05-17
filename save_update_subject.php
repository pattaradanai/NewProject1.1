<meta charset="UTF-8">

<?php
//1. เชื่อมต่อ database: 
include('../config.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
mysqli_set_charset($conn, "utf8"); 
//สร้างตัวแปรสำหรับรับค่าที่นำมาแก้ไขจากฟอร์ม
$Subject_Name = $_POST["Subject_Name"];
$Subject_ID = $_POST["Subject_ID"];
 
//ทำการปรับปรุงข้อมูลที่จะแก้ไขลงใน database 
	
$sql = "UPDATE subject SET  
		Subject_Name='$Subject_Name' 
		WHERE Subject_Name='$Subject_ID'";
 
$result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());
echo '<script type="text/javascript">'; 
//echo 'alert("ระบบได้ทำการบันทึกการเปลี่ยนแปลงเรียบร้อยแล้ว");'; 
echo 'window.location.href = "manage_subject.php";';
echo '</script>';
mysqli_close($conn);
//mysqli_close($conn); //ปิดการเชื่อมต่อ database 
?>