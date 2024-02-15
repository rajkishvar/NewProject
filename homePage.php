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
                    <!-- ..... -->
                    <!-- display Posts -->
                    <div>
                        <?php 
                            $fetchPosts="SELECT post.postID, postImages.imagePath,post.bio,post.userID FROM post
                                        INNER JOIN postsImages ON post.postID=postImages.postID
                                        INNER JOIN userLogin ON post.userID = userLogin.userID";
                            $resultFetchPost=mysqli_query($conn,$fetchPosts);
                            
                        ?>
                    </div>
                    <!-- ... -->
            </div>
            <!-- .... -->
        </div>
        <!-- ..... -->
    </body>

    <script>
    </Script>
</html>