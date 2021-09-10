<?php
session_start();
if(isset($_POST['id']))
{
    include("../connect.php");
    $sql="delete from patient where id='".$_POST['id']."'";
    // echo $sql;die;
    $res=mysqli_query($con,$sql);
    if(!mysqli_error($con))
    {
        $_SESSION['name-msg']="patient is deleted successfully";
        echo json_encode(["status"=>"success","msg"=>"patient is deleted successfully"]);
    }else{
        session_destroy();
        echo json_encode(["status"=>"error","msg"=>"patient is Not deleted successfully"]);
    }
}

?>