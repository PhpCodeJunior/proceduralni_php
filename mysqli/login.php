<?php
include_once("connect.php");
session_start();

if($_SERVER["REQUEST_METHOD"]=="POST") {
    $valid=true;
    $email = $_POST["email_user"];
    $pass = $_POST["pass_user"];
    if (empty($email) && empty($pass)) {
        echo "please input all filed";
        $valid=false;
    } if(!empty($email) && !empty($pass)) {
        $query = "select * from users where email_user='$email' and pass_user='$pass'";
        $rez = mysqli_query($conn, $query);
        $num = mysqli_num_rows($rez);
        $row = mysqli_fetch_assoc($rez);
        if ($num) {
            $_SESSION["img"] = $row["img"];
            $_SESSION["userID"] = $row["userID"];
            header("location:welcome.php");
            $valid = true;
        } else {
            echo "account is wrong";
            $valid = false;
        }
    }
}
?>
<html>
<head>
    <title>LOGIN</title>
    <meta charset="utf-8">
</head>
<body>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    <table border="1">
        <tr>
            <td>Email</td>
            <td><input type="text" name="email_user"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="pass_user"></td>
        </tr>
        <tr>
            <td>Action</td>
            <td><input type="submit" name="submit"></td>
        </tr>
    </table>
</form>
<a href="register.php">Register</a>
</body>
</html>
