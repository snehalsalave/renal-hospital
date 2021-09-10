<?php
session_start();
 if(isset($_POST['email']) && isset($_POST['password']))
 {
     include("../connect.php");
     $sql="select * from user where userEmail='".$_POST['email']."' AND userPassword='".$_POST['password']."' AND userType='". $_POST['usertype'] ."'" ;
     $res=mysqli_query($con,$sql);
     $row=mysqli_fetch_assoc($res);
     $login=mysqli_num_rows($res);
     if($login==1)
     {
         $_SESSION['userEmail'] = $row['userEmail'];
         $_SESSION['userName'] = $row['userName'];
         $_SESSION['user_password'] = $row['userPassword'];
         $_SESSION['success_msg'] = $row['userType'] .' User Login Sucessfully';
         $_SESSION['userType'] =  $row['userType'];
         $_SESSION['userStatus'] =  $row['status'];
         $_SESSION['is_login'] = true;
         echo json_encode(['status' => 'success', 'userType' =>  $row['userType'], 'msg'=> $row['userType'] .' User Login Sucessfully']);

     } else{
        session_destroy();
        echo json_encode(['status' => 'fail','msg'=> 'SORRY, User not able to Login.Try again !!']);
     }
 }
?>