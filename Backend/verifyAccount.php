<?php 

    require('dbconnect.php');

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $idNumber = $_POST['studentID'];

        $getEmail="SELECT email FROM userLogin WHERE idnumber ='$idNumber'";
        $stmt=mysqli_query($conn,$getEmail);
        $rows=mysqli_num_rows($stmt);
        $row=mysqli_fetch_assoc($stmt);
        $email=$row['email'];
        $userID=$row['userID'];


        if($email!=null){
            
            $_SESSION['userID']=$userID;
            $_SESSION['email']=$email;
            $_SESSION['studentID']=$idNumber;
            $_POST['email']=$email;

            echo $email;
           header('location:sendCode.php');
        }else{
            echo"<script> 
                alert('No account Found or Account does not have an email please contact an admin');
                window.location.href='../login.php';
            </script>";
        }

    }else{
        echo"<script>
            alert('Error occured');
            window.location.href='../login.php'
            </script>";
    }
?>