<?php

?>
    <html>
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="Static/CSS/style.css">
            <link rel="icon" href="Static/Images/LOGO/favicon.ico">
            <title>Catherinan Buzz</title>
            <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600&display=swap" rel="stylesheet">
        </head>
        <body>
            <!-- top navigation -->
            <header class="nav-bar">
<<<<<<< Updated upstream
                <div class="logo">
                    <a href="/">
                        <img src="Static/Images/LOGO/logo.jpg.jpg" alt="scc_logo">
                        <p>
                            CatherinanBUZZ
                        </p>
                    </a>
                </div>
                <div class="bottom-menu">
                    <nav class="buttons">
                        <ul>
                            <li><a href="homePage.php">HOME</a></li>
                            <li><a href="settings.php">SETTINGS</a></li>
                            <li><a href="http://example.com">FORUMS</a></li>
                            <li><a href="http://example.com">ABOUT US</a></li>
                            <div class="search">
                                <input type="text" placeholder="Search Here">
                                <img src="Static/Images/Icons/search.jpg" alt="search-icon">
                            </div>
                        </ul>
                    </nav>
                </div>
            </header>
=======
            <div class="logo">
                <img id="hamburger-image" src="Static/Images/Icons/hamburger-menu.svg" alt="hamburger">
                <a href="homePage.php">
                    
                    <img src="Static/Images/LOGO/logo.jpg.jpg" alt="scc_logo">
                    <p>
                        CatherinanBUZZ
                    </p>
                </a>
            </div>
            <div class="bottom-menu">
                
                <nav id="buttons">
                    
                        <a href="homePage.php">HOME</a>
                        <a href="settings.php">SETTINGS</a>
                        <a href="games.php">Games</a>
                        <a href="http://example.com">ABOUT US</a>
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
            <!-- .......... -->
            <div>
                <?php 
                    $userData="SELECT * FROM userLogin WHERE userID='$userID'";
                    $userDatastmt=mysqli_query($conn,$userData);
                    $rows=mysqli_num_rows($userDatastmt);
                    if($rows>0){
                    $row=mysqli_fetch_array($userDatastmt);
                ?>
                <h2>Hello <?php echo $row['idnumber']?></h2>
                <div>
                    <h4>Profile Details</h4>
                    <label>ID Number</label>
                    <input type="text" value="<?php echo $row['idnumber']?>"/>
                    <form method="post" action="Backend/addEmail.php">
                        <h4>Editable area</h4>
                    <label>Email</label>
                    <input type="text" name="email"value="<?php echo $row['email']?>" placeholder="Enter Email"/>
                    <button class="btn btn-secondary">Submit</button>
                    </form>
                    <button class="btn btn-warning" id="changePassButton">Change Password</button>
                <?php }
                ?>
                </div>
            </div>
            <!-- .......... -->
>>>>>>> Stashed changes
        </body>
    </html>