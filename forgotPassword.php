<?php 


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="Static/CSS/login-css.css">
        <link rel="stylesheet" href="Static/CSS/style.css">
        <link href="https://fonts.cdnfonts.com/css/old-english-five" rel="stylesheet">
        <link rel="icon" href="Static/Images/LOGO/favicon.ico">
        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600&display=swap" rel="stylesheet">
        <title>Catherinan Buzz</title>
    </head>
    <div class="login-page">
        <div class="login-info">
            <div class="login-title">
                <div class="login-picture">
                    <img src="Static/Images/LOGO/logo.png">
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
                <form method="post" action="Backend/verifyAccount.php" name="signin-form">
                    <input type="text" name="studentID" id="studentID" class="form-control my-4 py-2" placeholder="Enter Student ID" />
                    <div class="text-center mt-3">
                        <button class="btn btn-primary">Submit</button> 
                    </div>
                </form>
    </div>
</html>
