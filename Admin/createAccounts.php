<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    require('../Backend/dbconnect.php');
    $keyword = "";
    if (isset($_POST['search'])) {
        $keyword = $_POST['search'];
    }
?>
<html>


<head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
            <link rel="stylesheet" href="../Static/CSS/style.css">
            <link rel="icon" href="../Static/Images/LOGO/favicon.ico">
            <link rel="stylesheet" href="../Static/CSS/add-account.css">
            <link rel="stylesheet" href="../Static/CSS/home-admin-style.css">
            <title>Catherinan Buzz</title>
            <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600&display=swap" rel="stylesheet">
        </head>
        <body>
            <!-- top navigation -->
            <header class="nav-bar">
            <div class="logo">
                <img id="hamburger-image" src="../Static/Images/Icons/hamburger-menu.svg" alt="hamburger">
                <a href="../homeAdmin.php">
                    
                    <img src="../Static/Images/LOGO/logo.png" alt="scc_logo">
                    <p>
                        CatherinanBUZZ
                    </p>
                </a>
            </div>
            <div class="bottom-menu">
                
                <nav id="buttons">
                    
                        <a href="../homeAdmin.php">HOME</a>
                        <form action="createAccounts.php" method="POST"> 
                        <div class="search">
                            <input type="text" name="search" placeholder="Search Here">
                            <img src="../Static/Images/Icons/search.jpg" alt="search-icon">
                        </div>
                        </form>
                        <div id = "log-out"><a  href="../Backend/logout.php">Log out</a></div>
     
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
                                
            <div class = "add-account">
                <h6>Add Account</h6>
                <form action="../Backend/addAccount.php" method="POST">
                    <input type="text" name="studentID" placeholder="Enter New Student ID">
                    <label>Select Account Type</label>
                    <select name="accountType" >
                        <option value="Student">Student</option>
                        <option value="Moderator">Moderator</option>
                    </select>
                    <button>SUBMIT</button>
                </form>

                <table>
                    <tr>
                        <th>Student ID</th>
                        <th>Student Name</th>
                        <th>Account Type</th>
                    </tr>
                    <?php 
                        $fetchStudents="SELECT * FROM userLogin Where accountType !='Admin'";

                        if (!empty($keyword)) {
                            $keyword = mysqli_real_escape_string($conn, $keyword);
                            $fetchStudents .= " AND (idnumber LIKE '%$keyword%')";
                        }
                        $result=mysqli_query($conn,$fetchStudents);
                        $rows=mysqli_num_rows($result);
                        if($rows>0){
                            while($row=mysqli_fetch_assoc($result)){
                    ?>
                        <tr>
                            <td><?php echo $row['idnumber']?></td>
                            <td></td>
                            <td><?php echo $row['accountType']?></td>
                        </tr>
                    <?php  }
                    }?>
                </table>
            </div>
    </body>
</html>