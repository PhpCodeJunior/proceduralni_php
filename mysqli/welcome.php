<?php

session_start();
if(isset($_SESSION["userID"])) {
    if (isset($_SESSION["img"])) { ?>
        <p style='color: aquamarine;text-shadow: brown;'>welcome
            <img src="slike/<?php echo $_SESSION['img']; ?>" style="width: 30px;height: 30px;border-radius:5px; ">
            </p>
        <?php
        echo "<br>";
        echo "
    <a href='post.php'>Create post</a><br>
    <a href='allpost.php'>View all Post</a><br>
    <a href='myaccount.php'>My account</a><br>
    <a href='logout.php'>logout</a><br>
    ";
    } }else {
        echo "please login";
    echo "<a href='login.php'>go back</a>";
    }


