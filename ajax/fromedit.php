<?php
if($_SERVER['REQUEST_METHOD']== "POST")
{
    $branchId = !empty($_POST['branch']) ? $_POST['branch'] : 0;
// $id=$_SERVER['id'];
include("../connect.php");
$sql="update user set userName='".$_POST['name']."',userEmail='".$_POST['email']."',mobileNumber='".$_POST['mobile']."',branchId='".$branchId."',
userType='".$_POST['userType']."'where id='".$_POST['id']."'";
// echo $sql;die;
$res=mysqli_query($con,$sql);
if(!mysqli_error($con))
{
    $_SESSION['success-msg']=$_POST['name'].'User Update Successfully';
    echo json_encode(["status"=>"success","msg"=>"user updated successfully"]);
    
}else{
    session_destroy();
    echo json_encode(["status"=>"fail","msg"=>"user NOT updated successfully"]);

}
}
?>