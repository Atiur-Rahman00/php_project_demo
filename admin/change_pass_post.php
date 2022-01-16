<?php
    session_start();
    require_once '../inc/header.php';
    require_once '../db.php';


    $user_email = $_POST['user_email'];
    $current_pass = $_POST['current_pass'];
    $new_pass = $_POST['new_pass'];
    $confirm_pass = $_POST['confirm_pass'];

    // $all_cap = preg_match('@[A-Z]@',$current_pass);
    // $all_cap = preg_match('@[A-Z]@',$new_pass);
    // $all_cap = preg_match('@[A-Z]@',$confirm_pass);
    // $all_small = preg_match('@[a-z]@',$current_pass);
    // $all_small = preg_match('@[a-z]@',$new_pass);
    // $all_small = preg_match('@[a-z]@',$confirm_pass);
    // $all_num = preg_match('@[0-9]@',$current_pass);
    // $all_num = preg_match('@[0-9]@',$new_pass);
    // $all_num = preg_match('@[0-9]@',$confirm_pass);
    // $pattern = '/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/';
    // $all_char = preg_match($pattern,$current_pass);
    // $all_char = preg_match($pattern,$new_pass);
    // $all_char = preg_match($pattern,$confirm_pass);

    // if(strlen($current_pass && $new_pass && $confirm_pass) >=6 && $all_cap == 1 && $all_small == 1 && $all_num == 1 && 
    // $all_char == 1){
        if($new_pass == $confirm_pass){
            if($new_pass == $current_pass){
                $_SESSION['pass_change_err'] = "current password and new password is equal";
                header('location: change_pass.php');
            }
            else{
                $enc_current_pass = md5($current_pass);
                $checking_current_pass = "SELECT COUNT(*) AS total_user FROM users WHERE user_email='$user_email' AND 
                user_pass='$enc_current_pass'";
                $from_db = mysqli_query($db_connect,$checking_current_pass);
                $after_assoc = mysqli_fetch_assoc($from_db);
                if($after_assoc['total_user']==1){
                    $enc_new_pass = $new_pass;
                    $update_pass_query = "UPDATE users SET user_pass='$enc_new_pass' WHERE user_email='$user_email'";
                    $_SESSION['pass_change_done'] = "Password change successfully done";
                    header('location: change_pass.php');
                }      
                else{
                    $_SESSION['pass_change_err'] = "password change failed";
                    header('location: change_pass.php');
                }
                
            }
        }
        else{
            $_SESSION['pass_change_err'] = "New password and confirm password is not equal";
            header('location: change_pass.php');
        }
    // }
    // else{
    //     $_SESSION['pass_change_err'] = "Invalid password format";
    //     header('location: change_pass.php');
    // }




?>



<?php
    require_once '../inc/footer.php';
?>