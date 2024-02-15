<?php  
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    session_start();

    require('Backend/dbconnect.php');
    $studentID=$_SESSION['studentID'];
    $userID=$_SESSION['userID'];

?>
<html>
    <form action="Backend/change_password.php" method="POST">
        <input type="password" id="newPassword" name="newPassword"placeholder="Enter New Password"onkeyup='check();'required/>
        <input type="password" id="confirmPassword" name="confirmPassword" Placeholder="Confirm Password" onkeyup='check();'required/>
        <span id='message'></span>
        <h4 id="passwordError"></h4> 
        <button>SUBMIT</button>
    </form>
    

    <script>
    document.addEventListener("DOMContentLoaded", function () {
    var newPassword = document.getElementById("newPassword");
    var confirmPassword = document.getElementById("confirmPassword");
    var passwordError = document.getElementById("passwordError");

    function validatePassword() {
        if (newPassword.value !== confirmPassword.value) {
            passwordError.textContent = "Passwords do not match!";
            return false;
        } else {
            passwordError.textContent = "";
            return true;
        }
    }

    function handleSubmit(event) {
        if (!validatePassword()) {
            event.preventDefault(); 
        }
    }

    var form = document.querySelector("form");
    form.addEventListener("submit", handleSubmit);
});
//live checking of password if same or not
    var check = function() {
    if (document.getElementById('newPassword').value ==
        document.getElementById('confirmPassword').value) {
        document.getElementById('message').style.color = 'green';
        document.getElementById('message').innerHTML = 'matching';
    } else {
        document.getElementById('message').style.color = 'red';
        document.getElementById('message').innerHTML = 'not matching';
    }
    }
</script>

</html>