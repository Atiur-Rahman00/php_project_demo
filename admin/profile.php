<?php
    session_start();
    require_once '../db.php';
    require_once '../inc/header.php';
    require_once 'navbar.php';

    $login_email=$_SESSION['email'];

    $get_profile_query = "SELECT user_name,user_mobile FROM users WHERE user_email='$login_email'";
    $from_db = mysqli_query($db_connect,$get_profile_query);
    $after_assoc = mysqli_fetch_assoc($from_db);

?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card mt-4">
                    <div class="card-header d-flex justify-content-between">
                        <h5>
                            <card-title>User Profile</card-title>
                        </h5>
                        <a href="dashboard.php" class="btn btn-sm btn-primary">Back</a>
                    </div>
                    <div class="card-body">
                        <p><strong class="card-title">User Name: </strong><?=$after_assoc['user_name']?></p>
                        <p><strong class="card-title">User Mobile: </strong><?=$after_assoc['user_mobile']?></p>
                        <a href="profile_edit.php" class="btn btn-sm btn-primary">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<?php
    require_once '../inc/footer.php';
?>