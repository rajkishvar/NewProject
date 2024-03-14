<?php

?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="Static/CSS/style.css">
        <link rel="stylesheet" href="Static/CSS/about-us.css">
        <link rel="icon" href="Static/Images/LOGO/favicon.ico">
        <title>Catherinan Buzz</title>
        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600&display=swap" rel="stylesheet">
    </head>
    <body>
         <!-- top navigation -->
         <header class="nav-bar">
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
        
        <div class = "about-us-container">
            <h6>ABOUT US</h6>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ac tortor vitae purus faucibus ornare suspendisse sed. Gravida cum sociis natoque penatibus. Posuere urna nec tincidunt praesent semper feugiat nibh. Egestas dui id ornare arcu odio. In nibh mauris cursus mattis. Tellus at urna condimentum mattis pellentesque id nibh tortor id. Quisque id diam vel quam elementum pulvinar etiam non. Sagittis orci a scelerisque purus semper eget duis at tellus. Non quam lacus suspendisse faucibus interdum posuere lorem ipsum. Pharetra sit amet aliquam id diam. Ac feugiat sed lectus vestibulum. Id faucibus nisl tincidunt eget nullam non nisi est. Tincidunt arcu non sodales neque sodales ut etiam. Sem integer vitae justo eget magna fermentum iaculis. Mattis vulputate enim nulla aliquet porttitor lacus luctus accumsan tortor. Justo donec enim diam vulputate ut pharetra sit amet.                    
        </div>
    </body>
</html>
