<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title> Renal | ADMIN</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<body>
    <div class="container">
        <?php include('../view/header.php'); ?>
<?php
// include("../index.php");
if (isset($_REQUEST['id']) && !empty($_REQUEST['id'])) {
    $id=$_REQUEST['id'];
    include("../connect.php");
    $sql="select * from user where id=$id";
    $res=mysqli_query($con, $sql);
    $row=mysqli_fetch_assoc($res);
} ?>
<div class="row">
    <div class="col-lg-4" align="left">
        <label style="position:relative; top:7px;">User Name:</label>
    </div>
    <div class="col-lg-8" align="left">
        <?php echo $row['userName']; ?>
    </div>
</div>

<div class="row">
    <div class="col-lg-4" align="left">
        <label style="position:relative; top:7px;">User Email:</label>
    </div>
    <div class="col-lg-8" align="left">
        <?php echo $row['userEmail']; ?>
    </div>
</div>

<div class="row">
    <div class="col-lg-4" align="left">
        <label style="position:relative; top:7px;">User Mobile:</label>
    </div>
    <div class="col-lg-8" align="left">
        <?php echo $row['mobileNumber']; ?>
    </div>
</div>

<div class="row">
    <div class="col-lg-4" align="left">
        <label style="position:relative; top:7px;">User Branch:</label>
    </div>
    <div class="col-lg-8" align="left">
        <?php echo $row['branchId']; ?>
    </div>
</div>

<div class="row">
    <div class="col-lg-4" align="left">
        <label style="position:relative; top:7px;">User Type:</label>
    </div>
    <div class="col-lg-8" align="left">
        <?php echo $row['userType']; ?>
    </div>
</div>
</div>
</body>

</html>