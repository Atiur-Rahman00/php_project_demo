<?php
    session_start();
    require_once 'db.php';

    $user_name = filter_var($_POST['user_name'],FILTER_SANITIZE_STRING);
    $user_email= filter_var($_POST['user_email'],FILTER_SANITIZE_EMAIL);
    $user_mobile= $_POST['user_mobile'];
    $user_pass = $_POST['user_pass'];


    $after_validate_user_email = filter_var($_POST['user_email'],FILTER_VALIDATE_EMAIL);

    $all_cap = preg_match('@[A-Z]@',$user_pass);
    $all_small = preg_match('@[a-z]@',$user_pass);
    $all_num = preg_match('@[0-9]@',$user_pass);
    $pattern = '/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/';
    $all_char = preg_match($pattern,$user_pass);
    


    if($user_name == null || $user_email == null || $user_mobile == null || $user_pass == null){
        $_SESSION['reg_err'] = "all fields fill first";
        header('location:register.php');
    }
    else{
        if(strlen($user_mobile)==11){
            $checking_query = "SELECT COUNT(*) AS total_users FROM users WHERE user_email='$user_email'";
            $result_from_db = mysqli_query($db_connect,$checking_query);
            $after_assoc = mysqli_fetch_assoc($result_from_db);
            if($after_assoc['total_users']==0){
                if($after_validate_user_email){
                    if(strlen($user_pass) >=6 && $all_cap == 1 && $all_small == 1 && $all_num == 1 && $all_char == 1){
                        $enc_user_pass = md5($user_pass);
                        $insert_query = "INSERT INTO users(user_name,user_email,user_mobile,user_pass) VALUES('$user_name',
                        '$user_email','$user_mobile','$enc_user_pass')";
                        mysqli_query($db_connect,$insert_query);
                        $_SESSION['reg_success'] = "congratulation's! Your registration is successfully done.";
                        header('location: register.php');
                    }
                    else{
                        $_SESSION['reg_err'] = "wrong password pattern";
                        header('location:register.php');
                    }
                }
                else{
                    $_SESSION['reg_err'] = "Invalid email provided";
                    header('location:register.php');
                }
            }
            else{
               $_SESSION['reg_err'] = "Already registered please insert a new email";
               header('location:register.php');
            }
        }
        else{
            $_SESSION['reg_err'] = "Invalid mobile number";
            header('location:register.php');
        }
    }
?>