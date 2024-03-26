<?php

?>

<html>
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="Static/CSS/style.css">
        <link href="https://fonts.cdnfonts.com/css/old-english-five" rel="stylesheet">
        <link rel="icon" href="Static/Images/LOGO/favicon.ico">
        <link rel ="stylesheet" href = "Static/CSS/games.css">
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
                
                <nav id="buttons">
                    
                        <a href="homePage.php">HOME</a>
                        <a href="settings.php">SETTINGS</a>
                        <a href="games.php" class = "active">GAMES</a>
                        <a href="aboutUs.php">ABOUT US</a>
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
                                    if (window.innerWidth>=900) {
                                        document.getElementById('buttons').style.display='grid';
                                    } else if (window.innerWidth < 900){
                                        document.getElementById('buttons').style.display='none';
                                    }
                                }
                                window.addEventListener ('resize', resetMenu);
            </script>
        </header>
        <div class = "title">GAMES</title>
        <div class = "games-container">
            
                <div class = "games">
                    <a href ="https://agar.io/"><img src = "Static/Images/Games/game-1.png"></a>
                    AGAR
                </div>
                <div class = "games">
                    <a href ="https://slither.io/"><img src = "Static/Images/Games/game-2.jpg"></a>
                    SLITHER
                </div>
                <div class = "games">
                    <a href ="https://gartic.com/"><img src = "Static/Images/Games/game-3.png"></a>
                    GARTIC
                </div>
                <div class = "games">
                    <a href ="https://krunker.io/"><img src = "Static/Images/Games/game-4.jpg"></a>
                    KRUNKER
                </div>
        </div>
</html>