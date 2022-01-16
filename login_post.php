<?php
    session_start();
    require_once 'db.php';

    $user_email= filter_var($_POST['user_email'],FILTER_SANITIZE_EMAIL);
    $after_validate_user_email = filter_var($_POST['user_email'],FILTER_VALIDATE_EMAIL);

    $user_pass = $_POST['user_pass'];

    $all_cap = preg_match('@[A-Z]@',$user_pass);
    $all_small = preg_match('@[a-z]@',$user_pass);
    $all_num = preg_match('@[0-9]@',$user_pass);
    $pattern = '/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/';
    $all_char = preg_match($pattern,$user_pass);

    $user_pass = md5($_POST['user_pass']);

    if($user_email == null || $user_pass == null){
        $_SESSION['log_err'] = "please fillup all fields first";
        header('location: login.php');
    }
    else{
        if($after_validate_user_email){
            if(strlen($user_pass) >=6 && $all_cap == 1 && $all_small == 1 && $all_num == 1 && $all_char == 1){
                $checking_query = "SELECT COUNT(*) AS total_users FROM users WHERE user_email='$after_validate_user_email' 
                AND user_pass='$user_pass'";
                $result_from_db = mysqli_query($db_connect,$checking_query);
                $after_assoc = mysqli_fetch_assoc($result_from_db);
                if($after_assoc['total_users']==1){
                    $_SESSION['email'] = $user_email;
                    $_SESSION['user_status'] = "yes";
                    header('location: admin/dashboard.php');
                }
                else{
                    $_SESSION['log_err'] = "wrong user name or password";
                    header('location: login.php');
                }
            }
            else{
                $_SESSION['log_err'] = "invalid password format";
                header('location: login.php');
            }
        }
        else{
            $_SESSION['log_err'] = "invalid email format";
            header('location: login.php');
        }
    }
   
?>


                