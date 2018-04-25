<?

require("../config.php");


$Subject_ID = $_GET["Subject_ID"];
//$Subject_Name = $_SESSION["Subject_Name"];

$sql = "SELECT * FROM subject WHERE Subject_ID = '$Subject_ID'";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
?>
<?php include 'extend/tab.php';?>
<?php include 'extend/menu.html';?>


<div id="page-wrapper">
    <div class="row">
    <div class="col-lg-12">
    <div class="page-header">
        <!-- /.row -->
        <div class="row">
        <div class="col-lg-12 col-md-6">
        <div class="panel panel-primary">
        <div class="panel-heading">
            <a href="" style="color: white;">แก้ไขประเภทรายวิชา</a>
        </div>
        </div>
        </div>
            <!-- /.row -->
        <div class="row">
        <div class="col-lg-12">
        <div class="panel panel-default">
        <div class="panel-heading">
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="container">
                <form class="form-horizontal" action="save_update_subject.php" method="post" name="update_subject" id="update_subject"> 
                <div class="form-group">
                    <label class="control-label col-sm-2">ชื่อประเภทรายวิชา :</label>
                    <div class="col-sm-5">
                    <input type="text" class="form-control" id="Subject_Name" placeholder="ชื่อประเภทรายวิชา" name="Subject_Name" value="<?php echo $_GET['Subject_ID'];?>">
                    <input type="hidden" name="Subject_ID" value="<?php echo $_GET['Subject_ID'];?>">
                    </div>
                </div>
                <div class="form-group">        
                    <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success" name="update" id="update" value="update">บันทึก</button>
                    <a href="manage_subject.php" class="btn btn-danger">ยกเลิก</a>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <!-- /.panel-body -->
    </div>

    </div>
    <!-- /.row -->
    </div>
    </div>
    </div>
<!-- /.col-lg-12 -->
</div>