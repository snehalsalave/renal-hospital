<html>

<head>
    <title>renal project</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <form id="frmLogin" action="javascript:void(0)" method="Post">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <h1>Renal Project</h1>
                <img src="image/logo.jpg" height="200px" class="img-fluid" alt="renal image">
                <div class="alert alert-success notification" data-dismiss="alert" aria-label="Close" role="alert"></div>
                <div>
                    <label for="">Choose a option:</label>
                    <select name="usertype" id="usertype">
                        <option value="doctor">Doctor</option>
                        <option selected value="admin">Admin</option>
                        <option value="staff">Staff</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Email address</label>
                    <input type="email" name="email" class="form-control" id="email" value="admin@gmail.com" placeholder="Enter email">
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" id="password" value="admin" placeholder="Password">
                </div>

                <button type="submit" name="submit" class="btn btn-success ">Submit</button>
            </div>
        </div>
    </form>
    <script>
    $(document).ready(function() {
                $('.notification').hide();
                $('#frmLogin').submit(function(e) {
                        var formData = $('#frmLogin').serialize();
                        console.log(formData);
                        $.ajax({
                            type: "POST",
                            url: 'ajax/user_login.php',
                            data: formData,
                            success: function(response) {
                                let res = JSON.parse(response);
                                console.log(res);
                                if (res.status == 'success') {
                                    $('.notification').show();
                                    $('.notification').html(res.msg);
                                    if(res.userType == 'admin'){
                                        window.location = "admin/admin_list.php";
                                    }else if(res.userType == 'doctor') {
                                        window.location = "doctor/index.php";
                                    }else if(res.userType == 'staff') {
                                        window.location = "staff/index.php";
                                    }
                                } else {
                                    $('.notification').show();
                                    $('.notification').html(res.msg);
                                }
                            }
                        })
                    })
                })
    </script>
</body>

</html>