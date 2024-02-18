<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

require('dbconnect.php');
$userID=$_SESSION['userID'];

$reaction=$_POST['reaction'];
$postID=$_GET['postID'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $verifyReaction="SELECT * FROM reaction WHERE userID='$userID' AND postID='$postID'";
    $resultVerify=mysqli_query($conn,$verifyReaction);
    $verifyRows=mysqli_num_rows($resultVerify);

    $reactionRow=mysqli_fetch_assoc($resultVerify);

    if($verifyRows==0){
        $addreaction="INSERT INTO reaction VALUES('','$userID','$postID','$reaction')";
        $resultReaction=mysqli_query($conn,$addreaction);
        if($reaction=='Like'){
            $updateLikes="UPDATE post SET likes = likes + 1 WHERE postID = '$postID'";
            $resultLike=mysqli_query($conn,$updateLikes);
            echo"<script>
                    alert('Reaction Addedd!');
                    window.location.href='../homePage.php';
                </script>";
        }else{
            $updateDislike="UPDATE POST SET dislikes = dislikes + 1 WHERE postID='$postID'";
            $resultDislike=mysqli_query($conn,$updateDislike);
            echo"<script>
                    alert('Reaction Addedd!');
                    window.location.href='../homePage.php';
                </script>";
        }

    }else{
        $oldreaction=$reactionRow['reaction'];
        
        $post="SELECT * FROM post WHERE postID='$postID'";
        $resultPost=mysqli_query($conn,$post);
        $postRows=mysqli_fetch_assoc($resultPost);

     
        if($oldreaction=='Like'&& $reaction=='Dislike'){

            if($postRows['likes'] > 0) {
                $updateLikes="UPDATE post SET likes = likes - 1 WHERE postID = '$postID'";
                $resultLike=mysqli_query($conn,$updateLikes);
            }

            $updateDislike="UPDATE POST SET dislikes = dislikes + 1 WHERE postID='$postID'";
            $resultDislike=mysqli_query($conn,$updateDislike);

            $updatereaction="UPDATE reaction SET reaction='$reaction' WHERE userID='$userID' AND postID='$postID'";
            $resultReactionUpdate=mysqli_query($conn,$updatereaction);

            echo"<script>
                    alert('Reaction Addedd!');
                    window.location.href='../homePage.php';
                </script>";

        }else if($oldreaction=='Dislike' && $reaction=='Like'){

            if ($postRows['dislikes'] > 0) {
                $updateDislike="UPDATE POST SET dislikes = dislikes - 1 WHERE postID='$postID'";
                $resultDislike=mysqli_query($conn,$updateDislike);
            }
            
            $updateLikes="UPDATE post SET likes = likes + 1 WHERE postID = '$postID'";
            $resultLike=mysqli_query($conn,$updateLikes);

            $updatereaction="UPDATE reaction SET reaction='$reaction' WHERE userID='$userID' AND postID='$postID'";
            $resultReactionUpdate=mysqli_query($conn,$updatereaction);

            echo"<script>
                    alert('Reaction Addedd!');
                    window.location.href='../homePage.php';
                </script>";


        }else{
            header('location:../homePage.php');
        }
    }
    echo"<script>
            alert('Something Went Wrong!!');
            window.location.href='../homePage.php';
        </script>";
}


?>