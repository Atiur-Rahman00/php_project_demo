<?php
    session_start();
    require_once '../inc/header.php';
    require_once '../db.php';

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
                            <card-title>Profile edit form</card-title>
                        </h5>
                        <a href="dashboard.php" class="btn btn-sm btn-primary">Back</a>
                    </div>
                    <div class="card-body">

                    <?php
                        if(isset($_SESSION['profile_err'])):       
                    ?>
                    <div class="alert alert-danger" role="alert">
                        <?php
                            echo $_SESSION['profile_err'];
                            unset($_SESSION['profile_err']);
                        ?>
                    </div>
                    <?php
                        endif
                    ?>


                        <form action="profile_edit_post.php" method="post">
                            <div class="mb-3">
                                <label class="form-lebel">User Name</label>
                                <input type="hidden" name="user_email" class="form-control" value="<?=$login_email?>">
                                <input type="text" name="user_name" class="form-control" value="<?=$after_assoc['user_name']?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-lebel">User Mobile</label>
                                <input type="text" name="user_mobile" class="form-control" value="<?=$after_assoc['user_mobile']?>">
                            </div>
                            <button class="btn btn-sm btn-primary">submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
    require_once '../inc/footer.php';
?>

