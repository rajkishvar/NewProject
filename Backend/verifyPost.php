<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    session_start();

    require('dbconnect.php');

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $status=$_POST['status'];
        $postID=$_GET['postID'];

        if($status=="Published"){
            $updatePublishedPost="UPDATE post SET status='$status' WHERE postID='$postID'";
            $pubstmt=mysqli_query($conn,$updatePublishedPost);

            echo"<script>
                alert('Post Published');
                window.location.href='../homeAdmin.php';
            </script>";

        }else if($status="Declined"){

            $declinePost="UPDATE post SET status='$status' WHERE postID='$postID'";
            $decstmt=mysqli_query($conn,$declinePost);
            echo"<script>
                alert('Post Declined');
                window.location.href='../homeAdmin.php';
            </script>";
            
        }else{
            echo"<script>
                alert('There has been an error');
                window.location.href='../homeAdmin.php';
            </script>";
        }

    }
?>