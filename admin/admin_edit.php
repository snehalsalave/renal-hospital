<?php
if(isset($_REQUEST['id']) && !empty($_REQUEST['id']))
{
    $id=$_REQUEST['id'];
    include("../connect.php");
    $sql="select * from user where id=$id";
    // echo $sql;die;
    $res=mysqli_query($con,$sql);
    if(mysqli_num_rows($res)==1)
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

        <div class="alert alert-success notification" data-dismiss="alert" aria-label="Close" role="alert"></div>
        <form id="frmedit" action="javascript:void(0)" method="POST">
            <div class="container">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <div class=form-group>
                    <label>User Name</label>
                    <input type="text" class="form-control" name="name" id="Name"
                        value="<?php echo $row['userName'];?>">
                    </div>

                        <div class=form-group>
                            <label>User Email</label>
                            <input type="email" class="form-control" name="email" id="email"
                                value="<?php echo $row['userEmail'];?>">
                            </div>

                                <div class=form-group>
                                    <label>User Password</label>
                                    <input type="password" class="form-control" name="password" id="password"
                                        value="<?php echo $row['userPassword'];?>">
                                    </div>

                                        <div class=form-group>
                                            <label>User MobileNumber</label>
                                            <input type="text" class="form-control" name="mobile" id="mobile"
                                                value="<?php echo $row['mobileNumber'];?>">
                                            </div>

                                                <div class="container">
                                                    <div class="form-group">
                                                        <label>User BranchName</label></br>
                                                        <select class="form-control" id="branch" name="branch>
                                                            <option value=" id">Select branch</option>
                                                            <?php
                                                            include("../connect.php");
                                                            $sql="SELECT  id, branchName from branch where status = 'Active' AND isDeleted=0";
                                                                $res=mysqli_query($con,$sql);
                                                                    // print_r($res);
                                                                    while($Data=mysqli_fetch_assoc($res)) { ?>
                                                            <option
                                                                <?php if($row['id'] == $Data['id'] ){ echo "selected"; } ?>
                                                                value="<?php  echo $Data['id']; ?>">
                                                                <?php echo $Data['branchName']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    </div>
                                                    <!-- <div class=form-group>
                                                    <label>User BranchId</label>
                                                    <input type="text" class="form-control" name="branch" id="branch"
                                                        <!-- value="<?php// echo $row['branchId'];?>"> -->
                                                    
                                                        <div>
                                                        <input type="hidden" name="userType"
                                                            value="<?php echo $row['userType'];?>">
                                                        </div></br>

                                                        <input type="submit" name="submit"
                                                            class="btn btn-success form-control" value="ADD">
                                                    </div>
                                                </div>
                                                <script>
                                                $(document).ready(function() {
                                                    $('.notification').hide();
                                                    $('#frmedit').submit(function() {
                                                        var formdata = $('#frmedit').serialize();
                                                        // console.log(formdata);
                                                        $.ajax({
                                                            type: 'post',
                                                            url: '../ajax/fromedit.php',
                                                            data: formdata,
                                                            success: function(response) {
                                                                let res = JSON.parse(
                                                                    response);
                                                                if (res.status ==
                                                                    "success") {
                                                                    $('.notification')
                                                                    .show();
                                                                    $('.notification').html(
                                                                        res.msg);
                                                                    window.location =
                                                                        "/renal-project/admin/admin_list.php";
                                                                } else {
                                                                    $('.notification')
                                                                    .show();
                                                                    $('.notification').html(
                                                                        res.msg);
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



<?php
    }else{
        echo "record Not found";
    }
} else { echo "unauthorized access";
} ?>