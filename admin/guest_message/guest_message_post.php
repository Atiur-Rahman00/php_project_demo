<?php
    session_start();
    require_once '../../db.php';

    $guset_name = $_POST['guest_name'];
    $guset_email = $_POST['guest_email'];
    $guest_subject = $_POST['guest_subject'];
    $guest_message = $_POST['guest_message'];

    $flag = true;

    if(!$guset_name){
        $_SESSION['guest_name_err'] = "Guest name field fill first";
        $flag = false;
    }
    if(!$guset_email){
        $_SESSION['guest_email_err'] = "Guest email field fill first";
        $flag = false;
    }
    if(!$guest_subject){
        $_SESSION['guest_subject_err'] = "Guest subject field fill first";
        $flag = false;
    }
    if(!$guest_message){
        $_SESSION['guest_message_err'] = "Guest message field fill first";
        $flag = false;
    }

    if($flag){
        $insert_message_query = "INSERT INTO guest_messages (guest_name,guest_email,guest_subject,guest_message) VALUES 
        ('$guest_name','$guset_email','$guest_subject','$guest_message')";
        mysqli_query($db_connect,$insert_message_query);

        header('location: ../../index.php');

        $_SESSION['guest_message_done'] = "Your message is received! We will call you.";
    }
    else{
        header('location: ../../index.php');
    }
?>