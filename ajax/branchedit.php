<?php
session_start();
if($_SERVER['REQUEST_METHOD']== 'POST')
{
    include("../connect.php");
    $sql="update branch set branchName='".$_POST['name']."',amountPerPatient='".$_POST['Amount']."',branchLocation='".$_POST['location']."' where id='".$_POST['id']."'";
    // echo $sql;die;
    $res=mysqli_query($con,$sql);
    // echo $res;die;
if(!mysqli_error($con))
{
    $_SESSION['success-msg']='branch Update Successfully';
    echo json_encode(["status"=>"success","msg"=>"branch updated successfully"]);
    
}else{
    session_destroy();
    echo json_encode(["status"=>"fail","msg"=>"branch NOT updated successfully"]);

}
}
?>