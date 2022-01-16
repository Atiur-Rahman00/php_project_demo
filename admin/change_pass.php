<?php
    session_start();
    $login_email = $_SESSION['email'];
    require_once '../db.php';
    require_once '../inc/header.php';
?>
<div class="container">
    <div class="row">
        <div class="col-lg-6 m-auto">
            <div class="card mt-4">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="card-title">Password change form</h5>
                    <a href="dashboard.php" class="btn btn-sm btn-primary">Back</a>
                </div>
                <div class="card-body">
                <?php
                    if(isset($_SESSION['pass_change_done'])):       
                ?>
                <div class="alert alert-success" role="alert">
                    <?php
                        echo $_SESSION['pass_change_done'];
                        unset($_SESSION['pass_change_done']);
                    ?>
                </div>
                <?php
                    endif
                ?>


                <?php
                    if(isset($_SESSION['pass_change_err'])):       
                ?>
                <div class="alert alert-danger" role="alert">
                    <?php
                        echo $_SESSION['pass_change_err'];
                        unset($_SESSION['pass_change_err']);
                    ?>
                </div>
                <?php
                    endif
                ?>


                    <form action="change_pass_post.php" method="post">
                        <div class="mb-3">
                            <label class="form-lebel">current password</label>
                            <input type="hidden" name="user_email" class="form-control" value="<?=$login_email?>">
                            <input type="password" name="current_pass" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-lebel">New password</label>
                            <input type="password" name="new_pass" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-lebel">confirm password</label>
                            <input type="password" name="confirm_pass" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
    require_once '../inc/footer.php';
?>