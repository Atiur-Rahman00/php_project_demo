<?php
    session_start();

    require_once '../../inc/header.php';
    require_once '../../db.php';
    require_once '../navbar.php';

    if(!isset($_SESSION['user_status'])){
        header('location: ../../login.php');
    }

    $get_msg_query = "SELECT * FROM guest_messages";
    $msg_from_db = mysqli_query($db_connect,$get_msg_query);
?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-warning">
                        <h5><card-title>Guest_messages_list</card-title></h5>
                    </div>
                    <div class="card-body">
                        <table class = "table table-bordered">
                            <thead>
                                <th>Guest name</th>
                                <th>Guest email</th>
                                <th>Guest subject</th>
                                <th>Guest message</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                <?php foreach($msg_from_db as $msg):?>
                                    <tr>
                                        <td><?=$msg['guest_name']?></td>
                                        <td><?=$msg['guest_email']?></td>
                                        <td><?=$msg['guest_subject']?></td>
                                        <td><?=$msg['guest_message']?></td>
                                    </tr>
                                <?php endforeach?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<?php
    require_once '../../inc/footer.php';
?>








