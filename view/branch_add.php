<<?php session_start() ?> <!DOCTYPE html>
    <html lang="en">

    <head>
        <title> Renal | ADMIN</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    </head>

    <body>
        <?php include('../view/header.php'); ?>
        <section id="main">
        <a class="btn btn-primary pull-right" href="/renal-hospital/admin/branch_add.php">Add Branch </a>
     
     <section id="content">
    <div class="alert alert-success notification" data-dismiss="alert" aria-label="Close" role="alert">
    </div>
    <form id="frmbranch" action="javascript:void(0)" method="post">
    
    <div class="container">
    <div class=form-group>
    <label>Branch Name</label>
    <input type="text" class="form-control" name="branch" id="branch" value="">
    <div>

    <div class="container">
    <div class=form-group>
    <label>Amount per patient</label>
    <input type="text" class="form-control" name="amount" id="amount" value="">
    <div>

    <div class="container">
    <div class=form-group>
    <label>Branch Location</label>
    <input type="text" class="form-control" name="location" id="location" value="">
    <div>

    <div class="container">
    <div class=form-group>
    <label>Branch Mobile</label>
    <input type="text" class="form-control" name="mobile" id="mobile" value="">
    <div>
    </br>

    <input type="submit"  name="submit" class="btn btn-success" value="ADD">
</div>
    </form>
            </section>

            <?php include('../view/footer.php'); ?>

        </section>

    </body>

    </html>