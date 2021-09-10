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
        <a class="btn btn-primary pull-right" href="/renal-project/branch/branch_add.php">Add Branch </a>

        <div class="alert alert-success notification" data-dismiss="alert" aria-label="Close" role="alert"></div>
        <form id="frmbranch" action="javascript:void(0)" method="POST">
            <h3>Branch Add</h3>
            <div class="container">
                <div class=form-group>
                    <label>branch Name</label>
                    <input type="text" class="form-control" name="name" id="Name" value="">
                    <div>

                        <div class=form-group>
                            <label>Amount per patient</label>
                            <input type="text" class="form-control" name="Amount" id="Amount" value="">
                            <div>

                                <div class=form-group>
                                    <label>Branch Location</label>
                                    <input type="text" class="form-control" name="location" id="location" value="">
                                    <div>
                                        </br>

                                        <input type="submit" name="submit" class="btn btn-success form-control"
                                            value="ADD">
                                    </div>
                                </div>
                                <script>
                                $(document).ready(function() {
                                    $('.notification').hide();
                                    $('#frmbranch').submit(function() {
                                        var frmdata = $('#frmbranch').serialize();
                                        $.ajax({
                                            type: "POST",
                                            url: "../ajax/branch_add1.php",
                                            data: frmdata,
                                            success: function(response) {
                                                let res = JSON.parse(response);
                                                console.log(res);
                                                if (res.status == "success") {
                                                    $('.notification').show();
                                                    $('.notification').html(res.msg);
                                                    window.location =
                                                        "/renal-project/branch/branch_list.php";
                                                } else {
                                                    $('.notification').show();
                                                    $('.notification').html(res.msg);
                                                }
                                            }
                                        })
                                    })

                                })
                                </script>
        </form>
        <?php include('../view/footer.php'); ?>
    </div>
</body>

</html>