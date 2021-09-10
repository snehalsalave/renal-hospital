<?php
include("../index.php");
if(isset($_REQUEST['id']) && !empty($_REQUEST['id']))
{
    $id=$_REQUEST['id'];
    include("../connect.php");
    $sql="select * from patient where id=$id";
    $res=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($res);
} ?>
<div class="row">
    <div class="col-lg-4" align="left">
        <label style="position:relative; top:7px;">patient Name:</label>
    </div>
    <div class="col-lg-8" align="left">
        <?php echo $row['patientName']; ?>
    </div>
</div>

<div class="row">
    <div class="col-lg-4" align="left">
        <label style="position:relative; top:7px;">patient Mobile</label>
    </div>
    <div class="col-lg-8" align="left">
        <?php echo $row['patientMobile']; ?>
    </div>
</div>

<div class="row">
    <div class="col-lg-4" align="left">
        <label style="position:relative; top:7px;">date of birth</label>
    </div>
    <div class="col-lg-8" align="left">
        <?php echo $row['dob']; ?>
    </div>
</div>

<div class="row">
    <div class="col-lg-4" align="left">
        <label style="position:relative; top:7px;">userId</label>
    </div>
    <div class="col-lg-8" align="left">
        <?php echo $row['userId']; ?>
    </div>
</div>

