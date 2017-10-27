<?php
include_once("connect.php");
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST") {
    $valid=true;
    $text = $_POST["txt"];
    $date1=date('Y-m-d H:i:s');
    $userID=$_SESSION["userID"];
    if (empty($text)) {
        echo "please input all filed";
        $valid=false;
    } if($valid){

        $sql = "INSERT INTO statuspost (txt,realdate, userID)VALUES ('$text','$date1','$userID,')";
        $rez = mysqli_query($conn,$sql);
        echo "post inserted";
    }
}
?>
<html>
<head>
    <title>POST</title>
    <meta charset="utf-8">
</head>
<body>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    <table border="1">
        <tr>
            <td>POST</td>
            <td><input type="text" name="txt"></td>
        </tr>
            <input type="hidden" name="realdate">
            <input type="hidden" name="userID">

        <tr>
            <td>Action</td>
            <td><input type="submit" name="submit"></td>
        </tr>
    </table>
</form>
<a href="welcome.php">GO BACK</a>
</body>
</html>

