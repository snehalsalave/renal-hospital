<?php
if(isset($_REQUEST['id']) && ($_REQUEST['id']))
{
    include("../connect.php");
    $id=$_REQUEST['id'];
    $sql="select * from branch where id=$id";
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
<div class="container">
    <?php include('../view/header.php'); ?>
    <section id="main">
    <a class="btn btn-primary pull-right"  href="/renal-hospital/branch/branch_add.php">Add Branch </a>

        <section id="content">

<div class="alert alert-success notification" data-dismiss="alert" aria-label="Close" role="alert"></div>
<form id="branchedit" action="javascript:void(0)" method="POST">
<h3>Branch Edit</h3>
<div class="container">

<input type="hidden" name="id" value="<?php echo $row['id']; ?>">

<div class=form-group>
<label>branch Name</label>
<input type="text" class="form-control" name="name" id="Name" value="<?php echo $row['branchName'];?>">
<div>

<div class=form-group>
<label>Amount per patient</label>
<input type="text" class="form-control" name="Amount" id="Amount" value="<?php echo $row['amountPerPatient'];?>">
<div>

<div class=form-group>
<label>Branch Location</label>
<input type="text" class="form-control" name="location" id="location" value="<?php echo $row['branchLocation'];?>">
<div>

<input type="hidden" name="userType" value="<?php echo $_GET['type']; ?>">
</br>

<input type="submit"  name="submit" class="btn btn-success form-control" value="UPDATE">
</div>
</div>
<script>
$(document).ready(function(){
    $('.notification').hide();
    $("#branchedit").submit(function(){
     var formdata=$("#branchedit").serialize();
        $.ajax({
         type: 'POST',
         url : '../ajax/branchedit.php',
         data : formdata,
         success: function(response){
             var res=JSON.parse(response);
             if(res.status == "success")
             {
                 $('.notification').show();
                 $('.notification').html(res.msg);
                 window.location="/renal-hospital/branch/branch_list.php";
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
</div>
</body>

</html>





<?php
     }else{
        echo "Record Not Found";
    }?>
<?php }else{
    echo "unauthorized Access";
}
?>