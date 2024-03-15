<?php 

    session_destroy();
    
    echo"<script>
        alert('goodbye');
        window.location.href='../login.php';
    </script>";

?>