<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    require('../Backend/dbconnect.php');
?>
<html>
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
</html>