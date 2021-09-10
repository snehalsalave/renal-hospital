<?php session_start();
// print_r($_SESSION);
if($_SESSION['is_login'] !== true){
    header("Location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title> Renal Project</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
<div class="container">
    <?php include('view/header.php'); ?>

    <section id="main">


        <section id="content">
           
        </section>

        <?php include('view/footer.php'); ?>

    </section>
    </div>
</body>

</html>