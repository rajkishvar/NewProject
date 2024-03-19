<?php

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="Static/CSS/style.css">
        <link href="https://fonts.cdnfonts.com/css/old-english-five" rel="stylesheet">
        <link rel="stylesheet" href="Static/CSS/home-admin-style.css">
        <link rel="icon" href="Static/Images/LOGO/favicon.ico">
        <title>Catherinan Buzz</title>
    </head>
    <body>
<<<<<<< Updated upstream
<<<<<<< Updated upstream
        <header class="nav-bar">
            <nav>
                <div class="logo">
                    <a href="/">
                        <img src="Images/LOGO/logo.jpg.jpg" alt="scc_logo">
                        <p>
                            CatherinanBUZZ
                        </p>
                    </a>
                </div>
                <div class="bottom-menu">
                    <nav class="buttons">
                        <ul>
                            <li><a href="home-admin.html">HOME</a></li>
                            <li><a href="settings.php">SETTINGS</a></li>
                            <li><a href="http://example.com">FORUMS</a></li>
                            <li><a href="http://example.com">ABOUT US</a></li>
                            <div class="search">
                                <input type="text" placeholder="Search Here">
                                <img src="Images/Icons/search.jpg" alt="search-icon">
                            </div>
                        </ul>
                    </nav>
                </div>
=======
=======
    
>>>>>>> Stashed changes
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
                
                <nav id="buttons">
                    
<<<<<<< Updated upstream
<<<<<<< Updated upstream
                        <a href="homePage.php">HOME</a>
                        <a href="settings.php">SETTINGS</a>
                        <a href="games.php">GAMES</a>
                        <a href="http://example.com">ABOUT US</a>
=======
                        <a href="homeAdmin.php">HOME</a>
>>>>>>> Stashed changes
=======
                        <a href="homeAdmin.php">HOME</a>
>>>>>>> Stashed changes
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
                                if (document.getElementById('buttons').style.display =="grid"){
                                    document.getElementById('buttons').style.display ="none";
                                }
                                else {
                                    document.getElementById('buttons').style.display ="grid";
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
                            <button id = "addAccountsButton">Add Account</button>
                            <div class="sidebar-info-profilebutton">
                                <h6><?php echo $row['accountType']?></h6>
                                
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
                <div class="post-details">
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
                </div>

            
            </section>
        </main>


    </body>
</html>