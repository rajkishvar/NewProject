<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    session_start();

    require('Backend/dbconnect.php');
    $userID=$_SESSION['userID'];

?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="Static/CSS/style.css">
        <link rel="icon" href="Static/Images/LOGO/favicon.ico">
        <link href="https://fonts.cdnfonts.com/css/old-english-five" rel="stylesheet">
        <title>Catherinan Buzz</title>
        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600&display=swap" rel="stylesheet">
    </head>
    <body>
         <!-- top navigation -->
         <header class="nav-bar">
            <div class="logo">
                <img id="hamburger-image" src="Static/Images/Icons/hamburger-menu.svg" alt="hamburger">
                <a href="homePage.php">
                    
                    <img src="Static/Images/LOGO/logo.png" alt="scc_logo">
                    <p>
                        CatherinanBUZZ
                    </p>
                </a>
            </div>
            <div class="bottom-menu">
<<<<<<< Updated upstream
                <nav class="buttons">
                    <ul>
                        <li><a href="homePage.php">HOME</a></li>
                        <li><a href="http://example.com">SETTINGS</a></li>
                        <li><a href="http://example.com">FORUMS</a></li>
                        <li><a href="http://example.com">ABOUT US</a></li>
=======
                
                <nav id="buttons">
                    
                        <a href="homePage.php">HOME</a>
                        <a href="settings.php">SETTINGS</a>
                        <a href="games.php">GAMES</a>
                        <a href="aboutUs.php">ABOUT US</a>
>>>>>>> Stashed changes
                        <div class="search">
                            <input type="text" placeholder="Search Here">
                            <button>
                                <img src="Static/Images/Icons/search.jpg" alt="search-icon">
                            </button>
                        </div>
<<<<<<< Updated upstream
                    </ul>
=======
                        <div id = "log-out"><a  href="Backend/logout.php">Log out</a></div>

                    
>>>>>>> Stashed changes
                </nav>
            </div>
            <script>
                function mobileMenu() {
                                if (document.getElementById('buttons').style.display =="flex"){
                                    document.getElementById('buttons').style.display ="none";
                                }
                                else {
                                    document.getElementById('buttons').style.display ="flex";
                                }
                                
                                
                                }
                                document.getElementById('hamburger-image').addEventListener('click', mobileMenu);
                                    
                                function resetMenu (){
                                    if (window.innerWidth>=900) {
                                        document.getElementById('buttons').style.display='grid';
                                    } else if (window.innerWidth < 900){
                                        document.getElementById('buttons').style.display='none';
                                    }
                                }
                                window.addEventListener ('resize', resetMenu);
            </script>
        </header>
        <!-- ... -->
        <!-- center -->
        <main>
            <!-- left panel -->
            
                <?php 
                    $fetchAccountDetails="SELECT * FROM userLogin WHERE userID='$userID'";
                    $resultAccount=mysqli_query($conn,$fetchAccountDetails);
                    $rows=mysqli_num_rows($resultAccount);
                    if($rows>0){
                        while($row=mysqli_fetch_array($resultAccount)){
                ?>
                <section id="sidebar">
                    <div class="related-questions-title">
                        <h1>Related Questions</h1>
                    </div>
                    <div class="sidebar-info">
                        <div id = "hidebar">
                            <div class="sidebar-info-questions">
                                <div>
                                    Question one
                                </div>
                                <div>
                                    Question two
                                </div>
                                <div>
                                    Question three
                                </div>
                                <div>
                                    Question four
                                </div>
                            </div>
                            <div class="sidebar-info-bio">
                                <div>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                </div>
                            </div>
                            <div class="profile-picture">
                                <img src="Static/Images/Profile/profile-1.jpg">
                            </div>
                            <div class="sidebar-info-profilebutton">
                                <h6><?php echo $row['accountType']?></h6>
                                
                            </div>
                        </div>
                        <div class="sidebar-info-hidebar-button">
                            
                        </div>
                        <script>
                            function toggle(){
                                var x = document.getElementById("sidebar");
                                if(x.style.display === "none"){
                                    x.style.display = "block";
                                }
                                else{
                                    x.style.display = "none";
                                }
                            }
                                
                        </script>
                    </div>
                </section>

                <?php 
                        }
                    }
                ?>
            
            <!-- .... -->
            <!-- RIGHT PANEL -->
            <section class="feed-section">
                <div class="title">
                    Page Title
                </div>
            
                    <!-- create Post panel -->
                    <div>
                    <button onclick ="toggle()" id="side-button">
                                Hide Bar
                            </button>
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
                        <!-- div for post  -->
                        <div class="posts">
                            <div class="post-info">
                            <?php 
                                $fetchPosts="SELECT post.postID, postImages.imagePath,post.bio,post.userID,post.likes,post.dislikes FROM post
                                            INNER JOIN postImages ON post.postID=postImages.postID
                                            INNER JOIN userLogin ON post.userID = userLogin.userID
                                            ORDER BY post.postID";
                                $resultFetchPost=mysqli_query($conn,$fetchPosts);  
                                $currentPostID=null;

                                while($row=mysqli_fetch_array($resultFetchPost)){
                                    if($row['postID'] !==$currentPostID){
                                        ?>
                                        <div class="profile-posts">
                                            <img src="Static/Images/Profile/profile-1.jpg">
                                            <a><?php echo $row['userID']?></a><br>
                                        </div>
                                        <div class="post-text">
                                            <div class="post-title">
                                                TITLE HERE
                                            </div>
                                            <div class="post-info-text">
                                                <a><?php echo $row['bio']?></a>
                                            </div>
                                            <div> 
                                                <img src="Uploads/Posts/<?php echo $row['imagePath']?>" width="100" height="100">
                                                </div>
                                        </div>
                
                                        

                                    <!-- div for Interaction buttons -->
                                    <div class="post-votes">
                                        <div class = "likes">
                                            <form method="POST"action="Backend/addReaction.php?postID=<?php echo $row['postID']?>">
                                                <input type="hidden" name="reaction" value="Like">
                                                <div class="like-counter">
                                                    <?php echo $row['likes']?>
                                                </div>
                                                
                                                    <button>Like</button>
                                                
                                            </form>
                                        </div>
                                        <div class = "dislikes">
                                            <form method="POST"action="Backend/addReaction.php?postID=<?php echo $row['postID']?>">
                                                <input type="hidden" name="reaction" value="Dislike">
                                                <div class = "dislike-counter">
                                                    <?php echo $row['dislikes']?>
                                                </div>
                                                <button>Dislike</button>
                                                
                                            </form>
                                        </div>
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
                                
                            <!-- end of div  -->
                            <?php
                                }
                            ?>
                            </div>
                        <!-- div for post ends here -->
                 
                        </div>
                    <!-- end of display for post -->
            </div>
            <!-- end of right panel -->
        </main>
        <!-- end of center div -->
    </body>

    <script>
    </Script>
</html>