<?php

 if (isset($_POST['id'])) {
    include("../connect.php");
        $id = $_POST['id'];
         $sql="delete  from user where id='".$_POST['id']."'";
        //  echo $sql;die;
         $res=mysqli_query($con, $sql);
         if (mysqli_affected_rows($con)) {
             $_SESSION['name-msg']= "user deleted successfully";
             echo json_encode(["status"=>"success","msg" => "user deleted successfully"]);
         } else {
             session_destroy();
             echo json_encode(["status"=>"ERROR","msg" => "user Not deleted successfully"]);
         }
     }
 
?>