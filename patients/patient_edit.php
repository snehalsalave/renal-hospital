<?php
if(isset($_REQUEST['id']) && !empty($_REQUEST['id']))
{
    include("../connect.php");
    $id=$_REQUEST['id'];
    $sql="select * from patient where id=$id";
    $res=mysqli_query($con,$sql);
    if(mysqli_num_rows($res))
    {
        $row=mysqli_fetch_assoc($res);
        ?>
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
 
 <form id="editpatients" action="javascript:void(0)" method="post">
<div class="container">
<h3>patient Edit</h3>
<input type="hidden"  name="id" id="name" value="<?php echo $row['id'];?>">
<div class="form-group">
<label>patient Name</label>
<input type="text" class="form-control" name="name" id="name" value="<?php echo $row['patientName'];?>">
</div>
</div>

<div class="container">
<div class="form-group">
<label>patient Mobile</label>
<input type="text" class="form-control" name="mobile" id="mobile" value="<?php echo $row['patientMobile'];?>">
</div>
</div>

<div class="container">
<div class="form-group">
<label>patient  date Birth</label>
<input type="text" class="form-control" name="dob" id="dob" value="<?php echo $row['dob'];?>">
</div>
</div>


<div class="container">
<div class="form-group">
<label>patient UserName</label></br>
 <select class="form-control" id="userid" name="userid">
<option value="id">Select userid</option>
 <?php 
 include("../connect.php");
    $sql="SELECT  id, userName from user where status = 'Active' AND isDeleted=0";
    $res=mysqli_query($con,$sql);
// print_r($res);
while($Data=mysqli_fetch_assoc($res)) { ?>
                    <option <?php if($row['id'] == $Data['id'] ){ echo "selected"; } ?>
                        value="<?php  echo $Data['id']; ?>"> <?php echo $Data['userName']; ?></option>
                    <?php } ?>
                </select>
            </div>
<!-- <div class="container">
<div class="form-group">
<label>patient UserId</label>
<input type="text" class="form-control" name="userid" id="userid" value="<?php //echo $row['userId'];?>">
</div>
</div> -->

<div class="container">
<input type="submit" name="submit" class="btn btn-success form-control" value="Patients Add">
</div>
<script>
$(document).ready(function(){
    $('.notification').hide();
    $('#editpatients').submit(function(){
        var formData=$('#editpatients').serialize();
        $.ajax({
            type:'post',
            url:'../ajax/patient_edit.php',
            data:formData,
            success:function(response){
                let res=JSON.parse(response);
                if(res.status == 'success')
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
</form>

        </section>

        <?php include('../view/footer.php'); ?>

    </section>

</body>

</html>
   <?php  
   }else{
       echo "record Not Found";
   }?>
<?php } else {
    echo "unauthorized";
}
?>