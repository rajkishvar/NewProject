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
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Static/CSS/style.css">
    <link rel="stylesheet" href="Static/CSS/viewpost.css">
    <link href="https://fonts.cdnfonts.com/css/old-english-five" rel="stylesheet">
    <link rel="icon" href="Static/Images/LOGO/favicon.ico">
    <title>Catherinan Buzz</title>
</head>
<body>
    <header class="nav-bar">
        <nav>
            <div class="logo">
<<<<<<< Updated upstream
                <a href="/">
                    <img src="Static/Images/LOGO/logo.jpg.jpg" alt="scc_logo">
=======
                <img id="hamburger-image" src="Static/Images/Icons/hamburger-menu.svg" alt="hamburger">
                <a href="homePage.php">
                    
                    <img src="Static/Images/LOGO/logo.png" alt="scc_logo">
>>>>>>> Stashed changes
                    <p>
                        CatherinanBUZZ
                    </p>
                </a>
            </div>
            <div class="bottom-menu">
                <nav id="buttons">
<<<<<<< Updated upstream
                    <ul>
                        <li><a href="homePage.php">HOME</a></li>
                        <li><a href="settings.php">SETTINGS</a></li>
                        <li><a href="http://example.com">FORUMS</a></li>
                        <li><a href="http://example.com">ABOUT US</a></li>
=======
                    
                        <a href="homePage.php">HOME</a>
                        <a href="settings.php">SETTINGS</a>
                        <a href="homePage.php">FORUMS</a>
                        <a href="aboutUs.php">ABOUT US</a>
>>>>>>> Stashed changes
                        <div class="search">
                            <input type="text" placeholder="Search Here">
                            <button>
                                <img src="Static/Images/Icons/search.jpg" alt="search-icon">
                            </button>
                        </div>
                    </ul>
                </nav>
            </div>
<<<<<<< Updated upstream
=======
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
>>>>>>> Stashed changes
        </header>


        <?php 
             while($row=mysqli_fetch_assoc($resultFetch)){
                if($row['postID'] !==$currentPostID){
        ?>
        <div class= "post">
            <div class = "post-details">
            <!-- div for user Details -->
                <div class = "user-details">
                    <a>userID:<?php echo $row['userID']?></a>
                </div>
                <!-- end of user Details -->

                <!-- div for post bio -->
                <div class = "post-bio">
                    <a><?php echo $row['Bio']?></a>
                </div>
                <div class = "post-images">
                    <?php 
                        $currentPostID = $row['postID'];
                    }
                    ?>
                
                <!-- end of div for post bio -->

                <!-- div for post imgs -->
                <div class = "post-img">
                    <img src="Uploads/Posts/<?php echo $row['imagePath']?>" width="100" height="100">
                </div>
                <?php } ?>
                </div>
            </div>
            
            <!-- end of div for post imgs -->

            <!-- com sec div -->
            <div class = "comments">
                <!-- div for comment form -->
                <div class = "comment-input">
                    <form method ="POST" action="Backend/addComment.php?postID=<?php echo $postID?>">
                        <textarea name="comment" placeholder="Leave a Comment"></textarea>
                        <button>SUBMIT</button>
                    </form>
                </div>
                <!-- end of comment form Div -->

                <!-- display comments div -->
                <div class = "comments-list">
                    <h4>COMMENTS</h4>
                    <?php 
                        $fetchComments="SELECT * FROM comments WHERE postID='$postID'";
                        $resultComments=mysqli_query($conn,$fetchComments);
                        $rowsComment=mysqli_num_rows($resultComments);
                        if($rowsComment>0){
                            while($commentRows=mysqli_fetch_array($resultComments)){
                    ?>

                            <div class = "comment-user">
                                <a>userID:<?php echo $commentRows['userID']?></a><br/>
                            </div>
                            <div class = "comment-details">
                                <a><?php echo $commentRows['comment']?></a><br/>
                            </div>
                            <div class = "comment-info">
                                <a><?php echo $commentRows['dateandtime']?></a><br/><br/>
                            </div>
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