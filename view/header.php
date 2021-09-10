
<h1 class="text-center">Renal Hospital</h1>
<div>
<?php
if( $_SESSION['userType'] == 'admin' ){ ?>
<a class="btn btn-primary" href="/renal-project/admin/admin_list.php">Home</a>
<a class="btn btn-success"  href="/renal-project/branch/branch_list.php">Branch</a>
<a class="btn btn-primary"  href="/renal-project/about.php">About</a>
<a class="btn btn-danger" href="/renal-project/login.php">logout</a>

<?php } elseif( $_SESSION['userType'] == 'doctor' ){ ?>
<a class="btn btn-primary" href="/renal-project/doctor/index.php">Home</a>
<a class="btn btn-primary"  href="/renal-project/about.php">About</a>
<a class="btn btn-primary" href="/renal-project/login.php">logout</a>

<?php } elseif( $_SESSION['userType'] == 'staff' ){ ?>
<a class="btn btn-primary" href="/renal-project/staff/index.php">Home</a>
<a class="btn btn-danger"  href="/renal-project/patients/patients_list.php">Patients</a>
<a class="btn btn-primary"  href="/renal-project/about.php">About</a>
<a class="btn btn-primary" href="/renal-project/login.php">logout</a>

    <?php } ?>
</div>
<hr>