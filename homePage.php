<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    session_start();

    require('Backend/dbconnect.php');
    $userID=$_SESSION['userID'];

?>

<html>
    <body>
         <!-- top navigation -->
        <div>
            <button>Home</button>
            <button>Settings</button>
            <button>Games</button>
            <button>About Us</button>
        </div>
        <!-- ... -->
        <!-- center -->
        <div>
            <!-- left panel -->
            <div>
                <?php 
                    $fetchAccountDetails="SELECT * FROM userLogin WHERE userID='$userID'";
                    $resultAccount=mysqli_query($conn,$fetchAccountDetails);
                    $rows=mysqli_num_rows($resultAccount);
                    if($rows>0){
                        while($row=mysqli_fetch_array($resultAccount)){
                ?>
                <h4>Related Questions</h4>

                <img src=/>
                <h6><?php echo $row['accountType']?></h6>
                <button>HIDE BAR</button>
                <?php 
                        }
                    }
                ?>
            </div>
            <!-- .... -->
            <!-- RIGHT PANEL -->
            <div>
                <h3>Page title<h3>
                    <!-- create Post panel -->
                    <div>
                    <h4>Create Post</h4>
                        <form action="Backend/processPost.php" method="POST" enctype="multipart/form-data">
                            <label for="bio">Bio or Description:</label><br>
                            <textarea id="bio" name="bio" rows="4" cols="50"></textarea><br><br>

                            <label for="images">Upload Images (Max 5):</label><br>
                            <input type="file" id="images" name="images[]" accept="image/*" multiple><br><br>

                            <button type="submit">Submit</button>
                        </form>
                    </div>
                    <!-- end of create post panel -->
                    <!-- display Posts -->
                    <div>
                        <!-- div for post  -->
                        <div> 
                            <?php 
                                $fetchPosts="SELECT post.postID, postImages.imagePath,post.bio,post.userID,post.likes,post.dislikes FROM post
                                            INNER JOIN postImages ON post.postID=postImages.postID
                                            INNER JOIN userLogin ON post.userID = userLogin.userID
                                            ORDER BY post.postID";
                                $resultFetchPost=mysqli_query($conn,$fetchPosts);  
                                $currentPostID=null;
                                $test=mysqli_num_rows($resultFetchPost);
                                if($test>0){
                                while($row=mysqli_fetch_array($resultFetchPost)){
                                    if($row['postID'] !==$currentPostID){
                                        ?>
                                        <a><?php echo $row['userID']?></a><br>
                                        <a><?php echo $row['bio']?></a>

                                    <!-- div for Interaction buttons -->
                                    <div>
                                        <form method="POST"action="Backend/addReaction.php?postID=<?php echo $row['postID']?>">
                                            <input type="hidden" name="reaction" value="Like">
                                            <?php echo $row['likes']?><button>Like</button>
                                        </form>
                                        <form method="POST"action="Backend/addReaction.php?postID=<?php echo $row['postID']?>">
                                            <input type="hidden" name="reaction" value="Dislike">
                                            <?php echo $row['dislikes']?><button>Dislike</button>
                                        </form>
                                        <form method="POST" action="viewPost.php?postID=<?php echo $row['postID']?>">
                                            <button>View Post</button>
                                        </form>
                                    </div>
                                    <!-- end of interaction div -->


                                <?php
                                $currentPostID = $row['postID'];
                                
                                    }
                                ?>
                            <!-- div for photos from posts -->
                            <div> 
                                <img src="Uploads/Posts/<?php echo $row['imagePath']?>" width="100" height="100">
                            </div>
                            <!-- end of div  -->
                            <?php
                                }
                            }else{
                                ?>
                                <!-- if there is no posts yet  -->
                                <a>No Posts Yet!</a>
                           <?php     
                            }
                            ?>
                        </div>
                        <!-- div for post ends here -->
                 
                    </div>
                    <!-- end of display for post -->
            </div>
            <!-- end of right panel -->
        </div>
        <!-- end of center div -->
    </body>

    <script>
    </Script>
</html>