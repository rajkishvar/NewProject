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
        <link href="https://fonts.cdnfonts.com/css/old-english-five" rel="stylesheet">
        <link rel="stylesheet" href="Static/CSS/home-admin-style.css">
        <link rel="icon" href="Static/Images/LOGO/favicon.ico">
        <title>Catherinan Buzz</title>
    </head>
    <body>
    <header class="nav-bar">
            <div class="logo">
                <img id="hamburger-image" src="Static/Images/Icons/hamburger-menu.svg" alt="hamburger">
                <a href="homeMod.php">
                    
                    <img src="Static/Images/LOGO/logo.png" alt="scc_logo">
                    <p>
                        CatherinanBUZZ
                    </p>
                </a>
            </div>
            <div class="bottom-menu">
                
                <nav id="buttons">
                    
                        <a href="homeMod.php" class = "active">HOME</a>
                        <div class="search">
                            <input type="text" placeholder="Search Here">
                            <button>
                                <img src="Static/Images/Icons/search.jpg" alt="search-icon">
                            </button>
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
                                    var y = document.getElementById("side-button");
                                    if (window.innerWidth>=900) {
                                        document.getElementById('buttons').style.display='grid';
                                        document.getElementById('sidebar').style.display='flex';
                                        
                                    } else if (window.innerWidth < 900){
                                        document.getElementById('buttons').style.display='none';
                                        document.getElementById('sidebar').style.display='none';
                                        y.innerText='Show';
                                    }
                                }
                                window.addEventListener ('resize', resetMenu);
            </script>
        </header>
        <main>
        <div class = "sidebar-container">
                    <section id="sidebar" class="sticky">
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
                                <button id = "addAccountsButton">Add Account</button>
                                <div class="sidebar-info-profilebutton">
                                    <h6>MODERATOR</h6>
                                    
                                </div>
                            </div>
                            
                            <script>
                                function toggle(){
                                    var x = document.getElementById("sidebar");
                                    var y = document.getElementById("side-button");
                                    if(x.style.display === "none"){
                                        x.style.display = "block";
                                        console.log("Side bar is now visible");
                                        y.innerText ="Hide";
                                    }
                                    else{
                                        x.style.display = "none";
                                        console.log("Side bar is now hidden");
                                        y.innerText ="Show";
                                    }
                                }
                                    
                            </script>
                        </div>
                    </section>
                    <button onclick ="toggle()" id="side-button">
                                Hide
                            </button>
                </div>
                <section class="feed-section"> 
                <div class="post-details">

                <div class="title">
                        Post Verification Inbox
                    </div>
                <!-- div for post  -->
                <div class="posts">
                    
                <!-- div for post ends here -->


                    
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