<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    require('../Backend/dbconnect.php');
?>
<html>
    <form action="../Backend/addAccount.php" method="POST">
        <input type="text" name="studentID" placeholder="Enter New Student ID">
        <button>SUBMIT</button>
    </form>

    <table>
        <tr>
            <th>Student ID</th>
            <th>Student Name</th>
        </tr>
        <?php 
            $fetchStudents="SELECT * FROM userLogin Where accountType='user'";
            $result=mysqli_query($conn,$fetchStudents);
            $rows=mysqli_num_rows($result);
            if($rows>0){
                while($row=mysqli_fetch_assoc($result)){
        ?>
            <tr>
                <td><?php echo $row['idnumber']?></td>
            </tr>
        <?php  }
        }?>
    </table>
</html>