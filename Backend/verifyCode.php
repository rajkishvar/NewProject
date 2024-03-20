<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    session_start();

    require('dbconnect.php');

    $studentID=$_session['studentID'];
    $resetCode=$_POST['resetCode'];
    $resetCode2 =$_SESSION['otp'];

    if($resetCode==$resetCode2){
        header('location:../changePassword.php');

    }else{
        echo"<script>
            alert('Invalid Code');
            window.location.href='../verifyCode.php';
        </script>";
    }
?>