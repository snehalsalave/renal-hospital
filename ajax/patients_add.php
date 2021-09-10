<?php
if($_SERVER['REQUEST_METHOD']== "POST")
{
    include("../connect.php");
    $sql="INSERT INTO patient(patientName,patientMobile,dob,userId)VALUES('".$_POST['name']."','".$_POST['mobile']."','".$_POST['dob']."','".$_POST['userid']."')";
    // echo $sql;die;
    $res=mysqli_query($con,$sql);
    if(mysqli_affected_rows($con))
    {
        $_SESSION['name-msg']="patients added successfully";
        echo json_encode(["status"=>"success","msg"=>"patients added successfully"]);
    }else{
        session_destroy();
        echo json_encode(["status"=>"success","msg"=>"patients added successfully"]);

    }
}
?>