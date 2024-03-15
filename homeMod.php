<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    session_start();
    require('Backend/dbconnect.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="Static/CSS/style.css">
        <link rel="stylesheet" href="Static/CSS/home-admin-style.css">
        <link rel="icon" href="Static/Images/LOGO/favicon.ico">
        <title>Catherinan Buzz</title>
    </head>
    <body>
    <header class="nav-bar">
            <div class="logo">
                <img id="hamburger-image" src="Static/Images/Icons/hamburger-menu.svg" alt="hamburger">
                <a href="homeMod.php">
                    
                    <img src="Static/Images/LOGO/logo.jpg.jpg" alt="scc_logo">
                    <p>
                        CatherinanBUZZ
                    </p>
                </a>
            </div>
            <div class="bottom-menu">
                
                <nav id="buttons">
                    
                        <a href="homeMod.php">HOME</a>
                        <a href="homeMod.php">SETTINGS</a>
                        <a href="games.php">GAMES</a>
                        <a href="aboutUs.php">ABOUT US</a>
                        <div class="search">
                            <input type="text" placeholder="Search Here">
                            <img src="Static/Images/Icons/search.jpg" alt="search-icon">
                        </div>
                        <div id = "log-out"><a  href="Backend/logout.php">Log out</a></div>

                    
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
                                        document.getElementById('buttons').style.display='flex';
                                    } else if (window.innerWidth < 900){
                                        document.getElementById('buttons').style.display='none';
                                    }
                                }
                                window.addEventListener ('resize', resetMenu);
            </script>
        </header>
        <main>
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
                                MODERATOR
                                
                            </div>
                        </div>
                        
                        <div class="sidebar-info-hidebar-button">
                            <button onclick ="toggle()" id="side-button">
                                Hide Bar
                            </button>
                        </div>
                        <script>
                            function toggle(){
                                var x = document.getElementById("hidebar");
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
            <section class="feed-section">
                <!-- div for post  -->
                <div class="posts">
                    <div class="post-info">
                    <?php 
                        $fetchPosts="SELECT post.postID, postImages.imagePath,post.bio,post.userID,post.likes,post.dislikes FROM post
                                    INNER JOIN postImages ON post.postID=postImages.postID
                                    INNER JOIN userLogin ON post.userID = userLogin.userID
                                    WHERE post.status='Pending'
                                    ORDER BY post.postID ";
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
                               <div>
                                <form action="Backend/verifyPost.php?postID=<?php echo $row['postID']?>" method="POST">
                                    <input type="hidden"name="status" Value="Published"/>
                                    <button class="btn btn-success">Publish</button>
                                </form>
                                <form action="Backend/verifyPost.php?postID=<?php echo $row['postID']?>" method="POST">
                                    <input type ="hidden" name ="status" value="Declined">
                                    <button class="btn btn-danger">Decline</button>
                                </form>
                                </div>
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


                    <div class="title">
                        Post Verification Inbox
                    </div>
                    
                <!-- <div class="post-details">
                    <div class="post-details-title">
                        Post's Details
                    </div>
                    <div class="post-details-info">
                        Select a post and it's detials will show up here. Review the message and decide if it will be published or rejected.
                    </div>
                    <div class="post-id">
                        <div class="post-id-label">
                            Post num ID
                        </div>
                        <div class="post-id-textbox">
                            <input type="Text" name="postIDnum" placeholder="Post ID number">
                        </div>
                    </div>
                    <div class="post-user">
                        <div class="post-user-label">
                            Post user
                        </div>
                        <div class="post-id-textbox">
                            <input type="Text" name="postIDnum" placeholder="User ID number">
                        </div>
                    </div>
                    <div class="post-content-label">
                        Post Content
                    </div>
                    <div class="post-content-box">
                        <textarea id="post-content" name="post-content" rows=4 cols="50">
                            
                        </textarea><br><br>
                        <button type="button">
                            +
                        </button>
                    </div>
                    <div class="publish">
                        <button class="publish-button">
                            PUBLISH
                        </button>
                        <button class="reject-button">
                            REJECT
                        </button>
                    </div>
                </div> -->
                

            
            </section>
            
        </main>


    </body>
    <script>
    
</script>
</html>