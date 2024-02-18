<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    session_start();

    require('dbconnect.php');

    
    $userID = mysqli_real_escape_string($conn, $_SESSION['userID']);
    $postID = mysqli_real_escape_string($conn, $_GET['postID']);
    $comment = mysqli_real_escape_string($conn, $_POST['comment']);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Prepare and execute the SQL query using a prepared statement
        $addComment = "INSERT INTO comments (userID, postID, comment, dateandtime) VALUES (?, ?, ?, NOW())";
        $stmt = mysqli_prepare($conn, $addComment);

        if ($stmt) {
            // Bind parameters and execute the statement
            mysqli_stmt_bind_param($stmt, "iis", $userID, $postID, $comment);
            $resultComment = mysqli_stmt_execute($stmt);

            if ($resultComment) {
                // Comment added successfully
                echo "<script>
                        alert('Comment Added');
                        window.location.href = '../viewPost.php?postID=$postID';
                    </script>";
            } else {
                // Error in executing the statement
                echo "Error: " . mysqli_error($conn);
            }
            
            // Close the statement
            mysqli_stmt_close($stmt);
        } else {
            // Error in preparing the statement
            echo "Error: " . mysqli_error($conn);
        }
    }
?>
