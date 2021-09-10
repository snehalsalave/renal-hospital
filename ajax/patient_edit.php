<?php
if($_SERVER['REQUEST_METHOD']== 'POST')
{
    include('../connect.php');
    $sql="update patient set patientName='".$_POST['name']."',patientMobile='".$_POST['mobile']."',dob='".$_POST['dob']."',userId='".$_POST['userid']."' where id='".$_POST['id']."'";
    $res=mysqli_query($con,$sql);
    if(!mysqli_error($con))
    {
        $_SESSION['name-msg']="patient updated successfully";
        echo json_encode(["status"=>"success","msg"=>"patient updated successfully"]);
    }else{
        session_destroy();
        echo json_encode(["status"=>"success","msg"=>"patient updated successfully"]);
    }
}
?>