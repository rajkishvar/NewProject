<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    session_start();

    require('dbconnect.php');

    $userID=$_SESSION['userID'];
    $newPassword=$_POST['newPassword'];
    $confirmPassword=$_POST['confirmPassword'];

    if($newPassword==$confirmPassword){
        $sql="UPDATE userLogin SET password='$newPassword' WHERE userID='$userID'";
        $resultsql=mysqli_query($conn,$sql);
        echo"<script>
             alert('Password Successfully Chaged');
             window.location.href='../homePage.php'
            </script>";
    }else{
        echo"<script>
                alert('Password Mismatch');
                window.location.href='../changePassword.php'
            </script>";
    }

?>