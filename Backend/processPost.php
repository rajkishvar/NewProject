<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

require('dbconnect.php');
$userID=$_SESSION['userID'];
$status="PENDING";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $bio = $_POST['bio'];
    $uploadDirectory = "../Uploads/Posts/";

    if (!file_exists($uploadDirectory)) {
        mkdir($uploadDirectory, 0777, true);
    }

    foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
        $file_name = $_FILES['images']['name'][$key];
        $file_tmp = $_FILES['images']['tmp_name'][$key];

        $uploadFilePath = $uploadDirectory . $file_name;
        move_uploaded_file($file_tmp, $uploadFilePath);

        $imagePaths[] = $uploadFilePath;
        $filenames[] = $file_name;
    }


    $insertBio="INSERT INTO post (Bio,userID,date,status) VALUES ('$bio',$userID,now(),'$status')";
    
    if(mysqli_query($conn,$insertBio)){
        $postID=mysqli_insert_id($conn);
        foreach($filenames as $filename){
            $insertImages="INSERT INTO postImages (postID,imagePath) VALUES ('$postID','$filename')";
            mysqli_query($conn,$insertImages);
        }
        echo "<script>
            alert('New Record Addedd');
            window.location.href='../homePage.php';
            </script>";
    }else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

   

}
?>