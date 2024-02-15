<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    session_start();
    require('dbconnect.php');

    $studentID=$_POST['studentIDnum'];
    $inputpassword=$_POST['password'];

    $fetchAccount="SELECT userID,idnumber, password, accountType FROM userLogin WHERE idnumber = ?";
    $stmt =$conn->prepare($fetchAccount);
    $stmt->bind_param("s",$studentID);
    $stmt->execute();
    $stmt->bind_result($userID,$idnumber,$password,$accountType);
    $stmt->fetch();
    $stmt->close();

    if($inputpassword==$password){
        $_SESSION["userID"]=$userID;
        $_SESSION["studentID"]=$idnumber;
        if($password==$idnumber){
            echo"<script>
                    alert('Welcome, Please change your Password');
                    window.location.href='../changePassword.php';
                </script>";
        }else{
            if($accountType=="ADMIN"){
                echo"<script>
                    alert('Welcome Back, Admin');
                    window.location.href='../Admin/home.php';
                </script>";

            }
            echo"<script>
                    alert('Welcome Back');
                    window.location.href='../homePage.php';
                </script>";
        }

    }else{
        echo"<script>
                alert('Invalid Credentials');
                window.location.href='../login.php';
            </script>";
    }


?>