<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require('dbconnect.php');
    function generatePassword() {
        return sprintf("%06d", rand(0, 999999));
    }
    $password=generatePassword();

    $studentID=$_POST['studentID'];


    $verifyIDnum="SELECT * FROM userLogin WHERE idnumber='$studentID'";
    $resultVerify=mysqli_query($conn,$verifyIDnum);
    $rows=mysqli_num_rows($resultVerify);

    if($rows<=0){
        $addStudent="INSERT INTO userLogin VALUES('','$studentID','$password','User')";
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

    }
   

?>