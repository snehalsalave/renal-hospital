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
if(isset($_REQUEST['id']) && !empty($_REQUEST['id']))
{
    $id=$_REQUEST['id'];
    include("../connect.php");
    $sql="select * from branch where id=$id";
    $res=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($res);
} ?>
<div class="row">
    <div class="col-lg-4" align="left">
        <label style="position:relative; top:7px;">Branch Name:</label>
    </div>
    <div class="col-lg-8" align="left">
        <?php echo $row['branchName']; ?>
    </div>
</div>

<div class="row">
    <div class="col-lg-4" align="left">
        <label style="position:relative; top:7px;">Amount Per Patient</label>
    </div>
    <div class="col-lg-8" align="left">
        <?php echo $row['amountPerPatient']; ?>
    </div>
</div>

<div class="row">
    <div class="col-lg-4" align="left">
        <label style="position:relative; top:7px;">Branch Location:</label>
    </div>
    <div class="col-lg-8" align="left">
        <?php echo $row['branchLocation']; ?>
    </div>
</div>
</div>
</body>

</html>

