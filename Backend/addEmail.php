<?php 

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    session_start();
    require('dbconnect.php');

    $userID=$_SESSION['userID'];

    if($_SERVER['REQUEST_METHOD']=="POST"){

        $email=$_POST['email'];

        $updateEmail="UPDATE userLogin SET email ='$email' WHERE userID='$userID'";
        $updateEmailStmt=mysqli_query($conn,$updateEmail);

        echo"<script>
        alert('Email updated Successfully');
        window.location.href='../settings.php';
        </script>";

    }else{
        echo"<script>
        alert('Error');
        window.location.href='../settings.php';
        </script>";
    }
?>