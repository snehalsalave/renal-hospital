<?php

 if (isset($_POST['id'])) {
    include("../connect.php");
        $id = $_POST['id'];
         $sql="delete  from branch where id='".$_POST['id']."'";
        //  echo $sql;die;
         $res=mysqli_query($con, $sql);
         if (mysqli_affected_rows($con)) {
             $_SESSION['name-msg']= "branch deleted successfully";
             echo json_encode(["status"=>"success","msg" => "branch deleted successfully"]);
         } else {
             session_destroy();
             echo json_encode(["status"=>"ERROR","msg" => "branch Not deleted successfully"]);
         }
     }
 
?>