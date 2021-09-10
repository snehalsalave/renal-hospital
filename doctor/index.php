<?php session_start();
if($_SESSION['userType'] !== 'doctor'){
    header("Location:../login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title> Doctor| Renal Project</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
<div class="container">
    <?php include('../view/header.php'); ?>
    <section id="main">
        <section id="content">
           <h3>Doctor home Page</h3>
           <h2 class="text-center">Doctor home Page</h3>
           <h5>Logged User details</h6>
           <div>
           <span>Name: <b><i><?php echo $_SESSION['userName'];?></i></b></span> <br>
           <span>User Type: <b><i><?php echo $_SESSION['userType'];?></i></b></span> <br>
           <span>Status: <b><i><?php echo $_SESSION['userStatus'];?></i></b></span> <br>
           </div>

           <img src="../image/graph.jpg" height="400px" width="400px" class="img-fluid pull-center" alt="renal image">
        </section>

        <?php include('../view/footer.php'); ?>

    </section>
</div>
</body>

</html>