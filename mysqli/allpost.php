<?php
include_once("connect.php");
session_start();
$query = "select users.userID, users.name_user,
 users.img, statuspost.txt,statuspost.realdate from users inner join
         statuspost on users.userID= statuspost.userID";
        $rez = mysqli_query($conn, $query);
        if(!isset($_SESSION["userID"])){
            echo "please log in";
        }else{
            while($row = mysqli_fetch_assoc($rez)){
                echo $row["name_user"]; ?><img src='slike/<?php echo $row["img"]; ?>' style="width: 30px;height: 30px;border-radius:5px;"><br>
                <p style="font-weight: bolder;font-family: fantasy;">TEXT:<?php echo $row["txt"]; ?>|DATE:<?php echo $row["realdate"]."<br>"; ?></p>
<hr>
            <?php } }  ?>

<a href="welcome.php">go back</a>

