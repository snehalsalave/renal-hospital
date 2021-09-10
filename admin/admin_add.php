<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title> Renal | ADMIN</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<body>
<div class="container">
    <?php include('../view/header.php'); ?>
    <section id="main">
        <section id="content">
            <div class="alert alert-success notification" data-dismiss="alert" aria-label="Close" role="alert"></div>
            <form id="frmadd" action="javascript:void(0)" method="POST">
                <div class="container">
                    <div class=form-group>
                        <label>User Name</label>
                        <input type="text" class="form-control" name="name" id="Name" value="">
                        <div>

                            <div class=form-group>
                                <label>User Email</label>
                                <input type="email" class="form-control" name="email" id="email" value="">
                                <div>

                                    <div class=form-group>
                                        <label>User Password</label>
                                        <input type="password" class="form-control" name="password" id="password"
                                            value="">
                                        <div>

                                            <div class=form-group>
                             
                                                <label>User MobileNumber</label>
                                                <input type="text" class="form-control" name="mobile" id="mobile"
                                                    value="">
                                                <div>

                                                    <?php if($_GET['type'] == 'staff') { ?>
                                                    <div class=form-group>
                                                        <label>User BranchId</label>
                                                        <select name="branch" class="form-control" id="branch">
                                                            <option value="">Select Branch</option>
                                                            <?php 
    $sql="SELECT id, branchName FROM branch";
    include("../connect.php");
    $res=mysqli_query($con,$sql);
    while($row=mysqli_fetch_assoc($res))
    {
    ?>

                                                            <option value="<?php echo $row['id'];?>">
                                                                <?php echo $row['branchName'];?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <div>
                                                            <?php } ?>

                                                            <input type="hidden" name="userType"
                                                                value="<?php echo $_GET['type']; ?>">
                                                            <!-- <div class=form-group>
<label>User Type</label>
<select name="userType" class="form-control" id="usertype">
    <option value="doctor">Doctor</option>
    <option selected value="admin">Admin</option>
    <option value="staff">Staff</option>
</select>
<div> -->
                                                            </br>

                                                            <input type="submit" name="submit"
                                                                class="btn btn-success form-control" value="ADD">
                                                        </div>
                                                    </div>
                                                    <script>
                                                    $(document).ready(function() {
                                                        $('.notification').hide();
                                                        $('#frmadd').submit(function() {
                                                            var frmdata = $('#frmadd').serialize();
                                                            $.ajax({
                                                                type: "POST",
                                                                url: "../ajax/admin_add1.php",
                                                                data: frmdata,
                                                                success: function(response) {
                                                                    let res = JSON.parse(
                                                                        response);
                                                                    console.log(res);
                                                                    if (res.status ==
                                                                        "success") {
                                                                        $('.notification')
                                                                            .show();
                                                                        $('.notification')
                                                                            .html(res.msg);
                                                                        window.location =
                                                                            "/renal-project/admin/admin_list.php";
                                                                    } else {
                                                                        $('.notification')
                                                                            .show();
                                                                        $('.notification')
                                                                            .html(res.msg);
                                                                    }
                                                                }
                                                            })
                                                        })

                                                    })
                                                    </script>
            </form>
        </section>

        <?php include('../view/footer.php'); ?>

    </section>
</div>
</body>

</html>