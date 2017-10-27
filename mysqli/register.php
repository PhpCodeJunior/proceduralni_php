<?php
include_once("connect.php");


if($_SERVER["REQUEST_METHOD"]=="POST") {
    $valid=true;
    $name = $_POST["name_user"];
    $email = $_POST["email_user"];
    $pass = $_POST["pass_user"];
    $img = $_FILES["img"]["name"];
    $img1 = $_FILES["img"]["tmp_name"];


    if (empty($name) && empty($email) && empty($pass) && empty($img)) {
        echo "please input all filed";
        $valid=false;
    } if($valid){
        $query = "insert into users(name_user,email_user,pass_user,img) values('$name','$email','$pass','$img')";
        $rez =mysqli_query($conn,$query);
       if(move_uploaded_file($img1,"slike/$img")) {
           echo "you are register";
       }
}
}
?>
<html>
<head>
    <title>REGISTER</title>
    <meta charset="utf-8">
</head>
<body>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>" enctype="multipart/form-data">
    <table border="1">
        <tr>
            <td>Name</td>
            <td><input type="text" name="name_user"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="email_user"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="pass_user"></td>
        </tr>
        <tr>
            <td>Images</td>
            <td><input type="file" name="img"></td>
        </tr>
        <tr>
            <td>Action</td>
            <td><input type="submit" name="submit"></td>
        </tr>
    </table>
</form>
<a href="login.php">Login here</a>
</body>
</html>
