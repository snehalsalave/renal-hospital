<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title> Renal | Patient</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<body>
<div class="container">
    <?php include('../view/header.php'); ?>
    <section id="main">
    <a class="btn btn-primary pull-right"  href="/renal-project/patients/patients_add.php?type=staff">Add patient </a> &nbsp;&nbsp;
   
        <section id="content">
       <?php
        include("../connect.php");
        $sql="SELECT
                    p.*,
                    u.userName
                FROM
                    patient p
                RIGHT JOIN user u ON
                      p.id = u.id;";
        $res=mysqli_query($con,$sql);
        ?>
        <h3 class="text-center">Patients Listing</h3>
        <div class="alert alert-success notification" data-dismiss="alert" aria-label="Close" role="alert"></div>

        <table  class="table table-dark table-hover">
        <?php
        if(mysqli_num_rows($res)>0)
        { ?>
        <tr>
    <th>ID</th>
    <th>Patient Name</th>
    <th>Patient Mobile </th>
    <th>Patient Date Birth</th>
    <th>Patient UserName</th>

    </tr>
        <?php
        while ($row=mysqli_fetch_assoc($res)) {
            ?>
        <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['patientName']; ?></td>
        <td><?php echo $row['patientMobile']; ?></td>
        <td><?php echo $row['dob']; ?></td>
        <td><?php echo $row['userName']; ?></td>

        <td>
        <a class="btn btn-primary" href="patient_edit.php?id=<?php echo $row['id']?>">Edit</a>
        <a class="btn btn-danger" href="javascript:void(0)" onclick="funDelete('<?php echo $row['id']; ?>')">Delete</a>
      <a class="btn btn-success" href="patient_view.php?id=<?php echo $row['id'];?>">View</a>
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
function funDelete(id)
{
    var x=confirm("do you want to delete");
    if(x==true)
    {
        $.ajax({
            type:'post',
            url:'../ajax/patient_delete.php',
            data:{'id': id},
            success:function(response){
                let res=JSON.parse(response);
                if(res.status == 'success')
                {
                    $('.notification').show();
                    $('.notification').html(res.msg);
                    window.location='/renal-project/patients/patients_list.php';        
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