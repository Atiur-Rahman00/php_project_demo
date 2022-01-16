<?php
    session_start();
    require_once 'navbar.php';
    require_once '../inc/header.php';
    require_once '../db.php';
    require_once 'check_admin.php';
    $get_users_query = "SELECT * FROM users";
    $from_db = mysqli_query($db_connect,$get_users_query);
    
?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h5>
                            <card-title>user list</card-title>
                        </h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-ordered">
                            <thead>
                                <th>user name</th>
                                <th>user email</th>
                                <th>user mobile</th>
                            </thead>
                            <tbody>
                            <?php
                                foreach($from_db as $user):
                            ?>
                            <tr>
                                <td><?=$user['user_name']?></td>
                                <td><?=$user['user_email']?></td>
                                <td><?=$user['user_mobile']?></td>
                            </tr>
                            <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
    require_once '../inc/footer.php';
?>