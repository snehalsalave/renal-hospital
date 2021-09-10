
<h1 class="text-center">Renal Hospital</h1>
<div style="margin: 0px 50px 0px 100px;">
<?php
if( $_SESSION['userType'] == 'admin' ){ ?>
<a class="btn btn-primary" href="/renal-hospital/admin/admin_list.php">Home</a>
<a class="btn btn-success"  href="/renal-hospital/branch/branch_list.php">Branch</a>
<a class="btn btn-primary"  href="/renal-hospital/about.php">About</a>
<a class="btn btn-danger pull-right" href="javascript:void(0)" onclick="funLogout()">logout</a>

<?php } elseif( $_SESSION['userType'] == 'doctor' ){ ?>
<a class="btn btn-primary" href="/renal-hospital/doctor/index.php">Home</a>
<a class="btn btn-primary"  href="/renal-hospital/about.php">About</a>
<a class="btn btn-primary pull-right" href="javascript:void(0)" onclick="funLogout()">logout</a>

<?php } elseif( $_SESSION['userType'] == 'staff' ){ ?>
<a class="btn btn-primary" href="/renal-hospital/staff/index.php">Home</a>
<a class="btn btn-danger"  href="/renal-hospital/patients/patients_list.php">Patients</a>
<a class="btn btn-primary"  href="/renal-hospital/about.php">About</a>
<a class="btn btn-primary pull-right" href="javascript:void(0)" onclick="funLogout()">logout</a>

    <?php } ?>
</div>
<hr>

<script>

function funLogout(){
    let isLogout = confirm("Do you want to logout?");
    if(isLogout == true){
        $.ajax({
                type: "POST",
                url: '/renal-hospital/ajax/logout.php',
                data: {'isLogin': true},
                success: function(response) {
                    let res = JSON.parse(response);
                    console.log(res);
                    if (res.status == 'success') {
                        window.location = "../login.php";                      
                    }
                }
            })
    }
}

</script>