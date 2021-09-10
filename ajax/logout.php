<?php
session_start();
// print_r($_SESSION);
if($_POST['isLogin'] && !empty($_SESSION)){
    session_destroy();
    echo json_encode(['status' => 'success', 'userType' =>  $_SESSION['userType'], 'msg'=> $_SESSION['userName'] .' Logout Sucessfully']);
}

?>