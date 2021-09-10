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
<div class="alert alert-success notification" data-dismiss="alert" aria-label="Close" role="alert"></div>

<div class="container">
    <?php include('../view/header.php'); ?>
    <section id="main">
    <a class="btn btn-primary pull-right"  href="/renal-project/branch/branch_add.php?type=admin">Add branch </a> &nbsp;&nbsp;
    <a class="btn btn-success pull-right"  href="/renal-project/admin/admin_add.php?type=staff">Add staff </a> &nbsp;&nbsp;
   
        <section id="content">
       <?php
        include("../connect.php");
        $sql="select * from branch";
        $res=mysqli_query($con,$sql);
        ?>
        <table  class="table table-dark table-hover">
        <?php
        if(mysqli_num_rows($res)>0)
        { ?>
        <tr>
    <th>ID</th>
    <th>Branch Name</th>
    <th>amount per unit </th>
    <th>location</th>
    
    </tr>
        <?php
        while ($row=mysqli_fetch_assoc($res)) {
            ?>
        <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['branchName']; ?></td>
        <td><?php echo $row['amountPerPatient']; ?></td>
        <td><?php echo $row['branchLocation']; ?></td>
        <td>
        <a class="btn btn-primary" href="branch_edit.php?id=<?php echo $row['id']?>">Edit</a>
        <a class="btn btn-danger" href='javascript:void(0)' onclick="return fundelete(<?php echo $row['id']; ?>)">Delete</a>
      <a class="btn btn-success" href="view.php?id=<?php echo $row['id'];?>">View</a>
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
function fundelete(id)
{
    var x=confirm("do you want to delete");
    $('.notification').hide();
    if(x==true)
    {
        $.ajax({
            type:'POST',
            url:'../ajax/branch_delete.php',
            data: {'id':id},
            datatype: "html",
            success:function(response){
                let res=JSON.parse(response);
                if(res.status== "success")
                {
               $('.notification').show();
               $('.notification').html(res.msg);
               window.location="/renal-project/branch/branch_list.php";
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