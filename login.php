<?php 


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="Static/CSS/login-css.css">
        <link rel="stylesheet" href="Static/CSS/style.css">
        <link rel="icon" href="Images/LOGO/favicon.ico">
        <title>Catherinan Buzz</title>
    </head>
    <div class="login-page">
        <div class="login-info">
            <div class="login-title">
                <div class="login-picture">
                    <img src="Images/LOGO/logo.jpg.jpg">
                </div>
                <div class="login-title-text">
                    Catherinan Buzz
                </div>
            </div>
            <div class="login-text">
                Engage in discussions with your fellow blue warrior and play academic-related games on CatherinanBUZZ.
            </div>
        </div>
        <div class="login-table">
            <form action="Backend/authentication.php" method="POST">
                <input type="Text" name="studentIDnum" placeholder="Student ID number"></input>
                <input type="password" name="password"placeholder="Password"/>
                <button type ="submit">SUBMIT</button>
            </form>
            
        </div>
    </div>
</html>
