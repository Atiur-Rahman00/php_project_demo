<?php
    session_start();
    require_once '../db.php';

    $login_email=$_SESSION['email'];

     $user_email = $_POST['user_email'];
     $user_name = filter_var($_POST['user_name'],FILTER_SANITIZE_STRING);
     $user_mobile = $_POST['user_mobile'];


if($user_name){
    if(strlen($user_mobile) == 11){
        $update_profile_query = "UPDATE users SET user_name='$user_name',user_mobile='$user_mobile' WHERE user_email='$user_email'";
        $update_database = mysqli_query($db_connect,$update_profile_query);
        header('location: profile.php');
     }
     else{
        $_SESSION['profile_err'] = "invalid mobile format";
        header('location: profile_edit.php');
     }
}


?>


