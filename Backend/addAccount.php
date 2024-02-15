<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require('dbconnect.php');

    $studentID=$_POST['studentID'];
    
    $addStudent="INSERT INTO userLogin VALUES('','$studentID','$studentID','User')";
    $stmt=mysqli_query($conn,$addStudent);
    if($stmt){
        echo"<script>
                alert('Student Account Added');
                window.location.href='../Admin/createAccounts.php';
            </script>";
    }
   else{
    echo"<script>
            alert('Failed to Add Account');
            window.location.href='../Admin/createAccounts.php';
        </script>";
   }

?>