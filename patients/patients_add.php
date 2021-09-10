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
    <?php include('../view/header.php'); ?>
    <section id="main">
    <a class="btn btn-primary pull-right"  href="/renal-project/branch/branch_add.php">Add Branch </a>

        <section id="content">
<div class="alert alert-success notification" data-dismiss="alert" aria-label="Close" role="alert"></div>
 
 <form id="formpatients" action="javascript:void(0)" method="post">
<div class="container">
<h3>patient Add</h3>
<div class="form-group">
<label>patient Name</label>
<input type="text" class="form-control" name="name" id="name" value="">
</div>
</div>

<div class="container">
<div class="form-group">
<label>patient Mobile</label>
<input type="text" class="form-control" name="mobile" id="mobile" value="">
</div>
</div>

<div class="container">
<div class="form-group">
<label>patient  date Birth</label>
<input type="text" class="form-control" name="dob" id="dob" value="">
</div>
</div>

<div class="container">
<div class="form-group">
<label>patient UserName</label>
<input type="text" class="form-control" name="userid" id="userid" value="">
</div>
</div>

<div class="container">
<input type="submit" name="submit" class="btn btn-success form-control" value="Patients Add">
</div>

</form>
<script>
$(document).ready(function(){
    $('.notification').hide();
    $('#formpatients').submit(function(){
        var formdata=$('#formpatients').serialize();
        $.ajax({
            type:'POST',
            url:'../ajax/patients_add.php',
            data:formdata,
            success: function(response){
                let res=JSON.parse(response);
                if(res.status == "success")
                {
                    $('.notification').show();
                    $('.notification').html(res.msg);
                    window.location="/renal-project/patients/patients_list.php";
                }else{
                    $('.notification').show();
                    $('.notification').html(res.msg);
                }
            }
        })
    })
})
</script>
        </section>

        <?php include('../view/footer.php'); ?>

    </section>

</body>

</html>