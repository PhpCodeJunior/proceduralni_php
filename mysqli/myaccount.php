<?php
include_once("connect.php");

session_start();
if(isset($_SESSION["userID"])) {
$s = $_SESSION["userID"];
$query = "select users.userID, users.name_user,users.email_user,users.pass_user,
 users.img from users where users.userID= '$s'";
$rez = mysqli_query($conn, $query);

    while($row = mysqli_fetch_assoc($rez)){
        echo $row["name_user"]; ?><br>
        <img src='slike/<?php echo $row["img"]; ?>' style="width: 30px;height: 30px;border-radius:5px;"><br>
        <?php
        echo $row["email_user"]."<br>";
        echo $row["pass_user"]."<br>";?>
   <?php  } }  ?>
<a href="welcome.php">go back</a>

