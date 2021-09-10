<?php session_start();
if($_SESSION['userType'] !== 'admin'){
    header('Location: ../login.php');
} ?>
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
    <a class="btn btn-primary pull-right"  href="/renal-hospital/admin/admin_add.php?type=admin">Add Admin </a> &nbsp;&nbsp;
    <a class="btn btn-success pull-right"  href="/renal-hospital/admin/admin_add.php?type=doctor">Add Doctor </a>
        <section id="content">
       <?php
        include("../connect.php");
        $sql="SELECT
                u.*,
                b.branchName
            FROM
                USER u
            LEFT JOIN branch b ON
                u.branchId = b.id";
        $res=mysqli_query($con,$sql);
        ?>
        <div class="alert alert-success notification" data-dismiss="alert" aria-label="Close" role="alert"></div>

        <table  class="table table-dark table-hover">
        <?php
        if(mysqli_num_rows($res)>0)
        { ?>
        <tr>
    <th>ID</th>
    <th>User Name</th>
    <th>User Email</th>
    <th>User Mobile</th>
    <th>User Branch</th>
    <th>User Type</th>
    </tr>
        <?php
        while ($row=mysqli_fetch_assoc($res)) {
            ?>
        <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['userName']; ?></td>
        <td><?php echo $row['userEmail']; ?></td>
        <td><?php echo $row['mobileNumber']; ?></td>
        <td><?php echo (!empty($row['branchName']) ? $row['branchName'] : '-'); ?></td>
        <td><?php echo $row['userType']; ?></td>
        <td>
        <a class="btn btn-primary" href="admin_edit.php?id=<?php echo $row['id'].'&?type='.$row['userType']; ?>">Edit</a>
        <a class="btn btn-danger" href='javascript:void(0)' onclick="return fundelete(<?php echo $row['id']; ?>)">Delete</a>
        <a class="btn btn-success" href="admin_view.php?id=<?php echo $row['id'];?> ">View</a>
        </td>
        </tr>
        <?php
        } ?>     
        </table>
        <?php } else 
        { echo "record Not found"; } ?>
        </section>

        <?php include('../view/footer.php'); ?>

    </section>
</div>
<script>
$('.notification').hide();
function fundelete(id)
{
    var x=confirm("do you want to delete");
    $('.notification').hide();
    if(x==true)
    {
        $.ajax({
            type:'POST',
            url:'../ajax/admin_delete.php',
            data: {'id':id},
            datatype: "html",
            success:function(response){
                let res=JSON.parse(response);
                if(res.status== "success")
                {
               $('.notification').show();
               $('.notification').html(res.msg);
               window.location="/renal-hospital/admin/admin_list.php";
                }else{
               $('.notification').show();
               $('.notification').html(res.msg);   
                }
            }
    })
    }
}

</script>
</body>

</html>