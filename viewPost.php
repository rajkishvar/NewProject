<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    session_start();

    require('Backend/dbconnect.php');

    $userID=$_SESSION['userID'];
    $postID=$_GET['postID'];

    $fetchPost="SELECT * FROM post 
                INNER JOIN postImages ON post.postID = postImages.postID
                WHERE post.postID=$postID";
    $resultFetch=mysqli_query($conn,$fetchPost);
    $currentPostID=null;

?>
<html>
    <body>
        <?php 
             while($row=mysqli_fetch_assoc($resultFetch)){
                if($row['postID'] !==$currentPostID){
        ?>
        <div>
            <!-- div for user Details -->
            <div>
                <a>userID:<?php echo $row['userID']?></a>
            </div>
            <!-- end of user Details -->

            <!-- div for post bio -->
            <div>
                <a><?php echo $row['Bio']?></a>
            </div>
            <?php 
                $currentPostID = $row['postID'];
            }
            ?>
            <!-- end of div for post bio -->

            <!-- div for post imgs -->
            <div>
                <img src="Uploads/Posts/<?php echo $row['imagePath']?>" width="100" height="100">
            </div>
            <?php } ?>
            <!-- end of div for post imgs -->

            <!-- com sec div -->
            <div>
                <!-- div for comment form -->
                <div>
                    <form method ="POST" action="Backend/addComment.php?postID=<?php echo $postID?>">
                        <textarea name="comment" placeholder="Leave a Comment"></textarea>
                        <button>SUBMIT</button>
                    </form>
                </div>
                <!-- end of comment form Div -->

                <!-- display comments div -->
                <div>
                    <h4>COMMENTS</h4>
                    <?php 
                        $fetchComments="SELECT * FROM comments WHERE postID='$postID'";
                        $resultComments=mysqli_query($conn,$fetchComments);
                        $rowsComment=mysqli_num_rows($resultComments);
                        if($rowsComment>0){
                            while($commentRows=mysqli_fetch_array($resultComments)){
                    ?>
                    
                            <a>userID:<?php echo $commentRows['userID']?></a><br/>
                            <a><?php echo $commentRows['comment']?></a><br/>
                            <a><?php echo $commentRows['dateandtime']?></a><br/><br/>
                    <?php 
                            }
                        }else{
                            echo "<a>No Comments Yet.</a>";
                        }
                    ?>
                </div>
                <!-- end of display comments div -->
            </div>
            <!-- end of comsec div -->
        </div>
    </body>
</html>