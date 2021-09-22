<?php
// print_r($_POST);
if( $_SERVER['REQUEST_METHOD'] == 'POST')
 {
    $branchId = !empty($_POST['branch']) ? $_POST['branch'] : 0;
    include("../connect.php");
    $sql="INSERT INTO user( userName, userEmail, userPassword, mobileNumber, branchId, userType ) 
          VALUES('".$_POST['name']."', '".$_POST['email']."', '".$_POST['password']."', '".$_POST['mobile']."', '".$branchId."', '".$_POST['userType']."')";
  
     $res=mysqli_query($con,$sql);
     if(mysqli_affected_rows($con))
     {
        $_SESSION['success_msg'] = $_POST['name'] .' User insert Sucessfully';
        echo json_encode(["status"=>"success", "msg"=> "User insert Sucessfully"]);
     }
     else{
      session_destroy();
      echo json_encode(["status"=>"pass", "msg"=>"User Not insert Sucessfully"]);
     }
 }else{
    echo json_encode(["status"=>"fail", "msg"=>"Please add data in required fields."]);
 }
?>