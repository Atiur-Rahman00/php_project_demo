<?php
    session_start();
    require_once 'inc/header.php';
    if(isset($_SESSION['user_status'])){
        header('location: admin/dashboard.php');
    }
?>
<div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="card mt-4">
                        <div class="card-header d-flex justify-content-between">
                            <h5 class="card-title">register form</h5>
                            <a href="login.php">login</a>
                        </div>
                        <div class="card-body">
                            <?php
                                if(isset($_SESSION['reg_err'])){       
                            ?>
                            <div class="alert alert-danger" role="alert">
                                <?php
                                    echo $_SESSION['reg_err'];
                                    unset($_SESSION['reg_err']);
                                ?>
                            </div>
                            <?php
                                }
                            ?>
                        <?php
                                if(isset($_SESSION['reg_success'])){       
                            ?>
                            <div class="alert alert-success" role="alert">
                                <?php
                                    echo $_SESSION['reg_success'];
                                    unset($_SESSION['reg_success']);
                                ?>
                            </div>
                            <?php
                                }
                            ?>
                            <form action="register_post.php" method="post">
                                <div class="mb-3">
                                    <label class="form-lebel">user name</label>
                                    <input type="text" name="user_name" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-lebel">user email</label>
                                    <input type="email" name="user_email" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-lebel">user mobile</label>
                                    <input type="text" name="user_mobile" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-lebel">user password</label>
                                    <input type="password" name="user_pass" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
               </div>
            </div>
        </div>

<?php
    require_once 'inc/footer.php';
?>
        


        