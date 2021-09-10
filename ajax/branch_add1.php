<?php
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    include("../connect.php");
     $sql="INSERT INTO branch(branchName, amountPerPatient, branchLocation) VALUES ('".$_POST['name']."','".$_POST['Amount']."',
    '".$_POST['location']."')";
    $res=mysqli_query($con,$sql);
    if(mysqli_affected_rows($con))
    {
        $_SESSION['success_msg'] = $_POST['name'] .' branch insert Sucessfully';
        echo json_encode(["status"=>"success", "msg"=> "branch insert Sucessfully"]);
     }
     else{
      session_destroy();
      echo json_encode(["status"=>"fail", "msg"=>"branch Not insert Sucessfully"]);
     }
 }
?>